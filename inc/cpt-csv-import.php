<?php
/**
 * CPT CSV Import Functionality
 *
 * This file contains functions for importing CSV data into Custom Post Types.
 * Allows updating existing CPT posts or creating new ones based on CSV data.
 *
 * @package bop_theme
 * @since 1.0.0
 */

/* ============================================================================
 * CPT CSV IMPORT FUNCTIONALITY
 * ============================================================================
 * Allows importing CSV data into Custom Post Types, updating existing posts
 * or creating new ones based on CSV data.
 * ============================================================================ */

/**
 * Helper function to dynamically find the correct parent slug for 'Site Options'
 *
 * ACF options pages can have varying parent slugs depending on WordPress version and other plugins.
 * This function attempts to find the correct slug by iterating through global menu arrays.
 *
 * @return string|false The correct parent slug or false if not found.
 */
function bop_find_site_options_parent_slug() {
	global $submenu, $menu;

	// Known ACF options page slug
	$acf_options_page_slug = 'site-options';
	$target_menu_title = 'Site Options'; // The original title ACF registers

	// 1. Check if it's a direct submenu of itself (ACF's default behavior for top-level options pages)
	if ( isset( $submenu[ 'acf-options-' . $acf_options_page_slug ] ) ) {
		foreach ( $submenu[ 'acf-options-' . $acf_options_page_slug ] as $item ) {
			if ( $item[2] === 'acf-options-' . $acf_options_page_slug ) {
				return 'acf-options-' . $acf_options_page_slug;
			}
		}
	}

	// 2. Search through all top-level menus to find 'Site Options'
	foreach ( $menu as $menu_item ) {
		if ( isset( $menu_item[0] ) && $menu_item[0] === $target_menu_title ) {
			return $menu_item[2]; // Return the slug of the top-level menu item
		}
	}

	// 3. Fallback: Check common ACF options page slugs
	$possible_parents = array(
		'acf-options-site-options',
		'site-options',
		'acf-options-site_options', // Sometimes ACF uses underscores
	);

	foreach ( $possible_parents as $parent ) {
		if ( isset( $submenu[ $parent ] ) ) {
			return $parent;
		}
	}

	return false; // Not found
}

/**
 * Add CPT CSV Import admin page under Site Options
 *
 * Creates an admin page for importing CSV files into Custom Post Types.
 *
 * @since 1.0.0
 */
function bop_add_cpt_csv_import_admin_page() {
	// Find the correct parent slug for Site Options
	$parent_slug = bop_find_site_options_parent_slug();
	
	if ( $parent_slug ) {
		add_submenu_page(
			$parent_slug,
			'Import CPT from CSV',
			'Import CPT from CSV',
			'edit_posts',
			'import-cpt-csv',
			'bop_cpt_csv_import_admin_page_callback'
		);
	}
}
// Use very high priority to ensure ACF has created the menu first
add_action( 'admin_menu', 'bop_add_cpt_csv_import_admin_page', 999 );

/**
 * CPT CSV Import Admin Page Callback
 *
 * Displays the admin page interface for importing CSV files into Custom Post Types.
 * Handles form submission, file upload, and displays import results.
 *
 * Features:
 * - File upload interface for CSV files
 * - Post type selection dropdown
 * - Matching options (title, slug, ID, custom field)
 * - Update/create toggle
 * - Import statistics display
 *
 * @since 1.0.0
 * @return void
 */
