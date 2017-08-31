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
		// $typeOfService = $_POST['typeOfService'];
		$date = $_POST['date'];
		$text = $_POST['text'];

		$error_message_n = "";
		$error_message_n2 = "";
		$error_message_p1 = "";
		$error_message_p2 = "";
		$error_message_m = "";
		$error_message_t = "";
		$error_message_d = "";

		$errors = ['name'=>0,'phone'=>0,'mail'=>0, 'date'=>0, 'text'=>0];

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

		// if($_POST['typeOfService'] == '-'){
		// 	$error_message_t .= '<p class="red">Type of style is empty. Please enter type of style.!</p>';
		// 	// echo ($error_message);
		// }
		

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

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/haircuts.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<link rel="stylesheet" type="text/css" href="style/form.css">
		<title>haircuts</title>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

		<!--for time  -->

		<meta charset = "utf-8">
      	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
      	<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      	<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script src="js/haircuts_mobile.js"></script>
      
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


<!--parnem attiecigo iespeju  -->
		  	<script>
				$(function(){
					$('.button').click(function(){
						val = $(this).attr('haircutsn')
						ind = $(this).parent().parent().index()

						$('#typeOfService option:eq('+ind+')').attr('selected','selected')
						console.log($('#typeOfService option:eq('+ind+')'), ind)
						//alert(val)
					})
				})
				function myFunction() {
					var x = document.getElementById("myBtn").value;
					document.getElementById("demo").innerHTML = x;
				}
			</script> 
	</head>
	<body>
		<?php include 'assets/header.php'; ?>
		
		<div id="banner">
			<div class="caption">
				<h1><img src="img/vector_white.png">HAIRCUTS<img src="img/vector_white.png"></h1>
			</div>
		</div>
		
		<div id="main">
			<div class="wrap">
				<div class="photo photo_1">
					<div class="text">
						<h1>HairStyle 1.</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
						</p>
						<button id="b1" class="button" value="something" haircutsn = "name1" onclick="myFunction()">BOOK AN APPOINTMENT</button>
					</div>
				</div>
				<div class="photo photo_2">
					<div class="text">
						<h1>HairStyle 2.</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
						</p>
						<button class="button" haircutsn = "name2" >BOOK AN APPOINTMENT</button>
					</div>
				</div>
				<div class="photo photo_3">
					<div class="text">
						<h1>HairStyle 3.</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
						</p>
						<button class="button" haircutsn = "name3" >BOOK AN APPOINTMENT</button>
					</div>
				</div>
			</div>
			<div class="wrap" id="wrap2">
				<div class="photo photo_4">
					<div class="text">
						<h1>HairStyle 4.</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
						</p>
						<button class="button" haircutsn = "name4" >BOOK AN APPOINTMENT</button>
					</div>
				</div>
				<div class="photo photo_5">
					<div class="text">
						<h1>HairStyle 5.</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
						</p>
						<button class="button" haircutsn = "name5" >BOOK AN APPOINTMENT</button>
					</div>
				</div>
				<div class="photo photo_6">
					<div class="text">
						<h1>HairStyle 6.</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
						</p>
						<button class="button" haircutsn = "name6" >BOOK AN APPOINTMENT</button>
					</div>
				</div>
				<div class="photo photo_1">
					<div class="text">
						<h1>HairStyle 7.</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
						</p>
						<button class="button" haircutsn = "name7" >BOOK AN APPOINTMENT</button>
					</div>
				</div>
				<div class="photo photo_2">
					<div class="text">
						<h1>HairStyle 8.</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
						</p>
						<button class="button" haircutsn = "name8" >BOOK AN APPOINTMENT</button>
					</div>
				</div>
				<div class="photo photo_3">
					<div class="text">
						<h1>HairStyle 9.</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
						</p>
						<button class="button" haircutsn = "name9" >BOOK AN APPOINTMENT</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="button_more"><button id="button">MORE</button></div>
		
		<?php include 'assets/footer.php'; ?>

		<!--FORMA  -->

		<div class="remodal-overlay" style="display: none;">
		<div class="remodal" data-remodal-id="modal" style="visibility: visible;">

			<img src="img/logo-half.png" id="bookin-workshop">
			<?php if(!$mailSuccess){ ?>

				
				<form id="form" name="orderform" method="post" action="haircuts.php">

					<p>To request an appointment for a one of our service - simply fill in the form below, click send and administrator will be in touch shortly to confirm your booking.</p>

					
				
					<div class="bookinput">
						<label>Name</label>
						<span class=" your-name"><input type="text" value = "<?php if(isset($_POST['name']) && $errors['name'] == 0){ echo $_POST['name']; } ?>" name="name" size="40" class="wpcf7-text" required="required" placeholder="Your full name"></span>
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
						<select id="typeOfService" name="hairStyle" class="wpcf7-select" required="required">
							<option value="1" <?php if(isset($_POST["hairStyle"]) && $_POST['hairStyle'] == '1') echo "selected"; ?>>1</option>
							<option value="2" <?php if(isset($_POST["hairStyle"]) && $_POST['hairStyle'] == '2') echo "selected"; ?>>2</option>
							<option value="3" <?php if(isset($_POST["hairStyle"]) && $_POST['hairStyle'] == '3') echo "selected"; ?>>3</option>
							<option value="4" <?php if(isset($_POST["hairStyle"]) && $_POST['hairStyle'] == '4') echo "selected"; ?>>4</option>
							<option value="5" <?php if(isset($_POST["hairStyle"]) && $_POST['hairStyle'] == '5') echo "selected"; ?>>5</option>
							<option value="6" <?php if(isset($_POST["hairStyle"]) && $_POST['hairStyle'] == '6') echo "selected"; ?>>6</option>
							<option value="7" <?php if(isset($_POST["hairStyle"]) && $_POST['hairStyle'] == '7') echo "selected"; ?>>7</option>
							<option value="8" <?php if(isset($_POST["hairStyle"]) && $_POST['hairStyle'] == '8') echo "selected"; ?>>8</option>
							<option value="9" <?php if(isset($_POST["hairStyle"]) && $_POST['hairStyle'] == '9') echo "selected"; ?>>9</option>
						</select>
					</spam>
				</div>

					<!--ERRROR  -->
						<?php echo ($error_message_t); ?>
					<!--END-->



					<div class="bookinputdate">
						<!-- <label>Date</label>  <span class="wpcf7-form-control-wrap date-87"><input type="date" name="date" class="wpcf7-date" placeholder="dd/mm/yyyy"></span> -->

						<label>Date</label><span class="wpcf7-form-control-wrap date-87"><input class="wpcf7-date" value = "<?php if(isset($_POST['date']) && $errors['date'] == 0){ echo $_POST['date']; } ?>" name="date" type = "text" readonly="readonly" id = "datepicker-10" placeholder="Pick your date"></spam>

					</div>
					<!--ERRROR  -->
						<?php echo ($error_message_d); ?>
					<!--END-->
					
					<div class="booktextarea">
						<label>Details</label>
						<span class="your-message"><textarea text="type" name="text" form="form" cols="40" rows="5" class="wpcf7-textarea" placeholder="Please give us as much detail as possible!"></textarea></span>
					</div>
					

					<div class="col-sm-12">
						<input class="blackbutton" type="submit" name="emailsent" value="Send appointment">
					</div>					
					
				</form>

				<?php
				}else if($mailSuccess){
					
					$checkemail = "<p>Check your Email</p>";
					
					echo $checkemail;

				} ?>					

			<a href="#" class="remodal-close"></a>

		</div>
		</div>

		<script>
			$(document).ready(function(){
				$(".button").click(function () {
				$(".remodal-overlay").css("display","none");
				$(".remodal-overlay").fadeIn(400);
				$(".remodal-overlay").css("display","block");
				});
				$(".remodal-close").click(function () {
				$(".remodal-overlay").css("display","none");
				});
			});
		</script>

	</body>
</html>