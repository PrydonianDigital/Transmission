<?php ?>
<?php


?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php
	$ga = get_theme_mod( 'ta_ga' );
	if($ga != '') {
?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo $ga; ?>');
</script>


<?php
	}
	global $post;
	require_once 'Mobile_Detect.php';
	$detect = new Mobile_Detect;
?>
	<meta name="google-site-verification" content="ChZoOfX7wqzifcYmSOip9Zgq0erVx_M_1_ncN0lKeuY" />
</head>

<body <?php body_class(); ?>>

<!-- Site by Prydonian Digital https://prydonian.digital -->

<div class="off-canvas-wrapper">
	<div class="off-canvas position-left" id="blueskyeMenu" data-off-canvas>
		<?php
			wp_nav_menu(array(
	            'container' => false,
	            'menu' => __( 'Mobile Bar Menu', 'textdomain' ),
	            'menu_class' => 'vertical menu',
	            'theme_location' => 'mobile-menu',
	            'items_wrap'      => '<ul id="%1$s" class="%2$s" data-drilldown="">%3$s</ul>',
	            'fallback_cb' => 'f6_drill_menu_fallback',
	            'walker' => new F6_DRILL_MENU_WALKER(),
	        ));
		?>
	</div>
	<div class="off-canvas-content" data-off-canvas-content>

			<div class="title-bar" data-responsive-toggle="blueskyeMenu" data-hide-for="medium">
				<button class="menu-icon" type="button" data-toggle="blueskyeMenu">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</button>
				<span class="title-bar-title"><?php the_custom_logo(); ?></span>
			</div>
			<div class="container">
				<?php
					if(is_front_page()) {
				?>
				<header id="homeHeader" class="site-header" role="banner">
					<div class="wp-custom-header">
						<?php get_template_part( 'parts/home', 'carousel' ); ?>
					</div>
					<div class="row site-info align-middle">
						<div class="small-12 columns text-center">
							<a href="<?php echo get_bloginfo( 'url' ); ?>"><img src="<?php echo get_theme_mod( 'ta_logo' ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" class="animated fadeInUp"></a>
							<h3 class="site-tagline animated fadeInDown"><?php echo get_theme_mod( 'ta_tagline' ); ?></h3>
						</div>
					</div>
					<a href="#content" class="menu-scroll-down"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
				</header>
				<div data-sticky-container>
				<div class="top-bar home hide-for-small-only" data-hide-for="small" data-sticky data-options="marginTop:0;" style="width:100%" data-top-anchor="content" data-btm-anchor="content:bottom">
					<div class="top-bar-left">
						<?php the_custom_logo(); ?>
					</div>
					<div class="top-bar-center">
						<?php
							wp_nav_menu(array(
					            'container' => false,
					            'menu' => __( 'Top Bar Menu', 'ta' ),
					            'menu_class' => 'dropdown menu',
					            'theme_location' => 'topbar-Right',
					            'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown-menu data-menu-underline-from-center>%3$s</ul>',
					            'fallback_cb' => 'f6_topbar_menu_fallback',
					            'walker' => new F6_TOPBAR_MENU_WALKER(),
					        ));
						?>
					</div>
					<div class="top-bar-right">
						&nbsp;
					</div>
				</div>
				</div>
				<?php } else { ?>
				<div data-sticky-container>
				<div class="top-bar hide-for-small-only" data-hide-for="small" data-sticky data-options="marginTop:0;" style="width:100%" data-top-anchor="1" data-btm-anchor="content:bottom">
					<div class="top-bar-left">
						<?php the_custom_logo(); ?>
					</div>
					<div class="top-bar-center">
						<?php
							wp_nav_menu(array(
					            'container' => false,
					            'menu' => __( 'Top Bar Menu', 'ta' ),
					            'menu_class' => 'dropdown menu',
					            'theme_location' => 'topbar-Right',
					            'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown-menu data-menu-underline-from-center>%3$s</ul>',
					            'fallback_cb' => 'f6_topbar_menu_fallback',
					            'walker' => new Walker_Nav_Menu(),
					        ));
						?>
					</div>
					<div class="top-bar-right">
						&nbsp;
					</div>
				</div>
				</div>
				<header id="header" class="site-header" role="banner">
					<?php $dl = get_post_meta($post->ID, '_dl_dl', true); ?>
					<?php
						if( is_page( 'Contact Us' ) ){
					?>
					<div class="row align-middle serviceTop">
						<div class="small-12 columns text-center">
							<h3 class="page-header animated fadeInUp <?php echo $dl; ?>"><?php the_title(); ?></h3>
							<h5 class="page-tagline animated fadeInDown <?php echo $dl; ?>"><?php $tagline = get_post_meta($post->ID, '_page_tag', true); echo $tagline; ?></h5>
						</div>
					</div>
					<?php
						} elseif( is_page() ){
					?>
					<div class="bg">
						<div class="pageImage" style="background: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'bg' ); ?>); background-position: center center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
						<?php
							if( $detect->isMobile() && !$detect->isTablet() ){} else {
							$video = get_post_meta($post->ID, '_page_video', true);
							if( $video != '' ) {
						?>
						<video poster="<?php echo get_the_post_thumbnail_url( $post->ID, 'bg' ); ?>" autoplay="autoplay" preload="metadata" loop="loop" muted="muted" controls="none" id="headerVid">
							<source src="<?php echo $video; ?>" type="video/mp4" />
						</video>
						<?php
							}
							}
						?>
							<div class="row align-middle">
								<div class="small-12 columns text-center">
									<h3 class="page-header animated fadeInUp <?php echo $dl; ?>"><?php the_title(); ?></h3>
									<h5 class="page-tagline animated fadeInDown <?php echo $dl; ?>"><?php $tagline = get_post_meta($post->ID, '_page_tag', true); echo $tagline; ?></h5>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					?>
					<?php
						if( is_post_type_archive( 'services' ) ){
					?>
					<div class="pageImage" style="background: url(<?php echo get_theme_mod( 'ta_bg' ); ?>); background-position: center center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
						<?php
							$video = get_theme_mod( 'ta_services_vid' );
							if( $video != '' ) {
						?>
						<video poster="<?php echo get_theme_mod( 'ta_bg' ); ?>" autoplay="autoplay" preload="metadata" loop="loop" muted="muted" controls="none" id="headerVid">
							<source src="<?php echo wp_get_attachment_url(get_theme_mod( 'ta_services_vid' )); ?>" type="video/mp4" />
						</video>
						<?php
							}
						?>
						<div class="overlay">
							<div class="row align-middle">
								<div class="small-12 columns text-center">
									<h3 class="page-header animated fadeInUp on"><?php echo post_type_archive_title(); ?></h3>
									<h5 class="page-tagline animated fadeInDown on"><?php echo get_theme_mod( 'ta_post' ); ?></h5>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					?>
					<?php
						if( is_post_type_archive( 'team' ) ){
					?>
					<div class="row align-middle serviceTop">
						<div class="small-12 columns text-center">
							<h3 class="page-header animated fadeInUp"><?php echo post_type_archive_title(); ?></h3>
							<h5 class="page-tagline animated fadeInDown"><?php echo get_theme_mod( 'ta_teamtag' ); ?></h5>
						</div>
					</div>
					<?php
						}
					?>
					<?php
						if( is_category() ){
					?>
					<div class="row align-middle serviceTop">
						<div class="small-12 columns text-center">
							<h3 class="page-header animated fadeInUp"><?php single_cat_title(); ?></h3>
							<h5 class="page-tagline animated fadeInDown"><?php echo category_description(); ?></h5>
						</div>
					</div>
					<?php
						}
					?>
					<?php
						if( is_home() ){
					?>
					<div class="row align-middle serviceTop">
						<div class="small-12 columns text-center">
							<h3 class="page-header animated fadeInUp"><?php echo get_theme_mod( 'ta_blog_title' ); ?></h3>
							<h5 class="page-tagline animated fadeInDown"><?php echo get_theme_mod( 'ta_blog_tagline' ); ?></h5>
						</div>
					</div>
					<?php
						}
					?>
					<?php
						if( 'services' == get_post_type() && is_singular( 'services' ) ){
					?>
					<div class="pageImage" style="background: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'bg' ); ?>); background-position: center center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
						<?php
							if( $detect->isMobile() && !$detect->isTablet() ){} else {
							$video = get_post_meta( $post->ID, '_service_vid', true );
							if( $video != '' ) {
						?>
						<video poster="<?php echo get_the_post_thumbnail_url( $post->ID, 'bg' ); ?>" autoplay="autoplay" preload="metadata" loop="loop" muted="muted" controls="none" id="headerVid">
							<source src="<?php echo $video; ?>" type="video/mp4" />
						</video>
						<?php
							}
							}
						?>
							<div class="row align-middle">
								<div class="small-12 columns text-center">
									<h3 class="page-header animated fadeInUp <?php echo $dl; ?>"><?php the_title(); ?></h3>
									<h5 class="page-tagline animated fadeInDown <?php echo $dl; ?>"><?php $tagline = get_post_meta($post->ID, '_service_tag', true); echo $tagline; ?></h5>
								</div>
							</div>
					</div>
					<?php
						}
					?>
					<?php
						if( 'team' == get_post_type() && is_singular( 'team' ) ){
					?>
					<div class="pageImage" style="background: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'bg' ); ?>); background-position: center center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
						<div class="row align-middle">
							<div class="small-12 columns text-center">
								<h3 class="page-header animated fadeInUp <?php echo $dl; ?>"><?php the_title(); ?></h3>
								<h5 class="page-tagline animated fadeInDown <?php echo $dl; ?>"><?php $tagline = get_post_meta($post->ID, '_team_tag', true); echo $tagline; ?></h5>
							</div>
						</div>
					</div>
					<?php
						}
					?>
					<?php
						if( 'post' == get_post_type() && is_singular() ){
					?>
					<div class="pageImage" style="background: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'bg' ); ?>); background-position: center center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
						<div class="row align-middle">
							<div class="small-12 columns text-center">
								<h3 class="page-header animated fadeInUp <?php echo $dl; ?>"><?php the_title(); ?></h3>
								<h5 class="page-tagline animated fadeInDown <?php echo $dl; ?>"><?php the_category( ', ' ); ?></h5>
							</div>
						</div>
					</div>
					<?php
						}
					?>
					<?php
						if( is_404() ){
					?>
					<div class="row align-middle serviceTop">
						<div class="small-12 columns text-center">
							<h3 class="page-header animated fadeInUp <?php echo $dl; ?>"><?php echo get_theme_mod( 'ta_404title' ); ?></h3>
							<h5 class="page-tagline animated fadeInDown <?php echo $dl; ?>"><?php echo get_theme_mod( 'ta_404tagline' ); ?></h5>
						</div>
					</div>
					<?php
						}
					?>
				</header>
				<?php } ?>
				<div class="content" id="content">