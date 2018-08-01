<?php
	/*
		Template Name: ABM Thank You
	*/
	get_header();
?>

<div class="row">

	<div class="small-12 medium-10 medium-offset-1 columns text-center">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<script type="application/ld+json">
			{
			  "@context": "http://schema.org",
			  "@type": "WebSite",
			  "url": "<?php the_permalink(); ?>",
			  "name": "<?php the_title(); ?>",
			   "author": {
			      "@type": "Person",
			      "name": "<?php the_author_meta('display_name'); ?>"
			    },
			  "description": "<?php the_excerpt(); ?>",
			  "publisher": "<?php bloginfo('title'); ?>"
			}
			</script>

			<?php the_content(); ?>

<div class="blogPosts">

<div class="row small-up-1 medium-up-2 align-top">

	<?php
		$args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> 2
		);
		$insights = new WP_Query( $args );
		if ($insights->have_posts()) : while ($insights->have_posts()) : $insights->the_post();
	?>

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

		<?php endwhile; ?>

		<?php endif; ?>

	</div>

</div>



<?php get_footer(); ?>