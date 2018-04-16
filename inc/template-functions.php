<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package teruterubozu
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function teruterubozu_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
		$classes[] = 'is-archive';
	}


	if ( is_front_page() && ! get_header_image() ) :
		$classes[] = 'no-cover';
	endif;

    if ( is_tag() ) :
        if ( ! get_term_meta( get_queried_object()->term_id, 'term_cover_image', true) ) :
            $classes[] = 'no-cover';
        endif;
    endif;


	if ( ! get_the_post_thumbnail() ) :
		$classes[] = 'no-post-thumbnail';
	endif;

	return $classes;
}
add_filter( 'body_class', 'teruterubozu_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function teruterubozu_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'teruterubozu_pingback_header' );


/**
 * ALLOWED MIME TYPES
 *
 * Allowed mime types and file extensions.
 *
 * @link https://developer.wordpress.org/reference/hooks/upload_mimes/
 */
function teruterubozu_upload_mimes($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'teruterubozu_upload_mimes');
