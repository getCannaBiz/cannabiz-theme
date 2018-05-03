<?php
/**
 * Template Name: Builder
 *
 * @package CannaBiz
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
