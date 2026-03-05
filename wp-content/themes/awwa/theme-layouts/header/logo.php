<?php
// Metabox
global $post;
$awwa_id    = ( isset( $post ) ) ? $post->ID : false;
$awwa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $awwa_id;
$awwa_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $awwa_id;
$awwa_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('service') ) ? $awwa_id : false;
$awwa_meta  = get_post_meta( $awwa_id, 'page_type_metabox', true );
// Header Style

$awwa_logo = cs_get_option( 'awwa_logo' );

$logo_url = wp_get_attachment_url( $awwa_logo );
$awwa_logo_alt = get_post_meta( $awwa_logo, '_wp_attachment_image_alt', true );

if ( $logo_url ) {
  $logo_url = $logo_url;
} else {
 $logo_url = AWWA_IMAGES.'/logo.svg';
}

if ( has_nav_menu( 'primary' ) ) {
  $logo_padding = ' has_menu ';
}
else {
   $logo_padding = ' dont_has_menu ';
}


// Logo Spacings
// Logo Spacings
$awwa_brand_logo_top = cs_get_option( 'awwa_logo_top' );
$awwa_brand_logo_bottom = cs_get_option( 'awwa_logo_bottom' );
if ( $awwa_brand_logo_top ) {
  $awwa_brand_logo_top = 'padding-top:'. awwa_check_px( $awwa_brand_logo_top ) .';';
} else { $awwa_brand_logo_top = ''; }
if ( $awwa_brand_logo_bottom ) {
  $awwa_brand_logo_bottom = 'padding-bottom:'. awwa_check_px( $awwa_brand_logo_bottom ) .';';
} else { $awwa_brand_logo_bottom = ''; }
?>
<div class="site-logo <?php echo esc_attr( $logo_padding ); ?>"  style="<?php echo esc_attr( $awwa_brand_logo_top ); echo esc_attr( $awwa_brand_logo_bottom ); ?>">
   <?php if ( $awwa_logo ) {
    ?>
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
       <img src="<?php echo esc_url( $logo_url ); ?>" alt=" <?php echo esc_attr( $awwa_logo_alt ); ?>">
     </a>
   <?php } elseif( has_custom_logo() ) {
      the_custom_logo();
    } else {
    ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
       <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo get_bloginfo('name'); ?>">
     </a>
   <?php
  } ?>
</div>