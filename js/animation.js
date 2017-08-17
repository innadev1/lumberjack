$(document).ready(function(){
	$("#button").click(function () {
		$(".button").css("display","none");
		$("#main_info_2").slideDown(400);
		$("#main_info_2").css("display","block");
		$(".button1").css("display","block");
	});
		$("#button1").click(function () {
		$(".button1").css("display","none");
		$("#main_info_2").slideUp(400);
		$("#main_info_2").css("display","none");
		$("#main_info").css("display","block");
		$(".button").css("display","block");
	});
	});