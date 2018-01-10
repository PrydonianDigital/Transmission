<?php
	/*
		Template Name: About Page
	*/
	get_header();
?>

<section class="marketing-site-three-up">

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
		<div class="row">
			<div class="small-12 medium-8 medium-offset-2 columns">
				<?php the_content(); ?>
			</div>
		</div>

	<?php endwhile; ?>

	<?php endif; ?>
	<div class="row expanded medium-unstack">
		<?php
			$entries = get_post_meta($post->ID, '_team_section', true);
			foreach ( (array) $entries as $key => $entry ) {
				$text = $icon = '';
				if ( isset( $entry['_team_text'] ) ) {
					$text = wpautop( $entry['_team_text'] );
				}
				if ( isset( $entry['_team_icon'] ) ) {
					$icon = esc_html( $entry['_team_icon'] );
				}
		?>
		<div class="columns">
			<h1 class="icon"><i class="material-icons"><?php echo $icon; ?></i></h1>
			<?php echo $text; ?>
		</div>
		<?php
			}
		?>
	</div>

</section>


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