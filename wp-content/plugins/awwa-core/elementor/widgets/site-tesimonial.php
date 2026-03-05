<?php
/*
 * Elementor Awwa Testimonial Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Awwa_Testimonial extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-awwa_testimonial';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Testimonial', 'awwa-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-testimonial';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Awwa Testimonial widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-awwa_testimonial'];
	}

	/**
	 * Register Awwa Testimonial widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{
		$this->start_controls_section(
			'testimonial_style_option',
			[
				'label' => esc_html__('Testimonial Options', 'awwa-core'),
			]
		);
		$this->add_control(
			'testimonial_style',
			[
				'label' => esc_html__('Testimonial Style', 'awwa-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'awwa-core'),
					'style-two' => esc_html__('Style two', 'awwa-core'),
					'style-three' => esc_html__('Style three', 'awwa-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your Testimonial style.', 'awwa-core'),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_Title',
			[
				'label' => esc_html__('Left Text Options', 'awwa-core'),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => esc_html__('Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'section_content',
			[
				'label' => esc_html__('Content Text', 'awwa-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Content Text', 'awwa-core'),
				'placeholder' => esc_html__('Type Content text here', 'awwa-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__('Button Text', 'awwa-core'),
				'default' => esc_html__('button text', 'awwa-core'),
				'placeholder' => esc_html__('Type button Text here', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_testimonial',
			[
				'label' => esc_html__('Testimonial Options', 'awwa-core'),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'testimonial_title',
			[
				'label' => esc_html__('Testimonial Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'testimonial_subtitle',
			[
				'label' => esc_html__('Testimonial Sub Title', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Testimonial Sub Title', 'awwa-core'),
				'placeholder' => esc_html__('Type testimonial Sub title here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'testimonial_content',
			[
				'label' => esc_html__('Testimonial Content', 'awwa-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Testimonial Content', 'awwa-core'),
				'placeholder' => esc_html__('Type testimonial Content here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'bg_image',
			[
				'label' => esc_html__('Testimonial Image', 'awwa-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],

			]
		);
		$this->add_control(
			'testimonialItems_groups',
			[
				'label' => esc_html__('Testimonial Items', 'awwa-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'testimonial_title' => esc_html__('Testimonial', 'awwa-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ testimonial_title }}}',
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
				'name' => 'awwa_title_typography',
				'selector' => '{{WRAPPER}} .testimonials-left h3',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-left h3' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .testimonials-left h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .testimonials-left p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-left p' => 'color: {{VALUE}};',
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
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .testimonials-left .theme-btn',
			]
		);
		$this->add_responsive_control(
			'button_min_width',
			[
				'label' => esc_html__('Width', 'awwa-core'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 700,
						'step' => 1,
					],
				],
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .testimonials-left .theme-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .testimonials-left .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __('Border Radius', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .testimonials-left .theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs('button_style');
		$this->start_controls_tab(
			'button_normal',
			[
				'label' => esc_html__('Normal', 'awwa-core'),
			]
		);
		$this->add_control(
			'button_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-left .theme-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__('Background Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-left .theme-btn' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .testimonials-left .theme-btn' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'link_border_color',
			[
				'label' => esc_html__('Link Border Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-left .theme-btn, {{WRAPPER}} .testimonials-left .theme-btn' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => esc_html__('Border', 'awwa-core'),
				'selector' => '{{WRAPPER}} .testimonials-left .theme-btn',
			]
		);
		$this->end_controls_tab();  // end:Normal tab

		$this->start_controls_tab(
			'button_hover',
			[
				'label' => esc_html__('Hover', 'awwa-core'),
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-left .theme-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_bg_hover_color',
			[
				'label' => esc_html__('Background Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-left .theme-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'link_border_hover_color',
			[
				'label' => esc_html__('Link Border Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-left .theme-btn' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_hover_border',
				'label' => esc_html__('Border', 'awwa-core'),
				'selector' => '{{WRAPPER}} .testimonials-left .theme-btn:hover ',
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section(); // end: Section

		// Testimonial box Text
		$this->start_controls_section(
			'section_testimonial_box_style',
			[
				'label' => esc_html__('Testimonial Box Style', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'testimonial_box_color',
			[
				'label' => esc_html__('Bg Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-wrapper .testimonials-item' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'testimonial_box_padding',
			[
				'label' => __('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .testimonials-wrapper .testimonials-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'testimonial_box_border',
				'label' => esc_html__('Border', 'awwa-core'),
				'selector' => '{{WRAPPER}} .testimonials-wrapper .testimonials-item',
			]
		);
		$this->add_control(
			'testimonial_box_border_radius',
			[
				'label' => __('Border Radius', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .testimonials-wrapper .testimonials-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Testimonial Name Style 
		$this->start_controls_section(
			'testimonials_section_name_style',
			[
				'label' => esc_html__('Testimonial Name', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'testimonials_awwa_name_typography',
				'selector' => '{{WRAPPER}}  .testimonials-wrapper .testimonials-item .testimonials-item-bottom .testimonials-item-bottom-author-text h3',
			]
		);
		$this->add_control(
			'testimonials_name_color',
			[
				'label' => esc_html__('Name Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-wrapper .testimonials-item .testimonials-item-bottom .testimonials-item-bottom-author-text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Testimonial Title Style 
		$this->start_controls_section(
			'testimonials_section_title_style',
			[
				'label' => esc_html__('Testimonial Title', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'testimonials_awwa_title_typography',
				'selector' => '{{WRAPPER}} .testimonials-wrapper .testimonials-item .testimonials-item-bottom .testimonials-item-bottom-author-text span',
			]
		);
		$this->add_control(
			'testimonials_title_color',
			[
				'label' => esc_html__('Name Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .testimonials-wrapper .testimonials-item .testimonials-item-bottom .testimonials-item-bottom-author-text span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Content
		$this->start_controls_section(
			'testimonial_content_style',
			[
				'label' => esc_html__('Testimonial Content', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'testimonial_content_typography',
				'selector' => '{{WRAPPER}} .testimonials-wrapper .testimonials-item .testimonials-item-top p',
			]
		);
		$this->add_control(
			'testimonial_content_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-wrapper .testimonials-item .testimonials-item-top p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


	}

	/**
	 * Render Testimonial widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$testimonialItems_groups = !empty($settings['testimonialItems_groups']) ? $settings['testimonialItems_groups'] : [];

		$testimonial_style = !empty($settings['testimonial_style']) ? $settings['testimonial_style'] : '';

		$section_title = !empty($settings['section_title']) ? $settings['section_title'] : '';
		$section_content = !empty($settings['section_content']) ? $settings['section_content'] : '';

		$section_title = preg_replace('~\s*<br ?/?>\s*~', " <br/>", $section_title);
		$section_title = nl2br($section_title);

		$button_text = !empty($settings['btn_text']) ? $settings['btn_text'] : '';
		$button_link = !empty($settings['btn_link']['url']) ? $settings['btn_link']['url'] : '';
		$button_link_external = !empty($settings['btn_link']['is_external']) ? 'target="_blank"' : '';
		$button_link_nofollow = !empty($settings['btn_link']['nofollow']) ? 'rel="nofollow"' : '';
		$button_link_attr = !empty($button_link) ?  $button_link_external . ' ' . $button_link_nofollow : '';

		$awwa_button = $button_link ? '<a href="' . esc_url($button_link) . '" ' . $button_link_attr . ' class="theme-btn">' . esc_html($button_text) . '</a>' : '';

		if ($testimonial_style == 'style-one') {
			$col = 'col-xl-6 col-12';
			$sClass = 'wpo-testimonials-section';
			$container= 'container-fluid';
		} elseif ($testimonial_style == 'style-two') {
			$col = 'col-xl-6 col-12';
			$sClass = 'wpo-testimonials-section-s2';
			$container= 'container-fluid';
		} else {
			$col = 'col-xl-12 col-12';
			$sClass = 'wpo-testimonials-section-s3';
			$container= 'container';
		}


		// Turn output buffer on
		ob_start(); ?>
		<div class="<?php echo esc_attr($sClass); ?>">
			<div class="<?php echo esc_attr($container); ?>">
				<div class="row align-items-center">
					<?php if ($testimonial_style == 'style-one' || $testimonial_style == 'style-two') { ?>
						<div class="col-xl-6 col-lg-12">
							<div class="testimonials-left">
								<?php
								if ($section_title) {
									echo '<h3>' . esc_html($section_title) . '</h3>';
								}
								if ($section_content) {
									echo '<p>' . esc_html($section_content) . '</p>';
								}
								?>
								<div class="testimonial-btn">
									<?php echo $awwa_button; ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="<?php echo esc_attr($col); ?>">
						<div class="testimonials-right">
							<div class="testimonials-wrapper testimonial-active owl-carousel">
								<?php 	// Group Param Output
								if (is_array($testimonialItems_groups) && !empty($testimonialItems_groups)) {
									foreach ($testimonialItems_groups as $each_items) {

										$testimonial_title = !empty($each_items['testimonial_title']) ? $each_items['testimonial_title'] : '';
										$testimonial_subtitle = !empty($each_items['testimonial_subtitle']) ? $each_items['testimonial_subtitle'] : '';
										$testimonial_content = !empty($each_items['testimonial_content']) ? $each_items['testimonial_content'] : '';

										$image_url = wp_get_attachment_url($each_items['bg_image']['id']);
										$image_alt = get_post_meta($each_items['bg_image']['id'], '_wp_attachment_image_alt', true);

								?>
										<div class="testimonials-item">
											<div class="testimonials-item-bottom">
												<div class="testimonials-item-bottom-author">
													<?php if ($image_url) {
														echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '">';
													} ?>
												</div>
												<div class="testimonials-item-bottom-author-text">
													<?php
													if ($testimonial_title) {
														echo '<h3>' . esc_html($testimonial_title) . '</h3>';
													}
													if ($testimonial_subtitle) {
														echo '<span>' . esc_html($testimonial_subtitle) . '</span>';
													}
													?>
												</div>
											</div>
											<div class="testimonials-item-top">
												<?php if ($testimonial_content) {
													echo '<p>' . esc_html($testimonial_content) . '</p>';
												} ?>
											</div>
										</div>
								<?php }
								} ?>

							</div>
						</div>
					</div>

				</div> <!-- end row -->
			</div>
			<?php if ($testimonial_style == 'style-two') { ?>
				<div class="light-shape-1"></div>
				<div class="light-shape-2"></div>
			<?php } ?>
		</div>
<?php
		// Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render Testimonial widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Awwa_Testimonial());
