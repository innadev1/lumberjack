$(document).ready(function(){
	$(".button1").click(function () {
		$("#c1").css("display","none");
		$(".gal1").css("display","none");
		$("#tr1").css("display","none");
		$("#map_latvia").css("display","block");
		$("#but1").css("display","block");
	});
	$(".button2").click(function () {
		$("#c2").css("display","none");
		$(".gal2").css("display","none");
		$("#tr2").css("display","none");
		$("#map_estonia").css("display","block");
		$("#but2").css("display","block");
	});
	$(".button3").click(function () {
		$("#c3").css("display","none");
		$(".gal3").css("display","none");
		$("#tr3").css("display","none");
		$("#map_russia").css("display","block");
		$("#but3").css("display","block");
	});
	
	$("#but1").click(function () {
		$("#c1").css("display","block");
		$(".gal1").css("display","inline-block");
		$("#tr1").css("display","block");
		$("#map_latvia").css("display","none");
		$("#but1").css("display","none");
	});
	$("#but2").click(function () {
		$("#c2").css("display","block");
		$(".gal2").css("display","inline-block");
		$("#tr2").css("display","block");
		$("#map_estonia").css("display","none");
		$("#but2").css("display","none");
	});
	$("#but3").click(function () {
		$("#c3").css("display","block");
		$(".gal3").css("display","inline-block");
		$("#tr3").css("display","block");
		$("#map_russia").css("display","none");
		$("#but3").css("display","none");
	});
});