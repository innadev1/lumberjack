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
	
	
	$("#flip_1").click(function () {
		$("#map_latvia_2").css("display","none");
		$("#map_estonia").css("display","none");
		$("#map_russia").css("display","none");
		$("#map_latvia").css("display","block");
		$("#first_flex").css("display","block");
		$("#second_flex").css("display","none");
		$("#third_flex").css("display","none");
		$("#four_flex").css("display","none");
	});
	$("#flip_2").click(function () {
		$("#map_latvia").css("display","none");
		$("#map_estonia").css("display","none");
		$("#map_russia").css("display","none");
		$("#map_latvia_2").css("display","block");
		$("#first_flex").css("display","none");
		$("#second_flex").css("display","block");
		$("#third_flex").css("display","none");
		$("#four_flex").css("display","none");
	});
	$("#flip_3").click(function () {
		$("#map_latvia").css("display","none");
		$("#map_latvia_2").css("display","none");
		$("#map_russia").css("display","none");
		$("#map_estonia").css("display","block");
		$("#first_flex").css("display","none");
		$("#second_flex").css("display","none");
		$("#third_flex").css("display","block");
		$("#four_flex").css("display","none");
	});
	$("#flip_4").click(function () {
		$("#map_latvia").css("display","none");
		$("#map_latvia_2").css("display","none");
		$("#map_estonia").css("display","none");
		$("#map_russia").css("display","block");
		$("#first_flex").css("display","none");
		$("#second_flex").css("display","none");
		$("#third_flex").css("display","none");
		$("#four_flex").css("display","block");
	});
		
});