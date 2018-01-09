 <?php

	// include 'assets/lang.php';

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
		$typeOfService = $_POST['hairStyle'];
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

		if($_POST['chooseMail'] == "vagnera")
		{
			$to = 'my.worktest94@gmail.com';
			$place = 'Riharda Vagnera iela 11, Riga, Latvia';
		}

		if($_POST['chooseMail'] == "jekaba")
		{
			$to = 'my.worktest94@gmail.com';
			$place = 'Jēkaba iela 24, Centra rajons, Riga, Latvia';
		}

		if($_POST['chooseMail'] == "pronski")
		{
			$to = 'my.worktest94@gmail.com';
			$place = 'Pronksi 3, Tallin, Estonia-10124';
		}

		if($_POST['chooseMail'] == "ostrova")
		{
			$to = 'my.worktest94@gmail.com';
			$place = '29 lin. Vasilyevskogo ostrova, 2, Sankt-Peterburg';
		}

		$mailSuccess = false;

		// $hair_syles[strval($typeOfService) ] - šis ir priekš haircut tipiem.

		if( empty($error_message_choose_m) && empty($error_message_n) && empty($error_message_p) && empty($error_message_m) && empty($error_message_d) ) {
			$subject = $language[$lang]['client'];
			$message = $place . "\r\n" . "\r\n" . $language[$lang]['form1'] . " : " . " " . $name . "\r\n" . $language[$lang]['form2'] . " : " . " " . $phone . "\r\n" . $language[$lang]['form3'] . " : " . " " . $email . "\r\n" . $language[$lang]['form4'] . " : " . " " . $_POST["typeOfService"] . "\r\n" . $language[$lang]['form5'] . " : " . " " . $date . "\r\n" . $language[$lang]['form6'] . " : " . " " . $text;
			$headers = "";
			if(mail($to, $subject, $message, $headers)){
				$mailSuccess = true;
			}
			
			// echo "check Your Email";

		}else{
			
			// $reply = "reply";
		}

		print_r($_POST["typeOfService"]);
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
		
		<script>
		$(document).ready(function(){
		if ($('body').width() <= 900) {
			
			$(function(){
				$('.button').text('+');
			})
		
		}
		});
		</script>

	</head>

	<body>
		<?php include 'assets/header.php'; ?>
		
		<div class="caption">
			<h1><!--<img src="img/vector.png">--><?php echo $language[$lang]['price_list'] ?><!--<img src="img/vector.png">--></h1>
		</div>
		
		<div id="main">
		<div class = "box" align="center">
		<div class="top_border"></div>
		<table>
			<div class="top_border_2"></div>
			<div class="top_border_3"></div>

		<?php if(isset($_SESSION['country'])) { ?>
			<?php if($_SESSION['country'] == 'lv' || $_SESSION['country'] == 'ee') { ?>
		
				<tr>
					<td><h1><?php echo $language[$lang]['hair1.'] ?></h1></td>
					<td><p>30.00-40.00 EUR</p></td>
					<th><button class="button" value=0 haircutsn = "name1" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair2.'] ?></h1></td>
					<td><p>15.00-25.00 EUR</p></td>
					<th><button class="button" value=1 haircutsn = "name2" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair3.'] ?></h1></td>
					<td><p>40.00 EUR</p></td>
					<th><button class="button" value=2 haircutsn = "name3" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair4.'] ?></h1></td>
					<td><p>25.00 EUR</p></td>
					<th><button class="button" value=3 haircutsn = "name4" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair5.'] ?></h1></td>
					<td><p>15.00 EUR</p></td>
					<th><button class="button" value=4 haircutsn = "name5" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair6.'] ?></h1></td>
					<td><p> 15.00 EUR</p></td>
					<th><button class="button" value=5 haircutsn = "name6" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair7.'] ?></h1></td>
					<td><p>10.00-15.00 EUR</p></td>
					<th><button class="button" value=6 haircutsn = "name7" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair8.'] ?></h1></td>
					<td><p>10.00 EUR</p></td>
					<th><button class="button" value=7 haircutsn = "name8" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair9.'] ?></h1></td>
					<td><p>20.00 EUR</p></td>
					<th><button class="button" value=8 haircutsn = "name9" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
			<?php } ?>

			<?php if($_SESSION['country'] == 'ru') { ?>
					<tr>
					<td><h1><?php echo $language[$lang]['hair1.'] ?></h1></td>
					<td><p>30.00-40.00 RUB</p></td>
					<th><button class="button" value=0 haircutsn = "name1" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair2.'] ?></h1></td>
					<td><p>15.00-25.00 RUB</p></td>
					<th><button class="button" value=1 haircutsn = "name2" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair3.'] ?></h1></td>
					<td><p>40.00 RUB</p></td>
					<th><button class="button" value=2 haircutsn = "name3" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair4.'] ?></h1></td>
					<td><p>25.00 RUB</p></td>
					<th><button class="button" value=3 haircutsn = "name4" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair5.'] ?></h1></td>
					<td><p>15.00 RUB</p></td>
					<th><button class="button" value=4 haircutsn = "name5" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair6.'] ?></h1></td>
					<td><p> 15.00 RUB</p></td>
					<th><button class="button" value=5 haircutsn = "name6" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair7.'] ?></h1></td>
					<td><p>10.00-15.00 RUB</p></td>
					<th><button class="button" value=6 haircutsn = "name7" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair8.'] ?></h1></td>
					<td><p>10.00 RUB</p></td>
					<th><button class="button" value=7 haircutsn = "name8" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
				<tr>
					<td><h1><?php echo $language[$lang]['hair9.'] ?></h1></td>
					<td><p>20.00 RUB</p></td>
					<th><button class="button" value=8 haircutsn = "name9" ><?php echo $language[$lang]['book'] ?></button></th>
				</tr>
			<?php } ?>
		<?php } ?>

		</table>

		</div>
		</div>
		
		<div class="remodal-overlay" style="display: none;">

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

		<form id="form" name="orderform" method="post" action="price_list.php">

		<p><?php echo $language[$lang]['form_top'] ?></p>
		
			<div class="styled-select">
				<span class="wpcf7-form-control-wrap menu-471">
					<select name="chooseMail" class="wpcf7-select" required="required">
						<option value="-" ><?php echo $language[$lang]['form0'] ?></option>
						
						<option value="vagnera" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'my.worktest94@gmail.com' && $errors['chooseMail'] == 0) echo "selected"; ?> >Riharda Vagnera iela 11, Riga, Latvia</option>
						<option value="jekaba" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'my.worktest94@gmail.com' && $errors['chooseMail'] == 0) echo "selected"; ?> >Jēkaba iela 24, Centra rajons, Riga, Latvia</option>
						<option value="pronski" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'my.worktest94@gmail.com' && $errors['chooseMail'] == 0) echo "selected"; ?> >Pronksi 3, Tallin, Estonia-10124</option>
						<option value="ostrova" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'my.worktest94@gmail.com' && $errors['chooseMail'] == 0) echo "selected"; ?> >29 lin. Vasilyevskogo ostrova, 2, Sankt-Peterburg</option>
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