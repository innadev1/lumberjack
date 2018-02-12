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
		 <meta property="fb:app_id" content="" />
		
		<meta property="og:image" content="http://lumberjackbarbershop.com/img/special.jpg" />
		<meta property="og:image:type" content="image/jpg" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="300" />
		<meta property="og:image:alt" content="A shiny red apple with a bite taken out" />

		<link rel="shortcut icon" href="img/favicon.png" type="image/png">
		<link rel="stylesheet" type="text/css" href="style/contacts.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<title>Lumberjack Barbershop</title>
		
		<script src="js/jquery-3.2.1.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/maps.js"></script>
		
	</head>
	<body>
		<?php include 'assets/button.php'; ?>
		<?php include 'assets/header.php'; ?>
		
		<div id="map_latvia">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2176.014299338182!2d24.109162451849254!3d56.948556280796254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfd6ae6a8ee7%3A0x5201dc34e6cc9b53!2sRiharda+V%C4%81gnera+iela+11%2C+Centra+rajons%2C+R%C4%ABga%2C+LV-1050!5e0!3m2!1slv!2slv!4v1509022568281" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<div id="map_latvia_2">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2175.630375136958!2d24.07059325184951!3d56.95513378079825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfe3a3385cb9%3A0xea12a58c86969715!2s%C5%AAdens+iela+12%2C+Kurzemes+rajons%2C+R%C4%ABga%2C+LV-1007!5e0!3m2!1slv!2slv!4v1516012665040" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<div id="map_estonia">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2028.7638762574868!2d24.762843116355!3d59.43701258169668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4692935e89169b51%3A0xebca4dd8672bbe25!2sPronksi+3%2C+10124+Tallinn%2C+Igaunija!5e0!3m2!1slv!2slv!4v1513696282660" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<div id="map_russia">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2176.014299338182!2d24.109162451849254!3d56.948556280796254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfd6ae6a8ee7%3A0x5201dc34e6cc9b53!2sRiharda+V%C4%81gnera+iela+11%2C+Centra+rajons%2C+R%C4%ABga%2C+LV-1050!5e0!3m2!1slv!2slv!4v1509022568281" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<div id="info">
			<div id="first_flex">
				<button class="first"><?php echo $language[$lang]['ofiss1'] ?></button>
				
				<?php if(isset($_SESSION['country'])) { ?>
					<?php if($_SESSION['country'] == 'ru') { ?>
						<table align="center">
							<tr>
								<th><h2><?php echo $language[$lang]['adr'] ?></h2></th>
								<td><p>Большой Казачий Переулок 11, Санкт-Петербург</p></td>
							</tr>
							<tr>
								<th><h2><?php echo $language[$lang]['em'] ?></h2></th>
								<!-- <td><p>info@lumberjack.lv</p></td> -->
							</tr>
							<tr>
								<th><h2><!--<?php echo $language[$lang]['te'] ?>--></h2></th>
								<td><p>+79818601122</p></td>
							</tr>
						</table>
					<?php } ?>

					<?php if($_SESSION['country'] == 'lv') { ?>
						<table align="center">
							<tr>
								<th><h2><?php echo $language[$lang]['adr'] ?></h2></th>
								<td><p>Riharda Vāgnera iela 11,<br> Rīga, Latvija, LV-1050</p></td>
							</tr>
							<tr>
								<th><h2><?php echo $language[$lang]['em'] ?></h2></th>
								<td><p>info@lumberjack.lv</p></td> 
							</tr>
							<tr>
								<th><h2><?php echo $language[$lang]['te'] ?></h2></th>
								<td><p>+371 67 854 755</p></td>
							</tr>
						</table>
					<?php } ?>

					<?php if($_SESSION['country'] == 'ee') { ?>
						<table align="center">
							<tr>
								<th><h2><?php echo $language[$lang]['adr'] ?></h2></th>
								<td><p>Pronksi 3, Tallin,<br> Estonia-10124</p></td>
							</tr>
							<tr>
								<th><h2><?php echo $language[$lang]['em'] ?></h2></th>
								<td><p>info@lumberjack.ee</p></td>
							</tr>
							<tr>
								<th><h2><?php echo $language[$lang]['te'] ?></h2></th>
								<td><p>+372 56 969 119</p></td>
							</tr>
						</table>
					<?php } ?>
				<?php } ?>
					
				<button id="trigger1" class="second"><?php echo $language[$lang]['map2'] ?></button>
			</div>
			<div id="second_flex">
				<button class="first"><?php echo $language[$lang]['marketing4'] ?></button>
				<table align="center">
					<tr>
						<th><h2><?php echo $language[$lang]['adr'] ?></h2></th>
						<td><p>Ūdens iela 12-26<br> Rīga, Latvija, LV-1007</p></td>
					</tr>
					<tr>
						<th><h2><?php echo $language[$lang]['em'] ?></h2></th>
						<td><p>k.gusarovs@vinille.com</p></td>
					</tr>
					<tr>
						<th><h2><?php echo $language[$lang]['te'] ?></h2></th>
						<td><p>+371 264 70 249</p></td>
					</tr>
				</table>
				<button id="trigger2" class="second"><?php echo $language[$lang]['map2'] ?></button>
			</div>
			<div id="third_flex">
				<button class="first"><?php echo $language[$lang]['shop3'] ?></button>
				<table align="center">
					<tr>
						<th><h2><?php echo $language[$lang]['adr'] ?></h2></th>
						<td><p>Pronksi 3, Tallin,<br> Estonia-10124</p></td>
					</tr>
					<tr>
						<th><h2><?php echo $language[$lang]['em'] ?></h2></th>
						<td><p>info@lumberjack.ee</p></td>
					</tr>
					<tr>
						<th><h2><?php echo $language[$lang]['te'] ?></h2></th>
						<td><p>+372 56 969 119</p></td>
					</tr>
				</table>
				<button id="trigger3" class="second"><?php echo $language[$lang]['map2'] ?></button>
			</div>
			<div id="four_flex">
				<button class="first"><?php echo $language[$lang]['franch.'] ?></button>
				<table align="center">
					<tr>
						<th><h2><?php echo $language[$lang]['adr'] ?></h2></th>
						<td><p>Riharda Vāgnera iela 11,<br> Rīga, Latvija, LV-1050</p></td>
					</tr>
					<tr>
						<th><h2><?php echo $language[$lang]['em'] ?></h2></th>
						<td><p>info@lumberjack.lv</p></td>
					</tr>
					<tr>
						<th><h2><?php echo $language[$lang]['te'] ?></h2></th>
						<td><p>+371 260 032 09</p></td>
					</tr>
				</table>
				<button id="trigger4" class="second"><?php echo $language[$lang]['map2'] ?></button>
			</div>
		</div>
		
		<div class="round_buttons">
			<button id="flip_1"></button>
			<button id="flip_2"></button>
			<button id="flip_3"></button>
			<button id="flip_4"></button>
		</div>
		
		<?php include 'assets/footer.php'; ?>
	</body>
</html>