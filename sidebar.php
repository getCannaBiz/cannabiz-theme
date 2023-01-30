<?php
/**
 * The sidebar containing the main widget area.
 *
 * @category Main_Templates
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <hello@cannabiz.pro>
 * @license  GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<?php do_action( 'cannabiz_sidebar_before' ); ?>

<div id="secondary" class="col-lg-4 widget-area" role="complementary">
  <?php do_action( 'cannabiz_sidebar_inside_top' ); ?>

    <?php
    if ( 'products' == get_post_type() ) {
        dynamic_sidebar( 'sidebar-products' );
    }
    ?>

    <?php dynamic_sidebar( 'sidebar-1' ); ?>

    <?php do_action( 'cannabiz_sidebar_inside_bottom' ); ?>
</div><!-- #secondary -->

<?php do_action( 'cannabiz_sidebar_after' ); ?>