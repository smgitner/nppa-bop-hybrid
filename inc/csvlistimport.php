<?php
/**
 * CSV Import Functionality for Posts
 *
 * This file contains all functions related to importing CSV data into posts
 * and displaying it as a list with matching post names and featured images.
 *
 * @package bop_theme
 * @since 1.0.0
 */

/* ============================================================================
 * CSV IMPORT FUNCTIONALITY FOR POSTS
 * ============================================================================
 * Allows importing CSV data into a single post and displaying it as a list
 * with matching post names and featured images.
 * ============================================================================ */

/**
 * Add meta box for CSV import on posts and pages
 *
 * Hook: add_meta_boxes
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return void
 */
function bop_add_csv_import_meta_box() {
	$post_types = array( 'post', 'page' );
	foreach ( $post_types as $post_type ) {
		add_meta_box(
			'bop_csv_import',
			__( 'CSV Import', 'bop_theme' ),
			'bop_csv_import_meta_box_callback',
			$post_type,
			'normal',
			'high'
		);
	}
}
add_action( 'add_meta_boxes', 'bop_add_csv_import_meta_box' );

/**
 * Meta box callback for CSV import
 *
 * @param WP_Post $post The current post object
 * @return void
 */
function bop_csv_import_meta_box_callback( $post ) {
	wp_nonce_field( 'bop_csv_import_action', 'bop_csv_import_nonce' );
	
	$csv_data = get_post_meta( $post->ID, '_bop_csv_data', true );
	$csv_file_path = get_post_meta( $post->ID, '_bop_csv_file_path', true );
	
	?>
	<div class="bop-csv-import-wrapper">
		<p>
			<label for="bop_csv_file_upload">
				<strong><?php esc_html_e( 'CSV File:', 'bop_theme' ); ?></strong>
			</label>
			<br>
			<input type="file" 
			       id="bop_csv_file_upload" 
			       name="bop_csv_file_upload" 
			       accept=".csv" 
			       class="regular-text">
			<br>
			<small><?php esc_html_e( 'Upload a CSV file from your computer.', 'bop_theme' ); ?></small>
		</p>
		
		<p>
			<label for="bop_csv_file_path">
				<strong><?php esc_html_e( 'Or CSV File Path:', 'bop_theme' ); ?></strong>
			</label>
			<br>
			<input type="text" 
			       id="bop_csv_file_path" 
			       name="bop_csv_file_path" 
			       value="<?php echo esc_attr( $csv_file_path ); ?>" 
			       class="large-text" 
			       placeholder="<?php esc_attr_e( 'e.g., imports/bop_winners_with_category_urls.csv', 'bop_theme' ); ?>">
			<br>
			<small><?php esc_html_e( 'Alternatively, enter the path relative to theme directory (e.g., imports/file.csv) or absolute path.', 'bop_theme' ); ?></small>
		</p>
		
		<p>
			<button type="button" 
			        id="bop_import_csv_btn" 
			        class="button button-primary">
				<?php esc_html_e( 'Import CSV', 'bop_theme' ); ?>
			</button>
			<span id="bop_csv_import_status" style="margin-left: 10px;"></span>
		</p>
		
		<?php if ( $csv_data && is_array( $csv_data ) ) : ?>
			<p>
				<strong><?php esc_html_e( 'Imported Rows:', 'bop_theme' ); ?></strong> <?php echo count( $csv_data ); ?>
			</p>
		<?php endif; ?>
		
		<div id="bop_csv_preview" style="margin-top: 20px; max-height: 300px; overflow-y: auto;">
			<?php if ( $csv_data && is_array( $csv_data ) ) : ?>
				<table class="widefat">
					<thead>
						<tr>
							<th><?php esc_html_e( 'Division', 'bop_theme' ); ?></th>
							<th><?php esc_html_e( 'Category', 'bop_theme' ); ?></th>
							<th><?php esc_html_e( 'Category URL', 'bop_theme' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( array_slice( $csv_data, 0, 10 ) as $row ) : ?>
							<tr>
								<td><?php echo esc_html( $row['division'] ); ?></td>
								<td><?php echo esc_html( $row['category'] ); ?></td>
								<td><?php echo esc_html( $row['category_url'] ); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php if ( count( $csv_data ) > 10 ) : ?>
					<p><em><?php esc_html_e( 'Showing first 10 rows...', 'bop_theme' ); ?></em></p>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
	
	<script>
	jQuery(document).ready(function($) {
		$('#bop_import_csv_btn').on('click', function(e) {
			e.preventDefault();
			var fileInput = $('#bop_csv_file_upload')[0];
			var filePath = $('#bop_csv_file_path').val();
			var postId = <?php echo intval( $post->ID ); ?>;
			var statusEl = $('#bop_csv_import_status');
			
			// Check if file is selected or path is entered
			if (!fileInput.files.length && !filePath) {
				statusEl.html('<span style="color: red;">Please select a CSV file or enter a file path.</span>');
				return;
			}
			
			statusEl.html('<span style="color: blue;">Importing...</span>');
			
			// Prepare form data
			var formData = new FormData();
			formData.append('action', 'bop_import_csv');
			formData.append('post_id', postId);
			formData.append('nonce', '<?php echo wp_create_nonce( 'bop_csv_import_ajax' ); ?>');
			
			// Add file if selected
			if (fileInput.files.length) {
				formData.append('csv_file', fileInput.files[0]);
			} else if (filePath) {
				formData.append('file_path', filePath);
			}
			
			$.ajax({
				url: ajaxurl,
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					if (response.success) {
						statusEl.html('<span style="color: green;">Import successful! ' + response.data.count + ' rows imported. Please refresh the page.</span>');
						setTimeout(function() {
							location.reload();
						}, 1500);
					} else {
						statusEl.html('<span style="color: red;">Error: ' + response.data + '</span>');
					}
				},
				error: function() {
					statusEl.html('<span style="color: red;">AJAX error occurred.</span>');
				}
			});
		});
	});
	</script>
	<?php
}

