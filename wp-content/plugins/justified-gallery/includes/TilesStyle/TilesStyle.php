<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class TilesStyle
 */
abstract class DGWT_JG_TilesStyle {

	/**
	 * A implementation ID
	 * Should be overwritten in the implementation
	 * @var string
	 */
	protected $slug = '';

	/**
	 * Local dirname
	 * @var string
	 */
	private $dir = '';

	public function __construct() {

		$this->dir        = dirname( __FILE__ ) . '/' . $this->slug;

		$this->load();
	}

	/**
	 * Add actions or filters
	 *
	 * @return null
	 */
	private function load() {

	}


}