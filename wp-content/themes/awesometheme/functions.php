<?php 

function awesome_script_enqueue() {

	wp_enqueue_style('customsytle', get_template_directory_uri() . '/css/awesome.css', array(), '1.0.0', 'all');
	wp_enqueue_script('customjs', '', get_template_directory() . '/js/awesome.js', '1.0.0', true);

}

add_action( 'wp_enqueue_scripts', 'awesome_script_enqueue');

function awesome_theme_setup() {
	
	add_theme_support('menus');
	/* Location: It needs to be linked with the dashboard menu*/
	register_nav_menu('primary', 'Primary Header Navigation');
	register_nav_menu('secondary', 'Footer Navigation');
}

add_action('init', 'awesome_theme_setup'); /* It could be after, before or init setup*/

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');

add_theme_support('post-formats', array('aside', 'image', 'video'));