jQuery(function ($) {

    'use strict';
	
	// ----------------------------------------------
    // Table of index
    // ----------------------------------------------

    /*-----------------------------------------------
    # Slider Height
    # Menu Toggle
    # Menu Scrolling
	# Animated Progress bar
    # Parallax Scroll
    # Fun Fact Timer
    # Pretty Photo
    # Portfolio Filter
    # Style Chooser
    # Google Map Customization
    -------------------------------------------------*/
	
    // ----------------------------------------------
    // # Demo Chooser
    // ----------------------------------------------

    (function() {

		$('.demo-chooser .toggler').on('click', function(event){
			event.preventDefault();
			$(this).closest('.demo-chooser').toggleClass('opened');
		})

    }());
	
	// ----------------------------------------------
    // Slider images Source
    // ----------------------------------------------
	(function () {
		$('#slider-section ').vegas({
			slides: [
				{ src: 'images/slider/1.jpg' },
				{ src: 'images/slider/2.jpg' },
				{ src: 'images/slider/3.jpg' },
			]
		});
	}());
		
	

	// ----------------------------------------------
    // Parallax Scrolling
    // ----------------------------------------------
	
	(function () {
		function parallaxInit() {				
			$("#our-products").parallax("50%", 0.3);
			$("#promo-offer").parallax("50%", 0.3);
			$("#extras").parallax("50%", 0.3);
			$("#comments").parallax("50%", 0.3);
		}	
		parallaxInit();
	}());
	
	
	// ----------------------------------------------
    // promo slider
    // ----------------------------------------------
	$('.promo-slider').bxSlider({
		mode: 'vertical',
		pager: false,
		auto: false,
		touchEnabled: true,
		controls: true,
		nextText: "<i class='fa fa-angle-down'></i>",
		prevText: "<i class='fa fa-angle-up'></i>",
		minSlides: 3,
		maxSlides: 3,
		moveSlides:1,
		slideMargin: 40,
		captions: true, 
		
		onSliderLoad: function () {
			$('.promo-slider>div:not(.bx-clone)').eq(1).addClass('active-slide');
		},
		onSlideAfter: function ($slideElement, oldIndex, newIndex) {
			$('.slide').removeClass('active-slide');
			$($slideElement).next().addClass('active-slide');        
		}
	
		
	});
	
	
	// ----------------------------------------------
    // Accordion Add Class
    // ----------------------------------------------
	
	
	jQuery('.accordion-heading a').click(function() {
		$('.accordion-heading').removeClass('active');
		$(this).parents('.accordion-heading').addClass('active');
	});
	
	
	
	
	
	
	
	
	// ----------------------------------------------
    // Magnific Popup
    // ----------------------------------------------
	
	(function () {
		$('#photo-gallery .image-link').magnificPopup({
			gallery: {
			  enabled: true
			},
			type: 'image' 
		});
		$('.video-link').magnificPopup({type:'iframe'});
	}());
		
});

