<?php get_header(); ?>

<div class="row small-up-1 medium-up-3 align-center teamMembers">

<?php
	$args = array(
		'post_type'			=> 'team',
		'order'				=> 'ASC',
		'orderby'			=>	'menu_order',
		'posts_per_page'	=> -1
	);
	$services = new WP_Query( $args );
	if ($services->have_posts()) : while ($services->have_posts()) : $services->the_post();
?>

	<div class="column text-center animated fadeInUp" style="-webkit-animation-delay: 0.<?php echo get_post_field( 'menu_order', $post->ID); ?>s;-moz-animation-delay: 0.<?php echo get_post_field( 'menu_order', $post->ID); ?>s;-ms-animation-delay: 0.<?php echo get_post_field( 'menu_order', $post->ID); ?>s;animation-delay: 0.<?php echo get_post_field( 'menu_order', $post->ID); ?>s;">
		<div class="teamMember">
			<?php the_post_thumbnail( 'sub' ); ?>
			<h4><?php the_title(); ?></h4>
			<?php $job = get_post_meta( $post->ID, '_teamInfo_job' ,true ); if( $job != '' ) { ?>
			<h5><?php echo $job; ?></h5>
			<?php } ?>
		</div>
	</div>

<?php endwhile; ?>

<?php endif; ?>

</div>

<?php get_footer(); ?>