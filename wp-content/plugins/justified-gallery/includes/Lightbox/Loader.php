<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class DGWT_JG_Lightbox_Loader
 */
class DGWT_JG_Lightbox_Loader {

	/**
	 * Selected ligthbox slug by user
	 * @var string
	 */
	private $lightbox = '';

	/**
	 * Local dirname
	 * @var string
	 */
	private $dir = '';

	public function __construct() {

		$this->dir = dirname(__FILE__);
		$this->lightbox = DGWT_JG()->settings->get_opt( 'lightbox' );

		$this->load_lightboxes();

	}

	/**
	 *
	 * Load source of selected lightbox
	 *
	 * return void
	 */
	public function load_lightboxes() {

		// Load the abstract class
		include $this->dir . '/Lightbox.php';

		// Load the current implementation
		switch ( $this->lightbox ) {

			case 'photoswipe':

				include $this->dir . '/Photoswipe/Photoswipe.php';
				new DGWT_JG_Photoswipe();
				break;

		}

	}

}