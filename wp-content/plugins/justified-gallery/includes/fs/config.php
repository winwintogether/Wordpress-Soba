<?php

// Create a helper function for easy SDK access.
function dgwt_freemius() {
	global $dgwt_freemius;

	if ( ! isset( $dgwt_freemius ) ) {
		// Include Freemius SDK.
		require_once dirname(__FILE__) . '/lib/start.php';

		$dgwt_freemius = fs_dynamic_init( array(
			'id'                  => '699',
			'slug'                => 'justified-gallery',
			'type'                => 'plugin',
			'public_key'          => 'pk_147c4a27f580e85103b260be0d2f3',
			'is_premium'          => false,
			'is_premium_only'     => false,
			// If your plugin is a serviceware, set this option to false.
			'has_premium_version' => false,
			'has_addons'          => false,
			'has_paid_plans'      => false,
			'menu'                => array(
				'slug'           => 'dgwt_jg_settings',
				'contact'        => false,
				'support'        => false,
			)
		) );
	}

	return $dgwt_freemius;
}

// Init Freemius.
dgwt_freemius();
// Signal that SDK was initiated.
do_action( 'dgwt_freemius_loaded' );