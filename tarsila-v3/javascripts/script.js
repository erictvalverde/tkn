/* Author: */
(function($) {
    // $ sign here is a parameter, which is set to jQuery 

	$("a.ajax").live("click", function() {
		var target = null;
		var href = this.href;
		var pathname = window.location.pathname
		var element = $(this);
		var targetselector = element.attr('data-target');
		var filter = element.attr('data-filter');
		change_my_url(href);

		if(targetselector) {
		target = $(targetselector);

		}
		if(!target || !target.length) {
			target = $(this).parents("div:first");
		}
		if(filter) {
			href += ' ' + filter;
		}
		if(target){
			target.fadeOut(300, function(){
				$('#heading').addClass('loading');
				target.load(href, function(){
					target.fadeIn();
					$('#heading').removeClass('loading');
					
				});

			});
		}else{
			target.load(href);
		}
		return false;
	});

	function change_my_url(href)
	{	
		history.pushState('','',href);
	}


	function mobnav(){
		if ( $('.expand').length == 0 && $(window).width() < 707 ) {
			
			$('#header #menu-main-menu').append('<a href="" title="Click to expand" class="expand" ></span>');
			$('#header #menu-main-menu').prepend('<li class="mobmenu">Menu</li>');
			$('.expand').click(function(e){
				e.preventDefault();	
				$('#mainnav').toggleClass('active');
			});

		}

		$('#sidebar a').click(function(){
			$('html, body').animate({scrollTop:0}, 'slow');
		})
		
	}mobnav();


    $(document).ready(function() {
   		$('.flexslider').flexslider({
   			animation: "fade",              //String: Select your animation type, "fade" or "slide"
			slideDirection: "horizontal",   //String: Select the sliding direction, "horizontal" or "vertical"
			slideshow: true,                //Boolean: Animate slider automatically
			slideshowSpeed: 7000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
			animationDuration: 400,         //Integer: Set the speed of animations, in milliseconds
			directionNav: false,             //Boolean: Create navigation for previous/next navigation? (true/false)
			controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
			keyboardNav: true,              //Boolean: Allow slider navigating via keyboard left/right keys
			mousewheel: false,              //Boolean: Allow slider navigating via mousewheel
			prevText: "Previous",           //String: Set the text for the "previous" directionNav item
			nextText: "Next",               //String: Set the text for the "next" directionNav item
			pausePlay: false,               //Boolean: Create pause/play dynamic element
			pauseText: 'Pause',             //String: Set the text for the "pause" pausePlay item
			playText: 'Play',               //String: Set the text for the "play" pausePlay item
			randomize: false,               //Boolean: Randomize slide order
			slideToStart: 0,                //Integer: The slide that the slider should start on. Array notation (0 = first slide)
			animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
			pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
			pauseOnHover: false,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
			controlsContainer: "",          //Selector: Declare which container the navigation elements should be appended too. Default container is the flexSlider element. Example use would be ".flexslider-container", "#container", etc. If the given element is not found, the default action will be taken.
			manualControls: "",             //Selector: Declare custom control navigation. Example would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
			start: function(){},            //Callback: function(slider) - Fires when the slider loads the first slide
			before: function(){},           //Callback: function(slider) - Fires asynchronously with each slider animation
			after: function(){},            //Callback: function(slider) - Fires after each slider animation completes
			end: function(){}               //Callback: function(slider) - Fires when the slider reaches the last slide (asynchronous)
   		});
  	});

})(jQuery);
























