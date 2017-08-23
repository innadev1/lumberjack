$(document).ready(function(){
	$(".read_more").click(function () {
		$(".remodal-overlay").fadeIn(400);
		$(".remodal-overlay").css("display","block");
	});
	$(".remodal-close").click(function () {
	$(".remodal-overlay").css("display","none");
	});
});