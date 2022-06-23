<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and
 * everything up until <div id="content">
 *
 * @category Main_Templates
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <hello@cannabiz.pro>
 * @license GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if IE]>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie.css" />
<![endif]-->

<?php wp_head(); ?>

<?php if ( 'on' === get_theme_mod( 'cannabiz_stickyhead' ) || '' === get_theme_mod( 'cannabiz_stickyhead' ) ) { ?>
<script>
    jQuery(document).ready(function ($) {
        $('.site-header').scrollToFixed();
  });
</script>
<?php } ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cannabiz' ); ?></a>
    <?php if ( 'show' === get_theme_mod( 'cannabiz_topbar' ) || '' === get_theme_mod( 'cannabiz_topbar' ) ) { ?>
        <?php do_action( 'cannabiz_topbar_before' ); ?>
        <div class="topbar">
            <?php do_action( 'cannabiz_topbar_inside_top' ); ?>
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <p>
                    <?php do_action( 'cannabiz_topbar_inside_before_email' ); ?>
                    <?php if ( 'show' === get_theme_mod( 'cannabiz_topbar_email' ) || '' === get_theme_mod( 'cannabiz_topbar_email' ) ) { ?>
                        <span class="topbar-email"><a href="mailto:<?php echo get_theme_mod( 'cannabiz_topbar_email_address' ); ?>"><i class="far fa-envelope" aria-hidden="true"></i> <span class="mobilehide"><?php echo get_theme_mod( 'cannabiz_topbar_email_address' ); ?></span></a></span>
                    <?php } ?>
                    <?php do_action( 'cannabiz_topbar_inside_before_phone' ); ?>
                    <?php if ( 'show' === get_theme_mod( 'cannabiz_topbar_phone' ) || '' === get_theme_mod( 'cannabiz_topbar_phone' ) ) { ?>
                        <span class="topbar-phone"><a href="tel:<?php echo get_theme_mod( 'cannabiz_topbar_phone_number' ); ?>"><i class="fas fa-phone" aria-hidden="true"></i> <span class="mobilehide"><?php echo get_theme_mod( 'cannabiz_topbar_phone_number' ); ?></span></a></span>
                    <?php } ?>
                    <?php do_action( 'cannabiz_topbar_inside_before_social' ); ?>
                    <?php if ( 'show' === get_theme_mod( 'cannabiz_topbar_social' ) || '' === get_theme_mod( 'cannabiz_topbar_social' ) ) { ?>
                        <span class="topbar-social"><?php cannabiz_social_icons(); ?></span>
                    <?php } ?>
                    <?php do_action( 'cannabiz_topbar_inside_after_social' ); ?>
                </p>
                </div><!-- .col-lg-12 -->
            </div><!-- .row -->
            </div><!-- .container -->
            <?php do_action( 'cannabiz_topbar_inside_bottom' ); ?>
        </div><!-- .topbar -->
        <?php do_action( 'cannabiz_topbar_after' ); ?>
    <?php } ?>

    <?php do_action( 'cannabiz_header_before' ); ?>
    <header id="masthead" class="site-header" role="banner">
        <?php do_action( 'cannabiz_header_inside_top' ); ?>
        <div class="menu-toggle">
            <span><i class="fas fa-bars"></i><?php esc_html_e( 'Menu', 'cannabiz' ); ?></span>
            <span class="menu-close"><i class="fas fa-times"></i><?php esc_html_e( 'Close menu', 'cannabiz' ); ?></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-branding">
                    <?php do_action( 'cannabiz_logo_before' ); ?>
                    <?php if ( '' != get_theme_mod( 'cannabiz_logo' ) ) { ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'cannabiz_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
                    <?php } else { ?>
                        <?php if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                        <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                        <?php endif; ?>
                        <?php if ( 'show' === get_theme_mod( 'cannabiz_blogdescription' ) || '' === get_theme_mod( 'cannabiz_blogdescription' ) ) { ?>
                        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                        <?php } ?>
                    <?php } ?>
                    <?php do_action( 'cannabiz_logo_after' ); ?>
                    </div><!-- .site-branding -->
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <?php do_action( 'cannabiz_navigation_before' ); ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => false, ) ); ?>
                        <?php do_action( 'cannabiz_navigation_after' ); ?>
                    </nav><!-- #site-navigation -->
                </div><!-- .col-lg-12 -->
            </div><!-- .row -->
        </div><!-- .container -->
        <?php do_action( 'cannabiz_header_inside_bottom' ); ?>
    </header><!-- #masthead -->
    <?php do_action( 'cannabiz_header_after' ); ?>
    
    <?php cannabiz_title_large(); ?>

    <?php do_action( 'cannabiz_content_before' ); ?>
    <div id="content" class="site-content">
    <?php do_action( 'cannabiz_content_inside_top' ); ?>
        <div class="container">
            <div class="row">