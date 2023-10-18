<?php
/**
 * Template part for displaying results in search pages.
 *
 * @category Template_Parts
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <contact@cannabiz.software>
 * @license  GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink(); ?>" class="featured-image"><?php the_post_thumbnail( 'wpd-small' ); ?></a>
    <?php } ?>
    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <div class="entry-meta">
            <?php cannabiz_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
</article><!-- #post-## -->
