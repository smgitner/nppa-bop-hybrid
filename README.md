# BOP Theme 2026

WordPress theme for the 2026 NPPA Best of Photojournalism (BOP) contest.

## Theme Information

- **Theme Name:** BOP Theme 2026
- **Version:** 1.3.0
- **Author:** SG Media Group
- **Author URI:** http://sgmediagroup.com
- **Theme URI:** http://bop.nppa.org
- **Requires at least:** WordPress 6.8
- **Tested up to:** WordPress 6.8
- **Requires PHP:** 8.2+
- **License:** GNU General Public License v2 or later
- **Text Domain:** bop-webflow-theme

## Description

This is the theme for the 2026 NPPA BOP contest, built with Webflow integration and custom functionality for contest entries, winners, and awards. The theme follows WordPress coding standards and security best practices.

## Features

- Custom post types for contest entries
- Awards and winners display
- Picture editing contest support
- Video journalism support
- Still photojournalism support
- Custom templates for various contest divisions
- Lightbox gallery functionality
- Responsive design
- Advanced Custom Fields (ACF) integration
- IPTC metadata extraction for image alt text
- Custom admin menu organization
- Responsive image support
- **CSV Import Functionality:**
  - Import CSV data into posts/pages for list display
  - Import/update Custom Post Type posts from CSV
  - Import mega menu structure from CSV
  - Support for nested ACF group fields
  - Automatic post matching and updating
  - Featured image import from URLs or file paths
  - Desktop file upload support (upload CSV files directly from computer)
  - Example CSV file upload/download for admins
  - Admin interface under Site Options menu
- **Winners Display:**
  - Display all winners from all categories
  - Organized by category with places (1st, 2nd, 3rd, HM) within each category
  - Category featured images (500px wide)
  - Links to entry pages
  - Responsive design with minimum 2rem font size

## Security

This theme follows WordPress security best practices:

- **Input Sanitization**: All user inputs are properly sanitized using WordPress functions (`sanitize_text_field()`, etc.)
- **Output Escaping**: All output is properly escaped using WordPress functions (`esc_attr()`, `esc_html()`, etc.)
- **No Direct Database Queries**: Uses WordPress APIs exclusively (no direct `$wpdb` queries)
- **No Dangerous Functions**: No use of `eval()`, `exec()`, `system()`, or other dangerous PHP functions
- **XSS Protection**: All user-generated content is escaped before output
- **WordPress APIs**: Uses WordPress core functions for all operations

## Code Organization

The theme is organized for maintainability:

- **`functions.php`**: Core WordPress theme setup only (theme support, widgets, basic scripts)
- **`inc/custom.php`**: All custom functionality consolidated in one well-documented file
- **`inc/template-tags.php`**: Template tag functions for use in theme templates
- **`inc/template-functions.php`**: Utility functions that enhance WordPress
- **`inc/customizer.php`**: WordPress Customizer options
- **`inc/csvlistimport.php`**: CSV import functionality for posts/pages (list display)
- **`inc/cpt-csv-import.php`**: CSV import functionality for Custom Post Types

All custom functions are thoroughly documented with PHPDoc comments following WordPress coding standards.

## Installation

1. Upload the theme folder to `/wp-content/themes/`
2. Activate the theme through the 'Appearance' menu in WordPress
3. Configure theme options as needed
4. Install and activate Advanced Custom Fields (ACF) plugin

## Requirements

- WordPress 6.8 or higher
- PHP 8.2 or higher
- Advanced Custom Fields (ACF) plugin

## Development

### Code Standards

