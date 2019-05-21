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
				echo '<span class="comments-link"><i class="fa fa-comment"></i> ';
				comments_popup_link( esc_html__( '0 Comments', 'cannabiz' ), esc_html__( '1 Comment', 'cannabiz' ), esc_html__( '% Comments', 'cannabiz' ) );
				echo '</span>';
			}
		}
		if ( 'show' === get_theme_mod( 'cannabiz_posts_show_author' ) || '' === get_theme_mod( 'cannabiz_posts_show_author' ) ) {
			echo '<span class="author-link"><i class="fa fa-user"></i> ' . get_the_author_link( get_the_id() ) .'</span>';
		}
	}

	/**
	 * Price - Edibles, Pre-rolls, Growers, Gear, Tinctures
	 */
	if ( is_post_type_archive( array( 'edibles', 'prerolls', 'growers', 'gear', 'tinctures' ) ) ) {

		if ( get_post_meta( get_the_ID(), '_priceeach', true ) ) {
			echo '<strong> ' . __( 'Price', 'cannabiz' ) . ':</strong> ' . wpd_currency_code() . get_post_meta( get_the_id(), '_priceeach', true );
		}

		if ( get_post_meta( get_the_ID(), '_priceperpack', true ) ) {
			echo ' &middot; ' . get_post_meta( get_the_id(), '_unitsperpack', true ) . ' for ' . wpd_currency_code() . get_post_meta( get_the_id(), '_priceperpack', true );
		}

	}

	/**
	 * Price - Topicals
	 */
	if ( is_post_type_archive( array( 'topicals' ) ) ) {

		if ( get_post_meta( get_the_ID(), '_pricetopical', true ) ) {
			echo wpd_currency_code() . get_post_meta( get_the_id(), '_pricetopical', true );
		}

	}

	/**
	 * Price - Flowers
	 */
	if ( is_post_type_archive( 'flowers' ) ) {

		if ( get_post_meta( get_the_ID(), '_gram', true ) ) {
			echo wpd_currency_code() . get_post_meta(get_the_id(), '_gram', true);
		} elseif ( get_post_meta( get_the_ID(), '_eighth', true ) ) {
			echo wpd_currency_code() . get_post_meta(get_the_id(), '_eighth', true);
		} elseif ( get_post_meta( get_the_ID(), '_quarter', true ) ) {
			echo wpd_currency_code() . get_post_meta(get_the_id(), '_quarter', true);
		} elseif ( get_post_meta( get_the_ID(), '_halfounce', true ) ) {
			echo wpd_currency_code() . get_post_meta(get_the_id(), '_halfounce', true);
		}
		echo " - ";
		if ( get_post_meta( get_the_ID(), '_ounce', true ) ) {
			echo wpd_currency_code() . get_post_meta( get_the_id(), '_ounce', true );
		} elseif ( get_post_meta( get_the_ID(), '_halfounce', true ) ) {
			echo wpd_currency_code() . get_post_meta( get_the_id(), '_halfounce', true );
		} elseif ( get_post_meta( get_the_ID(), '_quarter', true ) ) {
			echo wpd_currency_code() . get_post_meta( get_the_id(), '_quarter', true );
		} elseif ( get_post_meta( get_the_ID(), '_eighth', true ) ) {
			echo wpd_currency_code() . get_post_meta( get_the_id(), '_eighth', true );
		} elseif ( get_post_meta( get_the_ID(), '_gram', true ) ) {
			echo wpd_currency_code() . get_post_meta( get_the_id(), '_gram', true );
		}

	}
	
	/**
	 * Price - Concentrates
	 */
	if ( is_post_type_archive( 'concentrates' ) ) {
		if ( get_post_meta( get_the_ID(), '_priceeach', true ) ) {
			$pricingeach = wpd_currency_code() . get_post_meta( get_the_id(), '_priceeach', true ) . ' each';
		} else {
			$pricingeach = '';
		}

		if ( get_post_meta( get_the_ID(), '_halfgram', true ) ) {
			$halfgram = '<span class="wpd-productinfo"><strong>1/2g: </strong>' . wpd_currency_code() . get_post_meta( get_the_id(), '_halfgram', true ) .'</span>';
		} else {
			$halfgram = '';
		}

		if ( get_post_meta( get_the_ID(), '_gram', true ) ) {
			$gram = '<span class="wpd-productinfo"><strong>1g: </strong>' . wpd_currency_code() . get_post_meta( get_the_id(), '_gram', true ) .'</span>';
		} else {
			$gram = '';
		}

		if ( get_post_meta( get_the_ID(), '_twograms', true ) ) {
			$twograms = '<span class="wpd-productinfo"><strong>2g: </strong>' . wpd_currency_code() . get_post_meta( get_the_id(), '_twograms', true ) .'</span>';
		} else {
			$twograms = '';
		}

		if ( empty( $pricingeach ) ) {
			echo $halfgram .''. $gram .''. $twograms;
		} else {
			echo $pricingeach;
		}

	}

	/**
	 * Price - Taxonomies
	 */
	if (
		is_tax(
			array(
				'aroma',
				'flavor',
				'effect',
				'condition',
				'symptom',
				'vendor',
				'allergens',
				'flowers_category',
				'concentrates_category',
				'edibles_category',
				'topicals_category',
				'growers_category',
				'wpd_gear_category',
				'wpd_tinctures_category',
				'strain_type',
				'shelf_type'
			)
		)
	) {

		// Add price each & per pack to these menu types.
		$priceeachperpack = array( 'edibles', 'prerolls', 'growers', 'gear', 'tinctures' );

		if ( 'flowers' === get_post_type() ) {
			if ( get_post_meta( get_the_ID(), '_gram', true ) ) {
				echo wpd_currency_code() . get_post_meta(get_the_id(), '_gram', true);
			} elseif ( get_post_meta( get_the_ID(), '_eighth', true ) ) {
				echo wpd_currency_code() . get_post_meta(get_the_id(), '_eighth', true);
			} elseif ( get_post_meta( get_the_ID(), '_quarter', true ) ) {
				echo wpd_currency_code() . get_post_meta(get_the_id(), '_quarter', true);
			} elseif ( get_post_meta( get_the_ID(), '_halfounce', true ) ) {
				echo wpd_currency_code() . get_post_meta(get_the_id(), '_halfounce', true);
			}
			echo " - ";
			if ( get_post_meta( get_the_ID(), '_ounce', true ) ) {
				echo wpd_currency_code() . get_post_meta( get_the_id(), '_ounce', true );
			} elseif ( get_post_meta( get_the_ID(), '_halfounce', true ) ) {
				echo wpd_currency_code() . get_post_meta( get_the_id(), '_halfounce', true );
			} elseif ( get_post_meta( get_the_ID(), '_quarter', true ) ) {
				echo wpd_currency_code() . get_post_meta( get_the_id(), '_quarter', true );
			} elseif ( get_post_meta( get_the_ID(), '_eighth', true ) ) {
				echo wpd_currency_code() . get_post_meta( get_the_id(), '_eighth', true );
			} elseif ( get_post_meta( get_the_ID(), '_gram', true ) ) {
				echo wpd_currency_code() . get_post_meta( get_the_id(), '_gram', true );
			}
		} elseif ( in_array( get_post_type(), $priceeachperpack ) ) {
			if ( get_post_meta( get_the_ID(), '_priceeach', true ) ) {
				echo '<strong> ' . __( 'Price', 'cannabiz' ) . ':</strong> ' . wpd_currency_code() . get_post_meta( get_the_id(), '_priceeach', true );
			}
			if ( get_post_meta( get_the_ID(), '_priceperpack', true ) ) {
				echo ' &middot; ' . get_post_meta( get_the_id(), '_unitsperpack', true ) . ' for ' . wpd_currency_code() . get_post_meta( get_the_id(), '_priceperpack', true );
			}
		} elseif ( 'topicals' === get_post_type() ) {
			if ( get_post_meta( get_the_ID(), '_priceeach', true ) ) {
				echo wpd_currency_code() . get_post_meta( get_the_id(), '_priceeach', true );
			}
		} elseif ( 'concentrates' === get_post_type() ) {

			if ( get_post_meta( get_the_ID(), '_priceeach', true ) ) {
				$pricingeach = wpd_currency_code() . get_post_meta( get_the_id(), '_priceeach', true ) . ' each';
			} else {
				$pricingeach = '';
			}

			if ( get_post_meta( get_the_ID(), '_halfgram', true ) ) {
				$halfgram = '<span class="wpd-productinfo"><strong>1/2g: </strong>$' . get_post_meta( get_the_id(), '_halfgram', true ) .'</span>';
			} else {
				$halfgram = '';
			}

			if ( get_post_meta( get_the_ID(), '_gram', true ) ) {
				$gram = '<span class="wpd-productinfo"><strong>1g: </strong>$' . get_post_meta( get_the_id(), '_gram', true ) .'</span>';
			} else {
				$gram = '';
			}

			if ( get_post_meta( get_the_ID(), '_twograms', true ) ) {
				$twograms = '<span class="wpd-productinfo"><strong>2g: </strong>$' . get_post_meta( get_the_id(), '_twograms', true ) .'</span>';
			} else {
				$twograms = '';
			}

			if ( empty( $pricingeach ) ) {
				echo $halfgram .''. $gram .''. $twograms;
			} else {
				echo $pricingeach;
			}

		}

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
		'<span class="edit-link"><i class="fa fa-pencil"></i> ',
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
			$nodate = '';
		} else {
			$nodate = 'nodate';
		}

		if ( 'show' === get_theme_mod( 'cannabiz_posts_show_date' ) || null === get_theme_mod( 'cannabiz_posts_show_date' ) ) {
			echo '<span class="posted-on"><i class="fa fa-calendar"></i> ' . $posted_on . '</span>'; // WPCS: XSS OK.
		}
		if ( 'show' === get_theme_mod( 'cannabiz_posts_show_category' ) || '' === get_theme_mod( 'cannabiz_posts_show_category' ) ) {
			echo '<span class="category-link">' . get_the_category_list( ', ', get_the_id() ) .'</span>';
		}
	} elseif ( 'flowers' || 'edibles' || 'concentrates' || 'prerolls' || 'topicals' || 'growers' || 'gear' || 'tinctures' === get_post_type() ) {
		global $post;
		
		if ( ! comments_open() ) {
			echo '<span></span> &nbsp;'; // No Comments.
		} else {
			echo '<span class="dispensary-comments"><i class="fa fa-comment"></i> ';
			echo comments_popup_link( esc_html__( '0', 'cannabiz' ), esc_html__( '1', 'cannabiz' ), esc_html__( '%', 'cannabiz' ) );
			echo '</span>'; // WPCS: XSS OK.
		}
		if ( 'concentrates' === get_post_type() ) {
			echo "<span class='dispensary-category'>" .get_the_term_list( $post->ID, 'concentrates_category', '', ' ', '' ) . "</span>";
		} elseif ( 'edibles' === get_post_type() ) {
			echo "<span class='dispensary-category'>" .get_the_term_list( $post->ID, 'edibles_category', '', ' ', '' ) . "</span>";
		} elseif ( 'topicals' === get_post_type() ) {
			echo "<span class='dispensary-category'>" .get_the_term_list( $post->ID, 'topicals_category', '', ' ', '' ) . "</span>";
		} elseif ( 'growers' === get_post_type() ) {
			echo "<span class='dispensary-category'>" .get_the_term_list( $post->ID, 'growers_category', '', ' ', '' ) . "</span>";
		} elseif ( 'gear' === get_post_type() ) {
			echo "<span class='dispensary-category'>" .get_the_term_list( $post->ID, 'wpd_gear_category', '', ' ', '' ) . "</span>";
		} elseif ( 'tinctures' === get_post_type() ) {
			echo "<span class='dispensary-category'>" .get_the_term_list( $post->ID, 'wpd_tinctures_category', '', ' ', '' ) . "</span>";
		} elseif ( 'prerolls' === get_post_type() ) {
			$prerollflower = get_post_meta( get_the_id(), '_selected_flowers', true );
			echo "<span class='dispensary-category'>";
			echo "<a href='". get_permalink( $prerollflower ) ."'>". get_the_title( $prerollflower ) ."</a>";
			echo "</span>";
		} elseif ( 'flowers' === get_post_type() ) {
			echo "<span class='dispensary-category'>" .get_the_term_list( $post->ID, 'flowers_category', '', ' ', '' ) . "</span>";
		}
	}

}
endif;


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
		<a href="<?php echo get_theme_mod( 'cannabiz_social_twitter' ); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	<?php }

	if ( '' != get_theme_mod( 'cannabiz_social_facebook' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_facebook' ); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	<?php }

	if ( '' != get_theme_mod( 'cannabiz_social_instagram' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_instagram' ); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
	<?php }

	if ( '' != get_theme_mod( 'cannabiz_social_google' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_google' ); ?>" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a>
	<?php }

	if ( '' != get_theme_mod( 'cannabiz_social_snapchat' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_snapchat' ); ?>" target="_blank"><i class="fa fa-snapchat-ghost" aria-hidden="true"></i></a>
	<?php }

	if ( get_theme_mod( 'cannabiz_social_github' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_github' ); ?>" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
	<?php }

	if ( '' != get_theme_mod( 'cannabiz_social_wordpress' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_wordpress' ); ?>" target="_blank"><i class="fa fa-wordpress" aria-hidden="true"></i></a>
	<?php }

	if ( '' != get_theme_mod( 'cannabiz_social_linkedin' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_linkedin' ); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
	<?php }

	if ( '' != get_theme_mod( 'cannabiz_social_pinterest' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_pinterest' ); ?>" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
	<?php }

	if ( '' != get_theme_mod( 'cannabiz_social_medium' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_medium' ); ?>" target="_blank"><i class="fa fa-medium" aria-hidden="true"></i></a>
	<?php }

	if ( '' != get_theme_mod( 'cannabiz_social_youtube' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_youtube' ); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
	<?php }

	if ( '' != get_theme_mod( 'cannabiz_social_tumblr' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_tumblr' ); ?>" target="_blank"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
	<?php }

	if ( '' != get_theme_mod( 'cannabiz_social_yelp' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_yelp' ); ?>" target="_blank"><i class="fa fa-yelp" aria-hidden="true"></i></a>
	<?php }

	if ( '' != get_theme_mod( 'cannabiz_social_rss' ) ) { ?>
		<a href="<?php echo get_theme_mod( 'cannabiz_social_rss' ); ?>" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a>
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
