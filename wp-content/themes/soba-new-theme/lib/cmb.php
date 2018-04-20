<?php 
function soba_mb() {
	$prefix = '_soba_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Title Options', 'cmb2' ),
		'object_types'  => array( 'page','locations', 'services' ), // Post type
	) );

	$cmb->add_field( array(
		'name'       => esc_html__( 'Secondary Title', 'cmb2' ),
		'desc'       => esc_html__( 'Goes underneath main title', 'cmb2' ),
		'id'         => $prefix . 'secondary_title',
		'type'       => 'text',
	) );

	$cmb->add_field( array(
		'name'       => esc_html__( 'Alternative Featured Title', 'cmb2' ),
		'desc'       => esc_html__( 'Featured Title', 'cmb2' ),
		'id'         => $prefix . 'featured_title',
		'type'       => 'text',
	) );

	$cmb->add_field( array(
		'name'       => esc_html__( 'Is Featured On Homepage?', 'cmb2' ),
		'desc'       => esc_html__( 'Shows up on homepage slider', 'cmb2' ),
		'id'         => $prefix . 'is_featured',
		'type'       => 'checkbox',
	) );

	$locations = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_locations',
		'title'         => esc_html__( 'Title Options', 'cmb2' ),
		'object_types'  => array( 'locations', ),
	) );


	$locations->add_field( array(
	'name' => 'Location Gallery',
	'desc' => '',
	'id'   => 'location_gallery',
	'type' => 'file_list',
	'preview_size' => array( 300, 300 ),
	) );

	$locations->add_field( array(
	'name' => __( 'Link URL', 'cmb2' ),
	'id'   => $prefix . 'url_locations',
	'type' => 'text_url',
	'protocols' => array( 'http', 'https' ), 
	) );

	$locations->add_field( array(
	'name'    => 'Link Text',
	'id'   => $prefix . 'url_text',
	'type'    => 'text',
	) );

	$services = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_services',
		'title'         => esc_html__( 'Title Options', 'cmb2' ),
		'object_types'  => array( 'services', ),
	) );

	$services->add_field( array(
	'name' => 'Location Gallery',
	'desc' => '',
	'id'   => 'service_gallery',
	'type' => 'file_list',
	'preview_size' => array( 300, 300 ),
	) );

	$services->add_field( array(
	'name'    => 'Slider Home Callout',
	'id'   => $prefix . 'slider_home_callout',
	'type'    => 'text',
	) );

	$services->add_field( array(
	'name' => 'Slider Content Block',
	'desc' => 'Content Block On Home Slider',
	'id' => $prefix . 'slide_content',
	'type' => 'wysiwyg',
	'options' => array(),
	));

	$services->add_field( array(
	'name'    => 'Youtube Video ID',
	'id'   => $prefix . 'service_video_id',
	'type'    => 'text',
	) );

	$services->add_field( array(
	'name'    => 'Tab Icon',
	'desc'    => 'If no image is uploaded text will be used.',
	'id'      => $prefix .'slider_tab_icon',
	'type'    => 'file',
	// Optional:
	'options' => array(
		'url' => false, 
	),
	'text'    => array(
		'add_upload_file_text' => 'Addmx Icon'
	),
	) );

	$services->add_field( array(
	'name'    => 'Home Secondary Featured ',
	'desc'    => 'If no image is uploaded text will be used.',
	'id'      => $prefix .'slider_home_featured',
	'type'    => 'file',
	// Optional:
	'options' => array(
		'url' => false, 
	),
	'text'    => array(
		'add_upload_file_text' => 'Add Image' 
	),
	) );

	$home_page_one = new_cmb2_box( array(
		'id'           => 'home-page-options',
		'title'        => 'Header Option',
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'home-page.php' ),
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
		'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names'   => true, // Show field names on the left
	) );


	$home_page_one->add_field( array(
	'name'    => 'Main Title Line One',
	'id'   => $prefix . 'main_line_one',
	'type' => 'textarea',
	) );


	$home_page_one->add_field( array(
	'name'    => 'Main Title Line Two',
	'id'   => $prefix . 'main_line_two',
	'type' => 'textarea',
	) );

	$home_page_two = new_cmb2_box( array(
		'id'           => 'home-page-links',
		'title'        => 'Header Links',
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'home-page.php' ),
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
		'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names'   => true, // Show field names on the left
	) );

	$home_page_two->add_field( array(
	'name'    => 'First Header Link Title',
	'id'   => $prefix . 'header_link_one',
	'type'    => 'textarea',
	) );

	$home_page_two->add_field( array(
	'name'    => 'First Header Link',
	'id'   => $prefix . 'header_link_one_url',
	'type'    => 'text',
	) );


	$home_page_two->add_field( array(
	'name'    => 'Second Header Link Title',
	'id'   => $prefix . 'header_link_two',
	'type'    => 'textarea',
	) );

	$home_page_two->add_field( array(
	'name'    => 'Second Header Link',
	'id'   => $prefix . 'header_link_two_url',
	'type'    => 'text',
	) );

	$home_page_two->add_field( array(
	'name'    => 'Third Header Link Title',
	'id'   => $prefix . 'header_link_three',
	'type'    => 'textarea',
	) );

	$home_page_two->add_field( array(
	'name'    => 'Third Header Link',
	'id'   => $prefix . 'header_link_three_url',
	'type'    => 'text',
	) );

	$home_page_two->add_field( array(
	'name'    => 'Fourth Header Link Title',
	'id'   => $prefix . 'header_link_four',
	'type'    => 'textarea',
	) );

	$home_page_two->add_field( array(
	'name'    => 'Fourth Header Link',
	'id'   => $prefix . 'header_link_four_url',
	'type'    => 'text',
	) );

	$home_page_content_one = new_cmb2_box( array(
		'id'           => 'home-page-links',
		'title'        => 'Header Links',
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'home-page.php' ),
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
		'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names'   => true, // Show field names on the left
	) );

	$press = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_press',
		'title'         => esc_html__( 'Video Option', 'cmb2' ),
		'object_types'  => array( 'press', ),
	) );

	$press->add_field( array(
	'name'    => 'Press Video ID',
	'id'   => $prefix . 'press_video_id',
	'type'    => 'text',
	) );
    $press->add_field( array(
        'name' => 'Is Youtube Video?',
        'desc' => 'field description (optional)',
        'id'   => $prefix . 'youtube_press',
        'type' => 'checkbox',
    ) );

    $press->add_field( array(
        'name' => 'Is Brightcove Video?',
        'desc' => 'field description (optional)',
        'id'   => $prefix . 'bright_press',
        'type' => 'checkbox',
    ) );

    
    $press->add_field( array(
        'name' => 'Is Article?',
        'desc' => 'field description (optional)',
        'id'   => $prefix . 'article_press',
        'type' => 'checkbox',
    ) );

   	$press->add_field( array(
	'name'    => 'Article Title',
	'id'   => $prefix . 'article_title',
	'type'    => 'text',
	) );

	$press->add_field( array(
	'name'    => 'Article Link',
	'id'   => $prefix . 'article_link',
	'type'    => 'text',
	) );

	$press->add_field( array(
	'name'    => 'Publication',
	'id'   => $prefix . 'press_pub',
	'type'    => 'text',
	) );


    $staff = new_cmb2_box( array(
        'id'           => 'soba_staff_metabox',
        'title'        => esc_html__( 'Video Metabox', 'soba' ),
        'object_types' => array( 'staff' ),
        'option_key'      => 'soba-staff', // The option key and admin menu page slug.
    ) );
    $staff->add_field( array(
        'name' => __( 'Video Resource', 'soba' ),
        'desc'    => 'mp4',
        'id'   => $prefix.'staff_video_mp4_url',
        'type' => 'file',
    ) );
    $staff->add_field( array(
        'name' => __( 'Video Resource', 'soba' ),
        'desc'    => 'ogg',
        'id'   => $prefix.'staff_video_ogg_url',
        'type' => 'file',
    ) );
    $staff->add_field( array(
        'name' => __( 'Video Resource', 'soba' ),
        'desc'    => 'webm',
        'id'   => $prefix.'staff_video_webm_url',
        'type' => 'file',
    ) );
}