function bop_cpt_csv_import_admin_page_callback() {
	// Security check: ensure user has permission to edit posts
	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}

	// Initialize message variables for user feedback
	$message = '';
	$message_type = '';
	$example_upload_message = '';
	$import_stats = array(
		'created' => 0,
		'updated' => 0,
		'skipped' => 0,
		'errors' => 0,
	);

	// Handle example CSV upload
	if ( isset( $_POST['upload_example_csv'] ) && isset( $_FILES['example_csv_file'] ) && ! empty( $_FILES['example_csv_file']['tmp_name'] ) ) {
		check_admin_referer( 'bop_upload_example_csv_cpt' );
		
		$uploaded_file = $_FILES['example_csv_file']['tmp_name'];
		$file_name = sanitize_file_name( $_FILES['example_csv_file']['name'] );
		
		// Create uploads directory if it doesn't exist
		$uploads_dir = wp_upload_dir();
		$example_dir = $uploads_dir['basedir'] . '/csv-examples';
		if ( ! is_dir( $example_dir ) ) {
			wp_mkdir_p( $example_dir );
			file_put_contents( $example_dir . '/index.php', '<?php // Silence is golden' );
		}
		
		// Move uploaded file
		$destination = $example_dir . '/cpt-import-example.csv';
		if ( move_uploaded_file( $uploaded_file, $destination ) ) {
			update_option( 'bop_cpt_csv_example_csv', $uploads_dir['baseurl'] . '/csv-examples/cpt-import-example.csv' );
			$example_upload_message = '<div class="notice notice-success is-dismissible"><p>Example CSV file uploaded successfully!</p></div>';
		} else {
			$example_upload_message = '<div class="notice notice-error is-dismissible"><p>Error uploading example CSV file.</p></div>';
		}
	}

	// Handle CSV import form submission
	if ( isset( $_POST['bop_import_cpt_csv'] ) && isset( $_FILES['csv_file'] ) && ! empty( $_FILES['csv_file']['tmp_name'] ) ) {
		// Verify nonce for security
		check_admin_referer( 'bop_import_cpt_csv_admin' );

		// Get form data
		$uploaded_file = $_FILES['csv_file']['tmp_name']; // Temporary file path from upload
		$post_type = isset( $_POST['post_type'] ) ? sanitize_text_field( $_POST['post_type'] ) : '';
		$match_field = isset( $_POST['match_field'] ) ? sanitize_text_field( $_POST['match_field'] ) : 'title';
		$update_existing = isset( $_POST['update_existing'] ) ? true : false;

		// Validate post type selection
		if ( empty( $post_type ) ) {
			$message = 'Error: Please select a Custom Post Type.';
			$message_type = 'error';
		} else {
			// Process CSV import
			$result = bop_import_cpt_from_csv( $uploaded_file, $post_type, $match_field, $update_existing );

			if ( is_wp_error( $result ) ) {
				// Display error message
				$message = 'Error: ' . $result->get_error_message();
				$message_type = 'error';
			} else {
				// Display success message with statistics
				$import_stats = $result;
				$message = sprintf(
					'Import completed! Created: %d, Updated: %d, Skipped: %d, Errors: %d',
					$import_stats['created'],
					$import_stats['updated'],
					$import_stats['skipped'],
					$import_stats['errors']
				);
				$message_type = 'success';
			}
		}
	}

	// Get all custom post types for dropdown
	$post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'objects' );
	
	// Also include standard WordPress post types (post, page)
	$standard_types = get_post_types( array( 'public' => true, '_builtin' => true ), 'objects' );
	$all_post_types = array_merge( $standard_types, $post_types );
	
	// Sort post types alphabetically by name for easier selection
	usort( $all_post_types, function( $a, $b ) {
		return strcmp( $a->name, $b->name );
	});
	?>
	<div class="wrap">
		<h1>Import Custom Post Type from CSV</h1>
		
		<?php if ( $example_upload_message ) : ?>
			<?php echo $example_upload_message; ?>
		<?php endif; ?>
		
		<?php if ( $message ) : ?>
			<div class="notice notice-<?php echo esc_attr( $message_type === 'success' ? 'success' : 'error' ); ?> is-dismissible">
				<p><?php echo esc_html( $message ); ?></p>
			</div>
		<?php endif; ?>

		<div class="card">
			<h2>CSV Format</h2>
			<p>Your CSV file should have columns that match your Custom Post Type fields. The first row must be headers.</p>
			
			<h3>Standard WordPress Fields</h3>
			<ul>
				<li><strong>title</strong> or <strong>post_title</strong> - Post title (required for matching by title)</li>
				<li><strong>content</strong> or <strong>post_content</strong> - Post content/body text</li>
				<li><strong>excerpt</strong> or <strong>post_excerpt</strong> - Post excerpt/short description</li>
				<li><strong>status</strong> or <strong>post_status</strong> - Post status (publish, draft, pending, private, etc.)</li>
				<li><strong>featured_image</strong> or <strong>thumbnail</strong> - Featured image (URL, file path, or attachment ID)</li>
			</ul>
			
			<h3>Custom Fields</h3>
			<ul>
				<li><strong>Any custom field names</strong> - Will be saved as WordPress post meta</li>
				<li><strong>Any ACF field names</strong> - Will be saved using ACF functions (supports nested groups)</li>
			</ul>
			
			<h3>Nested ACF Group Fields</h3>
			<p>For nested ACF group fields (like contest entry fields), use underscores to separate levels:</p>
			<ul>
				<li><code>winning_images_first_place_group_first_name</code> - First name in first place group</li>
				<li><code>winning_images_first_place_group_last_name</code> - Last name in first place group</li>
				<li><code>winning_images_first_place_group_image</code> - Image field (URL or attachment ID)</li>
				<li><code>winning_images_first_place_group_gallery</code> - Gallery field (comma-separated URLs or IDs)</li>
				<li><code>winning_images_second_place_group_first_name</code> - Second place group fields</li>
				<li>And so on for other nested groups...</li>
			</ul>
			
			<p><strong>Important Notes:</strong></p>
			<ul>
				<li>The first row must be column headers</li>
				<li>Posts will be matched by the selected field (default: title) to update existing posts</li>
				<li>If no match is found, a new post will be created</li>
				<li>Empty rows will be skipped automatically</li>
			</ul>
			
			<?php
			// Get example CSV URL
			$example_csv_url = get_option( 'bop_cpt_csv_example_csv' );
			?>
			
			<h3 style="margin-top: 20px;">Example CSV File</h3>
			<?php if ( $example_csv_url ) : ?>
				<p><a href="<?php echo esc_url( $example_csv_url ); ?>" class="button" download>Download Example CSV</a></p>
			<?php endif; ?>
			
			<form method="post" enctype="multipart/form-data" style="margin-top: 10px;">
				<?php wp_nonce_field( 'bop_upload_example_csv_cpt' ); ?>
				<input type="file" name="example_csv_file" id="example_csv_file" accept=".csv">
				<?php submit_button( 'Upload Example CSV', 'secondary', 'upload_example_csv', false ); ?>
				<p class="description">Upload an example CSV file that users can download as a template.</p>
			</form>
		</div>

		<form method="post" enctype="multipart/form-data" class="card" style="margin-top: 20px;">
			<?php wp_nonce_field( 'bop_import_cpt_csv_admin' ); ?>
			
			<table class="form-table">
				<tr>
					<th scope="row">
						<label for="post_type">Custom Post Type</label>
					</th>
					<td>
						<select name="post_type" id="post_type" class="regular-text" required>
							<option value="">-- Select a Post Type --</option>
							<?php foreach ( $all_post_types as $pt ) : ?>
								<option value="<?php echo esc_attr( $pt->name ); ?>" 
								        <?php selected( isset( $_POST['post_type'] ) ? $_POST['post_type'] : '', $pt->name ); ?>>
									<?php echo esc_html( $pt->label ); ?> (<?php echo esc_html( $pt->name ); ?>)
								</option>
							<?php endforeach; ?>
						</select>
						<p class="description">Select the Custom Post Type to import data into.</p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="csv_file">CSV File</label>
					</th>
					<td>
						<input type="file" name="csv_file" id="csv_file" accept=".csv" required>
						<p class="description">Select the CSV file to import.</p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="match_field">Match Existing Posts By</label>
					</th>
					<td>
						<select name="match_field" id="match_field" class="regular-text">
							<option value="title" <?php selected( isset( $_POST['match_field'] ) ? $_POST['match_field'] : 'title', 'title' ); ?>>Title</option>
							<option value="slug" <?php selected( isset( $_POST['match_field'] ) ? $_POST['match_field'] : 'title', 'slug' ); ?>>Slug</option>
							<option value="id" <?php selected( isset( $_POST['match_field'] ) ? $_POST['match_field'] : 'title', 'id' ); ?>>Post ID</option>
							<option value="custom_field" <?php selected( isset( $_POST['match_field'] ) ? $_POST['match_field'] : 'title', 'custom_field' ); ?>>Custom Field</option>
						</select>
						<p class="description">How to match existing posts for updating. If no match is found, a new post will be created.</p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="update_existing">Update Existing Posts</label>
					</th>
					<td>
						<label>
							<input type="checkbox" name="update_existing" id="update_existing" value="1" <?php checked( isset( $_POST['update_existing'] ) ? $_POST['update_existing'] : true, true ); ?>>
							Update existing posts if a match is found
						</label>
						<p class="description">If unchecked, existing posts will be skipped and only new posts will be created.</p>
					</td>
				</tr>
			</table>

			<?php submit_button( 'Import CSV', 'primary', 'bop_import_cpt_csv' ); ?>
		</form>

		<div class="card" style="margin-top: 20px;">
			<h2>How to Use</h2>
			<ol>
				<li>Select the Custom Post Type you want to import data into</li>
				<li>Choose your CSV file (first row should be column headers)</li>
				<li>Select how to match existing posts (by title, slug, ID, or custom field)</li>
				<li>Choose whether to update existing posts or only create new ones</li>
				<li>Click "Import CSV" to process the import</li>
			</ol>
			<p><strong>Tip:</strong> Make sure your CSV column names match the field names you want to update. Standard WordPress fields (title, content, excerpt) and custom fields will be automatically detected.</p>
		</div>
	</div>
	<?php
}

