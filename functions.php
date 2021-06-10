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
		'footer'  => esc_html__( 'Footer Menu', 'cannabiz' ),
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

function wp_dispensary_sidebars() {
	if ( class_exists( 'WP_Dispensary' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Products', 'cannabiz' ),
			'id'            => 'sidebar-products',
			'description'   => 'Displays at top of the single products sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'wp_dispensary_sidebars' );

/**
 * Enqueue scripts and styles.
 */
function cannabiz_scripts() {
	wp_enqueue_style( 'cannabiz-main', get_stylesheet_uri() );
	wp_enqueue_style( 'cannabiz-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'cannabiz-style', get_template_directory_uri() . '/css/cannabiz.min.css' );
	wp_enqueue_style( 'cannabiz-fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css' );

	wp_enqueue_script( 'cannabiz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), time(), true );
	wp_enqueue_script( 'cannabiz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), time(), true );
	wp_enqueue_script( 'cannabiz-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), time(), true );
	wp_enqueue_script( 'cannabiz-hoverIntent', get_template_directory_uri() . '/js/hoverIntent.min.js', array(), time(), true );
	wp_enqueue_script( 'cannabiz-js', get_template_directory_uri() . '/js/cannabiz.min.js', array(), time(), true );

	if( class_exists( 'WP_Dispensary' ) ) {
		wp_enqueue_script( 'cannabiz-wpd-js', get_template_directory_uri() . '/js/wp-dispensary.js', array(), time(), true );
	}

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

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );

// Add WooCommerce Product Gallery Support.
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/**
 * Custom PayPal button text
 */
function cannabiz_paypal_button( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Proceed to PayPal' :
		$translated_text = __( 'Pay Now!', 'cannabiz' );
		break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'cannabiz_paypal_button', 20, 3 );

/**
 * Add "CannaBiz" submenu to WPD admin menu
 */
function wpd_cannabiz_submenu_page() {
	add_submenu_page( 'wpd-settings', 'Customizer', 'Customizer', 'manage_options', 'customize.php', NULL );
}
add_action( 'admin_menu', 'wpd_cannabiz_submenu_page', 9 );

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
		'large_page_title',
		__( 'Large Page Title', 'cannabiz' ),
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
		<label for="page_title"><?php _e( 'Display', 'cannabiz' ); ?> <span class="muted-text"><?php _e( '(overrides Customizer setting)', 'cannabiz' ); ?></span></label>
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

/**
 * Custom login form styles.
 * 
 * @since 2.5
 */
function cannabiz_login_logo() {

	if ( '' != get_theme_mod( 'cannabiz_logo' ) ) { ?>
		<style type="text/css">

			body.login {
				background-color: #<?php echo get_theme_mod( 'background_color' ); ?>;
			}

			body.login form {
	    		padding-bottom: 32px;
			}

			body.login a,
			body.login a:visited,
			body.login a:focus,
			body.login a:active,
			body.login #backtoblog a,
			body.login #nav a {
				color: <?php echo get_theme_mod( 'cannabiz_link_color' ); ?>;
			}

			body.login #backtoblog a:hover,
			body.login #nav a:hover,
			body.login h1 a:hover,
			body.login #backtoblog a:focus,
			body.login #nav a:focus,
			body.login h1 a:focus {
				color: <?php echo get_theme_mod( 'cannabiz_link_hover_color' ); ?>;
			}

			body.login #login {
				padding-top: 48px;
			}

			#login h1 a,
			.login h1 a {
				background-size: auto;
				background-image: none;
				background-position: center center;
				text-indent: 0;
				width: auto;
				height: auto;
				max-width: 320px;
			}

			#login h1 a img,
			.login h1 a img {
			    max-width: 100%;
			}

			body.login.wp-core-ui .button-primary {
				background-color: <?php echo get_theme_mod( 'cannabiz_button_color' ); ?>;
				border-color: <?php echo get_theme_mod( 'cannabiz_button_color' ); ?>;
				box-shadow: none;
				text-shadow: none;
				color: <?php echo get_theme_mod( 'cannabiz_button_text_color' ); ?>;
				width: 100%;
				margin-top: 16px;
				padding: 6px 12px 6px 12px;
				height: auto;
				font-size: 16px;
			}
			body.login.wp-core-ui .button-primary:hover {
				background-color: <?php echo get_theme_mod( 'cannabiz_button_hover_color' ); ?>;
				border-color: <?php echo get_theme_mod( 'cannabiz_button_hover_color' ); ?>;
				box-shadow: none;
				text-shadow: none;
				color: <?php echo get_theme_mod( 'cannabiz_button_hover_text_color' ); ?>;
			}
		</style>
	<?php }
}
add_action( 'login_enqueue_scripts', 'cannabiz_login_logo' );

/**
 * Custom login form logo link.
 * 
 * @since 2.5
 */
function cannabiz_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'cannabiz_login_logo_url' );

/**
 * Custom login form logo link title.
 * 
 * @since 2.5
 */
function my_login_logo_url_title() {
	return get_bloginfo( 'title' );
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
 * Custom login form logo link title.
 * 
 * Requires WordPress v5.2+ in order to use the login_headertext filter
 * 
 * @since 2.5
 */
function cannabiz_login_logo_image( $login_header_text ) {

	$login_header_text = $login_header_text;

	if ( '' != get_theme_mod( 'cannabiz_logo' ) ) {
		$login_header_text = '';
		$logo_url          = get_theme_mod( 'cannabiz_logo' );
		$login_header_text = '<img src="' . $logo_url . '" alt="' . get_bloginfo( 'title' ) . '" />';
	}

	return $login_header_text;

}

// Add filter if WP version is 5.2+
if ( 5.2 >= get_bloginfo( 'version' ) ) {
	add_filter( 'login_headertext', 'cannabiz_login_logo_image' );
}

/**
 * Check if WooCommerce is activated
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}