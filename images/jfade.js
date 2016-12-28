window.onerror=function(){return true;};
$(function($) {
	$.fn.jfade = function(settings) {
   
	var defaults = {
		start_opacity: ".99",
		high_opacity: "1",
		low_opacity: ".1",
		timing: "5000"
	};
	var settings = $.extend(defaults, settings);
	settings.element = $(this);
			
	//set opacity to start
	$(settings.element).css("opacity",settings.start_opacity);
	
	
	//mouse over
	$(settings.element).hover(
	
		//mouse in
		function () {												  
			$(this).stop().animate({opacity: settings.high_opacity}, settings.timing); //100% opacity for hovered object
			$(this).siblings().stop().animate({opacity: settings.low_opacity}, settings.timing); //dimmed opacity for other objects
			$(this).siblings().css({"position":"relative","zIndex":"1"});
			$("#"+this.id).css({
							   "position":"relative",
							   "background":"#fff",
							   "margin":"-3px -17px -23px -17px",
							   "border":"2px solid #f67024",
							   "padding":"25px 15px 15px",
							   "height":"160px",
							   "zIndex":"9999999",
							   "display":"inline"
							   });
			$("#"+this.id +" .gd_btn").css({"display":"none"});
		},
		//mouse out
		function () {
			$(this).stop().animate({opacity: settings.start_opacity}, settings.timing); //return hovered object to start opacity
			$(this).siblings().stop().animate({opacity: settings.start_opacity}, settings.timing); // return other objects to start opacity
			$("#"+this.id).css({
							   "position":"relative",
							   "background":"#fff",
							   "border":"none",
							   "padding":"0",
							   "margin":"24px 0",
							   "height":"130px"
							   });
			$("#"+this.id +" .gd_btn").css({"display":"inline"});
		}
	);
	return this;
	}
	
})(jQuery);




