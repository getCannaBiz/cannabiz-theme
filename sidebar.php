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

<div id="secondary" class="col-lg-4 widget-area" role="complementary">
	<?php if ( 'flowers' == get_post_type() ) { dynamic_sidebar( 'sidebar-flowers' ); } ?>
	<?php if ( 'concentrates' == get_post_type() ) { dynamic_sidebar( 'sidebar-concentrates' ); } ?>
	<?php if ( 'edibles' == get_post_type() ) { dynamic_sidebar( 'sidebar-edibles' ); } ?>
	<?php if ( 'prerolls' == get_post_type() ) { dynamic_sidebar( 'sidebar-prerolls' ); } ?>
	<?php if ( 'topicals' == get_post_type() ) { dynamic_sidebar( 'sidebar-topicals' ); } ?>
	<?php if ( 'growers' == get_post_type() ) { dynamic_sidebar( 'sidebar-growers' ); } ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
