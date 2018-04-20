<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Settings API data
 */
class DGWT_JG_Settings {
	/*
	 * @var string
	 * Unique settings slug
	 */

	private $setting_slug = DGWT_JG_SETTINGS_KEY;

	/*
	 * @var array
	 * All options values in one array
	 */
	public $opt;

	/*
	 * @var object
	 * Settings API object
	 */
	public $settings_api;

	public function __construct() {
		global $dgwt_jg_settings;

		// Set global variable with settings
		$settings = get_option( $this->setting_slug );
		if ( !isset( $settings ) || empty( $settings ) ) {
			$dgwt_jg_settings = array();
		} else {
			$dgwt_jg_settings = $settings;
		}

		$this->opt = $dgwt_jg_settings;

		$this->settings_api = new DGWT_JG_Settings_API( $this->setting_slug );

		add_action( 'admin_init', array( $this, 'settings_init' ) );
	}

	/*
	 * Set sections and fields
	 */

	public function settings_init() {

		//Set the settings
		$this->settings_api->set_sections( $this->settings_sections() );
		$this->settings_api->set_fields( $this->settings_fields() );

		//Initialize settings
		$this->settings_api->settings_init();
	}

	/*
	 * Set settings sections
	 * 
	 * @return array settings sections
	 */

	public function settings_sections() {

		$sections = array(
			array(
				'id'	 => 'dgwt_jg_basic',
				'title'	 => __( 'Basic', DGWT_JG_DOMAIN )
			),
			array(
				'id'	 => 'dgwt_jg_tiles_style',
				'title'	 => __( 'Tiles style', DGWT_JG_DOMAIN )
			),
			array(
				'id'	 => 'dgwt_jg_lightbox',
				'title'	 => __( 'Lightbox', DGWT_JG_DOMAIN )
			)
		);
		return apply_filters( 'dgwt/jg/settings/sections', $sections );
	}

	/**
	 * Create settings fields
	 *
	 * @return array settings fields
	 */
	function settings_fields() {
		$settings_fields = array(
			'dgwt_jg_basic'		 => apply_filters( 'dgwt/jg/settings/basic', array(
				array(
					'name'		 => 'last_row',
					'label'		 => __( 'Last row', DGWT_JG_DOMAIN ),
					'type'		 => 'select',
					'options'	 => array(
						'nojustify'	 => __( 'Align left', DGWT_JG_DOMAIN ),
						'center'	 => __( 'Align center', DGWT_JG_DOMAIN ),
						'right'		 => __( 'Align right', DGWT_JG_DOMAIN ),
						'justify'	 => __( 'Justify', DGWT_JG_DOMAIN ),
						'hide'		 => __( 'Hide', DGWT_JG_DOMAIN )
					),
					'desc'		 => __( "Decide how to position the last row of images. Default the last row images are aligned to the left. You can also hide the row if it can't be justified and aligned to the center or to the right", DGWT_JG_DOMAIN ),
					'default'	 => 'left',
				),
				array(
					'name'		 => 'margin',
					'label'		 => __( 'Space between images', DGWT_JG_DOMAIN ),
					'type'		 => 'number',
					'size'		 => 'small',
					'desc'		 => ' px',
					'default'	 => 3,
				),
				array(
					'name'		 => 'row_height',
					'label'		 => __( 'Row height', DGWT_JG_DOMAIN ),
					'type'		 => 'number',
					'size'		 => 'small',
					'desc'		 => ' px - ' . __( 'The preferred height of rows.', DGWT_JG_DOMAIN ),
					'default'	 => 160,
				),
				array(
					'name'		 => 'max_row_height',
					'label'		 => __( 'Max row height', DGWT_JG_DOMAIN ),
					'type'		 => 'number',
					'size'		 => 'small',
					'desc'		 => ' px - ' . __( 'Type <code>-1</code> to remove the limit of the maximum row height.', DGWT_JG_DOMAIN ),
					'default'	 => -1,
				)
			) ),
			'dgwt_jg_tiles_style'	 => apply_filters( 'dgwt/jg/settings/tiles_style', array(
				array(
					'name'    => 'tiles_style',
					'label'   => __( 'Choose tiles style', DGWT_JG_DOMAIN ),
					'desc'   => __( '', DGWT_JG_DOMAIN ),
					'type'    => 'select',
					'options' => array(
						'no'          => __( 'Without styling', DGWT_JG_DOMAIN ),
						'jg_standard' => __( 'JG Standard', DGWT_JG_DOMAIN )
					),
					'default' => 'jg_standard',
				),
			) ),
			'dgwt_jg_lightbox'	 => apply_filters( 'dgwt/jg/settings/lightbox', array(
				array(
					'name'    => 'lightbox',
					'label'   => __( 'Choose Lightbox', DGWT_JG_DOMAIN ),
					'desc'   => __( 'Allows users to open images in the Lightbox gallery.', DGWT_JG_DOMAIN ),
					'type'    => 'select',
					'options' => array(
						'no'          => __( 'Disable Lightbox', DGWT_JG_DOMAIN ),
						'photoswipe' => __( 'Photoswipe', DGWT_JG_DOMAIN )
					),
					'default' => 'photoswipe',
					'disabled' => array(
						'swiper'
					)
				),
			) )
		);


		return $settings_fields;
	}

	/*
	 * Print optin value
	 * 
	 * @param string $option_key
	 * @param string $default default value if option not exist
	 * 
	 * @return string
	 */

	public function get_opt( $option_key, $default = '' ) {

		$value = '';

		if ( is_string( $option_key ) && !empty( $option_key ) ) {

			if ( array_key_exists( $option_key, $this->opt ) ) {
				$value = $this->opt[ $option_key ];
			} else {

				// Catch default
				foreach ( $this->settings_fields() as $section ) {
					foreach ( $section as $field ) {
						if ( $field[ 'name' ] === $option_key && isset( $field[ 'default' ] ) ) {
							$value = $field[ 'default' ];
						}
					}
				}
			}
		}

		if ( empty( $value ) && !empty( $default ) ) {
			$value = $default;
		}

		return apply_filters( 'dgwt/jg/options/value', $value, $option_key );
	}

	/**
	 * Update option
	 *
	 * @param string key
	 * @param string value
	 *
	 * @return boolean True if option value has changed, false if not or if update failed.
	 */
	public function update_option( $key, $value ) {

		$options = get_option( DGWT_JG_SETTINGS_KEY );

		$options[ $key ] = $value;

		return update_option( DGWT_JG_SETTINGS_KEY, $options );

	}

	/**
	 * Handles output of the settings
	 */
	public static function output() {

		$settings = DGWT_JG()->settings->settings_api;

		include_once DGWT_JG_DIR . 'includes/admin/views/settings.php';
	}

}

/**
 * Disable details box setting tab if the option id rutns off
 */
add_filter( 'dgwt/jg/settings/sections', 'dgwt_jg_hide_settings_details_tab' );

function dgwt_jg_hide_settings_details_tab( $sections ) {

	if ( DGWT_JG()->settings->get_opt( 'show_details_box' ) !== 'on' && is_array( $sections ) ) {

		$i = 0;
		foreach ( $sections as $section ) {

			if ( isset( $section[ 'id' ] ) && $section[ 'id' ] === 'dgwt_jg_details_box' ) {
				unset( $sections[ $i ] );
			}

			$i++;
		}
	}

	return $sections;
}
