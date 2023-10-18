<?php
/**
 * The template for displaying all single posts.
 *
 * @category Single_Templates
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <contact@cannabiz.software>
 * @license  GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

    <div id="primary" class="col-lg-8 content-area">
        <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/products', 'single' ); ?>

            <?php if ( comments_open() || get_comments_number() ) { ?>
            <div class="comments">
                <?php comments_template(); ?>
            </div><!-- .comments -->
            <?php } ?>

        <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar( 'products' ); ?>
<?php get_footer(); ?>
