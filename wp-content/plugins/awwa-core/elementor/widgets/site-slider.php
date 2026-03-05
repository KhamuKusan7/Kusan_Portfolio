<?php
/*
 * Elementor Awwa Slider Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Site_Slider extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-awwa_slider';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Slider', 'awwa-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-post-slider';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Awwa Slider widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */

	public function get_script_depends()
	{
		return ['wpo-awwa_slider'];
	}


	/**
	 * Register Awwa Slider widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_slider',
			[
				'label' => __('Slider Options', 'awwa-core'),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'slide_color',
			[
				'label' => esc_html__('Shape Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .hero-slider .hero-shape svg path' => 'fill: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'topbar_logo',
			[
				'label' => esc_html__('Topbar Icon', 'awwa-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'awwa-core'),
			]
		);
		$repeater->add_control(
			'hero_top_title',
			[
				'label' => esc_html__('Top Title', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Create Your Dream Project With Us', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'hero_title',
			[
				'label' => esc_html__('Title Text', 'awwa-core'),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__('Best It Solution For Your Business', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'hero_content',
			[
				'label' => esc_html__('Content', 'awwa-core'),
				'default' => esc_html__('your content text', 'awwa-core'),
				'placeholder' => esc_html__('Type your content here', 'awwa-core'),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'btn_text',
			[
				'label' => esc_html__('Button Text', 'awwa-core'),
				'default' => esc_html__('button text', 'awwa-core'),
				'placeholder' => esc_html__('Type button Text here', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'btn_link',
			[
				'label' => esc_html__('Button Link', 'awwa-core'),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'slider_image',
			[
				'label' => esc_html__('Slider Image', 'awwa-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'video_link',
			[
				'label' => esc_html__( 'Video Link', 'awwa-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'awwa-core' ),
				'placeholder' => esc_html__( 'Type video link here', 'awwa-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'swipeSliders_groups',
			[
				'label' => esc_html__('Slider Items', 'awwa-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'hero_top_title' => esc_html__('Item #1', 'awwa-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ hero_top_title }}}',
			]
		);
		$this->end_controls_section(); // end: Section

		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__('Slider Extra Options', 'awwa-core'),
			]
		);
		$this->add_control(
			'carousel_nav',
			[
				'label' => esc_html__('Navigation', 'awwa-core'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'awwa-core'),
				'label_off' => esc_html__('No', 'awwa-core'),
				'return_value' => 'true',
				'description' => esc_html__('If you want Carousel Navigation, enable it.', 'awwa-core'),
			]
		);
		$this->end_controls_section(); // end: Section


		// Slide
		$this->start_controls_section(
			'section_slide_option_style',
			[
				'label' => esc_html__('Slide', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'slide_margin',
			[
				'label' => __('Margin', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .hero-slider .slide-inner .slide-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'slide_height',
			[
				'label' => esc_html__('height', 'consoel-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 500,
						'max' => 1000,
						'step' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 900,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-slider' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'slide_overly_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider .slide-inner:before' => 'background-color: {{VALUE}};',
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
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .hero-slider-section .content .sub-title h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider-section .content .sub-title h2' => 'color: {{VALUE}};',
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
				'name' => 'slider_content_typography',
				'selector' => '{{WRAPPER}} .hero-slider-section .content p',
			]
		);
		$this->add_control(
			'slider_content_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider-section .content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Navigation
		$this->start_controls_section(
			'section_navigation_style',
			[
				'label' => esc_html__('Navigation', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'slider_nav_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider .swiper-pagination-bullets .swiper-pagination-bullet' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'slider_nav_active_color',
			[
				'label' => esc_html__('Active Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider .swiper-pagination-bullets .swiper-pagination-bullet-active' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'slider_nav_active_line_color',
			[
				'label' => esc_html__('Line Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider .swiper-pagination-bullets .swiper-pagination-bullet-active:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// SubTitle
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' => esc_html__('SubTitle', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'awwa_subtitle_typography',
				'selector' => '{{WRAPPER}} .hero-slider-section .content .title span',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider-section .content .title span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'subtitle_bg_color',
			[
				'label' => esc_html__('Background Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider-section .content .title' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'subtitle_icon_color',
			[
				'label' => esc_html__('Icon Background', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider-section .content .title .icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'subtitle_padding',
			[
				'label' => esc_html__('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .hero-slider-section .content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'awwa_title_typography',
				'selector' => '{{WRAPPER}} .hero-slider-section .content .sub-title h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider-section .content .sub-title h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_highlight_color',
			[
				'label' => esc_html__('Highlight  Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider-section .content .sub-title h2 span' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .hero-slider-section .content .sub-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .hero-slider-section .content p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider-section .content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__('Content Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .hero-slider-section .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_one_typography',
				'label' => esc_html__('Typography', 'awwa-core'),
				'selector' => '{{WRAPPER}} .hero-slider-section .theme-btn',
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
					'{{WRAPPER}} .hero-slider-section .theme-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_one_bg_color',
			[
				'label' => esc_html__('Background', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider-section .theme-btn' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .hero-slider-section .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .hero-slider-section .theme-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_one_bg_hover_color',
			[
				'label' => esc_html__('Background Hover', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slider-section .theme-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section(); // end: Section



	}

	/**
	 * Render Blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		// Carousel Options
		$swipeSliders_groups = !empty($settings['swipeSliders_groups']) ? $settings['swipeSliders_groups'] : [];
		$carousel_nav  = (isset($settings['carousel_nav']) && ('true' == $settings['carousel_nav'])) ? true : false;
		$video_link = !empty( $settings['video_link'] ) ? $settings['video_link'] : '';

		// Turn output buffer on
		ob_start();

?>

		<div class="hero-slide">
			<div class="hero-slider-section">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php
						if (is_array($swipeSliders_groups) && !empty($swipeSliders_groups)) {
							foreach ($swipeSliders_groups as $each_item) {

								$image_url = wp_get_attachment_url($each_item['slider_image']['id']);
								$hero_top_title = !empty($each_item['hero_top_title']) ? $each_item['hero_top_title'] : '';
								$hero_title = !empty($each_item['hero_title']) ? $each_item['hero_title'] : '';
								$hero_content = !empty($each_item['hero_content']) ? $each_item['hero_content'] : '';
								$button_text = !empty($each_item['btn_text']) ? $each_item['btn_text'] : '';
								$button_link = !empty($each_item['btn_link']['url']) ? $each_item['btn_link']['url'] : '';
								$button_link_external = !empty($each_item['btn_link']['is_external']) ? 'target="_blank"' : '';
								$button_link_nofollow = !empty($each_item['btn_link']['nofollow']) ? 'rel="nofollow"' : '';
								$button_link_attr = !empty($button_link) ?  $button_link_external . ' ' . $button_link_nofollow : '';

								$bg_image2 = !empty($each_item['topbar_logo']['id']) ? $each_item['topbar_logo']['id'] : '';
								$image2_url = wp_get_attachment_url($bg_image2);
								$image2_alt = get_post_meta($bg_image2, '_wp_attachment_image_alt', true);

								$awwa_button = $button_link ? '<a href="' . esc_url($button_link) . '" ' . $button_link_attr . ' class="btn theme-btn">' . esc_html($button_text) . '<i class="ti-arrow-right"></i></a>' : '';
						?>

								<div class="swiper-slide">
									<div class="slide-inner slide-bg-image" data-background="<?php echo esc_url($image_url); ?>">
										<!-- <div class="gradient-overlay"></div> -->
										<div class="container-fluid">
											<div class="content">
												<div class="title">
													<?php if ($image2_url) {
														echo '<div class="icon"><img src="' . esc_attr($image2_url) . '" alt="' . esc_url($image2_alt) . '"></div>';
													}  ?>

													<?php if ($hero_top_title) {
														echo '<span>' . esc_html($hero_top_title) . '</span>';
													} ?>
												</div>
												<div class="sub-title">
													<?php if ($hero_title) {
														echo '<h2>' . wp_kses_post($hero_title) . '</h2>';
													} ?>
												</div>
												<?php
												if ($hero_content) {
													echo '<p>' . esc_html($hero_content) . '</p>';
												} ?>
												<div class="hero-btn">
													<?php echo $awwa_button; ?>
												</div>
											</div>
										</div>
									</div> <!-- end slide-inner -->
								</div> <!-- end swiper-slide -->

								<!-- end swiper-slide -->
						<?php }
						} ?>
					</div>
					<!-- end swiper-wrapper -->
					<?php if ($carousel_nav) { ?>
						<!-- swipper controls -->
						<div class="swiper-pagination"></div>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					<?php } ?>
				</div>
				<div class="video wow fadeInRight" data-wow-duration="1800ms">
                    <a href="<?php echo esc_url( $video_link ); ?>" class="video-btn"
                        data-type="iframe">
                        <svg viewBox="0 0 31 35" fill="none">
                            <path
                                d="M29.5 14.9019C31.5 16.0566 31.5 18.9434 29.5 20.0981L4.74999 34.3875C2.74999 35.5422 0.249998 34.0988 0.249998 31.7894L0.25 3.21057C0.25 0.901172 2.75 -0.542197 4.75 0.612504L29.5 14.9019Z"
                                fill="#233FD6" />
                        </svg>
                    </a>
                </div>
			</div>
		</div>
<?php
		// Return outbut buffer
		echo ob_get_clean();
	}

	/**
	 * Render Blog widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Site_Slider());
