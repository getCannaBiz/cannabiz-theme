<?php
/**
 * Template part for displaying single posts.
 *
 * @package CannaBiz
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { ?>
		<?php the_post_thumbnail( 'large-image' ); ?>
	<?php } ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="entry-meta">
			<?php cannabiz_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cannabiz' ),
				'after'  => '</div>',
			) );
		?>
		<?php cannabiz_product_footer(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php cannabiz_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

