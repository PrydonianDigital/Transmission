<?php get_header(); ?>

<div class="services" style="background: url(<?php echo get_theme_mod('ta_bg'); ?>); background-position: center center; background-repeat: no-repeat; background-attachment: fixed;">

<div class="row small-up-1 medium-up-3 align-middle">



<?php
	$args = array(
		'post_type'			=> 'services',
		'order'				=> 'ASC',
		'orderby'			=>	'menu_order',
		'posts_per_page'	=> -1
	);
	$services = new WP_Query( $args );
	if ($services->have_posts()) : while ($services->have_posts()) : $services->the_post();
?>

	<div class="column text-center animated fadeInUp" style="-webkit-animation-delay: 0.<?php echo get_post_field( 'menu_order', $post->ID); ?>s;-moz-animation-delay: 0.<?php echo get_post_field( 'menu_order', $post->ID); ?>s;-ms-animation-delay: 0.<?php echo get_post_field( 'menu_order', $post->ID); ?>s;animation-delay: 0.<?php echo get_post_field( 'menu_order', $post->ID); ?>s;">
		<a href="<?php the_permalink(); ?>">
		<div class="service">
			<h3><?php the_title(); ?></h3>
		</div>
		</a>
	</div>

<?php endwhile; ?>

<?php endif; ?>

</div>

</div>

<?php get_footer(); ?>