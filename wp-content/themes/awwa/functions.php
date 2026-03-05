<?php
/*
 * Awwa Theme's Functions
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

/**
 * Define - Folder Paths
 */

define( 'AWWA_THEMEROOT_URI', get_template_directory_uri() );
define( 'AWWA_CSS', AWWA_THEMEROOT_URI . '/assets/css' );
define( 'AWWA_IMAGES', AWWA_THEMEROOT_URI . '/assets/images' );
define( 'AWWA_SCRIPTS', AWWA_THEMEROOT_URI . '/assets/js' );
define( 'AWWA_FRAMEWORK', get_template_directory() . '/includes' );
define( 'AWWA_LAYOUT', get_template_directory() . '/theme-layouts' );
define( 'AWWA_CS_IMAGES', AWWA_THEMEROOT_URI . '/includes/theme-options/framework-extend/images' );
define( 'AWWA_CS_FRAMEWORK', get_template_directory() . '/includes/theme-options/framework-extend' ); // Called in Icons field *.json
define( 'AWWA_ADMIN_PATH', get_template_directory() . '/includes/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$awwa_theme_child = wp_get_theme();
	$awwa_get_parent = $awwa_theme_child->Template;
	$awwa_theme = wp_get_theme($awwa_get_parent);
} else { // Parent Theme Active
	$awwa_theme = wp_get_theme();
}
define('AWWA_NAME', $awwa_theme->get( 'Name' ));
define('AWWA_VERSION', $awwa_theme->get( 'Version' ));
define('AWWA_BRAND_URL', $awwa_theme->get( 'AuthorURI' ));
define('AWWA_BRAND_NAME', $awwa_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( AWWA_FRAMEWORK . '/init.php' );

/**
 * thumbnail size
 */
add_image_size( 'awwa-post-image-one', 415, 450, true );