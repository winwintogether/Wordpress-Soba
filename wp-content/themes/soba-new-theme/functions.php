<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
/**
 * Ajax Posts
 */

function press_more_post_ajax() {
	$ppp            = ( isset( $_POST["ppp"] ) ) ? $_POST["ppp"] : 4;
	$column         = ( isset( $_POST['column'] ) ) ? $_POST['column'] : 4;
	$page           = ( isset( $_POST['pageNumber'] ) ) ? $_POST['pageNumber'] : 0;
	$press_category = ( isset( $_POST['pressCategory'] ) ) ? $_POST['pressCategory'] : '';

	header( "Content-Type: text/html" );

	$args = null;

	if ( $press_category != '' ) {
		$args = array(
			'suppress_filters' => true,
			'post_type'        => "press",
			'posts_per_page'   => $ppp,
			'paged'            => $page,
			'tax_query'        => array(
				array(
					'taxonomy' => 'press_category',
					'field'    => 'slug',
					'terms'    => $press_category,
				)
			)
		);
	} else {
		$args = array(
			'suppress_filters' => true,
			'post_type'        => "press",
			'posts_per_page'   => $ppp,
			'paged'            => $page,
			"meta_query"       => array(
				array(
					"key"   => "_soba_article_press",
					"compare" => "NOT EXISTS",
				)
			)
		);
	}


	$loop = new WP_Query( $args );
	$i    = 1;
	$out  = '';
	if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
		$image_url        = esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) );
		$video_id         = get_post_meta( get_the_ID(), '_soba_press_video_id', true );
		$youtube_video_id = '';
		$bright_video_id  = '';

		if ( get_post_meta( get_the_ID(), '_soba_youtube_press', 1 ) ) {
			$youtube_video_id = $video_id;
		} else if ( get_post_meta( get_the_ID(), '_soba_bright_press', 1 ) ) {
			$bright_video_id = $video_id;
		}

		if ( $i % $column == 1 ) {
			$out .= '<div class="row">';
		}
		$out .= '<div class="press-item">
         	      <a href="javascript:void(0)" data-youtube-id="' . $youtube_video_id . '" data-bright-id="' . $bright_video_id . '" data-izimodal-open="#press-video-modal" data-izimodal-transitionin="fadeInDown" data-izimodal-preventclose=""><img src="' . $image_url . '" alt="Image Section"/></a>
	              <div class="item-content">
	                <time>' . get_the_date() . '</time>
	                <h3>' . get_the_title() . '</h3>
	              </div>
	            </div>';
		if ( $i % $column == 0 ) {
			$out .= '</div>';
		}
		$i ++;
	endwhile;
		$i --;
		if ( $i % $column != 0 ) {
			$out .= '</div>';
		}
	endif;
	wp_reset_postdata();
	echo $out;
	die();
}

add_action( 'wp_ajax_nopriv_press_more_post_ajax', 'press_more_post_ajax' );
add_action( 'wp_ajax_press_more_post_ajax', 'press_more_post_ajax' );

function press_more_article_ajax() {
	$ppp  = ( isset( $_POST["ppp"] ) ) ? $_POST["ppp"] : 4;
	$page = ( isset( $_POST['pageNumber'] ) ) ? $_POST['pageNumber'] : 0;

	$args = array(
		'suppress_filters' => true,
		'post_type'        => "press",
		'posts_per_page'   => $ppp,
		'paged'            => $page,
		"meta_query"       => array(
			array(
				"key"   => "_soba_article_press",
				"value" => "on"
			)
		)
	);

	header( "Content-Type: text/html" );

	$loop = new WP_Query( $args );
	$out  = '';
	if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
		$article_title = get_post_meta( get_the_ID(), '_soba_article_title', true );
		$article_link  = get_post_meta( get_the_ID(), '_soba_article_link', true );
		$artilce_pub   = get_post_meta( get_the_ID(), '_soba_press_pub', true );
		$out           .= '<div class="article-item">
		            <div class="article-company">
		                ' . $artilce_pub . '
		            </div>
		            <div class="article-title">
		                <a href="' . $article_link . '">' . wp_trim_words( $article_title, 10, '...' ) . '</a>
		            </div>
		            <div class="article-date">
		               ' . get_the_date() . '
		            </div>
		        </div>';
	endwhile;
	endif;
	wp_reset_postdata();
	echo $out;
	die();
}

add_action( 'wp_ajax_nopriv_press_more_article_ajax', 'press_more_article_ajax' );
add_action( 'wp_ajax_press_more_article_ajax', 'press_more_article_ajax' );

$sage_includes = [
	'lib/assets.php',    // Scripts and stylesheets
	'lib/extras.php',    // Custom functions
	'lib/setup.php',     // Theme setup
	'lib/titles.php',    // Page titles
	'lib/wrapper.php',   // Theme wrapper class
	'lib/customizer.php', // Theme customizer
	'lib/top-bar-walker.php', // Foundation walker
	'lib/cpt.php', // Custom post types
	'lib/cmb.php' // CMB2
];

foreach ( $sage_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'sage' ), $file ), E_USER_ERROR );
	}

	require_once $filepath;
}
unset( $file, $filepath );

function remove_width_attribute( $html ) {
	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );

	return $html;
}

function img( $uri, $atts = '' ) {
	//- - - - - - - - - - - - - - - - - - - - - - - -
	// Relative vs Absolute
	//- - - - - - - - - - - - - - - - - - - - - - - -
	if ( substr( $uri, 0, 4 ) !== 'http' ) {
		$uri = get_bloginfo( 'template_url' ) . '/dist/images/' . $uri;
	}
	//- - - - - - - - - - - - - - - - - - - - - - - -
	// Build attributes
	//- - - - - - - - - - - - - - - - - - - - - - - -
	if ( is_array( $atts ) ) {
		if ( ! isset( $atts['alt'] ) ) {
			$atts['alt'] = '';
		}
		$str = '';
		foreach ( $atts as $key => $att ) {
			$str .= $key . "='$att'";
		}
		$atts = $str;
	} else {
		$atts = "alt='$atts'";
	}

	return "<img src='$uri' $atts>";
}

function wpb_first_and_last_menu_class( $items ) {
	$items[1]->classes[]                 = 'first';
	$items[ count( $items ) ]->classes[] = 'last';

	return $items;
}

add_filter( 'wp_nav_menu_objects', 'wpb_first_and_last_menu_class' );

function excerpt( $limit ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( " ", $excerpt ) . '...';
	} else {
		$excerpt = implode( " ", $excerpt );
	}
	$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );

	return $excerpt;
}

