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
		<?php
			$author = get_post_meta( get_the_ID(), '_author_author', true );
			$noauthor = get_post_meta( get_the_ID(), '_author_noauthor', true );
			$authorCard = get_post( $author );
			if($noauthor === '') {
		?>
		<div class="row">
			<div class="small-12 medium-10 medium-offset-1 columns">
				<div class="column card-profile-stats">
					<div class="row align-middle">
						<div class="small-12 medium-3 columns text-center">
							<img class="avatar-img" src="<?php echo get_the_post_thumbnail_url( $authorCard->ID, 'sub' ); ?>" alt="profile-image" />
							<h5><?php echo $authorCard->post_title; ?></h5>
							<?php $job = get_post_meta( $author, '_teamInfo_job', true ); if( $job != '' ) { ?>
							<p><small><?php echo $job; ?></small></p>
							<?php } ?>
						</div>
						<div class="small-12 medium-9 columns">
							<div class="profile-desc">
								<?php $output =  apply_filters( 'the_content', $authorCard->post_content ); echo $output; ?>
							</div>
						</div>
					</div>
				</div>
				<!--div class="card-profile-stats">
					<div class="card-profile-stats-intro">
						<img class="card-profile-stats-intro-pic" src="<?php echo get_the_post_thumbnail_url( $authorCard->ID, 'sub' ); ?>" alt="profile-image" />
						<div class="card-profile-stats-intro-content">
							<h5><?php echo $authorCard->post_title; ?></h5>
							<p><small><?php $job = get_post_meta( $author, '_teamInfo_job', true ); echo $job; ?></small></p>
						</div>
					</div>
					<hr />
					<div class="card-profile-stats-container">
						<div class="card-profile-stats-statistic">
							<?php $output =  apply_filters( 'the_content', $authorCard->post_content ); echo $output; ?>
						</div>
					</div>
				</div-->
			</div>
		</div>
		<?php
			} else {
		?>
		<div class="row">
			<div class="small-12 medium-10 medium-offset-1 columns text-center">
				<p><img src="https://transmissionagency.com/wp-content/uploads/2018/01/TR_LOGO_200x200.png"><br/>
				CONNECTING THE WORLD OF BUSINESS MARKETING</p>
			</div>
		</div>
		<?php
			}
		?>

	</div>

	<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php get_footer(); ?>