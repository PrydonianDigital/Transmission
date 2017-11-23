<?php

	add_action( 'cmb2_init', 'page_items' );
	function page_items() {
		$front_page_ID = get_option('page_on_front');
		$prefix = '_home_';
		$icons = new_cmb2_box( array(
			'id'				=> 'secondary',
			'title'				=> 'Secondary Content',
			'object_types'		=> array( 'page', ),
			'show_on'			=> array( 'key' => 'page-template', 'value' => 'front-page.php' ),
			'show_in_rest'		=> true,
		) );
		$icons->add_field( array(
			'id'				=> $prefix . 'secondary',
			'type'				=> 'wysiwyg',
		) );
		$links = new_cmb2_box( array(
			'id'				=> 'links',
			'title'				=> 'Links',
			'object_types'		=> array( 'page', ),
			'show_on'			=> array( 'key' => 'page-template', 'value' => 'front-page.php' ),
			'show_in_rest'		=> true,
		) );
		$links_group = $links->add_field( array(
			'id'			=> $prefix . 'link',
			'type'			=> 'group',
			'options'	 	=> array(
				'group_title'	=> __( 'Link {#}', 'mh' ),
				'add_button'	=> __( 'Add New Link', 'mh' ),
				'remove_button'	=> __( 'Remove Link', 'mh' ),
				'sortable'		=> true,
			),
		) );
		$links->add_group_field( $links_group, array(
			'name'			=> 'Title',
			'id'			=> $prefix . 'title',
			'type'			=> 'text',
		) );
		$links->add_group_field( $links_group, array(
			'name'			=> 'Link',
			'id'			=> $prefix . 'url',
			'type'			=> 'text_url',
		) );
	}

	add_action( 'cmb2_init', 'page_tagline' );
	function page_tagline() {
		$prefix = '_page_';
		$icons = new_cmb2_box( array(
			'id'				=> 'tag',
			'title'				=> 'Tagline',
			'object_types'		=> array( 'page', ),
			'show_in_rest'		=> true,
		) );
		$icons->add_field( array(
			'id'				=> $prefix . 'tag',
			'type'				=> 'text',
		) );
		$icons->add_field( array(
			'id'				=> $prefix . 'video',
			'desc'				=> 'Page Video (not for home page video)',
			'type'				=> 'file',
		) );
		$icons->add_field( array(
			'id'				=> $prefix . 'form',
			'desc'				=> 'Campaign form (only for campaign pages)',
			'type'				=> 'wysiwyg',
		) );
	}

	add_action( 'cmb2_init', 'dark_light' );
	function dark_light() {
		$prefix = '_dl_';
		$icons = new_cmb2_box( array(
			'id'				=> 'dl',
			'title'				=> 'Dark/Light Headline',
			'context'			=> 'side',
			'object_types'		=> array( 'page', 'post', 'services' ),
			'show_in_rest'		=> true,
		) );
		$icons->add_field( array(
			'id'				=> $prefix . 'dl',
			'desc'				=> 'Tick box for light',
			'type'				=> 'checkbox',
		) );
	}

	add_action( 'cmb2_init', 'show_team' );
	function show_team() {
		$prefix = '_team_';
		$icons = new_cmb2_box( array(
			'id'				=> 'team',
			'title'				=> 'Show Team on page?',
			'object_types'		=> array( 'page' ),
			'show_on'			=> array( 'key' => 'slug', 'value' => 'about-us' ),
			'show_in_rest'		=> true,
		) );
		$icons->add_field( array(
			'id'				=> $prefix . 'show',
			'desc'				=> 'Show Team on page?',
			'type'				=> 'checkbox',
		) );
	}

	add_action( 'cmb2_init', 'client_link' );
	function client_link() {
		$prefix = '_client_';
		$icons = new_cmb2_box( array(
			'id'				=> 'client',
			'title'				=> 'Client Link',
			'object_types'		=> array( 'clients' ),
			'show_in_rest'		=> true,
		) );
		$icons->add_field( array(
			'id'				=> $prefix . 'url',
			'type'				=> 'text_url',
		) );
	}

	add_action( 'cmb2_init', 'service_meta' );
	function service_meta() {
		$prefix = '_service_';
		$icons = new_cmb2_box( array(
			'id'				=> 'service',
			'title'				=> 'Service Info',
			'object_types'		=> array( 'services', ),
			'show_in_rest'		=> true,
		) );
		$icons->add_field( array(
			'id'				=> $prefix . 'tag',
			'title'				=> 'SubHeading',
			'type'				=> 'text',
		) );
		$tabs = new_cmb2_box( array(
			'id'				=> $prefix . 'tabs',
			'title'				=> 'Services Sub',
			'object_types'		=> array( 'services', ),
			'show_in_rest'		=> true,
		) );
		$tabs_group = $tabs->add_field( array(
			'id'			=> $prefix . 'tab',
			'type'			=> 'group',
			'options'	 	=> array(
				'group_title'	=> __( 'Sub Section {#}', 'mh' ),
				'add_button'	=> __( 'Add New Section', 'mh' ),
				'remove_button'	=> __( 'Remove Section', 'mh' ),
				'sortable'		=> true,
			),
		) );
		$tabs->add_group_field( $tabs_group, array(
			'name'			=> 'Title',
			'id'			=> $prefix . 'title',
			'type'			=> 'text',
		) );
		$tabs->add_group_field( $tabs_group, array(
			'name'			=> 'Content',
			'id'			=> $prefix . 'text',
			'type'			=> 'wysiwyg',
		) );
	}

	add_action( 'cmb2_init', 'team_meta' );
	function team_meta() {
		$prefix = '_teamInfo_';
		$team = new_cmb2_box( array(
			'id'				=> 'teamData',
			'title'				=> 'Team Member Job Title',
			'object_types'		=> array( 'team' ),
			'show_in_rest'		=> true,
		) );
		$team->add_field( array(
			'id'				=> $prefix . 'job',
			'title'				=> 'Job Title',
			'type'				=> 'text',
		) );
	}


function be_metabox_show_on_slug( $display, $meta_box ) {
	if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
		return $display;
	}

	if ( 'slug' !== $meta_box['show_on']['key'] ) {
		return $display;
	}

	$post_id = 0;

	// If we're showing it based on ID, get the current ID
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}

	if ( ! $post_id ) {
		return $display;
	}

	$slug = get_post( $post_id )->post_name;

	// See if there's a match
	return in_array( $slug, (array) $meta_box['show_on']['value']);
}
add_filter( 'cmb2_show_on', 'be_metabox_show_on_slug', 10, 2 );