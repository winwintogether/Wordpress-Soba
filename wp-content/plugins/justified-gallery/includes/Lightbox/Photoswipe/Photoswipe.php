<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PhotoSwipe integration
 */
class DGWT_JG_Photoswipe extends DGWT_JG_Lightbox{

	/**
     * Unique slug for the instance
	 * @var string
	 */
    public $slug = 'Photoswipe';

	function __construct() {

		parent::__construct();

		$this->init();
	}

	private function init() {

		add_action( 'wp_footer', array( $this, 'include_modal' ), 90 );

		add_filter('dgwt/jg/gallery/tile_atts', array($this, 'add_caption'), 10, 2);

	}

	/**
	 * @inheritdoc
	 */
	public function js_scripts() {

			wp_register_script( 'jquery-mousewheel', $this->assets_url . '/jquery.mousewheel.min.js', array( 'jquery' ), DGWT_JG_VERSION, true );

			if ( DGWT_JG_DEBUG === false ) {

				wp_register_script( 'dgwt-jg-photoswipe-ui', $this->assets_url . '/photoswipe-ui-default.min.js', array( 'jquery', 'jquery-mousewheel' ), DGWT_JG_VERSION, true );
				wp_register_script( 'dgwt-jg-photoswipe', $this->assets_url . '/photoswipe.min.js', array( 'dgwt-jg-photoswipe-ui' ), DGWT_JG_VERSION, true );
				wp_register_script( 'dgwt-jg-jquery-photoswipe', $this->assets_url . '/jquery.photoswipe.js', array( 'dgwt-jg-photoswipe' ), DGWT_JG_VERSION, true );
			} else {

				wp_register_script( 'dgwt-jg-photoswipe-ui', $this->assets_url . '/photoswipe-ui-default.js', array( 'jquery', 'jquery-mousewheel' ), DGWT_JG_VERSION, true );
				wp_register_script( 'dgwt-jg-photoswipe', $this->assets_url . '/photoswipe.js', array( 'dgwt-jg-photoswipe-ui' ), DGWT_JG_VERSION, true );
				wp_register_script( 'dgwt-jg-jquery-photoswipe', $this->assets_url . '/jquery.photoswipe.js', array( 'dgwt-jg-photoswipe' ), DGWT_JG_VERSION, true );
			}

			wp_enqueue_script( array(
				'dgwt-jg-photoswipe',
				'dgwt-jg-photoswipe-ui',
				'dgwt-jg-jquery-photoswipe'
			) );

	}

	/**
	 * @inheritdoc
	 */
	public function css_style() {

			wp_register_style( 'dgwt-jg-photoswipe', $this->assets_url . '/photoswipe.css', array(), DGWT_JG_VERSION );
			wp_register_style( 'dgwt-jg-photoswipe-skin', $this->assets_url . '/default-skin/default-skin.css', array(), DGWT_JG_VERSION );

			wp_enqueue_style( array(
				'dgwt-jg-photoswipe',
				'dgwt-jg-photoswipe-skin'
			) );

	}

	/**
	 * Add HTML Attributes to images link to view description etc.
	 *
	 * @param string $atts
	 * @param object $attachment
	 */
	public function add_caption( $atts, $attachment ) {

		if(!DGWT_JG()->settings->get_opt('show_desc') === 'show'){
			return $atts;
        }

		$label = trim( $attachment->post_excerpt ) ? wp_strip_all_tags( wptexturize( $attachment->post_excerpt ) ) : '';
		$desc  = trim( $attachment->post_content ) ? wp_kses_post( wptexturize( $attachment->post_content ) ) : '';
		$desc  = str_replace( '"', '\'', $desc );

		$sub_html = "<h4>$label</h4><div class='dgwt-jg-item-desc'>$desc</div>";

		$atts['data-sub-html'] = $sub_html;

		return $atts;
	}

	/**
	 * Include photoshwipe modal HTML
     * @return null | echo HTML
	 */
	public function include_modal() {

		include $this->dir . '/photoswipe-modal.php';

	}

	/**
	 * Init PhotoSwipe
     * @return null | echo JavaScript
	 */
	public function gallery_js() {
		?>
        <script type="text/javascript">
            ( function ($) {
                $(document).ready(function () {

                    var $gallery = $('.dgwt-jg-gallery'),
                        $item = $('.dgwt-jg-item');

                    if ($gallery.length > 0 && $item.length > 0) {
                        $gallery.photoswipe({
                            shareButtons: [
                                {
                                    id: 'facebook',
                                    label: 'Share on Facebook',
                                    url: 'https://www.facebook.com/sharer/sharer.php?u={{image_url}}'
                                },
                                {
                                    id: 'twitter',
                                    label: 'Tweet',
                                    url: 'https://twitter.com/intent/tweet?&url={{url}}'
                                },
                                {
                                    id: 'pinterest',
                                    label: 'Pin it',
                                    url: 'http://www.pinterest.com/pin/create/button/?url={{url}}&media={{image_url}}'
                                },
                                {
                                    id: 'download',
                                    label: 'Download image',
                                    url: '{{raw_image_url}}',
                                    download: true
                                }

                            ]
                        });
                    }

                });
            }(jQuery))
        </script>
		<?php
	}


}