<?php


	include 'assets/lang.php';

		$error_message_choose_m = "";
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

		$errors = ['chooseMail'=>0,'name'=>0,'phone'=>0,'mail'=>0, 'date'=>0, 'text'=>0];

		$email_exp_a = "/[^A-Za-z]/";

		// Chosse palce
		if($_POST['chooseMail'] == '-'){
			$error_message_choose_m .= '<p class="red"> Place is empty. Please enter place.!</p>';
			$errors['chooseMail'] = 1;
		}

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

		if( empty($error_message_choose_m) && empty($error_message_n) && empty($error_message_p) && empty($error_message_m) && empty($error_message_t) && empty($error_message_d) ) {
			$to      = $_POST['chooseMail'];
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

		print_r($_POST);

	}

?>


<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/price_list.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<link rel="stylesheet" type="text/css" href="style/form.css">

		<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
		<title>price list</title>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

		<!--for time  -->

		<meta charset = "utf-8">
      	
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


		<!-- parnem attiecigo iespeju  -->
		<script>
			$(function(){
				$('.button').click(function(){
					val = $(this).attr('haircutsn')
					ind = parseInt($(this).attr('value'))//$(this).parent().parent().index()
					

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
		
		<div class="caption">
			<h1><img src="img/vector.png">PRICE LIST<img src="img/vector.png"></h1>
		</div>
		
		<div id="main">
		<div class = "box" align="center">
		<div class="top_border"></div>
		<table>
		<div class="top_border_2"></div>
		<div class="top_border_3"></div>
			<tr>
				<td><h1>Haircut Scissors</h1></td>
				<td><p>30.00-40.00 EUR</p></td>
				<th><button class="button" value=1 haircutsn = "name1" >BOOK</button></th>
			</tr>
			<tr>
				<td><h1>Grooming</h1></td>
				<td><p>15.00-25.00 EUR</p></td>
				<th><button class="button" value=2 haircutsn = "name2" >BOOK</button></th>
			</tr>
			<tr>
				<td><h1>Haircut + Beardtrim</h1></td>
				<td><p>40.00 EUR</p></td>
				<th><button class="button" value=3 haircutsn = "name3" >BOOK</button></th>
			</tr>
			<tr>
				<td><h1>Hot Shave</h1></td>
				<td><p>25.00 EUR</p></td>
				<th><button class="button" value=4 haircutsn = "name4" >BOOK</button></th>
			</tr>
			<tr>
				<td><h1>Haircut Kids (under 10 years)</h1></td>
				<td><p>15.00 EUR</p></td>
				<th><button class="button" value=5 haircutsn = "name5" >BOOK</button></th>
			</tr>
			<tr>
				<td><h1>DAD & SON</h1></td>
				<td><p> 15.00 EUR</p></td>
				<th><button class="button" value=6 haircutsn = "name6" >BOOK</button></th>
			</tr>
			<tr>
				<td><h1>Headwash</h1></td>
				<td><p>10.00-15.00 EUR</p></td>
				<th><button class="button" value=7 haircutsn = "name7" >BOOK</button></th>
			</tr>
			<tr>
				<td><h1>Beardcoloring</h1></td>
				<td><p>10.00 EUR</p></td>
				<th><button class="button" value=8 haircutsn = "name8" >BOOK</button></th>
			</tr>
			<tr>
				<td><h1>Students special price sun.-thu.</h1></td>
				<td><p>20.00 EUR</p></td>
				<th><button class="button" value=9 haircutsn = "name9" >BOOK</button></th>
			</tr>
		</table>

		</div>
		</div>
		
		<div class="remodal-overlay" style="display: none;">
		<div class="remodal" data-remodal-id="modal" style="visibility: visible;">

		<img src="img/logo-half.png" id="bookin-workshop">

		<?php if(!$mailSuccess){ ?>

		<form id="form" name="orderform" method="post" action="price_list.php">

				<div class="styled-select">
					<span class="wpcf7-form-control-wrap menu-471">
						<select name="chooseMail" class="wpcf7-select" required="required">
							<option value="-" >Choose Email</option>
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
							<option value= "1" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '1') echo "selected"; ?>>Haircut Scissors</option>
							<option value="2"<?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '2') echo "selected"; ?>>Brooming</option>
							<option value="3" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '3') echo "selected"; ?>>Haircut + beardtrim</option>
							<option value="4" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '4') echo "selected"; ?>>Beardtrim</option>
							<option value="5" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '5') echo "selected"; ?>>Hot Shave</option>
							<option value="6" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '6') echo "selected"; ?>>Haircut Kid (under 10 years)</option>
							<option value="7" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '7') echo "selected"; ?>>DAD & SON</option>
							<option value="8" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '8') echo "selected"; ?>>HeadWash </option>
							<option value="9" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '9') echo "selected"; ?>>Beardcoloring</option>
							<option value="10" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '10') echo "selected"; ?>>Students specials price sun. and thu.</option>

						</select>
					</span>
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

		<a class="remodal-close"></a>

		</div>
		</div>		

		<?php include 'assets/footer.php'; ?>

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