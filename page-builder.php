<?php
/**
 * Template Name: Builder
 *
 * @category Main_Templates
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <hello@cannabiz.pro>
 * @license GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
