<?php get_header(); ?>

<div class="row align-middle" id="error404">

	<div class="small-12 medium-10 medium-offset-1 columns text-center">

		<?php echo wpautop( get_theme_mod( 'ta_404content' ) ); ?>

	</div>

</div>

<?php get_footer(); ?>