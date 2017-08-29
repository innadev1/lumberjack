<?php


	$error_message_n = "";
	$error_message_n2 = "";
	$error_message_p1 = "";
	$error_message_p2 = "";
	$error_message_m = "";
	$error_message_t = "";
	$error_message_d = "";
	$mailSuccess = false;

	if(isset($_POST['emailsent']))
	{

		echo ($error_message_n);
		echo ($error_message_n2);
		echo ($error_message_p1);
		echo ($error_message_p2);
		echo ($error_message_m);
		echo ($error_message_t);
		echo ($error_message_d);

		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['mail'];
		$typeOfService = $_POST['typeOfService'];
		$date = $_POST['date'];
		$text = $_POST['text'];
		$error_message_n = "";
		$error_message_p1 = "";
		$error_message_p2 = "";
		$error_message_m = "";
		$error_message_t = "";
		$error_message_d = "";

		$errors = ['name'=>0,'phone'=>0,'mail'=>0, 'typeOfService'=>0, 'date'=>0, 'text'=>0];
		
		$email_exp_a = "/[^A-Za-z]/";
		// Name
		if(strlen($name) < 2) {
			$error_message_n .= '<p class="red">Name too short.</p>';
			$errors['name'] = 1;
		}

		if(preg_match($email_exp_a,$_POST['name'])) {
			$error_message_n2 .= '<p class="red">Only alphabet.</p>';
			$errors['name'] = 1;
		}

		// PHONE
		$error_message = "";
		$email_exp = "/[^0-9]/";

		if(preg_match($email_exp,$_POST['phone'])) {
			$error_message_p1 .= '<p class="red">only numbers!</p>';
			$errors['phone'] = 1;
		}
		if(strlen($_POST['phone']) < 7) {
			$error_message_p2 .= '<p class="red">Phone too short!</p>';
			$errors['phone'] = 1;
		}
		// EMAIL 
		$error_message = "";
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

		if(!preg_match($email_exp,$email)) {
			$error_message_m .= '<p class="red">Please enter email!</p>';
			$errors['mail'] = 1;
		}
		// Type Of Style
		if($_POST['typeOfService'] == '-'){
			$error_message_t .= '<p class="red">Type of style is empty. Please enter type of style.!</p>';
			// echo ($error_message);
		}

		// DATE 
		if(empty($date)){
			$error_message_d .= '<p class="red">Please enter Date!</p>';
			$errors['date'] = 1;
		}
		$mailSuccess = false;
		if( empty($error_message_n) && empty($error_message_p) && empty($error_message_m) && empty($error_message_t) && empty($error_message_d) ) {
			$to      = 'my.worktest94@gmail.com';
			$subject = 'the Client';
			$message = "Name:" . " " . $name . "\r\n" . "Phone:" . " " . $phone . "\r\n" . "E-mail:" . " " . $email . "\r\n" . "Type of service:" . " " . $typeOfService . "\r\n" . "Date:" . " " . $date . "\r\n" . "Details:" . " " . $text;
			$headers = 'From:' . $email . "\r\n" .
			'Reply-To:' . $email . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			if(mail($to, $subject, $message, $headers)){
				$mailSuccess = true;
			}
		
		// echo "check Your Email";
	}else{
		
		// $reply = "reply";
	}
	}


	if(isset($_POST['emailsent'])){

		$stuff = $_POST['emailsent'];
		
        if($stuff == "riga1"){  
            $adress = "my.worktest@gmail.com";
        }else if($stuff == "riga2"){
			$adress = "my.worktest@gmail.com";
        }
        else if($stuff == "estonia"){
			$adress = "my.worktest@gmail.com";
        }
        else if($stuff == "russia"){
			$adress = "my.worktest@gmail.com";
        }
    }