/**
 * Import CSV data into Custom Post Type
 *
 * This function reads a CSV file and imports/updates posts in the specified Custom Post Type.
 * It handles standard WordPress fields (title, content, excerpt, status) and custom fields,
 * including nested ACF group fields.
 *
 * @param string $csv_file_path   Path to CSV file (can be temporary uploaded file path)
 * @param string $post_type       Custom Post Type slug (e.g., 'stillphotojournalism', 'award')
 * @param string $match_field     Field to use for matching existing posts:
 *                                - 'title': Match by post title
 *                                - 'slug': Match by post slug
 *                                - 'id': Match by post ID
 *                                - 'custom_field': Match by custom field value
 * @param bool   $update_existing Whether to update existing posts (true) or skip them (false)
 * @return array|WP_Error Array with import statistics:
 *                        - 'created': Number of new posts created
 *                        - 'updated': Number of existing posts updated
 *                        - 'skipped': Number of rows skipped (empty/invalid)
 *                        - 'errors': Number of errors encountered
 *                        Returns WP_Error on critical failure
 */
function bop_import_cpt_from_csv( $csv_file_path, $post_type, $match_field = 'title', $update_existing = true ) {
	if ( ! file_exists( $csv_file_path ) ) {
		return new WP_Error( 'file_not_found', 'CSV file not found: ' . $csv_file_path );
	}

	// Verify post type exists
	if ( ! post_type_exists( $post_type ) ) {
		return new WP_Error( 'invalid_post_type', 'Invalid post type: ' . $post_type );
	}

	$handle = fopen( $csv_file_path, 'r' );
	if ( $handle === false ) {
		return new WP_Error( 'file_open_error', 'Could not open CSV file.' );
	}

	// Read header row (first row of CSV)
	$header = fgetcsv( $handle );
	if ( $header === false ) {
		fclose( $handle );
		return new WP_Error( 'invalid_csv', 'Could not read CSV header.' );
	}

	// Normalize header keys: trim whitespace and convert to lowercase for consistent matching
	// This allows CSV headers to be case-insensitive (e.g., "Title" or "title" both work)
	$header = array_map( 'trim', $header );
	$header_lower = array_map( 'strtolower', $header );
	
	// Create mapping of lowercase headers to original headers (preserves original case if needed)
	$header_map = array_combine( $header_lower, $header );

	$stats = array(
		'created' => 0,
		'updated' => 0,
		'skipped' => 0,
		'errors' => 0,
	);

	$row_number = 1; // Start at 1 since header is row 0

	// Read CSV data
	while ( ( $data = fgetcsv( $handle ) ) !== false ) {
		$row_number++;
		
		if ( count( $data ) < 1 ) {
			$stats['skipped']++;
			continue; // Skip empty rows
		}

		// Map CSV data columns to header keys (using lowercase for case-insensitive matching)
		$row = array();
		foreach ( $header_lower as $index => $key ) {
			// Trim whitespace from values and use empty string if column doesn't exist
			$row[ $key ] = isset( $data[ $index ] ) ? trim( $data[ $index ] ) : '';
		}

		// Get post title (required for matching and creating posts)
		// Support both 'title' and 'post_title' column names
		$post_title = '';
		if ( isset( $row['title'] ) ) {
			$post_title = $row['title'];
		} elseif ( isset( $row['post_title'] ) ) {
			$post_title = $row['post_title'];
		}

		// Skip row if no title and we're matching by title (can't match or create without title)
		if ( empty( $post_title ) && $match_field === 'title' ) {
			$stats['skipped']++;
			continue;
		}

		// Find existing post if update_existing is enabled
		// This allows us to update existing posts instead of creating duplicates
		$existing_post = null;
		
		if ( $update_existing ) {
			$existing_post = bop_find_cpt_post_by_field( $post_type, $match_field, $row, $post_title );
		}

		// Prepare post data array for wp_insert_post() or wp_update_post()
		$post_data = array(
			'post_type' => $post_type,
			'post_status' => 'publish', // Default status, can be overridden by CSV
		);

		// Set title (required for creating new posts)
		if ( ! empty( $post_title ) ) {
			$post_data['post_title'] = $post_title;
		}

		// Set content - support both 'content' and 'post_content' column names
		if ( isset( $row['content'] ) && ! empty( $row['content'] ) ) {
			$post_data['post_content'] = $row['content'];
		} elseif ( isset( $row['post_content'] ) && ! empty( $row['post_content'] ) ) {
			$post_data['post_content'] = $row['post_content'];
		}

		// Set excerpt - support both 'excerpt' and 'post_excerpt' column names
		if ( isset( $row['excerpt'] ) && ! empty( $row['excerpt'] ) ) {
			$post_data['post_excerpt'] = $row['excerpt'];
		} elseif ( isset( $row['post_excerpt'] ) && ! empty( $row['post_excerpt'] ) ) {
			$post_data['post_excerpt'] = $row['post_excerpt'];
		}

		// Set status - support both 'status' and 'post_status' column names
		// Valid values: publish, draft, pending, private, etc.
		if ( isset( $row['status'] ) && ! empty( $row['status'] ) ) {
			$post_data['post_status'] = $row['status'];
		} elseif ( isset( $row['post_status'] ) && ! empty( $row['post_status'] ) ) {
			$post_data['post_status'] = $row['post_status'];
		}

		// Update existing post or create new one
		if ( $existing_post ) {
			// Update existing post: add ID to post_data and use wp_update_post()
			$post_data['ID'] = $existing_post->ID;
			$result = wp_update_post( $post_data, true ); // true = return WP_Error on failure
			if ( is_wp_error( $result ) ) {
				$stats['errors']++;
				continue; // Skip to next row on error
			}
			$post_id = $existing_post->ID;
			$stats['updated']++;
		} else {
			// Create new post: must have a title
			if ( empty( $post_data['post_title'] ) ) {
				$stats['skipped']++;
				continue; // Can't create post without title
			}
			$post_id = wp_insert_post( $post_data, true ); // true = return WP_Error on failure
			if ( is_wp_error( $post_id ) ) {
				$stats['errors']++;
				continue; // Skip to next row on error
			}
			$stats['created']++;
		}

		// Handle featured image (post thumbnail)
		// Support both 'featured_image' and 'thumbnail' column names
		// Value can be: URL, file path, or attachment ID
		if ( isset( $row['featured_image'] ) && ! empty( $row['featured_image'] ) ) {
			bop_set_featured_image_from_url( $post_id, $row['featured_image'] );
		} elseif ( isset( $row['thumbnail'] ) && ! empty( $row['thumbnail'] ) ) {
			bop_set_featured_image_from_url( $post_id, $row['thumbnail'] );
		}

		// Save custom fields (everything that's not a standard WordPress field)
		// Standard fields are handled above, so we skip them here
		$standard_fields = array( 'title', 'post_title', 'content', 'post_content', 'excerpt', 'post_excerpt', 'status', 'post_status', 'featured_image', 'thumbnail' );
		
		// Separate ACF fields from regular meta fields for different handling
		// ACF fields need special handling for nested groups (e.g., winning_images_first_place_group_first_name)
		$acf_fields = array();
		$meta_fields = array();
		
		foreach ( $row as $key => $value ) {
			// Skip empty values, but allow '0' as a valid value (empty() would treat '0' as empty)
			if ( empty( $value ) && $value !== '0' ) {
				continue;
			}

			// Skip standard WordPress fields (already handled above)
			if ( in_array( $key, $standard_fields, true ) ) {
				continue;
			}

			// Detect ACF fields: fields with underscores might be nested ACF group fields
			// ACF nested fields use format: group_name_field_name or group_name_sub_group_field_name
			// Example: winning_images_first_place_group_first_name
			if ( strpos( $key, '_' ) !== false && function_exists( 'update_field' ) ) {
				// Try to save as ACF field (handles nested groups automatically)
				$acf_fields[ $key ] = $value;
			} else {
				// Regular WordPress post meta field
				$meta_fields[ $key ] = $value;
			}
		}

		// Save ACF fields using ACF's update_field() function
		// This properly handles nested group fields and field types (images, galleries, etc.)
		if ( function_exists( 'update_field' ) && ! empty( $acf_fields ) ) {
			foreach ( $acf_fields as $field_key => $field_value ) {
				// Handle nested field paths like "winning_images_first_place_group_first_name"
				// ACF's update_field() can handle nested paths with field names separated by underscores
				$result = update_field( $field_key, $field_value, $post_id );
				
				// If direct update fails, try alternative parsing methods
				// This handles edge cases where ACF might not recognize the field path format
				if ( $result === false && strpos( $field_key, '_' ) !== false ) {
					bop_save_nested_acf_field( $post_id, $field_key, $field_value );
				}
			}
		}

		// Save regular WordPress post meta fields
		// These are simple key-value pairs stored in wp_postmeta table
		foreach ( $meta_fields as $key => $value ) {
			update_post_meta( $post_id, $key, $value );
		}
	}

	fclose( $handle );

	return $stats;
}

