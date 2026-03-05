<?php
// Metabox
global $post;
$awwa_id    = ( isset( $post ) ) ? $post->ID : false;
$awwa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $awwa_id;
$awwa_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $awwa_id;
$awwa_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $awwa_id : false;
$awwa_meta  = get_post_meta( $awwa_id, 'page_type_metabox', true );
  if ($awwa_meta) {
    $awwa_topbar_options = $awwa_meta['topbar_options'];
  } else {
    $awwa_topbar_options = '';
  }

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

// Define Theme Options and Metabox varials in right way!
if ($awwa_meta) {
  if ($awwa_topbar_options === 'custom' && $awwa_topbar_options !== 'default') {
    $awwa_top_left          = $awwa_meta['top_left'];
    $awwa_top_right          = $awwa_meta['top_right'];
    $awwa_hide_topbar        = $awwa_topbar_options;
    $awwa_topbar_bg          = $awwa_meta['topbar_bg'];
    if ($awwa_topbar_bg) {
      $awwa_topbar_bg = 'background-color: '. $awwa_topbar_bg .';';
    } else {$awwa_topbar_bg = '';}
  } else {
    $awwa_top_left          = cs_get_option('top_left');
    $awwa_top_right          = cs_get_option('top_right');
    $awwa_hide_topbar        = cs_get_option('top_bar');
    $awwa_topbar_bg          = '';
  }
} else {
  // Theme Options fields
  $awwa_top_left         = cs_get_option('top_left');
  $awwa_top_right          = cs_get_option('top_right');
  $awwa_hide_topbar        = cs_get_option('top_bar');
  $awwa_topbar_bg          = '';
}
// All options
if ( $awwa_meta && $awwa_topbar_options === 'custom' && $awwa_topbar_options !== 'default' ) {
  $awwa_top_right = ( $awwa_top_right ) ? $awwa_meta['top_right'] : cs_get_option('top_right');
  $awwa_top_left = ( $awwa_top_left ) ? $awwa_meta['top_left'] : cs_get_option('top_left');
} else {
  $awwa_top_right = cs_get_option('top_right');
  $awwa_top_left = cs_get_option('top_left');
}
if ( $awwa_meta && $awwa_topbar_options !== 'default' ) {
  if ( $awwa_topbar_options === 'hide_topbar' ) {
    $awwa_hide_topbar = 'hide';
  } else {
    $awwa_hide_topbar = 'show';
  }
} else {
  $awwa_hide_topbar_check = cs_get_option( 'top_bar' );
  if ( $awwa_hide_topbar_check === true ) {
     $awwa_hide_topbar = 'hide';
  } else {
     $awwa_hide_topbar = 'show';
  }
}
if ( $awwa_meta ) {
  $awwa_topbar_bg = ( $awwa_topbar_bg ) ? $awwa_meta['topbar_bg'] : '';
} else {
  $awwa_topbar_bg = '';
}
if ( $awwa_topbar_bg ) {
  $awwa_topbar_bg = 'background-color: '. $awwa_topbar_bg .';';
} else { $awwa_topbar_bg = ''; }

if( $awwa_hide_topbar === 'show' && ( $awwa_top_left || $awwa_top_right ) ) {
?>
 <div class="topbar" style="<?php echo esc_attr( $awwa_topbar_bg ); ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-7 col-sm-12 col-12">
               <?php echo do_shortcode( $awwa_top_left ); ?>
            </div>
            <div class="col col-md-5 col-sm-12 col-12">
                <?php echo do_shortcode( $awwa_top_right ); ?>
            </div>
        </div>
    </div>
</div> <!-- end topbar -->
<?php } // Hide Topbar - From Metabox