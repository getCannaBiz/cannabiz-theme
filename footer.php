<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CannaBiz
 */

?>
			</div><!-- .row -->
		</div><!-- .container -->
	<?php do_action( 'cannabiz_content_inside_bottom' ); ?>
	</div><!-- #content -->
	<?php do_action( 'cannabiz_content_after' ); ?>

	<?php
	$cannabizsliderbottom = get_theme_mod( 'cannabiz_home_slider_bottom' );
	if ( is_front_page() ) {
			echo do_shortcode( $cannabizsliderbottom );
	}
	?>

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
					<?php if ( '' != get_theme_mod( 'cannabiz_copyright' ) ) { ?>
						<?php echo get_theme_mod( 'cannabiz_copyright' ); ?>
					<?php } else { ?>
						&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php printf( esc_html__( '%s', 'cannabiz' ), 'Powered by ' ); ?>
						<?php printf( esc_html__( '%1$s', 'cannabiz' ), '<a href="https://www.wpdispensary.com/" rel="WP Dispensary - WordPress Marijuana Plugin">WP Dispensary</a>' ); ?>
					<?php } ?>
					<?php
						$cannabiz_footer_designedby = '';
						echo apply_filters( 'cannabiz_footer_designedby', $cannabiz_footer_designedby );
					?>
				</div><!-- .col-lg-6.copyright -->
				<div class="col-lg-6 menu">
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
