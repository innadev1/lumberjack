jQuery(document).ready(function($){
   $('.wpf_submenu').css('display','none')
   $('.wpf_selected').siblings('.wpf_submenu').css('display','block')
   let id = $('.wpf_links .wpf_selected').length>0 ?$('.wpf_links .wpf_selected').parent().index() : 10000
   $('.wpf_links li a').not('.wpf_submenu li a').removeAttr('href')
   $('.wpf_links li').not('.wpf_submenu li, .wpf_links li:eq('+id+')').click(function(){
     
       $(this).children('.wpf_submenu').stop().slideToggle(300)
   })
//   $('.wpf_links li').not('.wpf_submenu li,  .wpf_links li:eq('+id+')').click(function(){

//       $(this).children('.wpf_submenu').stop().slideUp(300)
//   })
})

jQuery(document).ready(function($){
    $('.children').css('display','none')
    //$('.wpf_selected').siblings('.children').css('display','block')
    //$('.cat-item a').not('.children a').removeAttr('href') // <-- NONEM LINKU
    $('.cat-item ').mouseenter(function(){
        $(this).children('.children').css('display','block')
    })
    $('.cat-item ').mouseleave(function(){
        $(this).children('.children').css('display','none')
    })
})