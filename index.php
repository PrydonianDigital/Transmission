<?php get_header(); ?>

<div class="row small-up-1 medium-up-2 align-top">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div <?php post_class( 'column text-center animated fadeInUp' ); ?>>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'insight' ); ?></a>
		<?php the_category( ', ' ); ?>
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	</div>

	<?php endwhile; ?>

	<?php endif; ?>

</div>

<div class="row small-up-1">
	<div class="small-12  column align-center">
		<?php if ( function_exists('transmission_pagination') ) { transmission_pagination(); } ?>
	</div>
</div>

<?php get_footer(); ?>