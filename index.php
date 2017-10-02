<?php

include 'assets/lang.php';
	
// iandec.1222222
		$mailSuccess = "";
		$error_message_choose_m = "";
		$error_message_n = "";
		$error_message_n2 = "";
		$error_message_p1 = "";
		$error_message_p2 = "";
		$error_message_m = "";
		$error_message_t = "";
		$error_message_d = "";
		
	if(isset($_POST['emailsent']))
	{
		echo ($error_message_choose_m);
		echo ($error_message_n);
		echo ($error_message_n2);
		echo ($error_message_p1);
		echo ($error_message_p2);
		echo ($error_message_m);
		echo ($error_message_t);
		echo ($error_message_d);
		
		$choosemail = $_POST['chooseMail'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['mail'];
		$typeOfService = $_POST['typeOfService'];
		$date = $_POST['date'];
		$text = $_POST['text'];

		$error_message_choose_m = "";
		$error_message_n = "";
		$error_message_n2 = "";
		$error_message_p1 = "";
		$error_message_p2 = "";
		$error_message_m = "";
		$error_message_t = "";
		$error_message_d = "";

		$errors = ['chooseMail'=>0,'name'=>0,'phone'=>0,'mail'=>0, 'typeOfService'=>0, 'date'=>0, 'text'=>0];

		$email_exp_a = "/[^A-Za-z]/";

		// Chosse palce
		if($_POST['chooseMail'] == '-'){
			$error_message_choose_m .= '<p class="red">'.$language[$lang]['form0'].'</p>';
			$errors['chooseMail'] = 1;
		}

		// Name
		if(strlen($name) < 2) {
        	$error_message_n .= '<p class="red">'.$language[$lang]['form1_e1'].'</p>';
			$errors['name'] = 1;
		}
		
		if(preg_match($email_exp_a,$_POST['name'])) {
			$error_message_n2 .= '<p class="red">'.$language[$lang]['form1_e2'].'</p>';
			$errors['name'] = 1;
		}


		// PHONE
		$error_message = "";
    	$email_exp = "/[^0-9]/";
 
    	if(preg_match($email_exp,$_POST['phone'])) {
        	$error_message_p1 .= '<p class="red">'.$language[$lang]['form2_e1'].'</p>';
			$errors['phone'] = 1;
    	}
		if(strlen($_POST['phone']) < 7) {
        	$error_message_p2 .= '<p class="red">'.$language[$lang]['form2_e2'].'</p>';
			$errors['phone'] = 1;
		}
		

		// EMAIL 
		$error_message = "";
    	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	
    	if(!preg_match($email_exp,$email)) {
        	$error_message_m .= '<p class="red">'.$language[$lang]['form3_e1'].'</p>';
			$errors['mail'] = 1;
		}
		

		// Type Of Style
		if($_POST['typeOfService'] == '-'){
			$error_message_t .= '<p class="red">'.$language[$lang]['form4_e1'].'</p>';
			$errors['typeOfService'] = 1;
		}
		
		// DATE 
		if(empty($date)){
			$error_message_d .= '<p class="red">'.$language[$lang]['form5_e1'].'</p>';
			$errors['date'] = 1;
		}
		$mailSuccess = false;
		if( empty($error_message_choose_m) && empty($error_message_n) && empty($error_message_p) && empty($error_message_m) && empty($error_message_t) && empty($error_message_d) ) {
			$to      = 'my.worktest94@gmail.com';
			$subject = $language[$lang]['client'];
			$message = $language[$lang]['form1'] . " : " . " " . $name . "\r\n" . $language[$lang]['form2'] . " : " . " " . $phone . "\r\n" . $language[$lang]['form3'] . " : " . " " . $email . "\r\n" . $language[$lang]['form4'] . " : " . " " . $typeOfService . "\r\n" . $language[$lang]['form5'] . " : " . " " . $date . "\r\n" . $language[$lang]['form6'] . " : " . " " . $text;
			$headers = "";

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
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.CarouselLifeExample.js"></script>
		<script type="text/javascript" src="js/open_close.js"></script>
		<script type="text/javascript" src="js/hammer.min.js"></script>

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
						<div class="caption_ieksa" style="display:none;"><h1>LUMBERJACK BARBERSHOP</h1>
						<h2>REMIND YOURSELF HOW COOL IT IS TO BE A MAN!</h2></div>
						<div class="button_more" style="margin-top:12vw;"><button class="read_more">book now</button></div>
					</div>

					<div class="inner-wrapper">
						<input checked type="radio" name="slide" class="control" id="Slide1" />
						<label for="Slide1" id="s1"></label>

						<input type="radio" name="slide" class="control" id="Slide2" />
						<label for="Slide2" id="s2"></label>
						
						<!--<input type="radio" name="slide" class="control" id="Slide3" />
						<label for="Slide3" id="s3"></label>-->

						<div class="overflow-wrapper">
							<a class="slide"><img src="img/background_2.jpg" /></a>
							<a class="slide"><img src="img/background_3.jpg" /></a>
							<!--<a class="slide"><img src="img/background.jpg" /></a>-->
						</div>

					</div>
				</div>
			</div>

			<div id="banner_mobile">
				<div class="caption">
					<h1>LUMBERJACK<br>BARBERSHOP</h1>
					<!--<h2>NEW TRADITIONAL BARBERSHOP</h2>-->
					<button class="read_more">book now</button>
				</div>
				<div class="round_buttons">
					<button id="flip_1"></button>
					<button id="flip_2"></button>
					<button id="flip_3"></button>
				</div>
			</div>
				
			<div class="wrap">
				<div class="photo photo_1">

						<div class="text_on_photo">
							<img src="img/logo.png" width="30%">
							<h6>made in latvia</h6>
							<p><?php echo $language[$lang]['madelv_text'] ?></p>
							
							<a href="our_story.php"><button class="read_more_1"><?php echo $language[$lang]['readmore'] ?></button></a>
						</div>

				</div>

				<div class="photo photo_2"></div>
				
				<!--<div class="photo1 photo_4">
					<div class="position_on_photo">
						<h5>book an appointment</h5>
						<button class="read_more">book now</button>
					</div>
				</div>-->
				
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

								<p><?php echo $language[$lang]['form_top'] ?></p>

								<div class="styled-select">
									<span class="wpcf7-form-control-wrap menu-471">
										<select name="chooseMail" class="wpcf7-select" required="required">
											<option value="-" ><?php echo $language[$lang]['form0'] ?></option>
											<option value="my.worktest94@gmail.com" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'my.worktest94@gmail.com' && $errors['chooseMail'] == 0) echo "selected"; ?> >Riharda Vagnera iela 11, Riga, Latvia</option>
											<option value="my.worktest94@gmail.com" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'my.worktest94@gmail.com' && $errors['chooseMail'] == 0) echo "selected"; ?> >Riharda Vagnera iela 11, Riga, Latvia(2)</option>
											<option value="my.worktest94@gmail.com" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'my.worktest94@gmail.com' && $errors['chooseMail'] == 0) echo "selected"; ?> >Pronksi 3, Tallin, Estonia-10124</option>
											<option value="my.worktest94@gmail.com" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'my.worktest94@gmail.com' && $errors['chooseMail'] == 0) echo "selected"; ?> >29 lin. Vasilyevskogo ostrova, 2, Sankt-Peterburg</option>
										</select>
									</span>
								</div>
								<!--ERRROR  -->
									<?php echo ($error_message_choose_m); ?>
								<!--END-->

								<div class="bookinput">
									<label><?php echo $language[$lang]['form1'] ?></label>
									<span class=" your-name"><input type="text" value = "<?php if(isset($_POST['name']) && $errors['name'] == 0){ echo $_POST['name']; } ?>" name="name" size="40" class="wpcf7-text" required="required" placeholder="<?php echo $language[$lang]['form1_1'] ?>"></span>
								</div>
								<!--ERRROR  -->
									<?php echo ($error_message_n); ?>
									<?php echo ($error_message_n2); ?>
								<!--END-->


								<div class="bookinput">
									<label><?php echo $language[$lang]['form2'] ?></label>
									<span class="your-name"><input type="tel" value = "<?php if(isset($_POST['phone']) && $errors['phone'] == 0){ echo $_POST['phone']; } ?>" name="phone" size="40" class="wpcf7-text" required="required" placeholder="<?php echo $language[$lang]['form2_1'] ?>"></span>
								</div>
								<!--ERRROR  -->
									<?php echo ($error_message_p1); ?>
									<?php echo ($error_message_p2); ?>
								<!--END-->



								<div class="bookinput">
									<label><?php echo $language[$lang]['form3'] ?></label>
									<span class="your-name"><input type="text" value = "<?php if(isset($_POST['mail']) && $errors['mail'] == 0){ echo $_POST['mail']; } ?>" name="mail" size="40" class="wpcf7-text" placeholder="<?php echo $language[$lang]['form3_1'] ?>"></span>
								</div>
								<!--ERRROR  -->
									<?php echo ($error_message_m); ?>
								<!--END-->



								<div class="styled-select">
									<span class="wpcf7-form-control-wrap menu-471">
										<select name="typeOfService" class="wpcf7-select" required="required">
											<option value="-" ><?php echo $language[$lang]['form4'] ?></option>
											<option value="Haircut+Beard Trim" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Haircut+Beard Trim' && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair1.'] ?></option>
											<option value="Haircut" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Haircut' && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair2.'] ?></option>
											<option value="Beard Trim" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Beard Trim' && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair3.'] ?></option>
											<option value="Hot Shave" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Hot Shave' && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair4.'] ?></option>
											<option value="Haircut+Beard Trim" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Haircut+Beard Trim' && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair5.'] ?></option>
											<option value="Haircut" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Haircut' && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair6.'] ?></option>
											<option value="Beard Trim" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Beard Trim' && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair7.'] ?></option>
											<option value="Hot Shave" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Hot Shave' && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair8.'] ?></option>
											<option value="Hot Shave" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == 'Hot Shave' && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair9.'] ?></option>
										</select>
									</span>
								</div>
								<!--ERRROR  -->
									<?php echo ($error_message_t); ?>
								<!--END-->



								<div class="bookinputdate">
									<!-- <label>Date</label>  <span class="wpcf7-form-control-wrap date-87"><input type="date" name="date" class="wpcf7-date" placeholder="dd/mm/yyyy"></span> -->

									<label><?php echo $language[$lang]['form5'] ?></label><span class="wpcf7-form-control-wrap date-87"><input class="wpcf7-date" value = "<?php if(isset($_POST['date']) && $errors['date'] == 0){ echo $_POST['date']; } ?>" name="date" type = "text" readonly="readonly" id = "datepicker-10" placeholder="<?php echo $language[$lang]['form5_1'] ?>"></spam>

								</div>
								<!--ERRROR  -->
									<?php echo ($error_message_d); ?>
								<!--END-->
								
								<div class="booktextarea">
									<label><?php echo $language[$lang]['form6'] ?></label>
									<span class="your-message"><textarea text="type" name="text" form="form" cols="40" rows="5" class="wpcf7-textarea" placeholder="<?php echo $language[$lang]['form6_1'] ?>"></textarea></span>
								</div>
								

								<div class="col-sm-12">
									<input class="blackbutton" type="submit" name="emailsent" value="<?php echo $language[$lang]['form8'] ?>">
								</div>					
								
							</form>

							<?php
							}else if($mailSuccess){
								
								$checkemail = "<p><?php echo $language[$lang]['check'] ?></p>";
								
								echo $checkemail;
							} ?>					

						<a class="remodal-close"></a>

					</div>
				</div>
			
			</div>

			<div id="products">
			
				<div class="products"><h3><?php echo $language[$lang]['product'] ?></h3></div>

				<a href="http://testlumberjack.tk/shop/shop">
				<div class="wrap_product" id="wrap_product">
					<div class="product product_1" >
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
				</a>
			</div>
			<script>
			var hammertime = new Hammer(document.getElementById('wrap_product'),);
			var productnow = 0
			hammertime.on('panend', function(ev) {
				console.log(ev.additionalEvent);
				pan_dir = ev.additionalEvent
				
				count = $('#wrap_product .product').length

				console.log(count)
				if(pan_dir=='panleft'){
					if(productnow<count-1){
					productnow+=1
					}else{productnow=0}
					$('.wrap_product .product').css('display','none')
					$('.wrap_product .product:eq('+productnow+')').fadeIn(200)
					console.log($('.wrap_product .product:eq('+productnow+')'))
					
				}else if(pan_dir=='panright'){
					if(productnow>0){
					productnow-=1
					}else{productnow=count-1}
					$('.wrap_product .product').css('display','none')
					$('.wrap_product .product:eq('+productnow+')').fadeIn(200)
					console.log($('.wrap_product .product:eq('+productnow+')'))
				}
			});
			</script>
			
			
			<script>
			var productnow = 0
			$(document).ready(function(){
				
				count = $('#wrap_product .product').length
				
				$("#Right").click(function () {
					if(productnow>0){
					productnow-=1
					}else{productnow=count-1}
					$('.wrap_product .product').css('display','none')
					$('.wrap_product .product:eq('+productnow+')').fadeIn(200)
					console.log($('.wrap_product .product:eq('+productnow+')'))
					
				});
				
				$("#Left").click(function () {
				
				if(productnow<count-1){
					productnow+=1
					}else{productnow=0}
					$('.wrap_product .product').css('display','none')
					$('.wrap_product .product:eq('+productnow+')').fadeIn(200)
					console.log($('.wrap_product .product:eq('+productnow+')'))
				
				});
			});
			</script>
			
			<div class="swiping_buttons">
					<img id="Left" src="img/leftArr.png" />
					<img id="Right" src="img/rightArr.png" />
			</div>
			
			<div id="gallery">
				<script type="text/javascript" src="js/click-carousel.js"></script>
				<script type="text/javascript">
				$(function(){
					$("#container").clickCarousel({margin: 5});	
				});
				</script>
				<div id="wrapper"> 
					<a href="https://www.instagram.com/lumberjack_barbershop_/"><div id="container">   	
						<img src="img/111.png" alt="Cuba" />
						<img src="img/222.png" alt="Cuba" />
						<img src="img/333.png" alt="Cuba" />
						<img src="img/444.png" alt="Cuba" />
						<img src="img/111.png" alt="Cuba" />
					</div></a>
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