/**
 * Save CSV file path on post save
 *
 * Hook: save_post
 * Priority: Default (10)
 *
 * @param int $post_id The post ID
 * @return void
 */
function bop_save_csv_import_meta( $post_id ) {
	// Check nonce
	if ( ! isset( $_POST['bop_csv_import_nonce'] ) || 
	     ! wp_verify_nonce( $_POST['bop_csv_import_nonce'], 'bop_csv_import_action' ) ) {
		return;
	}
	
	// Check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	
	// Check permissions
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	// Save CSV file path
	if ( isset( $_POST['bop_csv_file_path'] ) ) {
		update_post_meta( $post_id, '_bop_csv_file_path', sanitize_text_field( $_POST['bop_csv_file_path'] ) );
	}
}
add_action( 'save_post', 'bop_save_csv_import_meta' );

/**
 * AJAX handler for CSV import
 *
 * Hook: wp_ajax_bop_import_csv
 * Priority: Default (10)
 *
 * @return void
 */
function bop_ajax_import_csv() {
	// Verify nonce
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'bop_csv_import_ajax' ) ) {
		wp_send_json_error( 'Invalid nonce' );
	}
	
	// Check permissions
	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_send_json_error( 'Insufficient permissions' );
	}
	
	$post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;
	$csv_file_path = null;
	
	if ( ! $post_id ) {
		wp_send_json_error( 'Post ID is required' );
	}
	
	// Check if file was uploaded
	if ( isset( $_FILES['csv_file'] ) && ! empty( $_FILES['csv_file']['tmp_name'] ) ) {
		// Use uploaded file
		$csv_file_path = $_FILES['csv_file']['tmp_name'];
	} elseif ( isset( $_POST['file_path'] ) && ! empty( $_POST['file_path'] ) ) {
		// Fallback to file path (for backward compatibility)
		$file_path = sanitize_text_field( $_POST['file_path'] );
		$csv_file_path = bop_resolve_csv_file_path( $file_path );
	}
	
	if ( empty( $csv_file_path ) ) {
		wp_send_json_error( 'Please select a CSV file to upload or enter a file path' );
	}
	
	if ( ! file_exists( $csv_file_path ) ) {
		wp_send_json_error( 'File not found' );
	}
	
	// Import CSV
	$result = bop_import_csv_to_post( $csv_file_path, $post_id );
	
	if ( is_wp_error( $result ) ) {
		wp_send_json_error( $result->get_error_message() );
	}
	
	wp_send_json_success( array( 'count' => count( $result ) ) );
}
add_action( 'wp_ajax_bop_import_csv', 'bop_ajax_import_csv' );

