<?php
/*
 * The template for displaying the footer.
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

$awwa_id    = ( isset( $post ) ) ? $post->ID : 0;
$awwa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $awwa_id;
$awwa_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $awwa_id;
$awwa_meta  = get_post_meta( $awwa_id, 'page_type_metabox', true );
$awwa_ft_bg = cs_get_option('awwa_ft_bg');
$awwa_attachment = wp_get_attachment_image_src( $awwa_ft_bg , 'full' );
$awwa_attachment = $awwa_attachment ? $awwa_attachment[0] : '';
if ( $awwa_meta ) {
	$awwa_footer_design  = $awwa_meta['select_footer_design'];
	if ($awwa_footer_design != 'theme') {
	  $awwa_footer_design = $awwa_footer_design;
	} else {
	  $awwa_footer_design = cs_get_option( 'select_footer_design' );
	}
} else {
	$awwa_footer_design  = cs_get_option( 'select_footer_design' );
}

if (is_numeric($awwa_footer_design)) {
	$footer_class = 'footer-builder';
} else {
	$footer_class = 'wpo-site-footer clearfix';
}

if ( $awwa_attachment && !is_numeric($awwa_footer_design) ) {
	$bg_url = ' style="';
	$bg_url .= ( $awwa_attachment ) ? 'background-image: url( '. esc_url( $awwa_attachment ) .' );' : '';
	$bg_url .= '"';
} else {
	$bg_url = '';
}

if ( $awwa_meta ) {
	$awwa_hide_footer  = $awwa_meta['hide_footer'];
} else { $awwa_hide_footer = ''; }
if ( !$awwa_hide_footer ) { // Hide Footer Metabox
	$hide_copyright = cs_get_option('hide_copyright');
	
?>
	<!-- Footer -->
	<footer class="<?php echo esc_attr($footer_class); ?>"  <?php echo wp_kses( $bg_url, array('img' => array('src' => array(), 'alt' => array()),) ); ?>>
      <?php  if (is_numeric($awwa_footer_design)) {
        $footer_builder = new WP_Query(
          array(
            'post_type' => 'footerbuilder',
            'posts_per_page' => 1,
            'p' => $awwa_footer_design,
            'orderby' => 'none',
            'order' => 'DESC'
          )
        );

        if ($footer_builder->have_posts()) {
          while ($footer_builder->have_posts()) {
            $footer_builder->the_post();
            the_content();
          }
        }
        wp_reset_postdata();
      } else { 
		$footer_widget_block = cs_get_option( 'footer_widget_block' );
		if ( $footer_widget_block ) {
	      	get_template_part( 'theme-layouts/footer/footer', 'widgets' );
	    }
		if ( !$hide_copyright ) {
      		get_template_part( 'theme-layouts/footer/footer', 'copyright' );
	    }
      } ?>
	</footer>
	<!-- Footer -->
<?php } // Hide Footer Metabox ?>
</div><!--awwa-theme-wrapper -->
<?php wp_footer(); ?>
</body>
</html>
