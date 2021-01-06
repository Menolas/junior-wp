(function(jQuery) {
    'use strict';
    jQuery(document).ready(function($) {

   
	/* ============== masonry Grid ============= */
	if( $(".rd-navbar").length){
		$('.rd-navbar').RDNavbar({
			stickUpClone: false,
			
		});
	}
	if( $('#ui-to-top').length ){
		$('#ui-to-top').toTop();
	}
	if( $('.form-group').length ){
		
		$( 'body' ).on( 'click', '.form-group input,.form-group textarea', function() {
			$('div.form-group').removeClass('active');
			$(this).parents('div.form-group').addClass('active');
		} );
	}
	
	if( $('.form-group').length ){
		
		$( 'body' ).on( 'click', '.form-group input,.form-group textarea', function() {
			$('div.form-group').removeClass('active');
			$(this).parents('div.form-group').addClass('active');
		} );
	}
	
	if( $('.corporatesource-carousel .gallery').length ){
		$('.corporatesource-carousel .gallery').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			dots:false,
			navText: [ '<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1000:{
					items:1
				}
			}
		});
	}
	
	/* -- image-popup */
	if( $('.image-popup').length ){
		
		 $('.image-popup').magnificPopup({
			closeBtnInside : true,
			type           : 'image',
			mainClass      : 'mfp-with-zoom'
		});
	}
	

 });
})(jQuery);