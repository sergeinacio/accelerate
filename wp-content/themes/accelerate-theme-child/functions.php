<?php
/**
 * Accelerate Marketing Child functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

/* Additional menus */
function accelerate_extra_menus() {
  register_nav_menus( array(
    '404-nav'  => __( '404 Nav', 'accelerate' ),
  ) );
}
add_action( 'after_setup_theme', 'accelerate_extra_menus' ); 

/* Creation of custom post types: */

function create_custom_post_types() {
	/* case studies post type */
	register_post_type( 'case_studies',
		array(
			'labels' => array(
				'name' => __( 'Case Studies' ),
				'singular_name' => __( 'Case Study' )
				),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'case_studies' ),
		)
	);

	register_post_type( 'about',
		array(
			'labels' => array(
				'name' => __( 'Services/About' ),
				'singular_name' => __( 'Service' )
				),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'about' ),
		)
	);
}

/* ADD Custom post types */
add_action( 'init', 'create_custom_post_types' );

/**
 * Filter the except length to 35 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 35;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function custom_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

function accelerate_child_scripts() {
wp_enqueue_style('accelerate-child-google-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:300italic,400italic,600italic,400,600,700,300');
}
add_action( 'wp_enqueue_scripts', 'accelerate_child_scripts' );

/* Sidebar widget area */

function accelerate_theme_child_widget_init() {
	
	register_sidebar( array(
	    'name' =>__( 'Homepage sidebar', 'accelerate-theme-child'),
	    'id' => 'sidebar-2',
	    'description' => __( 'Appears on the static front page template', 'accelerate-theme-child' ),
	    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    'after_widget' => '</aside>',
	    'before_title' => '<h2 class="widget-title">',
	    'after_title' => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'accelerate_theme_child_widget_init' );

function accelerate_theme_child_widget_footer() {
	
	register_sidebar( array(
	    'name' =>__( 'Footer right', 'accelerate-theme-child'),
	    'id' => 'sidebar-3',
	    'description' => __( 'Appears on the right side of the footer', 'accelerate-theme-child' ),
	    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    'after_widget' => '</aside>',
	    'before_title' => '<h2 class="widget-title">',
	    'after_title' => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'accelerate_theme_child_widget_footer' );