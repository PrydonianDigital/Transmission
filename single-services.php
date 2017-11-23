<?php get_header(); ?>

<div class="row">
	<div class="small-12 medium-10 medium-offset-1 columns text-center">
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
	    "<?php echo get_the_post_thumbnail_url($post->ID,'full'); ?>"
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
			<?php the_content(); ?>
			<?php
				$entries = get_post_meta($post->ID, '_service_tab', true);
				if( $entries == '' ) { ?>
<div class="row small-up-1 medium-up-4 align-center" id="tabs"><div class="small-12 columns"></div></div>
			<?php } else { ?>

			<div class="row">
				<div class="small-12 columns">
					<div class="row small-up-1 medium-up-4 align-center" id="tabs">
			<?php
				foreach ( (array) $entries as $key => $entry ) {
					$title = $text = '';
					if ( isset( $entry['_service_title'] ) ) {
						$title = esc_html( $entry['_service_title'] );
					}
					if ( isset( $entry['_service_text'] ) ) {
						$text = wpautop( $entry['_service_text'] );
					}
			?>
					<div class="column">
						<div class="serviceTitle" data-id="<?php echo $key; ?>" data-post="<?php the_ID(); ?>">
							<svg width="178" height="50"><path id="servicelink" d="M9.8,49h162c2.9,0,5.2-2.3,5.2-5.2V6.2c0-2.9-2.3-5.2-5.2-5.2H6.2C3.3,1,1,3.3,1,6.2v37.6C1,46.7,3.3,49,6.2,49 H9.8" fill="none" stroke="#4f535e" stroke-width="2" /></svg>
							<?php echo $title; ?>
						</div>
					</div>
			<?php
				}
			?>
					</div>
				</div>
			</div>

			<div class="row">

				<div class="small-12 columns">
					<div id="serviceContent">
						<div class="row" id="tabsContent">
						<?php
							foreach ( (array) $entries as $key => $entry ) {
								$title = $text = '';
								if ( isset( $entry['_service_title'] ) ) {
									$title = esc_html( $entry['_service_title'] );
								}
								if ( isset( $entry['_service_text'] ) ) {
									$text = wpautop( $entry['_service_text'] );
								}
						?>

							<div class="small-12 columns animated hide" data-id="<?php echo $key; ?>">
								<?php echo $text; ?>
							</div>
						<?php
							}
						?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php endwhile; ?>

		<?php endif; ?>
	</div>
</div>



<?php get_footer(); ?>