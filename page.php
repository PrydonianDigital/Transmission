<?php get_header(); ?>

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

		<?php endwhile; ?>

		<?php endif; ?>

	</div>

</div>

<?php
	if( is_page( 'About Us' ) ) {
		$showteam = get_post_meta( $post->ID, '_team_show', true );
		if( $showteam == 'on' ) {
			get_template_part( 'parts/about', 'team' );
		}
	}
	if( is_page( 'Contact' ) ) {
		get_template_part( 'parts/contact', 'us' );
	}
?>

<?php get_footer(); ?>