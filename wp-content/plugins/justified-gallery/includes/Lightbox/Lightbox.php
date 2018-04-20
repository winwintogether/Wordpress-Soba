<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class DGWT_JG_Lightbox
 */
abstract class DGWT_JG_Lightbox {

	/**
	 * A implementation ID
	 * Should be overwritten in the implementation
	 * @var string
	 */
	protected $slug = '';

	/**
	 * Absolute server path to a implementation root.
	 * @var string
	 */
	protected $dir = '';

	/**
	 * Absolute URL to assets for a implementation
	 * @var string
	 */
	protected $assets_url = '';



	public function __construct() {

		$this->dir        = dirname( __FILE__ ) . '/' . $this->slug;
		$this->assets_url = DGWT_JG_URL . 'includes/Lightbox/' . $this->slug . '/assets';

		$this->load();
	}

	/**
	 * Add actions or filters
	 *
	 * @return null
	 */
	private function load() {

		add_action( 'wp_enqueue_scripts', array( $this, 'js_scripts' ) );

		add_action( 'wp_print_styles', array( $this, 'css_style' ) );

		add_action( 'wp_footer', array( $this, 'gallery_init' ), 90 );

		add_filter( 'dgwt/jg/gallery/tile_atts', array( $this, 'add_link' ), 10, 2 );
	}

	/**
	 * Method to register and enqueue JS files
	 * Should be overwritten in the implementation
	 *
	 * @return null
	 */
	public function js_scripts() {

	}

	/**
	 * Method to register and enqueue CSS files
	 * Should be overwritten in the implementation
	 *
	 * @return null
	 */
	public function css_style() {

	}

	/**
	 * Place to write raw JS which initiates Lightbox
	 * Should be overwritten in the implementation
	 *
	 * @return null | echo JS body
	 */
	public function gallery_js() {

	}

	/**
	 * Print JS
	 *
	 * @return null | echo minified JS code to footer
	 */
	public function gallery_init() {
		ob_start();

		$this->gallery_js();

		$js = DGWT_JG_Helpers::minify_js( ob_get_clean() );
		echo $js;
	}


	/**
	 * Overwrite a href attribute for every photos tile.
	 * By default, images link to a attachment page.
	 * This must be corrected for each lighboxes.
	 *
	 * @param array $atts
	 * @param object $attachment
	 *
	 * @return string
	 */
	public function add_link( $atts, $attachment ) {

		$full_src = wp_get_attachment_image_src( $attachment->ID, 'full' );

		if ( ! empty( $full_src[0] ) ) {
			$atts['href'] = $full_src[0];
		}

		return $atts;
	}

}