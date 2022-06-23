<?php
/**
 * The template for displaying 404 pages (not found).
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

      <section class="error-404 not-found hentry">
        <div class="entry-content">
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below?', 'cannabiz' ); ?></p>

            <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

            <?php if ( cannabiz_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
            <div class="widget widget_categories">
                <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'cannabiz' ); ?></h2>
                <ul>
                    <?php
                        wp_list_categories(
                            array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 10,
                            )
                        );
                    ?>
                </ul>
            </div><!-- .widget -->
            <?php endif; ?>

            <?php
            /* translators: %1$s: smiley */
            $archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'cannabiz' ), convert_smilies( ':)' ) ) . '</p>';
            the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
            ?>

            <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

        </div><!-- .entry-content -->
      </section><!-- .error-404 -->

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
