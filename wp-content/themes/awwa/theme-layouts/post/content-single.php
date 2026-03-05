<?php
/**
 * Single Post.
 */
$awwa_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$awwa_large_image = $awwa_large_image ? $awwa_large_image[0] : '';
$image_alt = get_post_meta( $awwa_large_image, '_wp_attachment_image_alt', true);
$awwa_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
// Single Theme Option
$awwa_post_pagination_option = cs_get_option('single_post_pagination');
$awwa_single_featured_image = cs_get_option('single_featured_image');
$awwa_single_author_info = cs_get_option('single_author_info');
$awwa_single_share_option = cs_get_option('single_share_option');
$awwa_metas_hide = (array) cs_get_option( 'theme_metas_hide' );

if ( has_tag() ) {
   $extra_class  = ' not-has-tag';
} else {
  $extra_class  = ' has-tag-share';
}

?>
  <div <?php post_class('post clearfix'); ?>>
  	<?php if ( $awwa_large_image ) { ?>
  	  <div class="entry-media">
        <img src="<?php echo esc_url( $awwa_large_image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
   		</div>
  	<?php	} ?>
    <div class="entry-meta">
      <ul>
        <li>
           <?php if ( !in_array( 'author', $awwa_metas_hide ) ) { // Author Hide
              printf(
              '<span><i class="fi ti-pencil-alt author"></i>'.esc_html__(' By: ','awwa').'<a href="%1$s" rel="author">%2$s</a></span>',
              esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author()
              );
          } ?>
        </li>
        <li>
        <i class="fi ti-comment-alt"></i>
           <a class="awwa-comment" href="<?php echo esc_url( get_comments_link() ); ?>">
            <?php printf( esc_html( _nx( 'Comments (%1$s)', 'Comments (%1$s)', get_comments_number(), 'comments title', 'awwa' ) ), '<span class="comment">'.number_format_i18n( get_comments_number() ).'</span>','<span>' . get_the_title() . '</span>' ); ?>
          </a>
        </li>
        <li><i class="fi ti-calendar"></i>
          <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() );  ?></a>
        </li>
      </ul>
    </div>
    <div class="entry-details">
	     <?php
				the_content();
				echo awwa_wp_link_pages();
			 ?>
    </div>
</div>
<?php if( has_tag() || ( $awwa_single_share_option && function_exists('awwa_wp_share_option') ) ) { ?>
  <div class="tag-share-wrap">
    <div class="tag-share clearfix <?php echo esc_attr( $extra_class ); ?>">
    <?php if( has_tag() ) { ?>
     <div class="tag">
          <?php
            echo '<span>'.esc_html__('Tags:','awwa').'</span>';
            $tag_list = get_the_tags();
            if($tag_list) {
              echo the_tags( ' <ul><li>', '</li><li>', '</li></ul>' );
           } ?>
      </div>
  </div>
  <div class="tag-share-s2 clearfix">
      <?php } 
      if ( $awwa_single_share_option && function_exists('awwa_wp_share_option') ) {
            echo awwa_wp_share_option();
        }
     ?>
  </div>
</div>
<?php
}
if( !$awwa_single_author_info ) {
	awwa_author_info();
	}
?>

