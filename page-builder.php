<?php
/**
 * Template Name: Builder
 *
 * @category Page Templates
 * @author   CannaBiz Software
 * @license  GPL v2
 * @package  CannaBiz
 * @link     https://cannabiz.pro
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
