<?php
/*
 * The template for displaying all single posts.
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
		$awwa_content_padding = $awwa_meta['content_spacings'];
	} else { $awwa_content_padding = ''; }
	// Padding - Metabox
	if ( $awwa_content_padding && $awwa_content_padding !== 'padding-default' ) {
		$awwa_content_top_spacings = $awwa_meta['content_top_spacings'];
		$awwa_content_bottom_spacings = $awwa_meta['content_bottom_spacings'];
		if ( $awwa_content_padding === 'padding-custom' ) {
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
	$awwa_sidebar_position = cs_get_option( 'service_sidebar_position' );
	$awwa_single_comment = cs_get_option( 'service_comment_form' );
	$awwa_sidebar_position = $awwa_sidebar_position ? $awwa_sidebar_position : 'sidebar-hide';
	// Sidebar Position
	if ( $awwa_sidebar_position === 'sidebar-hide' ) {
		$awwa_layout_class = 'col-md-12 col col-xs-12';
		$awwa_sidebar_class = 'hide-sidebar';
	} elseif ( $awwa_sidebar_position === 'sidebar-left' ) {
		$awwa_layout_class = 'col col-lg-8 col-lg-push-4';
		$awwa_sidebar_class = 'left-sidebar';
	} else {
		$awwa_layout_class = 'col-lg-8';
		$awwa_sidebar_class = 'right-sidebar';
	} ?>
<div class="service-single-section section-padding <?php echo esc_attr( $awwa_content_padding .' '. $awwa_sidebar_class ); ?>" style="<?php echo esc_attr( $awwa_custom_padding ); ?>">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr( $awwa_layout_class ); ?>">
				<div class="service-single-content">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							if ( post_password_required() ) {
									echo '<div class="password-form">'.get_the_password_form().'</div>';
								} else {
									get_template_part( 'theme-layouts/post/service', 'content' );
									$awwa_single_comment = !$awwa_single_comment ? comments_template() : '';

								}
						endwhile;
					else :
						get_template_part( 'theme-layouts/post/content', 'none' );
					endif; ?>
				</div><!-- Blog Div -->
				<?php
		    wp_reset_postdata(); ?>
			</div><!-- Content Area -->
				<?php
				if ( $awwa_sidebar_position !== 'sidebar-hide' ) {
					get_sidebar(); // Sidebar
				} ?>
		</div>
	</div>
</div>
<?php
get_footer();