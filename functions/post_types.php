<?php

	// Register Services
	function services() {
		$labels = array(
			'name'				  => _x( 'Services', 'Cog General Name', 'ta' ),
			'singular_name'		 => _x( 'Service', 'Cog Singular Name', 'ta' ),
			'menu_name'			 => __( 'Services', 'ta' ),
			'name_admin_bar'		=> __( 'Service', 'ta' ),
			'archives'			  => __( 'Services', 'ta' ),
			'attributes'			=> __( 'Service Attributes', 'ta' ),
			'parent_item_colon'	 => __( 'Parent Service:', 'ta' ),
			'all_items'			 => __( 'All Services', 'ta' ),
			'add_new_item'		  => __( 'Add New Service', 'ta' ),
			'add_new'			   => __( 'Add New', 'ta' ),
			'new_item'			  => __( 'New Service', 'ta' ),
			'edit_item'			 => __( 'Edit Service', 'ta' ),
			'update_item'		   => __( 'Update Service', 'ta' ),
			'view_item'			 => __( 'View Service', 'ta' ),
			'view_items'			=> __( 'View Services', 'ta' ),
			'search_items'		  => __( 'Search Item', 'ta' ),
			'not_found'			 => __( 'Not found', 'ta' ),
			'not_found_in_trash'	=> __( 'Not found in Trash', 'ta' ),
			'featured_image'		=> __( 'Featured Image', 'ta' ),
			'set_featured_image'	=> __( 'Set featured image', 'ta' ),
			'remove_featured_image' => __( 'Remove featured image', 'ta' ),
			'use_featured_image'	=> __( 'Use as featured image', 'ta' ),
			'insert_into_item'	  => __( 'Insert into item', 'ta' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'ta' ),
			'items_list'			=> __( 'Items list', 'ta' ),
			'items_list_navigation' => __( 'Items list navigation', 'ta' ),
			'filter_items_list'	 => __( 'Filter items list', 'ta' ),
		);
		$args = array(
			'label'				 => __( 'Services', 'ta' ),
			'description'		   => __( 'Services', 'ta' ),
			'labels'				=> $labels,
			'supports'			  => array( 'title', 'editor', 'page-attributes', 'thumbnail' ),
			'hierarchical'		  => false,
			'public'				=> true,
			'show_ui'			   => true,
			'show_in_menu'		  => true,
			'menu_position'		 => 5,
			'menu_icon'				=> 'dashicons-nametag',
			'show_in_admin_bar'	 => true,
			'show_in_nav_menus'	 => true,
			'can_export'			=> true,
			'has_archive'		   => true,
			'exclude_from_search'   => false,
			'publicly_queryable'	=> true,
			'capability_type'	   => 'page',
			'show_in_rest'		  => true,
		);
		register_post_type( 'services', $args );
	}
	add_action( 'init', 'services', 0 );

	// Register Team
	function team() {
		$labels = array(
			'name'				  => _x( 'Team Members', 'Team General Name', 'ta' ),
			'singular_name'		 => _x( 'Team Member', 'Team Singular Name', 'ta' ),
			'menu_name'			 => __( 'Team', 'ta' ),
			'name_admin_bar'		=> __( 'Team', 'ta' ),
			'archives'			  => __( 'Team Members', 'ta' ),
			'attributes'			=> __( 'Team Attributes', 'ta' ),
			'parent_item_colon'	 => __( 'Parent Team Member:', 'ta' ),
			'all_items'			 => __( 'All Team Members', 'ta' ),
			'add_new_item'		  => __( 'Add New Team Member', 'ta' ),
			'add_new'			   => __( 'Add New', 'ta' ),
			'new_item'			  => __( 'New Team Member', 'ta' ),
			'edit_item'			 => __( 'Edit Team Member', 'ta' ),
			'update_item'		   => __( 'Update Team Member', 'ta' ),
			'view_item'			 => __( 'View Team Member', 'ta' ),
			'view_items'			=> __( 'View Team Members', 'ta' ),
			'search_items'		  => __( 'Search Item', 'ta' ),
			'not_found'			 => __( 'Not found', 'ta' ),
			'not_found_in_trash'	=> __( 'Not found in Trash', 'ta' ),
			'featured_image'		=> __( 'Featured Image', 'ta' ),
			'set_featured_image'	=> __( 'Set featured image', 'ta' ),
			'remove_featured_image' => __( 'Remove featured image', 'ta' ),
			'use_featured_image'	=> __( 'Use as featured image', 'ta' ),
			'insert_into_item'	  => __( 'Insert into item', 'ta' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'ta' ),
			'items_list'			=> __( 'Items list', 'ta' ),
			'items_list_navigation' => __( 'Items list navigation', 'ta' ),
			'filter_items_list'	 => __( 'Filter items list', 'ta' ),
		);
		$args = array(
			'label'				 => __( 'Team Members', 'ta' ),
			'description'		   => __( 'Team', 'ta' ),
			'labels'				=> $labels,
			'supports'			  => array( 'title', 'editor', 'page-attributes', 'thumbnail' ),
			'hierarchical'		  => false,
			'public'				=> true,
			'show_ui'			   => true,
			'show_in_menu'		  => true,
			'menu_position'		 => 5,
			'menu_icon'				=> 'dashicons-groups',
			'show_in_admin_bar'	 => true,
			'show_in_nav_menus'	 => true,
			'can_export'			=> true,
			'has_archive'		   => true,
			'exclude_from_search'   => false,
			'publicly_queryable'	=> true,
			'capability_type'	   => 'page',
			'show_in_rest'		  => true,
		);
		register_post_type( 'team', $args );
	}
	add_action( 'init', 'team', 0 );

	// Register Clients
	function clients() {
		$labels = array(
			'name'				  => _x( 'Clients', 'Cog General Name', 'ta' ),
			'singular_name'		 => _x( 'Client', 'Cog Singular Name', 'ta' ),
			'menu_name'			 => __( 'Clients', 'ta' ),
			'name_admin_bar'		=> __( 'Client', 'ta' ),
			'archives'			  => __( 'Clients', 'ta' ),
			'attributes'			=> __( 'Client Attributes', 'ta' ),
			'parent_item_colon'	 => __( 'Parent Client:', 'ta' ),
			'all_items'			 => __( 'All Clients', 'ta' ),
			'add_new_item'		  => __( 'Add New Client', 'ta' ),
			'add_new'			   => __( 'Add New', 'ta' ),
			'new_item'			  => __( 'New Client', 'ta' ),
			'edit_item'			 => __( 'Edit Client', 'ta' ),
			'update_item'		   => __( 'Update Client', 'ta' ),
			'view_item'			 => __( 'View Client', 'ta' ),
			'view_items'			=> __( 'View Clients', 'ta' ),
			'search_items'		  => __( 'Search Item', 'ta' ),
			'not_found'			 => __( 'Not found', 'ta' ),
			'not_found_in_trash'	=> __( 'Not found in Trash', 'ta' ),
			'featured_image'		=> __( 'Featured Image', 'ta' ),
			'set_featured_image'	=> __( 'Set featured image', 'ta' ),
			'remove_featured_image' => __( 'Remove featured image', 'ta' ),
			'use_featured_image'	=> __( 'Use as featured image', 'ta' ),
			'insert_into_item'	  => __( 'Insert into item', 'ta' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'ta' ),
			'items_list'			=> __( 'Items list', 'ta' ),
			'items_list_navigation' => __( 'Items list navigation', 'ta' ),
			'filter_items_list'	 => __( 'Filter items list', 'ta' ),
		);
		$args = array(
			'label'				 => __( 'Clients', 'ta' ),
			'description'		   => __( 'Clients', 'ta' ),
			'labels'				=> $labels,
			'supports'			  => array( 'title', 'page-attributes', 'thumbnail' ),
			'hierarchical'		  => false,
			'public'				=> true,
			'show_ui'			   => true,
			'show_in_menu'		  => true,
			'menu_position'		 => 5,
			'menu_icon'				=> 'dashicons-businessman',
			'show_in_admin_bar'	 => true,
			'show_in_nav_menus'	 => true,
			'can_export'			=> true,
			'has_archive'		   => true,
			'exclude_from_search'   => false,
			'publicly_queryable'	=> true,
			'capability_type'	   => 'page',
			'show_in_rest'		  => true,
		);
		register_post_type( 'clients', $args );
	}
	add_action( 'init', 'clients', 0 );