This theme follows:
- [WordPress PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
- [WordPress JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/)
- [WordPress CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/)

### File Structure

```
bop-webflow-theme-2026/
├── functions.php              # Core theme setup
├── inc/
│   ├── custom.php             # All custom functions (main file)
│   ├── template-tags.php      # Template tag functions
│   ├── template-functions.php # Utility functions
│   ├── customizer.php         # Customizer options
│   ├── csvlistimport.php      # CSV import for posts/pages (list display)
│   └── cpt-csv-import.php      # CSV import for Custom Post Types
├── partials/                   # Template partials
├── page-templates/            # Custom page templates
│   └── template-csv-list.php  # Template for displaying CSV list data
├── imports/                    # CSV import files directory
├── acf-json/                   # ACF field group JSON exports
├── unused_backups_off/        # Backup files (not in use, excluded from git)
└── ...
```

**Note**: The `unused_backups_off/` directory contains backup files and old versions that are no longer used. This directory is excluded from version control to keep the repository clean.

## CSV Import Features

### CSV List Import
Import CSV data into posts/pages to display as lists with featured images. Accessible via:
- **Admin Location:** Site Options → Import CSV List
- **Meta Box:** Available on post/page edit screens
- **Template:** Use "CSV List" page template or `[bop_csv_list]` shortcode
- **CSV Format:** Requires `division`, `category`, and `category_url` columns

### CPT CSV Import
Import/update Custom Post Type posts from CSV files. Supports:
- **Admin Location:** Site Options → Import CPT from CSV
- **Post Matching:** By title, slug, ID, or custom field
- **ACF Support:** Handles nested ACF group fields (e.g., `winning_images_first_place_group_first_name`)
- **Image Import:** Featured images from URLs or file paths
- **Update/Create:** Update existing posts or create new ones

### CSV Format Examples

**For CSV List Import:**
```csv
division,category,category_url
Still Photojournalism,Photojournalist of the Year - International,photojournalist_of_the_year_international
```

**For CPT Import (Still Photojournalism example):**
```csv
title,winning_images_first_place_group_first_name,winning_images_first_place_group_last_name,winning_images_first_place_group_publication
Contest Entry,John,Doe,The New York Times
```

## Changelog

### 1.3.0 (Current)

**New Features:**
- **Winners Display Page**: New `page-winners.php` template that displays all winners from all categories, organized by category with places (1st, 2nd, 3rd, HM) shown within each category
- **Example CSV Upload**: Admins can now upload example CSV files for download on all CSV import pages (Mega Menu, CSV List, CPT Import)
- **CSV File Upload**: All CSV import pages now support direct file uploads from user's desktop in addition to server file paths
- **Standardized Headers/Footers**: All page and single post templates now use consistent header and footer
- **Debug Log Path Fix**: Automatic fix for production server paths in debug log plugins for local development

**Improvements:**
- Enhanced CSV import with desktop file upload support
- Improved winners display with category grouping and featured images
- Better error handling for JSON responses during publishing
- Fixed REST API accessibility issues

**Code Organization:**
- Added `bop_display_all_winners()` function to display all winners by category
- Enhanced CSV import pages with example file upload functionality
- Standardized all template headers and footers

### 1.2.0

**New Features:**
- Added CSV import functionality for posts/pages (list display)
- Added CSV import functionality for Custom Post Types
- Support for nested ACF group fields in CSV imports
- Featured image import from URLs or file paths
- Admin interface under Site Options menu
- CSV List page template and shortcode
- Automatic post matching and updating

**Code Organization:**
- Created `inc/csvlistimport.php` for CSV list import functionality
- Created `inc/cpt-csv-import.php` for CPT CSV import functionality
- Created `page-templates/template-csv-list.php` for list display
- Added comprehensive PHPDoc comments throughout new files
- Enhanced code documentation and inline comments

### 1.1.0 (November 2025)

**Security Improvements:**
- Fixed XSS vulnerability in navigation link filters
- Added proper escaping for all user-generated content
- Enhanced input sanitization throughout the theme

**Code Organization:**
- Consolidated all custom functions into `inc/custom.php`
- Removed unused files (bop-tweaks.php, tweaktesting.php, etc.)
- Moved all backup files to `unused_backups_off/` directory
- Improved code organization and maintainability
- Added comprehensive PHPDoc comments throughout
- Updated `.gitignore` to exclude backup file patterns
- Renamed theme directory from `bop-webflow-theme-2025` to `bop-webflow-theme-2026`

**Features:**
- Updated for 2026 BOP contest
- Webflow integration
- Custom post types and templates
- Responsive image helper function
- IPTC metadata extraction for images
- Custom admin menu organization
- Comment system removal
- Editor customizations

### 1.0.0 (May 12, 2015)
- Initial release

## Credits

- Based on Underscores https://underscores.me/, (C) 2012-2017 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
- normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)

## Support

For support or questions about this theme, please contact SG Media Group.

## License

This theme, like WordPress, is licensed under the GPL.
Use it to make something cool, have fun, and share what you've learned with others.
