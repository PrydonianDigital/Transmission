	<?php
		$args = array(
			'post_type'			=> 'team',
			'posts_per_page'	=> -1,
			'order'				=> 'ASC',
			'orderby'			=>	'menu_order',
		);
		$team = new WP_Query( $args );
	?>
	<?php if ($team->have_posts()) :
	?>
<div class="row" id="team">
	<div class="small-12 columns text-center">
		<h4>Leadership</h4>
	</div>
</div>
<div class="row small-up-1 align-center" id="teamMembers">
	<?php
		while ($team->have_posts()) : $team->the_post();
	?>
	<div class="column card-profile-stats">
		<div class="row align-middle">
			<div class="small-12 medium-2 columns text-center">
				<img class="avatar-img" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'sub' ); ?>" alt="profile-image" />
				<h5><?php the_title(); ?></h5>
				<?php $job = get_post_meta( $post->ID, '_teamInfo_job' ,true ); if( $job != '' ) { ?>
				<p><small><?php echo $job; ?></small></p>
				<?php } ?>
			</div>
			<div class="small-12 medium-10 columns">
				<div class="profile-desc">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
	<!--div class="column text-center">
				<div class="card-profile-stats">
					<div class="card-profile-stats-intro">
						<img class="card-profile-stats-intro-pic" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'sub' ); ?>" alt="profile-image" />
						<div class="card-profile-stats-intro-content">
							<h5><?php the_title(); ?></h5>
							<?php $job = get_post_meta( $post->ID, '_teamInfo_job' ,true ); if( $job != '' ) { ?>
							<p><small><?php echo $job; ?></small></p>
							<?php } ?>
						</div>
					</div>
					<hr />
					<div class="card-profile-stats-container">
						<div class="card-profile-stats-statistic">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
	</div-->
	<?php endwhile; ?>
</div>
	<?php endif; ?>