<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */
$awwa_id    = ( isset( $post ) ) ? $post->ID : 0;
$awwa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $awwa_id;
$awwa_meta  = get_post_meta( $awwa_id, 'page_type_metabox', true );
if ( $awwa_meta ) {
	$awwa_content_padding = $awwa_meta['content_spacings'];
} else { $awwa_content_padding = 'section-padding'; }
// Top and Bottom Padding
if ( $awwa_content_padding && $awwa_content_padding !== 'padding-default' ) {
	$awwa_content_top_spacings = isset( $awwa_meta['content_top_spacings'] ) ? $awwa_meta['content_top_spacings'] : '';
	$awwa_content_bottom_spacings = isset( $awwa_meta['content_bottom_spacings'] ) ? $awwa_meta['content_bottom_spacings'] : '';
	if ( $awwa_content_padding === 'padding-custom' ) {
		$awwa_content_top_spacings = $awwa_content_top_spacings ? 'padding-top:'. awwa_check_px( $awwa_content_top_spacings ) .';' : '';
		$awwa_content_bottom_spacings = $awwa_content_bottom_spacings ? 'padding-bottom:'. awwa_check_px($awwa_content_bottom_spacings) .';' : '';
		$awwa_custom_padding = $awwa_content_top_spacings . $awwa_content_bottom_spacings;
	} else {
		$awwa_custom_padding = '';
	}
	$padding_class = '';
} else {
	$awwa_custom_padding = '';
	$padding_class = '';
}

// Page Layout
$page_layout_options = get_post_meta( get_the_ID(), 'page_layout_options', true );
if ( $page_layout_options ) {
	$awwa_page_layout = $page_layout_options['page_layout'];
	$page_sidebar_widget = $page_layout_options['page_sidebar_widget'];
} else {
	$awwa_page_layout = 'right-sidebar';
	$page_sidebar_widget = '';
}
$page_sidebar_widget = $page_sidebar_widget ? $page_sidebar_widget : 'sidebar-1';
if ( $awwa_page_layout === 'extra-width' ) {
	$awwa_page_column = 'extra-width';
	$awwa_page_container = 'container-fluid';
} elseif ( $awwa_page_layout === 'full-width' ) {
	$awwa_page_column = 'col-md-12';
	$awwa_page_container = 'container ';
} elseif( ( $awwa_page_layout === 'left-sidebar' || $awwa_page_layout === 'right-sidebar' ) && is_active_sidebar( $page_sidebar_widget ) ) {
	if( $awwa_page_layout === 'left-sidebar' ){
		$awwa_page_column = 'col-md-8 order-12';
	} else {
		$awwa_page_column = 'col-md-8';
	}
	$awwa_page_container = 'container ';
} else {
	$awwa_page_column = 'col-md-12';
	$awwa_page_container = 'container ';
}
$awwa_theme_page_comments = cs_get_option( 'theme_page_comments' );
get_header();
?>
<div class="page-wrap <?php echo esc_attr( $padding_class.''.$awwa_content_padding ); ?>">
	<div class="<?php echo esc_attr( $awwa_page_container.''.$awwa_page_layout ); ?>" style="<?php echo esc_attr( $awwa_custom_padding ); ?>">
		<div class="row">
			<div class="<?php echo esc_attr( $awwa_page_column ); ?>">
				<div class="page-wraper clearfix">
				<?php
				while ( have_posts() ) : the_post();
					the_content();
					if ( !$awwa_theme_page_comments && ( comments_open() || get_comments_number() ) ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>
				</div>
				<div class="page-link-wrap">
					<?php awwa_wp_link_pages(); ?>
				</div>
			</div>
			<?php
			// Sidebar
			if( ($awwa_page_layout === 'left-sidebar' || $awwa_page_layout === 'right-sidebar') && is_active_sidebar( $page_sidebar_widget )  ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php
get_footer();