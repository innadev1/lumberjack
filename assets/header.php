<link rel="stylesheet" type="text/css" href="style/header.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

<div id="information">
	<div class="information">
		<ul>
			<li><a href="#">franchise</a></li>
			<li class="border"></li>
			<li><a href="#"><img src="img/call.png" width="1.2%"></a></li>
			<li class="border"></li>
			<li><a href="#"><img src="img/bag.png" width="1%"></a></li>
			<li class="border"></li>
			<li><a>lv</a></li>
		</ul>
	</div>
</div>
			

<div id="logo">
	<a href="index.php"><img src="img/logo.png"></a>
</div>

<div class="menu"><a id="toggler" href="#"><img src="img/menu.png"></a></div>
<div id="box" style="display: none;">
	<a id="toggler_close" style="display:none" href="#"><div class="close"><img src="img/close.png"></div></a>
    <div>
        <ul class="box_li">
			<li><a href="index.php">home</a></li>
			<li><a href="our_story.php">our story</a></li>
			<li><a href="#">online store</a></li>
			<li><a href="barbershop.php">barbrshop</a></li>
			<li><a href="haircuts.php">haircuts</a></li>
			<li><a href="lifestyle.php">lifestyle</a></li>
			<li><a href="contacts.php">contact us</a></li>
        </ul>
    </div>
	<div class="information">
			<p>franchise</p>
		<ul>
			<li><a href="#"><img src="img/call_brown.png" width="23px" style="padding-right:5px"></a></li>
			<li class="border"></li>
			<li><a href="#"><img src="img/bag_brown.png" width="22px" style="padding-right:5px; padding-left:5px"></a></li>
			<li class="border"></li>
			<li><a style="padding-left:5px">lv</a></li>
		</ul>
	</div>
</div>
		<script>
			$(document).ready(function(){
				$("#toggler").click(function () {
					$("#box").css("display","block");
					$("#toggler_close").css("display","block");
			});
			$("#toggler_close").click(function () {
					$("#box").css("display","none");
					$("#toggler_close").css("display","none");
			});
			});
		</script>		

<div id="navigation">
	<div class="navigation">
			<ul>
				<li><a><img src="img/radio.png" class="radio"></a></li>
				
				<li class="link"><a href="our_story.php">our story</a></li>

				<li><a><img src="img/vector.png"></a></li>
				<li class="link"><a href="barbershop.php">barbrshop</a></li>

				<li><a><img src="img/vector.png"></a></li>
				<li class="link"><a href="/www/testlumberjack/opencart/index.php">online store</a></li>

				<li><a><img src="img/vector.png"></a></li>
				<li class="link"><a href="haircuts.php">haircuts</a></li>

				<li><a><img src="img/vector.png"></a></li>
				<li class="link"><a href="lifestyle.php">lifestyle</a></li>

				<li><a><img src="img/vector.png"></a></li>
				<li class="link"><a href="contacts.php">contact us</a></li>
			</ul>
	</div>
</div>