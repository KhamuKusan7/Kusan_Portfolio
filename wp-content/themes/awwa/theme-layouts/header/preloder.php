<?php
	// Logo Image
	// Metabox - Header Transparent
	$awwa_id    = ( isset( $post ) ) ? $post->ID : 0;
	$awwa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $awwa_id;
	$awwa_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $awwa_id;
	$awwa_meta  = get_post_meta( $awwa_id, 'page_type_metabox'. true );
    $awwa_preloader_image  = cs_get_option( 'preloader_image' );

    $awwa_preloader_url = wp_get_attachment_url( $awwa_preloader_image );
    $awwa_preloader_alt = get_post_meta( $awwa_preloader_image, '_wp_attachment_image_alt', true );

    if ( $awwa_preloader_url ) {
        $awwa_preloader_url = $awwa_preloader_url;
    } else {
        $awwa_preloader_url = AWWA_IMAGES.'/preloader.png';
    }

?>
<!-- start preloader -->
<div class="preloader">
    <div class="vertical-centered-box">
        <div class="content">
            <div class="loader-circle"></div>
            <div class="loader-line-mask">
                <div class="loader-line"></div>
            </div>
           <img src="<?php echo esc_url( $awwa_preloader_url ); ?>" alt="<?php echo esc_attr( $awwa_preloader_alt ); ?>">
        </div>
    </div>
</div>
<!-- end preloader -->