
jQuery(document).ready(function($) {


	"use strict";

	// Gallery Post Format Slider
	$(window).load(function() {
	  $('.flexslider').flexslider({
		slideshow: false,
		controlNav: false,
	    animation: "slide",
		animationSpeed: 250,
		smoothHeight: true,
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>'
	  });
	});

	// Mobile Menu
    $('#nav').slicknav({
    	prependTo: 'body',
    	label: '',
    	allowParentLinks: 'true',
		closedSymbol: '<i class="fa fa-caret-down"></i>',
		openedSymbol: '<i class="fa fa-caret-up"></i>'
    });


});
