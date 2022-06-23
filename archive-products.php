<?php
/**
 * The template for displaying the products archive.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CannaBiz
 */

get_header(); ?>

  <div id="primary" class="col-lg-12 content-area">
    <main id="main" class="site-main" role="main">

    <?php
    if ( have_posts() ) :

        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/dispensary', get_post_format() );
        endwhile;

        // Previous/next page navigation.
        the_posts_pagination(
            array(
                'prev_text'          => esc_attr__( '<i class="fas fa-chevron-left"></i>', 'cannabiz' ),
                'next_text'          => esc_attr__( '<i class="fas fa-chevron-right"></i>', 'cannabiz' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_attr__( 'Page', 'cannabiz' ) . ' </span>',
            )
        );

    else :
        get_template_part( 'template-parts/content', 'none' );  
    endif;
    ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