/**
 * Resolve CSV file path (absolute or relative to WordPress root)
 *
 * Attempts to resolve a file path that may be:
 * - An absolute path
 * - Relative to the theme directory
 * - Relative to the WordPress root directory
 *
 * This function tries multiple locations to find the CSV file, making it
 * flexible for different file organization strategies.
 *
 * @param string $file_path The file path to resolve (e.g., "imports/file.csv" or "/absolute/path/file.csv")
 * @return string|false The resolved absolute path or false if file not found
 */
function bop_resolve_csv_file_path( $file_path ) {
	// If it's already an absolute path and exists, return it
	if ( file_exists( $file_path ) ) {
		return realpath( $file_path );
	}
	
	// Try relative to theme directory (e.g., imports/file.csv -> /theme/imports/file.csv)
	$theme_path = get_template_directory() . '/' . ltrim( $file_path, '/' );
	if ( file_exists( $theme_path ) ) {
		return realpath( $theme_path );
	}
	
	// Try relative to WordPress root (e.g., imports/file.csv -> /wp-root/imports/file.csv)
	$wp_root_path = ABSPATH . ltrim( $file_path, '/' );
	if ( file_exists( $wp_root_path ) ) {
		return realpath( $wp_root_path );
	}
	
	return false; // File not found in any location
}

/**
 * Import CSV data into post meta
 *
 * Reads a CSV file and imports the data into a post's meta fields.
 * The CSV should have columns: division, category, category_url.
 * 
 * Features:
 * - Case-insensitive header matching
 * - Duplicate detection and removal
 * - Empty row skipping
 * - Data normalization (trimming whitespace)
 *
 * @param string $csv_file_path Absolute path to CSV file
 * @param int    $post_id       Post ID to store data in
 * @return array|WP_Error Array of imported data (each item has division, category, category_url)
 *                        or WP_Error on failure
 */
function bop_import_csv_to_post( $csv_file_path, $post_id ) {
	// Validate file exists
	if ( ! file_exists( $csv_file_path ) ) {
		return new WP_Error( 'file_not_found', 'CSV file not found: ' . $csv_file_path );
	}
	
	// Open CSV file for reading
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
	
	// Normalize header keys: trim whitespace and convert to lowercase
	// This makes header matching case-insensitive (e.g., "Division" or "division" both work)
	$header = array_map( 'trim', $header );
	$header = array_map( 'strtolower', $header );
	
	$csv_data = array();
	$seen_items = array(); // Track items to avoid duplicates
	
	// Read CSV data row by row
	while ( ( $data = fgetcsv( $handle ) ) !== false ) {
		// Skip rows with insufficient columns (need at least division, category, category_url)
		if ( count( $data ) < 3 ) {
			continue;
		}
		
		// Map CSV columns to header keys (associative array)
		$row = array();
		foreach ( $header as $index => $key ) {
			// Trim whitespace from values, use empty string if column doesn't exist
			$row[ $key ] = isset( $data[ $index ] ) ? trim( $data[ $index ] ) : '';
		}
		
		// Extract key fields (handle different column name variations)
		$division = isset( $row['division'] ) ? $row['division'] : '';
		$category = isset( $row['category'] ) ? $row['category'] : '';
		$category_url = isset( $row['category_url'] ) ? $row['category_url'] : '';
		
		// Skip empty rows (all three fields must have values)
		if ( empty( $division ) || empty( $category ) || empty( $category_url ) ) {
			continue;
		}
		
		// Create unique key to detect duplicates
		// Uses pipe separator to combine all three fields
		$item_key = $division . '|' . $category . '|' . $category_url;
		if ( isset( $seen_items[ $item_key ] ) ) {
			continue; // Skip duplicate rows
		}
		$seen_items[ $item_key ] = true;
		
		// Store row data in standardized format
		$csv_data[] = array(
			'division'     => $division,
			'category'     => $category,
			'category_url' => $category_url,
		);
	}
	
	// Close file handle
	fclose( $handle );
	
	// Save imported data to post meta
	// Uses underscore prefix to indicate private meta (not displayed in custom fields UI)
	update_post_meta( $post_id, '_bop_csv_data', $csv_data );
	
	return $csv_data;
}

