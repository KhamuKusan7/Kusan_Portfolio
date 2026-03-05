<?php
/*
 * Elementor Awwa Funfact Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Awwa_Funfact extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-awwa_funfact';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Funfact', 'awwa-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-counter';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Awwa Funfact widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-awwa_funfact'];
	}

	/**
	 * Register Awwa Funfact widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function _register_controls()
	{

		$this->start_controls_section(
			'section_funfact',
			[
				'label' => esc_html__('Funfact Options', 'awwa-core'),
			]
		);
		$this->add_control(
			'funfact_style',
			[
				'label' => esc_html__('Funfact Style', 'awwa-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'awwa-core'),
					'style-two' => esc_html__('Style two', 'awwa-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your funfact style.', 'awwa-core'),
			]
		);
		$this->add_control(
			'shape_image',
			[
				'label' => esc_html__('Finfact BG Noise', 'medically-core'),
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



		// Funfact Number
		$this->start_controls_section(
			'funfact_number_style',
			[
				'label' => esc_html__('Number', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'awwa_number_typography',
				'selector' => '{{WRAPPER}} .awwa-funfact .info h3',
			]
		);
		$this->add_control(
			'funfact_item_number_color',
			[
				'label' => esc_html__('Number Color All', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-funfact .info h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'number_padding',
			[
				'label' => __('Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-funfact .info h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Funfact Title
		$this->start_controls_section(
			'funfact_title_style',
			[
				'label' => esc_html__('Funfact Title', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'awwa_funfact_title_typography',
				'selector' => '{{WRAPPER}} .awwa-funfact .info p',
			]
		);
		$this->add_control(
			'funfact_title',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-funfact .info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'funfact_title_padding',
			[
				'label' => __('Number Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-funfact .info p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

	}

	/**
	 * Render Funfact widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$funfactItems_groups = !empty($settings['funfactItems_groups']) ? $settings['funfactItems_groups'] : [];
		$funfact_style = !empty($settings['funfact_style']) ? $settings['funfact_style'] : [];

		// Shape Image
		$shape_bg = !empty($settings['shape_image']['id']) ? $settings['shape_image']['id'] : '';
		$shape_bg_url = wp_get_attachment_url($shape_bg);


		if ($funfact_style == 'style-one') {
			$class_style = 'wpo-fun-fact-section';
		} elseif ($funfact_style == 'style-two') {
			$class_style = 'wpo-fun-fact-section-s4';
		} else {
			$class_style = 'wpo-fun-fact-section-s2';
		}

		// Turn output buffer on
		ob_start(); ?>
		<div class="awwa-funfact <?php echo esc_attr($class_style); ?>">
			<div class="noise" style="background-image: url(<?php echo esc_url($shape_bg_url) ?>)"></div>
			<div class="container">
				<div class="row">
					<div class="col col-xs-12">
						<div class="wpo-fun-fact-grids clearfix">
							<?php 	// Group Param Output
							if (is_array($funfactItems_groups) && !empty($funfactItems_groups)) {
								foreach ($funfactItems_groups as $each_item) {
									$funfact_title = !empty($each_item['funfact_title']) ? $each_item['funfact_title'] : '';
									$funfact_number = !empty($each_item['funfact_number']) ? $each_item['funfact_number'] : '';
									$funfact_plus = !empty($each_item['funfact_plus']) ? $each_item['funfact_plus'] : '';
							?>
									<div class="grid">
										<div class="info">
											<?php
											if ($funfact_number) {
												echo '<h3><span class="odometer" data-count="' . esc_attr($funfact_number) . '">' . esc_html__('00', 'awwa-core') . '</span>' . esc_html($funfact_plus) . '</h3>';
											}
											if ($funfact_title) {
												echo '<p>' . esc_html__($funfact_title) . '</p>';
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
<?php
		// Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render Funfact widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Awwa_Funfact());
