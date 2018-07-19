<?php

if (function_exists('register_sidebar'))
{
	
	register_sidebar(
		array(
			'name'          => 'Sidebar',
	        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    	    'after_widget'  => '</li>',
        	'before_title'  => '<h2 class="widgettitle">',
        	'after_title'   => '</h2>'
		)
	);

}
/* for dropdown menu */
wp_enqueue_script('jquery');
add_action('wp_head','script_controller',9);
function script_controller(){
	global $wp_query;
	$handle = 'jquery';

	if ($wp_query->is_home || $wp_query->is_front_page){
		// brute uninstall
		wp_register_script($handle,'/wp-includes/js/jquery/jquery.js', false, '1.2.6');
	} else {
		wp_register_script($handle,'/wp-includes/js/jquery/jquery.js', false, '1.2.6');
	}
	wp_enqueue_script($handle);
}

/* for cut text */
function string_limit_words($excerpt, $substr=0)
{

	$string = strip_tags(str_replace('[...]', '...', $excerpt));
	if ($substr>0) {
		$string = substr($string, 0, $substr);
	}
	return $string;
}


/* for comment old */		
add_filter( 'comments_template', 'legacy_comments' );
function legacy_comments( $file ) {
	if ( !function_exists('wp_list_comments') )
		$file = TEMPLATEPATH . '/old.comments.php';
	return $file;
}	
?>