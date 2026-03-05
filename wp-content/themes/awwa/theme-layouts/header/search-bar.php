<?php
$awwa_id    = ( isset( $post ) ) ? $post->ID : 0;
$awwa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $awwa_id;
$awwa_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $awwa_id;
$awwa_meta  = get_post_meta( $awwa_id, 'page_type_metabox', true);

// Header Style
if ( $awwa_meta ) {
  $awwa_header_design  = $awwa_meta['select_header_design'];
} else {
  $awwa_header_design  = cs_get_option( 'select_header_design' );
}

if ( $awwa_header_design === 'default' ) {
  $awwa_header_design_actual  = cs_get_option( 'select_header_design' );
} else {
  $awwa_header_design_actual = ( $awwa_header_design ) ? $awwa_header_design : cs_get_option('select_header_design');
}
$awwa_header_design_actual = $awwa_header_design_actual ? $awwa_header_design_actual : 'style_two';

$awwa_cart_widget  = cs_get_option( 'awwa_cart_widget' );
$awwa_search  = cs_get_option( 'awwa_header_search' );

$awwa_menu_cta  = cs_get_option( 'awwa_menu_cta' );
$header_cta_text  = cs_get_option( 'header_cta_text' );
$header_cta_link  = cs_get_option( 'header_cta_link' );

?>
<div class="col-lg-2 col-md-2 col-2">
  <div class="header-search-form-wrapper header-right">
      <?php if ( $awwa_menu_cta ) { ?>
        <div class="close-form">
            <a class="theme-btn" href="<?php echo esc_url( $header_cta_link ); ?>">
              <?php echo esc_html( $header_cta_text ) ?>
            </a>
        </div>
      <?php }
      if ( $awwa_cart_widget && class_exists( 'WooCommerce' ) ) {
        get_template_part( 'theme-layouts/header/top','cart' );
      }
      if ( !$awwa_search ) { ?>
      <div class="cart-search-contact">
          <button class="search-toggle-btn"><i class="fi ti-search"></i></button>
          <div class="header-search-form">
              <form method="get" action="<?php echo esc_url( home_url('/') ); ?>" class="form" >
                  <div>
                      <input type="text" name="s" class="form-control" placeholder="<?php echo esc_attr__( 'Search here','awwa' ); ?>">
                      <button type="submit"><i class="fi ti-search"></i></button>
                  </div>
              </form>
          </div>
      </div>
    <?php } ?>
  </div>
</div>