/**
 * Display CSV data as a list with matching post names and featured images
 *
 * Retrieves CSV data from post meta and displays it as an HTML list.
 * For each CSV row, attempts to find a matching WordPress post by category_url
 * and displays the post's title, link, and featured image.
 *
 * If no matching post is found, displays the category name and URL instead.
 *
 * @param int $post_id Optional post ID. If not provided, uses current post from global $post.
 * @return string HTML output containing the formatted list
 */
function bop_display_csv_list( $post_id = null ) {
	if ( ! $post_id ) {
		global $post;
		$post_id = $post->ID;
	}
	
	$csv_data = get_post_meta( $post_id, '_bop_csv_data', true );
	
	if ( ! $csv_data || ! is_array( $csv_data ) || empty( $csv_data ) ) {
		return '<p>' . esc_html__( 'No CSV data found. Please import a CSV file first.', 'bop_theme' ) . '</p>';
	}
	
	$output = '<ul class="bop-csv-list">';
	
	foreach ( $csv_data as $row ) {
		$category_url = $row['category_url'];
		$category_name = $row['category'];
		
		// Try to find matching post by category_url
		$matching_post = bop_find_post_by_category_url( $category_url );
		
		$output .= '<li class="bop-csv-item">';
		
		if ( $matching_post ) {
			// Display post name and featured image
			$post_title = get_the_title( $matching_post->ID );
			$post_link = get_permalink( $matching_post->ID );
			$featured_image = get_the_post_thumbnail( $matching_post->ID, 'medium' );
			
			$output .= '<div class="bop-csv-item-content">';
			
			if ( $featured_image ) {
				$output .= '<div class="bop-csv-item-image">';
				$output .= '<a href="' . esc_url( $post_link ) . '">' . $featured_image . '</a>';
				$output .= '</div>';
			}
			
			$output .= '<div class="bop-csv-item-info">';
			$output .= '<h3><a href="' . esc_url( $post_link ) . '">' . esc_html( $post_title ) . '</a></h3>';
			$output .= '<p class="bop-csv-category">' . esc_html( $category_name ) . '</p>';
			$output .= '</div>';
			
			$output .= '</div>';
		} else {
			// No matching post found, just show category name
			$output .= '<div class="bop-csv-item-content">';
			$output .= '<div class="bop-csv-item-info">';
			$output .= '<h3>' . esc_html( $category_name ) . '</h3>';
			$output .= '<p class="bop-csv-category-url">' . esc_html__( 'Category URL:', 'bop_theme' ) . ' ' . esc_html( $category_url ) . '</p>';
			$output .= '</div>';
			$output .= '</div>';
		}
		
		$output .= '</li>';
	}
	
	$output .= '</ul>';
	
	return $output;
}

/**
 * Find a post by category URL (matching slug or custom field)
 *
 * @param string $category_url The category URL slug to search for
 * @return WP_Post|null The matching post or null if not found
 */
function bop_find_post_by_category_url( $category_url ) {
	if ( empty( $category_url ) ) {
		return null;
	}
	
	// First, try to find by post slug
	$post = get_page_by_path( $category_url, OBJECT, array( 'post', 'page' ) );
	if ( $post ) {
		return $post;
	}
	
	// Try to find by custom post types
	$post_types = get_post_types( array( 'public' => true ), 'names' );
	
	foreach ( $post_types as $post_type ) {
		$post = get_page_by_path( $category_url, OBJECT, $post_type );
		if ( $post ) {
			return $post;
		}
	}
	
	// Try to find by meta value (if category_url is stored in a custom field)
	$args = array(
		'post_type'      => 'any',
		'posts_per_page' => 1,
		'meta_query'     => array(
			'relation' => 'OR',
			array(
				'key'   => 'category_url',
				'value' => $category_url,
			),
			array(
				'key'   => '_category_url',
				'value' => $category_url,
			),
		),
	);
	
	$query = new WP_Query( $args );
	
	if ( $query->have_posts() ) {
		return $query->posts[0];
	}
	
	// Try searching in post title or content
	$args = array(
		'post_type'      => 'any',
		'posts_per_page' => 1,
		's'              => $category_url,
	);
	
	$query = new WP_Query( $args );
	
	if ( $query->have_posts() ) {
		return $query->posts[0];
	}
	
	return null;
}

