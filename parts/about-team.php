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
		<h4>The Team</h4>
	</div>
</div>
<div class="row small-up-1 medium-up-3 align-center" id="teamMembers">
	<?php
		while ($team->have_posts()) : $team->the_post();
	?>
	<div class="column text-center">
		<div class="teamMember">
			<?php the_post_thumbnail( 'sub' ); ?>
			<h4><?php the_title(); ?></h4>
			<?php $job = get_post_meta( $post->ID, '_teamInfo_job' ,true ); if( $job != '' ) { ?>
			<h5><?php echo $job; ?></h5>
			<?php } ?>		</div>
	</div>
	<?php endwhile; ?>
</div>
	<?php endif; ?>