<html>
	<head>
		<!-- Open Graph data -->
		<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: 
		http://ogp.me/ns/article#">
		<meta property="og:title" content="Lumberjack Barbershop" /> 
		<meta property="og:type" content="article" /> 
		<meta property="og:url" content="http://lumberjackbarbershop.com/" /> 
		<meta property="og:description" content="It is not simply a haircut – it is the philosophy of masculinity. We will emphasize the male character and the mood of a growing and an already held gentleman with irreproachable professionalism. We believe that representatives of the stronger sex have rights to rely on a verified and top-quality personal care. Lumberjack Barber- shop – remind yourself how cool it is to be a man!" />    
		<meta property="og:site_name" content="lumberjackbarbershop" />
		<!-- <meta property="fb:app_id" content="Your FB_APP_ID" /> / -->
		
		<meta property="og:image" content="http://lumberjackbarbershop.com/img/special.jpg" />
		<meta property="og:image:type" content="image/jpg" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="300" />
		<meta property="og:image:alt" content="A shiny red apple with a bite taken out" />

		<link rel="shortcut icon" href="img/favicon.png" type="image/png">
		<link rel="stylesheet" type="text/css" href="style/partners.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<title>Lumberjack Barbershop</title>
		
		<script src="js/jquery-3.2.1.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/maps.js"></script>
		
	</head>
	<body>
		<?php include 'assets/button.php'; ?>
		<?php include 'assets/header.php'; ?>

		<div id="banner">
			<div class="caption">
				<h1>Partners</h1>
			</div>
		</div>
		
		<div id="main">
			<div class="bckg bg1"><img src="img/image-2.png"></div>
			<div class="bckg bg2"><img src="img/image-1.png"></div>

				<?php if(isset($_SESSION['country'])) { ?>
					<?php if($_SESSION['country'] == 'ru') { ?>
							<!--tukšums-->
					<?php } ?>

					<?php if($_SESSION['country'] == 'lv') { ?>
						<div class="partneri" style="width:88%">
							<div class="hover"><a href="http://pabstblueribbon.com"><img src="img/pabst-blue-ribbon.png"></a></div>
							<div class="hover"><a href="https://www.facebook.com/JamesonLatvija/"><img style="height:10vw" src="img/jameson-logo.png"></a></div>
							<div class="hover"><a href="https://www.facebook.com/dinamorigaofficial/?hc_ref=ARTXQNzfJJtfnr8ZdSehG3KZhk6vXuYKw_IzGRp16M12A_pCMEF1Jg3BSkYn2AlO8-Y"><img src="img/dinamo.png"></a></div>
							<div class="hover"><a href="http://pullmanriga.lv/lv/"><img style="height:3vw" src="img/pullman.png"></a></div>
							<div class="hover"><a href="https://www.facebook.com/BGsuitsLV/"><img src="img/suits.png"></a></div>
						</div>
					<?php } ?>

					<?php if($_SESSION['country'] == 'ee') { ?>
						<div class="partneri">
							<div class="hover"><a href="http://pabstblueribbon.com"><img src="img/pabst-blue-ribbon.png"></a></div>
							<div class="hover"><a href="https://www.facebook.com/BeardWoodOffical/"><img style="height:10vw" src="img/beardwood2.png"></a></div>
						</div>
					<?php } ?>
				<?php } else { ?>
				
				<?php } ?>
		</div>
		
		<?php include 'assets/footer.php'; ?>
	</body>
</html>