<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/lifestyle.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title>lifestyle</title>
	
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/animation.js"></script>
</head>
<body>
	<?php include 'assets/header.php'; ?>
	
	<div id="banner">
		<div class="caption">
			<h1><img src="img/vector_white.png">LIFESTYLE<img src="img/vector_white.png"></h1>
		</div>
	</div>
	
	<div id="main_info">
		<div class="blocks">
			<div class="rectangle">
			<div class="text">
			<div class="date"><p>03.09.2017</p></div>
			<h1><?php echo $language[$lang]['title1']; ?></h1>
			<p>
			<?php echo $language[$lang]['article1']; ?>
			</p>
			<p style="margin-top:1vw">Jim Black</p>
			</div>
			<div class="this_button"><a href="one_story.php"><button>></button></a></div>
			</div>
			<div class="image"><img src="img/gal/3.jpg"></div>
		</div>
		<div class="blocks">
			<div class="rectangle_2">
			<div class="text">
			<div class="date"><p style="text-align:right;">03.09.2017</p></div>
			<h1><?php echo $language[$lang]['title2']; ?></h1>
			<p>
			<?php echo $language[$lang]['article2']; ?>
			</p>
			<p style="margin-top:1vw; text-align: right;">Jim Black</p>
			</div>
			<div class="this_button"><a href="one_story.php"><button>></button></a></div>
			</div>
			<div class="image_2"><img src="img/gal/4.jpg"></div>
		</div>
		<div class="blocks">
			<div class="rectangle">
			<div class="text">
			<div class="date"><p>03.09.2017</p></div>
			<h1><?php echo $language[$lang]['title3']; ?></h1>
			<p>
			<?php echo $language[$lang]['article3']; ?>
			</p>
			<p style="margin-top:1vw">Jim Black</p>
			</div>
			<div class="this_button"><a href="one_story.php"><button>></button></a></div>
			</div>
			<div class="image"><img src="img/gal/5.jpg"></div>
		</div>
	</div>
	
	<div class="button"><button id="button">MORE</button></div>
	
	<div id="main_info_2" style="display:none">
		<div class="blocks">
			<div class="rectangle_2">
			<div class="text">
			<div class="date"><p style="text-align:right;">03.09.2017</p></div>
			<h1><?php echo $language[$lang]['title4']; ?></h1>
			<p>
			<?php echo $language[$lang]['article4']; ?>
			</p>
			<p style="margin-top:1vw; text-align:right;">Jim Black</p>
			</div>
			<div class="this_button"><a href="one_story.php"><button>></button></a></div>
			</div>
			<div class="image_2"><img src="img/gal/4.jpg"></div>
		</div>
		<div class="blocks">
			<div class="rectangle">
			<div class="text">
			<div class="date"><p>03.09.2017</p></div>
			<h1><?php echo $language[$lang]['title5']; ?></h1>
			<p>
			<?php echo $language[$lang]['article5']; ?>
			</p>
			<p style="margin-top:1vw">Jim Black</p>
			</div>
			<div class="this_button"><a href="one_story.php"><button>></button></a></div>
			</div>
			<div class="image"><img src="img/gal/5.jpg"></div>
		</div>
		<div class="blocks">
			<div class="rectangle_2">
			<div class="text">
			<div class="date"><p style="text-align:right;">03.09.2017</p></div>
			<h1><?php echo $language[$lang]['title6']; ?></h1>
			<p>
			<?php echo $language[$lang]['article6']; ?>
			</p>
			<p style="margin-top:1vw; text-align:right;">Jim Black</p>
			</div>
			<div class="this_button"><a href="one_story.php"><button>></button></a></div>
			</div>
			<div class="image_2"><img src="img/gal/4.jpg"></div>
		</div>
	</div>
	
	<div class="button1" style="display: none"><button id="button1">CLOSE</button></div>
	
	<?php include 'assets/footer.php'; ?>
</body>
</html>