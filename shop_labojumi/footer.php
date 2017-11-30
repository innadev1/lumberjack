<link rel="stylesheet" type="text/css" href="style/footer.css">

<div id="footer">
	<div class="footer">
		<div id="logo_footer"><img src="<?php echo home_url(); ?>/img/logo.png" width="9%"></div>

<div class="links">
	<ul>
		<li><a href="https://www.facebook.com/lumberjackbarbershop.latvia/?ref=br_rs"><img src="<?php echo home_url(); ?>/img/facebook.png"></a></li>
		<li><a href="https://www.instagram.com/lumberjack_barbershop_/"><img src="<?php echo home_url(); ?>/img/instagram.png"></a></li>
		<!--<li><a href="https://vimeo.com"><img src="<?php echo home_url(); ?>/img/vimeo.png"></a></li>-->
	</ul>
</div>

<div><p>Copyright 2017. All rights reserved</p></div>
	</div>
	
	<div class="pay-systems">
		<div><img src="<?php echo home_url(); ?>/img/visa.png"></div>
		<div><img src="<?php echo home_url(); ?>/img/mastercard.png"></div>
		<div><img src="<?php echo home_url(); ?>/img/paypal.png"></div>
	</div>
</div>

<style>
.pay-systems{
    position: absolute;
    display: -webkit-flex;
    display: flex;
    top: 1vw;
    right: 5vw;
}
.pay-systems div{
	display: -webkit-flex;
    display: flex;
	align-items: center;
}
.pay-systems img{
    width: 5vw;
    padding: 0.5vw;
}
#footer{
	background-color: #1f0c06;
	height: 12vw;
	text-align:center;
	position: relative;
}
.footer{
	position: relative;
	top: 1.5vw;
}
#footer p{
	color: #c59a5a;
	font-size: 0.7vw;
}
.links{
	padding-top: 0.7vw;
}
.links li{
	display: inline;
	list-style: none;
	margin: 0.5vw;
}
.links img{
	width: 2%;
	margin: 0;
}

@media screen and (max-width: 900px){
.pay-systems{	
    bottom: 0;
    position: relative;
    right: unset;
    text-align: center;
    top: unset;
    width: 50%;
    margin: auto;
    top: 10vw;
}
.pay-systems img{
    width: 15vw;
    padding: 0.5vw;
}
#footer {
    height: 140vw;
}
#logo_footer img{
	width: 50%;
	padding-top: 5vw;
	padding-bottom: 5vw;
}
.links{
	padding-top: 5vw;
    padding-bottom: 15vw;
}
.links ul{
	display: flex;
    flex-direction: column;
}
.links img{
	width: 10%;
	padding: 5vw;
}
#footer p {
    color: #c59a5a;
    font-size: 15px;
    letter-spacing: 2px;
}
}
</style>