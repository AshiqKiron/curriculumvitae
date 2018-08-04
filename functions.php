<?php
/**
 * curriculumvitae functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package curriculumvitae
 */

if ( ! function_exists( 'curriculumvitae_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function curriculumvitae_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on curriculumvitae, use a find and replace
		 * to change 'curriculumvitae' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'curriculumvitae', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*Allows to link a custom stylesheet file to the TinyMCE visual editor.*/
		add_editor_style();

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'curriculumvitae' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'curriculumvitae_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 100,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'curriculumvitae_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function curriculumvitae_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'curriculumvitae_content_width', 640 );
}
add_action( 'after_setup_theme', 'curriculumvitae_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function curriculumvitae_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'curriculumvitae' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'curriculumvitae' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'curriculumvitae' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add Blog Sidebar widgets here.', 'curriculumvitae' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'curriculumvitae' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add Footer Sidebar widgets here.', 'curriculumvitae' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page Footer', 'curriculumvitae' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add Footer widgets for Pages here.', 'curriculumvitae' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Frontpage', 'curriculumvitae' ),
		'id'            => 'frontpage-1',
		'description'   => esc_html__( 'Add Frontpage widgets here.', 'curriculumvitae' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'curriculumvitae_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function curriculumvitae_scripts() {
	wp_enqueue_style( 'curriculumvitae-style', get_stylesheet_uri() );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'curriculumvitae-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'curriculumvitae-js', get_template_directory_uri() . '/js/curriculamvitae.js', array(), '20151215', true );
	wp_enqueue_script( 'curriculumvitae-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'curriculumvitae_scripts' );



//google font enqueue
function curriculumvitae_google_fonts() {
	$query_args = array(
		'family' => 'Lora:100,300,400,latin-ext',
	);
	wp_enqueue_style( 'curriculumvitae_google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
    }
            
add_action('wp_enqueue_scripts', 'curriculumvitae_google_fonts'); 



/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'More' link.
 */
function curriculumvitae_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'More<span class="screen-reader-text"> "%s"</span>', 'curriculumvitae' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'curriculumvitae_excerpt_more' );



/**
 * Load theme upsell
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/trt-customize-pro/example-1/class-customize.php' );


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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer/customizer-function.php';


/**
 * Frontpage widgets
 */
require get_template_directory() . '/inc/widgets/front-intro-one.php';
require get_template_directory() . '/inc/widgets/front-education-one.php';
require get_template_directory() . '/inc/widgets/front-blog.php';
require get_template_directory() . '/inc/defaults.php';

