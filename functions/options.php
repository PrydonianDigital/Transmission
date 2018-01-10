<?php

	function ta_theme_customiser( $wp_customize ) {

		$wp_customize->add_panel( 'ta_schema', array(
			'priority'			=> 30,
			'theme_supports'	=> '',
			'title'				=> __( 'Transmission Options', 'ta' ),
			'capability'		=> 'edit_theme_options',
		) );

		$wp_customize->add_section( 'ta_theme_section' , array(
			'title'				=> __( 'Theme', 'ta' ),
			'priority'			=> 30,
			'description'		=> 'This section controls other theme options.',
			'panel'				=> 'ta_schema',
		) );
		$wp_customize->add_setting( 'ta_header_img' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ta_header_img', array(
			'label'				=> __( 'Homepage Header Image', 'ta' ),
			'section'    => 'ta_theme_section',
			'settings'   => 'ta_header_img',
			'context'    => 'ta_header_image'
		) ) );
		$wp_customize->add_setting( 'ta_header_video' );
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'ta_header_video', array(
			'label'				=> __( 'Homepage Header Video (max 8Mb, no audio)', 'ta' ),
			'section'    => 'ta_theme_section',
			'settings'   => 'ta_header_video',
			'context'    => 'ta_header_video'
		) ) );
		$wp_customize->add_setting( 'ta_yt_vid' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_yt_vid', array(
			'label'				=> __( 'Homepage Video (YouTube ID)', 'ta' ),
			'section'			=> 'ta_theme_section',
			'settings'			=> 'ta_yt_vid',
			'type'				=> 'input',
		) ) );
		$wp_customize->add_setting( 'ta_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ta_logo', array(
			'label'				=> __( 'Header Logo', 'ta' ),
			'section'    => 'ta_theme_section',
			'settings'   => 'ta_logo',
			'context'    => 'ta_logo_image'
		) ) );
		$wp_customize->add_setting( 'ta_tagline' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_tagline', array(
			'label'				=> __( 'Header Tagline', 'ta' ),
			'section'			=> 'ta_theme_section',
			'settings'			=> 'ta_tagline',
			'type'				=> 'input',
		) ) );
		$wp_customize->add_setting( 'ta_button' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_button', array(
			'label'				=> __( 'Footer Link URL', 'ta' ),
			'section'			=> 'ta_theme_section',
			'settings'			=> 'ta_button',
			'type'				=> 'input',
		) ) );
		$wp_customize->add_setting( 'ta_button_text' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_button_text', array(
			'label'				=> __( 'Footer Link Text', 'ta' ),
			'section'			=> 'ta_theme_section',
			'settings'			=> 'ta_button_text',
			'type'				=> 'input',
		) ) );
		$wp_customize->add_setting( 'ta_ga' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_ga', array(
			'label'				=> __( 'Google Analytics ID', 'ta' ),
			'section'			=> 'ta_theme_section',
			'settings'			=> 'ta_ga',
			'type'				=> 'input',
		) ) );

		$wp_customize->add_section( 'ta_blog_section' , array(
			'title'				=> __( 'Insights', 'ta' ),
			'priority'			=> 30,
			'description'		=> 'This section controls text on the Insights page.',
			'panel'				=> 'ta_schema',
		) );
		$wp_customize->add_setting( 'ta_blog_title' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_blog_title', array(
			'label'				=> __( 'Insights Page Title', 'ta' ),
			'section'			=> 'ta_blog_section',
			'settings'			=> 'ta_blog_title',
			'type'				=> 'input',
		) ) );
		$wp_customize->add_setting( 'ta_blog_tagline' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_blog_tagline', array(
			'label'				=> __( 'Insights Page Tagline', 'ta' ),
			'section'			=> 'ta_blog_section',
			'settings'			=> 'ta_blog_tagline',
			'type'				=> 'input',
		) ) );

		$wp_customize->add_section( 'ta_bg_section' , array(
			'title'				=> __( 'Services', 'ta' ),
			'priority'			=> 30,
			'description'		=> 'This section controls background & text on the Services page.',
			'panel'				=> 'ta_schema',
		) );
		$wp_customize->add_setting( 'ta_bg' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ta_bg', array(
			'label'				=> __( 'Services Background', 'ta' ),
			'section'    => 'ta_bg_section',
			'settings'   => 'ta_bg',
			'context'    => 'your_setting_context'
		) ) );
		$wp_customize->add_setting( 'ta_services_vid' );
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'ta_services_vid', array(
			'label'				=> __( 'Services Header Video', 'ta' ),
			'section'    => 'ta_bg_section',
			'settings'   => 'ta_services_vid',
			'context'    => 'your_setting_context'
		) ) );
		$wp_customize->add_setting( 'ta_post' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_post', array(
			'label'				=> __( 'Services Tagline', 'ta' ),
			'section'			=> 'ta_bg_section',
			'settings'			=> 'ta_post',
			'type'				=> 'input',
		) ) );

		$wp_customize->add_section( 'ta_team_section' , array(
			'title'				=> __( 'Team', 'ta' ),
			'priority'			=> 30,
			'description'		=> 'This section controls the text on the Team page.',
			'panel'				=> 'ta_schema',
		) );
		$wp_customize->add_setting( 'ta_teamtag' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_teamtag', array(
			'label'				=> __( 'Team Tagline', 'ta' ),
			'section'			=> 'ta_team_section',
			'settings'			=> 'ta_teamtag',
			'type'				=> 'input',
		) ) );

		$wp_customize->add_section( 'ta_contact_section' , array(
			'title'				=> __( 'Contact', 'ta' ),
			'priority'			=> 30,
			'description'		=> 'This section controls the text on the Contact page.',
			'panel'				=> 'ta_schema',
		) );
		$wp_customize->add_setting( 'ta_contact' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_contact', array(
			'label'				=> __( 'Contact Details', 'ta' ),
			'section'			=> 'ta_contact_section',
			'settings'			=> 'ta_contact',
			'type'				=> 'textarea',
		) ) );

		$wp_customize->add_section( 'ta_404_section' , array(
			'title'				=> __( '404 Page', 'ta' ),
			'priority'			=> 30,
			'description'		=> 'This section controls the text on the 404 page.',
			'panel'				=> 'ta_schema',
		) );
		$wp_customize->add_setting( 'ta_404title' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_404title', array(
			'label'				=> __( '404 Page Title', 'ta' ),
			'section'			=> 'ta_404_section',
			'settings'			=> 'ta_404title',
			'type'				=> 'input',
		) ) );
		$wp_customize->add_setting( 'ta_404tagline' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_404tagline', array(
			'label'				=> __( '404 Page Tagline', 'ta' ),
			'section'			=> 'ta_404_section',
			'settings'			=> 'ta_404tagline',
			'type'				=> 'input',
		) ) );
		$wp_customize->add_setting( 'ta_404content' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ta_404content', array(
			'label'				=> __( '404 Page Content', 'ta' ),
			'section'			=> 'ta_404_section',
			'settings'			=> 'ta_404content',
			'type'				=> 'textarea',
		) ) );
	}
	add_action( 'customize_register', 'ta_theme_customiser' );