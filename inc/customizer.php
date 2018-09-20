<?php

/**
 * Registers options with the Theme Customizer
 *
 * @param      object    $wp_customize    The WordPress Theme Customizer
 * @package    CannaBiz
 * @since      1.0.0
 * @version    1.0.1
 */

function cannabiz_register_theme_customizer( $wp_customize ) {

	/*-----------------------------------------------------------*
	 * Site Title (logo) & Tagline section
	 *-----------------------------------------------------------*/

	// section adjustments
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Header', 'cannabiz' );
	$wp_customize->get_section( 'title_tagline' )->priority = 10;
	/* Site title */
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_control( 'blogname' )->priority = 10;
	/* Site tagline */
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_control( 'blogdescription' )->priority = 11;
	/* Logo uploader */
	$wp_customize->add_setting( 'cannabiz_logo', array( 'default' => null ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cannabiz_logo', array(
		'label'     => __( 'Site Logo', 'cannabiz' ),
		'section'   => 'title_tagline',
		'settings'  => 'cannabiz_logo',
		'priority'  => 1
	) ) );

	/* Show or Hide Blog Description */
	$wp_customize->add_setting(
		'cannabiz_blogdescription',
		array(
			'default'           => 'hide',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport'         => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_blogdescription',
		array(
			'section'  => 'title_tagline',
			'label'    => 'Tagline display',
			'type'     => 'radio',
			'choices'  => array(
				'hide' => 'Hide',
				'show' => 'Show'
			),
			'priority' => 11

		)
	);

	/* Sticky header option */
	$wp_customize->add_setting(
		'cannabiz_stickyhead',
		array(
			'default'           => 'off',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport'         => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_stickyhead',
		array(
			'section'  => 'title_tagline',
			'label'    => 'Sticky Header',
			'type'     => 'radio',
			'choices'  => array(
				'off'  => 'Off',
				'on'   => 'On'
			),
			'priority' => 12
		)
	);

	/* Transparent header option */
	$wp_customize->add_setting(
		'cannabiz_transparenthead',
		array(
			'default'            => 'off',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_transparenthead',
		array(
			'section'  => 'title_tagline',
			'label'    => 'Transparent Header',
			'type'     => 'radio',
			'choices'  => array(
				'off'  => 'Off',
				'on'   => 'On'
			),
			'priority'  => 12
		)
	);

	/* Show or Hide Top Bar */
	$wp_customize->add_setting(
		'cannabiz_topbar',
		array(
			'default'           => 'hide',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport'         => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_topbar',
		array(
			'section'  => 'title_tagline',
			'label'    => 'Top Bar',
			'type'     => 'radio',
			'choices'  => array(
				'hide' => 'Hide',
				'show' => 'Show'
			),
			'priority' => 25
		)
	);

	/* Top Bar Email */
	$wp_customize->add_setting(
		'cannabiz_topbar_email_address',
		array(
			'default'           => '',
			'sanitize_callback' => 'cannabiz_sanitize_text',
			'transport'         => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_topbar_email_address',
		array(
			'section'  => 'title_tagline',
			'label'    => 'Email Address',
			'type'     => 'text',
			'priority' => 26
		)
	);

	/* Show or Hide Top Bar Email */
	$wp_customize->add_setting(
		'cannabiz_topbar_email',
		array(
			'default'           => 'hide',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport'         => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_topbar_email',
		array(
			'section'  => 'title_tagline',
			'label'    => '',
			'type'     => 'radio',
			'choices'  => array(
				'hide' => 'Hide',
				'show' => 'Show'
			),
			'priority' => 26
		)
	);

	/* Top Bar Phone */
	$wp_customize->add_setting(
		'cannabiz_topbar_phone_number',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_text',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_topbar_phone_number',
		array(
			'section'  => 'title_tagline',
			'label'    => 'Phone Number',
			'type'     => 'text',
			'priority'  => 27
		)
	);

	/* Show or Hide Top Bar Phone */
	$wp_customize->add_setting(
		'cannabiz_topbar_phone',
		array(
			'default'   => 'hide',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport' => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_topbar_phone',
		array(
			'section'  => 'title_tagline',
			'label'    => '',
			'type'     => 'radio',
			'choices'  => array(
				'hide'    => 'Hide',
				'show'   => 'Show'
			),
			'priority'  => 27
		)
	);

	/* Show or Hide Top Bar Social */
	$wp_customize->add_setting(
		'cannabiz_topbar_social',
		array(
			'default'   => 'hide',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport' => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_topbar_social',
		array(
			'section'  => 'title_tagline',
			'label'    => 'Top Bar Social',
			'type'     => 'radio',
			'choices'  => array(
				'hide'    => 'Hide',
				'show'   => 'Show'
			),
			'priority'  => 30

		)
	);

	/* Home page slider */
	$wp_customize->add_setting(
		'cannabiz_home_slider',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_text',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_home_slider',
		array(
			'section'  => 'title_tagline',
			'label'    => 'Home page top shortcode',
			'type'     => 'text',
			'priority'  => 31
		)
	);


	/*-----------------------------------------------------------*
	 * Color options
	 *-----------------------------------------------------------*/

	/* Background Top Bar Color */
	$wp_customize->add_setting(
		'cannabiz_background_topbar_color',
		array(
			'default'     		 => '#76bd1d',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'background_topbar_color',
			array(
			    'label'      => 'Background Top Bar Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_background_topbar_color',
				'priority'	 => 11
			)
		)
	);

	/* Header Background Color */
	$wp_customize->add_setting(
		'cannabiz_background_header_color',
		array(
			'default'     		 => '#FFF',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'background_header_color',
			array(
			    'label'      => 'Background Header Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_background_header_color',
				'priority'	 => 11
			)
		)
	);

	/* Page Title Background Color */
	$wp_customize->add_setting(
		'cannabiz_background_pagetitle_color',
		array(
			'default'     		 => '#8224e3',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'background_pagetitle_color',
			array(
			    'label'      => 'Background Page Title Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_background_pagetitle_color',
				'priority'	 => 11
			)
		)
	);

	/* Footer Background Color */
	$wp_customize->add_setting(
		'cannabiz_background_footer_color',
		array(
			'default'     		 => '#76bd1d',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'background_footer_color',
			array(
			    'label'      => 'Background Footer Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_background_footer_color',
				'priority'	 => 11
			)
		)
	);

	/* Link Color */
	$wp_customize->add_setting(
		'cannabiz_link_color',
		array(
			'default'     		 => '#76bd1d',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
			    'label'      => 'Link Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_link_color',
				'priority'	 => 12
			)
		)
	);

	/* Link Hover Color */
	$wp_customize->add_setting(
		'cannabiz_link_hover_color',
		array(
			'default'     		 => '#8224e3',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_hover_color',
			array(
			    'label'      => 'Link Color (hover)',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_link_hover_color',
				'priority'	 => 12
			)
		)
	);

	/* Top Bar Link Color */
	$wp_customize->add_setting(
		'cannabiz_topbar_link_color',
		array(
			'default'     		 => '#FFF',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'topbar_link_color',
			array(
			    'label'      => 'Top Bar Link Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_topbar_link_color',
				'priority'	 => 12
			)
		)
	);

	/* Top Bar Link Hover Color */
	$wp_customize->add_setting(
		'cannabiz_topbar_link_hover_color',
		array(
			'default'     		 => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'topbar_link_hover_color',
			array(
			    'label'      => 'Top Bar Link Color (hover)',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_topbar_link_hover_color',
				'priority'	 => 12
			)
		)
	);

	/* Blog Title Link Color */
	$wp_customize->add_setting(
		'cannabiz_blogtitle_link_color',
		array(
			'default'     		 => '#8224e3',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'blogtitle_link_color',
			array(
			    'label'      => 'Blog Title Link Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_blogtitle_link_color',
				'priority'	 => 12
			)
		)
	);

	/* Blog Title Link Hover Color */
	$wp_customize->add_setting(
		'cannabiz_blogtitle_link_hover_color',
		array(
			'default'     		 => '#76bd1d',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'blogtitle_link_hover_color',
			array(
			    'label'      => 'Blog Title Link Color (hover)',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_blogtitle_link_hover_color',
				'priority'	 => 12
			)
		)
	);

	/* Blog Sub-title Color */
	$wp_customize->add_setting(
		'cannabiz_blogtitle_subtitle_color',
		array(
			'default'     		 => '#dddddd',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'blogsubtitle_subtitle_color',
			array(
			    'label'      => 'Blog Sub-title Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_blogtitle_subtitle_color',
				'priority'	 => 12
			)
		)
	);

	/* Menu Link Color */
	$wp_customize->add_setting(
		'cannabiz_menu_link_color',
		array(
			'default'     		 => '#8224e3',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'menu_link_color',
			array(
			    'label'      => 'Menu Link Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_menu_link_color',
				'priority'	 => 12
			)
		)
	);

	/* Menu Link Hover Color */
	$wp_customize->add_setting(
		'cannabiz_menu_link_hover_color',
		array(
			'default'     		 => '#76bd1d',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'menu_link_hover_color',
			array(
			    'label'      => 'Menu Link Color (hover)',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_menu_link_hover_color',
				'priority'	 => 12
			)
		)
	);

	/* Button Color */
	$wp_customize->add_setting(
		'cannabiz_button_color',
		array(
			'default'     		 => '#76bd1d',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'button_color',
			array(
			    'label'      => 'Button Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_button_color',
				'priority'	 => 13
			)
		)
	);

	/* Button Hover Color */
	$wp_customize->add_setting(
		'cannabiz_button_hover_color',
		array(
			'default'     		 => '#83d122',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'button_hover_color',
			array(
			    'label'      => 'Button Color (hover)',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_button_hover_color',
				'priority'	 => 13
			)
		)
	);

	/* Post Title Color */
	$wp_customize->add_setting(
		'cannabiz_post_title_color',
		array(
			'default'     		 => '#8224e3',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'post_title_color',
			array(
			    'label'      => 'Post Title Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_post_title_color',
				'priority'	 => 14
			)
		)
	);

	/* Post Title Hover Color */
	$wp_customize->add_setting(
		'cannabiz_post_title_hover_color',
		array(
			'default'     		 => '#76bd1d',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'post_title_hover_color',
			array(
			    'label'      => 'Post Title Color (hover)',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_post_title_hover_color',
				'priority'	 => 14
			)
		)
	);

	/* Page Title Color */
	$wp_customize->add_setting(
		'cannabiz_page_title_color',
		array(
			'default'     		 => '#FFFFFF',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'page_title_color',
			array(
			    'label'      => 'Page Title Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_page_title_color',
				'priority'	 => 15
			)
		)
	);

	/* Footer Text Color */
	$wp_customize->add_setting(
		'cannabiz_footer_text_color',
		array(
			'default'     		 => '#FFFFFF',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_text_color',
			array(
			    'label'      => 'Footer Text Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_footer_text_color',
				'priority'	 => 15
			)
		)
	);

	/* Footer link Color */
	$wp_customize->add_setting(
		'cannabiz_footer_link_color',
		array(
			'default'     		 => '#FFFFFF',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_link_color',
			array(
			    'label'      => 'Footer Link Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_footer_link_color',
				'priority'	 => 15
			)
		)
	);

	/* Footer link Color (hover) */
	$wp_customize->add_setting(
		'cannabiz_footer_link_hover_color',
		array(
			'default'     		 => '#FFFFFF',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_link_hover_color',
			array(
			    'label'      => 'Footer Link Color (hover)',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_footer_link_hover_color',
				'priority'	 => 15
			)
		)
	);

	/* WP Dispensary's Coupons add-on background color */
	$wp_customize->add_setting(
		'cannabiz_coupons_background_color',
		array(
			'default'     		 => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'coupons_background_color',
			array(
			    'label'      => 'Coupons Background Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_coupons_background_color',
				'priority'	 => 15
			)
		)
	);

	$wp_customize->add_setting(
		'cannabiz_coupons_border_color',
		array(
			'default'     		 => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'coupons_border_color',
			array(
			    'label'      => 'Coupons Border Color',
			    'section'    => 'colors',
			    'settings'   => 'cannabiz_coupons_border_color',
				'priority'	 => 15
			)
		)
	);

	/*-----------------------------------------------------------*
	 * Defining our own 'Fonts' section (added in Version 1.4)
	 *-----------------------------------------------------------*/

	$wp_customize->add_section(
		'cannabiz_font_options',
		array(
			'title'     => 'Fonts',
			'priority'  => 30
		)
	);

	// Add a Google Font control
	require_once dirname(__FILE__) . '/select/google-font-dropdown-custom-control.php';

	/**
	 * FONT - Main (default)
	 */
	$wp_customize->add_setting(
		'cannabiz_main_font',
		array(
			'default'   		=> 'Open Sans',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport' 		=> 'refresh'
		)
	);

	$wp_customize->add_control(
		new Google_Font_Dropdown_Custom_Control(
		$wp_customize,
		'cannabiz_main_font',
		array(
			'label'        => 'Main (default)',
			'section'      => 'cannabiz_font_options',
			'settings'     => 'cannabiz_main_font',
			'priority'     => 12
		)
		)
	);

	/**
	 * FONT - Main (default) - Weight
	 */
	$wp_customize->add_setting(
		'cannabiz_main_font_weight',
		array(
			'default'            => '400',
			'sanitize_callback'  => 'cannabiz_sanitize_text',
			'transport'          => 'refresh'
		)
	);

	$wp_customize->add_control(
		'cannabiz_main_font_weight',
		array(
			'type'     => 'select',
			'label'    => 'Main (weight)',
			'section'  => 'cannabiz_font_options',
			'choices'  => array( '', 100, 200, 300, 400, 500, 600, 700, 800, 900 ),
			'priority' => 12
		)
	);

	/**
	 * FONT - Title (default)
	 */
	$wp_customize->add_setting(
		'cannabiz_title_font',
		array(
			'default'   		=> 'Oregano',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport' 		=> 'refresh'
		)
	);

	$wp_customize->add_control(
		new Google_Font_Dropdown_Custom_Control(
		$wp_customize,
		'cannabiz_title_font',
		array(
			'label'        => 'Title (default)',
			'section'      => 'cannabiz_font_options',
			'settings'     => 'cannabiz_title_font',
			'priority'     => 12
		)
		)
	);

	/**
	 * FONT -Title (default) - Weight
	 */
	$wp_customize->add_setting(
		'cannabiz_title_font_weight',
		array(
			'default'            => '400',
			'sanitize_callback'  => 'cannabiz_sanitize_text',
			'transport'          => 'refresh'
		)
	);

	$wp_customize->add_control(
		'cannabiz_title_font_weight',
		array(
			'type'     => 'select',
			'label'    => 'Title (weight)',
			'section'  => 'cannabiz_font_options',
			'choices'  => array( '', 100, 200, 300, 400, 500, 600, 700, 800, 900 ),
			'priority' => 12
		)
	);


	/**
	 *  Font - Blog Title Size
	 */
	$wp_customize->add_setting(
		'cannabiz_blogtitle_size',
		array(
			'default'            => '48',
			'sanitize_callback'  => 'cannabiz_sanitize_text',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_blogtitle_size',
		array(
			'section'  => 'cannabiz_font_options',
			'label'    => 'Site Title (size)',
			'type'     => 'number',
			'priority' => 12
		)
	);

	/**
	 * Font - Blog Description Size
	 */
	$wp_customize->add_setting(
		'cannabiz_blogdescription_size',
		array(
			'default'            => '14',
			'sanitize_callback'  => 'cannabiz_sanitize_text',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_blogdescription_size',
		array(
			'section'  => 'cannabiz_font_options',
			'label'    => 'Site Description (size)',
			'type'     => 'number',
			'priority' => 12
		)
	);

	/* Post Title Size */
	$wp_customize->add_setting(
		'cannabiz_post_title_size',
		array(
			'default'            => '50',
			'sanitize_callback'  => 'cannabiz_sanitize_text',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_post_title_size',
		array(
			'section'  => 'cannabiz_font_options',
			'label'    => 'Post Title (size)',
			'type'     => 'number',
			'priority' => 12
		)
	);

	/**
	 * FONT - Top Bar
	 */
	$wp_customize->add_setting(
		'cannabiz_menu_topbar_font',
		array(
			'default'   		=> '',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport' 		=> 'refresh'
		)
	);

	$wp_customize->add_control(
		new Google_Font_Dropdown_Custom_Control(
		$wp_customize,
		'cannabiz_menu_topbar_font',
		array(
			'label'        => 'Top Bar',
			'section'      => 'cannabiz_font_options',
			'settings'     => 'cannabiz_menu_topbar_font',
			'priority'     => 12
		)
		)
	);

	/**
	 * FONT - Menu (top level)
	 */
	$wp_customize->add_setting(
		'cannabiz_menu_toplevel_font',
		array(
			'default'   		=> '',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport' 		=> 'refresh'
		)
	);

	$wp_customize->add_control(
		new Google_Font_Dropdown_Custom_Control(
		$wp_customize,
		'cannabiz_menu_toplevel_font',
		array(
			'label'        => 'Menu (top level)',
			'section'      => 'cannabiz_font_options',
			'settings'     => 'cannabiz_menu_toplevel_font',
			'priority'     => 12
		)
		)
	);

	/**
	 * FONT - Menu (sub level)
	 */
	$wp_customize->add_setting(
		'cannabiz_menu_sublevel_font',
		array(
			'default'   		=> '',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport' 		=> 'refresh'
		)
	);

	$wp_customize->add_control(
		new Google_Font_Dropdown_Custom_Control(
		$wp_customize,
		'cannabiz_menu_sublevel_font',
		array(
			'label'        => 'Menu (sub level)',
			'section'      => 'cannabiz_font_options',
			'settings'     => 'cannabiz_menu_sublevel_font',
			'priority'     => 12
		)
		)
	);


	/*-----------------------------------------------------------*
	 * Defining our own 'Pages' section
	 *-----------------------------------------------------------*/

	$wp_customize->add_section(
		'cannabiz_blogpages_options',
		array(
			'title'     => 'Pages',
			'priority'  => 30
		)
	);

	/* Page Title */
	$wp_customize->add_setting(
		'cannabiz_pages_show_title',
		array(
			'default'   		=> 'show',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport' 		=> 'refresh'
		)
	);

	$wp_customize->add_control(
		'cannabiz_pages_show_title',
		array(
			'section'  			=> 'cannabiz_blogpages_options',
			'label'    			=> 'Page Title',
			'type'     			=> 'radio',
			'choices'  			=> array(
				'hide'			=> 'Default',
				'show'			=> 'Large'
			)
		)
	);

	/*-----------------------------------------------------------*
	 * Defining our own 'Blog Posts' section
	 *-----------------------------------------------------------*/

	$wp_customize->add_section(
		'cannabiz_blogposts_options',
		array(
			'title'     => 'Posts',
			'priority'  => 30
		)
	);

	/* Post Comments */
	$wp_customize->add_setting(
		'cannabiz_posts_show_comments',
		array(
			'default'   		=> 'show',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport' 		=> 'refresh'
		)
	);

	$wp_customize->add_control(
		'cannabiz_posts_show_comments',
		array(
			'section'  			=> 'cannabiz_blogposts_options',
			'label'    			=> 'Comments',
			'type'     			=> 'radio',
			'choices'  			=> array(
				'hide'			=> 'hide',
				'show'			=> 'show'
			)
		)
	);

	/* Post Category */
	$wp_customize->add_setting(
		'cannabiz_posts_show_category',
		array(
			'default'   		=> 'show',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport' 		=> 'refresh'
		)
	);

	$wp_customize->add_control(
		'cannabiz_posts_show_category',
		array(
			'section'  			=> 'cannabiz_blogposts_options',
			'label'    			=> 'Categories',
			'type'     			=> 'radio',
			'choices'  			=> array(
				'hide'			=> 'hide',
				'show'			=> 'show'
			)
		)
	);

	/* Post Author */
	$wp_customize->add_setting(
		'cannabiz_posts_show_author',
		array(
			'default'   		=> 'show',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport' 		=> 'refresh'
		)
	);

	$wp_customize->add_control(
		'cannabiz_posts_show_author',
		array(
			'section'  			=> 'cannabiz_blogposts_options',
			'label'    			=> 'Author',
			'type'     			=> 'radio',
			'choices'  			=> array(
				'hide'			=> 'hide',
				'show'			=> 'show'
			)
		)
	);

	/* Post Date */
	$wp_customize->add_setting(
		'cannabiz_posts_show_date',
		array(
			'default'   		=> 'show',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport' 		=> 'refresh'
		)
	);

	$wp_customize->add_control(
		'cannabiz_posts_show_date',
		array(
			'section'  			=> 'cannabiz_blogposts_options',
			'label'    			=> 'Date',
			'type'     			=> 'radio',
			'choices'  			=> array(
				'hide'			=> 'hide',
				'show'			=> 'show'
			)
		)
	);

	/*-----------------------------------------------------------*
	 * Defining our own 'Footer' section
	 *-----------------------------------------------------------*/

	$wp_customize->add_section(
		'cannabiz_footer',
		array(
			'title'     => 'Footer',
			'priority'  => 40
		)
	);

	/* Home page bottom */
	$wp_customize->add_setting(
		'cannabiz_home_slider_bottom',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_text',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_home_slider_bottom',
		array(
			'section'  => 'cannabiz_footer',
			'label'    => 'Home page bottom shortcode',
			'type'     => 'text'
		)
	);

	/* Display Copyright */
	$wp_customize->add_setting(
		'cannabiz_copyright',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_text',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_copyright',
		array(
			'section'  => 'cannabiz_footer',
			'label'    => 'Copyright',
			'type'     => 'text'
		)
	);

	/* Footer Menu */
	$wp_customize->add_setting(
		'cannabiz_footer_menu',
		array(
			'default'   		=> 'hide',
			'sanitize_callback' => 'cannabiz_sanitize_input',
			'transport' 		=> 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_footer_menu',
		array(
			'section'  			=> 'cannabiz_footer',
			'label'    			=> 'Footer Menu',
			'type'     			=> 'radio',
			'choices'  			=> array(
				'hide'			=> 'Hide',
				'show'			=> 'Show'
			)
		)
	);

	/*-----------------------------------------------------------*
	 * Defining our own 'Social' section
	 *-----------------------------------------------------------*/

	$wp_customize->add_section(
		'cannabiz_social',
		array(
			'title'     => 'Social',
			'priority'  => 35
		)
	);

	/* Leafly URL */
	$wp_customize->add_setting(
		'cannabiz_social_leafly',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_leafly',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Leafly',
			'type'     => 'text'
		)
	);

	/* Massroots URL */
	$wp_customize->add_setting(
		'cannabiz_social_massroots',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_massroots',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Massroots',
			'type'     => 'text'
		)
	);

	/* Weedmaps URL */
	$wp_customize->add_setting(
		'cannabiz_social_weedmaps',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_weedmaps',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Weedmaps',
			'type'     => 'text'
		)
	);

	/* Twitter URL */
	$wp_customize->add_setting(
		'cannabiz_social_twitter',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_twitter',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Twitter',
			'type'     => 'text'
		)
	);

	/* Facebook URL */
	$wp_customize->add_setting(
		'cannabiz_social_facebook',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_facebook',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Facebook',
			'type'     => 'text'
		)
	);

	/* Instagram URL */
	$wp_customize->add_setting(
		'cannabiz_social_instagram',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_instagram',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Instagram',
			'type'     => 'text'
		)
	);

	/* Google URL */
	$wp_customize->add_setting(
		'cannabiz_social_google',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_google',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Google+',
			'type'     => 'text'
		)
	);

	/* Snapchat URL */
	$wp_customize->add_setting(
		'cannabiz_social_snapchat',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_snapchat',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Snapchat',
			'type'     => 'text'
		)
	);

	/* Github URL */
	$wp_customize->add_setting(
		'cannabiz_social_github',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_github',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Github',
			'type'     => 'text'
		)
	);

	/* WordPress URL */
	$wp_customize->add_setting(
		'cannabiz_social_wordpress',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_wordpress',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'WordPress',
			'type'     => 'text'
		)
	);

	/* Linkedin URL */
	$wp_customize->add_setting(
		'cannabiz_social_linkedin',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_linkedin',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Linkedin',
			'type'     => 'text'
		)
	);

	/* Pinterest URL */
	$wp_customize->add_setting(
		'cannabiz_social_pinterest',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_pinterest',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Pinterest',
			'type'     => 'text'
		)
	);

	/* Medium URL */
	$wp_customize->add_setting(
		'cannabiz_social_medium',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_medium',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Medium',
			'type'     => 'text'
		)
	);

	/* Youtube URL */
	$wp_customize->add_setting(
		'cannabiz_social_youtube',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_youtube',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Youtube',
			'type'     => 'text'
		)
	);

	/* Tumblr URL */
	$wp_customize->add_setting(
		'cannabiz_social_tumblr',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_tumblr',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'Tumblr',
			'type'     => 'text'
		)
	);

	/* RSS URL */
	$wp_customize->add_setting(
		'cannabiz_social_rss',
		array(
			'default'            => '',
			'sanitize_callback'  => 'cannabiz_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'cannabiz_social_rss',
		array(
			'section'  => 'cannabiz_social',
			'label'    => 'RSS',
			'type'     => 'text'
		)
	);

} // end cannabiz_register_theme_customizer
add_action( 'customize_register', 'cannabiz_register_theme_customizer' );
/**
 * Sanitizes the incoming input and returns it prior to serialization.
 *
 * @param      string    $input    The string to sanitize
 * @return     string              The sanitized string
 * @package    cannabiz
 * @since      1.0.0
 * @version    1.0.0
 */
