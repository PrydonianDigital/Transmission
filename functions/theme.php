<?php

	// Register Theme Features
	function ta_theme()  {
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'bg', 1680, 900, array( 'center', 'center') );
		add_image_size( 'carousel', 1680, 389, array( 'center', 'center') );
		add_image_size( 'insight', 500, 250, array( 'center', 'center') );
		add_image_size( 'wwww', 840, 580, array( 'center', 'center') );
		add_image_size( 'sub', 550, 550, array( 'center', 'center') );
		add_image_size( 'client', 150, 150 );
		add_theme_support( 'custom-logo', array(
			'height'			=> 48,
			'width'			 => 68,
			'flex-width' => true,
		) );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'title-tag' );
		show_admin_bar( false );
	}
	add_action( 'after_setup_theme', 'ta_theme' );

	add_filter( 'wp_audio_shortcode_library', 'jmc_new_lib' );
	add_filter( 'wp_video_shortcode_library', 'jmc_new_lib' );
	function jmc_new_lib(){
		wp_enqueue_script( 'wp-mediaelement' );
		wp_script_add_data( 'wp-mediaelement', 'conditional', 'lt IE 9' );
		return '';
	}

	// Register Style
	function ta_css() {
		wp_register_style( 'grid', get_template_directory_uri() . '/css/foundation.min.css', false, '6.3.1' );
		wp_register_style( 'transmission', get_template_directory_uri() . '/css/transmission.css', false, '6.3.1' );
		wp_register_style( 'owl', get_template_directory_uri() . '/css/owl.css', false, '2.3.3' );
		wp_register_style( 'owltheme', get_template_directory_uri() . '/css/owl.theme.css', false, '2.3.3' );
		wp_register_style( 'animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', false, '6.3.1' );
		wp_register_style( 'mi', '//fonts.googleapis.com/icon?family=Material+Icons', false, '6.3.1' );
		wp_enqueue_style( 'grid' );
		wp_enqueue_style( 'transmission' );
		wp_enqueue_style( 'owl' );
		wp_enqueue_style( 'owltheme' );
		wp_enqueue_style( 'animate' );
		wp_enqueue_style( 'mi' );
		wp_enqueue_style( 'wp-mediaelement' );
	}
	add_action( 'wp_enqueue_scripts', 'ta_css' );

	// Register JS
	function ta_js() {
		wp_enqueue_script( 'what', get_template_directory_uri() . '/js/vendor/what-input.js', false, '6.3.1', true );
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/vendor/foundation.min.js', false, '6.3.1', true );
		wp_enqueue_script( 'gmap', '//maps.googleapis.com/maps/api/js?key=AIzaSyAtosHbPDMaai_Xx06b9umEgmgeNSfWgM8&libraries=places', false, '6.4.4', true );
		wp_enqueue_script( 'SM', get_template_directory_uri() . '/js/ScrollMagic.min.js', false, '1', true );
		wp_enqueue_script( 'TM', get_template_directory_uri() . '/js/plugins/TweenMax.min.js', false, '1', true );
		wp_enqueue_script( 'AG', get_template_directory_uri() . '/js/plugins/animation.gsap.min.js', false, '1', true );
		wp_enqueue_script( 'SVG', get_template_directory_uri() . '/js/plugins/DrawSVGPlugin.min.js', false, '1', true );
		wp_enqueue_script( 'owljs', get_template_directory_uri() . '/js/vendor/owl.js', false, '2.3.3', true );
		wp_enqueue_script( 'ta', get_template_directory_uri() . '/js/transmission.js', false, '1.5', true );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'what' );
		wp_enqueue_script( 'foundation' );
		wp_enqueue_script( 'gmap' );
		wp_enqueue_script( 'SM' );
		wp_enqueue_script( 'TW' );
		wp_enqueue_script( 'AG' );
		wp_enqueue_script( 'SVG' );
		wp_enqueue_script( 'wp-mediaelement' );
		wp_enqueue_script( 'mediaelement-vimeo' );
		wp_enqueue_script( 'owljs' );
		wp_enqueue_script( 'ta' );
	}
	add_action( 'wp_enqueue_scripts', 'ta_js' );

	// Register Navigation Menus
	function _register_menu() {
		register_nav_menu( 'topbar-Right', __( 'Top Bar Menu','ta' ) );
		register_nav_menu( 'mobile-menu', __( 'Mobile Menu','ta' ) );
	}
	add_action( 'after_setup_theme', '_theme_setup' );

	function _theme_setup() {
		add_action( 'init', '_register_menu' );
		add_theme_support( 'menus' );
	}

	function ta_sidebars() {
		$args = array(
			'id'			=> 'footer1',
			'class'		 => 'menu vertical',
			'name'		  => __( 'Footer 1 Widgets', 'ta' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer2',
			'class'		 => 'menu vertical',
			'name'		  => __( 'Footer 2 Widgets', 'ta' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer3',
			'class'		 => 'menu vertical',
			'name'		  => __( 'Footer 3 Widgets', 'ta' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
	}
	add_action( 'widgets_init', 'ta_sidebars' );

	function custom_walker_nav_menu_start_el($item_output, $item, $depth, $args){
	  $output = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 40" width="100" height="40" preserveAspectRatio="xMidYMid meet"><path class="menulink" d="M9.5,39.2H94c2.9,0,5.2-2.3,5.2-5.2V6.5c0-2.9-2.3-5.2-5.2-5.2H5.9C3,1.3,0.7,3.7,0.7,6.5V34 c0,2.9,2.3,5.2,5.2,5.2H9.5" style="stroke-linecap: round; stroke-linejoin: round;" fill="none" stroke="#ffffff" stroke-width="2" /></svg>';
	  $output .= $item_output;
	  return $output;
	}
	add_filter( 'walker_nav_menu_start_el', 'custom_walker_nav_menu_start_el' , 10, 4 );

	class F6_TOPBAR_MENU_WALKER extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
	        $indent = str_repeat("\t", $depth);
	        $output .= "\n$indent<ul class=\"vertical menu\" data-submenu>\n";
	        $output .= 'foo';
	        return $output;
	    }
	}

	function f6_topbar_menu_fallback($args) {
	    $walker_page = new Walker_Page();
	    $fallback = $walker_page->walk(get_pages(), 0);
	    $fallback = str_replace("<ul class='children'>", '<ul class="children submenu menu vertical" data-submenu>', $fallback);
	    echo '<ul class="dropdown menu" data-dropdown-menu>'.$fallback.'</ul>';
	}

	class F6_DRILL_MENU_WALKER extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
	        $indent = str_repeat("\t", $depth);
	        $output .= "\n$indent<ul class=\"vertical menu\">\n";
	    }
	}
	function f6_drill_menu_fallback($args) {
	    $walker_page = new Walker_Page();
	    $fallback = $walker_page->walk(get_pages(), 0);
	    $fallback = str_replace("children", "children vertical menu", $fallback);
	    echo '<ul class="vertical menu" data-drilldown="">'.$fallback.'</ul>';
	}

	function transmission_pagination($before = '', $after = '') {
		global $wpdb, $wp_query;
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if ( $numposts <= $posts_per_page ) { return; }
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = 7;
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		echo $before.'<nav class="page-navigation"><ul class="pagination">'."";
		if ($start_page >= 2 && $pages_to_show < $max_page) {
			$first_page_text = __( 'First' );
			echo '<li><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
		}
		echo '<li>';
		previous_posts_link( __('Previous') );
		echo '</li>';
		for($i = $start_page; $i  <= $end_page; $i++) {
			if($i == $paged) {
				echo '<li class="current"> '.$i.' </li>';
			} else {
				echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
			}
		}
		echo '<li>';
		next_posts_link( __('Next'), 0 );
		echo '</li>';
		if ($end_page < $max_page) {
			$last_page_text = __('Last');
			echo '<li><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
		}
		echo '</ul></nav>'.$after."";
	}

	add_action( 'dashboard_glance_items', 'my_add_cpt_to_dashboard' );
	function my_add_cpt_to_dashboard() {
		$showTaxonomies = 1;
		if ($showTaxonomies) {
			$taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );
			foreach ( $taxonomies as $taxonomy ) {
				$num_terms	= wp_count_terms( $taxonomy->name );
				$num = number_format_i18n( $num_terms );
				$text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms );
				$associated_post_type = $taxonomy->object_type;
				if ( current_user_can( 'manage_categories' ) ) {
					$output = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . ' ' . $text .'</a>';
				}
				echo '<li class="taxonomy-count">' . $output . ' </li>';
			}
		}
		// Custom post types counts
		$post_types = get_post_types( array( '_builtin' => false ), 'objects' );
		foreach ( $post_types as $post_type ) {
			if($post_type->show_in_menu==false) {
				continue;
			}
			$num_posts = wp_count_posts( $post_type->name );
			$num = number_format_i18n( $num_posts->publish );
			$text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
			if ( current_user_can( 'edit_posts' ) ) {
				$output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
			}
			echo '<li class="page-count ' . $post_type->name . '-count">' . $output . '</td>';
		}
	}

	function add_menu_icons_styles(){

		echo '<style>
		#dashboard_right_now .feedback-count a:before {
			content: "\f101";
		}
		#dashboard_right_now .taxonomy-count a:before {
			content: "\f323";
		}
		#dashboard_right_now .client-count a:before {
			content: "\f309";
		}
		#dashboard_right_now .people-count a:before {
			content: "\f507";
		}
		</style>';

	}
	add_action( 'admin_head', 'add_menu_icons_styles' );

	function custom_posts_per_page( $query ) {
	    if ( $query->is_archive('cog') && $query->is_main_query() ) {
	        $query->set( 'posts_per_page', '-1' );
	    }
	}
	add_action( 'pre_get_posts', 'custom_posts_per_page' );

	function duplicate_post(){
		global $wpdb;
		if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'duplicate_post' == $_REQUEST['action'] ) ) ) {
			wp_die('No post to duplicate has been supplied!');
		}
		if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
			return;
		$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
		$post = get_post( $post_id );
		$current_user = wp_get_current_user();
		$new_post_author = $current_user->ID;
		if (isset( $post ) && $post != null) {
			$args = array(
				'comment_status' => $post->comment_status,
				'ping_status'    => $post->ping_status,
				'post_author'    => $new_post_author,
				'post_content'   => $post->post_content,
				'post_excerpt'   => $post->post_excerpt,
				'post_name'      => $post->post_name,
				'post_parent'    => $post->post_parent,
				'post_password'  => $post->post_password,
				'post_status'    => 'draft',
				'post_title'     => $post->post_title,
				'post_type'      => $post->post_type,
				'to_ping'        => $post->to_ping,
				'menu_order'     => $post->menu_order
			);
			$new_post_id = wp_insert_post( $args );
			$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
			foreach ($taxonomies as $taxonomy) {
				$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
				wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
			}
			$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
			if (count($post_meta_infos)!=0) {
				$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
				foreach ($post_meta_infos as $meta_info) {
					$meta_key = $meta_info->meta_key;
					if( $meta_key == '_wp_old_slug' ) continue;
					$meta_value = addslashes($meta_info->meta_value);
					$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
				}
				$sql_query.= implode(" UNION ALL ", $sql_query_sel);
				$wpdb->query($sql_query);
			}
			wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
			exit;
		} else {
			wp_die('Post creation failed, could not find original post: ' . $post_id);
		}
	}
	add_action( 'admin_action_duplicate_post', 'duplicate_post' );

	function duplicate_post_link( $actions, $post ) {
		if (current_user_can('edit_posts')) {
			$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=duplicate_post&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
		}
		return $actions;
	}
	add_filter( 'post_row_actions', 'duplicate_post_link', 10, 2 );

	function the_title_trim($title) {
		$title = attribute_escape($title);
		$findthese = array(
			'#Protected:#',
			'#Private:#'
		);
		$replacewith = array(
			'',
			''
		);
		$title = preg_replace($findthese, $replacewith, $title);
		return $title;
	}
	add_filter('the_title', 'the_title_trim');

	function remove_menus(){
		remove_menu_page( 'link-manager.php' );
	}
	add_action( 'admin_menu', 'remove_menus' );

	add_filter('nav_menu_css_class', 'mytheme_custom_type_nav_class', 10, 2);
	function mytheme_custom_type_nav_class($classes, $item) {
		$post_type = get_post_type();
		if ($post_type != 'post' && $item->object_id == get_option('page_for_posts')) {
	    	$current_value = "current_page_parent";
	    	$classes = array_filter($classes, function ($element) use ($current_value) { return ($element != $current_value); } );
		}
		$this_type_class = 'post-type-' . $post_type;
		if (in_array( $this_type_class, $classes )) {
	    	array_push($classes, 'current_page_parent');
		};
		return $classes;
	}

	function remove_footer_admin () {
		echo '&copy; '. date('Y') . ' Transmission. Theme built by <a href="https://www.prydonian.digital" target="_blank">Prydonian Digital</a>.';
	}
	add_filter('admin_footer_text', 'remove_footer_admin');

	add_action( 'admin_menu', 'rename_posts_menu_label' );
	add_action( 'init', 'rename_posts_object_label' );
	function rename_posts_menu_label() {
		global $menu;
		global $submenu;
		$menu[5][0] = 'Insights';
		$submenu['edit.php'][5][0] = 'Insights';
		$submenu['edit.php'][10][0] = 'Add Insight';
		$submenu['edit.php'][16][0] = 'Insight Tags';
		echo '';
	}
	function rename_posts_object_label() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'Insights';
		$labels->singular_name = 'Insights';
		$labels->add_new = 'Add Insight';
		$labels->add_new_item = 'Add Insight';
		$labels->edit_item = 'Edit Insight';
		$labels->new_item = 'Insight';
		$labels->view_item = 'View Insights';
		$labels->search_items = 'Search Insights';
		$labels->not_found = 'No Insights found';
		$labels->not_found_in_trash = 'No Insights found in Trash';
	}

	function user_the_categories() {
	    global $cats;
	    $cats = get_the_category();
	    echo $cats[0]->cat_name;
	    for ($i = 1; $i < count($cats); $i++) {echo ', ' . $cats[$i]->cat_name ;}
	}

	add_filter( 'disable_wpseo_json_ld_search', '__return_true' );
	add_filter( 'wpseo_json_ld_output', '__return_empty_array' );