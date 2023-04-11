<?php

namespace Trading_Computers\Elementor\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Product Widget.
 *
 * @since 1.0.0
 */
class Product extends \Elementor\Widget_Base {
	const PRODUCT_ID_KEY = 'wc_pid';

	/**
	 * Get widget name.
	 *
	 * Retrieve TC Product widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'tc_product';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve TC Product widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Product by Trading Computers', 'elementor-widgets-for-tc' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve TC Product widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the TC Product widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the TC Product widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'product', 'url', 'link' ];
	}

	/**
	 * Register TC Product widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-widgets-for-tc' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			self::PRODUCT_ID_KEY,
			[
				'label' => esc_html__( 'WooCommerce Product ID', 'elementor-widgets-for-tc' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render TC Product widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$wc_pid = $settings[self::PRODUCT_ID_KEY];
		$product = wc_get_product($wc_pid);
		?>
		<div class="tc-product-elementor-widget">
			<h3><?php esc_html_e($product->get_title()); ?></h3>
			<div class="price">
				<?php echo $product->get_price_html(); ?>
			</div>
			<div class="image">
				<?php echo wp_kses_post($product->get_image()); ?>
			</div>
			<div class="short-desc">
				<?php echo wp_kses_post($product->get_short_description()); ?>
			</div>
			<div class="cta">
				<a href="<?php echo esc_attr($product->get_permalink()); ?>" class="button"><?php echo __( 'LEARN MORE', 'elementor-widgets-for-tc' ); ?></a>
			</div>
		</div>
		<?php
	}

}