function cannabiz_sanitize_input( $input ) {
	return strip_tags( stripslashes( $input ) );
} // end cannabiz_sanitize_input

function cannabiz_sanitize_text( $input ) {
	$allowed = array(
		's'          => array(),
		'br'         => array(),
		'em'         => array(),
		'i'          => array(),
		'strong'     => array(),
		'b'          => array(),
		'a'          => array(
			'href'  => array(),
			'title' => array(),
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'form'       => array(
			'id'           => array(),
			'class'        => array(),
			'action'       => array(),
			'method'       => array(),
			'autocomplete' => array(),
			'style'        => array(),
		),
		'input'      => array(
			'type'        => array(),
			'name'        => array(),
			'class'       => array(),
			'id'          => array(),
			'value'       => array(),
			'placeholder' => array(),
			'tabindex'    => array(),
			'style'       => array(),
		),
		'img'        => array(
			'src'    => array(),
			'alt'    => array(),
			'class'  => array(),
			'id'     => array(),
			'style'  => array(),
			'height' => array(),
			'width'  => array(),
		),
		'span'       => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'p'          => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'div'        => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'blockquote' => array(
			'cite'  => array(),
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
	);
    return wp_kses( $input, $allowed );
} // end cannabiz_sanitize_text

/**
 * Writes styles out the `<head>` element of the page based on the configuration options
 * saved in the Theme Customizer.
 *
 * @since      1.0.0
 * @version    1.0.0
 */
function cannabiz_customizer_css() {
?>
	<style type="text/css">

	<?php if ( get_theme_mod( 'cannabiz_main_font' ) !='' ) { ?>
		body,
		.woocommerce ul.products li.product .woocommerce-loop-category__title,
		.woocommerce ul.products li.product .woocommerce-loop-product__title,
		.woocommerce ul.products li.product h3 {
			font-family: '<?php echo get_theme_mod( 'cannabiz_main_font' ); ?>', 'Open Sans', sans-serif;
		}
	<?php } ?>
	<?php if ( get_theme_mod( 'cannabiz_main_font_weight' ) !='' ) { ?>
		body,
		.woocommerce ul.products li.product .woocommerce-loop-category__title,
		.woocommerce ul.products li.product .woocommerce-loop-product__title,
		.woocommerce ul.products li.product h3 {
			font-weight: <?php echo get_theme_mod( 'cannabiz_main_font_weight' ); ?>00;
		}
	<?php } ?>
	<?php if ( get_theme_mod( 'cannabiz_title_font' ) !='' ) { ?>
		h1, h2, h3 {
			font-family: '<?php echo get_theme_mod( 'cannabiz_title_font' ); ?>', 'Oregano', serif;
		}
	<?php } ?>
	<?php if ( get_theme_mod( 'cannabiz_title_font_weight' ) !='' ) { ?>
		h1, h2, h3 {
			font-weight: <?php echo get_theme_mod( 'cannabiz_title_font_weight' ); ?>00;
		}
	<?php } ?>

	<?php if ( '' != get_theme_mod( 'cannabiz_link_color' ) || null != get_theme_mod( 'cannabiz_link_color' ) ) { ?>
		a,
		a:visited,
		.entry-title a:hover,
		h1.entry-title a:hover,
		h2.entry-title a:hover,
		table.wpdispensary-table td,
		.woocommerce ul.products li.product a h3,
		.woocommerce ul.products li.product a:visited h3 {
			color: <?php echo get_theme_mod( 'cannabiz_link_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_link_hover_color' ) || null != get_theme_mod( 'cannabiz_link_hover_color' ) ) { ?>
		a:hover,
		a:focus,
		a:active,
		.woocommerce ul.products li.product a:hover h3,
		.woocommerce ul.products li.product a:active h3,
		.woocommerce ul.products li.product a:focus h3 {
			color: <?php echo get_theme_mod( 'cannabiz_link_hover_color' ); ?>;
		}
	<?php } ?>

	<?php if ( '' != get_theme_mod( 'cannabiz_link_hover_color' ) || null != get_theme_mod( 'cannabiz_link_hover_color' ) ) { ?>
		.woocommerce ul.products li.product a.woocommerce-LoopProduct-link {
			color: <?php echo get_theme_mod( 'cannabiz_link_hover_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_link_color' ) || null != get_theme_mod( 'cannabiz_link_color' ) ) { ?>
		.woocommerce ul.products li.product a.woocommerce-LoopProduct-link:hover {
			color: <?php echo get_theme_mod( 'cannabiz_link_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_button_hover_color' ) || null != get_theme_mod( 'cannabiz_button_hover_color' ) ) { ?>
		a.button:hover,
		button:hover,
		html input[type=button]:hover,
		input[type=reset]:hover,
		input[type=submit]:hover,
		#commentform #submit:hover,
		.woocommerce #respond input#submit.alt:hover,
		.woocommerce a.button.alt:hover,
		.woocommerce button.button.alt:hover,
		.woocommerce input.button.alt:hover,
		.woocommerce #respond input#submit:hover,
		.woocommerce a.button:hover,
		.woocommerce button.button:hover,
		.woocommerce input.button:hover {
			background: <?php echo get_theme_mod( 'cannabiz_button_hover_color' ); ?>;
			color: #FFF;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_link_color' ) || null != get_theme_mod( 'cannabiz_link_color' ) ) { ?>
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		textarea:focus {
			border: 1px solid <?php echo get_theme_mod( 'cannabiz_link_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_button_color' ) || null != get_theme_mod( 'cannabiz_button_color' ) ) { ?>
		a.button,
		a.button:visited,
		button,
		html input[type=button],
		input[type=reset],
		input[type=submit],
		#commentform #submit,
		.menu-toggle,
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce button.button.alt,
		.woocommerce input.button.alt,
		.woocommerce #respond input#submit,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button {
			background: <?php echo get_theme_mod( 'cannabiz_button_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_button_hover_color' ) || null != get_theme_mod( 'cannabiz_button_hover_color' ) ) { ?>
		.menu-toggle:hover {
			background: <?php echo get_theme_mod( 'cannabiz_button_hover_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_button_color' ) || null != get_theme_mod( 'cannabiz_button_color' ) ) { ?>
		a.button.wpd-connect-btn.buy-now,
		a.button.wpd-connect-btn.buy-now:visited {
			background: transparent;
			border: 1px solid <?php echo get_theme_mod( 'cannabiz_button_color' ); ?>;
			color: <?php echo get_theme_mod( 'cannabiz_button_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_button_color' ) || null != get_theme_mod( 'cannabiz_button_color' ) ) { ?>
		a.button.wpd-connect-btn:hover {
			background: transparent;
			border: 1px solid <?php echo get_theme_mod( 'cannabiz_button_color' ); ?>;
			box-shadow: none;
			color: <?php echo get_theme_mod( 'cannabiz_button_color' ); ?>;
		}
		a.button.wpd-connect-btn.buy-now:hover {
			background: <?php echo get_theme_mod( 'cannabiz_button_color' ); ?>;
			border: 1px solid <?php echo get_theme_mod( 'cannabiz_button_color' ); ?>;
			color: #FFF;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_link_color' ) || null != get_theme_mod( 'cannabiz_link_color' ) ) { ?>
		-moz-selection,
		::selection{
			background: <?php echo get_theme_mod( 'cannabiz_link_color' ); ?>;
		}
		body{
			webkit-tap-highlight-color: <?php echo get_theme_mod( 'cannabiz_link_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_menu_topbar_font' ) ) { ?>
		.topbar {
			font-family: '<?php echo get_theme_mod( 'cannabiz_menu_topbar_font' ); ?>', 'Open Sans', sans-serif;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_topbar_link_color' ) || null != get_theme_mod( 'cannabiz_topbar_link_color' ) ) { ?>
		.topbar .fa,
		.topbar a,
		.topbar a:visited {
			color: <?php echo get_theme_mod( 'cannabiz_topbar_link_color' ); ?>;
		}
		.topbar a.social-leafly,
		.topbar a.social-leafly:visited,
		.topbar a.social-massroots,
		.topbar a.social-massroots:visited,
		.topbar a.social-weedmaps,
		.topbar a.social-weedmaps:visited {
			background-color: <?php echo get_theme_mod( 'cannabiz_topbar_link_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_topbar_link_hover_color' ) || null != get_theme_mod( 'cannabiz_topbar_link_hover_color' ) ) { ?>
		.topbar a:hover .fa,
		.topbar a:hover {
			color: <?php echo get_theme_mod( 'cannabiz_topbar_link_hover_color' ); ?>;
		}
		.topbar a.social-leafly:hover,
		.topbar a.social-massroots:hover,
		.topbar a.social-weedmaps:hover {
			background-color: <?php echo get_theme_mod( 'cannabiz_topbar_link_hover_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_background_topbar_color' ) || null != get_theme_mod( 'cannabiz_background_topbar_color' ) ) { ?>
		.topbar {
			background-color: <?php echo get_theme_mod( 'cannabiz_background_topbar_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_blogtitle_size' ) || null != get_theme_mod( 'cannabiz_blogtitle_size' ) ) { ?>
		.site-title {
			font-size: <?php echo get_theme_mod( 'cannabiz_blogtitle_size' ); ?>px;
		}
	<?php } ?>
	<?php if ( get_theme_mod( 'cannabiz_title_font_weight' ) !='' ) { ?>
		.site-title {
			font-weight: <?php echo get_theme_mod( 'cannabiz_title_font_weight' ); ?>00;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_background_header_color' ) || null != get_theme_mod( 'cannabiz_background_header_color' ) ) { ?>
		.site-header {
			background-color: <?php echo get_theme_mod( 'cannabiz_background_header_color' ); ?>;
		}
		.main-navigation ul ul:before {
			border-bottom: 8px solid <?php echo get_theme_mod( 'cannabiz_background_header_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_blogtitle_link_color' ) || null != get_theme_mod( 'cannabiz_blogtitle_link_color' ) ) { ?>
		.site-title a,
		.site-title a:visited {
			color: <?php echo get_theme_mod( 'cannabiz_blogtitle_link_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_blogtitle_link_hover_color' ) || null != get_theme_mod( 'cannabiz_blogtitle_link_hover_color' ) ) { ?>
		.site-title a:hover {
			color: <?php echo get_theme_mod( 'cannabiz_blogtitle_link_hover_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_blogtitle_subtitle_color' ) || null != get_theme_mod( 'cannabiz_blogtitle_subtitle_color' ) ) { ?>
		.site-description {
			color: <?php echo get_theme_mod( 'cannabiz_blogtitle_subtitle_color' ); ?>;
		}
	<?php } ?>
	<?php if ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) !='' ) { ?>
		.main-navigation {
			font-family: '<?php echo get_theme_mod( 'cannabiz_menu_toplevel_font' ); ?>', 'Open Sans', sans-serif;
		}
	<?php } ?>
	<?php if ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) !='' ) { ?>
		.main-navigation li ul {
			font-family: '<?php echo get_theme_mod( 'cannabiz_menu_sublevel_font' ); ?>', 'Open Sans', sans-serif;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_menu_link_color' ) || null != get_theme_mod( 'cannabiz_menu_link_color' ) ) { ?>
		.main-navigation a,
		.main-navigation a:visited {
			color: <?php echo get_theme_mod( 'cannabiz_menu_link_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_menu_link_hover_color' ) || null != get_theme_mod( 'cannabiz_menu_link_hover_color' ) ) { ?>
		.main-navigation a:hover,
		.main-navigation ul li.current-menu-item > a,
		.main-navigation ul > li:hover > a,
		.main-navigation .sub-menu li.current-menu-item > a {
			color: <?php echo get_theme_mod( 'cannabiz_menu_link_hover_color' ); ?> !important;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_blogdescription_size' ) || null != get_theme_mod( 'cannabiz_blogdescription_size' )) { ?>
		.site-description {
			font-size: <?php echo get_theme_mod( 'cannabiz_blogdescription_size' ); ?>px;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_background_pagetitle_color' ) || null != get_theme_mod( 'cannabiz_background_pagetitle_color' ) ) { ?>
		.titlelarge {
			background-color: <?php echo get_theme_mod( 'cannabiz_background_pagetitle_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_post_title_size' ) || null != get_theme_mod( 'cannabiz_post_title_size' ) ) { ?>
		h1.entry-title, h2.entry-title {
			font-size: <?php echo get_theme_mod( 'cannabiz_post_title_size' ); ?>px;
		}
	<?php } ?>
	<?php if ( get_theme_mod( 'cannabiz_title_font_weight' ) !='' ) { ?>
		h1.entry-title, h2.entry-title {
			font-weight: <?php echo get_theme_mod( 'cannabiz_title_font_weight' ); ?>00;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_post_title_color' ) || null != get_theme_mod( 'cannabiz_post_title_color' ) ) { ?>
		h1.entry-title a,
		h1.entry-title a:visited,
		h2.entry-title a,
		h2.entry-title a:visited {
			color: <?php echo get_theme_mod( 'cannabiz_post_title_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_post_title_hover_color' ) || null != get_theme_mod( 'cannabiz_post_title_hover_color' ) ) { ?>
		h1.entry-title a:hover,
		h2.entry-title a:hover {
			color: <?php echo get_theme_mod( 'cannabiz_post_title_hover_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_post_title_hover_color' ) || null != get_theme_mod( 'cannabiz_post_title_hover_color' ) ) { ?>
		.entry-header {
			border-top: 6px solid <?php echo get_theme_mod( 'cannabiz_post_title_hover_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_page_title_color' ) || null != get_theme_mod( 'cannabiz_page_title_color' ) ) { ?>
		.titlelarge h1 {
			color: <?php echo get_theme_mod( 'cannabiz_page_title_color' ); ?>;
		}
		span.intro-sub:before {
			background: <?php echo get_theme_mod( 'cannabiz_page_title_color' ); ?>;
		}
	<?php } ?>
	<?php if ( get_theme_mod( 'cannabiz_title_font' ) !='' || null != get_theme_mod( 'cannabiz_title_font' )  ) { ?>
		h2.widget-title {
			font-family: '<?php echo get_theme_mod( 'cannabiz_title_font' ); ?>', 'Open Sans', sans-serif;
		}
	<?php } ?>
	<?php if ( get_theme_mod( 'cannabiz_title_font_weight' ) !=''  || null != get_theme_mod( 'cannabiz_title_font_weight' ) ) { ?>
		h2.widget-title {
			font-weight: <?php echo get_theme_mod( 'cannabiz_title_font_weight' ); ?>00;
		}
	<?php } ?>

	<?php if ( '' != get_theme_mod( 'cannabiz_background_footer_color' ) || null != get_theme_mod( 'cannabiz_background_footer_color' ) ) { ?>
		.site-footer {
			background: <?php echo get_theme_mod( 'cannabiz_background_footer_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_footer_text_color' ) || null != get_theme_mod( 'cannabiz_footer_text_color' ) ) { ?>
		.site-footer .copyright {
			color: <?php echo get_theme_mod( 'cannabiz_footer_text_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_footer_link_color' ) || null != get_theme_mod( 'cannabiz_footer_link_color' ) ) { ?>
		.site-footer .copyright a,
		.site-footer .copyright a:visited,
		.site-footer .menu a,
		.site-footer .menu a:visited {
			color: <?php echo get_theme_mod( 'cannabiz_footer_link_color' ); ?>;
		}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'cannabiz_footer_link_hover_color' ) || null != get_theme_mod( 'cannabiz_footer_link_hover_color' ) ) { ?>
		.site-footer .copyright a:hover,
		.site-footer .menu a:hover {
			color: <?php echo get_theme_mod( 'cannabiz_footer_link_hover_color' ); ?>;
		}
	<?php } ?>
	<?php if ( 'on' === get_theme_mod( 'cannabiz_transparenthead' ) || '' === get_theme_mod( 'cannabiz_transparenthead' ) ) { ?>
		.site-header {
			background: transparent;
			border-bottom: none;
		}
		<?php if ( '' != get_theme_mod( 'cannabiz_background_header_color' ) || null != get_theme_mod( 'cannabiz_background_header_color' ) ) { ?>
		.site-header.scroll-to-fixed-fixed {
			background: <?php echo get_theme_mod( 'cannabiz_background_header_color' ); ?>;
			border-bottom: 1px solid #DDD;
		}
		<?php } ?>
	<?php } ?>
	</style>
<?php
} // end cannabiz_customizer_css
add_action( 'wp_head', 'cannabiz_customizer_css' );

function cannabiz_customize_scripts() {

	/**
	 * Title font
	 */

	if ( get_theme_mod( 'cannabiz_title_font' ) ===  'Oregano' ) {
		wp_enqueue_style( 'cannabiz-oregano', 'https://fonts.googleapis.com/css?family=Oregano' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Merriweather' ) {
		wp_enqueue_style( 'cannabiz-merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Open Sans' ) {
		wp_enqueue_style( 'cannabiz-opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900,300italic,400italic,700italic' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Roboto' ) {
		wp_enqueue_style( 'cannabiz-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Lato' ) {
		wp_enqueue_style( 'cannabiz-lato', 'https://fonts.googleapis.com/css?family=Lato:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Oswald' ) {
		wp_enqueue_style( 'cannabiz-oswald', 'https://fonts.googleapis.com/css?family=Oswald:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Source Sans' ) {
		wp_enqueue_style( 'cannabiz-sourcesans', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Raleway' ) {
		wp_enqueue_style( 'cannabiz-raleway', 'https://fonts.googleapis.com/css?family=Raleway:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Lora' ) {
		wp_enqueue_style( 'cannabiz-lora', 'https://fonts.googleapis.com/css?family=Lora:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Playfair Display' ) {
		wp_enqueue_style( 'cannabiz-playfairdisplay', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Ubuntu' ) {
		wp_enqueue_style( 'cannabiz-ubuntu', 'https://fonts.googleapis.com/css?family=Ubuntu:400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Arvo' ) {
		wp_enqueue_style( 'cannabiz-arvo', 'https://fonts.googleapis.com/css?family=Arvo:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Limelight' ) {
		wp_enqueue_style( 'cannabiz-limelight', 'https://fonts.googleapis.com/css?family=Limelight' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Lobster' ) {
		wp_enqueue_style( 'cannabiz-lobster', 'https://fonts.googleapis.com/css?family=Lobster' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Quicksand' ) {
		wp_enqueue_style( 'cannabiz-quicksand', 'https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Cabin' ) {
		wp_enqueue_style( 'cannabiz-cabin', 'https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Oxygen' ) {
		wp_enqueue_style( 'cannabiz-oxygen', 'https://fonts.googleapis.com/css?family=Oxygen:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Libre Baskerville' ) {
		wp_enqueue_style( 'cannabiz-libre-baskerville', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Abril Fatface' ) {
		wp_enqueue_style( 'cannabiz-abril-fatface', 'https://fonts.googleapis.com/css?family=Abril+Fatface' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Amatic SC' ) {
		wp_enqueue_style( 'cannabiz-amatic-sc', 'https://fonts.googleapis.com/css?family=Amatic+SC:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Permanent Marker' ) {
		wp_enqueue_style( 'cannabiz-permanent-marker', 'https://fonts.googleapis.com/css?family=Permanent+Marker' );
	} else {
		wp_enqueue_style( 'cannabiz-oregano', 'https://fonts.googleapis.com/css?family=Oregano' );
	}

	/**
	 * Main font
	 */

	if ( get_theme_mod( 'cannabiz_main_font' ) ===  'Oregano' ) {
		wp_enqueue_style( 'cannabiz-oregano', 'https://fonts.googleapis.com/css?family=Oregano' );
	} elseif ( get_theme_mod( 'cannabiz_main_font' ) === 'Merriweather' ) {
		wp_enqueue_style( 'cannabiz-merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_main_font' ) === 'Open Sans' ) {
		wp_enqueue_style( 'cannabiz-opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900,300italic,400italic,700italic' );
	} elseif ( get_theme_mod( 'cannabiz_main_font' ) === 'Roboto' ) {
		wp_enqueue_style( 'cannabiz-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_main_font' ) === 'Lato' ) {
		wp_enqueue_style( 'cannabiz-lato', 'https://fonts.googleapis.com/css?family=Lato:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_main_font' ) === 'Oswald' ) {
		wp_enqueue_style( 'cannabiz-oswald', 'https://fonts.googleapis.com/css?family=Oswald:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_main_font' ) === 'Source Sans' ) {
		wp_enqueue_style( 'cannabiz-sourcesans', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_main_font' ) === 'Raleway' ) {
		wp_enqueue_style( 'cannabiz-raleway', 'https://fonts.googleapis.com/css?family=Raleway:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_main_font' ) === 'Lora' ) {
		wp_enqueue_style( 'cannabiz-lora', 'https://fonts.googleapis.com/css?family=Lora:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_main_font' ) === 'Playfair Display' ) {
		wp_enqueue_style( 'cannabiz-playfairdisplay', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_main_font' ) === 'Ubuntu' ) {
		wp_enqueue_style( 'cannabiz-ubuntu', 'https://fonts.googleapis.com/css?family=Ubuntu:400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Arvo' ) {
		wp_enqueue_style( 'cannabiz-arvo', 'https://fonts.googleapis.com/css?family=Arvo:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Limelight' ) {
		wp_enqueue_style( 'cannabiz-limelight', 'https://fonts.googleapis.com/css?family=Limelight' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Lobster' ) {
		wp_enqueue_style( 'cannabiz-lobster', 'https://fonts.googleapis.com/css?family=Lobster' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Quicksand' ) {
		wp_enqueue_style( 'cannabiz-quicksand', 'https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Cabin' ) {
		wp_enqueue_style( 'cannabiz-cabin', 'https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Oxygen' ) {
		wp_enqueue_style( 'cannabiz-oxygen', 'https://fonts.googleapis.com/css?family=Oxygen:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Libre Baskerville' ) {
		wp_enqueue_style( 'cannabiz-libre-baskerville', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Abril Fatface' ) {
		wp_enqueue_style( 'cannabiz-abril-fatface', 'https://fonts.googleapis.com/css?family=Abril+Fatface' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Amatic SC' ) {
		wp_enqueue_style( 'cannabiz-amatic-sc', 'https://fonts.googleapis.com/css?family=Amatic+SC:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_title_font' ) === 'Permanent Marker' ) {
		wp_enqueue_style( 'cannabiz-permanent-marker', 'https://fonts.googleapis.com/css?family=Permanent+Marker' );
	} else {
		wp_enqueue_style( 'cannabiz-opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900,300italic,400italic,700italic' );
	}

	/**
	 * Top Bar font
	 */

	if ( get_theme_mod( 'cannabiz_menu_topbar_font' ) ===  'Oregano' ) {
		wp_enqueue_style( 'cannabiz-oregano', 'https://fonts.googleapis.com/css?family=Oregano' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Merriweather' ) {
		wp_enqueue_style( 'cannabiz-merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Open Sans' ) {
		wp_enqueue_style( 'cannabiz-opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900,300italic,400italic,700italic' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Roboto' ) {
		wp_enqueue_style( 'cannabiz-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Lato' ) {
		wp_enqueue_style( 'cannabiz-lato', 'https://fonts.googleapis.com/css?family=Lato:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Oswald' ) {
		wp_enqueue_style( 'cannabiz-oswald', 'https://fonts.googleapis.com/css?family=Oswald:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Source Sans' ) {
		wp_enqueue_style( 'cannabiz-sourcesans', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Raleway' ) {
		wp_enqueue_style( 'cannabiz-raleway', 'https://fonts.googleapis.com/css?family=Raleway:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Lora' ) {
		wp_enqueue_style( 'cannabiz-lora', 'https://fonts.googleapis.com/css?family=Lora:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Playfair Display' ) {
		wp_enqueue_style( 'cannabiz-playfairdisplay', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Ubuntu' ) {
		wp_enqueue_style( 'cannabiz-ubuntu', 'https://fonts.googleapis.com/css?family=Ubuntu:400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Arvo' ) {
		wp_enqueue_style( 'cannabiz-arvo', 'https://fonts.googleapis.com/css?family=Arvo:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Limelight' ) {
		wp_enqueue_style( 'cannabiz-limelight', 'https://fonts.googleapis.com/css?family=Limelight' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Lobster' ) {
		wp_enqueue_style( 'cannabiz-lobster', 'https://fonts.googleapis.com/css?family=Lobster' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Quicksand' ) {
		wp_enqueue_style( 'cannabiz-quicksand', 'https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Cabin' ) {
		wp_enqueue_style( 'cannabiz-cabin', 'https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Oxygen' ) {
		wp_enqueue_style( 'cannabiz-oxygen', 'https://fonts.googleapis.com/css?family=Oxygen:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Libre Baskerville' ) {
		wp_enqueue_style( 'cannabiz-libre-baskerville', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Abril Fatface' ) {
		wp_enqueue_style( 'cannabiz-abril-fatface', 'https://fonts.googleapis.com/css?family=Abril+Fatface' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Amatic SC' ) {
		wp_enqueue_style( 'cannabiz-amatic-sc', 'https://fonts.googleapis.com/css?family=Amatic+SC:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_topbar_font' ) === 'Permanent Marker' ) {
		wp_enqueue_style( 'cannabiz-permanent-marker', 'https://fonts.googleapis.com/css?family=Permanent+Marker' );
	} else { }

	/**
	 * Menu (top level) font
	 */

	if ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) ===  'Oregano' ) {
		wp_enqueue_style( 'cannabiz-oregano', 'https://fonts.googleapis.com/css?family=Oregano' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Merriweather' ) {
		wp_enqueue_style( 'cannabiz-merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Open Sans' ) {
		wp_enqueue_style( 'cannabiz-opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900,300italic,400italic,700italic' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Roboto' ) {
		wp_enqueue_style( 'cannabiz-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Lato' ) {
		wp_enqueue_style( 'cannabiz-lato', 'https://fonts.googleapis.com/css?family=Lato:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Oswald' ) {
		wp_enqueue_style( 'cannabiz-oswald', 'https://fonts.googleapis.com/css?family=Oswald:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Source Sans' ) {
		wp_enqueue_style( 'cannabiz-sourcesans', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Raleway' ) {
		wp_enqueue_style( 'cannabiz-raleway', 'https://fonts.googleapis.com/css?family=Raleway:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Lora' ) {
		wp_enqueue_style( 'cannabiz-lora', 'https://fonts.googleapis.com/css?family=Lora:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Playfair Display' ) {
		wp_enqueue_style( 'cannabiz-playfairdisplay', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Ubuntu' ) {
		wp_enqueue_style( 'cannabiz-ubuntu', 'https://fonts.googleapis.com/css?family=Ubuntu:400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Arvo' ) {
		wp_enqueue_style( 'cannabiz-arvo', 'https://fonts.googleapis.com/css?family=Arvo:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Limelight' ) {
		wp_enqueue_style( 'cannabiz-limelight', 'https://fonts.googleapis.com/css?family=Limelight' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Lobster' ) {
		wp_enqueue_style( 'cannabiz-lobster', 'https://fonts.googleapis.com/css?family=Lobster' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Quicksand' ) {
		wp_enqueue_style( 'cannabiz-quicksand', 'https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Cabin' ) {
		wp_enqueue_style( 'cannabiz-cabin', 'https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Oxygen' ) {
		wp_enqueue_style( 'cannabiz-oxygen', 'https://fonts.googleapis.com/css?family=Oxygen:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Libre Baskerville' ) {
		wp_enqueue_style( 'cannabiz-libre-baskerville', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Abril Fatface' ) {
		wp_enqueue_style( 'cannabiz-abril-fatface', 'https://fonts.googleapis.com/css?family=Abril+Fatface' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Amatic SC' ) {
		wp_enqueue_style( 'cannabiz-amatic-sc', 'https://fonts.googleapis.com/css?family=Amatic+SC:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_toplevel_font' ) === 'Permanent Marker' ) {
		wp_enqueue_style( 'cannabiz-permanent-marker', 'https://fonts.googleapis.com/css?family=Permanent+Marker' );
	} else { }

	/**
	 * Menu (sub level) font
	 */

	if ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) ===  'Oregano' ) {
		wp_enqueue_style( 'cannabiz-oregano', 'https://fonts.googleapis.com/css?family=Oregano' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Merriweather' ) {
		wp_enqueue_style( 'cannabiz-merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Open Sans' ) {
		wp_enqueue_style( 'cannabiz-opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900,300italic,400italic,700italic' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Roboto' ) {
		wp_enqueue_style( 'cannabiz-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Lato' ) {
		wp_enqueue_style( 'cannabiz-lato', 'https://fonts.googleapis.com/css?family=Lato:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Oswald' ) {
		wp_enqueue_style( 'cannabiz-oswald', 'https://fonts.googleapis.com/css?family=Oswald:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Source Sans' ) {
		wp_enqueue_style( 'cannabiz-sourcesans', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Raleway' ) {
		wp_enqueue_style( 'cannabiz-raleway', 'https://fonts.googleapis.com/css?family=Raleway:300,400,600' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Lora' ) {
		wp_enqueue_style( 'cannabiz-lora', 'https://fonts.googleapis.com/css?family=Lora:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Playfair Display' ) {
		wp_enqueue_style( 'cannabiz-playfairdisplay', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Ubuntu' ) {
		wp_enqueue_style( 'cannabiz-ubuntu', 'https://fonts.googleapis.com/css?family=Ubuntu:400,400i,700,700i' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Arvo' ) {
		wp_enqueue_style( 'cannabiz-arvo', 'https://fonts.googleapis.com/css?family=Arvo:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Limelight' ) {
		wp_enqueue_style( 'cannabiz-limelight', 'https://fonts.googleapis.com/css?family=Limelight' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Lobster' ) {
		wp_enqueue_style( 'cannabiz-lobster', 'https://fonts.googleapis.com/css?family=Lobster' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Quicksand' ) {
		wp_enqueue_style( 'cannabiz-quicksand', 'https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Cabin' ) {
		wp_enqueue_style( 'cannabiz-cabin', 'https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Oxygen' ) {
		wp_enqueue_style( 'cannabiz-oxygen', 'https://fonts.googleapis.com/css?family=Oxygen:300,400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Libre Baskerville' ) {
		wp_enqueue_style( 'cannabiz-libre-baskerville', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Abril Fatface' ) {
		wp_enqueue_style( 'cannabiz-abril-fatface', 'https://fonts.googleapis.com/css?family=Abril+Fatface' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Amatic SC' ) {
		wp_enqueue_style( 'cannabiz-amatic-sc', 'https://fonts.googleapis.com/css?family=Amatic+SC:400,700' );
	} elseif ( get_theme_mod( 'cannabiz_menu_sublevel_font' ) === 'Permanent Marker' ) {
		wp_enqueue_style( 'cannabiz-permanent-marker', 'https://fonts.googleapis.com/css?family=Permanent+Marker' );
	} else { }

}
add_action( 'wp_enqueue_scripts', 'cannabiz_customize_scripts' );

/**
 * Registers the Theme Customizer Preview with WordPress.
 *
 * @package    cannabiz
 * @since      1.0.0
 * @version    2.0.0
 */
function cannabiz_customizer_live_preview() {
	wp_enqueue_script(
		'cannabiz-theme-customizer',
		get_template_directory_uri() . '/js/customizer.js',
		array( 'customize-preview' ),
		'2.0.0',
		true
	);
} // end cannabiz_customizer_live_preview
add_action( 'customize_preview_init', 'cannabiz_customizer_live_preview' );
