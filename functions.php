<?php
/**
 * The Landing functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_Landing
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// if ( ! function_exists( 'foundationhall_setup' ) ) :
// 	/**
// 	 * Sets up theme defaults and registers support for various WordPress features.
// 	 *
// 	 * Note that this function is hooked into the after_setup_theme hook, which
// 	 * runs before the init hook. The init hook is too late for some features, such
// 	 * as indicating support for post thumbnails.
// 	 */
// 	function foundationhall_setup() {
// 		/*
// 		 * Make theme available for translation.
// 		 * Translations can be filed in the /languages/ directory.
// 		 * If you're building a theme based on The Landing, use a find and replace
// 		 * to change 'foundationhall' to the name of your theme in all the template files.
// 		 */
// 		load_theme_textdomain( 'foundationhall', get_template_directory() . '/languages' );

// 		// Add default posts and comments RSS feed links to head.
// 		add_theme_support( 'automatic-feed-links' );

// 		/*
// 		 * Let WordPress manage the document title.
// 		 * By adding theme support, we declare that this theme does not use a
// 		 * hard-coded <title> tag in the document head, and expect WordPress to
// 		 * provide it for us.
// 		 */
// 		add_theme_support( 'title-tag' );

// 		/*
// 		 * Enable support for Post Thumbnails on posts and pages.
// 		 *
// 		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
// 		 */
// 		add_theme_support( 'post-thumbnails' );

// 		// This theme uses wp_nav_menu() in one location.
// 		register_nav_menus(
// 			array(
// 				'menu-left' => esc_html__( 'Left Menu', 'foundationhall' ),
// 				'menu-right' => esc_html__( 'Right Menu', 'foundationhall' ),
// 				'menu-footer' => esc_html__( 'Footer', 'foundationhall' ),
// 			)
// 		);

// 		/*
// 		 * Switch default core markup for search form, comment form, and comments
// 		 * to output valid HTML5.
// 		 */
// 		add_theme_support(
// 			'html5',
// 			array(
// 				'search-form',
// 				'comment-form',
// 				'comment-list',
// 				'gallery',
// 				'caption',
// 				'style',
// 				'script',
// 			)
// 		);

// 		// Set up the WordPress core custom background feature.
// 		add_theme_support(
// 			'custom-background',
// 			apply_filters(
// 				'foundationhall_custom_background_args',
// 				array(
// 					'default-color' => 'ffffff',
// 					'default-image' => '',
// 				)
// 			)
// 		);

// 		// Add theme support for selective refresh for widgets.
// 		add_theme_support( 'customize-selective-refresh-widgets' );

// 		/**
// 		 * Add support for core custom logo.
// 		 *
// 		 * @link https://codex.wordpress.org/Theme_Logo
// 		 */
// 		add_theme_support(
// 			'custom-logo',
// 			array(
// 				'height'      => 250,
// 				'width'       => 250,
// 				'flex-width'  => true,
// 				'flex-height' => true,
// 			)
// 		);
// 	}
// endif;
// add_action( 'after_setup_theme', 'foundationhall_setup' );

function register_theme_menus() {
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Menu', 'foundationhall' ),
			'menu-right' => esc_html__( 'Right Menu', 'foundationhall' ),
			'menu-footer' => esc_html__( 'Footer', 'foundationhall' ),
		)
	);
}
add_action( 'init', 'register_theme_menus' );

