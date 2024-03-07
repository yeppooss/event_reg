<?php
/**
 * event_registration functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package event_registration
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function event_registration_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on event_registration, use a find and replace
		* to change 'event_registration' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'event_registration', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'event_registration' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'event_registration_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'event_registration_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function event_registration_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'event_registration_content_width', 640 );
}
add_action( 'after_setup_theme', 'event_registration_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function event_registration_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'event_registration' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'event_registration' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'event_registration_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function event_registration_scripts() {
	wp_enqueue_style( 'event_registration-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'event_registration-custom-style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION );
	wp_style_add_data( 'event_registration-style', 'rtl', 'replace' );

	wp_enqueue_script( 'event_registration-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	if(is_front_page())
	{
		wp_enqueue_script( 'event_registration-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'event_registration_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/controllers/EventsController.php';
require get_template_directory() . '/inc/controllers/LeadsController.php';
require get_template_directory() . '/inc/dtos/LeadSaveDTO.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function get_events_list($data){
	$events = EventsController::GetEventsList();
	return $events;
}

add_action( "rest_api_init", function(){
	register_rest_route( "registration/v1", "events/", array(
		'methods' => 'GET',
		'callback' => 'get_events_list',
	) );
} );

function get_leads_list($data){
	// $events = LeadsController::GetLeadsList();
	// return $events;
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$phone_number = $_POST['phone_number'];
	$event_id = $_POST['event_id'];
	$lead = new LeadSaveDTO('0', $first_name, $last_name, $phone_number, array($event_id));
	LeadsController::SaveLead($lead);

}

add_action( "rest_api_init", function(){
	register_rest_route( "registration/v1", "leads/", array(
		'methods' => 'POST',
		'callback' => 'get_leads_list',
	) );
} );