/**
 * Find a CPT post by matching field
 *
 * Searches for an existing post in the specified Custom Post Type based on the match field.
 * Used during CSV import to determine if a post should be updated or created.
 *
 * @param string $post_type   Post type to search (e.g., 'stillphotojournalism', 'award')
 * @param string $match_field Field to match by:
 *                           - 'title': Match by exact post title
 *                           - 'slug': Match by post slug (post_name)
 *                           - 'id': Match by post ID
 *                           - 'custom_field': Match by custom field value (meta_query)
 * @param array  $row         CSV row data (associative array of column => value)
 * @param string $post_title  Post title from CSV (used for title and slug matching)
 * @return WP_Post|null The matching post object or null if not found
 */
function bop_find_cpt_post_by_field( $post_type, $match_field, $row, $post_title = '' ) {
	$post = null;

	switch ( $match_field ) {
		case 'title':
			if ( ! empty( $post_title ) ) {
				$args = array(
					'post_type'      => $post_type,
					'post_status'    => 'any',
					'posts_per_page' => 1,
					'title'          => $post_title,
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
					$post = $query->posts[0];
				}
			}
			break;

		case 'slug':
			$slug = '';
			if ( isset( $row['slug'] ) ) {
				$slug = $row['slug'];
			} elseif ( isset( $row['post_name'] ) ) {
				$slug = $row['post_name'];
			} elseif ( ! empty( $post_title ) ) {
				$slug = sanitize_title( $post_title );
			}
			
			if ( ! empty( $slug ) ) {
				$post = get_page_by_path( $slug, OBJECT, $post_type );
			}
			break;

		case 'id':
			$post_id = 0;
			if ( isset( $row['id'] ) ) {
				$post_id = intval( $row['id'] );
			} elseif ( isset( $row['post_id'] ) ) {
				$post_id = intval( $row['post_id'] );
			}
			
			if ( $post_id > 0 ) {
				$post = get_post( $post_id );
				if ( $post && $post->post_type !== $post_type ) {
					$post = null;
				}
			}
			break;

		case 'custom_field':
			// Match by a custom field - need to specify which field in the CSV
			// For now, try common field names
			$match_value = '';
			$match_key = '';
			
			// Try to find a field that might be used for matching
			if ( isset( $row['match_field'] ) ) {
				$match_value = $row['match_field'];
			} elseif ( isset( $row['unique_id'] ) ) {
				$match_key = 'unique_id';
				$match_value = $row['unique_id'];
			} elseif ( isset( $row['slug'] ) ) {
				$match_key = 'slug';
				$match_value = $row['slug'];
			}
			
			if ( ! empty( $match_value ) && ! empty( $match_key ) ) {
				$args = array(
					'post_type'      => $post_type,
					'post_status'    => 'any',
					'posts_per_page' => 1,
					'meta_query'     => array(
						array(
							'key'   => $match_key,
							'value' => $match_value,
						),
					),
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
					$post = $query->posts[0];
				}
			}
			break;
	}

	return $post;
}

