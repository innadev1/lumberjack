<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/contacts.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<title>contacts</title>
		
		<script src="js/jquery-3.2.1.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/maps.js"></script>
		
	</head>
	<body>
		<?php include 'assets/header.php'; ?>
		<?php include 'assets/lang.php'; ?>

		
		<div id="map_latvia">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2176.0142993381833!2d24.10916245184924!3d56.948556280796225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfd6ae6a8ee7%3A0x5201dc34e6cc9b53!2sRiharda+V%C4%81gnera+iela+11%2C+Centra+rajons%2C+R%C4%ABga%2C+LV-1050!5e0!3m2!1sru!2slv!4v1503046502723" width="600" 
			height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<div id="map_latvia_2">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2175.800093302033!2d24.10330631627597!3d56.952226180891145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfda76257645%3A0x9c15d2ce05d3dfe9!2sPullman+Riga+Old+Town!5e0!3m2!1sru!2sru!4v1506079163955" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<div id="map_estonia">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2028.76387625749!2d24.762843116355008!3d59.43701258169663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4692935e89169b51%3A0xebca4dd8672bbe25!2zUHJvbmtzaSAzLCAxMDEyNCBUYWxsaW5uLCDQrdGB0YLQvtC90LjRjw!5e0!3m2!1sru!2sru!4v1503047115221" width="600" 
			height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<div id="map_russia">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1998.9349913166286!2d30.248911716371083!3d59.933220881874256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469630d1427f3f2b%3A0x7e406a0600f36d!2zMjkg0LvQuNC9LiDQktCw0YHQuNC70YzQtdCy0YHQutC-0LPQviDQvtGB0YLRgNC-0LLQsCwg0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsIDE5OTEwNg!5e0!3m2!1sru!2sru!4v1503047337531" width="600" 
			height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<div id="info">
			<div id="first_flex">
				<button class="first"><?php echo $language[$lang]['ofiss1'] ?></button>
				<table align="center">
					<tr>
						<th><h2><?php echo $language[$lang]['adr'] ?></h2></th>
						<td><p>Riharda Vagnera iela 11,<br> Riga, Latvia</p></td>
					</tr>
					<tr>
						<th><h2><?php echo $language[$lang]['form3'] ?></h2></th>
						<td><p>info@lumberjack.lv</p></td>
					</tr>
					<tr>
						<th><h2><?php echo $language[$lang]['te'] ?></h2></th>
						<td><p>+371 67 854 755</p></td>
					</tr>
				</table>
				<button id="trigger1" class="second"><?php echo $language[$lang]['map2'] ?></button>
			</div>
			<div id="second_flex">
				<button class="first"><?php echo $language[$lang]['marketing4'] ?></button>
				<table align="center">
					<tr>
						<th><h2><?php echo $language[$lang]['adr'] ?></h2></th>
						<td><p>Jēkaba iela 24,<br> Riga, Latvia</p></td>
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
						<td><p>+372 56969119</p></td>
					</tr>
				</table>
				<button id="trigger3" class="second"><?php echo $language[$lang]['map2'] ?></button>
			</div>
			<div id="four_flex">
				<button class="first"><?php echo $language[$lang]['franch.'] ?></button>
				<table align="center">
					<tr>
						<th><h2><?php echo $language[$lang]['adr'] ?></h2></th>
						<td><p>29 lin. Vasilyevskogo<br> ostrova, 2, Sankt-Peterburg</p></td>
					</tr>
					<tr>
						<th><h2><?php echo $language[$lang]['em'] ?></h2></th>
						<td><p>info@lumberjack.ru</p></td>
					</tr>
					<tr>
						<th><h2><?php echo $language[$lang]['te'] ?></h2></th>
						<td><p>+37 812 3240809</p></td>
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