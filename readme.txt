=== bop-webflow-theme ===

Contributors: @sethgitner, SG Media Group
Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready

Requires at least: 5.0
Tested up to: 5.2
Stable tag: 1.1.0
License: GNU General Public License v2 or later
License URI: LICENSE

WordPress theme for the 2025 NPPA Best of Photojournalism (BOP) contest.

== Description ==

This is the theme for the 2025 NPPA BOP contest, built with Webflow integration and custom functionality for contest entries, winners, and awards. Features include custom post types, awards display, picture editing contest support, video journalism support, and responsive design.

The theme follows WordPress coding standards and security best practices, with all custom functions consolidated and thoroughly documented.

== Installation ==

1. Upload the theme folder to `/wp-content/themes/`
2. Activate the theme through the 'Appearance' menu in WordPress
3. Install and activate Advanced Custom Fields (ACF) plugin
4. Configure theme options as needed

== Security ==

This theme follows WordPress security best practices:

* All user inputs are properly sanitized
* All output is properly escaped to prevent XSS attacks
* Uses WordPress APIs exclusively (no direct database queries)
* No dangerous PHP functions
* Follows WordPress coding standards

== Frequently Asked Questions ==

= Does this theme support any plugins? =

bop_theme includes support for Infinite Scroll in Jetpack and requires Advanced Custom Fields (ACF).

= Is this theme secure? =

Yes. The theme follows WordPress security best practices including proper input sanitization, output escaping, and uses WordPress APIs exclusively. All user-generated content is properly escaped to prevent XSS attacks.

= Where are custom functions located? =

All custom functions are consolidated in `/inc/custom.php` for easy maintenance and updates. Core theme setup is in `functions.php`.

== Changelog ==

= 1.1.0 - November 2025 =

Security Improvements:
* Fixed XSS vulnerability in navigation link filters
* Added proper escaping for all user-generated content
* Enhanced input sanitization throughout the theme

Code Organization:
* Consolidated all custom functions into inc/custom.php
* Removed unused files for better maintainability
* Added comprehensive PHPDoc comments throughout
* Improved code organization and structure

Features:
* Updated for 2025 BOP contest
* Webflow integration
* Custom post types and templates
* Responsive image helper function
* IPTC metadata extraction for images
* Custom admin menu organization
* Comment system removal
* Editor customizations

= 1.0 - May 12 2015 =
* Initial release

== Credits ==

* Based on Underscores https://underscores.me/, (C) 2012-2017 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
