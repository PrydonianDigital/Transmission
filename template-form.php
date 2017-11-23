<?php
	/**
	*	Template Name: Campaign Page
	**/
	get_header();
?>

<meta name="robots" content="noindex, nofollow" />

<div class="row formPage align-top">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="small-12 medium-6 columns text-center align-self-top">
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

		</div>

		<div class="small-12 medium-6 columns text-center align-self-top">

			<?php $secondary = get_post_meta($post->ID, '_page_form', true); echo do_shortcode($secondary); ?>

		</div>

		<?php endwhile; ?>

		<?php endif; ?>

</div>

<?php get_footer(); ?>