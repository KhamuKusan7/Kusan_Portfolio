<?php
	// Metabox
	$awwa_id    = ( isset( $post ) ) ? $post->ID : 0;
	$awwa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $awwa_id;
	$awwa_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $awwa_id;
	$awwa_meta  = get_post_meta( $awwa_id, 'page_type_metabox', true );
	if ($awwa_meta && is_page()) {
		$awwa_title_bar_padding = $awwa_meta['title_area_spacings'];
	} else { $awwa_title_bar_padding = ''; }
	// Padding - Theme Options
	if ($awwa_title_bar_padding && $awwa_title_bar_padding !== 'padding-default') {
		$awwa_title_top_spacings = $awwa_meta['title_top_spacings'];
		$awwa_title_bottom_spacings = $awwa_meta['title_bottom_spacings'];
		if ($awwa_title_bar_padding === 'padding-custom') {
			$awwa_title_top_spacings = $awwa_title_top_spacings ? 'padding-top:'. awwa_check_px($awwa_title_top_spacings) .';' : '';
			$awwa_title_bottom_spacings = $awwa_title_bottom_spacings ? 'padding-bottom:'. awwa_check_px($awwa_title_bottom_spacings) .';' : '';
			$awwa_custom_padding = $awwa_title_top_spacings . $awwa_title_bottom_spacings;
		} else {
			$awwa_custom_padding = '';
		}
	} else {
		$awwa_title_bar_padding = cs_get_option('title_bar_padding');
		$awwa_titlebar_top_padding = cs_get_option('titlebar_top_padding');
		$awwa_titlebar_bottom_padding = cs_get_option('titlebar_bottom_padding');
		if ($awwa_title_bar_padding === 'padding-custom') {
			$awwa_titlebar_top_padding = $awwa_titlebar_top_padding ? 'padding-top:'. awwa_check_px($awwa_titlebar_top_padding) .';' : '';
			$awwa_titlebar_bottom_padding = $awwa_titlebar_bottom_padding ? 'padding-bottom:'. awwa_check_px($awwa_titlebar_bottom_padding) .';' : '';
			$awwa_custom_padding = $awwa_titlebar_top_padding . $awwa_titlebar_bottom_padding;
		} else {
			$awwa_custom_padding = '';
		}
	}
	// Banner Type - Meta Box
	if ($awwa_meta && is_page()) {
		$awwa_banner_type = $awwa_meta['banner_type'];
	} else { $awwa_banner_type = ''; }
	// Header Style
	if ($awwa_meta) {
	  $awwa_header_design  = $awwa_meta['select_header_design'];
	  $awwa_hide_breadcrumbs  = $awwa_meta['hide_breadcrumbs'];
	} else {
	  $awwa_header_design  = cs_get_option('select_header_design');
	  $awwa_hide_breadcrumbs = cs_get_option('need_breadcrumbs');
	}
	if ( $awwa_header_design === 'default') {
	  $awwa_header_design_actual  = cs_get_option('select_header_design');
	} else {
	  $awwa_header_design_actual = ( $awwa_header_design ) ? $awwa_header_design : cs_get_option('select_header_design');
	}
	if ( $awwa_header_design_actual == 'style_two') {
		$overly_class = ' overly';
	} else {
		$overly_class = ' ';
	}
	// Overlay Color - Theme Options
		if ($awwa_meta && is_page()) {
			$awwa_bg_overlay_color = $awwa_meta['titlebar_bg_overlay_color'];
			$title_color = isset($awwa_meta['title_color']) ? $awwa_meta['title_color'] : '';
		} else { $awwa_bg_overlay_color = ''; }
		if (!empty($awwa_bg_overlay_color)) {
			$awwa_bg_overlay_color = $awwa_bg_overlay_color;
			$title_color = $title_color;
		} else {
			$awwa_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
			$title_color = cs_get_option('title_color');
		}
		$e_uniqid        = uniqid();
		$inline_style  = '';
		if ( $awwa_bg_overlay_color ) {
		 $inline_style .= '.page-title-'.$e_uniqid .'.page-title {';
		 $inline_style .= ( $awwa_bg_overlay_color ) ? 'background-color:'. $awwa_bg_overlay_color.';' : '';
		 $inline_style .= '}';
		}
		if ( $title_color ) {
		 $inline_style .= '.page-title-'.$e_uniqid .'.page-title h2, .page-title-'.$e_uniqid .'.page-title .breadcrumb li, .page-title-'.$e_uniqid .'.page-title .breadcrumbs ul li a {';
		 $inline_style .= ( $title_color ) ? 'color:'. $title_color.';' : '';
		 $inline_style .= '}';
		}
		// add inline style
		add_inline_style( $inline_style );
		$styled_class  = ' page-title-'.$e_uniqid;
	// Background - Type
	if( $awwa_meta ) {
		$title_bar_bg = $awwa_meta['title_area_bg'];
	} else {
		$title_bar_bg = '';
	}
	$awwa_custom_header = get_custom_header();
	$header_text_color = get_theme_mod( 'header_textcolor' );
	$background_color = get_theme_mod( 'background_color' );
	if( isset( $title_bar_bg['image'] ) && ( $title_bar_bg['image'] ||  $title_bar_bg['color'] ) ) {
	  extract( $title_bar_bg );
	  $awwa_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . esc_url($image) . ');' : '';
	  $awwa_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . esc_attr( $repeat) . ';' : '';
	  $awwa_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . esc_attr($position) . ';' : '';
	  $awwa_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . esc_attr($size) . ';' : '';
	  $awwa_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . esc_attr( $attachment ) . ';' : '';
	  $awwa_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . esc_attr( $color ) . ';' : '';
	  $awwa_background_style       = ( ! empty( $image ) ) ? $awwa_background_image . $awwa_background_repeat . $awwa_background_position . $awwa_background_size . $awwa_background_attachment : '';
	  $awwa_title_bg = ( ! empty( $awwa_background_style ) || ! empty( $awwa_background_color ) ) ? $awwa_background_style . $awwa_background_color : '';
	} elseif( $awwa_custom_header->url ) {
		$awwa_title_bg = 'background-image:  url('. esc_url( $awwa_custom_header->url ) .');';
	} else {
		$awwa_title_bg = '';
	}
	if($awwa_banner_type === 'hide-title-area') { // Hide Title Area
	} elseif($awwa_meta && $awwa_banner_type === 'revolution-slider') { // Hide Title Area
		echo do_shortcode($awwa_meta['page_revslider']);
	} else {
	?>
 <!-- start page-title -->
  <section class="wpo-page-title <?php echo esc_attr( $overly_class.$styled_class.' '.$awwa_banner_type ); ?>" style="<?php echo esc_attr( $awwa_title_bg.' '.$awwa_custom_padding ); ?>">
	    <div class="container">
	        <div class="row">
	            <div class="col col-xs-12">
	                <div class="wpo-breadcumb-wrap">
	                    <h2><?php echo awwa_title_area(); ?></h2>
	                    <?php if ( !$awwa_hide_breadcrumbs && function_exists( 'breadcrumb_trail' )) { breadcrumb_trail();  } ?>
	                </div>
	            </div>
	        </div> <!-- end row -->
	    </div> <!-- end container -->
	</section>
  <!-- end page-title -->
<?php } ?>