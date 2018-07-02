<?php
	/*
		Template Name: Home Page
	*/
	get_header();
?>

<div class="animateSVG">
	<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1680 750" width="1680" height="750" preserveAspectRatio="xMidYMid meet">
		<path id="transmission" style="stroke-linecap: round; stroke-linejoin: round;" fill="none" stroke="#4f535e" stroke-width="2" d="M0,214.3h563c14.4,0,26-11.7,26-26v-158c0-14.4-11.7-26-26-26h-61.9c-14.4,0-26,11.7-26,26v245.5
	c0,14.4,11.7,26,26,26H1162c14.4,0,26,11.7,26,26v392.1c0,14.4-11.7,26-26,26H518c-14.4,0-26-11.7-26-26v-333
	c0-14.4,11.7-26,26.1-26l1250.2,0.6"/>
	</svg>
</div>

<div class="row">
	<div class="small-12 medium-6 medium-offset-3 columns text-center tagline homeTop">
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

<div class="row align-middle">
	<div class="small-12 medium-8 medium-offset-2 columns text-center tagline paroller">
		<div class="the_home_tagline" id="secondaryText">
			<?php $secondary = get_post_meta($post->ID, '_home_secondary', true); echo wpautop($secondary); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="small-12 medium-8 medium-offset-2 columns">
<div class="row small-up-1 medium-up-3 align-middle">
	<?php global $post; $entries = get_post_meta( $post->ID, '_home_link', true );
		foreach ( (array) $entries as $key => $entry ) {
			$title = $url = $icon = '';
		if ( isset( $entry['_home_title'] ) ) {
			$title = esc_html( $entry['_home_title'] );
		}
		if ( isset( $entry['_home_icon'] ) ) {
			$icon = esc_html( $entry['_home_icon'] );
		}

		if ( isset( $entry['_home_url'] ) ) {
			$url = esc_html( $entry['_home_url'] );
		}
	?>
	<div class="column text-center">
		<a href="<?php echo $url; ?>" class="subPage">
			<h5><i class="material-icons"><?php echo $icon; ?></i><br/><?php echo $title; ?></h5>
		</a>
	</div>
	<?php } ?>
</div>
	</div>

</div>

<?php
	$args = array(
		'post_type'			=> 'clients',
		'posts_per_page'	=> -1
	);
	$clients = new WP_Query( $args );
?>
<?php if ($clients->have_posts()) :
?>
<div class="ourClients">
	<div class="row" id="clients">
		<div class="small-12 columns text-center">
			<h4>Our Clients</h4>
		</div>
	</div>
	<div class="row small-up-1 medium-up-4 align-middle align-center" id="clients">
		<?php
			while ($clients->have_posts()) : $clients->the_post();
			$url = get_post_meta( $post->ID, '_client_url', true );
		?>
		<div class="column text-center">
			<?php
				if( $url !='' ) {
			?>
			<a href="<?php echo $url; ?>" target="_blank">
			<?php
				}
			?>
			<?php the_post_thumbnail( 'client' ); ?>
			<?php
				if( $url !='' ) {
			?>
			</a>
			<?php
				}
			?>
		</div>
		<?php endwhile; ?>
	</div>
</div>
<?php endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>