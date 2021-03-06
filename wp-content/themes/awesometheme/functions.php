<?php 
/*
	===================================
	  Include scripts
	===================================
*/

function awesome_script_enqueue() {
	// css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('customsytle', get_template_directory_uri() . '/css/awesome.css', array(), '1.0.0', 'all');
	// js
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/awesome.js', array(), '1.0.0', true);	
}

add_action( 'wp_enqueue_scripts', 'awesome_script_enqueue');

/*
	===================================
	  Activate menus
	===================================
*/
function awesome_theme_setup() {
	
	add_theme_support('menus');
	/* Location: It needs to be linked with the dashboard menu*/
	register_nav_menu('primary', 'Primary Header Navigation');
	register_nav_menu('secondary', 'Footer Navigation');
}

add_action('init', 'awesome_theme_setup'); /* It could be after, before or init setup*/

/*
	===================================
	  Theme support functions
	===================================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'image', 'video'));
add_theme_support('html5', array('search-form')); // Theme support for html5 serach forms

/*
	======================================
	  Sidebar function: Dashboard sidebar
	======================================
*/
function awesome_widget_setup() {

	register_sidebar( 
		array(
			'name'          => 'Sidebar',
			'id'            => 'sidebar-1',
			'class'         => 'custom',
			'description'   => 'Standard Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>'
		)
	);

}

add_action('widgets_init', 'awesome_widget_setup');

/*
	======================================
	  Include Walker file
	======================================
*/
require get_template_directory() . '/inc/walker.php';

/*
	======================================
	  Head function
	======================================
*/

function awesome_remove_version() {
	return '';
}

add_filter('the_generator', 'awesome_remove_version');

/*
	======================================
	  Custom Post Type
	======================================
*/
function awesome_custom_post_type (){

	$labels = array(
		'name'               => 'Portfolio',
		'singular_name'      => 'Portfolio',
		'add_new'            => 'Add Item',
		'all_items'          => 'All items',
		'add_new_item'       => 'Add Item',
		'edit_item'          => 'Edit Item',
		'new_item'           => 'New Item',
		'view_item'          => 'View Item',
		'search_item'        => 'Search Portfolio',
		'not_found'          => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon'  => 'Parent Item'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => true,
		'publicly_queryable' => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions'
		),
		//'taxonomies'          => array('category', 'post_tag'), // enabled general tags and categories
		'menu_position'       => 5,
		'exclude_from_search' => false // I don't want this element excluded from the search result
	);

	register_post_type('portfolio', $args);
}

add_action('init', 'awesome_custom_post_type'); // we call the inicialization before the theme runs

/*
	======================================
	  Custom Taxonomy
	======================================
*/
function awesome_custom_taxonomies() {

	// add new taxonomy hierarchical
	$labels = array(
		'name'              => 'Fields',
		'singular_name'     => 'Field',
		'search_items'      => 'Search Fields',
		'all_items'         => 'All Fields',
		'parent_item'       => 'Parent Field',
		'parent_item_colon' => 'Parent Field:',
		'edit_item'         => 'Edit Field',
		'update_item'       => 'Update Field',
		'add_new_item'      => 'Add New Field',
		'new_item_name'     => 'New Field Name',
		'menu_name'         => 'Field'
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true, // It shows taxonomies on admin CPT list
		'query_var'         => true, // Activate the hability to create custom queries and directly query this custom taxonomies		
		/* rewrite slug of custom taxonomy. Ex: mysite.com/development => without rewrite 
		   mysite.com/type/development => with rewrite*/
		'rewrite'           => array('slug' => 'field') 
	);

	register_taxonomy('field', array('portfolio'), $args );// array('portfolio'): It means that the taxonomy will be applied to this CPT

	// add new taxonomy NOT hierarchical
	register_taxonomy('software', 'portfolio', array( 
		'label'        => 'Software',
		'rewrite'      => array( 'slug' => 'software' ),
		'hierarchical' => false
	) );
}

add_action('init', 'awesome_custom_taxonomies');

/*
	======================================
	  Custom Term Function
	======================================
*/
function awesome_get_terms( $postID, $term ) {

	$output = '';
	
	foreach( wp_get_post_terms( $postID, $term ) as $i => $term ){
		
		$link   = '<a href="' . get_term_link( $term ) . '">' . $term->name . '</a>';		
		$output .= ( $i > 0 )? ', ' . $link : $link;
	}

	return $output;
}