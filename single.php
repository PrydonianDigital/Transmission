<?php get_header(); ?>

<div class="row small-up-1 align-top">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<script type="application/ld+json">
	{
	  "@context": "http://schema.org",
	  "@type": "NewsArticle",
	  "mainEntityOfPage": {
	    "@type": "WebPage",
	    "@id": "https://google.com/article"
	  },
	  "headline": "<?php the_title(); ?>",
	  "image": [
	    "<?php if(has_post_thumbnail()) { echo get_the_post_thumbnail_url($post->ID,'full'); } else { ?>https://abmguru.com/wp-content/uploads/2017/03/cropped-ABMGURU_PULSE_POWERED.png<?php } ?>"
	   ],
	  "datePublished": "<?php the_date( 'c' ); ?>",
	  "dateModified": "<?php the_modified_date( 'c' ); ?>",
	  "author": {
	    "@type": "Person",
	    "name": "<?php the_author_meta( 'display_name' ); ?>"
	  },
	   "publisher": {
	    "@type": "Organization",
	    "name": "<?php echo bloginfo( 'name' ); ?>",
	    "logo": {
	      "@type": "ImageObject",
	      "url": "<?php $custom_logo_id = get_theme_mod( 'custom_logo' ); $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); echo $image[0]; ?>"
	    }
	  },
	  "description": "<?php the_excerpt(); ?>"
	}
</script>
	<div <?php post_class( 'column animated fadeInUp text-center' ); ?>>
		<?php the_content(); ?>
	</div>

	<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php get_footer(); ?>