/**
 * Set featured image from URL or file path
 *
 * Handles setting the post thumbnail (featured image) from various sources:
 * - Attachment ID (if already in media library)
 * - URL (downloads and imports to media library)
 * - File path (uploads from local filesystem)
 *
 * @param int    $post_id          Post ID to set featured image for
 * @param string $image_url_or_path Can be:
 *                                  - Numeric string: Attachment ID
 *                                  - URL: Full URL to image (will be downloaded)
 *                                  - File path: Relative or absolute path to image file
 * @return int|false Attachment ID on success, false on failure
 */
function bop_set_featured_image_from_url( $post_id, $image_url_or_path ) {
	// Check if value is already an attachment ID (numeric string)
	if ( is_numeric( $image_url_or_path ) ) {
		$attachment_id = intval( $image_url_or_path );
		// Verify it's a valid attachment post
		if ( get_post( $attachment_id ) && get_post_type( $attachment_id ) === 'attachment' ) {
			set_post_thumbnail( $post_id, $attachment_id );
			return $attachment_id;
		}
	}

	// Check if URL is already in media library (by URL)
	// This avoids re-downloading images that are already imported
	$attachment_id = attachment_url_to_postid( $image_url_or_path );
	if ( $attachment_id ) {
		set_post_thumbnail( $post_id, $attachment_id );
		return $attachment_id;
	}

	// Try to resolve file path or download URL
	$file_path = $image_url_or_path;
	if ( filter_var( $image_url_or_path, FILTER_VALIDATE_URL ) ) {
		// It's a URL: download it and import to media library
		// WordPress requires these files for media handling
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );
		require_once( ABSPATH . 'wp-admin/includes/image.php' );

		// Download URL to temporary file
		$tmp = download_url( $image_url_or_path );
		if ( is_wp_error( $tmp ) ) {
			return false; // Download failed
		}

		// Prepare file array for media_handle_sideload()
		$file_array = array(
			'name'     => basename( $image_url_or_path ), // Original filename
			'tmp_name' => $tmp, // Temporary file path
		);

		// Import to media library and attach to post
		$attachment_id = media_handle_sideload( $file_array, $post_id );
		if ( is_wp_error( $attachment_id ) ) {
			@unlink( $tmp ); // Clean up temp file on error
			return false;
		}

		// Set as featured image
		set_post_thumbnail( $post_id, $attachment_id );
		return $attachment_id;
	} else {
		// It's a file path: try to resolve and upload from local filesystem
		// Uses helper function from csvlistimport.php to resolve relative paths
		$resolved_path = bop_resolve_csv_file_path( $image_url_or_path );
		if ( $resolved_path && file_exists( $resolved_path ) ) {
			// WordPress requires these files for media handling
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			require_once( ABSPATH . 'wp-admin/includes/media.php' );
			require_once( ABSPATH . 'wp-admin/includes/image.php' );

			// Prepare file array for media_handle_sideload()
			$file_array = array(
				'name'     => basename( $resolved_path ),
				'tmp_name' => $resolved_path,
			);

			// Import to media library and attach to post
			$attachment_id = media_handle_sideload( $file_array, $post_id );
			if ( ! is_wp_error( $attachment_id ) ) {
				set_post_thumbnail( $post_id, $attachment_id );
				return $attachment_id;
			}
		}
	}

	return false;
}

