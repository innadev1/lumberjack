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
		
		<div id="map_latvia">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2174.7135164737665!2d24.132421451849957!3d56.9708396808029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfb3d5d42e77%3A0xf59aeb68f1505ec7!2zS3JpxaFqxIHFhmEgVmFsZGVtxIFyYSBpZWxhIDEwMCwgVmlkemVtZXMgcHJpZWvFoXBpbHPEk3RhLCBSxKtnYSwgTFYtMTAxMw!5e0!3m2!1slv!2slv!4v1509022499820" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<div id="map_latvia_2">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2176.014299338182!2d24.109162451849254!3d56.948556280796254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfd6ae6a8ee7%3A0x5201dc34e6cc9b53!2sRiharda+V%C4%81gnera+iela+11%2C+Centra+rajons%2C+R%C4%ABga%2C+LV-1050!5e0!3m2!1slv!2slv!4v1509022568281" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
				<table align="center">
					<tr>
						<th><h2><?php echo $language[$lang]['adr'] ?></h2></th>
						<td><p>Krišjāņa Valdemāra iela 100,<br>Rīga, Latvija, LV-1013</p></td>
					</tr>
					<tr>
						<th><h2><?php echo $language[$lang]['em'] ?></h2></th>
						<td><p>info@lumberjack.lv</p></td>
					</tr>
					<tr>
						<th><h2><!--<?php echo $language[$lang]['te'] ?>--></h2></th>
						<td><p><!--+371 67 854 755--></p></td>
					</tr>
				</table>
				<button id="trigger1" class="second"><?php echo $language[$lang]['map2'] ?></button>
			</div>
			<div id="second_flex">
				<button class="first"><?php echo $language[$lang]['marketing4'] ?></button>
				<table align="center">
					<tr>
						<th><h2><?php echo $language[$lang]['adr'] ?></h2></th>
						<td><p>Riharda Vagnera iela 11,<br> Riga, Latvia</p></td>
					</tr>
					<tr>
						<th><h2><?php echo $language[$lang]['em'] ?></h2></th>
						<td><p>info@vinille.com</p></td>
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
						<td><p>info@lumberjack.lv</p></td>
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
						<td><p>+371 56 02 612</p></td>
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