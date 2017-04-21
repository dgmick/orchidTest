/*=========================================================================================
	File Name: scrollable.js
	Description: scrollabr intialisations
	----------------------------------------------------------------------------------------
	Item Name: Robust - Responsive Admin Theme
	Version: 1.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
==========================================================================================*/
$(document).ready(function(){

	// Vertical Scroll
	$('.vertical-scroll').perfectScrollbar({
		suppressScrollX : true,
        theme: 'dark'
	});

	// Horizontal Scroll
	$('.horizontal-scroll').perfectScrollbar({
		suppressScrollY : true,
        theme: 'dark'
	});

	// Both Side Scroll
	$('.both-side-scroll').perfectScrollbar({
        theme: 'dark'
	});

	// Always Visible Scroll
	$('.visible-scroll').perfectScrollbar({
        theme: 'dark'
	});

	// Minimum Scroll Length
	$('.min-scroll-length').perfectScrollbar({
        minScrollbarLength: 200
	});

	// Scrollbar Margins
	$('.scrollbar-margins').perfectScrollbar();

	// Default Handlers
	$('.default-handlers').perfectScrollbar();

	// No Keyboard
	$('.no-keyboard').perfectScrollbar({
		handlers: ['click-rail', 'drag-scrollbar', 'wheel', 'touch']
	});

	// Click and Drag
	$('.click-drag-handler').perfectScrollbar({
		handlers: ['click-rail', 'drag-scrollbar']
	});

	// Default Wheel Speed : 1
	$('.default-wheel-speed').perfectScrollbar();

	// Higher Wheel Speed : 10
	$('.higher-wheel-speed').perfectScrollbar({
		wheelSpeed: 10
	});

	// Lower Wheel Speed : 10
	$('.lower-wheel-speed').perfectScrollbar({
		wheelSpeed: 0.1
	});
});