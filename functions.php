<?php
/**
 * CannaBiz functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CannaBiz
 */

if ( ! function_exists( 'cannabiz_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cannabiz_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on CannaBiz, use a find and replace
	 * to change 'cannabiz' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cannabiz', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'cannabiz' ),
		'footer' => esc_html__( 'Footer Menu', 'cannabiz' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cannabiz_custom_background_args', array(
		'default-color' => 'f1f1f1',
		'default-image' => '',
	) ) );

	// Create custom featured image size for the widget
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'large-image', 750, 350, true );
		add_image_size( 'dispensary-image', 360, 250, true );
	}

	// Adds theme support for wide and full Gutenberg blocks.
	add_theme_support( 'align-wide' );

	// Add custom Gutenberg Editor color palette.
	add_theme_support( 'editor-color-palette',
		'#EEEEEE',
		'#454545',
		get_theme_mod( 'cannabiz_link_color' ),
		get_theme_mod( 'cannabiz_link_hover_color' )
	);


}
endif;
add_action( 'after_setup_theme', 'cannabiz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cannabiz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cannabiz_content_width', 640 );
}
add_action( 'after_setup_theme', 'cannabiz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cannabiz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cannabiz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cannabiz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Flowers', 'cannabiz' ),
		'id'            => 'sidebar-flowers',
		'description'   => 'Displays at top of the sidebar in Flowers',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Concentrates', 'cannabiz' ),
		'id'            => 'sidebar-concentrates',
		'description'   => 'Displays at top of the sidebar in Concentrates',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Edibles', 'cannabiz' ),
		'id'            => 'sidebar-edibles',
		'description'   => 'Displays at top of the sidebar in Edibles',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Pre-rolls', 'cannabiz' ),
		'id'            => 'sidebar-prerolls',
		'description'   => 'Displays at top of the sidebar in Pre-rolls',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Topicals', 'cannabiz' ),
		'id'            => 'sidebar-topicals',
		'description'   => 'Displays at top of the sidebar in Topicals',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Growers', 'cannabiz' ),
		'id'            => 'sidebar-growers',
		'description'   => 'Displays at top of the sidebar in Growers',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer row #1', 'cannabiz' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer row #2', 'cannabiz' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer row #3', 'cannabiz' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer row #4', 'cannabiz' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'cannabiz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cannabiz_scripts() {
	wp_enqueue_style( 'cannabiz-main', get_stylesheet_uri() );
	wp_enqueue_style( 'cannabiz-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'cannabiz-style', get_template_directory_uri() . '/css/cannabiz.min.css' );

	wp_enqueue_style( 'cannabiz-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'cannabiz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20180709', true );
	wp_enqueue_script( 'cannabiz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20180709', true );
	wp_enqueue_script( 'cannabiz-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20180709', true );
	wp_enqueue_script( 'cannabiz-hoverIntent', get_template_directory_uri() . '/js/hoverIntent.min.js', array(), '20180709', true );
	wp_enqueue_script( 'cannabiz-js', get_template_directory_uri() . '/js/cannabiz.js', array(), '20180709', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cannabiz_scripts' );

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
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * WooCommerce theme integration
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'cannabiz_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'cannabiz_wrapper_end', 10 );

function cannabiz_wrapper_start() {
  echo '<div id="primary" class="col-lg-8 content-area">
		<main id="main" class="site-main" role="main">
		<section class="hentry">
		<div class="entry-content">';
}

function cannabiz_wrapper_end() {
  echo '</div>
		</section>
		</main>
		</div>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Add WooCommerce Product Gallery Support.
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/**
 * Custom PayPal button text
 */
add_filter( 'gettext', 'cannabiz_paypal_button', 20, 3 );
function cannabiz_paypal_button( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
	case 'Proceed to PayPal' :
	$translated_text = __( 'Pay Now!', 'cannabiz' );
break;
}
	return $translated_text;
}

/**
 * Add "CannaBiz" submenu to WPD admin menu
 */
add_action( 'admin_menu', 'wpd_cannabiz_submenu_page', 9 );
function wpd_cannabiz_submenu_page() {
	add_submenu_page( 'wpd-settings', 'CannaBiz', 'CannaBiz', 'manage_options', 'customize.php', NULL );
}

/**
 * Metabox to hide title on page-by-page basis
 */

function cannabiz_page_title( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function page_title_add_meta_box() {
	add_meta_box(
		'page_title-top-sellers',
		__( 'CannaBiz Page Title', 'wp-dispensary' ),
		'page_title_html',
		array ( 'page' ),
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'page_title_add_meta_box' );

function page_title_html( $post) {
	wp_nonce_field( '_page_title_nonce', 'page_title_nonce' ); ?>
	<style>span.muted-text {color: #ccc;}</style>
	<p>
		<input type="checkbox" name="page_title" id="page_title" value="add_page_title" <?php echo ( cannabiz_page_title( 'page_title' ) === 'add_page_title' ) ? 'checked' : ''; ?>>
		<label for="page_title"><?php _e( 'Display', 'wp-dispensary' ); ?> <span class="muted-text"><?php _e( '(overrides Customizer setting)', 'wp-dispensary' ); ?></span></label>
	</p><?php
}

function page_title_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['page_title_nonce'] ) || ! wp_verify_nonce( $_POST['page_title_nonce'], '_page_title_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['page_title'] ) )
		update_post_meta( $post_id, 'page_title', esc_attr( $_POST['page_title'] ) );
	else
		update_post_meta( $post_id, 'page_title', null );
}
add_action( 'save_post', 'page_title_save' );

/*
	Usage: cannabiz_page_title( 'page_title' )
*/