add_filter(
	'body_class',
	function ( $classes ) {
		return array_merge( $classes, array( 'bg-light-brown' ) );
	}
);


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function foundationhall_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'foundationhall_content_width', 640 );
}
add_action( 'after_setup_theme', 'foundationhall_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function foundationhall_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'foundationhall' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'foundationhall' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'foundationhall_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function foundationhall_scripts() {
	wp_enqueue_style( 'foundationhall-style', get_stylesheet_uri(), array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'foundationhall_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter(
	'body_class',
	function ( $classes ) {
		return array_merge( $classes, array( 'overscroll-none' ) );
	}
);

/* * *********************************************************
 * Row
 * ********************************************************* */
function mu_efs_tw_row($params, $content = null) {
    extract(shortcode_atts(array(
        'class' => '',
		'reverse' => false,
		'padding' => true,
	), $params));

	if ($padding == true) {
		$paddingClass = " my-4 ";
	} else {
		$paddingClass = "";
	}

    $flexDirection = $reverse ? 'flex-wrap-reverse' : 'flex-wrap';

    $result = '<div class="flex ' . $flexDirection . ' ' . $paddingClass . ' ' . $class . '">';
    $content = str_replace("]<br />", ']', $content);
    $content = str_replace("<br />\n[", '[', $content);
    $result .= do_shortcode($content);
    $result .= '</div>';
    return force_balance_tags($result);
}

add_shortcode('efsrow', 'mu_efs_tw_row');

/* * *********************************************************
 * Columns
 * ********************************************************* */

function mu_efs_tw_column_shortcode($params, $content = null) {
    extract(shortcode_atts(array(
        'sm' => '12',
        'md'=> '12',
        'lg' => '12',
        'class' => '',
        'container_class' => '',
        'container' => true
    ), $params));

    $sm = $sm > 12 ? 12 : $sm;
    $md = $md > 12 ? 12 : $md;
    $lg = $lg > 12 ? 12 : $lg;
    $padding = $lg < 12 ? ' lg:px-6 ' : ' ';

    $result = '<div class="columns small-' . $sm . ' medium-' . $md . ' large-' . $lg . ' ' . $padding . ' ' . $class . ' mt-6 lg:mt-0">';
    if ( $container == true) {
        $result .= '<div class="' . $container_class . '">';
    }
    $result .= do_shortcode($content);
    $result .= '</div>';
    if ( $container == true) {
        $result .= '</div>';
    }
    return force_balance_tags($result);
}

add_shortcode('efscolumn', 'mu_efs_tw_column_shortcode');

/**
 * BUTTONS
 */
function mu_efs_tw_button( $params, $content = null) {

	$data = shortcode_atts(array(
		'class' => '',
		'title' => '',
		'link' => '',
		'color' => 'orange',
	),
	$params);

	return '<a class="btn btn-' . esc_attr( $data['color'] ) . ' my-3 ' . esc_attr( $data['class'] ). '" href="' . esc_url( $data['link'] ) . '">' . esc_attr( $data['title'] ) . '</a>';

}

add_shortcode( 'efsbutton', 'mu_efs_tw_button' );

function mu_youtube($atts, $content = null)
{
	extract(shortcode_atts(array(
		'youtube_id' => '',
		'id' => '',
		'text' => 'Play Video',
		'class' => '',
		'type' => 'embed'
	), $atts));

	if ($youtube_id) {
		$id = $youtube_id;
	}

	if ($type == 'link') {
		$html = '<a href="https://www.youtube.com/watch?v=' . esc_attr($id) . '" class="' . esc_attr($class) . '">';
		$html .= '<div class="h-full w-full relative bg-no-repeat bg-cover" style="padding-bottom: 56.25%; height: 0; background-image: url(http://i3.ytimg.com/vi/' . $id . '/maxresdefault.jpg);">';
		$html .= '<div class="cursor-pointer absolute inset-0 bg-black-overlay-40 lg:bg-black-overlay-40 hover:bg-green-overlay-40 flex flex-col pt-8">';
		$html .= '<div class="flex items-center px-4 text-white">';
		$html .= '<svg class="fill-current h-8 w-8 lg:h-10 lg:w-10 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm115.7 272l-176 101c-15.8 8.8-35.7-2.5-35.7-21V152c0-18.4 19.8-29.8 35.7-21l176 107c16.4 9.2 16.4 32.9 0 42z"></path></svg>';
		$html .= '<span class="text-xl lg:text-2xl font-semibold uppercase text-shadow-strong">' . esc_attr($text) . '</span>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</a>';
	} elseif ($type == 'embed') {
		$html = '<div class="relative h-0 ' . esc_attr($class) . '" style="padding-bottom: 56.25%;">';
		$html .= '<iframe class="absolute top-0 left-0 h-full w-full" width="560" height="315" src="https://www.youtube.com/embed/' . esc_attr($id) . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		$html .= '</div>';
	}

	return $html;
}
add_shortcode('mu_youtube', 'mu_youtube');

function mu_trumba_calendar($atts)
{
	$data = shortcode_atts(array(
		'webname' => 'Marshall',
		'type' => 'main',
		'config' => '',
		'teaser' => ''
	), $atts);

	$output = '<div id="trumba-calendar">';
	$output .= '<script type="text/javascript" src="//www.trumba.com/scripts/spuds.js"></script>';
	$output .= '<script type="text/javascript">';
	$output .= '$Trumba.addSpud({';
	$output .= 'webName: "' . esc_attr($data['webname']) . '",';
	$output .= 'spudType : "' . esc_attr($data['type']) . '",';
	$output .= 'spudConfig : "' . esc_attr($data['config']) . '",';
	$output .= 'teaserBase : "' . esc_attr($data['teaser']) . '" });';
	$output .= '</script>';
	$output .= '<noscript>Your browser must support JavaScript to view this content. ';
	$output .= 'Please enable JavaScript in your browser settings then try again.</noscript>';
	$output .= '</div>';

	return $output;
}
add_shortcode( 'mu_trumba', 'mu_trumba_calendar' );