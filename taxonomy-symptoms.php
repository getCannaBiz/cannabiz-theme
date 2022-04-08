<?php
/**
 * The template for displaying the Effects taxonomy archive.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CannaBiz
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
				'prev_text'          => __( '<i class="fas fa-chevron-left"></i>', 'cannabiz' ),
				'next_text'          => __( '<i class="fas fa-chevron-right"></i>', 'cannabiz' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cannabiz' ) . ' </span>',
			) );
			?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
