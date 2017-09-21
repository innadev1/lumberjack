<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>
	
	
<link rel="stylesheet" type="text/css" href="style/header.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div class="header">
<div id="information">
	<div class="information">
		<ul>
			<li><a href="#">franchise</a></li>
			<li class="border"></li>
			<li><a href="#"><img src="<?php echo home_url(); ?>/img/call.png" width="1.2%"></a></li>
			<li class="border"></li>
			<li><a href="#"><img src="<?php echo home_url(); ?>/img/bag.png" width="1%"></a></li>
			<li class="border"></li>
			<li><a>lv</a></li>
		</ul>
	</div>
</div>
			

<div id="logo">
	<a href="http://testlumberjack.tk/index.php"><img src="<?php echo home_url(); ?>/img/logo.png"></a>
</div>

<div class="menu"><a id="toggler" href="#"><img src="<?php echo home_url(); ?>/img/menu.png"></a></div>
<div id="box" style="display: none;">
	<a id="toggler_close" style="display:none" href="#"><div class="close"><img src="<?php echo home_url(); ?>/img/close.png"></div></a>
    <div>
        <ul class="box_li">
			<li><a href="http://testlumberjack.tk/index.php">home</a></li>
			<li><a href="http://testlumberjack.tk/our_story.php">our story</a></li>
			<li><a href="http://testlumberjack.tk/lumberjack/shop/shop">online store</a></li>
			<li><a href="http://testlumberjack.tk/barbershop.php">barbershop</a></li>
			<li><a href="http://testlumberjack.tk/haircuts.php">haircuts</a></li>
			<!--<li><a href="../lumberjack/lifestyle.php">lifestyle</a></li>-->
			<li><a href="http://testlumberjack.tk/wall_of_fame.php">wall of fame</a></li>
			<li><a href="http://testlumberjack.tk/contacts.php">contact us</a></li>
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
					$("#logo").css("position","fixed");
					$("#logo").css("z-index","10");
					$("#logo").css("width","100%");
			});
			$("#toggler_close").click(function () {
					$("#box").css("display","none");
					$("#toggler_close").css("display","none");
					$("#logo").css("position","relative");
					$("#logo").css("z-index","inherit");
					$("#logo").css("width","inherit");
			});
			});
		</script>		

<div id="navigation">
	<div class="navigation">
			<ul>
				<li><a><img src="<?php echo home_url(); ?>/img/radio.png" class="radio"></a></li>
				
				<li class="link"><a href="http://testlumberjack.tk/our_story.php">our story</a></li>

				<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="http://testlumberjack.tk/barbershop.php">barbershop</a></li>

				<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="http://testlumberjack.tk/lumberjack/shop/shop">online store</a></li>

				<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="http://testlumberjack.tk/haircuts.php">haircuts</a></li>

				<!--<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="lifestyle.php">lifestyle</a></li>-->
				
				<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="http://testlumberjack.tk/wall_of_fame.php">wall of fame</a></li>

				<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="http://testlumberjack.tk/contacts.php">contact us</a></li>
			</ul>
	</div>
</div>
</div>

<style>
.header{height: 14.5vw;}
ul, li{
	margin: 0;
	padding: 0.5vw 0 0.5vw 0;
}
a{
	text-decoration: none;
	color:inherit;
	font-weight: 500;
	margin: 0;
}
#information{
	height: auto;
}
.information{
	position: relative;
	text-align: right;
    color: #1f0c06;
    font-size: 1vw;
    padding-right: 10vw;
	text-transform: uppercase;
}
.information li{
	display: inline;
	list-style: none;
	margin-right: 4px;
}
.border{
	border-right-color: #e0bf95;
    border-right-style: solid;
    border-right-width: 2px;
	padding: 0;
}
#logo{
	background-color: #1f0c06;
	height: 10vw;
	text-align: center;	
}
#logo img{
	width: 14%;
	position: relative;
    top: 1.5vw;
}
#navigation{
	height: auto;
}
.navigation{
	position: relative;
	text-align: center;
    color: #1f0c06;
    font-size: 1vw;
	text-transform: uppercase;
}
.navigation li{
	display: inline;
	list-style: none;
    padding-right: 0.5vw;
    padding-left: 0.5vw;
}
.radio{
    width: 2%;
    position: absolute;
    top: 0.1vw;
    left: 10vw;
}
.link:hover{
	background-color: rgb(189, 148, 86);
	color: white !important;
}


.menu,
.close,
.box_li,
#box
{
	display: none;
}
@media screen and (max-width: 900px){
.header{height: unset;}
#information,
#navigation
{
	display: none;
}
#logo {
    height: 120px;
}
#logo img {
    width: 155px;
    top: 20px;
}
.menu {
    display: block;
    position: fixed;
    top: 35px;
    right: 15px;
    z-index: 1;
}
.menu img{
	width: 50px;
}
.close {
	display: block;
    position: absolute;
    width: 62px;
    z-index: 2;
    top: -90px;
    right: 3px;
    background-color: rgba(31, 12, 6, 0.9);
}
.close img{
	width: 50px;
}
#box{
	position: fixed;
    width: 100%;
    height: 140vw;
    background-color: rgba(31, 12, 6, 0.9);
    right: 0;
    padding: 30px;
    box-sizing: border-box;
    z-index: 100;
    top: 0;
    margin-top: 120px;
}
.box_li ul, li{list-style: none;}
.box_li{
	display: block;
    font-size: 5vw;
    font-family: "Roboto", sans-serif;
    color: rgba(203, 148, 78, 0.6);
    line-height: 9vw;
    text-align: center;
    padding-top: 0;
}
.box_li a{
	font-weight: bold;
}
.box_li a:hover{
	color: rgba(203, 148, 78, 1);
}
.information {
	padding-top: 5vw;
    text-align: center;
    font-size: 4vw;
    padding-right: 0;
    text-transform: uppercase;
    color: rgba(203, 148, 78, 1);
    letter-spacing: 0.5vw;
    font-stretch: condensed;
}

}
</style>

<div id="banner" style=" background-image: url(<?php echo home_url(); ?>/img/background_shop.jpg);">
	<div class="caption">
		<h1><img src="<?php echo home_url(); ?>/img/vector_white.png">ONLINE STORE<img src="<?php echo home_url(); ?>/img/vector_white.png"></h1>
	</div>
</div>

<style>
#banner {
    height: 35vw;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
}
.caption {
    text-align: center;
    top: 37%;
    position: relative;
   /* border: 1px solid rgba(230, 230, 230, 0.3);*/
    margin-left: 25vw;
    margin-right: 25vw;
    padding-top: 2vw;
    padding-bottom: 2vw;
	border: 6px double rgba(230, 230, 230, 0.5);
    background-color: rgba(255,255,255,0.05);
}
.caption h1 {
    color: white;
    font-size: 4.4vw;
    margin: 0;
    font-family: "OpenSans", sans-serif;
    font-weight: bold;
    text-transform: uppercase;
    line-height: 0.8;
    letter-spacing: 0.5vw;
    text-align: center;
    text-shadow: 3px 1px 5px black;
}
.caption h1 img{
	margin: 1.2vw;
	width: 2%;
}
</style>