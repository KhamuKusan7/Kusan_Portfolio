<?php
/*
Plugin Name: Awwa Core
Plugin URI: http://themeforest.net/user/wpoceans
Description: Plugin to contain shortcodes and custom post types of the awwa theme.
Author: wpoceans
Author URI: http://themeforest.net/user/wpoceans/portfolio
Version: 1.0
Text Domain: awwa-core
*/

if( ! function_exists( 'awwa_block_direct_access' ) ) {
	function awwa_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'AWWA_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'AWWA_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'AWWA_PLUGIN_ASTS', AWWA_PLUGIN_URL . 'assets' );
define( 'AWWA_PLUGIN_IMGS', AWWA_PLUGIN_ASTS . '/images' );
define( 'AWWA_PLUGIN_INC', AWWA_PLUGIN_PATH . 'include' );

// DIRECTORY SEPARATOR
define ( 'DS' , DIRECTORY_SEPARATOR );

// Awwa Elementor Shortcode Path
define( 'AWWA_EM_SHORTCODE_BASE_PATH', AWWA_PLUGIN_PATH . 'elementor/' );
define( 'AWWA_EM_SHORTCODE_PATH', AWWA_EM_SHORTCODE_BASE_PATH . 'widgets/' );

/**
 * Check if Codestar Framework is Active or Not!
 */
function awwa_framework_active() {
  return ( defined( 'CS_VERSION' ) ) ? true : false;
}

/* AWWA_THEME_NAME_PLUGIN */
define('AWWA_THEME_NAME_PLUGIN', 'Awwa' );

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('awwa-core/awwa-core.php')) {

	// Custom Post Type
  require_once( AWWA_PLUGIN_INC . '/custom-post-type.php' );

  if ( is_plugin_active('kingcomposer/kingcomposer.php') ) {

    define( 'AWWA_KC_SHORTCODE_BASE_PATH', AWWA_PLUGIN_PATH . 'kc/' );
    define( 'AWWA_KC_SHORTCODE_PATH', AWWA_KC_SHORTCODE_BASE_PATH . 'shortcodes/' );
    // Shortcodes
    require_once( AWWA_KC_SHORTCODE_BASE_PATH . '/kc-setup.php' );
    require_once( AWWA_KC_SHORTCODE_BASE_PATH . '/library.php' );
  }

  // Theme Custom Shortcode
  require_once( AWWA_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( AWWA_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );

  // Importer
  require_once( AWWA_PLUGIN_INC . '/demo/importer.php' );


  if (class_exists('WP_Widget') && is_plugin_active('codestar-framework/cs-framework.php') ) {
    // Widgets

    require_once( AWWA_PLUGIN_INC . '/widgets/nav-widget.php' );
    require_once( AWWA_PLUGIN_INC . '/widgets/recent-posts.php' );
    require_once( AWWA_PLUGIN_INC . '/widgets/recent-case.php' );
    require_once( AWWA_PLUGIN_INC . '/widgets/text-widget.php' );
    require_once( AWWA_PLUGIN_INC . '/widgets/widget-extra-fields.php' );

    // Elementor
    if(file_exists( AWWA_EM_SHORTCODE_BASE_PATH . '/em-setup.php' ) ){
      require_once( AWWA_EM_SHORTCODE_BASE_PATH . '/em-setup.php' );
      require_once( AWWA_EM_SHORTCODE_BASE_PATH . 'lib/fields/icons.php' );
      require_once( AWWA_EM_SHORTCODE_BASE_PATH . 'lib/icons-manager/icons-manager.php' );
    }
  }

  add_action('wp_enqueue_scripts', 'awwa_plugin_enqueue_scripts');
  function awwa_plugin_enqueue_scripts() {
    wp_enqueue_script('plugin-scripts', AWWA_PLUGIN_ASTS.'/plugin-scripts.js', array('jquery'), '', true);
  }

}

// Extra functions
require_once( AWWA_PLUGIN_INC . '/theme-functions.php' );