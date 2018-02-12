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
		<link rel="stylesheet" type="text/css" href="style/our_story.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<title>Lumberjack Barbershop</title>
		
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	</head>
	<body>
		<?php include 'assets/button.php'; ?>
		<?php include 'assets/header.php'; ?>
		
		<div id="banner" class="flex">
			<div id="banner-top"><img src="img/bc1.png"></div>
			<div class="caption flex">
				<h1><?php echo $language[$lang]['our_story'] ?></h1>
			</div>
		</div>

		<?php if(!isset($_SESSION['country']) || $_SESSION['country'] != 'ru') { ?>
    				<div id="main_info" style="background-image: url(img/our-story.jpg)">
        <?php }else{ ?>
					<div id="main_info" style="background-image: url(img/for-russia.png)">
		<?php } ?>
			<div class="line-orange"><img src="img/ikonas/1.svg"></div>
			
				<div class="div" id="ph0">
					<div></div>
					<p><?php echo $language[$lang]['that00'] ?><br> 01.06.2015</p>
				</div>
				<div class="div" id="ph1">
					<div></div>
					<p><?php echo $language[$lang]['that1'] ?></p>
				</div>
				<div class="div" id="ph3">
					<div></div>
					<p><?php echo $language[$lang]['that3'] ?></p>				
				</div>
				<div class="y2016 year"><img src="img/ikonas/2016.svg"></div>
				<div class="div" id="ph4">
					<div></div>
					<p><?php echo $language[$lang]['that5'] ?></p>				
				</div>
				<div class="div" id="ph5">
					<div></div>
					<p><?php echo $language[$lang]['that4'] ?></p>				
				</div>
				<div class="div" id="ph6">
					<div></div>
					<p><?php echo $language[$lang]['that6'] ?></p>				
				</div>
				<div class="div" id="ph7">
					<div></div>
					<p><?php echo $language[$lang]['that7'] ?></p>				
				</div>
				<div class="div" id="ph9">
					<div></div>
					<p><?php echo $language[$lang]['that9'] ?></p>				
				</div>
				<div class="y2017 year"><img src="img/ikonas/2017.svg"></div>
				<div class="div" id="ph8">
					<div></div>
					<p><?php echo $language[$lang]['that8'] ?></p>				
				</div>
				<div class="div" id="ph10">
					<div></div>
					<p><?php echo $language[$lang]['that10'] ?></p>				
				</div>
				<div class="div" id="ph11">
					<div></div>
					<p><?php echo $language[$lang]['that11'] ?></p>				
				</div>
				<div class="y2018 year"><img src="img/ikonas/2018.svg"></div>
				<div class="div" id="ph12">
					<div></div>
					<p><?php echo $language[$lang]['that12'] ?>
					</p>				
				</div>
				<div id="ph13"><h5>to be continued...</h5></div>
		
		</div>
		
		<?php include 'assets/footer.php'; ?>
	</body>
</html>