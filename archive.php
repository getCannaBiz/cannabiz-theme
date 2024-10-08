<?php
/**
 * The template for displaying archive pages.
 *
 * @category Main_Templates
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <hello@cannabiz.pro>
 * @license GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div id="primary" class="col-lg-8 content-area">
    <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <?php
            /**
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'template-parts/content', get_post_format() );
            ?>

        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>

    <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