/**
 * Save nested ACF field by parsing the field path
 *
 * Handles nested ACF group fields when direct update_field() fails.
 * Supports field paths like: winning_images_first_place_group_first_name
 * which represents: winning_images > first_place_group > first_name
 *
 * This function tries multiple formats to ensure compatibility with different
 * ACF field naming conventions and CSV column formats.
 *
 * @param int    $post_id    Post ID to save field to
 * @param string $field_path Field path from CSV (e.g., "winning_images_first_place_group_first_name")
 * @param mixed  $value      Field value to save
 * @return bool True on success, false on failure
 */
function bop_save_nested_acf_field( $post_id, $field_path, $value ) {
	// Ensure ACF is available
	if ( ! function_exists( 'update_field' ) ) {
		return false;
	}

	// Try direct update first (ACF might handle underscore-separated paths)
	$result = update_field( $field_path, $value, $post_id );
	if ( $result !== false ) {
		return true;
	}

	// ACF uses field names separated by underscores for nested groups
	// The field path format is: parent_group_child_group_field_name
	// Try with field name directly (in case ACF recognizes it)
	$result = update_field( $field_path, $value, $post_id );
	if ( $result !== false ) {
		return true;
	}

	// Fallback: try alternative separator formats
	// Some systems use '>' or other separators for nested field paths
	$alternatives = array(
		str_replace( '_', '>', $field_path ), // winning_images>first_place_group>first_name
	);
	
	foreach ( $alternatives as $alt_path ) {
		$result = update_field( $alt_path, $value, $post_id );
		if ( $result !== false ) {
			return true;
		}
	}

	// All attempts failed
	return false;
}

