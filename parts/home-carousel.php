<div class="owl-carousel owl-theme" id="owl">
<?php
	$home = get_page_by_path( 'home' );
	$carousel = get_post_meta( $home->ID, '_home_carousel', true );
	foreach( $carousel as $slide ){
		$img = $slide['_home_img'];
		echo '<div class="item" style="width: 100%;"><img src="' . $img . '" /></div>';
	}
?>
</div>