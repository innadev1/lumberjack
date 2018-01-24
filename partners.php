<html>
	<head>
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
							<div class="hover"><a href="http://www.stanbev.lv/"><img src="img/pabst-blue-ribbon.png"></a></div>
							<div class="hover"><a href="http://www.stanbev.lv/"><img style="height:10vw" src="img/jameson-logo.png"></a></div>
							<div class="hover"><a href="https://www.facebook.com/dinamorigaofficial/?hc_ref=ARTXQNzfJJtfnr8ZdSehG3KZhk6vXuYKw_IzGRp16M12A_pCMEF1Jg3BSkYn2AlO8-Y"><img src="img/dinamo.png"></a></div>
							<div class="hover"><a href="http://pullmanriga.lv/lv/"><img style="height:3vw" src="img/pullman.png"></a></div>
						</div>
					<?php } ?>

					<?php if($_SESSION['country'] == 'ee') { ?>
						<div class="partneri">
							<div class="hover"><a href="http://www.stanbev.lv/"><img src="img/pabst-blue-ribbon.png"></a></div>
							<div class="hover"><a href="https://www.facebook.com/BeardWoodOffical/"><img style="height:10vw" src="img/beardwood2.png"></a></div>
						</div>
					<?php } ?>
				<?php } else { ?>
				
				<?php } ?>
		</div>
		
		<?php include 'assets/footer.php'; ?>
	</body>
</html>