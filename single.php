<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CannaBiz
 */

get_header(); ?>

    <div id="primary" class="col-lg-8 content-area">
        <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php do_action( 'cannabiz_single_before' ); ?>
            <?php get_template_part( 'template-parts/content', 'single' ); ?>
            <?php do_action( 'cannabiz_single_after' ); ?>

            <?php if ( comments_open() || get_comments_number() ) { ?>
            <div class="comments">
                <?php do_action( 'cannabiz_single_comments_before' ); ?>
                <?php comments_template(); ?>
                <?php do_action( 'cannabiz_single_comments_after' ); ?>
            </div><!-- .comments -->
            <?php } ?>

        <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
