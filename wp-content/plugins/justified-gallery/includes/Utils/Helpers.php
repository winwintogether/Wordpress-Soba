<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}


class DGWT_JG_Helpers {

/*
 * Minify JS
 *
 * @see https://gist.github.com/tovic/d7b310dea3b33e4732c0
 *
 * @param string
 * @return string
 */

public static function minify_js( $input ) {

	if ( trim( $input ) === "" )
		return $input;
	return preg_replace(
		array(
			// Remove comment(s)
			'#\s*("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')\s*|\s*\/\*(?!\!|@cc_on)(?>[\s\S]*?\*\/)\s*|\s*(?<![\:\=])\/\/.*(?=[\n\r]|$)|^\s*|\s*$#',
			// Remove white-space(s) outside the string and regex
			'#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/)|\/(?!\/)[^\n\r]*?\/(?=[\s.,;]|[gimuy]|$))|\s*([!%&*\(\)\-=+\[\]\{\}|;:,.<>?\/])\s*#s',
			// Remove the last semicolon
			'#;+\}#',
			// Minify object attribute(s) except JSON attribute(s). From `{'foo':'bar'}` to `{foo:'bar'}`
			'#([\{,])([\'])(\d+|[a-z_]\w*)\2(?=\:)#i',
			// --ibid. From `foo['bar']` to `foo.bar`
			'#([\w\)\]])\[([\'"])([a-z_]\w*)\2\]#i',
			// Replace `true` with `!0`
			'#(?<=return |[=:,\(\[])true\b#',
			// Replace `false` with `!1`
			'#(?<=return |[=:,\(\[])false\b#',
			// Clean up ...
			'#\s*(\/\*|\*\/)\s*#'
		), array(
		'$1',
		'$1$2',
		'}',
		'$1$3',
		'$1.$3',
		'!0',
		'!1',
		'$1'
	), $input );
}

/*
 * Return loupe SVG icon source
 *
 * @return string
 */

public static function get_loupe_svg() {

	$svg = '<svg version="1.1" class="dgwt-rwpgg-ico-loupe" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" fill="#FFFFFF" width="28px" height="28px" viewBox="0 0 51 51" xml:space="preserve">';
	$svg .= '<path d="M51.539,49.356L37.247,35.065c3.273-3.74,5.272-8.623,5.272-13.983c0-11.742-9.518-21.26-21.26-21.26 S0,9.339,0,21.082s9.518,21.26,21.26,21.26c5.361,0,10.244-1.999,13.983-5.272l14.292,14.292L51.539,49.356z M2.835,21.082 c0-10.176,8.249-18.425,18.425-18.425s18.425,8.249,18.425,18.425S31.436,39.507,21.26,39.507S2.835,31.258,2.835,21.082z"/>';
	$svg .= '</svg>';

	return $svg;
}

/**
 * Prepare array to HTML attributes
 * @param array
 *
 * @return string
 */
public static function get_html_atts($atts){

	$output = '';

	if(!empty($atts) && is_array($atts)){
		foreach ($atts as $key => $value){
			$output .= $key . '="' . $value . '"' ;
		}
	}

	return $output;
}

}