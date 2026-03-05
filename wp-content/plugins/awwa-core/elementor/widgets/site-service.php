<?php
/*
 * Elementor Awwa Service Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Awwa_Service extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-awwa_service';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Service', 'awwa-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-kit-details';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Awwa Service widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-awwa_service'];
	}

	/**
	 * Register Awwa Service widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function _register_controls()
	{


		$posts = get_posts('post_type="service"&numberposts=-1');
		$PostID = array();
		if ($posts) {
			foreach ($posts as $post) {
				$PostID[$post->ID] = $post->ID;
			}
		} else {
			$PostID[__('No ID\'s found', 'awwa')] = 0;
		}


		$this->start_controls_section(
			'section_service_listing',
			[
				'label' => esc_html__('Listing Options', 'awwa-core'),
			]
		);
		$this->add_control(
			'service_style',
			[
				'label' => esc_html__('Service Style', 'awwa-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'awwa-core'),
					'style-two' => esc_html__('Style two', 'awwa-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your service style.', 'awwa-core'),
			]
		);
		$this->add_control(
			'service_limit',
			[
				'label' => esc_html__('Service Limit', 'awwa-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__('Enter the number of items to show.', 'awwa-core'),
			]
		);
		$this->add_control(
			'service_order',
			[
				'label' => __('Order', 'awwa-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => esc_html__('Asending', 'awwa-core'),
					'DESC' => esc_html__('Desending', 'awwa-core'),
				],
				'default' => 'DESC',
			]
		);
		$this->add_control(
			'service_orderby',
			[
				'label' => __('Order By', 'awwa-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'awwa-core'),
					'ID' => esc_html__('ID', 'awwa-core'),
					'author' => esc_html__('Author', 'awwa-core'),
					'title' => esc_html__('Title', 'awwa-core'),
					'date' => esc_html__('Date', 'awwa-core'),
					'menu_order' => esc_html__('Menu Order', 'awwa-core'),
				],
				'default' => 'date',
			]
		);
		$this->add_control(
			'service_show_category',
			[
				'label' => __('Certain Categories?', 'awwa-core'),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names('service_category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'service_show_id',
			[
				'label' => __('Certain ID\'s?', 'awwa-core'),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => $PostID,
				'multiple' => true,
			]
		);
		$this->add_control(
			'short_content',
			[
				'label' => esc_html__('Excerpt Length', 'awwa-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 16,
				'description' => esc_html__('How many words you want in short content paragraph.', 'awwa-core'),
			]
		);
		$this->add_control(
			'read_more_txt',
			[
				'label' => esc_html__('Read More', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__('Type your Read More text here', 'awwa-core'),
			]
		);
		$this->end_controls_section(); // end: Section



		// Services Feactures Item
		$this->start_controls_section(
			'services_item',
			[
				'label' => esc_html__('Services Item Box', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'services_box_bg',
			[
				'label' => esc_html__('BG Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'services_box_color',
			[
				'label' => esc_html__('Border Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'services_box_padding',
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

		// Services Icon
		$this->start_controls_section(
			'services_icon',
			[
				'label' => esc_html__('Services Icon', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'services_icon_typography',
				'selector' => '{{WRAPPER}} .wpo-service-item .icon i',
			]
		);
		$this->add_control(
			'services_icon_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item .icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'services_icon_bg',
			[
				'label' => esc_html__('BG Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item .icon i' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Services sub Text
		$this->start_controls_section(
			'services_title_style',
			[
				'label' => esc_html__('Services Title', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'services_title_typography',
				'selector' => '{{WRAPPER}} .wpo-service-item .wpo-service-text h3',
			]
		);
		$this->add_control(
			'services_title_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item .wpo-service-text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'services_title_padding',
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

		// Services Text
		$this->start_controls_section(
			'services_content_style',
			[
				'label' => esc_html__('Services Content', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'services_content_typography',
				'selector' => '{{WRAPPER}} .wpo-service-item .wpo-service-text p',
			]
		);
		$this->add_control(
			'services_content_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-item .wpo-service-text p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'services_content_padding',
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
	 * Render Service widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$service_style = !empty($settings['service_style']) ? $settings['service_style'] : '';
		$read_more_txt = !empty($settings['read_more_txt']) ? $settings['read_more_txt'] : '';
		$service_limit = !empty($settings['service_limit']) ? $settings['service_limit'] : '';
		$service_order = !empty($settings['service_order']) ? $settings['service_order'] : '';
		$service_orderby = !empty($settings['service_orderby']) ? $settings['service_orderby'] : '';
		$service_show_category = !empty($settings['service_show_category']) ? $settings['service_show_category'] : [];
		$service_show_id = !empty($settings['service_show_id']) ? $settings['service_show_id'] : [];
		$short_content = !empty($settings['short_content']) ? $settings['short_content'] : '';
		$excerpt_length = $short_content ? $short_content : '16';

		$read_more_txt = $read_more_txt ? $read_more_txt : esc_html__('Learn More', 'awwa-core');


		if ($service_style == 'style-one') {
			$service_wrapper = 'wpo-service-area';
		} else {
			$service_wrapper = 'wpo-service-area-s2';
		}

		// Turn output buffer on
		ob_start();

		// Pagination
		global $paged;
		if (get_query_var('paged'))
			$my_page = get_query_var('paged');
		else {
			if (get_query_var('page'))
				$my_page = get_query_var('page');
			else
				$my_page = 1;
			set_query_var('paged', $my_page);
			$paged = $my_page;
		}

		if ($service_show_id) {
			$service_show_id = json_encode($service_show_id);
			$service_show_id = str_replace(array('[', ']'), '', $service_show_id);
			$service_show_id = str_replace(array('"', '"'), '', $service_show_id);
			$service_show_id = explode(',', $service_show_id);
		} else {
			$service_show_id = '';
		}

		$args = array(
			// other query params here,
			'paged' => $my_page,
			'post_type' => 'service',
			'posts_per_page' => (int)$service_limit,
			'service_category' => implode(',', $service_show_category),
			'orderby' => $service_orderby,
			'order' => $service_order,
			'post__in' => $service_show_id,
		);

		$awwa_service = new \WP_Query($args);
		if ($awwa_service->have_posts()) :
?>

			<div class="awwa-service <?php echo esc_attr($service_wrapper); ?>">
				<div class="container">
					<div class="row">
						<?php
						$unique_id = 0;
						while ($awwa_service->have_posts()) : $awwa_service->the_post();
							$unique_id++;
							$service_options = get_post_meta(get_the_ID(), 'service_options', true);
							$service_icon = isset($service_options['service_icon']) ? $service_options['service_icon'] : '';

							$icon_url = wp_get_attachment_url($service_icon);
							$icon_alt = get_post_meta($service_icon, '_wp_attachment_image_alt', true);

							global $post;

						?>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="wpo-service-item">
									<div class="icon">
										<i><?php if ($icon_url) { ?>
												<img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_alt); ?>">
											<?php } ?></i>
									</div>
									<div class="wpo-service-text">
										<h3>
											<a href="<?php echo esc_url(get_permalink()); ?>">
												<?php echo esc_html(get_the_title()); ?>
											</a>
										</h3>
										<p><?php echo wp_trim_words(get_the_excerpt(), $excerpt_length, ' '); ?></p>
									</div>
								</div>
							</div>
						<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
<?php
		endif;
		// Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render Service widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register_widget_type(new Awwa_Service());
