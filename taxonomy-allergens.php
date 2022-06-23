<?php
/**
 * The template for displaying the Allergens taxonomy archive.
 *
 * @category Taxonomies
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <hello@cannabiz.pro>
 * @license GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

    <div id="primary" class="col-lg-12 content-area">
        <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/taxonomy' ); ?>

            <?php endwhile; ?>

            <?php 
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => esc_attr__( '<i class="fas fa-chevron-left"></i>', 'cannabiz' ),
                'next_text'          => esc_attr__( '<i class="fas fa-chevron-right"></i>', 'cannabiz' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_attr__( 'Page', 'cannabiz' ) . ' </span>',
            ) );
            ?>

        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
