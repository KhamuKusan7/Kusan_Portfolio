<?php
/*
 * All Metabox related options for Awwa theme.
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

function awwa_metabox_options( $options ) {


  $header = get_posts( 'post_type="headerbuilder"&numberposts=-1' );
  $headers = array( 'theme' => esc_html__( 'Default', 'awwa' ) );
  if ( $header ) {
    foreach ( $header as $head ) {
      $headers[ $head->ID ] = $head->post_title;
    }
  }
  $footer = get_posts( 'post_type="footerbuilder"&numberposts=-1' );
  $footers = array( 'theme' => esc_html__( 'Default', 'awwa' ));
  if ( $footer ) {
    foreach ( $footer as $foot ) {
      $footers[ $foot->ID ] = $foot->post_title;
    }
  }


  $options      = array();

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'awwa'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(

          // Standard, Image
          array(
            'title' => 'Standard Image',
            'type'  => 'subheading',
            'content' => esc_html__('There is no Extra Option for this Post Format!', 'awwa'),
            'wrap_class' => 'awwa-minimal-heading hide-title',
          ),
          // Standard, Image

          // Gallery
          array(
            'type'    => 'notice',
            'title'   => 'Gallery Format',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-awwa-heading',
            'content' => esc_html__('Gallery Format', 'awwa')
          ),
          array(
            'id'          => 'gallery_post_format',
            'type'        => 'gallery',
            'title'       => esc_html__('Add Gallery', 'awwa'),
            'add_title'   => esc_html__('Add Image(s)', 'awwa'),
            'edit_title'  => esc_html__('Edit Image(s)', 'awwa'),
            'clear_title' => esc_html__('Clear Image(s)', 'awwa'),
          ),
          array(
            'type'    => 'text',
            'title'   => esc_html__('Add Video URL', 'awwa' ),
            'id'   => 'video_post_format',
            'desc' => esc_html__('Add youtube or vimeo video link', 'awwa' ),
            'wrap_class' => 'video_post_format',
          ),
          array(
            'type'    => 'icon',
            'title'   => esc_html__('Add Quote Icon', 'awwa' ),
            'id'   => 'quote_post_format',
            'desc' => esc_html__('Add Quote Icon here', 'awwa' ),
            'wrap_class' => 'quote_post_format',
          ),
          // Gallery

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'awwa'),
    'post_type' => array('post', 'page'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Title Section
      array(
        'name'  => 'page_topbar_section',
        'title' => esc_html__('Top Bar', 'awwa'),
        'icon'  => 'fa fa-minus',

        // Fields Start
        'fields' => array(

          array(
            'id'           => 'topbar_options',
            'type'         => 'image_select',
            'title'        => esc_html__('Topbar', 'awwa'),
            'options'      => array(
              'default'     => AWWA_CS_IMAGES .'/topbar-default.png',
              'custom'      => AWWA_CS_IMAGES .'/topbar-custom.png',
              'hide_topbar' => AWWA_CS_IMAGES .'/topbar-hide.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'hide_topbar_select',
            ),
            'radio'     => true,
            'default'   => 'default',
          ),
          array(
            'id'          => 'top_left',
            'type'        => 'textarea',
            'title'       => esc_html__('Top Left', 'awwa'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'          => 'top_right',
            'type'        => 'textarea',
            'title'       => esc_html__('Top Right', 'awwa'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'    => 'topbar_bg',
            'type'  => 'color_picker',
            'title' => esc_html__('Topbar Background Color', 'awwa'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),
          array(
            'id'    => 'topbar_border',
            'type'  => 'color_picker',
            'title' => esc_html__('Topbar Border Color', 'awwa'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),

        ), // End : Fields

      ), // Title Section

      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header & Footer', 'awwa'),
        'icon'  => 'fa fa-bars',
        'fields' => array(
          array(
            'id'           => 'select_header_design',
            'type'         => 'select',
            'title'        => esc_html__('Select Header Design', 'awwa'),
            'options'      => $headers,
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'     => true,
            'default'   => 'default',
            'info'      => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'awwa'),
          ),
          array(
            'id'           => 'select_footer_design',
            'type'         => 'select',
            'title'        => esc_html__('Select Footer Design', 'awwa'),
            'options'      => $footers,
            'attributes' => array(
              'data-depend-id' => 'footer_design',
            ),
            'radio'     => true,
            'default'   => 'default',
            'info'      => esc_html__('Select your footer design, following options will may differ based on your selection of footer design.', 'awwa'),
          ),
        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => esc_html__('Banner & Title Area', 'awwa'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Banner Type', 'awwa'),
            'options'   => array(
              'default-title'    => 'Default Title',
              'revolution-slider' => 'Shortcode [Rev Slider]',
              'hide-title-area'   => 'Hide Title/Banner Area',
            ),
          ),
          array(
            'id'    => 'page_revslider',
            'type'  => 'textarea',
            'title' => esc_html__('Revolution Slider or Any Shortcodes', 'awwa'),
            'desc' => __('Enter any shortcodes that you want to show in this page title area. <br />Eg : Revolution Slider shortcode.', 'awwa'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'awwa'),
            ),
            'dependency'   => array('banner_type', '==', 'revolution-slider'),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Title', 'awwa'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'awwa'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Spacings', 'awwa'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'awwa'),
              'padding-custom' => esc_html__('Custom Padding', 'awwa'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'awwa'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'awwa'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_area_bg',
            'type'  => 'background',
            'title' => esc_html__('Background', 'awwa'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'titlebar_bg_overlay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Overlay Color', 'awwa'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Title Color', 'awwa'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'awwa'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'awwa'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'awwa'),
              'padding-custom' => esc_html__('Custom Padding', 'awwa'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'awwa'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'awwa'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'awwa'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'awwa'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_header',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Header', 'awwa'),
            'label' => esc_html__('Yes, Please do it.', 'awwa'),
          ),
          array(
            'id'    => 'hide_breadcrumbs',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Breadcrumbs', 'awwa'),
            'label' => esc_html__('Yes, Please do it.', 'awwa'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'awwa'),
            'label' => esc_html__('Yes, Please do it.', 'awwa'),
          ),
       
        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'awwa'),
    'post_type' => 'page',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'full-width'    => AWWA_CS_IMAGES . '/page-1.png',
              'extra-width'   => AWWA_CS_IMAGES . '/page-2.png',
              'left-sidebar'  => AWWA_CS_IMAGES . '/page-3.png',
              'right-sidebar' => AWWA_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'full-width',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'awwa'),
            'options'        => awwa_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'awwa'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );


// -----------------------------------------
  // Project
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'project_options',
    'title'     => esc_html__('Project Extra Options', 'awwa'),
    'post_type' => 'project',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'project_option_section',
        'fields' => array(
          array(
            'id'           => 'project_subtitle',
            'type'         => 'text',
            'title'        => esc_html__('Project subtitle', 'awwa'),
            'add_title' => esc_html__('Add Project title', 'awwa'),
            'attributes' => array(
              'placeholder' => esc_html__('Development / Idea', 'awwa'),
            ),
            'info'    => esc_html__('Write Project Title.', 'awwa'),
          ),   
           // Start fields
        ),
      ),

    ),
  );



 // -----------------------------------------
  // Service
  // -----------------------------------------

  $options[]    = array(
    'id'        => 'service_options',
    'title'     => esc_html__('Service Meta', 'awwa'),
    'post_type' => 'service',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
      array(
        'name'   => 'service_infos',
        'fields' => array(
         array(
            'id'           => 'service_icon',
            'type'         => 'image',
            'title'        => esc_html__('Service Icon', 'awwa'),
            'add_title' => esc_html__('Service Icon', 'awwa'),
            'info'    => esc_html__('Attached Icon.', 'awwa'),
          ), 
         array(
            'id'           => 'service_image',
            'type'         => 'image',
            'title'        => esc_html__('Service Image', 'awwa'),
            'add_title' => esc_html__('Service Image', 'awwa'),
            'info'    => esc_html__('Attached Image.', 'awwa'),
          ),

        ),
      ),
    ),
  );


if (class_exists( 'WooCommerce' )){ 
   // -----------------------------------------
    // Product
    // -----------------------------------------
    $options[]    = array(
      'id'        => 'awwa_woocommerce_section',
      'title'     => esc_html__('Product Title', 'awwa'),
      'post_type' => 'product',
      'context'   => 'normal',
      'priority'  => 'high',
      'sections'  => array(

        // All Post Formats
        array(
          'name'   => 'awwa_single_title',
          'fields' => array(
            array(
              'id'          => 'awwa_product_title',
              'type'        => 'text',
              'title'       => esc_html__('Single Title', 'awwa'),
              'attributes' => array(
                'placeholder' => 'The Title Gose Here'
              ),
            ),

          ),
        ),

      ),
    );
}
// -----------------------------------------
  // Donation Forms
  // -----------------------------------------
  $options[]    = array(
    'id'        => '_donation_form_metabox',
    'title'     => esc_html__('Donation Deadline', 'awwa'),
    'post_type' => 'give_forms',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_deadline',
        'fields' => array(
          array(
            'id'          => 'donation_deadline',
            'type'        => 'text',
            'title'       => esc_html__('Deadline Date', 'awwa'),
            'attributes' => array(
              'placeholder' => 'DD/MM/YYYY'
            ),
          ),
          // Gallery

        ),
      ),

    ),
  );
  

   // -----------------------------------------
  // Team
  // -----------------------------------------

  $options[]    = array(
    'id'        => 'team_options',
    'title'     => esc_html__('Team Meta', 'awwa'),
    'post_type' => 'team',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
      array(
        'name'   => 'team_infos',
        'fields' => array(
          array(
            'title'   => esc_html__('Team Sub Title', 'awwa'),
            'id'      => 'team_subtitle',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Volunteer', 'awwa'),
            ),
            'info'    => esc_html__('Write Team Subtitle.', 'awwa'),
          ),
          // Start fields
          array(
            'id'                  => 'team_socials',
            'title'   => esc_html__('Team Social', 'awwa'),
            'type'                => 'group',
            'fields'              => array(
              array(
                'id'              => 'social_icon',
                'type'            => 'icon',
                'attributes' => array(
                    'placeholder' => esc_html__('Facebook', 'awwa'),
                  ),
                'title'           => esc_html__('Social Icon', 'awwa'),
              ),
              array(
                'id'              => 'social_link',
                'type'            => 'text',
                'attributes' => array(
                    'placeholder' => esc_html__('#', 'awwa'),
                  ),
                'title'           => esc_html__('Socail Link', 'awwa'),
              ),
            ),
            'button_title'        => esc_html__('Add Social', 'awwa'),
            'accordion_title'     => esc_html__('Team Social ', 'awwa'),
          ),
         array(
            'id'           => 'team_image',
            'type'         => 'image',
            'title'        => esc_html__('Team Grid', 'awwa'),
            'add_title' => esc_html__('Team Image', 'awwa'),
            'info'    => esc_html__('Attached Team Grid Image.', 'awwa'),
          ),

        ),
      ),
    ),
  );


  // -----------------------------------------
  // Causes
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'causes_options',
    'title'     => esc_html__('Causes Extra Options', 'awwa'),
    'post_type' => 'give_forms',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'causes_option_section',
        'fields' => array(
         array(
            'id'           => 'causes_image',
            'type'         => 'image',
            'title'        => esc_html__('Causes Image', 'awwa'),
            'add_title' => esc_html__('Add Causes Image', 'awwa'),
          ),
         array(
            'id'           => 'causes_slide_image',
            'type'         => 'image',
            'title'        => esc_html__('Grid Image', 'awwa'),
            'add_title' => esc_html__('Add Carousel Image', 'awwa'),
          ),
        ),
      ),

    ),
  );

  // -----------------------------------------
  // post options
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_options',
    'title'     => esc_html__('Grid Image', 'awwa'),
    'post_type' => 'post',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
      array(
        'name'   => 'post_option_section',
        'fields' => array(
          array(
            'id'           => 'grid_image',
            'type'         => 'image',
            'title'        => esc_html__('Grid Image', 'awwa'),
            'add_title' => esc_html__('Add Grid Image', 'awwa'),
          ),
          array(
            'id'           => 'widget_post_title',
            'type'         => 'text',
            'title'        => esc_html__('Widget Post Title', 'awwa'),
            'add_title' => esc_html__('Add Widget Post Title here', 'awwa'),
          ),
        ),
      ),

    ),
  );


  return $options;

}
add_filter( 'cs_metabox_options', 'awwa_metabox_options' );