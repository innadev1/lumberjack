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



$("#book_an_appointment_1").click(function () {
		$(".remodal-overlay_1").fadeIn(400);
		$(".remodal-overlay_1").css("display","block");
	});
		$(".remodal-close_1").click(function () {
		$(".remodal-overlay_1").css("display","none");
	});
	
$("#book_an_appointment_2").click(function () {
		$(".remodal-overlay_2").fadeIn(400);
		$(".remodal-overlay_2").css("display","block");
	});
		$(".remodal-close_2").click(function () {
		$(".remodal-overlay_2").css("display","none");
	});
	
$("#book_an_appointment_3").click(function () {
		$(".remodal-overlay_3").fadeIn(400);
		$(".remodal-overlay_3").css("display","block");
	});
		$(".remodal-close_3").click(function () {
		$(".remodal-overlay_3").css("display","none");
	});
$("#book_an_appointment_4").click(function () {
		$(".remodal-overlay_1").css("display","none");
		$(".remodal-overlay_4").fadeIn(400);
		$(".remodal-overlay_4").css("display","block");
	});
		$(".remodal-close_4").click(function () {
		$(".remodal-overlay_4").css("display","none");
	});
$("#book_an_appointment_5").click(function () {
		$(".remodal-overlay_4").css("display","none");
		$(".remodal-overlay_1").fadeIn(400);
		$(".remodal-overlay_1").css("display","block");
	});
		$(".remodal-close_1").click(function () {
		$(".remodal-overlay_1").css("display","none");
	});
	
	

$("#toggler_services_1").click(function () {
	$( "#services_1" ).slideToggle( "slow", function() {
});
});

$("#toggler_services_2").click(function () {
	$( "#services_2" ).slideToggle( "slow", function() {
});
});

$("#toggler_services_3").click(function () {
	$( "#services_3" ).slideToggle( "slow", function() {
});
});

$("#toggler_barbers_1").click(function () {
	$( "#barbers_1" ).slideToggle( "slow", function() {
});
});

$("#toggler_barbers_2").click(function () {
	$( "#barbers_2" ).slideToggle( "slow", function() {
});
});

$("#toggler_barbers_3").click(function () {
	$( "#barbers_3" ).slideToggle( "slow", function() {
});
});

$("#toggler_rewiews_1").click(function () {
	$( "#rewiews_1" ).slideToggle( "slow", function() {
});
});

$("#toggler_rewiews_2").click(function () {
	$( "#rewiews_2" ).slideToggle( "slow", function() {
});
});

$("#toggler_rewiews_3").click(function () {
	$( "#rewiews_3" ).slideToggle( "slow", function() {
});
});

});