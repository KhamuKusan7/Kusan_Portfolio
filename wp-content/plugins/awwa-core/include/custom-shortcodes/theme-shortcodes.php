<?php
/*
 * All Custom Shortcode for [theme_name] theme.
 * Author & Copyright: wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

if( ! function_exists( 'awwa_shortcodes' ) ) {
  function awwa_shortcodes( $options ) {

    $options       = array();

    /* Topbar Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Topbar Shortcodes', 'awwa'),
      'shortcodes' => array(

        // Topbar item
        array(
          'name'          => 'awwa_widget_topbars',
          'title'         => esc_html__('Topbar info', 'awwa'),
          'view'          => 'clone',
          'clone_id'      => 'awwa_widget_topbar',
          'clone_title'   => esc_html__('Add New', 'awwa'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),
            
          ),
          'clone_fields'  => array(

            array(
              'id'        => 'info_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Icon', 'awwa'),
            ),
            array(
              'id'        => 'subtitle',
              'type'      => 'text',
              'title'     => esc_html__('Sub Title', 'awwa'),
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'awwa'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'awwa'),
            ),
            array(
              'id'        => 'open_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'awwa'),
              'yes'     => esc_html__('Yes', 'awwa'),
              'no'     => esc_html__('No', 'awwa'),
            ),

          ),

        ),
       

      ),
    );

    /* Header Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Header Shortcodes', 'awwa'),
      'shortcodes' => array(

        // header Social
        array(
          'name'          => 'awwa_header_socials',
          'title'         => esc_html__('Header Social', 'awwa'),
          'view'          => 'clone',
          'clone_id'      => 'awwa_header_social',
          'clone_title'   => esc_html__('Add New Social', 'awwa'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),
            array(
              'id'        => 'custom_text',
              'type'      => 'text',
              'title'     => esc_html__('Custom Title', 'awwa'),
            ),

          ),
          'clone_fields'  => array(
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'awwa')
            ),
            array(
              'id'        => 'social_icon_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Icon Color', 'awwa'),
            ),
            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'title'     => esc_html__('Social Link', 'awwa')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'awwa'),
              'yes'     => esc_html__('Yes', 'awwa'),
              'no'     => esc_html__('No', 'awwa'),
            ),

          ),

        ),
        // header Social End

        // header Middle Infos
        array(
          'name'          => 'awwa_header_middle_infos',
          'title'         => esc_html__('Header Middle Info', 'awwa'),
          'view'          => 'clone',
          'clone_id'      => 'awwa_header_middle_info',
          'clone_title'   => esc_html__('Add New Info', 'awwa'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),

          ),
          'clone_fields'  => array(
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'awwa')
            ),
            array(
              'id'        => 'social_icon_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Icon Color', 'awwa'),
            ),
            array(
              'id'        => 'address_text',
              'type'      => 'text',
              'title'     => esc_html__('Address Text', 'awwa')
            ),
            array(
              'id'        => 'address_desc',
              'type'      => 'text',
              'title'     => esc_html__('Address Details', 'awwa')
            ),
          ),

        ),
        // header Middle Infos End



      ),
    );

    /* Content Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Content Shortcodes', 'awwa'),
      'shortcodes' => array(

        // Spacer
        array(
          'name'          => 'vc_empty_space',
          'title'         => esc_html__('Spacer', 'awwa'),
          'fields'        => array(

            array(
              'id'        => 'height',
              'type'      => 'text',
              'title'     => esc_html__('Height', 'awwa'),
              'attributes' => array(
                'placeholder'     => '20px',
              ),
            ),

          ),
        ),
        // Spacer

        // Social Icons
        array(
          'name'          => 'awwa_socials',
          'title'         => esc_html__('Social Icons', 'awwa'),
          'view'          => 'clone',
          'clone_id'      => 'awwa_social',
          'clone_title'   => esc_html__('Add New', 'awwa'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),  
            array(
              'id'        => 'section_title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'awwa'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Colors', 'awwa')
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Icon Color', 'awwa'),
              'wrap_class' => 'column_third',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Icon Hover Color', 'awwa'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '!=', 'style-three'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Backrgound Color', 'awwa'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '!=', 'style-one'),
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Backrgound Hover Color', 'awwa'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '==', 'style-two'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Border Color', 'awwa'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '==', 'style-three'),
            ),

            // Icon Size
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => esc_html__('Icon Size', 'awwa'),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => esc_html__('Link', 'awwa')
            ),
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'awwa')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'awwa'),
              'on_text'     => esc_html__('Yes', 'awwa'),
              'off_text'     => esc_html__('No', 'awwa'),
            ),

          ),

        ),
        // Social Icons

        // Useful Links
        array(
          'name'          => 'awwa_useful_links',
          'title'         => esc_html__('Useful Links', 'awwa'),
          'view'          => 'clone',
          'clone_id'      => 'awwa_useful_link',
          'clone_title'   => esc_html__('Add New', 'awwa'),
          'fields'        => array(

            array(
              'id'        => 'column_width',
              'type'      => 'select',
              'title'     => esc_html__('Column Width', 'awwa'),
              'options'        => array(
                'full-width' => esc_html__('One Column', 'awwa'),
                'half-width' => esc_html__('Two Column', 'awwa'),
                'third-width' => esc_html__('Three Column', 'awwa'),
              ),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title_link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'awwa')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'awwa'),
              'on_text'     => esc_html__('Yes', 'awwa'),
              'off_text'     => esc_html__('No', 'awwa'),
            ),
            array(
              'id'        => 'link_title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'awwa')
            ),

          ),

        ),
        // Useful Links

        // Simple Image List
        array(
          'name'          => 'awwa_image_lists',
          'title'         => esc_html__('Simple Image List', 'awwa'),
          'view'          => 'clone',
          'clone_id'      => 'awwa_image_list',
          'clone_title'   => esc_html__('Add New', 'awwa'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => esc_html__('Image', 'awwa')
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => esc_html__('Link', 'awwa')
            ),
            array(
              'id'    => 'open_tab',
              'type'  => 'switcher',
              'std'   => false,
              'title' => esc_html__('Open link to new tab?', 'awwa')
            ),

          ),

        ),
        // Simple Image List

        // Simple Link
        array(
          'name'          => 'awwa_simple_link',
          'title'         => esc_html__('Simple Link', 'awwa'),
          'fields'        => array(

            array(
              'id'        => 'link_style',
              'type'      => 'select',
              'title'     => esc_html__('Link Style', 'awwa'),
              'options'        => array(
                'link-underline' => esc_html__('Link Underline', 'awwa'),
                'link-arrow-right' => esc_html__('Link Arrow (Right)', 'awwa'),
                'link-arrow-left' => esc_html__('Link Arrow (Left)', 'awwa'),
              ),
            ),
            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Icon', 'awwa'),
              'value'      => 'fa fa-caret-right',
              'dependency'  => array('link_style', '!=', 'link-underline'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => esc_html__('Link Text', 'awwa'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'awwa'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'awwa'),
              'on_text'     => esc_html__('Yes', 'awwa'),
              'off_text'     => esc_html__('No', 'awwa'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Normal Mode', 'awwa')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Text Color', 'awwa'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Border Color', 'awwa'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Hover Mode', 'awwa')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Text Hover Color', 'awwa'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Border Hover Color', 'awwa'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Font Sizes', 'awwa')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => esc_html__('Text Size', 'awwa'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),

          ),
        ),
        // Simple Link

        // Blockquotes
        array(
          'name'          => 'awwa_blockquote',
          'title'         => esc_html__('Blockquote', 'awwa'),
          'fields'        => array(

            array(
              'id'        => 'blockquote_style',
              'type'      => 'select',
              'title'     => esc_html__('Blockquote Style', 'awwa'),
              'options'        => array(
                '' => esc_html__('Select Blockquote Style', 'awwa'),
                'style-one' => esc_html__('Style One', 'awwa'),
                'style-two' => esc_html__('Style Two', 'awwa'),
              ),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => esc_html__('Text Size', 'awwa'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),
            array(
              'id'        => 'content_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Content Color', 'awwa'),
            ),
            array(
              'id'        => 'left_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Left Border Color', 'awwa'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Border Color', 'awwa'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Background Color', 'awwa'),
            ),
            // Content
            array(
              'id'        => 'content',
              'type'      => 'textarea',
              'title'     => esc_html__('Content', 'awwa'),
            ),

          ),

        ),
        // Blockquotes

      ),
    );

    /* Widget Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Widget Shortcodes', 'awwa'),
      'shortcodes' => array(

        // widget Contact info
        array(
          'name'          => 'awwa_widget_contact_info',
          'title'         => esc_html__('Service CTA', 'awwa'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),
             array(
              'id'        => 'image_url',
              'type'      => 'image',
              'title'     => esc_html__('Image background', 'awwa'),
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'awwa'),
            ),
            array(
              'id'        => 'desc',
              'type'      => 'text',
              'title'     => esc_html__('SubTitle', 'awwa'),
            ),
            array(
              'id'        => 'number',
              'type'      => 'text',
              'title'     => esc_html__('Number', 'awwa'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => esc_html__('Link text', 'awwa'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'awwa'),
            ),

          ),
        ),

        // widget Testimonials
        array(
          'name'          => 'awwa_widget_testimonial',
          'title'         => esc_html__('Testimonial', 'awwa'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),
             array(
              'id'        => 'image_url',
              'type'      => 'image',
              'title'     => esc_html__('Image background', 'awwa'),
            ),
            array(
              'id'        => 'subtitle',
              'type'      => 'text',
              'title'     => esc_html__('Sub Title', 'awwa'),
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'awwa'),
            ),
            array(
              'id'        => 'desc',
              'type'      => 'textarea',
              'title'     => esc_html__('Description', 'awwa'),
            ),

          ),
        ),

       // About widget Block
        array(
          'name'          => 'awwa_about_widget',
          'title'         => esc_html__('About Widget Block', 'awwa'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'awwa'),
            ),
            array(
              'id'        => 'image_url',
              'type'      => 'image',
              'title'     => esc_html__('About Block Image', 'awwa'),
            ),
            array(
              'id'        => 'desc',
              'type'      => 'textarea',
              'title'     => esc_html__('Description', 'awwa'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => esc_html__('Link text', 'awwa'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'awwa'),
            ),

          ),
        ),


      // Service Contact Widget
        array(
          'name'          => 'awwa_service_widget_contacts',
          'title'         => esc_html__('Service Feature Widget', 'awwa'),
          'view'          => 'clone',
          'clone_id'      => 'awwa_service_widget_contact',
          'clone_title'   => esc_html__('Add New', 'awwa'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),
            array(
              'id'        => 'contact_title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'awwa')
            ),
          ),
          'clone_fields'  => array(
           
             array(
              'id'        => 'info',
              'type'      => 'text',
              'title'     => esc_html__('Contact Info', 'awwa')
            ),

          ),

        ),
      // Service Contact Widget End
        // widget download-widget
        array(
          'name'          => 'awwa_download_widgets',
          'title'         => esc_html__('Download Widget', 'awwa'),
          'view'          => 'clone',
          'clone_id'      => 'awwa_download_widget',
          'clone_title'   => esc_html__('Add New', 'awwa'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),
          ),
          'clone_fields'  => array(

            array(
              'id'        => 'download_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Download Icon', 'awwa')
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Download Title', 'awwa')
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Download Link', 'awwa')
            ),

          ),

        ),

      ),
    );

    /* Footer Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Footer Shortcodes', 'awwa'),
      'shortcodes' => array(

        // Footer Menus
        array(
          'name'          => 'awwa_footer_menus',
          'title'         => esc_html__('Footer Menu Links', 'awwa'),
          'view'          => 'clone',
          'clone_id'      => 'awwa_footer_menu',
          'clone_title'   => esc_html__('Add New', 'awwa'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'menu_title',
              'type'      => 'text',
              'title'     => esc_html__('Menu Title', 'awwa')
            ),
            array(
              'id'        => 'menu_link',
              'type'      => 'text',
              'title'     => esc_html__('Menu Link', 'awwa')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'awwa'),
              'on_text'     => esc_html__('Yes', 'awwa'),
              'off_text'     => esc_html__('No', 'awwa'),
            ),

          ),

        ),
        // Footer Menus
        array(
          'name'          => 'footer_infos',
          'title'         => esc_html__('footer logo and Text', 'awwa'),
          'view'          => 'clone',
          'clone_id'      => 'footer_info',
          'clone_title'   => esc_html__('Add New', 'awwa'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),
            array(
              'id'        => 'footer_logo',
              'type'      => 'image',
              'title'     => esc_html__('Footer logo', 'awwa'),
            ),
            array(
              'id'        => 'desc',
              'type'      => 'textarea',
              'title'     => esc_html__('Description', 'awwa'),
            ),
            
          ),
          'clone_fields'  => array(
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'awwa')
            ),
            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'title'     => esc_html__('Social Link', 'awwa')
            ),
          ),

        ),

      // footer contact info
      array(
        'name'          => 'awwa_footer_contact_infos',
        'title'         => esc_html__('Contact info', 'awwa'),
        'view'          => 'clone',
        'clone_id'      => 'awwa_footer_contact_info',
        'clone_title'   => esc_html__('Add New', 'awwa'),
        'fields'        => array(

          array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'awwa'),
          ),
          array(
            'id'        => 'contact_title',
            'type'      => 'textarea',
            'title'     => esc_html__('Contact info title', 'awwa')
          ),
        ),
        'clone_fields'  => array(

          array(
            'id'        => 'Icon',
            'type'      => 'icon',
            'title'     => esc_html__('Contact info icon', 'awwa')
          ),
          array(
            'id'        => 'item_title',
            'type'      => 'text',
            'title'     => esc_html__('Contact info title', 'awwa')
          ),
        ),

      ),

      // footer Address
       array(
          'name'          => 'awwa_footer_address_item',
          'title'         => esc_html__('Address', 'awwa'),
          'view'          => 'clone',
          'clone_id'      => 'awwa_footer_address_items',
          'clone_title'   => esc_html__('Add New', 'awwa'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'awwa'),
            ),

          ),
          'clone_fields'  => array(
            array(
              'id'        => 'item',
              'type'      => 'text',
              'title'     => esc_html__('Address item', 'awwa')
            ),
          ),
        ),

      ),
    );

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'awwa_shortcodes' );
}