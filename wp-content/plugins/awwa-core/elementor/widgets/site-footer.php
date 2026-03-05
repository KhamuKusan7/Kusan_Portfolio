<?php
/*
 * Elementor Awwa footer Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

class Site_Footer extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-awwa_footer';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Footer', 'awwa-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-footer';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Awwa footer widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	/*
	public function get_script_depends() {
		return ['wpo-awwa_footer'];
	}
	*/

	/**
	 * Register Awwa footer widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_footer',
			[
				'label' => esc_html__('footer Options', 'awwa-core'),
			]
		);
		$this->add_control(
			'footer_style',
			[
				'label' => esc_html__('Footer Style', 'awwa-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'awwa-core'),
					'style-two' => esc_html__('Style two', 'awwa-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your Footer style.', 'awwa-core'),
			]
		);
		$this->add_control(
			'footer_subtitle',
			[
				'label' => esc_html__('Sub Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'footer_title',
			[
				'label' => esc_html__('Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'form_id',
			[
				'label' => esc_html__('Form Id', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('1062', 'awwa-core'),
				'placeholder' => esc_html__('Type Form Id here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'footer_image',
			[
				'label' => esc_html__('footer Image', 'awwa-core'),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'awwa-core'),
			]
		);
		$this->end_controls_section(); // end: Section

		$this->start_controls_section(
			'lower_footer',
			[
				'label' => esc_html__('Lower Footer Options', 'awwa-core'),
			]
		);

		$this->add_control(
			'copyright_title',
			[
				'label' => esc_html__('Copyright Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Copyright Text', 'awwa-core'),
				'placeholder' => esc_html__('Type Copyright text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'social_title',
			[
				'label' => esc_html__('Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Social item', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'social_link',
			[
				'label' => esc_html__('Link Url', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('#', 'awwa-core'),
				'placeholder' => esc_html__('Type link url here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'social_icon',
			[
				'label' => __('Icon', 'awwa-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ti-facebook',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'socialItems_groups',
			[
				'label' => esc_html__('Social item', 'awwa-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'social_title' => esc_html__('Social', 'awwa-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ social_title }}}',
			]
		);
		$this->end_controls_section(); // end: Section



		// footer Background
		$this->start_controls_section(
			'footer_section_background_style',
			[
				'label' => esc_html__('Background', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'footer_background_color',
			[
				'label' => esc_html__('Bg Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-footer' => 'background-color: {{VALUE}};',
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
				'name' => 'awwa_subtitle_typography',
				'selector' => '{{WRAPPER}}  .awwa-footer .wpo-upper-footer .quote span',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'subtitle_padding',
			[
				'label' => esc_html__('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name' => 'awwa_title_typography',
				'selector' => '{{WRAPPER}}  .awwa-footer .wpo-upper-footer .quote h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => esc_html__('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Input Field
		$this->start_controls_section(
			'section_input_style',
			[
				'label' => esc_html__('Input Field', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awwa_input_typography',
				'selector' => '{{WRAPPER}}  .awwa-footer .wpo-upper-footer .quote .input-field input',
			]
		);
		$this->add_control(
			'input_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote .input-field input' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'input_bg',
			[
				'label' => esc_html__('Bg Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote .input-field input' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'input_padding',
			[
				'label' => esc_html__('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote .input-field input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote .input-field button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote .input-field button, 
						{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote .input-field button' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_color',
				'label' => esc_html__('Background', 'awwa-core'),
				'types' => ['gradient'],
				'exclude' => ['image'],
				'selector' => '{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote .input-field button:after',
				'fields_options' => [
					'background' => [
						'label' => esc_html__('Background Color', 'awwa-core'),
						'default' => 'gradient',
					],
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => esc_html__('Border', 'awwa-core'),
				'selector' => '{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote .input-field button',
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
					'{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote .input-field button:hover,
						{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote .input-field button:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_hover_color',
				'label' => esc_html__('Hover Background', 'awwa-core'),
				'types' => ['gradient'],
				'exclude' => ['image'],
				'selector' => '{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote .input-field button:hover',
				'fields_options' => [
					'background' => [
						'label' => esc_html__('Background Color', 'awwa-core'),
						'default' => 'gradient',
					],
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_hover_border',
				'label' => esc_html__('Border', 'awwa-core'),
				'selector' => '{{WRAPPER}} .awwa-footer .wpo-upper-footer .quote .input-field button:hover ',
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section(); // end: Section

		// Copyright
		$this->start_controls_section(
			'section_copyright_style',
			[
				'label' => esc_html__('Copyright', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awwa_copyright_typography',
				'selector' => '{{WRAPPER}}  .awwa-footer .wpo-lower-footer ul li',
			]
		);
		$this->add_control(
			'copyright_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-lower-footer ul li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'copyright_padding',
			[
				'label' => esc_html__('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-lower-footer ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Social
		$this->start_controls_section(
			'section_social_style',
			[
				'label' => esc_html__('Social', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'awwa_social_typography',
				'selector' => '{{WRAPPER}}  .awwa-footer .wpo-lower-footer ul li ul li a',
			]
		);
		$this->add_control(
			'social_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-lower-footer ul li ul li a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'social_hover_color',
			[
				'label' => esc_html__('Hover Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-lower-footer ul li ul li a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'social_bg_color',
			[
				'label' => esc_html__('Bg Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-lower-footer ul li ul li a' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'social_hover_bg_color',
			[
				'label' => esc_html__('Hover Bg Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-footer .wpo-lower-footer ul li ul li a:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


	}

	/**
	 * Render footer widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$footer_style = !empty($settings['footer_style']) ? $settings['footer_style'] : '';
		$footer_subtitle = !empty($settings['footer_subtitle']) ? $settings['footer_subtitle'] : '';
		$footer_title = !empty($settings['footer_title']) ? $settings['footer_title'] : '';
		$form_id = !empty($settings['form_id']) ? $settings['form_id'] : '';
		$bg_image = !empty($settings['footer_image']['id']) ? $settings['footer_image']['id'] : '';
		$socialItems_groups = !empty($settings['socialItems_groups']) ? $settings['socialItems_groups'] : [];
		$copyright_title = !empty($settings['copyright_title']) ? $settings['copyright_title'] : [];


		// Image
		$image_url = wp_get_attachment_url($bg_image);
		$image_alt = get_post_meta($bg_image, '_wp_attachment_image_alt', true);


		if ($image_url) {
			$bg_url = ' style="';
			$bg_url .= ($image_url) ? 'background-image: url( ' . esc_url($image_url) . ' );' : '';
			$bg_url .= '"';
		} else {
			$bg_url = '';
		}

		if ($footer_style == 'style-one') {
			$class_name = 'wpo-site-footer';
		} else {
			$class_name = 'wpo-site-footer-s2';
		}

		// Turn output buffer on
		ob_start(); ?>
		<div class="awwa-footer <?php echo esc_attr($class_name); ?>" <?php echo $bg_url; ?>>
			<div class="wpo-upper-footer section-padding">
				<div class="container">
					<div class="quote">
						<?php
						if ($footer_subtitle) {
							echo '<span>' . esc_html($footer_subtitle) . '</span>';
						}
						if ($footer_title) {
							echo '<h2>' . esc_html($footer_title) . '</h2>';
						}
						?>

						<?php echo do_shortcode('[mc4wp_form id="' . $form_id . '"]'); ?>

					</div>
				</div>
			</div>
			<div class="wpo-lower-footer">
				<div class="container">
					<div class="row">
						<div class="col col-xs-12">
							<ul>
								<?php
									if ($copyright_title) {
										echo '<li>' . esc_html($copyright_title) . '</li>';
									}
								?>
								<li>
									<ul>
										<?php
										// Group Param Output
										if (is_array($socialItems_groups) && !empty($socialItems_groups)) {
											foreach ($socialItems_groups as $each_item) {

												$social_icon = !empty($each_item['social_icon']['value']) ? $each_item['social_icon']['value'] : '';
												$social_link = !empty($each_item['social_link']) ? $each_item['social_link'] : '';
												if ($social_link) {
													$link_o = '<a href="' . $social_link . '" class="social-link">';
													$link_c = '</a>';
												} else {
													$link_o = '';
													$link_c = '';
												}

										?>
												<?php if ($social_icon) {
													echo '<li>' . $link_o . '<i class="' . esc_attr($social_icon) . '"></i>' . $link_c . '</li>';
												} ?>
										<?php }
										} ?>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
		// Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render footer widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Site_Footer());
