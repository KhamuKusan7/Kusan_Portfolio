<?php
/*
 * All Awwa Theme Related Functions Files are Linked here
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

/* Theme All Awwa Setup */
require_once( AWWA_FRAMEWORK . '/theme-support.php' );
require_once( AWWA_FRAMEWORK . '/backend-functions.php' );
require_once( AWWA_FRAMEWORK . '/frontend-functions.php' );
require_once( AWWA_FRAMEWORK . '/enqueue-files.php' );
require_once( AWWA_CS_FRAMEWORK . '/custom-style.php' );
require_once( AWWA_CS_FRAMEWORK . '/config.php' );

/* Install Plugins */
require_once( AWWA_FRAMEWORK . '/theme-options/plugins/activation.php' );

/* Breadcrumbs */
require_once( AWWA_FRAMEWORK . '/theme-options/plugins/breadcrumb-trail.php' );

/* Aqua Resizer */
require_once( AWWA_FRAMEWORK . '/theme-options/plugins/aq_resizer.php' );

/* Bootstrap Menu Walker */
require_once( AWWA_FRAMEWORK . '/core/wp_bootstrap_navwalker.php' );

/* Sidebars */
require_once( AWWA_FRAMEWORK . '/core/sidebars.php' );

if ( class_exists( 'WooCommerce' ) ) :
	require_once( AWWA_FRAMEWORK . '/woocommerce-extend.php' );
endif;