add_action( 'cmb2_admin_init', 'soba_mb' );

	/**
	 * Theme Options Page.
	 */

function soba_register_theme_options_metabox() {

	$cmb_options = new_cmb2_box( array(
		'id'           => 'soba_option_metabox',
		'title'        => esc_html__( 'Site Options', 'soba' ),
		'object_types' => array( 'options-page' ),
		'option_key'      => 'soba_options', // The option key and admin menu page slug.
		) );

	$cmb_options->add_field( array(
		'name' => __( 'Instagram URL', 'soba' ),
		'id'   => 'ig_url',
		'type' => 'text',

	) );

	$cmb_options->add_field( array(
		'name' => __( 'Twitter URL', 'soba' ),
		'id'   => 'twitter_url',
		'type' => 'text',

	) );

	$cmb_options->add_field( array(
		'name' => __( 'Facebook URL', 'soba' ),
		'id'   => 'fb_url',
		'type' => 'text',

	) );



	$cmb_options->add_field( array(
		'name' => __( 'Sitewide Phone Number', 'soba' ),
		'id'   => 'phone_number',
		'type' => 'text',

	) );

}

function soba_get_option( $key = '', $default = false ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( 'soba_options', $key, $default );
	}
	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( 'soba_options', $default );
	$val = $default;
	if ( 'all' == $key ) {
		$val = $opts;
	} elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}
	return $val;
}

add_action( 'cmb2_admin_init', 'soba_register_theme_options_metabox' );

function cmb2_output_file_list( $file_list_meta_key, $img_size = 'medium' ) {
	echo '<div class="photo-gallery">';
	
	// Get the list of files
	$files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

	$first_four = array_slice($files, 0, 5, true);
	$last_items = array_slice($files, 5, 50, true);

	$i = 0;
	foreach ( (array) $first_four as $attachment_id => $attachment_url ) {
	if ( $i++ == 0) {?>
	<a class="main-photo" href="<?php echo wp_get_attachment_image_url( $attachment_id, 'full-size' ); ?>"><?php echo wp_get_attachment_image( $attachment_id, 'main-thumb' ); ?></a>
    <?php } else  { ?>
	
	<a class="thumb" href="<?php echo wp_get_attachment_image_url( $attachment_id, 'full-size' ); ?>"><?php echo wp_get_attachment_image( $attachment_id, $img_size ); ?></a>
	<?php } ?>	

	<?php } ?>
	
	<?php foreach ( (array) $last_items as $attachment_id => $attachment_url ) { ?>
	<a class="hide" href="<?php echo wp_get_attachment_image_url( $attachment_id, 'full-size' ); ?>"><?php echo wp_get_attachment_image( $attachment_id, 'main-thumb' ); ?></a>	
	
	<?php } ?>


	<?php echo '</div>';
} ?>
