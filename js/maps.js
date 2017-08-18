$(document).ready(function(){
	$("#trigger1").click(function () {
		$("#map_latvia_2").css("display","none");
		$("#map_estonia").css("display","none");
		$("#map_russia").css("display","none");
		$("#map_latvia").css("display","block");
	});
	$("#trigger2").click(function () {
		$("#map_latvia").css("display","none");
		$("#map_estonia").css("display","none");
		$("#map_russia").css("display","none");
		$("#map_latvia_2").css("display","block");
	});
	$("#trigger3").click(function () {
		$("#map_latvia").css("display","none");
		$("#map_latvia_2").css("display","none");
		$("#map_russia").css("display","none");
		$("#map_estonia").css("display","block");
	});
	$("#trigger4").click(function () {
		$("#map_latvia").css("display","none");
		$("#map_latvia_2").css("display","none");
		$("#map_estonia").css("display","none");
		$("#map_russia").css("display","block");
	});
});