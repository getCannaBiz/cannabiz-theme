<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @category Main_Templates
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <hello@cannabiz.pro>
 * @license GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div id="primary" class="col-lg-8 content-area">
    <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

        <?php if ( is_home() && ! is_front_page() ) : ?>
            <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
        <?php endif; ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

        <?php endwhile; ?>

        <?php
        // Previous/next page navigation.
        the_posts_pagination(
            array(
              'prev_text'          => esc_attr__( '<i class="fas fa-chevron-left"></i>', 'cannabiz' ),
              'next_text'          => esc_attr__( '<i class="fas fa-chevron-right"></i>', 'cannabiz' ),
              'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_attr__( 'Page', 'cannabiz' ) . ' </span>',
            )
        );
        ?>

    <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
