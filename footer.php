<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @category Main_Templates
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <hello@cannabiz.pro>
 * @license GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */
?>
        </div><!-- .row -->
    </div><!-- .container -->
    <?php do_action( 'cannabiz_content_inside_bottom' ); ?>
    </div><!-- #content -->
    <?php do_action( 'cannabiz_content_after' ); ?>

    <?php do_action( 'cannabiz_footer_before' ); ?>
    <footer id="colophon" class="site-footer" role="contentinfo">
        <?php do_action( 'cannabiz_footer_inside_top' ); ?>
        <div class="container">
        <?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
            <div class="row widgets">
                <div class="col-lg-3 widget">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div><!-- .col-lg-3.widget -->
                <div class="col-lg-3 widget">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div><!-- .col-lg-3.widget -->
                <div class="col-lg-3 widget">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div><!-- .col-lg-3.widget -->
                <div class="col-lg-3 widget">
                    <?php dynamic_sidebar( 'footer-4' ); ?>
                </div><!-- .col-lg-3.widget -->
            </div><!-- .row -->
        <?php } ?>
            <div class="row bottom">
                <div class="col-lg-6 copyright">
                    <?php do_action( 'cannabiz_footer_inside_copyright_top' ); ?>
                    <?php if ( '' != get_theme_mod( 'cannabiz_copyright' ) ) { ?>
                        <?php echo get_theme_mod( 'cannabiz_copyright' ); ?>
                    <?php } else { ?>
                        &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>.
                        <?php printf( esc_html__( 'Powered by %1$s', 'cannabiz' ), '<a href="https://cannabiz.pro/" rel="cannabis software">CannaBiz Software, LLC</a>' ); ?>
                    <?php }
                    // Filter to add custom footer content after the copyright.
                    echo apply_filters( 'cannabiz_footer_designedby', '' );
                    ?>
                    <?php do_action( 'cannabiz_footer_inside_copyright_bottom' ); ?>
                </div><!-- .col-lg-6.copyright -->
                <div class="col-lg-6 menu">
                    <?php do_action( 'cannabiz_footer_inside_menu_top' ); ?>
                    <?php if ( 'show' === get_theme_mod( 'cannabiz_footer_menu' ) || '' === get_theme_mod( 'cannabiz_footer_menu' ) ) {
                        $footermenu = wp_nav_menu(
                            array(
                                'depth'          => 1,
                                'theme_location' => 'footer',
                                'menu_id'        => 'footer-menu',
                                'fallback_cb'    => false,
                                'container'      => false,
                            )
                        );
                        if ( ! empty( $menu ) ) :
                            echo $menu;
                        endif;
                    } ?>
                    <?php if ( 'show' === get_theme_mod( 'cannabiz_footer_social' ) ) { ?>
                        <span class="footer-social"><?php cannabiz_social_icons(); ?></span>
                    <?php } ?>
                    <?php do_action( 'cannabiz_footer_inside_menu_bottom' ); ?>
                </div><!-- .col-lg-6.menu -->
            </div><!-- .row -->
        </div><!-- .container -->
        <?php do_action( 'cannabiz_footer_inside_bottom' ); ?>
    </footer><!-- #colophon -->
    <?php do_action( 'cannabiz_footer_after' ); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
