# 2025 BOP Webflow Theme

WordPress theme for the 2025 NPPA Best of Photojournalism (BOP) contest.

## Theme Information

- **Theme Name:** 2025 BOP Webflow Theme
- **Version:** 1.1.0
- **Author:** SG Media Group
- **Author URI:** http://sgmediagroup.com
- **Theme URI:** http://bop.nppa.org
- **Requires at least:** WordPress 5.0
- **Tested up to:** WordPress 5.2
- **Requires PHP:** 7.0+
- **License:** GNU General Public License v2 or later
- **Text Domain:** bop-webflow-theme

## Description

This is the theme for the 2025 NPPA BOP contest, built with Webflow integration and custom functionality for contest entries, winners, and awards. The theme follows WordPress coding standards and security best practices.

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

All custom functions are thoroughly documented with PHPDoc comments following WordPress coding standards.

## Installation

1. Upload the theme folder to `/wp-content/themes/`
2. Activate the theme through the 'Appearance' menu in WordPress
3. Configure theme options as needed
4. Install and activate Advanced Custom Fields (ACF) plugin

## Requirements

- WordPress 5.0 or higher
- PHP 7.0 or higher
- Advanced Custom Fields (ACF) plugin

## Development

### Code Standards

This theme follows:
- [WordPress PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
- [WordPress JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/)
- [WordPress CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/)

### File Structure

```
bop-webflow-theme-2025/
├── functions.php              # Core theme setup
├── inc/
│   ├── custom.php             # All custom functions (main file)
│   ├── template-tags.php      # Template tag functions
│   ├── template-functions.php # Utility functions
│   └── customizer.php         # Customizer options
├── partials/                   # Template partials
├── page-templates/            # Custom page templates
├── unused_backups_off/        # Backup files (not in use, excluded from git)
└── ...
```

**Note**: The `unused_backups_off/` directory contains backup files and old versions that are no longer used. This directory is excluded from version control to keep the repository clean.

## Changelog

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

**Features:**
- Updated for 2025 BOP contest
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
