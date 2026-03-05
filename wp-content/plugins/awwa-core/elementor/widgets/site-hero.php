<?php
/*
 * Elementor Awwa Hero Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Site_Hero extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-awwa_hero';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Hero', 'awwa-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'ti-panel';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Awwa Hero widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-awwa_hero'];
	}

	/**
	 * Register Awwa Hero widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_hero',
			[
				'label' => esc_html__('Hero Options', 'awwa-core'),
			]
		);
		$this->add_control(
			'hero_style',
			[
				'label' => esc_html__('Hero Style', 'awwa-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'awwa-core'),
					'style-two' => esc_html__('Style two', 'awwa-core'),
					'style-three' => esc_html__('Style three', 'awwa-core'),
					'style-four' => esc_html__('Style four', 'awwa-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your hero style.', 'awwa-core'),
			]
		);
		$this->add_control(
			'main_image',
			[
				'label' => esc_html__('Main Image', 'awwa-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'awwa-core'),
			]
		);
		$this->add_control(
			'hero_image',
			[
				'label' => esc_html__('Add Vector Images', 'habibi-core'),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'condition' => [
					'hero_style' => array('style-one', 'style-two'),
				],
				'show_label' => false,
				'default' => [],
			]
		);
		$this->add_control(
			'hero_bg',
			[
				'label' => esc_html__('Add Righr Bg Images', 'awwa-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'frontend_available' => true,
				'condition' => [
					'hero_style' => array('style-four'),
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'awwa-core'),
			]
		);
		$this->add_control(
			'hero_title',
			[
				'label' => esc_html__('Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Hello I’m Albert Wilson', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'hero_title2',
			[
				'label' => esc_html__('Title2 Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('A Creative UX/UI Designer', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'hero_content',
			[
				'label' => esc_html__('Content Text', 'awwa-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Description', 'awwa-core'),
				'placeholder' => esc_html__('Type Description text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'shape_image',
			[
				'label' => esc_html__('Title BG Image', 'medically-core'),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'hero_style' => array('style-one', 'style-two'),
				],
				'description' => esc_html__('Set your Masking image.', 'medically-core'),
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__('Button Text', 'awwa-core'),
				'default' => esc_html__('button text', 'awwa-core'),
				'placeholder' => esc_html__('Type button Text here', 'awwa-core'),
				'condition' => [
					'hero_style' => array('style-three', 'style-four'),
				],
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__('Button Link', 'awwa-core'),
				'condition' => [
					'hero_style' => array('style-three', 'style-four'),
				],
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'video_icon',
			[
				'label' => __('Icon', 'awwa-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'flaticon-play-button',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'video_link',
			[
				'label' => esc_html__('Video Link', 'awwa-core'),
				'condition' => [
					'hero_style' => array('style-three', 'style-four'),
				],
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'client_number',
			[
				'label' => esc_html__('Client Number', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('500', 'awwa-core'),
				'placeholder' => esc_html__('Type title Number here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'client_title',
			[
				'label' => esc_html__('Client Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Happy Clients', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'condition' => [
					'hero_style' => array('style-one', 'style-two'),
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'client_images',
			[
				'label' => esc_html__('Client Images', 'habibi-core'),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
			]
		);
		$this->add_control(
			'slide_title',
			[
				'label' => esc_html__('Slide Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Slide Title', 'awwa-core'),
				'condition' => [
					'hero_style' => array('style-two'),
				],
				'placeholder' => esc_html__('Slide title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'round_title',
			[
				'label' => esc_html__('Round Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Round Title', 'awwa-core'),
				'condition' => [
					'hero_style' => array('style-three', 'style-four'),
				],
				'placeholder' => esc_html__('Round title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->end_controls_section(); // end: Section

		$this->start_controls_section(
			'section_hero_experience',
			[
				'label' => esc_html__('Experience Options', 'awwa-core'),
				'condition' => [
					'hero_style' => array('style-one', 'style-two'),
				],
			]
		);
		$this->add_control(
			'exp_number',
			[
				'label' => esc_html__('Experience number', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('25+', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'exp_title',
			[
				'label' => esc_html__('Experience Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Years Of Experience', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->end_controls_section(); // end: Section

		// Body Style
		$this->start_controls_section(
			'section_body_style',
			[
				'label' => esc_html__('Body Style', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_body_bg_color',
			[
				'label' => esc_html__('Background', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_back_border_color',
			[
				'label' => esc_html__('Back Border', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'hero_style' => array('style-one', 'style-two'),
				],
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-style-2 .round-shape .round-1, .wpo-hero-style-2 .round-shape .round-2, .wpo-hero-style-2 .round-shape .round-3, .awwa-hero .wpo-hero-img' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_back_border_color2',
			[
				'label' => esc_html__('Back Border', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'hero_style' => array('style-three', 'style-four'),
				],
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-img .line-shape svg linearGradient stop, .awwa-hero .wpo-hero-img .line-shape-2 svg linearGradient stop' => 'stop-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'light_droper_color',
			[
				'label' => esc_html__('Dropper Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'hero_style' => array('style-three', 'style-four'),
				],
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .common-color' => 'background: radial-gradient(50% 50% at 50% 50%, {{VALUE}} 0%, rgba(242, 205, 140, 0) 97.4%);',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__('Title', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'hero_style' => array('style-one', 'style-two'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'awwa_title_typography',
				'selector' => '{{WRAPPER}} .awwa-hero .wpo-hero-title-box .wpo-hero-title h2',
			]
		);
		$this->add_control(
			'title_bg_color',
			[
				'label' => esc_html__('BG Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-title-box' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_border_color',
			[
				'label' => esc_html__('Border Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-title-box .wpo-hero-title' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-title-box .wpo-hero-title h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-title-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Exp Number
		$this->start_controls_section(
			'section_exp_number_style',
			[
				'label' => esc_html__('Experience Number', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'hero_style' => array('style-one', 'style-two'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'exp_number_typography',
				'label' => esc_html__('Typography', 'awwa-core'),
				'selector' => '{{WRAPPER}} .awwa-hero .experience .icon span',
			]
		);
		$this->add_control(
			'exp_number_bg',
			[
				'label' => esc_html__('BG Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .experience .icon span' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'exp_number_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .experience .icon span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Exp desc
		$this->start_controls_section(
			'section_exp_text_style',
			[
				'label' => esc_html__('Experience Text', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'hero_style' => array('style-one', 'style-two'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'exp_text_typography',
				'label' => esc_html__('Typography', 'awwa-core'),
				'selector' => '{{WRAPPER}} .awwa-hero .experience p',
			]
		);
		$this->add_control(
			'exp_text_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .experience p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Slide Title
		$this->start_controls_section(
			'slide_title_style',
			[
				'label' => esc_html__('Slide Title Text', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'hero_style' => array('style-one', 'style-two'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'slide_text_typography',
				'label' => esc_html__('Typography', 'awwa-core'),
				'selector' => '{{WRAPPER}} .wpo-hero-style-2 .hero-marque h1',
			]
		);
		$this->add_control(
			'slide_text_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-style-2 .hero-marque h1' => '-webkit-text-stroke-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'slide_text_bg_color',
			[
				'label' => esc_html__('BG Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-style-2 .track .content' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'slide_text_border_color',
			[
				'label' => esc_html__('Border Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-style-2 .track' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Sub Title
		$this->start_controls_section(
			'hero_subtitle_style',
			[
				'label' => esc_html__('Subtitle Title', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'hero_style' => array('style-three', 'style-four'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'hero_subtitle_typography',
				'selector' => '{{WRAPPER}} .awwa-hero .wpo-hero-content .wpo-hero-text span',
			]
		);
		$this->add_control(
			'hero_subtitle_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-content .wpo-hero-text span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'hero_subtitle_padding',
			[
				'label' => esc_html__('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-content .wpo-hero-text span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Title
		$this->start_controls_section(
			'hero_title_style',
			[
				'label' => esc_html__('Title', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'hero_style' => array('style-three', 'style-four'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'hero_title_typography',
				'selector' => '{{WRAPPER}} .awwa-hero .wpo-hero-content .wpo-hero-text h2',
			]
		);
		$this->add_control(
			'hero_title_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-content .wpo-hero-text h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'hero_title_padding',
			[
				'label' => esc_html__('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-content .wpo-hero-text h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Content
		$this->start_controls_section(
			'hero_content_style',
			[
				'label' => esc_html__('Content Title', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'hero_style' => array('style-three'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'hero_content_typography',
				'selector' => '{{WRAPPER}} .awwa-hero .wpo-hero-content .wpo-hero-text p',
			]
		);
		$this->add_control(
			'hero_content_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-content .wpo-hero-text p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'hero_content_padding',
			[
				'label' => esc_html__('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-content .wpo-hero-text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Button
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__('Button', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'hero_style' => array('style-three', 'style-four'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_one_typography',
				'label' => esc_html__('Typography', 'awwa-core'),
				'selector' => '{{WRAPPER}} .awwa-hero .theme-btn-s3',
			]
		);
		$this->start_controls_tabs('button_one_style');
		$this->start_controls_tab(
			'button_one_normal',
			[
				'label' => esc_html__('Normal', 'awwa-core'),
			]
		);
		$this->add_control(
			'button_one_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .theme-btn-s3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_one_bg_color',
			[
				'label' => esc_html__('Background', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .theme-btn-s3, .theme-btn-s3 span::before' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => esc_html__('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .theme-btn-s3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Normal tab

		$this->start_controls_tab(
			'button_one_hover',
			[
				'label' => esc_html__('Hover', 'awwa-core'),
			]
		);
		$this->add_control(
			'button_one_hover_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .theme-btn-s3:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_one_bg_hover_color',
			[
				'label' => esc_html__('Background Hover', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .theme-btn-s3:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section(); // end: Section

		// Video button
		$this->start_controls_section(
			'video_btn_style',
			[
				'label' => esc_html__('Video Style', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'hero_style' => array('style-three', 'style-four'),
				],
			]
		);
		$this->add_control(
			'video_btn_border',
			[
				'label' => esc_html__('Border Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-content .slide-btns ul li .video-btn' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'video_btn_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .wpo-hero-content .slide-btns ul li .video-btn i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Rotate Text
		$this->start_controls_section(
			'rotate_style',
			[
				'label' => esc_html__('Rotate Text', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'hero_style' => array('style-three'),
				],
			]
		);
		$this->add_control(
			'rotate_border',
			[
				'label' => esc_html__('Background', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .rotate-text .icon i ' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'rotate_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-hero .rotate-text .circular-text span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


	}

	/**
	 * Render Hero widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$hero_style = !empty($settings['hero_style']) ? $settings['hero_style'] : '';

		$hero_title = !empty($settings['hero_title']) ? $settings['hero_title'] : '';
		$hero_title2 = !empty($settings['hero_title2']) ? $settings['hero_title2'] : '';
		$hero_content = !empty($settings['hero_content']) ? $settings['hero_content'] : '';

		$exp_number = !empty($settings['exp_number']) ? $settings['exp_number'] : '';
		$exp_title = !empty($settings['exp_title']) ? $settings['exp_title'] : '';
		$slide_title = !empty($settings['slide_title']) ? $settings['slide_title'] : '';
		$round_title = !empty($settings['round_title']) ? $settings['round_title'] : '';

		$client_number = !empty($settings['client_number']) ? $settings['client_number'] : '';
		$client_title = !empty($settings['client_title']) ? $settings['client_title'] : '';

		$client_images = !empty($settings['client_images']) ? $settings['client_images'] : '';

		$hero_image = !empty($settings['hero_image']) ? $settings['hero_image'] : '';
		$main_image = !empty($settings['main_image']['id']) ? $settings['main_image']['id'] : '';
		$hero_bg = !empty($settings['hero_bg']['id']) ? $settings['hero_bg']['id'] : '';

		$button_text = !empty($settings['btn_text']) ? $settings['btn_text'] : '';
		$button_link = !empty($settings['btn_link']['url']) ? $settings['btn_link']['url'] : '';
		$button_link_external = !empty($settings['btn_link']['is_external']) ? 'target="_blank"' : '';
		$button_link_nofollow = !empty($settings['btn_link']['nofollow']) ? 'rel="nofollow"' : '';
		$button_link_attr = !empty($button_link) ?  $button_link_external . ' ' . $button_link_nofollow : '';

		$video_link = !empty($settings['video_link']['url']) ? $settings['video_link']['url'] : '';

		$image_url = wp_get_attachment_url($main_image);
		$image_alt = get_post_meta($main_image, '_wp_attachment_image_alt', true);

		$image2_url = wp_get_attachment_url($hero_bg);
		$image2_alt = get_post_meta($hero_bg, '_wp_attachment_image_alt', true);

		$video_icon = !empty($settings['video_icon']['value']) ? $settings['video_icon']['value'] : '';
		$videoIcon_svg_url = !empty($settings['video_icon']['value']['url']) ? $settings['video_icon']['value']['url'] : '';
		$svg_alt = get_post_meta($videoIcon_svg_url, '_wp_attachment_image_alt', true);


		$awwa_button = $button_link ? '<a href="' . esc_url($button_link) . '" ' . $button_link_attr . ' class="theme-btn-s3"> <span> ' . esc_html($button_text) . '</span></a>' : '';

		// Shape Image
		$shape_bg = !empty($settings['shape_image']['id']) ? $settings['shape_image']['id'] : '';
		$shape_bg_url = wp_get_attachment_url($shape_bg);

		// Turn output buffer on
		ob_start(); ?>

		<?php if ($hero_style == 'style-one') { ?>
			<div class="awwa-hero wpo-hero-style-1">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col col-xl-4 col-lg-3 col-md-3 col-12">
							<div class="wpo-hero-left">
								<div class="wpo-hero-title-box wow fadeInLeft" data-wow-duration="1200ms" style="background-image: url(<?php echo esc_url($shape_bg_url) ?>)">
									<div class="wpo-hero-title">
										<?php if ($hero_title) {
											echo '<h2>' . esc_html($hero_title) . '</h2>';
										} ?>
									</div>
								</div>
								<div class="wpo-supporter wow fadeInUp" data-wow-duration="1500ms">
									<div class="wpo-supporter-text">
										<div class="content">
											<?php if ($client_number) {
												echo '<h3>' . esc_html($client_number) . '</h3>';
											} ?>
											<?php if ($client_title) {
												echo '<p>' . esc_html($client_title) . '</p>';
											} ?>
										</div>
									</div>
									<div class="wpo-supporter-img">
										<ul class="wpo-supporter-slide owl-carousel">
											<?php
											$id = 0;
											if (is_array($client_images) && !empty($client_images)) {
												foreach ($client_images as $each_item) {
													$id++;
													$client_url = !empty($each_item['url']) ? $each_item['url'] : '';
													$client_alt = get_post_meta($each_item['url'], '_wp_attachment_image_alt', true);

											?>

													<li>
														<?php if ($client_url) {
															echo '<img src="' . esc_attr($client_url) . '" alt="' . esc_url($client_alt) . '">';
														}  ?>
													</li>

											<?php
												}
											}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col col-xl-4 col-lg-6 col-md-6 col-12">
							<div class="wpo-hero-img">
								<?php if ($image_url) {
									echo '<img src="' . esc_attr($image_url) . '" alt="' . esc_url($image_alt) . '">';
								}  ?>

								<?php
								$id = 0;
								if (is_array($hero_image) && !empty($hero_image)) {
									foreach ($hero_image as $each_item) {
										$id++;
										$image_url = !empty($each_item['url']) ? $each_item['url'] : '';
										$image_alt = get_post_meta($each_item['url'], '_wp_attachment_image_alt', true);

										if ($id == '1') {
											$class_name = 'vector-1';
										} elseif ($id == '2') {
											$class_name = 'vector-2';
										} else {
											$class_name = 'vector-3';
										}

										if ($id) { ?>

											<div class="<?php echo esc_attr($class_name); ?>">
												<?php if ($image_url) {
													echo '<img src="' . esc_attr($image_url) . '" alt="' . esc_url($image_alt) . '">';
												}  ?>
											</div>

								<?php }
									}
								}
								?>
							</div>
						</div>
						<div class="col col-xl-4 col-lg-3 col-md-3 col-12">
							<div class="wpo-hero-right">
								<div class="experience wow fadeInDown" data-wow-duration="1500ms">
									<?php if ($exp_number) {
										echo '<div class="icon"> <span>' . esc_html($exp_number) . '</span></div>';
									} ?>
									<div class="content">
										<?php if ($exp_title) {
											echo '<p>' . esc_html($exp_title) . '</p>';
										} ?>
									</div>
								</div>
								<div class="wpo-hero-title-box wow fadeInRight" data-wow-duration="1200ms" style="background-image: url(<?php echo esc_url($shape_bg_url) ?>)">
									<div class="wpo-hero-title">
										<?php if ($hero_title2) {
											echo '<h2>' . esc_html($hero_title2) . '</h2>';
										} ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } elseif ($hero_style == 'style-two') { ?>

			<div class="awwa-hero wpo-hero-style-2">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col col-xl-3 col-lg-3 col-md-3 col-12 order-md-1 order-1">
							<div class="wpo-hero-left">
								<div class="wpo-hero-title-box">
									<div class="wpo-hero-title">
										<?php if ($hero_title) {
											echo '<h2>' . esc_html($hero_title) . '</h2>';
										} ?>
									</div>
								</div>
								<div class="experience wow fadeInUp" data-wow-duration="1500ms">
									<?php if ($exp_number) {
										echo '<div class="icon"> <span>' . esc_html($exp_number) . '</span></div>';
									} ?>
									<div class="content">
										<?php if ($exp_title) {
											echo '<p>' . esc_html($exp_title) . '</p>';
										} ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-6 col-12 order-md-2 order-3">
							<div class="wpo-hero-img">
								<?php if ($image_url) {
									echo '<img src="' . esc_attr($image_url) . '" alt="' . esc_url($image_alt) . '">';
								}  ?>

								<?php
								$id = 0;
								if (is_array($hero_image) && !empty($hero_image)) {
									foreach ($hero_image as $each_item) {
										$id++;
										$image_url = !empty($each_item['url']) ? $each_item['url'] : '';
										$image_alt = get_post_meta($each_item['url'], '_wp_attachment_image_alt', true);

										if ($id == '1') {
											$class_name = 'vector-1';
										} elseif ($id == '2') {
											$class_name = 'vector-2';
										} else {
											$class_name = 'vector-3';
										}

										if ($id) { ?>

											<div class="<?php echo esc_attr($class_name); ?>">
												<?php if ($image_url) {
													echo '<img src="' . esc_attr($image_url) . '" alt="' . esc_url($image_alt) . '">';
												}  ?>
											</div>

								<?php }
									}
								}
								?>
							</div>
						</div>
						<div class="col col-xl-3 col-lg-3 col-md-3 col-12 order-md-3 order-2">
							<div class="wpo-hero-right">
								<div class="wpo-supporter wow fadeInDown" data-wow-duration="1500ms">
									<div class="wpo-supporter-text">
										<div class="content">
											<?php if ($client_number) {
												echo '<h3>' . esc_html($client_number) . '</h3>';
											} ?>
											<?php if ($client_title) {
												echo '<p>' . esc_html($client_title) . '</p>';
											} ?>
										</div>
									</div>
									<div class="wpo-supporter-img">
										<ul class="wpo-supporter-slide owl-carousel">
											<?php
											$id = 0;
											if (is_array($client_images) && !empty($client_images)) {
												foreach ($client_images as $each_item) {
													$id++;
													$client_url = !empty($each_item['url']) ? $each_item['url'] : '';
													$client_alt = get_post_meta($each_item['url'], '_wp_attachment_image_alt', true);

											?>

													<li>
														<?php if ($client_url) {
															echo '<img src="' . esc_attr($client_url) . '" alt="' . esc_url($client_alt) . '">';
														}  ?>
													</li>

											<?php
												}
											}
											?>
										</ul>
									</div>
								</div>
								<div class="wpo-hero-title-box">
									<div class="wpo-hero-title">
										<?php if ($hero_title2) {
											echo '<h2>' . esc_html($hero_title2) . '</h2>';
										} ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="hero-marque">
					<div class="marquee">
						<div class="track">
							<div class="content">
								<?php if ($slide_title) {
									echo '<h1>' . esc_html($slide_title) . '</h1>';
								} ?>
							</div>
						</div>
					</div>
				</div>
				<div class="round-shape">
					<div class="round-1 wow zoomIn" data-wow-duration="2000ms"></div>
					<div class="round-2 wow zoomIn" data-wow-duration="1500ms"></div>
					<div class="round-3 wow zoomIn" data-wow-duration="1000ms"></div>
				</div>
			</div>
		<?php } elseif ($hero_style == 'style-three') { ?>
			<div class="awwa-hero wpo-hero-style-3">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col col-xl-6 col-lg-6 col-md-12 col-12 order-md-1 order-1">
							<div class="wpo-hero-content">
								<div class="wpo-hero-text">
									<?php if ($hero_title) {
										echo '<span>' . esc_html($hero_title) . '</span>';
									} ?>
									<?php if ($hero_title2) {
										echo '<h2>' . esc_html($hero_title2) . '</h2>';
									} ?>
									<?php if ($hero_content) {
										echo '<p>' . esc_html($hero_content) . '</p>';
									} ?>
								</div>
								<div data-swiper-parallax="500" class="slide-btns">
									<?php echo $awwa_button; ?>
									<ul>
										<li class="video-holder">
											<a href="<?php echo esc_url($video_link); ?>" class="video-btn" data-type="iframe">
												<?php
												if ($videoIcon_svg_url) {
													echo '<img  src="' . esc_url($videoIcon_svg_url) . '" alt="' . esc_url($svg_alt) . '">';
												} else {
													echo '<i class="' . esc_attr($video_icon) . '"></i>';
												}
												?>
											</a>
										</li>
										<li class="video-text">
											<a href="<?php echo esc_url($video_link); ?>" class="video-btn" data-type="iframe" tabindex="0">
												Watch Our Video
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-12 order-md-2 order-3">
							<div class="wpo-hero-img">
								<?php if ($image_url) {
									echo '<img src="' . esc_attr($image_url) . '" alt="' . esc_url($image_alt) . '">';
								}  ?>
								<div class="line-shape">
									<svg viewBox="0 0 747 815" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M719.5 4.46177C731.74 -1.16507 745.482 8.56845 744.234 21.9821L672.226 796.514C670.979 809.928 655.679 816.961 644.686 809.175L9.92582 359.548C-1.06721 351.761 0.491669 334.994 12.7318 329.367L719.5 4.46177Z" stroke="url(#paint0_linear_58_42)" stroke-width="5" />
										<defs>
											<linearGradient id="paint0_linear_58_42" x1="749.93" y1="-12.2787" x2="184.505" y2="785.961" gradientUnits="userSpaceOnUse">
												<stop offset="0" stop-color="#F2CD8C" />
												<stop offset="1" stop-color="#CC9260" />
											</linearGradient>
										</defs>
									</svg>
								</div>
								<div class="line-shape-2">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 626 446" fill="none">
										<path d="M624 443L2 3" stroke="url(#paint0_linear_58_46)" stroke-width="5" />
										<defs>
											<linearGradient id="paint0_linear_58_46" x1="313" y1="223" x2="312.422" y2="223.816" gradientUnits="userSpaceOnUse">
												<stop offset="0" stop-color="#F2CD8C" />
												<stop offset="1" stop-color="#CC9260" />
											</linearGradient>
										</defs>
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="wpo-supporter wow fadeInUp" data-wow-duration="1500ms">
					<div class="wpo-supporter-text">
						<div class="content">
							<?php if ($client_number) {
								echo '<h3>' . esc_html($client_number) . '</h3>';
							} ?>
							<?php if ($client_title) {
								echo '<p>' . esc_html($client_title) . '</p>';
							} ?>
						</div>
					</div>
					<div class="wpo-supporter-img">
						<ul class="wpo-supporter-slide owl-carousel">
							<?php
							$id = 0;
							if (is_array($client_images) && !empty($client_images)) {
								foreach ($client_images as $each_item) {
									$id++;
									$client_url = !empty($each_item['url']) ? $each_item['url'] : '';
									$client_alt = get_post_meta($each_item['url'], '_wp_attachment_image_alt', true);

							?>

									<li>
										<?php if ($client_url) {
											echo '<img src="' . esc_attr($client_url) . '" alt="' . esc_url($client_alt) . '">';
										}  ?>
									</li>

							<?php
								}
							}
							?>
						</ul>
					</div>
				</div>
				<div class="rotate-text">
					<div class="circular-text text-roted">
						<?php if ($round_title) {
							echo '<p class="text">' . esc_html($round_title) . '</p>';
						} ?>
					</div>
					<div class="icon"><i class="ti-arrow-top-right"></i></div>
					<div class="dots">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<div class="light-shape-1 common-color"></div>
				<div class="light-shape-2 common-color"></div>
				<div class="light-shape-3 common-color"></div>
			</div>

		<?php } elseif ($hero_style == 'style-four') { ?>
			<section class="awwa-hero wpo-hero-style-4">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col col-xl-6 col-lg-6 col-md-12 col-12 order-md-1 order-1">
							<div class="wpo-hero-content">
								<div class="wpo-hero-text">
									<?php if ($hero_title) {
										echo '<span>' . esc_html($hero_title) . '</span>';
									} ?>
									<?php if ($hero_title2) {
										echo '<h2>' . esc_html($hero_title2) . '</h2>';
									} ?>
								</div>
								<div data-swiper-parallax="500" class="slide-btns">
									<?php echo $awwa_button; ?>
									<ul>
										<li class="video-holder">
											<a href="<?php echo esc_url($video_link); ?>" class="video-btn" data-type="iframe">
												<?php
												if ($videoIcon_svg_url) {
													echo '<img  src="' . esc_url($videoIcon_svg_url) . '" alt="' . esc_url($svg_alt) . '">';
												} else {
													echo '<i class="' . esc_attr($video_icon) . '"></i>';
												}
												?>
											</a>
										</li>
										<li class="video-text">
											<a href="<?php echo esc_url($video_link); ?>" class="video-btn" data-type="iframe" tabindex="0">
												Watch Our Video
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-12 order-md-2 order-3">
							<div class="wpo-hero-img">
								<?php if ($image_url) {
									echo '<img src="' . esc_attr($image_url) . '" alt="' . esc_url($image_alt) . '">';
								}  ?>
							</div>
						</div>
					</div>
				</div>
				<div class="light-shape-1 common-color"></div>
				<div class="light-shape-2 common-color"></div>
				<div class="light-shape-3 common-color"></div>
				<div class="shape-bg">
					<?php if ($image2_url) {
						echo '<img src="' . esc_attr($image2_url) . '" alt="' . esc_url($image_alt) . '">';
					}  ?>
				</div>
			</section>
<?php }
		// Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render Hero widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Site_Hero());
