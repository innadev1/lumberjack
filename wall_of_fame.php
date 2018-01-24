<html>
<?php include 'assets/button.php'; ?>
	<head>
		<link rel="shortcut icon" href="img/favicon.png" type="image/png">
		<link rel="stylesheet" type="text/css" href="style/wall_of_fame.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		
		
                <?php if($lang == 'lv') { ?>
        			<link rel="stylesheet" type="text/css" href="style/lv.css">
                <?php } ?>

                <?php if($lang == 'ru') { ?>
                    <link rel="stylesheet" type="text/css" href="style/ru.css">
                <?php } ?>

                <?php if($lang == 'en') { ?>
                    <link rel="stylesheet" type="text/css" href="style/en.css">
                <?php } ?>
				
				<?php if($lang == 'ee') { ?>
                    <link rel="stylesheet" type="text/css" href="style/ee.css">
                <?php } ?>
					
		
		
		
		
		<title>Lumberjack Barbershop</title>
		
		<script src="js/jquery-3.2.1.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/wall_of_fame.js"></script>
	</head>
	<body>
		
		<?php include 'assets/header.php'; ?>
		
		<div id="banner">
			<div class="caption">
				<h1><?php echo $language[$lang]['wof'] ?></h1>
			</div>
		</div>
		
		<div class="main-wall" style="background-image:<?php echo $language[$lang]['wall-of-fame'] ?>"></div>
		
		<!--<div id="main">
			
			<div class="main">
				<div class="photo2"><img src="img/wall_of_fame/3.jpg"></div>
				<div class="text_about_fame2">
					<h1><?php echo $language[$lang]['wall8'] ?></h1>
					<h2><?php echo $language[$lang]['wall8-1'] ?></h2>
					<p>  
					</p>
				</div>
				<div class="photo_background2"><img src="img/wall_of_fame/4.png"></div>
			</div>
			<div class="main">
				<div class="photo"><img src="img/wall_of_fame/5.jpg"></div>
				<div class="text_about_fame">
					<h1><?php echo $language[$lang]['wall0'] ?></h1>
					<h2><?php echo $language[$lang]['wall0-1'] ?></h2>
					<p>  
					</p>
				</div>
				<div class="photo_background"><img src="img/wall_of_fame/6.png"></div>
			</div>
			<div class="main">
				<div class="photo2"><img src="img/wall_of_fame/35.jpg"></div>
				<div class="text_about_fame2">
					<h1><?php echo $language[$lang]['wall4'] ?></h1>
					<h2><?php echo $language[$lang]['wall4-1'] ?></h2>
					<p>  
					</p>
				</div>
				<div class="photo_background2"><img src="img/wall_of_fame/36.png"></div>
			</div>

			<div class="main">
				<div class="photo"><img src="img/wall_of_fame/13.jpg"></div>
				<div class="text_about_fame">
					<h1><?php echo $language[$lang]['wall2'] ?></h1>
					<h2><?php echo $language[$lang]['wall2-1'] ?></h2>
					<p>  
					</p>
				</div>
				<div class="photo_background"><img src="img/wall_of_fame/14.png"></div>
			</div>
			<div class="main">
				<div class="photo2"><img src="img/wall_of_fame/16.jpg"></div>
				<div class="text_about_fame2">
					<h1><?php echo $language[$lang]['wall3'] ?></h1>
					<h2><?php echo $language[$lang]['wall3-1'] ?></h2>
					<p>  
					</p>
				</div>
				<div class="photo_background2"><img src="img/wall_of_fame/15.png"></div>
			</div>
			<div class="main">
				<div class="photo"><img src="img/wall_of_fame/17.jpg"></div>
				<div class="text_about_fame">
					<h1><?php echo $language[$lang]['wall11'] ?></h1>
					<h2><?php echo $language[$lang]['wall11-1'] ?></h2>
					<p>  
					</p>
				</div>
				<div class="photo_background"><img src="img/wall_of_fame/18.png"></div>
			</div>
			<div class="main">
				<div class="photo2"><img src="img/wall_of_fame/23.jpg"></div>
				<div class="text_about_fame2">
					<h1><?php echo $language[$lang]['wall5'] ?></h1>
					<h2><?php echo $language[$lang]['wall5-1'] ?></h2>
					<p>  
					</p>
				</div>
				<div class="photo_background2"><img src="img/wall_of_fame/24.png"></div>
			</div>
			<div class="main">
				<div class="photo"><img src="img/wall_of_fame/25.jpg"></div>
				<div class="text_about_fame">
					<h1><?php echo $language[$lang]['wall6'] ?></h1>
					<h2><?php echo $language[$lang]['wall6-1'] ?></h2>
					<p>  
					</p>
				</div>
				<div class="photo_background"><img src="img/wall_of_fame/26.png"></div>
			</div>
			<div class="main">
				<div class="photo2"><img src="img/wall_of_fame/27.jpg"></div>
				<div class="text_about_fame2">
					<h1><?php echo $language[$lang]['wall7'] ?></h1>
					<h2><?php echo $language[$lang]['wall7-1'] ?></h2>
					<p>  
					</p>
				</div>
				<div class="photo_background2"><img src="img/wall_of_fame/28.png"></div>
			</div>
			<div class="main">
				<div class="photo"><img src="img/wall_of_fame/20.jpg"></div>
				<div class="text_about_fame">
					<h1><?php echo $language[$lang]['wall1'] ?></h1>
					<h2><?php echo $language[$lang]['wall1-1'] ?></h2>
					<p>  
					</p>
				</div>
				<div class="photo_background"><img src="img/wall_of_fame/19.png"></div>
			</div>
			<div class="main">
				<div class="photo2"><img src="img/wall_of_fame/7.jpg"></div>
				<div class="text_about_fame2">
					<h1><?php echo $language[$lang]['wall9'] ?></h1>
					<h2><?php echo $language[$lang]['wall9-1'] ?></h2>
					<p>  
					</p>
				</div>
				<div class="photo_background2"><img src="img/wall_of_fame/8.png"></div>
			</div>
			<div class="main">
				<div class="photo"><img src="img/wall_of_fame/1.jpg"></div>
				<div class="text_about_fame">
					<h1><?php echo $language[$lang]['wall10'] ?></h1>
					<h2><?php echo $language[$lang]['wall10-1'] ?></h2>
					<p>  
					</p>
				</div>
				<div class="photo_background"><img src="img/wall_of_fame/2.png"></div>
			</div>
		</div>-->
		
		<?php include 'assets/footer.php'; ?>
	</body>
</html>