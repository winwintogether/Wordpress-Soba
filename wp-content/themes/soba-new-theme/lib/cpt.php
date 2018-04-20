<?php 
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('staff', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Staff', 'html5blank'), // Rename these to suit
            'singular_name' => __('Staff', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New Staff Member', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Staff Member', 'html5blank'),
            'new_item' => __('New Staff Member', 'html5blank'),
            'view' => __('View Staff Member', 'html5blank'),
             'view_item' => __('View Staff Member', 'html5blank'),
            'search_items' => __('Search Staff', 'html5blank'),
            'not_found' => __('No Staff Found', 'html5blank'),
            'not_found_in_trash' => __('No Staff In Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

function create_my_taxonomies() {
    register_taxonomy(
        'staff_category',
        'staff',
        array(
            'labels' => array(
                'name' => 'Staff Category',
                'add_new_item' => 'Add New Staff Category',
                'new_item_name' => "New Staff Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'rewrite' => array(
            'slug' => 'soba-staff', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
            ),
        )
    );
}

function create_resource_taxonomies() {
    register_taxonomy(
        'resource_category',
        'resources',
        array(
            'labels' => array(
                'name' => 'Resource Category',
                'add_new_item' => 'Add New Resource Category',
                'new_item_name' => "New Resource Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'rewrite' => array(
            'slug' => 'resources', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
            ),
        )
    );
}

function create_press_taxonomies() {
    register_taxonomy(
        'press_category',
        'press',
        array(
            'labels' => array(
                'name' => 'Press Category',
                'add_new_item' => 'Add New Press Category',
                'new_item_name' => "New Press Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'rewrite' => array(
            'slug' => 'press-and-media', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
            ),
        )
    );
}


// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_home_slider()
{
    register_post_type('home-slider', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Home Slider', 'html5blank'), // Rename these to suit
            'singular_name' => __('Slider', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New Slider', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Slider', 'html5blank'),
            'new_item' => __('New Slider', 'html5blank'),
            'view' => __('View Slider', 'html5blank'),
            'view_item' => __('View Slider', 'html5blank'),
            'search_items' => __('Search Slider', 'html5blank'),
            'not_found' => __('No Slider Found', 'html5blank'),
            'not_found_in_trash' => __('No Slider In Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

function create_post_type_locations()
{
    register_post_type('locations', 
        array(
        'labels' => array(
            'name' => __('Locations', 'html5blank'), // Rename these to suit
            'singular_name' => __('Location', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New Location', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Location', 'html5blank'),
            'new_item' => __('New Location', 'html5blank'),
            'view' => __('View Location', 'html5blank'),
            'view_item' => __('View Location', 'html5blank'),
            'search_items' => __('Search Location', 'html5blank'),
            'not_found' => __('No Location Found', 'html5blank'),
            'not_found_in_trash' => __('No Location In Trash', 'html5blank')
        ),
        'label' => __( 'Treatment STeps', 'html5blank' ),
        'public' => true,
        'hierarchical' => true, 
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'facility-tour' ),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), 
        'can_export' => true, 
        'taxonomies' => array(
            'post_tag',
            'category'
        ) 
    ));
}

function create_post_type_services()
{
    register_post_type('services', 
        array(
        'labels' => array(
            'name' => __('Services', 'html5blank'), // Rename these to suit
            'singular_name' => __('Service', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New Service', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Service', 'html5blank'),
            'new_item' => __('New Service', 'html5blank'),
            'view' => __('View Service', 'html5blank'),
            'view_item' => __('View Service', 'html5blank'),
            'search_items' => __('Search Service', 'html5blank'),
            'not_found' => __('No Service Found', 'html5blank'),
            'not_found_in_trash' => __('No Service In Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, 
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'treatment-steps' ),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), 
        'can_export' => true, 
        'taxonomies' => array(
            'post_tag',
            'category'
        ) 
    ));
}


function create_post_type_press()
{
    register_post_type('press', 
        array(
        'labels' => array(
            'name' => __('Press + Media', 'html5blank'), // Rename these to suit
            'singular_name' => __('Press', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New Press', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Press', 'html5blank'),
            'new_item' => __('New Press', 'html5blank'),
            'view' => __('View Press', 'html5blank'),
            'view_item' => __('View Press', 'html5blank'),
            'search_items' => __('Search Press', 'html5blank'),
            'not_found' => __('No Press Found', 'html5blank'),
            'not_found_in_trash' => __('No Service In Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, 
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'press-and-media' ),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), 
        'can_export' => true, 
        'taxonomies' => array(
            'post_tag',
            'category'
        ) 
    ));
}

function create_post_type_resources()
{
    register_post_type('resources', 
        array(
        'labels' => array(
            'name' => __('Resources', 'html5blank'), // Rename these to suit
            'singular_name' => __('Resources', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New Resource', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Resource', 'html5blank'),
            'new_item' => __('New Resource', 'html5blank'),
            'view' => __('View Resource', 'html5blank'),
            'view_item' => __('View Resource', 'html5blank'),
            'search_items' => __('Search Resources', 'html5blank'),
            'not_found' => __('No Press Found', 'html5blank'),
            'not_found_in_trash' => __('No Service In Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, 
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'resources' ),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), 
        'can_export' => true, 
        'taxonomies' => array(
            'post_tag',
            'category'
        ) 
    ));
}

add_action('init', 'create_my_taxonomies', 0 ); // Custom Taxonomies For Staff
add_action('init', 'create_resource_taxonomies', 0 );

add_action('init', 'create_press_taxonomies', 0 );

add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('init', 'create_post_type_home_slider'); 
add_action('init', 'create_post_type_locations'); 
add_action('init', 'create_post_type_services'); 
add_action('init', 'create_post_type_press'); 
add_action('init', 'create_post_type_resources'); 
