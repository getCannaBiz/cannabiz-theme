<?php if(is_single()) { ?>
		
	<?php if(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) !='') { ?>
	<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	<?php } else { ?>
	<?php $feat_image = get_template_directory_uri() . '/images/home-bg.jpg'; ?>
	<?php } ?>
	
	<div class="row site-intro">
		<div class="col-lg-12">
			<h2 class="intro-title"><?php single_post_title(); ?></h2>
			<?php if ( function_exists( 'the_subtitle' ) ) {
				the_subtitle( '<span class="intro-sub">', '</span>' );
			} ?>
		</div><!-- .col-lg-12 -->
	</div><!-- .row -->
	<div class="site-header-bg" style="background-image: url(<?php echo $feat_image; ?>);"></div>

<?php } elseif(is_front_page()) { ?>

	<?php if (get_theme_mod('cannabiz_homeintro_image') !='') { ?>
	<?php $headerimg = get_theme_mod( 'cannabiz_homeintro_image' ); ?>
	<?php } else { ?>
	<?php $headerimg = get_template_directory_uri() . '/images/home-bg.jpg'; ?>
	<?php } ?>
	
	<div class="row site-intro">
		<div class="col-lg-12">
			<?php if (get_theme_mod('cannabiz_home_title') !='') { ?>
			<h2 class="intro-title"><?php echo get_theme_mod( 'cannabiz_home_title' ); ?></h2>
			<?php } else { ?>
			<h2 class="intro-title"><?php esc_html_e( 'Build your marijuana dispensary business website with ease', 'cannabiz' ); ?></h2>
			<?php } ?>
			<?php if (get_theme_mod('cannabiz_home_subtitle') !='') { ?>
			<span class="intro-sub"><?php echo get_theme_mod( 'cannabiz_home_subtitle' ); ?></span>
			<?php } else { ?>
			<span class="intro-sub"><?php esc_html_e( 'With WP Dispensary, it\'s never been easier to launch your menu', 'cannabiz' ); ?></span>
			<?php } ?>
			<?php if (get_theme_mod('cannabiz_home_btn_url') !='') { ?>
				<a href="<?php echo get_theme_mod( 'cannabiz_home_btn_url' ); ?>" class="button alt"><?php if (get_theme_mod('cannabiz_home_btn_text') !='') { ?><?php echo get_theme_mod( 'cannabiz_home_btn_text' ); ?><?php } else { ?><?php esc_html_e( 'Learn More', 'cannabiz' ); ?><?php } ?></a>
			<?php } ?>
			<?php if (get_theme_mod('cannabiz_home_btn2_url') !='') { ?>
				<a href="<?php echo get_theme_mod( 'cannabiz_home_btn2_url' ); ?>" class="button"><?php if (get_theme_mod('cannabiz_home_btn2_text') !='') { ?><?php echo get_theme_mod( 'cannabiz_home_btn2_text' ); ?><?php } else { ?><?php esc_html_e( 'Buy This Theme', 'cannabiz' ); ?><?php } ?></a>
			<?php } ?>
		</div><!-- .col-lg-12 -->
	</div><!-- .row -->
	<div class="site-header-bg" style="background-image: url(<?php echo $headerimg; ?>);"></div>

<?php } elseif(is_page()) { ?>
	<?php if ( 'show' === get_theme_mod( 'cannabiz_pages_show_title' ) ) { ?>	
		<?php if(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) !='') { ?>
		<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<?php } else { ?>
		<?php $feat_image = get_template_directory_uri() . '/images/home-bg.jpg'; ?>
		<?php } ?>
		
		<div class="row site-intro">
			<div class="col-lg-12">
				<h2 class="intro-title"><?php single_post_title(); ?></h2>
				<?php if ( function_exists( 'the_subtitle' ) ) {
					the_subtitle( '<span class="intro-sub">', '</span>' );
				} ?>
			</div><!-- .col-lg-12 -->
		</div><!-- .row -->
		<div class="site-header-bg" style="background-image: url(<?php echo $feat_image; ?>);"></div>
	<?php } ?>
