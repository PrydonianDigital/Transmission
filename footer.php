			<?php
				if(is_page( 'contact' )) {
			?>
			<div class="row expanded">
				<div class="small-12">
					<div id="map"></div>
				</div>
			</div>
			<?php
				}
			?>
			<div id="getInTouch">
				<a href="<?php echo get_theme_mod( 'ta_button' ); ?>"><?php echo get_theme_mod( 'ta_button_text' ); ?></a>
			</div>
			<div id="footer">
				<div class="row">
					<div class="small-12 medium-4 columns text-center">
						<ul class="widget">
						<?php if ( ! dynamic_sidebar('footer1') ) : ?>
							<li>{static sidebar item 1}</li>
						<?php endif; ?>
						</ul>
					</div>
					<div class="small-12 medium-4 columns text-center">
						<ul class="widget">
						<?php if ( ! dynamic_sidebar('footer2') ) : ?>
							<li>{static sidebar item 1}</li>
						<?php endif; ?>
						</ul>

					</div>
					<div class="small-12 medium-4 columns text-center">
						<ul class="widget">
						<?php if ( ! dynamic_sidebar('footer3') ) : ?>
							<li>{static sidebar item 1}</li>
							<li><p>&copy; <?php echo date('Y'); ?> <?php bloginfo('title'); ?>.</p></li>
						<?php endif; ?>
						</ul>
						<p><br/>&copy; <?php echo date('Y'); ?> <?php bloginfo('title'); ?>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
</div>

<?php wp_footer(); ?>

</body>
</html>