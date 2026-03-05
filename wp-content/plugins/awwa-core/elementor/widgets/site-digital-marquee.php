<?php
/*
 * Elementor Awwa Marquee Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Awwa_Marquee extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-awwa_marquee';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Marquee', 'awwa-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-marquee';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Awwa Marquee widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-awwa_marquee'];
	}

	/**
	 * Register Awwa Marquee widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_marquee',
			[
				'label' => esc_html__('Marquee Options', 'awwa-core'),
			]
		);

		$this->add_control(
			'marquee_style',
			[
				'label' => esc_html__('Marquee Style', 'awwa-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'awwa-core'),
					'style-two' => esc_html__('Style two', 'awwa-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your Marquee style.', 'awwa-core'),
			]
		);

		$this->add_control(
			'shape_image',
			[
				'label' => esc_html__('Marquee BG Noise', 'medically-core'),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your Masking image.', 'medically-core'),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'marquee_title',
			[
				'label' => esc_html__('Marquee Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'marquee_image',
			[
				'label' => esc_html__('Marquee Image', 'awwa-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],

			]
		);
		$this->add_control(
			'marqueeItems_groups',
			[
				'label' => esc_html__('Marquee Items', 'awwa-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'marquee_title' => esc_html__('Marquee', 'awwa-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ marquee_title }}}',
			]
		);
		$this->end_controls_section(); // end: Section

		// Marquee box Text
		$this->start_controls_section(
			'section_marquee_box_style',
			[
				'label' => esc_html__('Marquee Box Style', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'marquee_box_color',
			[
				'label' => esc_html__('Bg Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .digital-marque-sec ' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'marquee_box_padding',
			[
				'label' => __('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .digital-marque-sec ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Marquee Title Style 
		$this->start_controls_section(
			'marquees_section_title_style',
			[
				'label' => esc_html__('Marquee Title', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'marquees_awwa_title_typography',
				'selector' => '{{WRAPPER}} .digital-marque-sec .digital-marque h1',
			]
		);
		$this->add_control(
			'marquees_title_color',
			[
				'label' => esc_html__('Name Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .digital-marque-sec .digital-marque h1' => '-webkit-text-stroke-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


	}

	/**
	 * Render Marquee widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$marqueeItems_groups = !empty($settings['marqueeItems_groups']) ? $settings['marqueeItems_groups'] : [];

		$marquee_style = !empty($settings['marquee_style']) ? $settings['marquee_style'] : '';

		// Shape Image
		$shape_bg = !empty($settings['shape_image']['id']) ? $settings['shape_image']['id'] : '';
		$shape_bg_url = wp_get_attachment_url($shape_bg);

		if ($marquee_style == 'style-two') {
			$sClass = 'style-2';
		} else {
			$sClass = 'style-1';
		}


		// Turn output buffer on
		ob_start(); ?>
		<div class="digital-marque-sec <?php echo esc_attr($sClass); ?>">
		<div class="noise" style="background-image: url(<?php echo esc_url($shape_bg_url) ?>)"></div>
			<div class="digital-marque">
				<div class="marquee">
					<div class="track">
						<div class="content">
							<h1>
								<?php 	// Group Param Output
								if (is_array($marqueeItems_groups) && !empty($marqueeItems_groups)) {
									foreach ($marqueeItems_groups as $each_items) {

										$marquee_title = !empty($each_items['marquee_title']) ? $each_items['marquee_title'] : '';
										$image_url = wp_get_attachment_url($each_items['marquee_image']['id']);
										$image_alt = get_post_meta($each_items['marquee_image']['id'], '_wp_attachment_image_alt', true);


								?>
										<?php
										if ($marquee_title) {
											echo '<span>' . esc_html($marquee_title) . '</span>';
										}
										?>
										<i><?php if ($image_url) {
												echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '">';
											} ?></i>
								<?php }
								} ?>
							</h1>


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
	 * Render Marquee widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Awwa_Marquee());
