<?php
/*
 * Elementor Awwa project Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Site_Project extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-awwa_project';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Project', 'awwa-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-folder-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Awwa project widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-awwa_project'];
	}

	/**
	 * Register Awwa project widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{


		$posts = get_posts('post_type="project"&numberposts=-1');
		$PostID = array();
		if ($posts) {
			foreach ($posts as $post) {
				$PostID[$post->ID] = $post->ID;
			}
		} else {
			$PostID[__('No ID\'s found', 'awwa')] = 0;
		}

		$this->start_controls_section(
			'section_project_listing',
			[
				'label' => esc_html__('Listing Options', 'awwa-core'),
			]
		);
		$this->add_control(
			'project_style',
			[
				'label' => esc_html__('project Style', 'awwa-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'awwa-core'),
					'style-two' => esc_html__('Style two', 'awwa-core'),
					'style-three' => esc_html__('Style three', 'awwa-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your project style.', 'awwa-core'),
			]
		);
		$this->add_control(
			'project_limit',
			[
				'label' => esc_html__('project Limit', 'awwa-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__('Enter the number of items to show.', 'awwa-core'),
			]
		);
		$this->add_control(
			'project_order',
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
			'project_orderby',
			[
				'label' => __('Order By', 'awwa-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'awwa-core'),
					'ID' => esc_html__('ID', 'awwa-core'),
					'author' => esc_html__('Author', 'awwa-core'),
					'title' => esc_html__('Title', 'awwa-core'),
					'date' => esc_html__('Date', 'awwa-core'),
				],
				'default' => 'date',
			]
		);
		$this->add_control(
			'project_show_category',
			[
				'label' => __('Certain Categories?', 'awwa-core'),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names('project_category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'project_show_id',
			[
				'label' => __('Certain ID\'s?', 'awwa-core'),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => $PostID,
				'multiple' => true,
			]
		);
		$this->end_controls_section(); // end: Section

		$this->start_controls_section(
			'section_Title',
			[
				'label' => esc_html__('Top Title Options', 'awwa-core'),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => esc_html__('Title Text', 'awwa-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'awwa-core'),
				'placeholder' => esc_html__('Type title text here', 'awwa-core'),
				'condition' => [
					'project_style' => array('style-three'),
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'section_content',
			[
				'label' => esc_html__('Content Text', 'awwa-core'),
				'type' => Controls_Manager::TEXTAREA,
				'condition' => [
					'project_style' => array('style-three'),
				],
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
				'condition' => [
					'project_style' => array('style-three'),
				],
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
				'condition' => [
					'project_style' => array('style-three'),
				],
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		// project Box
		$this->start_controls_section(
			'project_box_style',
			[
				'label' => esc_html__('Project Box', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'project_style' => array('style-one', 'style-two'),
				],
			]
		);
		$this->add_control(
			'project_border_radius',
			[
				'label' => __('Image Border Radius', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-project .wpo-project-item .wpo-project-img, .awwa-project .wpo-project-item .wpo-project-img img, .awwa-project .wpo-project-item .wpo-project-text .wpo-project-text-inner, .awwa-project .wpo-project-item .wpo-project-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'project_border_color',
			[
				'label' => esc_html__('Border Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-project .wpo-project-item .wpo-project-img, .awwa-project .wpo-project-item .wpo-project-text, .awwa-project .wpo-project-item .wpo-project-text .wpo-project-text-inner' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'project_image_box_padding',
			[
				'label' => esc_html__('Image Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-project .wpo-project-item .wpo-project-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'project_box_padding',
			[
				'label' => esc_html__('Text Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-project .wpo-project-item .wpo-project-text .wpo-project-text-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// project Title
		$this->start_controls_section(
			'section_awwa_title_style',
			[
				'label' => esc_html__('Title', 'manit-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'project_style' => array('style-three'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'manit-core'),
				'name' => 'section_title_typography',
				'selector' => '{{WRAPPER}} .wpo-section-title-s2 h2',
			]
		);
		$this->add_control(
			'section_title_color',
			[
				'label' => esc_html__('Color', 'manit-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-section-title-s2 h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_title_padding',
			[
				'label' => esc_html__('Title Padding', 'manit-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-section-title-s2 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// project content
		$this->start_controls_section(
			'section_project_content_style',
			[
				'label' => esc_html__('Content', 'manit-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'project_style' => array('style-three'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'manit-core'),
				'name' => 'awwa_sub_title_typography',
				'selector' => '{{WRAPPER}} .wpo-section-title-s2 p',
			]
		);
		$this->add_control(
			'project_content_color',
			[
				'label' => esc_html__('Color', 'manit-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-section-title-s2 p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'project_content_padding',
			[
				'label' => esc_html__('Title Padding', 'manit-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-section-title-s2 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'project_style' => array('style-three'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_one_typography',
				'label' => esc_html__('Typography', 'awwa-core'),
				'selector' => '{{WRAPPER}} .theme-btn-s3',
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
					'{{WRAPPER}} .theme-btn-s3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_one_bg_color',
			[
				'label' => esc_html__('Background', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn-s3, .theme-btn-s3 span::before' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .theme-btn-s3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .theme-btn-s3:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_one_bg_hover_color',
			[
				'label' => esc_html__('Background Hover', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn-s3:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section(); // end: Section


		// project Sub Title
		$this->start_controls_section(
			'section_project_sub_title_style',
			[
				'label' => esc_html__('Project Sub Title', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'project_style' => array('style-three'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'awwa_project_sub_title_typography',
				'selector' => '{{WRAPPER}} .awwa-project .wpo-project-item .wpo-project-text span',
			]
		);
		$this->add_control(
			'project_sub_title_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-project .wpo-project-item .wpo-project-text span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'project_sub_title_bg_color',
			[
				'label' => esc_html__('Bg Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-project .wpo-project-item .wpo-project-text span' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'project_sub_title_padding',
			[
				'label' => esc_html__('Title Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-project .wpo-project-item .wpo-project-text span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// project Title
		$this->start_controls_section(
			'section_project_title_style',
			[
				'label' => esc_html__('Project Title', 'awwa-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'awwa-core'),
				'name' => 'awwa_project_title_typography',
				'selector' => '{{WRAPPER}} .awwa-project .wpo-project-item .wpo-project-text h2',
			]
		);
		$this->add_control(
			'project_title_color',
			[
				'label' => esc_html__('Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-project .wpo-project-item .wpo-project-text h2 a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'project_title_hover_color',
			[
				'label' => esc_html__('Hover Color', 'awwa-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .awwa-project .wpo-project-item .wpo-project-text h2 a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'project_title_padding',
			[
				'label' => esc_html__('Title Padding', 'awwa-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .awwa-project .wpo-project-item .wpo-project-text h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section
	}

	/**
	 * Render project widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$project_style = !empty($settings['project_style']) ? $settings['project_style'] : '';
		$project_limit = !empty($settings['project_limit']) ? $settings['project_limit'] : '';
		$project_order = !empty($settings['project_order']) ? $settings['project_order'] : '';
		$project_orderby = !empty($settings['project_orderby']) ? $settings['project_orderby'] : '';
		$project_show_category = !empty($settings['project_show_category']) ? $settings['project_show_category'] : [];
		$project_show_id = !empty($settings['project_show_id']) ? $settings['project_show_id'] : [];
		$short_content = !empty($settings['short_content']) ? $settings['short_content'] : '';
		$excerpt_length = $short_content ? $short_content : '16';

		$section_title = !empty($settings['section_title']) ? $settings['section_title'] : '';
		$section_content = !empty($settings['section_content']) ? $settings['section_content'] : '';

		$section_title = preg_replace('~\s*<br ?/?>\s*~', " <br/>", $section_title);
		$section_title = nl2br($section_title);

		$button_text = !empty($settings['btn_text']) ? $settings['btn_text'] : '';
		$button_link = !empty($settings['btn_link']['url']) ? $settings['btn_link']['url'] : '';
		$button_link_external = !empty($settings['btn_link']['is_external']) ? 'target="_blank"' : '';
		$button_link_nofollow = !empty($settings['btn_link']['nofollow']) ? 'rel="nofollow"' : '';
		$button_link_attr = !empty($button_link) ?  $button_link_external . ' ' . $button_link_nofollow : '';

		$awwa_button = $button_link ? '<a href="' . esc_url($button_link) . '" ' . $button_link_attr . ' class="theme-btn-s3"> <span> ' . esc_html($button_text) . '</span></a>' : '';


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

		if ($project_show_id) {
			$project_show_id = json_encode($project_show_id);
			$project_show_id = str_replace(array('[', ']'), '', $project_show_id);
			$project_show_id = str_replace(array('"', '"'), '', $project_show_id);
			$project_show_id = explode(',', $project_show_id);
		} else {
			$project_show_id = '';
		}

		$args = array(
			// other query params here,
			'paged' => $my_page,
			'post_type' => 'project',
			'posts_per_page' => (int)$project_limit,
			'project_category' => implode(',', $project_show_category),
			'orderby' => $project_orderby,
			'order' => $project_order,
			'post__in' => $project_show_id,
		);

		$awwa_project = new \WP_Query($args);


		if ($project_style == 'style-one') {
			$class_name = 'wpo-project-section';
			$slide_class = 'project-active';
		} else {
			$class_name = 'wpo-project-section-s2';
			$slide_class = 'project';
		}

?>

		<?php if ($project_style == 'style-one' || $project_style == 'style-two') { ?>
			<section class="awwa-project <?php echo esc_attr($class_name); ?>">
				<div class="container">
					<div class="<?php echo esc_attr($slide_class); ?>">
						<?php
						if ($awwa_project->have_posts()) : while ($awwa_project->have_posts()) : $awwa_project->the_post();
								global $post;
								$project_options = get_post_meta(get_the_ID(), 'project_options', true);
								$large_image =  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '');
								$project_subtitle = isset($project_options['project_subtitle']) ? $project_options['project_subtitle'] : '';


						?>
								<div class="wpo-project-item">
									<div class="row align-items-center">
										<div class="col col-lg-6 col-md-12 col-12">
											<div class="wpo-project-img">
												<a href="<?php echo esc_url(get_permalink()); ?>">
													<?php if ($large_image) {
														echo '<img src="' . esc_url($large_image['0']) . '" alt="dg">';
													} ?>
												</a>
											</div>
										</div>
										<div class="col col-lg-6 col-md-12 col-12">
											<div class="wpo-project-text">
												<div class="wpo-project-text-inner">
													<span><?php echo esc_html($project_subtitle) ?></span>
													<h2>
														<a href="<?php echo esc_url(get_permalink()); ?>">
															<?php echo get_the_title(); ?>
														</a>
													</h2>
													<p><?php echo wp_trim_words(get_the_excerpt(), $excerpt_length, ' '); ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
						<?php
							endwhile;
						endif;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</section>
		<?php } else { ?>
			<section class="awwa-project wpo-project-section-s3">
				<div class="container">
					<div class="wpo-project-section-title">
						<div class="row align-items-center">
							<div class="col-lg-6 col-12">
								<div class="wpo-section-title-s2">
									<?php
									if ($section_title) {
										echo '<h2>' . esc_html($section_title) . '</h2>';
									}
									if ($section_content) {
										echo '<p>' . esc_html($section_content) . '</p>';
									}
									?>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="wpo-section-title-btn">
									<?php echo $awwa_button; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="wpo-project-wrap">
						<div class="wpo-project-slide owl-carousel">
							<?php
							if ($awwa_project->have_posts()) : while ($awwa_project->have_posts()) : $awwa_project->the_post();
									global $post;
									$project_options = get_post_meta(get_the_ID(), 'project_options', true);
									$large_image =  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '');
									$project_subtitle = isset($project_options['project_subtitle']) ? $project_options['project_subtitle'] : '';


							?>
									<div class="wpo-project-item">
										<div class="wpo-project-img">
											<a href="<?php echo esc_url(get_permalink()); ?>">
												<?php if ($large_image) {
													echo '<img src="' . esc_url($large_image['0']) . '" alt="dg">';
												} ?>
											</a>
										</div>
										<div class="wpo-project-text">
											<h2>
												<a href="<?php echo esc_url(get_permalink()); ?>">
													<?php echo get_the_title(); ?>
												</a>
											</h2>
											<span><?php echo esc_html($project_subtitle) ?></span>
										</div>
									</div>
							<?php
								endwhile;
							endif;
							wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</section>
		<?php } ?>

<?php
		// Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render project widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Site_Project());
