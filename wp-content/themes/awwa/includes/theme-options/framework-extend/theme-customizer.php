<?php
/*
 * All customizer related options for Awwa theme.
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

if( ! function_exists( 'awwa_customizer' ) ) {
  function awwa_customizer( $options ) {

	$options        = array(); // remove old options

	// Primary Color
	$options[]      = array(
	  'name'        => 'elemets_color_section',
	  'title'       => esc_html__('Primary Color', 'awwa'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'      => 'all_element_colors',
				'default'   => '#FF4C4C',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Elements Color', 'awwa'),
						'info'    => esc_html__('This is theme primary color, means it\'ll affect all elements that have default color of our theme primary color.', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'all_element_hover_colors',
				'default'   => '#1731b5',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Elements Hover Color', 'awwa'),
						'info'    => esc_html__('This is theme primary Hover color, means it\'ll affect all elements that have default color of our theme primary color.', 'awwa'),
					),
				),
			),
	    // Fields End

	  )
	);
	// Primary Color

	// header Color
	$options[]      = array(
	  'name'        => 'topbar_color_section',
	  'title'       => esc_html__('01. Header Topbar Colors', 'awwa'),
	  'settings'    => array(

	    // Fields Start
	    array(
				'name'          => 'topbar_bg_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('header Color', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'topbar_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Background Color', 'awwa'),
					),
				),
			),
			array(
				'name'          => 'topbar_text_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Common Color', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'topbar_text_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Header Topbar Text Color', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'topbar_icon_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('header Topbar Icon Color', 'awwa'),
					),
				),
			),

	  )
	);
	// Header topbar Color

	// Menu Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => esc_html__('02. Menu Colors', 'awwa'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'          => 'header_main_menu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Main Menu Colors', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'menu_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Background Color', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'menu_link_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Link Color', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'menu_link_hover_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Link Hover Color', 'awwa'),
					),
				),
			),

			// Sub Menu Color
			array(
				'name'          => 'header_submenu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Sub-Menu Colors', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'submenu_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Background Color', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'submenu_bg_hover_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Background Hover Color', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'submenu_link_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Link Color', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'submenu_link_hover_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Link Hover Color', 'awwa'),
					),
				),
			),
	    // Fields End

			// Responsive Menu Color
			array(
				'name'          => 'header_responsive_menu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Responsive Menu Colors', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'menu_responsive_menu_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Responsive Menu Color', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'menu_responsive_menu_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Responsive Menu Background', 'awwa'),
					),
				),
			),
	    // Fields End

			//Menu Button Color
			array(
				'name'          => 'header_button_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Menu Button Colors', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'menu_button_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Button Color', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'menu_button_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Button Background Color', 'awwa'),
					),
				),
			),
	    // Fields End

	  )
	);
	// Header Color

	// Title Bar Color
	$options[]      = array(
	  'name'        => 'titlebar_section',
	  'title'       => esc_html__('03. Title Bar Colors', 'awwa'),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'titlebar_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => __('<h2 style="margin: 0;text-align: center;">Title Colors</h2> <br /> This is common settings, if this settings not affect in your page. Please check your page metabox. You may set default settings there.', 'awwa'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Title Bar Background Color', 'awwa'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Title Bar Background Color', 'awwa'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_title_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Title Color', 'awwa'),
					),
				),
			),

			array(
				'name'          => 'titlebar_breadcrumbs_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Breadcrumbs Colors', 'awwa'),
					),
				),
			),
    	array(
				'name'      => 'breadcrumbs_text_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Text Color', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'breadcrumbs_link_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Link Color', 'awwa'),
					),
				),
			),
			array(
				'name'      => 'breadcrumbs_link_hover_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Link Hover Color', 'awwa'),
					),
				),
			),
	    // Fields End

	  )
	);
	// Title Bar Color

	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__('04. Content Colors', 'awwa'),
	  'description' => esc_html__('This is all about content area text and heading colors.', 'awwa'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__('Content Text', 'awwa'),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'      => 'body_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Body & Content Color', 'awwa'),
							),
						),
					),
					array(
						'name'      => 'body_links_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Body Links Color', 'awwa'),
							),
						),
					),
					array(
						'name'      => 'body_link_hover_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Body Links Hover Color', 'awwa'),
							),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Sidebar Content Color', 'awwa'),
							),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__('Headings', 'awwa'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Content Heading Color', 'awwa'),
							),
						),
					),
	      	array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Sidebar Heading Color', 'awwa'),
							),
						),
					),
			    // Fields End

      	)
      ),

	  )
	);
	// Content Color

	// Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => esc_html__('05. Footer Colors', 'awwa'),
	  'description' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Awwa > Theme Options > Footer ', 'awwa'),
	  'sections'    => array(

			// Footer Widgets Block
	  	array(
	      'name'          => 'footer_widget_section',
	      'title'         => esc_html__('Widget Block', 'awwa'),
	      'settings'      => array(

			    // Fields Start
					array(
			      'name'          => 'footer_widget_color_notice',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Content Colors', 'awwa'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'footer_heading_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Widget Heading Color', 'awwa'),
							),
						),
					),
					array(
						'name'      => 'footer_text_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Widget Text Color', 'awwa'),
							),
						),
					),
					array(
						'name'      => 'footer_link_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Widget Link Color', 'awwa'),
							),
						),
					),
					array(
						'name'      => 'footer_link_hover_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Widget Link Hover Color', 'awwa'),
							),
						),
					),
					array(
						'name'      => 'footer_bg_color',
						'default'   => '#0a172b',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Background Color', 'awwa'),
							),
						),
					),
			    // Fields End
			  )
			),
			// Footer Widgets Block

			// Footer Copyright Block
	  	array(
	      'name'          => 'footer_copyright_section',
	      'title'         => esc_html__('Copyright Block', 'awwa'),
	      'settings'      => array(

			    // Fields Start
			    array(
			      'name'          => 'footer_copyright_active',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Make sure you\'ve enabled copyright block in : <br /> <strong>Awwa > Theme Options > Footer > Copyright Bar : Enable Copyright Block</strong>', 'awwa'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'copyright_text_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Text Color', 'awwa'),
							),
						),
					),
					array(
						'name'      => 'copyright_link_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Link Color', 'awwa'),
							),
						),
					),
					array(
						'name'      => 'copyright_link_hover_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Link Hover Color', 'awwa'),
							),
						),
					),
					array(
						'name'      => 'copyright_bg_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Background Color', 'awwa'),
							),
						),
					),
					array(
						'name'      => 'copyright_border_color',
						'default'   => 'rgba(255, 255, 255, 0.07)',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Border Color', 'awwa'),
							),
						),
					),

			  )
			),
			// Footer Copyright Block

	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'awwa_customizer' );
}