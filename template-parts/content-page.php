<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @category Template_Parts
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <hello@cannabiz.pro>
 * @license GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
    <?php if ( 'show' !== get_theme_mod( 'cannabiz_pages_show_title' ) && ! get_post_meta( get_the_ID(), 'page_title', true ) ) { ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php } ?>
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cannabiz' ),
                'after'  => '</div>',
            ) );
            ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->
