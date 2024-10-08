<?php
/**
 * The template for displaying search results pages.
 *
 * @category Main_Templates
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <hello@cannabiz.pro>
 * @license GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<section id="primary" class="col-lg-8 content-area">
    <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'cannabiz' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header><!-- .page-header -->

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <?php
            // Content display.
            if ( null !== filter_input( INPUT_GET, 'post_type' ) ) {
                get_template_part( 'template-parts/products', 'search' );
            } else {
               get_template_part( 'template-parts/content', 'search' );
            }
            ?>

        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>

    <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>

    </main><!-- #main -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
