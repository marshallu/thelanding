<?php
/**
 * The Landing functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TheLanding
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// if ( ! function_exists( 'thelanding_setup' ) ) :
// 	/**
// 	 * Sets up theme defaults and registers support for various WordPress features.
// 	 *
// 	 * Note that this function is hooked into the after_setup_theme hook, which
// 	 * runs before the init hook. The init hook is too late for some features, such
// 	 * as indicating support for post thumbnails.
// 	 */
// 	function thelanding_setup() {
// 		/*
// 		 * Make theme available for translation.
// 		 * Translations can be filed in the /languages/ directory.
// 		 * If you're building a theme based on The Landing, use a find and replace
// 		 * to change 'thelanding' to the name of your theme in all the template files.
// 		 */
// 		load_theme_textdomain( 'thelanding', get_template_directory() . '/languages' );

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
// 				'menu-left' => esc_html__( 'Left Menu', 'thelanding' ),
// 				'menu-right' => esc_html__( 'Right Menu', 'thelanding' ),
// 				'menu-footer' => esc_html__( 'Footer', 'thelanding' ),
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
// 				'thelanding_custom_background_args',
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
// add_action( 'after_setup_theme', 'thelanding_setup' );

function register_theme_menus() {
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Menu', 'thelanding' ),
			'menu-right' => esc_html__( 'Right Menu', 'thelanding' ),
			'menu-footer' => esc_html__( 'Footer', 'thelanding' ),
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


add_action( 'admin_footer', 'my_custom_fonts' );

function my_custom_fonts() {
	echo '<style>
	  .wp-block { max-width: 1100px; };
	  .edit-post-visual-editor p,
	  .edit-post-visual-editor,
	  .blocks-rich-text__tinymce.mce-content-body {
		line-height: inherit;
		font-size: inherit;
	  }
	  .editor-styles-wrapper .mce-content-body { line-height: inherit; }
	  .wp-block {
		max-width: 1200px;
	  }

	  .block-editor-writing-flow {
		padding-left: 3rem;
	  }

  </style>';
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thelanding_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thelanding_content_width', 640 );
}
add_action( 'after_setup_theme', 'thelanding_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function thelanding_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'thelanding' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'thelanding' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'thelanding_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function thelanding_scripts() {
	wp_enqueue_style( 'thelanding-style', get_stylesheet_uri(), array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'thelanding_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';
add_theme_support( 'title-tag' );
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

/**
 * Custom blocks using ACF.
 */
require get_template_directory() . '/inc/blocks.php';

add_filter( 'the_content', 'marsha_shortcode_strip_empty_paragraph' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function marsha_shortcode_strip_empty_paragraph( $content ) {

	$array = array(
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']'
	);
	return strtr( $content, $array );

}

function thelanding_map($atts, $content = null)
{
	$data = shortcode_atts(array(
		'url' => '',
		'src' => '',
		'height' => '500px',
		'width' => '100%',
		'tour' => false,
		'title' => '',
		'button_text' => '',
		'button_url' => '',
		'full_width' => '',
		'anchor' => '',

	), $atts);

	if (strpos($data['url'], '#') !== false) {
		$pieces = explode("#", esc_url($data['url']));
		$url = $pieces[0] . '&tbh#?fh/' . $pieces[1];
	} else {
		$url = $data['url'];
	}

	// https://map.concept3d.com/?id=1323&sbh&tbh#!m/377967
	return '<iframe x-ref="map" id="map" class="w-full min-h-160" src="' . $url . '" frameborder="0" scrolling="no" border="0" allow="geolocation"></iframe>';
}
add_shortcode('thelanding_map', 'thelanding_map');


class Marsha_Toggles
{
	private $header_tag = null;

	public function __construct() {
		add_shortcode( 'efstoggles', [ $this, 'mu_toggles' ] );
		add_shortcode( 'efstoggle', [ $this, 'mu_toggle' ] );
		add_shortcode( 'mu_toggles', [ $this, 'mu_toggles' ] );
		add_shortcode( 'mu_toggle', [ $this, 'mu_toggle' ] );
	}

	public function mu_toggles( $atts, $content = null ) {

		$data = shortcode_atts(
			array(
				'spaced' 	 => true,
				'header_tag' => null,
				'class' 	 => ''
			),
			$atts
		);

		if ( $data['header_tag'] ) {
			$this->header_tag = $data['header_tag'];
		} else {
			$this->header_tag = 'div';
		}

		if ($data['spaced'] == true) {
			$spacing_class = " my-6 ";
		} else {
			$spacing_class = " mt-3 ";
		}

		$html = sprintf(
			'<div class="%s %s">
			%s
			</div>',
			esc_attr( $spacing_class ),
			esc_attr( $data['class'] ),
			do_shortcode( $content )
		);

		return $html;
	}

	public function mu_toggle( $atts, $content = null ) {

		$data = shortcode_atts(
			array(
				'id' 	 => '',
				'title'  => 'title',
				'active' => false,
				'solo' 	 => false,
			),
			$atts
		);

		if ( $data['active'] ) {
			$open = 'true';
		} else {
			$open = 'false';
		}
		if ( $data['solo'] == true ) {
			$opening_div = '<div id="' . $id . '" class="accordion '. $class . ' mb-4" x-data="{ toggleOpen: ' . $open . ' }" x-on:click.away="toggleOpen = false">';
		} else {
			$opening_div = '<div id="' . $id . '" class="accordion '. $class . ' mb-4" x-data="{ toggleOpen: ' . $open . ' }">';
		}

		$html = sprintf(
			'%s
			<div class="flex justify-between bg-gray-100 text-gray-800 items-center cursor-pointer group bg-green text-white" x-on:click="toggleOpen = !toggleOpen">
			<%s class="accordion-title py-4 px-4 text-base font-semibold tracking-wide">%s</%s>
			<div class="py-4 px-4">
			<svg aria-hidden="true" :class="{ \'hidden\' : !toggleOpen}" class="text-gray-700 hidden h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
			<svg aria-hidden="true" :class="{ \'hidden\' : toggleOpen}" class="text-gray-700 h-4 w-4 fill-current"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
			</div>
			</div>
			<div class="bg-white border border-gray-100 border-t-0 rounded-b text-gray-700 px-6 py-6 hidden" :class="{ \'hidden\' : !toggleOpen}">
			%s
			</div>
			</div>',
			$opening_div,
			$this->header_tag,
			esc_attr( $data['title'] ),
			$this->header_tag,
			do_shortcode( $content )
		);

		return $html;


	}

}

new Marsha_Toggles();

function mu_gallery($atts, $content = null)
{
	$data = shortcode_atts(array(
		'src' => '',
		'alt' => '',
		'class' => '',
		'description' => ''
	), $atts);

	$output = '<div class="flex flex-wrap lg:-mx-4">';
	$output .= do_shortcode( $content );
	$output .= '</div>';
	return $output;
}
add_shortcode( 'mu_gallery', 'mu_gallery');

function mu_gallery_modal($atts, $content = null)
{
	$data = shortcode_atts(array(
		'src' => '',
		'alt' => '',
		'class' => '',
		'description' => '',
		'per_row' => 3
	), $atts);

	if ( $data['per_row'] < 3 ) {
		$data['per_row'] = 3;
	} elseif ( $data['per_row'] > 5 ) {
		$data['per_row'] = 5;
	}

	$output = '<div class="w-full lg:w-1/' . esc_attr( $data['per_row'] ) . ' lg:px-4 my-4">';
	$output .= '<div x-data="{ imgModal : false, imgModalSrc : \'\', imgModalDesc : \'\' }">';
	$output .= '<template @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc; imgModalDesc = $event.detail.imgModalDesc;" x-if="imgModal">';
	$output .= '<div x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" x-on:click.away="imgModalSrc = \'\'" class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center bg-black-overlay-20">';
	$output .= '<div @click.away="imgModal = \'\'" class="flex flex-col max-w-3xl max-h-full overflow-auto">';
	$output .= '<div class="z-50">';
	$output .= '<button @click="imgModal = \'\'" class="float-right pt-2 pr-2 outline-none focus:outline-none">';
	$output .= '<svg class="fill-current text-white " xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">';
	$output .= '<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">';
	$output .= '</path>';
	$output .= '</svg>';
	$output .= '</button>';
	$output .= '</div>';
	$output .= '<div class="p-2">';
	$output .= '<img loading="lazy" :alt="imgModalSrc" class="object-contain h-1/2-screen" :src="imgModalSrc">';
	$output .= '<p x-text="imgModalDesc" class="text-center text-white"></p>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</template>';
	$output .= '</div>';
	$output .= '<div x-data="{}">';
	$output .= '<img x-on:click="$dispatch(\'img-modal\', {  imgModalSrc: \'' . esc_url( $data['src'] ) . '\', imgModalDesc: \'' . esc_attr( $data['description'] ) . '\' })" src="' . esc_url( $data['src'] ) . '" alt="' . esc_attr( $data['alt'] ) . '" class="cursor-pointer ' . esc_attr( $data['class'] ) . '" />';
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode( 'mu_gallery_modal', 'mu_gallery_modal');
