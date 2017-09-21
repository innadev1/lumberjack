<link rel="stylesheet" type="text/css" href="style/footer.css">

<div id="footer">
	<div class="footer">
		<div id="logo_footer"><img src="<?php echo home_url(); ?>/img/logo.png" width="9%"></div>

<div class="links">
	<ul>
		<li><a href="https://facebook.com"><img src="<?php echo home_url(); ?>/img/facebook.png"></a></li>
		<li><a href="https://instagram.com"><img src="<?php echo home_url(); ?>/img/instagram.png"></a></li>
		<li><a href="https://vimeo.com"><img src="<?php echo home_url(); ?>/img/vimeo.png"></a></li>
	</ul>
</div>

<div><p>Copyright 2016. All rights reserved</p></div>
	</div>
</div>

<style>
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