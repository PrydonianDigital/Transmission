jQuery(document).foundation();

jQuery(function() {

	//jQuery( 'video,audio' ).mediaelementplayer();

	if(element_exists( '#headerVid' )) {
		var canPlay = false;
		var v = document.createElement( 'video' );
		if(v.canPlayType && v.canPlayType( 'video/mp4' ).replace(/no/, '' )) {
			canPlay = true;
		}
		$( '#headerVid' )[0].play();
	}

	if(element_exists( '#map' )) {
		initMap();
	}

	jQuery( '.menu-scroll-down' ).click(function(e) {
		e.preventDefault();
		jQuery( 'html, body' ).animate({
			scrollTop: jQuery( '#content' ).offset().top
		}, 1250);
	});

	jQuery( '#tabs .column:first-child' ).find( '.serviceTitle' ).addClass( 'is-active' );
	jQuery( '#tabsContent .columns:first-child' ).addClass( 'is-active' ).removeClass( 'hide' );
	jQuery( '#tabs .serviceTitle' ).on( 'click', function(e){
		key = jQuery(this).data( 'id' );
		jQuery( '#tabs .serviceTitle' ).removeClass( 'is-active' )
		jQuery(this).addClass( 'is-active' ).find( 'path' ).css( 'visibility', 'visible' );
		jQuery( '#tabsContent .columns' ).removeClass( 'is-active fadeInUp' ).addClass( 'hide fadeOutDown' );
		jQuery( '#tabsContent [data-id='+key+']' ).addClass( 'is-active fadeInUp' ).removeClass( 'hide fadeOutDown' );
	});

	if(element_exists( '.animateSVG' )) {
		var $word = jQuery( 'path#transmission' );
		pathPrepare($word);
		var controller = new ScrollMagic.Controller();
		var tween = new TimelineMax()
			.add(TweenMax.to($word, 0.1, {
				stroke: '#4f535e',
				strokeDashoffset: 0.75,
				ease: Linear.easeNone
			} ));
		var scene = new ScrollMagic.Scene( {
				triggerElement: '#content',
				duration: 550,
				tweenChanges: true
			} )
			.setTween(tween)
			.addTo(controller);
	}

	jQuery( '.svgbutton' ).hover( function() {
		button.play();
	}, function() {
		button.reverse();
	});

	jQuery( '.menu-item' ).each( function( i, el ){
		TweenLite.set( jQuery(el).find( 'path' ), { visibility: 'visible' } );
		var tl = new TimelineMax( { paused: true } );
		tl.from( jQuery(el).find( 'path' ), 0.3, { drawSVG: 0, ease: Linear.easeNone } );
		if( jQuery(el).hasClass( 'current-menu-item' ) || jQuery(el).hasClass( 'current_page_parent' ) ) {
			tl.play();
		} else {
			jQuery(this).hover( over, out );
			function over(){
				tl.play();
			}
			function out(){
				tl.reverse();
			}
		}
	});

	jQuery( '.serviceTitle' ).each( function( i, el ){
		TweenLite.set( jQuery(el).find( 'path' ), { visibility: 'visible' } );
		var tl = new TimelineMax( { paused: true } );
		tl.from( jQuery(el).find( 'path' ), 0.5, { drawSVG: 0, ease: Linear.easeNone } );
		jQuery(this).hover( over, out );
		function over(){
			tl.play();
		}
		function out(){
			tl.reverse();
		}
	});

	var location = window.location;
	jQuery( 'a' ).each( function() {
		if ( jQuery(this).attr( 'href' ) == location ) {
			jQuery(this).addClass( 'selectedService' );
		}
	});


	TweenLite.set( '#svgbutton', { visibility: 'visible' } );
	var button = new TimelineLite( { paused: true } );
	button.from( '#svgbutton', 0.5, { drawSVG: 0, ease: Linear.easeNone } );
	TweenLite.render();

	var is_sending = false,
		failure_message = 'Whoops, looks like there was a problem. Please try again later.';

});

function pathPrepare( $el ) {
	var lineLength = $el[0].getTotalLength();
	$el.css("stroke-dasharray", lineLength);
	$el.css("stroke-dashoffset", lineLength);
}

function exists(data) {
	if(!data || data==null || data=='undefined' || typeof(data)=='undefined' ) return false;
	else return true;
}

function element_exists(id){
	if(jQuery(id).length > 0){
		return true;
	}
	return false;
}

function initMap() {
	var map = new google.maps.Map(document.getElementById( 'map' ), {
		center: {lat: 51.529132, lng: -0.0914898},
		zoom: 15,
		styles: [
			{elementType: 'geometry', stylers: [{color: '#4f535e'}]},
			{elementType: 'labels.text.fill', stylers: [{color: '#00CED1'}]},
			{elementType: 'labels.text.stroke', stylers: [{color: '#4f535e'}]},
			{
			  featureType: 'administrative.locality',
			  elementType: 'labels.text.fill',
			  stylers: [{color: '#4f535e'}]
			},
			{
			  featureType: 'poi.park',
			  elementType: 'geometry',
			  stylers: [{color: '#646873'}]
			},
			{
			  featureType: 'road',
			  elementType: 'geometry',
			  stylers: [{color: '#00CED1'}]
			},
			{
			  featureType: 'road',
			  elementType: 'geometry.stroke',
			  stylers: [{color: '#4f535e'}]
			},
			{
			  featureType: 'road.highway',
			  elementType: 'geometry',
			  stylers: [{color: '#00CED1'}]
			},
			{
			  featureType: 'road.highway',
			  elementType: 'geometry.stroke',
			  stylers: [{color: '#4f535e'}]
			},
			{
			  featureType: 'transit',
			  elementType: 'geometry',
			  stylers: [{color: '#2f3948'}]
			},
			{
			  featureType: 'water',
			  elementType: 'geometry',
			  stylers: [{color: '#001f3f'}]
			}
		  ]
	});
	var service = new google.maps.places.PlacesService(map);
	var iconBase = '/wp-content/themes/transmission-agency/img/';
	var icons = {
		transmission: {
			icon: iconBase + 'pin.png'
		}
	};
	service.getDetails({
		placeId: 'ChIJ__-LG6ccdkgR0PZAf6CIaY0'
	}, function(place, status) {
		if (status === google.maps.places.PlacesServiceStatus.OK) {
			var marker = new google.maps.Marker({
				map: map,
				position: place.geometry.location,
				icon: icons.transmission.icon
			});
		}
	});
}