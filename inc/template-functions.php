<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package dmh
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dmh_body_classes($classes){
	global $post;
	
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// ADD SLUG
	if (isset($post)) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	// Adds cat to single post
    if (is_single() ) {
		global $post;
		foreach((get_the_category($post->ID)) as $category) {
		  // add category slug to the $classes array
		  $classes[] = $category->category_nicename;
		}
	}	

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'dmh_body_classes');


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function dmh_pingback_header(){
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'dmh_pingback_header');



// Disable Theme updates
add_filter('site_transient_update_themes', 'remove_update_themes');
function remove_update_themes($value){

	// Set your theme slug accordingly:
	$your_theme_slug = 'dmh';

	if (isset($value) && is_object($value)) {
		unset($value->response[$your_theme_slug]);
	}

	return $value;
}


add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Theme General Settings'),
            'menu_title'    => __('Theme Settings'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}

add_filter( 'excerpt_length', function($length) {
    return 30;
});
add_filter('excerpt_more', function($more){
	return '&hellip;';
});



// Add ACF values to REST response
function acf_to_rest() {
    $postypes_to_exclude = ['acf-field-group','acf-field'];
    $extra_postypes_to_include = ['page', 'post'];
    $post_types = array_diff(get_post_types(['_builtin' => false], 'names'),$postypes_to_exclude);

    array_push($post_types, $extra_postypes_to_include);

    foreach ($post_types as $post_type) {
        register_rest_field( $post_type, 'acf', [
            'get_callback'    => 'expose_acf_fields',
            'schema'          => null,
       ]
     );
    }
}
function expose_ACF_fields( $object ) {
    $ID = $object['id'];
    return get_fields($ID);
}
add_action( 'rest_api_init', 'acf_to_rest' );



function get_featured_image( $post ) {

	$bg = get_the_post_thumbnail_url($post->ID);

	// If has youtube video, grab the thumb
	if(!$bg && get_field('video_embed', $post->ID)){
		// Use preg_match to find iframe src.
		$video_iframe = get_field('video_embed', $post->ID);
		preg_match('/src="(.+?)"/', $video_iframe, $matches);
		$src = $matches[1];
		$video_info = parse_video_uri($src);
		$bg = 'https://img.youtube.com/vi/' . $video_info['id'] . '/maxresdefault.jpg';
	}
	
	return $bg;
}

// Returns string with first category
function get_first_category( $post ) {
	$categories = get_the_category($post->ID);
	return $categories[0]->name; // First cat
}

// Returns string with all categories
function get_all_categories( $post ) {
	$category_str = '';
	$categories = get_the_category($post->ID);
	foreach($categories as $category){
		$category_str .= $category->name . ', ';
	}
	return rtrim($category_str, ", "); // List of cats
}



/* Parse the video uri/url to determine the video type/source and the video id */
function parse_video_uri( $url ) {
	
	// Parse the url 
	$parse = parse_url( $url );
	
	// Set blank variables
	$video_type = '';
	$video_id = '';
	
	// Url is http://youtu.be/xxxx
	if ( $parse['host'] == 'youtu.be' ) {
	
		$video_type = 'youtube';
		
		$video_id = ltrim( $parse['path'],'/' );	
		
	}
	
	// Url is http://www.youtube.com/watch?v=xxxx 
	// or http://www.youtube.com/watch?feature=player_embedded&v=xxx
	// or http://www.youtube.com/embed/xxxx
	if ( ( $parse['host'] == 'youtube.com' ) || ( $parse['host'] == 'www.youtube.com' ) ) {
	
		$video_type = 'youtube';
		
		parse_str( $parse['query'] );
		
		$video_id = $v;	
		
		if ( !empty( $feature ) )
			$video_id = end( explode( 'v=', $parse['query'] ) );
			
		if ( strpos( $parse['path'], 'embed' ) == 1 )
			$video_id = end( explode( '/', $parse['path'] ) );
		
	}
	
	// Url is http://www.vimeo.com
	if ( ( $parse['host'] == 'vimeo.com' ) || ( $parse['host'] == 'www.vimeo.com' ) ) {
	
		$video_type = 'vimeo';
		
		$video_id = ltrim( $parse['path'],'/' );	
					
	}
	$host_names = explode(".", $parse['host'] );
	$rebuild = ( ! empty( $host_names[1] ) ? $host_names[1] : '') . '.' . ( ! empty($host_names[2] ) ? $host_names[2] : '');
	// Url is an oembed url wistia.com
	if ( ( $rebuild == 'wistia.com' ) || ( $rebuild == 'wi.st.com' ) ) {
	
		$video_type = 'wistia';
			
		if ( strpos( $parse['path'], 'medias' ) == 1 )
				$video_id = end( explode( '/', $parse['path'] ) );
	
	}
	
	// If recognised type return video array
	if ( !empty( $video_type ) ) {
	
		$video_array = array(
			'type' => $video_type,
			'id' => $video_id
		);
	
		return $video_array;
		
	} else {
	
		return false;
		
	}
	
}