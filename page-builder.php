<?php
/**
 * Template Name: Builder
 *
 * @category Page_Templates
 * @package  CannaBizTheme
 * @author   CannaBiz Software <hello@cannabiz.pro>
 * @license  GPL v2
 * @link     https://cannabiz.pro
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