/**
 * Shortcode to display CSV list
 *
 * Usage: [bop_csv_list] or [bop_csv_list post_id="123"]
 *
 * @param array $atts Shortcode attributes
 * @return string HTML output
 */
function bop_csv_list_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'post_id' => null,
		),
		$atts,
		'bop_csv_list'
	);
	
	$post_id = ! empty( $atts['post_id'] ) ? intval( $atts['post_id'] ) : null;
	
	return bop_display_csv_list( $post_id );
}
add_shortcode( 'bop_csv_list', 'bop_csv_list_shortcode' );

/**
 * Enqueue CSV list styles
 *
 * Hook: wp_enqueue_scripts
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return void
 */
function bop_enqueue_csv_list_styles() {
	if ( is_page_template( 'page-templates/template-csv-list.php' ) || is_singular() ) {
		wp_add_inline_style( 'style', '
			.bop-csv-list {
				list-style: none;
				padding: 0;
				margin: 0;
			}
			.bop-csv-item {
				margin-bottom: 2rem;
				padding-bottom: 2rem;
				border-bottom: 1px solid #e0e0e0;
			}
			.bop-csv-item:last-child {
				border-bottom: none;
				margin-bottom: 0;
				padding-bottom: 0;
			}
			.bop-csv-item-content {
				display: flex;
				align-items: flex-start;
				gap: 1.5rem;
			}
			.bop-csv-item-image {
				flex-shrink: 0;
			}
			.bop-csv-item-image img {
				width: 200px;
				height: auto;
				display: block;
				border-radius: 4px;
			}
			.bop-csv-item-info {
				flex: 1;
			}
			.bop-csv-item-info h3 {
				margin: 0 0 0.5rem 0;
				font-size: 1.5rem;
			}
			.bop-csv-item-info h3 a {
				text-decoration: none;
				color: inherit;
			}
			.bop-csv-item-info h3 a:hover {
				text-decoration: underline;
			}
			.bop-csv-category,
			.bop-csv-category-url {
				margin: 0.5rem 0 0 0;
				color: #666;
				font-size: 0.9rem;
			}
			@media (max-width: 768px) {
				.bop-csv-item-content {
					flex-direction: column;
				}
				.bop-csv-item-image img {
					width: 100%;
					max-width: 300px;
				}
			}
		' );
	}
}
add_action( 'wp_enqueue_scripts', 'bop_enqueue_csv_list_styles', 20 );

/* ============================================================================
 * ADMIN PAGE FOR CSV IMPORT (Site Options)
 * ============================================================================ */

/**
 * Add CSV Import admin page under Site Options
 *
 * Creates an admin page for importing CSV files into posts/pages.
 * This will appear as a submenu under Site Options if available,
 * otherwise as a standalone menu item.
 *
 * @since 1.0.0
 */
function bop_add_csv_import_admin_page() {
	global $submenu, $menu;
	
	// ACF creates the menu with menu_slug 'site-options'
	// WordPress converts it to a hook, try multiple possibilities
	$possible_parents = array(
		'acf-options-site-options',
		'site-options',
		'acf-options-site_options',
	);
	
	$parent_slug = 'acf-options-site-options'; // Default
	
	// Find the actual parent slug from submenu
	foreach ( $possible_parents as $possible ) {
		if ( isset( $submenu[ $possible ] ) ) {
			$parent_slug = $possible;
			break;
		}
	}
	
	// Also check menu items (top level)
	if ( $parent_slug === 'acf-options-site-options' ) {
		foreach ( $menu as $menu_item ) {
			if ( isset( $menu_item[2] ) && ( $menu_item[2] === 'site-options' || strpos( $menu_item[2], 'site-options' ) !== false ) ) {
				$parent_slug = $menu_item[2];
				break;
			}
		}
	}
	
	// Add as submenu - WordPress will handle if parent doesn't exist
	add_submenu_page(
		$parent_slug,
		'Import CSV List',
		'Import CSV List',
		'edit_posts',
		'import-csv-list',
		'bop_csv_import_admin_page_callback'
	);
}
// Use very high priority to ensure ACF has created the menu first
add_action( 'admin_menu', 'bop_add_csv_import_admin_page', 999 );

/**
 * CSV Import Admin Page Callback
 *
 * Displays the import page and handles CSV file path input and import.
 *
 * @since 1.0.0
 */
function bop_csv_import_admin_page_callback() {
	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}

	$message = '';
	$message_type = '';
	$imported_count = 0;
	$example_upload_message = '';

	// Handle example CSV upload
	if ( isset( $_POST['upload_example_csv'] ) && isset( $_FILES['example_csv_file'] ) && ! empty( $_FILES['example_csv_file']['tmp_name'] ) ) {
		check_admin_referer( 'bop_upload_example_csv_list' );
		
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
		$destination = $example_dir . '/csv-list-example.csv';
		if ( move_uploaded_file( $uploaded_file, $destination ) ) {
			update_option( 'bop_csv_list_example_csv', $uploads_dir['baseurl'] . '/csv-examples/csv-list-example.csv' );
			$example_upload_message = '<div class="notice notice-success is-dismissible"><p>Example CSV file uploaded successfully!</p></div>';
		} else {
			$example_upload_message = '<div class="notice notice-error is-dismissible"><p>Error uploading example CSV file.</p></div>';
		}
	}

	// Handle CSV import
	if ( isset( $_POST['bop_import_csv'] ) ) {
		check_admin_referer( 'bop_import_csv_admin' );

		$post_id = isset( $_POST['target_post_id'] ) ? intval( $_POST['target_post_id'] ) : 0;
		$csv_file_path = null;

		// Check if file was uploaded
		if ( isset( $_FILES['csv_file'] ) && ! empty( $_FILES['csv_file']['tmp_name'] ) ) {
			// Use uploaded file
			$csv_file_path = $_FILES['csv_file']['tmp_name'];
		} elseif ( isset( $_POST['csv_file_path'] ) && ! empty( $_POST['csv_file_path'] ) ) {
			// Fallback to file path (for backward compatibility)
			$file_path = sanitize_text_field( $_POST['csv_file_path'] );
			$csv_file_path = bop_resolve_csv_file_path( $file_path );
		}

		if ( empty( $csv_file_path ) ) {
			$message = 'Error: Please select a CSV file to upload or enter a file path.';
			$message_type = 'error';
		} elseif ( ! file_exists( $csv_file_path ) ) {
			$message = 'Error: File not found.';
			$message_type = 'error';
		} elseif ( empty( $post_id ) ) {
			$message = 'Error: Please select a target post or page.';
			$message_type = 'error';
		} else {
			// Import CSV
			$result = bop_import_csv_to_post( $csv_file_path, $post_id );

			if ( is_wp_error( $result ) ) {
				$message = 'Error: ' . $result->get_error_message();
				$message_type = 'error';
			} else {
				$imported_count = count( $result );
				$message = 'CSV imported successfully! ' . $imported_count . ' rows imported into "' . get_the_title( $post_id ) . '".';
				$message_type = 'success';
				
				// Save file info if uploaded
				if ( isset( $_FILES['csv_file'] ) && ! empty( $_FILES['csv_file']['name'] ) ) {
					update_post_meta( $post_id, '_bop_csv_file_path', 'uploaded: ' . sanitize_file_name( $_FILES['csv_file']['name'] ) );
				} elseif ( isset( $_POST['csv_file_path'] ) ) {
					update_post_meta( $post_id, '_bop_csv_file_path', sanitize_text_field( $_POST['csv_file_path'] ) );
				}
			}
		}
	}

	// Get all posts and pages for dropdown
	$posts = get_posts( array(
		'post_type'      => array( 'post', 'page' ),
		'posts_per_page' => -1,
		'post_status'    => 'any',
		'orderby'        => 'title',
		'order'          => 'ASC',
	) );
	?>
	<div class="wrap">
		<h1>Import CSV List</h1>
		
		<?php if ( $example_upload_message ) : ?>
			<?php echo $example_upload_message; ?>
		<?php endif; ?>
		
		<?php if ( $message ) : ?>
			<div class="notice notice-<?php echo esc_attr( $message_type === 'success' ? 'success' : 'error' ); ?> is-dismissible">
				<p><?php echo esc_html( $message ); ?></p>
			</div>
		<?php endif; ?>

		<div class="card">
			<h2>Related Tools</h2>
			<p>Other tools available under Site Options:</p>
			<ul>
				<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=acf-options-site-options' ) ); ?>"><strong>Site Options</strong></a> - Manage mega menu structure, navigation menus, and site-wide settings</li>
				<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=import-mega-menu' ) ); ?>"><strong>Import Mega Menu</strong></a> - Import mega menu data from CSV</li>
			</ul>
		</div>

		<div class="card" style="margin-top: 20px;">
			<h2>CSV Format</h2>
			<p>Your CSV file should have the following columns:</p>
			<ul>
				<li><strong>division</strong> - The division name (e.g., "Still Photojournalism", "Picture Editing")</li>
				<li><strong>category</strong> - The category name</li>
				<li><strong>category_url</strong> - The URL slug used to match posts</li>
			</ul>
			<p><strong>Note:</strong> The first row should be headers and will be skipped. Duplicate rows will be automatically removed.</p>
			
			<?php
			// Get example CSV URL
			$example_csv_url = get_option( 'bop_csv_list_example_csv' );
			?>
			
			<h3 style="margin-top: 20px;">Example CSV File</h3>
			<?php if ( $example_csv_url ) : ?>
				<p><a href="<?php echo esc_url( $example_csv_url ); ?>" class="button" download>Download Example CSV</a></p>
			<?php endif; ?>
			
			<form method="post" enctype="multipart/form-data" style="margin-top: 10px;">
				<?php wp_nonce_field( 'bop_upload_example_csv_list' ); ?>
				<input type="file" name="example_csv_file" id="example_csv_file" accept=".csv">
				<?php submit_button( 'Upload Example CSV', 'secondary', 'upload_example_csv', false ); ?>
				<p class="description">Upload an example CSV file that users can download as a template.</p>
			</form>
		</div>

		<form method="post" enctype="multipart/form-data" class="card" style="margin-top: 20px;">
			<?php wp_nonce_field( 'bop_import_csv_admin' ); ?>
			
			<table class="form-table">
				<tr>
					<th scope="row">
						<label for="csv_file">CSV File</label>
					</th>
					<td>
						<input type="file" 
						       name="csv_file" 
						       id="csv_file" 
						       accept=".csv" 
						       class="regular-text">
						<p class="description">Upload a CSV file from your computer. Maximum file size: <?php echo esc_html( size_format( wp_max_upload_size() ) ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="csv_file_path">Or CSV File Path</label>
					</th>
					<td>
						<input type="text" 
						       name="csv_file_path" 
						       id="csv_file_path" 
						       value="<?php echo isset( $_POST['csv_file_path'] ) ? esc_attr( $_POST['csv_file_path'] ) : ''; ?>" 
						       class="large-text" 
						       placeholder="e.g., imports/bop_winners_with_category_urls.csv">
						<p class="description">Alternatively, enter the path relative to theme directory (e.g., <code>imports/file.csv</code>) or absolute path.</p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="target_post_id">Target Post/Page</label>
					</th>
					<td>
						<select name="target_post_id" id="target_post_id" class="regular-text" required>
							<option value="">-- Select a Post or Page --</option>
							<?php foreach ( $posts as $post_item ) : ?>
								<option value="<?php echo esc_attr( $post_item->ID ); ?>" 
								        <?php selected( isset( $_POST['target_post_id'] ) ? intval( $_POST['target_post_id'] ) : 0, $post_item->ID ); ?>>
									<?php echo esc_html( $post_item->post_title ); ?> (<?php echo esc_html( ucfirst( $post_item->post_type ) ); ?>)
								</option>
							<?php endforeach; ?>
						</select>
						<p class="description">Select the post or page where the CSV data will be imported. This post will display the list when using the CSV List template or shortcode.</p>
					</td>
				</tr>
			</table>

			<?php submit_button( 'Import CSV', 'primary', 'bop_import_csv' ); ?>
		</form>

		<div class="card" style="margin-top: 20px;">
			<h2>How to Use</h2>
			<ol>
				<li>Upload a CSV file from your computer, or enter the path to a CSV file on the server</li>
				<li>Select the post or page where you want to import the CSV data</li>
				<li>Click "Import CSV" to import the data</li>
				<li>Edit the selected post/page and choose the "CSV List" template to display the imported list</li>
				<li>Alternatively, use the shortcode <code>[bop_csv_list]</code> in any post or page</li>
			</ol>
			<p><strong>Tip:</strong> After importing, you can also use the CSV Import meta box on individual posts/pages to re-import or update the data.</p>
		</div>
	</div>
	<?php
}
