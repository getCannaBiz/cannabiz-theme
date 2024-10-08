<?php
/**
 * Template part for displaying single products.
 *
 * @category Template_Parts
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <hello@cannabiz.pro>
 * @license GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( has_post_thumbnail() ) { ?>
        <?php the_post_thumbnail( 'full' ); ?>
    <?php } ?>
    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <div class="entry-meta">
            <?php cannabiz_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php cannabiz_product_footer(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php cannabiz_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->

