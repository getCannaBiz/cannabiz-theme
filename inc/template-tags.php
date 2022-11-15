<?php
/**
 * Custom template tags for this theme.
 *
 * @package CannaBiz
 */

if ( ! function_exists( 'cannabiz_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post's comments, category, author and prices for WP Dispensary products.
 */
function cannabiz_posted_on() {

    if ( 'post' === get_post_type() ) {
        if ( 'show' === get_theme_mod( 'cannabiz_posts_show_comments' ) || '' === get_theme_mod( 'cannabiz_posts_show_comments' ) ) {
            if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
                echo '<span class="comments-link"><i class="fas fa-comments"></i> ';
                comments_popup_link( esc_html__( '0 Comments', 'cannabiz' ), esc_html__( '1 Comment', 'cannabiz' ), esc_html__( '% Comments', 'cannabiz' ) );
                echo '</span>';
            }
        }
        if ( 'show' === get_theme_mod( 'cannabiz_posts_show_author' ) || '' === get_theme_mod( 'cannabiz_posts_show_author' ) ) {
            echo '<span class="author-link"><i class="fas fa-user"></i> ' . get_the_author_link( get_the_id() ) .'</span>';
        }
    }

    /**
     * Display product price
     * 
     * This will output WPD prices on the products archive and specific taxonomies
     */
    if ( is_post_type_archive( 'products' ) || is_tax(
        array(
            'aromas',
            'flavors',
            'effects',
            'conditions',
            'symptoms',
            'vendors',
            'allergens',
            'wpd_categories',
            'strain_types',
            'shelf_types'
        )
    ) ) {
        echo wpd_all_prices_simple( get_the_id(), NULL );
    }

    /**
     * Link - Edit
     */
    edit_post_link(
        sprintf(
            /* translators: %s: Name of current post */
            esc_html__( 'Edit %s', 'cannabiz' ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ),
        '<span class="edit-link"><i class="fas fa-pencil-alt"></i> ',
        '</span>'
    );

}
endif;

if ( ! function_exists( 'cannabiz_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the entry.
 */
function cannabiz_entry_footer() {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {

        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );

        $posted_on = sprintf(
            esc_html_x( '%s', 'post date', 'cannabiz' ), $time_string
        );

        if ( 'show' === get_theme_mod( 'cannabiz_posts_show_date' ) || null === get_theme_mod( 'cannabiz_posts_show_date' ) ) {
            echo '<span class="posted-on"><i class="far fa-calendar"></i> ' . $posted_on . '</span>'; // WPCS: XSS OK.
        }
        if ( 'show' === get_theme_mod( 'cannabiz_posts_show_category' ) || '' === get_theme_mod( 'cannabiz_posts_show_category' ) ) {
            echo '<span class="category-link">' . get_the_category_list( ' ', get_the_id() ) .'</span>';
        }
    } elseif ( 'products' === get_post_type() ) {
        global $post;
        
        if ( ! comments_open() ) {
            echo '<span></span> &nbsp;'; // No Comments.
        } else {
            echo '<span class="dispensary-comments"><i class="fas fa-comments"></i> ';
            echo comments_popup_link( esc_html__( '0', 'cannabiz' ), esc_html__( '1', 'cannabiz' ), esc_html__( '%', 'cannabiz' ) );
            echo '</span>'; // WPCS: XSS OK.
        }
        if ( 'products' === get_post_type() ) {
            echo "<span class='dispensary-category'>" . get_the_term_list( $post->ID, 'wpd_categories', '', ' ', '' ) . "</span>";
        }
    }

}
endif;

/**
 * Prints a shopping cart link in the topbar of the header.
 */
function cannabiz_topbar_shopping_cart() {
    // Make sure WooCommerce is activated.    
    if ( is_woocommerce_activated() ) {
        global $woocommerce;
        // get cart quantity.
        $qty = $woocommerce->cart->get_cart_contents_count();
        // get cart subtotal.
        $cart_subtotal = $woocommerce->cart->get_cart_subtotal();
        // get cart url.
        $cart_url = $woocommerce->cart->get_cart_url();

        if ( 'show' === get_theme_mod( 'cannabiz_topbar_woocommerce_cart' ) || '' === get_theme_mod( 'cannabiz_topbar_woocommerce_cart' ) ) {
        do_action( 'cannabiz_topbar_inside_before_woocommerce_cart' ); ?>
            <span class="topbar-woocommerce">
                <a href="<?php echo $cart_url ?>">
                    <i class="fas fa-shopping-cart" aria-hidden="true"></i> (<?php echo $qty; ?>)
                </a>
            </span>
        <?php
        do_action( 'cannabiz_topbar_inside_after_woocommerce_cart' );
        }
    }
}
add_action( 'cannabiz_topbar_inside_after_social', 'cannabiz_topbar_shopping_cart' );


if ( ! function_exists( 'cannabiz_social_icons' ) ) :
/**
 * Prints Social media icons based on links added in the Customizer.
 */
function cannabiz_social_icons() {

    if ( '' != get_theme_mod( 'cannabiz_social_leafly' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_leafly' ); ?>" target="_blank" class="social-leafly"></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_massroots' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_massroots' ); ?>" target="_blank" class="social-massroots"></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_weedmaps' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_weedmaps' ); ?>" target="_blank" class="social-weedmaps"></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_twitter' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_twitter' ); ?>" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_facebook' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_facebook' ); ?>" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_instagram' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_instagram' ); ?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_google' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_google' ); ?>" target="_blank"><i class="fab fa-google" aria-hidden="true"></i></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_snapchat' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_snapchat' ); ?>" target="_blank"><i class="fab fa-snapchat-ghost" aria-hidden="true"></i></a>
    <?php }

    if ( get_theme_mod( 'cannabiz_social_github' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_github' ); ?>" target="_blank"><i class="fab fa-github" aria-hidden="true"></i></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_wordpress' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_wordpress' ); ?>" target="_blank"><i class="fab fa-wordpress" aria-hidden="true"></i></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_linkedin' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_linkedin' ); ?>" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_pinterest' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_pinterest' ); ?>" target="_blank"><i class="fab fa-pinterest" aria-hidden="true"></i></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_medium' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_medium' ); ?>" target="_blank"><i class="fab fa-medium" aria-hidden="true"></i></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_youtube' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_youtube' ); ?>" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_tumblr' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_tumblr' ); ?>" target="_blank"><i class="fab fa-tumblr" aria-hidden="true"></i></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_yelp' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_yelp' ); ?>" target="_blank"><i class="fab fa-yelp" aria-hidden="true"></i></a>
    <?php }

    if ( '' != get_theme_mod( 'cannabiz_social_rss' ) ) { ?>
        <a href="<?php echo get_theme_mod( 'cannabiz_social_rss' ); ?>" target="_blank"><i class="fab fa-rss" aria-hidden="true"></i></a>
    <?php }

}
endif;


if ( ! function_exists( 'cannabiz_product_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function cannabiz_product_footer() {
?>

<?php
}
endif;


if ( ! function_exists( 'cannabiz_title_large' ) ) :
/**
 * Prints HTML for the large title area on pages.
 */
function cannabiz_title_large() {
    ?>
    <?php if ( 'show' === get_theme_mod( 'cannabiz_pages_show_title' ) || get_post_meta( get_the_ID(), 'page_title', true ) ) { ?>
        <?php if ( is_front_page() && ! is_home() || is_page() || is_home() && ! is_front_page() || is_post_type_archive() ) { ?>
        <?php do_action( 'cannabiz_titlelarge_before' ); ?>
        <div class="titlelarge">
            <div class="container">
                <div class="row site-intro">
                    <div class="col-lg-12">
                        <?php if ( is_post_type_archive() ) {?>
                            <h1 class="intro-title"><?php post_type_archive_title(); ?></h1>
                        <?php } else { ?>
                            <h1 class="intro-title"><?php single_post_title(); ?></h1>
                        <?php } ?>
                        <?php if ( function_exists( 'the_subtitle' ) ) {
                            the_subtitle( '<span class="intro-sub">', '</span>' );
                        } ?>
                    </div><!-- .col-lg-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div>
        <?php do_action( 'cannabiz_titlelarge_after' ); ?>
        <?php } ?>
    <?php }
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function cannabiz_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'cannabiz_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,

            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'cannabiz_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so cannabiz_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so cannabiz_categorized_blog should return false.
        return false;
    }
}

/**
 * Flush out the transients used in cannabiz_categorized_blog.
 */
function cannabiz_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'cannabiz_categories' );
}
add_action( 'edit_category', 'cannabiz_category_transient_flusher' );
add_action( 'save_post',     'cannabiz_category_transient_flusher' );
