<?php get_header(); ?>

<div class="blogPosts">

<div class="row small-up-1 medium-up-2 align-top">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div <?php post_class( 'column text-center animated fadeInUp excerpt' ); ?>>
		<a href="<?php the_permalink(); ?>">
			<div class="link">
				<?php the_post_thumbnail( 'insight' ); ?>
			</div>
			<div class="textInsert">
				<h4><?php the_title(); ?></h4>
				<?php the_excerpt(); ?>
			</div>
		</a>
	</div>

	<?php endwhile; ?>

	<?php endif; ?>

</div>

<div class="row small-up-1">
	<div class="small-12 column align-center">
		<?php if ( function_exists('transmission_pagination') ) { transmission_pagination(); } ?>
	</div>
</div>

</div>

<?php get_footer(); ?>