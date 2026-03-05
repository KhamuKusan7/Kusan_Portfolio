<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

/**
 * Enqueue Files for FrontEnd
 */
function awwa_google_font_url() {
    $font_url = '';
    if ( 'off' !== esc_html__( 'on', 'awwa' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Urbanist:wght@300;400;500;600;700;800;900&display=swap' ), "//fonts.googleapis.com/css2" );
    }
     return str_replace( array("%3A","%40", "%3B", "%26", "%3D"), array(":", "@", ";", "&", "="), $font_url );
}

function awwa_heading_google_font_url() {
    $font_url = '';
    if ( 'off' !== esc_html__( 'on', 'awwa' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Urbanist:wght@300;400;500;600;700;800;900&display=swap' ), "//fonts.googleapis.com/css2" );
    }
     return str_replace( array("%3A","%40", "%3B", "%26", "%3D"), array(":", "@", ";", "&", "="), $font_url );
}

if ( ! function_exists( 'awwa_scripts_styles' ) ) {
  function awwa_scripts_styles() {

    // Styles
    wp_enqueue_style( 'themify-icons', AWWA_CSS .'/themify-icons.css', array(), '4.6.3', 'all' );
    wp_enqueue_style( 'flaticon', AWWA_CSS .'/flaticon.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'bootstrap', AWWA_CSS .'/bootstrap.min.css', array(), '5.0.1', 'all' );
    wp_enqueue_style( 'animate', AWWA_CSS .'/animate.css', array(), '3.5.1', 'all' );
    wp_enqueue_style( 'odometer', AWWA_CSS .'/odometer.css', array(), '0.4.8', 'all' );
    wp_enqueue_style( 'progresscircle', AWWA_CSS .'/progresscircle.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'owl-carousel', AWWA_CSS .'/owl.carousel.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'owl-theme', AWWA_CSS .'/owl.theme.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'slick', AWWA_CSS .'/slick.css', array(), '1.6.0', 'all' );
    wp_enqueue_style( 'swiper', AWWA_CSS .'/swiper.min.css', array(), '4.0.7', 'all' );
    wp_enqueue_style( 'slick-theme', AWWA_CSS .'/slick-theme.css', array(), '1.6.0', 'all' );
    wp_enqueue_style( 'owl-transitions', AWWA_CSS .'/owl.transitions.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'fancybox', AWWA_CSS .'/fancybox.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'awwa-style', AWWA_CSS .'/styles.css', array(), AWWA_VERSION, 'all' );
    wp_enqueue_style( 'element', AWWA_CSS .'/elements.css', array(), AWWA_VERSION, 'all' );
    if ( !function_exists('cs_framework_init') ) {
      wp_enqueue_style('awwa-default-style', get_template_directory_uri() . '/style.css', array(),  AWWA_VERSION, 'all' );
    }
    wp_enqueue_style( 'consoel-google-fonts', esc_url( awwa_google_font_url() ), array(), AWWA_VERSION, 'all' );
    wp_enqueue_style( 'consoel-heading-google-fonts', esc_url( awwa_heading_google_font_url() ), array(), AWWA_VERSION, 'all' );
    // Scripts
    wp_enqueue_script( 'bootstrap', AWWA_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '5.0.1', true );
    wp_enqueue_script( 'imagesloaded');
    wp_enqueue_script( 'isotope', AWWA_SCRIPTS . '/isotope.min.js', array( 'jquery' ), '2.2.2', true );
    wp_enqueue_script( 'fancybox', AWWA_SCRIPTS . '/fancybox.min.js', array( 'jquery' ), '2.1.5', true );
    wp_enqueue_script( 'instafeed', AWWA_SCRIPTS . '/instafeed.min.js', array( 'jquery' ), '2.1.5', true );
    wp_enqueue_script( 'circle-progress', AWWA_SCRIPTS . '/progresscircle.js', array( 'jquery' ), '2.1.5', true );
    wp_enqueue_script( 'masonry');
    wp_enqueue_script( 'circle', AWWA_SCRIPTS . '/circle.js', array( 'jquery' ), '2.3.0', true );
    wp_enqueue_script( 'owl-carousel', AWWA_SCRIPTS . '/owl-carousel.js', array( 'jquery' ), '2.0.0', true );
    wp_enqueue_script( 'jquery-easing', AWWA_SCRIPTS . '/jquery-easing.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'wow', AWWA_SCRIPTS . '/wow.min.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'odometer', AWWA_SCRIPTS . '/odometer.min.js', array( 'jquery' ), '0.4.8', true );
    wp_enqueue_script( 'magnific-popup', AWWA_SCRIPTS . '/magnific-popup.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_script( 'slick-slider', AWWA_SCRIPTS . '/slick-slider.js', array( 'jquery' ), '1.6.0', true );
    wp_enqueue_script( 'moving-animation', AWWA_SCRIPTS . '/moving-animation.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'swiper', AWWA_SCRIPTS . '/swiper.min.js', array( 'jquery' ), '4.0.7', true );
    wp_enqueue_script( 'wc-quantity-increment', AWWA_SCRIPTS . '/wc-quantity-increment.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'awwa-scripts', AWWA_SCRIPTS . '/scripts.js', array( 'jquery' ), AWWA_VERSION, true );
    // Comments
    wp_enqueue_script( 'awwa-inline-validate', AWWA_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'awwa-validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    $awwa_viewport = cs_get_option('theme_responsive');
    if( !$awwa_viewport ) {
      wp_enqueue_style( 'awwa-responsive', AWWA_CSS .'/responsive.css', array(), AWWA_VERSION, 'all' );
    }

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'awwa_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'awwa_admin_scripts_styles' ) ) {
  function awwa_admin_scripts_styles() {

    wp_enqueue_style( 'awwa-admin-main', AWWA_CSS . '/admin-styles.css', true );
    wp_enqueue_style( 'flaticon', AWWA_CSS . '/flaticon.css', true );
    wp_enqueue_style( 'themify-icons', AWWA_CSS . '/themify-icons.css', true );
    wp_enqueue_script( 'awwa-admin-scripts', AWWA_SCRIPTS . '/admin-scripts.js', true );

  }
  add_action( 'admin_enqueue_scripts', 'awwa_admin_scripts_styles' );
}