?>


 <html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/barbershop.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<link rel="stylesheet" type="text/css" href="style/form.css">
		<title>barbershop</title>
		
		<script src="js/jquery-3.2.1.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/barbershop.js"></script>
		
		<!--for time  -->

		<meta charset = "utf-8">
      	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      	 <script src = "https://code.jquery.com/jquery-1.10.2.js"></script> 
      	 <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 
      
      	<!-- Javascript -->
      	<script>
         	$(function() {
				 
            	$( "#datepicker-10" ).datepicker({
					minDate: 0,
					changeMonth:true,
					changeYear:true,
					numberOfMonths:[1,1]
            	});
         	});
      	</script>

		<script>
         	$(function() {
				 
            	$( "#datepicker-11" ).datepicker({
					minDate: 0,
					changeMonth:true,
					changeYear:true,
					numberOfMonths:[1,1]
            	});
         	});
      	</script>

		<script>
         	$(function() {
				 
            	$( "#datepicker-12" ).datepicker({
					minDate: 0,
					changeMonth:true,
					changeYear:true,
					numberOfMonths:[1,1]
            	});
         	});
      	</script>

		<script>
         	$(function() {
				 
            	$( "#datepicker-13" ).datepicker({
					minDate: 0,
					changeMonth:true,
					changeYear:true,
					numberOfMonths:[1,1]
            	});
         	});
      	</script>

		

	</head>
	<body>
		<?php include 'assets/header.php'; ?>
		
		<div id="banner">
			<div class="caption">
				<h1><img src="img/vector_white.png">4 BARBERSHOPS<img src="img/vector_white.png"></h1>
				<h2>3 COUNTRIES</h2>
			</div>
		</div>
		
		<div id="info_about_barbershop">
			<p>
				This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. 
				Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis 
				sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. 
				Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. 
				Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu 
				ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. 
				Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed 
				ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum 
				feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.
			</p>
		</div>
		
		<div id="country" class="latvia">
			<div class="country_name" id="c1"><h1>Latvia</h1></div>
			<div class="countries"><img src="img/countries/latvia.jpg" class="gal1">
				<div id="map_latvia">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2176.0142993381833!2d24.10916245184924!3d56.948556280796225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfd6ae6a8ee7%3A0x5201dc34e6cc9b53!2sRiharda+V%C4%81gnera+iela+11%2C+Centra+rajons%2C+R%C4%ABga%2C+LV-1050!5e0!3m2!1sru!2slv!4v1503046502723" width="600" 
					height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>


			<!--Email To Latvia  -->

			<table id="table" align="center">
				<tr>
					<td>
						<div class="info">			
							<table>
								<tr>
									<td><h2>Adress:</h2></td>
									<td><p>Riharda Vagnera iela 11, Riga, Latvia</p></td>
								</tr>
								<tr>
									<td><h2>Email:</h2></td>
									<td><p>info@lumberjack.lv</p></td>
								</tr>
								<tr>
									<td><h2>Tel.:</h2></td>
									<td><p>+371 67 854 755</p></td>
								</tr>
								<tr>
									<td><h2>Open:</h2></td>
								<td></td>
								</tr>
								<tr>
									<td><h2>Mon.-Sat.:</h2></td>
									<td><p>10.00-20.00</p></td>
								</tr>
								<tr>
									<td><h2>Sunday:</h2></td>
									<td><p>11.00-17.00</p></td>
								</tr>
							</table>
						</div>
					</td>

					<!--Email To Latvia  -->
					
					<td>
					<div class="info">			
						<table>
							<tr>
								<td><h2>Adress:</h2></td>
								<td><p>Riharda Vagnera iela 11, Riga, Latvia</p></td>
							</tr>
							<tr>
								<td><h2>Email:</h2></td>
								<td><p>info@lumberjack.lv</p></td>
							</tr>
							<tr>
								<td><h2>Tel.:</h2></td>
								<td><p>+371 67 854 755</p></td>
							</tr>
							<tr>
								<td><h2>Open:</h2></td>
							<td></td>
							</tr>
							<tr>
								<td><h2>Mon.-Sat.:</h2></td>
								<td><p>10.00-20.00</p></td>
							</tr>
							<tr>
								<td><h2>Sunday:</h2></td>
								<td><p>11.00-17.00</p></td>
							</tr>
						</table>
					</div>
					</td>
				
				</tr>
			</table>

			<div class="button1" id="tr1"><button>OPEN MAP</button></div>
			<div class="button1" id="but1"><button>CLOSE MAP</button></div>
				
			<div class="flex">
				<div class="buttons" id="toggler_services_1"><button>SERVICES</button></div>
				<div class="buttons" id="book_an_appointment_1"><button class="book" id="riga1" stuff="riga1">BOOK AN APPOINTMENT</button></div>
				<div class="buttons" id="book_an_appointment_2"><button class="book" id="riga2" stuff="riga2">BOOK AN APPOINTMENT</button></div>
				<div class="buttons" id="toggler_barbers_1"><button>BARBERS</button></div>
				<div class="buttons" id="toggler_rewiews_1"><button>REWIEWS</button></div>
			</div>
			
			<div id="services_1">

				<div class="flex">
					<div class="buttons_2"><button>ALL SERVICES</button></div>
					<div class="buttons_2"><button>HAIR</button></div>
					<div class="buttons_2"><button>MASSAGE</button></div>
					<div class="buttons_2"><button>SHAVING & SKIN</button></div>
				</div>
				
				<div id="table_about">
					<table width="80%">
						<tr>
							<th>
								<h1>Beard trim</h1>
								<p>If any shaving is requested yhe price will be 42eur.</p>
							</th>
							<td>
								<h1>32.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Facial treatment</h1>
								<p>Cleanse, tone, mask, face massage and extraction. 30 MIN approx.</p>
							</th>
							<td>
								<h1>50.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Haircut Scissors</h1>
							</th>
							<td>
								<h1>30.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Haircut Machine</h1>
							</th>
							<td>
								<h1>15.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Beard trim</h1>
								<p>If any shaving is required the price will be 42eur.</p>
							</th>
							<td>
								<h1>32.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Facial treatement</h1>
								<p>Cleanse, tone, mack, face massage and extraction. 30 MIN approx.</p>
							</th>
							<td>
								<h1>50.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Haircut Scissors</h1>
							</th>
							<td>
								<h1>30.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Haircut Machine</h1>
							</th>
							<td>
								<h1>15.00 EUR</h1>
							</td>
						</tr>
					</table>
				</div>
			
			</div>

			<div id="barbers_1">
				
				<div class="wrap_barbers">
					<div class="photo photo_1">
						<div class="text">
							<h1>Martins</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_2">
						<div class="text">
							<h1>Kristaps</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_3">
						<div class="text">
							<h1>Janis</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_4">
						<div class="text">
							<h1>Miks</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_5">
						<div class="text">
							<h1>Juris</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_6">
						<div class="text">
							<h1>Kaspars</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
				</div>
			
			</div>
			
			<div id="rewiews_1">
			
				<div id="fb-root"></div>

				<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/lv_LV/sdk.js#xfbml=1&version=v2.10&appId=483586638671396";
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>

				<div class="fb-comments" data-href="https://www.facebook.com/lumberjackbarbershopriga" data-width="100" data-numposts="5"></div>
			</div>
		
		</div>

			<!--Email To Estonia  -->
		<div id="country" class="eesti">
			<div class="country_name" id="c2"><h1>Estonia</h1></div>
			<div class="countries"><img src="img/countries/estonia.jpg" class="gal2">
				<div id="map_estonia">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2028.76387625749!2d24.762843116355008!3d59.43701258169663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4692935e89169b51%3A0xebca4dd8672bbe25!2zUHJvbmtzaSAzLCAxMDEyNCBUYWxsaW5uLCDQrdGB0YLQvtC90LjRjw!5e0!3m2!1sru!2sru!4v1503047115221" width="600" 
					height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>

			<table id="table" align="center" style="width: 45%">
				<tr>
					<td>
						<div class="info">			
							<table>
								<tr>
									<td><h2>Adress:</h2></td>
									<td><p>Pronksi 3, Tallin, Estonia-10124</p></td>
								</tr>

								<tr>
									<td><h2>Email:</h2></td>
									<td><p>info@lumberjack.ee</p></td>
								</tr>

								<tr>
									<td><h2>Tel.:</h2></td>
									<td><p>+372 56969119</p></td>
								</tr>
							</table>
						</div>
					</td>
					
					<td>
					<div class="info">			
						<table>
							<tr>
								<td><h2>Open:</h2></td>
							<td></td>
							</tr>
							<tr>
								<td><h2>Mon.-Sat.:</h2></td>
								<td><p>10.00-20.00</p></td>
							</tr>
							<tr>
								<td><h2>Sunday:</h2></td>
								<td><p>11.00-17.00</p></td>
							</tr>
						</table>
					</div>
					</td>
				
				</tr>
			</table>

			<div class="button2" id="tr2"><button>OPEN MAP</button></div>
			<div class="button2" id="but2"><button>CLOSE MAP</button></div>
				
			<div class="flex">
				<div class="buttons" id="toggler_services_2"><button>SERVICES</button></div>
				<div class="buttons" id="book_an_appointment_3"><button class="book" id="estonia" stuff="estonia">BOOK AN APPOINTMENT</button></div>
				<div class="buttons" id="toggler_barbers_2"><button>BARBERS</button></div>
				<div class="buttons" id="toggler_rewiews_2"><button>REWIEWS</button></div>
			</div>

			<div id="services_2">

				<div class="flex">
					<div class="buttons_2"><button>ALL SERVICES</button></div>
					<div class="buttons_2"><button>HAIR</button></div>
					<div class="buttons_2"><button>MASSAGE</button></div>
					<div class="buttons_2"><button>SHAVING & SKIN</button></div>
				</div>
				
				<div id="table_about">
					<table width="80%">
						<tr>
							<th>
								<h1>Beard trim</h1>
								<p>If any shaving is requested yhe price will be 42eur.</p>
							</th>
							<td>
								<h1>32.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Facial treatment</h1>
								<p>Cleanse, tone, mask, face massage and extraction. 30 MIN approx.</p>
							</th>
							<td>
								<h1>50.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Haircut Scissors</h1>
							</th>
							<td>
								<h1>30.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Haircut Machine</h1>
							</th>
							<td>
								<h1>15.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Beard trim</h1>
								<p>If any shaving is required the price will be 42eur.</p>
							</th>
							<td>
								<h1>32.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Facial treatement</h1>
								<p>Cleanse, tone, mack, face massage and extraction. 30 MIN approx.</p>
							</th>
							<td>
								<h1>50.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Haircut Scissors</h1>
							</th>
							<td>
								<h1>30.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Haircut Machine</h1>
							</th>
							<td>
								<h1>15.00 EUR</h1>
							</td>
						</tr>
					</table>
				</div>
			
			</div>

			<div id="barbers_2">
			
				<div class="wrap_barbers">
					<div class="photo photo_1">
						<div class="text">
							<h1>Martins</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_2">
						<div class="text">
							<h1>Kristaps</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_3">
						<div class="text">
							<h1>Janis</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_4">
						<div class="text">
							<h1>Miks</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_5">
						<div class="text">
							<h1>Juris</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_6">
						<div class="text">
							<h1>Kaspars</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
				</div>
			
			</div>
			<div id="rewiews_2">

				<div id="fb-root"></div>

				<script>(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/lv_LV/sdk.js#xfbml=1&version=v2.10&appId=483586638671396";
					fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>

				<div class="fb-comments" data-href="https://www.facebook.com/lumberjackbarbershoptallin" data-width="100%" data-numposts="5"></div>
			
			</div>
			
		</div>
		
		<div id="country" class="russia">
			<div class="country_name" id="c3"><h1>Russia</h1></div>

			<div class="countries"><img src="img/countries/russia.jpg" class="gal3">
				<div id="map_russia">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1998.9349913166286!2d30.248911716371083!3d59.933220881874256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469630d1427f3f2b%3A0x7e406a0600f36d!2zMjkg0LvQuNC9LiDQktCw0YHQuNC70YzQtdCy0YHQutC-0LPQviDQvtGB0YLRgNC-0LLQsCwg0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsIDE5OTEwNg!5e0!3m2!1sru!2sru!4v1503047337531" width="600" 
					height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>	


			<!--Email To Russia  -->
			<table id="table" align="center" style="width: 45%">
				<tr>
					<td>
						<div class="info">			
							<table>
								<tr>
									<td><h2>Adress:</h2></td>
									<td><p>29 lin. Vasilyevskogo ostrova, 2, Sankt-Peterburg</p></td>
								</tr>
								<tr>
									<td><h2>Email:</h2></td>
									<td><p>info@lumberjack.ru</p></td>
								</tr>
								<tr>
									<td><h2>Tel.:</h2></td>
									<td><p>+37 812 3240809</p></td>
								</tr>
							</table>
						</div>
					</td>
					
					<td>
					<div class="info">			
						<table>
							<tr>
								<td><h2>Open:</h2></td>
							<td></td>
							</tr>
							<tr>
								<td><h2>Mon.-Sat.:</h2></td>
								<td><p>10.00-20.00</p></td>
							</tr>
							<tr>
								<td><h2>Sunday:</h2></td>
								<td><p>11.00-17.00</p></td>
							</tr>
						</table>
					</div>
					</td>
				
				</tr>
			</table>

			<div class="button3" id="tr3"><button>OPEN MAP</button></div>
			<div class="button3" id="but3"><button>CLOSE MAP</button></div>
		
			<div class="flex">
				<div class="buttons" id="toggler_services_3"><button>SERVICES</button></div>
				<div class="buttons" id="book_an_appointment_4"><button class="book" id="russia" stuff="russia">BOOK AN APPOINTMENT</button></div>
				<div class="buttons" id="toggler_barbers_3"><button>BARBERS</button></div>
				<div class="buttons" id="toggler_rewiews_3"><button>REWIEWS</button></div>
			</div>
			
			<div id="services_3">

				<div class="flex">
					<div class="buttons_2"><button>ALL SERVICES</button></div>
					<div class="buttons_2"><button>HAIR</button></div>
					<div class="buttons_2"><button>MASSAGE</button></div>
					<div class="buttons_2"><button>SHAVING & SKIN</button></div>
				</div>
				
				<div id="table_about">
					<table width="80%">
						<tr>
							<th>
								<h1>Beard trim</h1>
								<p>If any shaving is requested yhe price will be 42eur.</p>
							</th>
							<td>
								<h1>32.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Facial treatment</h1>
								<p>Cleanse, tone, mask, face massage and extraction. 30 MIN approx.</p>
							</th>
							<td>
								<h1>50.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Haircut Scissors</h1>
							</th>
							<td>
								<h1>30.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Haircut Machine</h1>
							</th>
							<td>
								<h1>15.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Beard trim</h1>
								<p>If any shaving is required the price will be 42eur.</p>
							</th>
							<td>
								<h1>32.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Facial treatement</h1>
								<p>Cleanse, tone, mack, face massage and extraction. 30 MIN approx.</p>
							</th>
							<td>
								<h1>50.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Haircut Scissors</h1>
							</th>
							<td>
								<h1>30.00 EUR</h1>
							</td>
						</tr>
						<tr>
							<th>
								<h1>Haircut Machine</h1>
							</th>
							<td>
								<h1>15.00 EUR</h1>
							</td>
						</tr>
					</table>
				</div>
			
			</div>
			
			<div id="barbers_3">
			
				<div class="wrap_barbers">
					<div class="photo photo_1">
						<div class="text">
							<h1>Martins</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_2">
						<div class="text">
							<h1>Kristaps</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_3">
						<div class="text">
							<h1>Janis</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_4">
						<div class="text">
							<h1>Miks</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_5">
						<div class="text">
							<h1>Juris</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
					<div class="photo photo_6">
						<div class="text">
							<h1>Kaspars</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							</p>
						</div>
					</div>
				</div>
			
			</div>
			
			<div id="rewiews_3">
			
				<div id="fb-root"></div>

				<script>(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/lv_LV/sdk.js#xfbml=1&version=v2.10&appId=483586638671396";
					fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>

					<div class="fb-comments" data-href="https://ru-ru.facebook.com/lumberjackbarbershopriga/" data-width="100%" data-numposts="5"></div>
				</div>
			
			</div>

		<div class="remodal-overlay" style="display: none;">
				<div class="remodal" data-remodal-id="modal" style="visibility: visible;">

					<img src="img/logo-half.png" id="bookin-workshop">
					<?php if(!$mailSuccess){ ?>
									
			<form id="form" name="orderform" method="post" action="barbershop.php">

				<p>To request an appointment for a one of our service - simply fill in the form below, click send and administrator will be in touch shortly to confirm your booking.</p>

				<div class="appointment_place"><p>Adress: 29 lin. Vasilyevskogo ostrova, 2, Sankt-Peterburg</p></div>
			
				<div class="bookinput">
					<label>Name</label>
					<span class=" your-name"><input type="text" value = "<?php if(isset($_POST['name']) && $errors['name'] == 0 ){ echo $_POST['name']; } ?>" name="name" size="40" class="wpcf7-text" required="required" placeholder="Your full name"></span>
				</div>
				<!--ERRROR  -->
					<?php echo ($error_message_n); ?>
					<?php echo ($error_message_n2); ?>
				<!--END-->


				<div class="bookinput">
					<label>Phone</label>
					<span class="your-name"><input type="tel" value = "<?php if(isset($_POST['phone']) && $errors['phone'] == 0){ echo $_POST['phone']; } ?>" name="phone" size="40" class="wpcf7-text" required="required" placeholder="Contact number"></span>
				</div>
				<!--ERRROR  -->
					<?php echo ($error_message_p1); ?>
					<?php echo ($error_message_p2); ?>
				<!--END-->



				<div class="bookinput">
					<label>E-mail</label>
					<span class="your-name"><input type="text" value = "<?php if(isset($_POST['mail']) && $errors['mail'] == 0){ echo $_POST['mail']; } ?>" name="mail" size="40" class="wpcf7-text" placeholder="Your email"></span>
				</div>
				<!--ERRROR  -->
					<?php echo ($error_message_m); ?>
				<!--END-->



				<div class="styled-select">
					<span class="wpcf7-form-control-wrap menu-471">
						<select name="typeOfService" class="wpcf7-select" required="required">
							<option value="-" >Type of service</option>
							<option value="Haircut+Beard Trim" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Haircut+Beard Trim' && $errors['typeOfService'] == 0) echo "selected"; ?> >Haircut+Beard Trim</option>
							<option value="Haircut" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Haircut' && $errors['typeOfService'] == 0) echo "selected"; ?> >Haircut</option>
							<option value="Beard Trim" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Beard Trim' && $errors['typeOfService'] == 0) echo "selected"; ?> >Beard Trim</option>
							<option value="Hot Shave" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Hot Shave' && $errors['typeOfService'] == 0) echo "selected"; ?> >Hot Shave</option>
						</select>
					</span>
				</div>
				<!--ERRROR  -->
					<?php echo ($error_message_t); ?>
				<!--END-->



				<div class="bookinputdate">
					<!-- <label>Date</label>  <span class="wpcf7-form-control-wrap date-87"><input type="date" name="date" class="wpcf7-date" placeholder="dd/mm/yyyy"></span> -->

					<label>Date</label><span class="wpcf7-form-control-wrap date-87"><input class="wpcf7-date" value = "<?php if(isset($_POST['date']) && $errors['date'] == 0){ echo $_POST['date']; } ?>" name="date" type = "text" readonly="readonly" id = "datepicker-13" placeholder="Pick your date"></spam>

				</div>
				<!--ERRROR  -->
					<?php echo ($error_message_d); ?>
				<!--END-->
				
				<div class="booktextarea">
					<label>Details</label>
					<span class="your-message"><textarea text="type" name="text" form="form" cols="40" rows="5" class="wpcf7-textarea" placeholder="Please give us as much detail as possible!"></textarea></span>
				</div>
				

				<div class="col-sm-12">

					<input type="hidden" id="hidden_input" name ='book_place' value="">

					<input class="blackbutton" type="submit" name="emailsent" value="send" placeholder="send">
				</div>					
				
			</form>

			<?php
			}else if($mailSuccess){
				
				$checkemail = "<p>Check your Email</p>";
				
				echo $checkemail;
			} ?>
					<a href="#" class="remodal-close_1"></a>

				</div>
			</div>

			<div class="round_buttons">
				<button id="flip_1"></button>
				<button id="flip_2"></button>
				<button id="flip_3"></button>
			</div>
	
		<?php include 'assets/footer.php'; ?>
	</body>
	<script>
		$(function(){
			$('.book').click(function(){
				val = $(this).attr('stuff')
				ind = $(this).parent().parent().index()
				p = $('.appointment_place p')			
				hiddenInput =$('#hidden_input') 	
				console.log("daww")
				$(".remodal-overlay").css("display", "block")

				stuff = $(this).attr('stuff')

				if(stuff=='riga1'){
					p.html('Riharda Vagnera iela 11, Riga, Latvia')
					hiddenInput.attr('value','riga1')
					

				}else if(stuff=='riga2'){
					p.html('Riharda Vagnera iela 11, Riga, Latvia(2)')

				}else if(stuff=='estonia'){
					p.html('Pronksi 3, Tallin, Estonia-10124')

				}else if(stuff=='russia'){
					p.html('29 lin. Vasilyevskogo ostrova, 2, Sankt-Peterburg')
			}
			})

			$(".remodal-close_1").click(function(){
				$(".remodal-overlay").css("display", "none")
			})
		})
		</script>
</html>