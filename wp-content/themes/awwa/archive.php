<?php
/*
 * The main template file.
 * Author & Copyright: wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */
get_header();
	// Metabox
	$awwa_id    = ( isset( $post ) ) ? $post->ID : 0;
	$awwa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $awwa_id;
	$awwa_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $awwa_id;
	$awwa_meta  = get_post_meta( $awwa_id, 'page_type_metabox', true );
	if ( $awwa_meta ) {
		$awwa_content_padding = isset( $awwa_meta['content_spacings'] ) ? $awwa_meta['content_spacings'] : '';
	} else { $awwa_content_padding = ''; }
	// Padding - Metabox
	if ($awwa_content_padding && $awwa_content_padding !== 'padding-default') {
		$awwa_content_top_spacings = $awwa_meta['content_top_spacings'];
		$awwa_content_bottom_spacings = $awwa_meta['content_bottom_spacings'];
		if ($awwa_content_padding === 'padding-custom') {
			$awwa_content_top_spacings = $awwa_content_top_spacings ? 'padding-top:'. awwa_check_px($awwa_content_top_spacings) .';' : '';
			$awwa_content_bottom_spacings = $awwa_content_bottom_spacings ? 'padding-bottom:'. awwa_check_px($awwa_content_bottom_spacings) .';' : '';
			$awwa_custom_padding = $awwa_content_top_spacings . $awwa_content_bottom_spacings;
		} else {
			$awwa_custom_padding = '';
		}
	} else {
		$awwa_custom_padding = '';
	}
	// Theme Options
	$awwa_sidebar_position = cs_get_option( 'blog_sidebar_position' );
	$awwa_sidebar_position = $awwa_sidebar_position ?$awwa_sidebar_position : 'sidebar-right';
	$awwa_blog_widget = cs_get_option( 'blog_widget' );
	$awwa_blog_widget = $awwa_blog_widget ? $awwa_blog_widget : 'sidebar-1';

	if (isset($_GET['sidebar'])) {
	  $awwa_sidebar_position = $_GET['sidebar'];
	}

	$awwa_sidebar_position = $awwa_sidebar_position ? $awwa_sidebar_position : 'sidebar-right';

	// Sidebar Position
	if ( $awwa_sidebar_position === 'sidebar-hide' ) {
		$layout_class = 'col col col-md-10 col-md-offset-1';
		$awwa_sidebar_class = 'hide-sidebar';
	} elseif ( $awwa_sidebar_position === 'sidebar-left' && is_active_sidebar( $awwa_blog_widget ) ) {
		$layout_class = 'col col-md-8 col-md-push-4';
		$awwa_sidebar_class = 'left-sidebar';
	} elseif( is_active_sidebar( $awwa_blog_widget ) ) {
		$layout_class = 'col col-md-8';
		$awwa_sidebar_class = 'right-sidebar';
	} else {
		$layout_class = 'col col-md-12';
		$awwa_sidebar_class = 'hide-sidebar';
	}

	?>
<div class="wpo-blog-pg-section section-padding">
	<div class="container <?php echo esc_attr( $awwa_content_padding .' '. $awwa_sidebar_class ); ?>" style="<?php echo esc_attr( $awwa_custom_padding ); ?>">
		<div class="row">
			<div class="<?php echo esc_attr( $layout_class ); ?>">
				<div class="blog-content">
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'theme-layouts/post/content' );
					endwhile;
				else :
					get_template_part( 'theme-layouts/post/content', 'none' );
				endif;
				awwa_posts_navigation();
		    wp_reset_postdata(); ?>
		    </div>
			</div><!-- Content Area -->
			<?php
			if ( $awwa_sidebar_position !== 'sidebar-hide' && is_active_sidebar( $awwa_blog_widget ) ) {
				get_sidebar(); // Sidebar
			} ?>
		</div>
	</div>
</div>
<?php
get_footer();