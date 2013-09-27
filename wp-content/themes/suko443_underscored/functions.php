<?php
/**
 * Suko443_underscored functions and definitions
 *
 * @package Suko443_underscored
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'suko443_underscored_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function suko443_underscored_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Suko443_underscored, use a find and replace
	 * to change 'suko443_underscored' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'suko443_underscored', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'mainnav' => __( 'Main navigation', 'suko443_underscored' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'suko443_underscored_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // suko443_underscored_setup
add_action( 'after_setup_theme', 'suko443_underscored_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function suko443_underscored_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'suko443_underscored' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'suko443_underscored_widgets_init' );

/**
 * Read more link for excerpts 
 */
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Enqueue scripts and styles
 */
function suko443_underscored_scripts() {
	//wp_enqueue_style( 'suko443_underscored-style', get_stylesheet_uri() );
	//wp_enqueue_script( $handle, $src, $dependencies_array, $version, $in_footer_boolean ); 
	//wp_enqueue_script('main-js-file', get_bloginfo('template_url') . '/js/main.js', array('jquery'), ' ', true);
	wp_enqueue_script( 'main-js-file', get_template_directory_uri() . '/js/main.js', array('jquery'), ' ', true );
	wp_enqueue_script('activity-indeicator', get_template_directory_uri() . '/js/NETEYE-activity-indicator-1.0.0/jquery.activity-indicator-1.0.0.min.js', array('jquery'), '1.0.0', true);
	
	//wp_enqueue_script( 'suko443_underscored-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/*if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'suko443_underscored-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}*/

}
add_action( 'wp_enqueue_scripts', 'suko443_underscored_scripts' );

function suko443_underscored_demos() {
	if ( is_page(jquery-accordion ) ){
		//include accordion plugin
		wp_enqueue_script('jqueryAccordion', get_template_directory_uri() . '/js/plugins/accordions/jquery-ui-1.10.3.custom.min.js', array('jquery'), '1.8.2', true);
		wp_enqueue_script('hashChange', get_template_directory_uri() . '/js/plugins/accordions/hashchange.js', array('jquery'), '', true);
		wp_enqueue_style('accordionsStyle', get_template_directory_uri() . '/js/plugins/accordions/accordions.css');
	}
}
add_action( 'wp_enqueue_scripts', 'suko443_underscored_demos' );



/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.

require get_template_directory() . '/inc/jetpack.php';
 */