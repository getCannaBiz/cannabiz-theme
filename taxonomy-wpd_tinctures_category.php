<?php
/**
 * The template for displaying Tinctures archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CannaBiz
 */

get_header(); ?>

	<div id="primary" class="col-lg-12 content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/dispensary', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php 
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( '<i class="fa fa-chevron-left"></i>', 'cannabiz' ),
				'next_text'          => __( '<i class="fa fa-chevron-right"></i>', 'cannabiz' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cannabiz' ) . ' </span>',
			) );
			?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
