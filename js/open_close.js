$(document).ready(function(){
	$(".read_more").click(function () {
		$(".remodal-overlay").fadeIn(400);
		$(".remodal-overlay").css("display","block");
		$("#body").css("background-color","rgba(0,0,0,0.5)");
		$("#body").css("z-index","100");
	});
	$(".remodal-close").click(function () {
	$(".remodal-overlay").css("display","none");
	$("#body").css("background-color","rgba(0,0,0,0.0)");
	$("#body").css("z-index","-1");
	});
});