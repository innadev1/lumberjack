(function($){
 $.fn.Carousel = function(options) {
    var settings = {
         visible: 3,
         rotateBy: 1,
         speed: 1000,
         btnNext: null,
         btnPrev: null,
         auto: true,
     margin: 10,
     position: "h",
         dirAutoSlide: false
       };
     
    return this.each(function() {
         if (options) {
             $.extend(settings, options); 
          }
                        
        var $this = $(this);                     
        var $carousel = $this.children(':first');
    var itemWidth = $carousel.children().outerWidth()+settings.margin;
    var itemHeight = $carousel.children().outerHeight()+settings.margin;                  
    var itemsTotal = $carousel.children().length; 
        var running = false;
        var intID = null;
    var size = itemWidth; 
    if(settings.position=="v") size = itemHeight;
        if(settings.position=="v")
    $this.css({
        'position': 'relative',
        'overflow': 'hidden',
        'height': settings.visible * size + 'px' ,
    'width': itemWidth-settings.margin 
     });
     else
      $this.css({
            'position': 'relative', 
            'overflow': 'hidden', 
            'width': settings.visible * size + 'px' ,
        'height': itemHeight-settings.margin
     });

     if(settings.position=="v")
      $carousel.children('li').css({
          'margin-top': settings.margin/2+ 'px',
      'margin-bottom': settings.margin/2+ 'px',
      'float': 'left',	  
     });
     else
     $carousel.children('li').css({
         'margin-left': settings.margin/2+ 'px',
     'margin-right': settings.margin/2+ 'px', 
     });                   

    if(settings.position=="v")
            $carousel.css({
              'position': 'relative', 
              'height': 9999 + 'px', 
              'left': 0, 
          'top': 0  
           });
    else
        $carousel.css({
              'position': 'relative', 
              'width': 9999 + 'px', 
              'top': 0,
          'left': 0
           });

       function slide(dir) {
      var direction = !dir ? -1 : 1;
          var Indent = 0;
          if (!running) {                           

             running = true; 
             if (intID) {
                    window.clearInterval(intID);                                        
            }
             if (!dir) {
$carousel.children(':last').after($carousel.children().slice(0,settings.rotateBy).clone(true));
} else { 
	$carousel.children(':first').before($carousel.children().slice(itemsTotal - settings.rotateBy, itemsTotal).clone(true));

                                                if(settings.position=="v")
    $carousel.css('top', -size * settings.rotateBy + 'px');
else                                                     $carousel.css('left', -size * settings.rotateBy + 'px');
 }

if(settings.position=="v")
Indent = parseInt($carousel.css('top')) + (size * settings.rotateBy * direction);
          else
Indent = parseInt($carousel.css('left')) + (size * settings.rotateBy * direction);
                                        
if(settings.position=="v")
    var animate_data={'top': Indent};
else
var animate_data={'left': Indent};

$carousel.animate(animate_data, {queue: false, duration: settings.speed, complete: function() {

if (!dir) {
    $carousel.children().slice(0, settings.rotateBy).remove();
                                                        if(settings.position=="v")
                   $carousel.css('top', 0);
else                                                    $carousel.css('left', 0);
} else {
$carousel.children().slice(itemsTotal, itemsTotal + settings.rotateBy).remove();
}
if (settings.auto) {
 intID = window.setInterval(function() { slide(settings.dirAutoSlide); }, settings.auto);
    }
  running = false;
 }});
  }
  return false;
}
     $(settings.btnNext).click(function() {                            
     return slide(false);                               
      });
    $(settings.btnPrev).click(function() {
          return slide(true);
     });

if (settings.auto) {
intID = window.setInterval(function() { slide(settings.dirAutoSlide); }, settings.auto);
                   }
      });
    };
})(jQuery);