<?php
/**
 * Template Name: Full Width
 *
 * @category Page_Templates
 * @package  CannaBizTheme
 * @author   CannaBiz Software <hello@cannabiz.pro>
 * @license  GPL v2
 * @link     https://cannabiz.pro
 */

get_header(); ?>

<div id="primary" class="col-lg-12 content-area">
    <main id="main" class="site-main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'page' ); ?>

    <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
