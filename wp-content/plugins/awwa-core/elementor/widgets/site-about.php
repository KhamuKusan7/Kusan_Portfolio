<?php
/*
 * Elementor Awwa About Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Site_About extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-awwa_about';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('About', 'awwa-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-site-identity';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Awwa About widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-awwa_about'];
	}

	/**
	 * Register Awwa About widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_about',
			[
				'label' => esc_html__('About Options', 'awwa-core'),
			]
		);
		$this->add_control(
			'about_style',
			[
				'label' => esc_html__('About Style', 'awwa-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'awwa-core'),
					'style-two' => esc_html__('Style two', 'awwa-core'),
					'style-three' => esc_html__('Style three', 'awwa-core'),
					'style-four' => esc_html__('Style four', 'awwa-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your about style.', 'awwa-core'),
			]
		);
		$this->add_control(
			'about_image',
			[
				'label' => esc_html__('About Image', 'awwa-core'),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'awwa-core'),
			]
		);

		$this->add_control(
			'about_title',
			[
				'label' => esc_html__('Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('What Can I Do For You?', 'awwa-core'),
				'placeholder' => esc_html__('Sub Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'about_content',
			[
				'label' => esc_html__('Content', 'awwa-core'),
				'default' => esc_html__('your content text', 'awwa-core'),
				'placeholder' => esc_html__('Type your content here', 'awwa-core'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_info_name',
			[
				'label' => esc_html__('Info Name Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Annette Black', 'awwa-core'),
				'placeholder' => esc_html__('Sub Type Info Name text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'about_info_title',
			[
				'label' => esc_html__('Info Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('CEO & Founder of Awwa', 'awwa-core'),
				'placeholder' => esc_html__('Sub Type Info title text here', 'awwa-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_sign',
			[
				'label' => esc_html__('Sign Image', 'awwa-core'),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your Sign.', 'awwa-core'),
			]
		);


		$this->add_control(
			'about_rotate_title',
			[
				'label' => esc_html__('Rotate Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Hire Me for Your Dreamed Projects', 'awwa-core'),
				'placeholder' => esc_html__('Sub Type Rotate title text here', 'awwa-core'),
				'label_block' => true,
			]
		);

		$this->end_controls_section(); // end: Section

		$this->start_controls_section(
			'section_funfact',
			[
				'label' => esc_html__('Funfact Options', 'awwa-core'),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'funfact_title',
			[
				'label' => esc_html__('Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'funfact_number',
			[
				'label' => esc_html__('Funfact Number', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('250', 'awwa-core'),
				'placeholder' => esc_html__('Type funfact Number here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'funfact_plus',
			[
				'label' => esc_html__('Funfact Plus/Percentage', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('+', 'awwa-core'),
				'placeholder' => esc_html__('Type funfact Plus/Percentage here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'funfactItems_groups',
			[
				'label' => esc_html__('Funfact Items', 'awwa-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'funfact_title' => esc_html__('Funfact', 'awwa-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ funfact_title }}}',
			]
		);
		$this->end_controls_section(); // end: Section

		$this->start_controls_section(
			'section_features',
			[
				'label' => esc_html__('features Options', 'awwa-core'),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'features_title',
			[
				'label' => esc_html__('Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'features_des',
			[
				'label' => esc_html__('features Description', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('features text', 'awwa-core'),
				'placeholder' => esc_html__('Type features Description here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'features_icon',
			[
				'label' => __('Icon', 'awwa-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ti-palette',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'featuresItems_groups',
			[
				'label' => esc_html__('features Items', 'awwa-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'features_title' => esc_html__('features', 'awwa-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ features_title }}}',
			]
		);
		$this->end_controls_section(); // end: Section

		// About Image Style
		$this->start_controls_section(
			'about_image_style',
			[
				'label' => esc_html__('About Image Style', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'about_image_border_radius',
			[
				'label' => __('Image Border Radius', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'condition' => [
					'about_style' => array('style-one'),
				],
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-img, .awwa-about .about-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'image_border_color',
			[
				'label' => esc_html__('Border Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'about_style' => array('style-one', 'style-two', 'style-four'),
				],
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-img' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'image_back_border_color',
			[
				'label' => esc_html__('Back Border Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'about_style' => array('style-three'),
				],
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-wrap .about-img .line-shape svg linearGradient stop, .awwa-about .about-wrap .about-img .line-shape-2 svg linearGradient stop' => 'stop-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__('Title', 'awwa-core'),
				'condition' => [
					'about_style' => array('style-two'),
				],
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awwa_title_typography',
				'selector' => '{{WRAPPER}} .awwa-about .about-content h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-content h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => __('Title Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Content
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__('Content', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'section_content_typography',
				'selector' => '{{WRAPPER}} .awwa-about .about-content p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_highlight_color',
			[
				'label' => esc_html__('Hilight Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-wrap .about-content p::first-letter' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_padding',
			[
				'label' => __('Content Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Info Title Text
		$this->start_controls_section(
			'section_info_style',
			[
				'label' => esc_html__('Info Title Style', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'section_info_typography',
				'selector' => '{{WRAPPER}} .awwa-about .about-content .about-info h4',
			]
		);
		$this->add_control(
			'info_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-content .about-info h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'info_padding',
			[
				'label' => __('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-content .about-info h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Info sub Text
		$this->start_controls_section(
			'section_info_sub_style',
			[
				'label' => esc_html__('Info Sub Title Style', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'section_sub_info_typography',
				'selector' => '{{WRAPPER}} .awwa-about .about-content .about-info span',
			]
		);
		$this->add_control(
			'sub_info_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-content .about-info span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sub_info_padding',
			[
				'label' => __('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-content .about-info span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// backdrop style
		$this->start_controls_section(
			'rotate_text_style',
			[
				'label' => esc_html__('Rotate BG color', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'rotate_text_bg',
			[
				'label' => esc_html__('Rotate BG', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-img .rotate-text ' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'rotate_text_color',
			[
				'label' => esc_html__('Rotate Text', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-about .about-img .rotate-text .circular-text span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Features Feactures Item
		$this->start_controls_section(
			'features_item',
			[
				'label' => esc_html__('Features Item Box', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'features_box_bg',
			[
				'label' => esc_html__('BG Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'features_box_color',
			[
				'label' => esc_html__('Border Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'features_box_padding',
			[
				'label' => __('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Features Icon
		$this->start_controls_section(
			'features_icon',
			[
				'label' => esc_html__('Features Icon', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'features_icon_typography',
				'selector' => '{{WRAPPER}} .wpo-service-item .icon i',
			]
		);
		$this->add_control(
			'features_icon_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item .icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'features_icon_bg',
			[
				'label' => esc_html__('BG Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item .icon i' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Features sub Text
		$this->start_controls_section(
			'features_title_style',
			[
				'label' => esc_html__('Features Title', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'features_title_typography',
				'selector' => '{{WRAPPER}} .wpo-service-item .wpo-service-text h3',
			]
		);
		$this->add_control(
			'features_title_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item .wpo-service-text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'features_title_padding',
			[
				'label' => __('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item .wpo-service-text h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Features Text
		$this->start_controls_section(
			'features_content_style',
			[
				'label' => esc_html__('Features Content', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'features_content_typography',
				'selector' => '{{WRAPPER}} .wpo-service-item .wpo-service-text p',
			]
		);
		$this->add_control(
			'features_content_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item .wpo-service-text p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'features_content_padding',
			[
				'label' => __('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item .wpo-service-text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


	}

	/**
	 * Render About widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$about_style = !empty($settings['about_style']) ? $settings['about_style'] : '';
		$about_title = !empty($settings['about_title']) ? $settings['about_title'] : '';
		$about_content = !empty($settings['about_content']) ? $settings['about_content'] : '';

		$btn_text = !empty($settings['btn_text']) ? $settings['btn_text'] : '';

		$btn_link = !empty($settings['btn_link']['url']) ? $settings['btn_link']['url'] : '';
		$btn_external = !empty($settings['btn_link']['is_external']) ? 'target="_blank"' : '';
		$btn_nofollow = !empty($settings['btn_link']['nofollow']) ? 'rel="nofollow"' : '';
		$btn_link_attr = !empty($btn_link) ?  $btn_external . ' ' . $btn_nofollow : '';

		$button = $btn_link ? '<a href="' . esc_url($btn_link) . '" ' . esc_attr($btn_link_attr) . ' class="theme-btn" >' . esc_html($btn_text) . '</a>' : '';

		$about_rotate_title = !empty($settings['about_rotate_title']) ? $settings['about_rotate_title'] : '';

		$about_info_name = !empty($settings['about_info_name']) ? $settings['about_info_name'] : '';
		$about_info_title = !empty($settings['about_info_title']) ? $settings['about_info_title'] : '';

		$featuresItems_groups = !empty($settings['featuresItems_groups']) ? $settings['featuresItems_groups'] : [];

		$funfactItems_groups = !empty($settings['funfactItems_groups']) ? $settings['funfactItems_groups'] : [];

		$bg_image = !empty($settings['about_image']['id']) ? $settings['about_image']['id'] : '';
		$bg_image2 = !empty($settings['about_image2']['id']) ? $settings['about_image2']['id'] : '';
		$about_sign = !empty($settings['about_sign']['id']) ? $settings['about_sign']['id'] : '';

		// Image
		$image_url = wp_get_attachment_url($bg_image);
		$image_alt = get_post_meta($bg_image, '_wp_attachment_image_alt', true);

		// Image
		$image2_url = wp_get_attachment_url($bg_image2);
		$image2_alt = get_post_meta($bg_image2, '_wp_attachment_image_alt', true);

		// Image
		$sign_url = wp_get_attachment_url($about_sign);
		$sign_alt = get_post_meta($about_sign, '_wp_attachment_image_alt', true);

		$about_icon = !empty($settings['about_icon']['value']) ? $settings['about_icon']['value'] : '';
		$about_svg_url = !empty($settings['about_icon']['value']['url']) ? $settings['about_icon']['value']['url'] : '';
		$svg_alt = get_post_meta($about_svg_url, '_wp_attachment_image_alt', true);

		// Turn output buffer on
		ob_start(); ?>

		<?php if ($about_style == 'style-one') { ?>
			<div class="awwa-about wpo-about-section">
				<div class="container-fluid">
					<div class="about-wrap">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="about-content">
									<?php
									if ($about_content) {
										echo wp_kses_post($about_content);
									}
									?>
									<div class="about-info">
										<?php
										if ($about_info_name) {
											echo '<h4>' . esc_html($about_info_name) . '</h4>';
										}
										if ($about_info_title) {
											echo '<span>' . esc_html($about_info_title) . '</span>';
										}
										?>
									</div>
									<div class="signeture">
										<?php if ($sign_url) {
											echo '<img src="' . esc_url($sign_url) . '" alt="' . esc_url($sign_alt) . '">';
										}  ?>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="about-img">
									<?php if ($image_url) {
										echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '">';
									}  ?>
									<div class="rotate-text">
										<div class="circular-text text-roted">
											<?php
											if ($about_rotate_title) {
												echo '<p class="text">' . esc_html($about_rotate_title) . '</p>';
											}
											?>
										</div>
										<div class="icon"><i class="ti-arrow-top-right"></i></div>
										<div class="dots">
											<span></span>
											<span></span>
											<span></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="about-service wpo-service-area">
									<?php 	// Group Param Output
									if (is_array($featuresItems_groups) && !empty($featuresItems_groups)) {
										foreach ($featuresItems_groups as $each_item) {
											$features_title = !empty($each_item['features_title']) ? $each_item['features_title'] : '';
											$features_des = !empty($each_item['features_des']) ? $each_item['features_des'] : '';
											$features_icon = !empty($each_item['features_icon']['value']) ? $each_item['features_icon']['value'] : '';
											$featuresIcon_svg_url = !empty($each_item['features_icon']['value']['url']) ? $each_item['features_icon']['value']['url'] : '';
											$svg_alt = get_post_meta($featuresIcon_svg_url, '_wp_attachment_image_alt', true);
									?>

											<div class="wpo-service-item">
												<div class="icon">
													<?php
													if ($featuresIcon_svg_url) {
														echo '<img  src="' . esc_url($featuresIcon_svg_url) . '" alt="' . esc_url($svg_alt) . '">';
													} else {
														echo '<i class="' . esc_attr($features_icon) . '"></i>';
													}
													?>
												</div>
												<div class="wpo-service-text">
													<?php
													if ($features_title) {
														echo '<h3>' . esc_html__($features_title) . '</h3>';
													}
													if ($features_des) {
														echo '<p>' . esc_html__($features_des) . '</p>';
													}
													?>
												</div>
											</div>

									<?php
										}
									}
									?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } elseif ($about_style == 'style-two') { ?>
			<div class="awwa-about wpo-about-section-s2">
				<div class="container">
					<div class="about-wrap">
						<div class="row align-items-center">
							<div class="col-lg-6">
								<div class="about-content">
									<?php
									if ($about_title) {
										echo '<h2>' . esc_html($about_title) . '</h2>';
									}
									?>
									<?php
									if ($about_content) {
										echo wp_kses_post($about_content);
									}
									?>
									<div class="about-funfact">
										<?php 	// Group Param Output
										if (is_array($funfactItems_groups) && !empty($funfactItems_groups)) {
											foreach ($funfactItems_groups as $each_item) {
												$funfact_title = !empty($each_item['funfact_title']) ? $each_item['funfact_title'] : '';
												$funfact_number = !empty($each_item['funfact_number']) ? $each_item['funfact_number'] : '';
												$funfact_plus = !empty($each_item['funfact_plus']) ? $each_item['funfact_plus'] : '';
										?>

												<div class="about-funfact-item">
													<?php
													if ($funfact_number) {
														echo '<h3><span class="odometer" data-count="' . esc_attr($funfact_number) . '">' . esc_html__('00', 'sailo-core') . '</span>' . esc_html($funfact_plus) . '</h3>';
													}
													if ($funfact_title) {
														echo '<small>' . esc_html__($funfact_title) . '</small>';
													}
													?>
												</div>

										<?php
											}
										}
										?>
									</div>
								</div>
							</div>
							<div class="col-lg-5 offset-lg-1">
								<div class="about-service wpo-service-area">
									<?php 	// Group Param Output
									if (is_array($featuresItems_groups) && !empty($featuresItems_groups)) {
										foreach ($featuresItems_groups as $each_item) {
											$features_title = !empty($each_item['features_title']) ? $each_item['features_title'] : '';
											$features_des = !empty($each_item['features_des']) ? $each_item['features_des'] : '';
											$features_icon = !empty($each_item['features_icon']['value']) ? $each_item['features_icon']['value'] : '';
											$featuresIcon_svg_url = !empty($each_item['features_icon']['value']['url']) ? $each_item['features_icon']['value']['url'] : '';
											$svg_alt = get_post_meta($featuresIcon_svg_url, '_wp_attachment_image_alt', true);
									?>

											<div class="wpo-service-item">
												<div class="icon">
													<?php
													if ($featuresIcon_svg_url) {
														echo '<img  src="' . esc_url($featuresIcon_svg_url) . '" alt="' . esc_url($svg_alt) . '">';
													} else {
														echo '<i class="' . esc_attr($features_icon) . '"></i>';
													}
													?>
												</div>
												<div class="wpo-service-text">
													<?php
													if ($features_title) {
														echo '<h3>' . esc_html__($features_title) . '</h3>';
													}
													if ($features_des) {
														echo '<p>' . esc_html__($features_des) . '</p>';
													}
													?>
												</div>
											</div>

									<?php
										}
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } elseif ($about_style == 'style-three') { ?>
			<div class="awwa-about wpo-about-section-s3 section-padding">
				<div class="container">
					<div class="about-wrap">
						<div class="row align-items-center">
							<div class="col-lg-6 order-lg-1 order-2">
								<div class="about-img">
									<?php if ($image_url) {
										echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '">';
									}  ?>

									<div class="line-shape">
										<svg viewBox="0 0 691 698" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path
												d="M194.745 7.73158L682.884 476.323C692.602 485.652 688.577 502.003 675.639 505.755L25.7575 694.2C12.8189 697.952 0.670987 686.29 3.89112 673.209L165.633 16.173C168.853 3.09205 185.027 -1.59763 194.745 7.73158Z"
												stroke="url(#paint0_linear_58_164)" stroke-width="5" />
											<defs>
												<linearGradient id="paint0_linear_58_164" x1="171.486" y1="-18.0613"
													x2="411.364" y2="809.192" gradientUnits="userSpaceOnUse">
													<stop offset="0" stop-color="#F2CD8C" />
													<stop offset="1" stop-color="#CC9260" />
												</linearGradient>
											</defs>
										</svg>

									</div>
									<div class="line-shape-2">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 654 194" fill="none">
											<path d="M652.815 2.4759L0.769775 190.91" stroke="url(#paint0_linear_58_165)"
												stroke-width="5" />
											<defs>
												<linearGradient id="paint0_linear_58_165" x1="326.792" y1="96.693"
													x2="327.07" y2="97.6537" gradientUnits="userSpaceOnUse">
													<stop offset="0" stop-color="#F2CD8C" />
													<stop offset="1" stop-color="#CC9260" />
												</linearGradient>
											</defs>
										</svg>
									</div>
								</div>
							</div>
							<div class="col-lg-5 offset-lg-1 order-lg-2 order-1">
								<div class="about-content">
									<?php
									if ($about_title) {
										echo '<h2>' . esc_html($about_title) . '</h2>';
									}
									?>
									<?php
									if ($about_content) {
										echo wp_kses_post($about_content);
									}
									?>
									<div class="about-info">
										<?php
										if ($about_info_name) {
											echo '<h4>' . esc_html($about_info_name) . '</h4>';
										}
										if ($about_info_title) {
											echo '<span>' . esc_html($about_info_title) . '</span>';
										}
										?>
									</div>
									<div class="signeture">
										<?php if ($sign_url) {
											echo '<img src="' . esc_url($sign_url) . '" alt="' . esc_url($sign_alt) . '">';
										}  ?>
									</div>
								</div>
							</div>
							<div class="col-lg-12 order-lg-3 order-3">
								<div class="about-service wpo-service-area">
									<div class="row">
										<?php 	// Group Param Output
										if (is_array($featuresItems_groups) && !empty($featuresItems_groups)) {
											foreach ($featuresItems_groups as $each_item) {
												$features_title = !empty($each_item['features_title']) ? $each_item['features_title'] : '';
												$features_des = !empty($each_item['features_des']) ? $each_item['features_des'] : '';
												$features_icon = !empty($each_item['features_icon']['value']) ? $each_item['features_icon']['value'] : '';
												$featuresIcon_svg_url = !empty($each_item['features_icon']['value']['url']) ? $each_item['features_icon']['value']['url'] : '';
												$svg_alt = get_post_meta($featuresIcon_svg_url, '_wp_attachment_image_alt', true);
										?>
												<div class="col-lg-4 col-md-6 col-12">
													<div class="wpo-service-item">
														<div class="icon">
															<?php
															if ($featuresIcon_svg_url) {
																echo '<img  src="' . esc_url($featuresIcon_svg_url) . '" alt="' . esc_url($svg_alt) . '">';
															} else {
																echo '<i class="' . esc_attr($features_icon) . '"></i>';
															}
															?>
														</div>
														<div class="wpo-service-text">
															<?php
															if ($features_title) {
																echo '<h3>' . esc_html__($features_title) . '</h3>';
															}
															if ($features_des) {
																echo '<p>' . esc_html__($features_des) . '</p>';
															}
															?>
														</div>
													</div>
												</div>

										<?php
											}
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="light-shape-1"></div>
				<div class="light-shape-2"></div>
				<div class="light-shape-3"></div>
			</div>
		<?php } elseif ($about_style == 'style-four') { ?>
			<section class="awwa-about wpo-about-section-s4 section-padding">
				<div class="container">
					<div class="about-wrap">
						<div class="row align-items-center">
							<div class="col-lg-6 order-lg-1 order-2">
								<div class="about-img">
									<?php if ($image_url) {
										echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '">';
									}  ?>
									<div class="round-text">
										<div class="circular-text text-roted">
											<?php
											if ($about_rotate_title) {
												echo '<p class="text">' . esc_html($about_rotate_title) . '</p>';
											}
											?>
										</div>
										<div class="icon"><i class="ti-arrow-top-right"></i></div>
										<div class="dots">
											<span></span>
											<span></span>
											<span></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-5 offset-lg-1 order-lg-2 order-1">
								<div class="about-content">
									<?php
									if ($about_title) {
										echo '<h2>' . esc_html($about_title) . '</h2>';
									}
									?>
									<?php
									if ($about_content) {
										echo wp_kses_post($about_content);
									}
									?>
									<div class="about-info">
										<?php
										if ($about_info_name) {
											echo '<h4>' . esc_html($about_info_name) . '</h4>';
										}
										if ($about_info_title) {
											echo '<span>' . esc_html($about_info_title) . '</span>';
										}
										?>
									</div>
									<div class="signeture">
										<?php if ($sign_url) {
											echo '<img src="' . esc_url($sign_url) . '" alt="' . esc_url($sign_alt) . '">';
										}  ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="light-shape-1"></div>
				<div class="light-shape-2"></div>
				<div class="light-shape-3"></div>
			</section>

<?php }
		echo ob_get_clean();
	}
	/**
	 * Render About widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Site_About());
