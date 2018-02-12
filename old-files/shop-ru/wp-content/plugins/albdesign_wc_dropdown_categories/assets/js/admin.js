(function($){
	
	//fix for the color picker on widget showing two times 
	var parent = $('body');
	if ($('body').hasClass('widgets-php')){
		parent = $('.widget-liquid-right');
	}
	jQuery(document).ready(function($) {
		parent.find('.albdesign_wc_dropdown_categories_color_picker').wpColorPicker();
	});
	
	jQuery(document).on('widget-added', function(e, widget){
		widget.find('.albdesign_wc_dropdown_categories_color_picker').wpColorPicker();
	});
	
	jQuery(document).on('widget-updated', function(e, widget){
		widget.find('.albdesign_wc_dropdown_categories_color_picker').wpColorPicker();
	});
	
	
	//show-hide all icons on visual composer module
	$('body').on('click', 'a.albdesign_wc_dropdown_show_all_icons_link ',function(e){	
		e.preventDefault();
		
		$(this).siblings('div.albdesign_wc_dropdown_show_all_icons' ).toggle( "slow", function() {
			
		});
	
	});	
	
})(jQuery);