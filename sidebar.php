<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CannaBiz
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php do_action( 'cannabiz_sidebar_before' ); ?>
<div id="secondary" class="col-lg-4 widget-area" role="complementary">
	<?php do_action( 'cannabiz_sidebar_inside_top' ); ?>

	<?php if ( 'products' == get_post_type() ) { dynamic_sidebar( 'sidebar-products' ); } ?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<?php do_action( 'cannabiz_sidebar_inside_bottom' ); ?>
</div><!-- #secondary -->
<?php do_action( 'cannabiz_sidebar_after' ); ?>