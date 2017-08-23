<?php
// iandec.1222222
		$mailSuccess = "";
		$error_message_n = "";
		$error_message_p1 = "";
		$error_message_p2 = "";
		$error_message_m = "";
		$error_message_t = "";
		$error_message_d = "";

	if(isset($_POST['emailsent']))
	{

		echo ($error_message_n);
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


		// Name
		if(strlen($name) < 2) {
        	$error_message_n .= 'Name too short.';
			// echo ($error_message);
    	}


		// PHONE
		$error_message = "";
    	$email_exp = "/[^0-9]/";
 
    	if(preg_match($email_exp,$_POST['phone'])) {
        	$error_message_p1 .= 'only numbers!';
			// echo ($error_message);
    	}


		if(strlen($_POST['phone']) < 7) {
        	$error_message_p2 .= 'phone too short.';
			// echo ($error_message);
    	}


		// EMAIL 
		$error_message = "";
    	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	
    	if(!preg_match($email_exp,$email)) {
        	$error_message_m .= 'Please enter email!';
			// echo ($error_message);
    	}



		// Type Of Style

		// if(empty($typeOfService) == $_POST['null']){
		// 	$error_message_t .= "Type of style is empty. Please enter type of style.";
		// 	// echo ($error_message);
		// }
		

		// DATE 
		if(empty($date)){
			$error_message_d .= 'Please enter Date!';
			// echo ($error_message);
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

?>

<!DOCTYPE html> 
<html>
    <head>       
		<link rel="stylesheet" type="text/css" href="style/index.css">
		<link rel="stylesheet" type="text/css" href="style/form.css">
        <title>lumberjack</title>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.CarouselLifeExample.js"></script>
		<script type="text/javascript" src="js/open_close.js"></script>

        <script type="text/javascript">
                $(document).ready(function() {                              
					$('.container').Carousel({
					visible: 3,
					rotateBy: 1,
					speed: 1000,
					btnNext: '#next',
					btnPrev: '#prev',                       
					auto: false,                        
					backslide: true,    
					margin: 10                      
					});
                });
		</script>


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
    </head>

	<body>
		<div>
			<?php include 'assets/header.php'; ?>
			
			<div id="banner">
				<div id="slider-wrapper">

					<div class="caption">
						<h1>LUMBERJACK</h1>
						<h2>NEW TRADITIONAL BARBERSHOP</h2>
						<div class="button_more"><button>MORE</button></div>
					</div>

					<div class="inner-wrapper">
						<input checked type="radio" name="slide" class="control" id="Slide1" />
						<label for="Slide1" id="s1"></label>

						<input type="radio" name="slide" class="control" id="Slide2" />
						<label for="Slide2" id="s2"></label>
						
						<input type="radio" name="slide" class="control" id="Slide3" />
						<label for="Slide3" id="s3"></label>

						<div class="overflow-wrapper">
							<a class="slide" href=""><img src="img/background.jpg" /></a>
							<a class="slide" href=""><img src="img/background.jpg" /></a>
							<a class="slide" href=""><img src="img/background.jpg" /></a>
						</div>

					</div>
				</div>
			</div>


			<div class="wrap">
				<div class="photo photo_1">
					<div style="position:relative">

						<div class="text_on_photo">
							<img src="img/logo.png" width="30%">
							<h6>made in latvia</h6>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at diam sed sapien bibendum pharetra. In vel purus sit amet nibiam lorem. Etiam egestas sit amet elit vel bibendum. Nulla non is. Interdum et malesuada fames ac ante ipsum primis in fau. </p>
						</div>

						<button class="read_more_1">read more</button>

					</div>
				</div>

				<div class="photo photo_2"></div>
				
				<div class="photo1 photo_4">
					<div class="position_on_photo">
						<h5>book an appointment</h5>
						<button class="read_more">book now</button>
					</div>
				</div>
				
				<!-- te php  -->
				<div class="remodal-overlay"
					<?php if(isset($_POST['emailsent'])) { ?>

							style="display: block;" <?php
							
					}else{
						?>	
							style="display: none;" <?php
					} ?>
				>
				
					<div class="remodal" data-remodal-id="modal" style="visibility: visible;">

						<img src="img/logo-half.png" id="bookin-workshop">
						<?php if(!$mailSuccess){ ?>

							
							<form id="form" name="orderform" method="post" action="index.php">

								<p>To request an appointment for a one of our service - simply fill in the form below, click send and administrator will be in touch shortly to confirm your booking.</p>

								
							
								<div class="bookinput">
									<label>Name</label>
									<span class=" your-name"><input type="text" name="name" size="40" class="wpcf7-text" required="required" placeholder="Your full name"></span>
								</div>
								<!--ERRROR  -->
									<?php echo ($error_message_n); ?>
								<!--END-->


								<div class="bookinput">
									<label>Phone</label>
									<span class="your-name"><input type="tel" name="phone" size="40" class="wpcf7-text" required="required" placeholder="Contact number"></span>
								</div>
								<!--ERRROR  -->
									<?php echo ($error_message_p1); ?>
									<?php echo ($error_message_p2); ?>
								<!--END-->



								<div class="bookinput">
									<label>E-mail</label>
									<span class="your-name"><input type="text" name="mail" size="40" class="wpcf7-text" placeholder="Your email"></span>
								</div>
								<!--ERRROR  -->
									<?php echo ($error_message_m); ?>
								<!--END-->



								<div class="styled-select">
									<span class="wpcf7-form-control-wrap menu-471">
										<select name="typeOfService" class="wpcf7-select" required="required">
											<option value="-" name="null">Type of service</option>
											<option value="Haircut+Beard Trim">Haircut+Beard Trim</option>
											<option value="Haircut">Haircut</option>
											<option value="Beard Trim">Beard Trim</option>
											<option value="Hot Shave">Hot Shave</option>
										</select>
									</span>
								</div>
								<!--ERRROR  -->
									<?php echo ($error_message_t); ?>
								<!--END-->



								<div class="bookinputdate">
									<!-- <label>Date</label>  <span class="wpcf7-form-control-wrap date-87"><input type="date" name="date" class="wpcf7-date" placeholder="dd/mm/yyyy"></span> -->

									<label>Date</label><span class="wpcf7-form-control-wrap date-87"><input class="wpcf7-date" name="date" type = "text" readonly="readonly" id = "datepicker-10"></spam>

								</div>
								<!--ERRROR  -->
									<?php echo ($error_message_d); ?>
								<!--END-->


								<div class="booktextarea">
									<label>Details</label>
									<span class="your-message"><input text="type" name="text" class="wpcf7-date"></input></span>
								</div>

								<div class="col-sm-12">
									<div class="buttons"><button><input type="submit" name="emailsent" value="SENT"></button></div>
								</div>
							</form>


							<?php
							}else if($mailSuccess){
								
								$checkemail = "Check yo Email";
								
								echo $checkemail;

							} ?>
						

						<a href="#" class="remodal-close"></a>

					</div>
				</div>
			
			</div>

			<div id="products">
			
				<div class="products"><h3>products</h3></div>

				<div class="wrap_product">
					<div class="product product_1">
						<h4>Mals matu veidosanai no <br>"Mr Natty Dub"</h4>
						<p>$ 20,95</p>
					</div>

					<div class="product product_2">
						<h4>Matu sampuns <br>"Baxter of California"</h4>

						<p>$ 20,95</p>
					</div>

					<div class="product product_3">
						<h4>Pomade matu veidosanai <br>"Corleone Sticky Stuff"</h4>
						<p>$ 20,95</p>
					</div>

					<div class="product product_4">
						<h4>Kremveida matu kondicionieris ar kokosriekstu ellu <br>"D R Harris"</h4>
						<p>$ 20,95</p>
					</div>

					<div class="product product_5">
						<h4>Pomade matu veidosanai <br>"Reuzel Red"</h4>
						<p>$ 20,95</p>
					</div>
				</div>
			</div>
			
			<div id="gallery">
				<script type="text/javascript" src="js/click-carousel.js"></script>
				<script type="text/javascript">
				$(function(){
					$("#container").clickCarousel({margin: 5});	
				});
				</script>
				<div id="wrapper"> 
					<div id="container">   	
						<img src="img/111.png" alt="Cuba" />
						<img src="img/222.png" alt="Cuba" />
						<img src="img/333.png" alt="Cuba" />
						<img src="img/444.png" alt="Cuba" />
						<img src="img/111.png" alt="Cuba" />
					</div>
					<div class="buttons-left-right">
					<img id="carouselLeft" src="img/leftArr.png" alt="Left Arrow" />
					<img id="carouselRight" src="img/rightArr.png" alt="Right Arrow" />
					</div>
				</div>
			</div>
			
			<?php include 'assets/footer.php'; ?>
			
		</div>
	</body>
</html>