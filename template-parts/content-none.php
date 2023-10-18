<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @category Template_Parts
 * @package  CannaBiz_Theme
 * @author   CannaBiz Software <contact@cannabiz.software>
 * @license  GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://codex.wordpress.org/Template_Hierarchy
 */

?>

<article class="hentry no-results not-found">
    <div class="entry-content">
        <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'cannabiz' ); ?></h1>
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'cannabiz' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

        <?php elseif ( is_search() ) : ?>

            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cannabiz' ); ?></p>
            <?php get_search_form(); ?>

        <?php else : ?>

            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cannabiz' ); ?></p>
            <?php get_search_form(); ?>

        <?php endif; ?>
    </div><!-- .page-content -->
</article><!-- .no-results -->