<?php } elseif(is_home()) { ?>
	
	<?php $feat_image = get_template_directory_uri() . '/images/home-bg.jpg'; ?>
	
	<div class="row site-intro">
		<div class="col-lg-12">
			<?php if (get_theme_mod('cannabiz_home_title') !='') { ?>
			<h2 class="intro-title"><?php echo get_theme_mod( 'cannabiz_home_title' ); ?></h2>
			<?php } else { ?>
			<h2 class="intro-title"><?php esc_html_e( 'Build your marijuana dispensary business website with ease', 'cannabiz' ); ?></h2>
			<?php } ?>
			<?php if (get_theme_mod('cannabiz_home_subtitle') !='') { ?>
			<span class="intro-sub"><?php echo get_theme_mod( 'cannabiz_home_subtitle' ); ?></span>
			<?php } else { ?>
			<span class="intro-sub"><?php esc_html_e( 'With WP Dispensary, it\'s never been easier to launch your menu', 'cannabiz' ); ?></span>
			<?php } ?>
		</div><!-- .col-lg-12 -->
	</div><!-- .row -->
	<div class="site-header-bg" style="background-image: url(<?php echo $feat_image; ?>);"></div>
	
<?php } elseif(is_search()) { ?>
	
	<?php if (get_theme_mod('cannabiz_homeintro_image') !='') { ?>
	<?php $headerimg = get_theme_mod( 'cannabiz_homeintro_image' ); ?>
	<?php } else { ?>
	<?php $headerimg = get_template_directory_uri() . '/images/home-bg.jpg'; ?>
	<?php } ?>

	<div class="row site-intro">
		<div class="col-lg-12">
			<h2 class="intro-title"><?php esc_html_e( 'Search Results', 'cannabiz' ); ?></h2>
			<span class="intro-sub"><?php printf( esc_html__( 'You searched for: "%s"', 'cannabiz' ), '<span>' . get_search_query() . '</span>' ); ?></span>
		</div><!-- .col-lg-12 -->
	</div><!-- .row -->
	<div class="site-header-bg" style="background-image: url(<?php echo $headerimg; ?>);"></div>
		
<?php } elseif(is_404()) { ?>
	
	<?php if (get_theme_mod('cannabiz_homeintro_image') !='') { ?>
	<?php $headerimg = get_theme_mod( 'cannabiz_homeintro_image' ); ?>
	<?php } else { ?>
	<?php $headerimg = get_template_directory_uri() . '/images/home-bg.jpg'; ?>
	<?php } ?>

	<div class="row site-intro">
		<div class="col-lg-12">
			<h2 class="intro-title"><?php esc_html_e( '404 Error', 'cannabiz' ); ?></h2>
			<span class="intro-sub"><?php esc_html_e( 'Sorry, but the page you\'re looking for cannot be found', 'cannabiz' ); ?></span>
		</div><!-- .col-lg-12 -->
	</div><!-- .row -->
	<div class="site-header-bg" style="background-image: url(<?php echo $headerimg; ?>);"></div>

<?php } elseif(is_post_type_archive() ) { ?>
	
	<?php if (get_theme_mod('cannabiz_homeintro_image') !='') { ?>
	<?php $headerimg = get_theme_mod( 'cannabiz_homeintro_image' ); ?>
	<?php } else { ?>
	<?php $headerimg = get_template_directory_uri() . '/images/home-bg.jpg'; ?>
	<?php } ?>

	<div class="row site-intro">
		<div class="col-lg-12">
		<?php $post_type = get_post_type_object( get_post_type($post) ); ?>
			<h2 class="intro-title"><?php echo $post_type->label ;?></h2>
			<span class="intro-sub"><?php echo $post_type->description; ?></span>
		</div><!-- .col-lg-12 -->
	</div><!-- .row -->
	<div class="site-header-bg" style="background-image: url(<?php echo $headerimg; ?>);"></div>

<?php } elseif(is_tax()) { ?>
	
	<?php if (get_theme_mod('cannabiz_homeintro_image') !='') { ?>
	<?php $headerimg = get_theme_mod( 'cannabiz_homeintro_image' ); ?>
	<?php } else { ?>
	<?php $headerimg = get_template_directory_uri() . '/images/home-bg.jpg'; ?>
	<?php } ?>

	<div class="row site-intro">
		<div class="col-lg-12">
			<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
			<h2 class="intro-title"><?php echo $term->name; ?></h2>
			<span class="intro-sub"><?php echo $term->description; ?></span>
		</div><!-- .col-lg-12 -->
	</div><!-- .row -->
	<div class="site-header-bg" style="background-image: url(<?php echo $headerimg; ?>);"></div>

<?php } elseif(is_archive()) { ?>
	
	<?php if (get_theme_mod('cannabiz_homeintro_image') !='') { ?>
	<?php $headerimg = get_theme_mod( 'cannabiz_homeintro_image' ); ?>
	<?php } else { ?>
	<?php $headerimg = get_template_directory_uri() . '/images/home-bg.jpg'; ?>
	<?php } ?>

	<div class="row site-intro">
		<div class="col-lg-12">
			<?php
				the_archive_title( '<h2 class="intro-title">', '</h2>' );
				the_archive_description( '<span class="intro-sub">', '</span>' );
			?>
		</div><!-- .col-lg-12 -->
	</div><!-- .row -->
	<div class="site-header-bg" style="background-image: url(<?php echo $headerimg; ?>);"></div>

<?php } ?>