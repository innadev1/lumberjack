<?php

	include 'assets/lang.php';

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
		// $error_message_n = "";
		$error_message_n2 = "";
		$error_message_p1 = "";
		$error_message_p2 = "";
		// $error_message_m = "";
		// $error_message_t = "";
		$error_message_d = "";

		$errors = ['chooseMail'=>0,'name'=>0,'phone'=>0,'mail'=>0, 'typeOfService'=>0, 'date'=>0, 'text'=>0];

		$email_exp_a = "/[^A-Za-z]/";

		// Chosse palce
		if($_POST['chooseMail'] == '-'){
			$error_message_choose_m .= '<p class="red">'.$language[$lang]['form0'].'</p>';
			$errors['chooseMail'] = 1;
		}

		// Name
		// if(strlen($name) < 2) {
        // 	$error_message_n .= '<p class="red">'.$language[$lang]['form1_e1'].'</p>';
		// 	$errors['name'] = 1;
		// }

		// if(preg_match($email_exp_a,$_POST['name'])) {
		// 	$error_message_n2 .= '<p class="red">'.$language[$lang]['form1_e2'].'</p>';
		// 	$errors['name'] = 1;
		// }

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
		// $error_message = "";
    	// $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    	// if(!preg_match($email_exp,$email)) {
        // 	$error_message_m .= '<p class="red">'.$language[$lang]['form3_e1'].'</p>';
		// 	$errors['mail'] = 1;
		// }

		// Type Of Style
		// if($_POST['typeOfService'] == '-'){
		// 	$error_message_t .= '<p class="red">'.$language[$lang]['form4_e1'].'</p>';
		// 	$errors['typeOfService'] = 1;
		// }

		// DATE
		if(empty($date)){
			$error_message_d .= '<p class="red">'.$language[$lang]['form5_e1'].'</p>';
			$errors['date'] = 1;
		}

		if($_POST['chooseMail'] == "vagnera")
		{
			$to = 'info@lumberjack.lv';
			$place = 'Riharda Vagnera iela 11, Rīga, Latvija';
		}

		if($_POST['chooseMail'] == "jekaba")
		{
			$to = 'info@lumberjack.lv';
			$place = 'Jēkaba iela 24, Centra rajons, Rīga, Latvija';
		}

		if($_POST['chooseMail'] == "pronski")
		{
			$to = 'info@lumberjack.ee';
			$place = 'Pronksi 3, Tallin, Estonia-10124';
		}

		if($_POST['chooseMail'] == "ostrova")
		{
			$to = 'lumberbarberspb@gmail.com';
			$place = 'Большой Казачий Переулок, 11, Санкт-Петербург';
		}

		$mailSuccess = false;
		if(empty($error_message_p2) && empty($error_message_d)) {
			$subject = $phone." / ".$date;
			$message = $place . "\r\n" . "\r\n" . $language[$lang]['form1'] . " : " . " " . $name . "\r\n" . $language[$lang]['form2'] . " : " . " " . $phone . "\r\n" . $language[$lang]['form3'] . " : " . " " . $email . "\r\n" . $language[$lang]['form4'] . " : " . " " . $typeOfService . "\r\n" . $language[$lang]['form5'] . " : " . " " . $date . "\r\n" . $language[$lang]['form6'] . " : " . " " . $text;
			
			$headers .= "Reply-To: Lumberjack Booking <info@lumberjack.lv> \r\n"; 
			$headers .= "Return-Path: Lumberjack Booking <info@lumberjack.lv> \r\n"; 
			$headers .= "From: Lumberjack Booking <info@lumberjack.lv> \r\n";  
			$headers .= "Organization: Sender Organization\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
			$headers .= "X-Priority: 3\r\n";
			$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

			if(mail($to, $subject, $message, $headers)){
				$mailSuccess = true;
			}

		}else{

		}
	}
?>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/CallMe.css" media="screen" />
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript" src="https://w10436.yclients.com/widgetJS"></script>

<div  class="tbForm_CallMe read_more" style="position:fixed; right: 5%; bottom: 8%; zoom:2.5; -moz-transform: scale(2.5);" >
   <div class="tbForm_shadow"></div>
   <div class="tbForm_fone"><?php echo $language[$lang]['click'] ?></div>
</div>
<!-- te php  -->
<div id="body"></div>
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

							<?php if(isset($_SESSION['country'])) { ?>
								<?php if($_SESSION['country'] == 'ru') { ?>
									<option value="ostrova" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'lumberbarberspb@gmail.com' && $errors['chooseMail'] == 0) echo "selected"; ?> >Россия, Санкт-Петербург, Большой Казачий Переулок 11,</option>
									<option value="vagnera" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'info@lumberjack.lv' && $errors['chooseMail'] == 0) echo "selected"; ?> >Latvija, Rīga, Riharda Vagnera iela 1</option>
									<option value="jekaba" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'info@lumberjack.lv' && $errors['chooseMail'] == 0) echo "selected"; ?> >Latvija, Rīga, Centra rajons, Jēkaba iela 24</option> 
									<option value="pronski" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'info@lumberjack.ee' && $errors['chooseMail'] == 0) echo "selected"; ?> >Estonia-10124, Tallin, Pronksi 3</option> 
									
								<?php } ?>

								<?php if($_SESSION['country'] == 'lv') { ?>
									<option value="vagnera" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'info@lumberjack.lv' && $errors['chooseMail'] == 0) echo "selected"; ?> >Latvija, Rīga, Riharda Vagnera iela 1</option>
									<option value="jekaba" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'info@lumberjack.lv' && $errors['chooseMail'] == 0) echo "selected"; ?> >Latvija, Rīga, Centra rajons, Jēkaba iela 24</option> 
									<option value="pronski" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'info@lumberjack.ee' && $errors['chooseMail'] == 0) echo "selected"; ?> >Estonia-10124, Tallin, Pronksi 3</option> 
									<option value="ostrova" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'lumberbarberspb@gmail.com' && $errors['chooseMail'] == 0) echo "selected"; ?> >Россия, Санкт-Петербург, Большой Казачий Переулок 11,</option>	
								<?php } ?>

								<?php if($_SESSION['country'] == 'ee') { ?>
									<option value="pronski" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'info@lumberjack.ee' && $errors['chooseMail'] == 0) echo "selected"; ?> >Estonia-10124, Tallin, Pronksi 3</option> 
									<option value="vagnera" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'info@lumberjack.lv' && $errors['chooseMail'] == 0) echo "selected"; ?> >Latvija, Rīga, Riharda Vagnera iela 1</option>
									<option value="jekaba" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'info@lumberjack.lv' && $errors['chooseMail'] == 0) echo "selected"; ?> >Latvija, Rīga, Centra rajons, Jēkaba iela 24</option> 
									<option value="ostrova" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'lumberbarberspb@gmail.com' && $errors['chooseMail'] == 0) echo "selected"; ?> >Россия, Санкт-Петербург, Большой Казачий Переулок 11,</option>	
								<?php } ?>

								<?php } else { ?>
									<option value="vagnera" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'info@lumberjack.lv' && $errors['chooseMail'] == 0) echo "selected"; ?> >Latvija, Rīga, Riharda Vagnera iela 1</option>
									<option value="jekaba" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'info@lumberjack.lv' && $errors['chooseMail'] == 0) echo "selected"; ?> >Latvija, Rīga, Centra rajons, Jēkaba iela 24</option> 
									<option value="pronski" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'info@lumberjack.ee' && $errors['chooseMail'] == 0) echo "selected"; ?> >Estonia-10124, Tallin, Pronksi 3</option> 
									<option value="ostrova" <?php if(isset($_POST["chooseMail"]) && $_POST['chooseMail'] == 'lumberbarberspb@gmail.com' && $errors['chooseMail'] == 0) echo "selected"; ?> >Россия, Санкт-Петербург, Большой Казачий Переулок 11,</option>	
							<?php } ?>

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
					<!-- <?php echo ($error_message_n); ?>
					<?php echo ($error_message_n2); ?> -->
				<!--END-->

				<div class="bookinput">
					<label><?php echo $language[$lang]['form2'] ?></label>
					<span class="your-name"><input type="tel" value = "<?php if(isset($_POST['phone']) && $errors['phone'] == 0){ echo $_POST['phone']; } ?>" name="phone" size="40" class="wpcf7-text" required="required" placeholder="<?php echo $language[$lang]['form2'] ?>"></span>
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
					<!-- <?php echo ($error_message_m); ?> -->
				<!--END-->

				<div class="styled-select">
					<span class="wpcf7-form-control-wrap menu-471">
						<select name="typeOfService" class="wpcf7-select" required="required">
						
							<?php if(isset($_SESSION['country'])) { ?>
								<?php if($_SESSION['country'] == 'lv' || $_SESSION['country'] == 'ee') { ?>
							
									<option class="lvee_option" value="-" ><?php echo $language[$lang]['form4'] ?></option>
									<option class="lvee_option" value="<?php echo $language[$lang]['hair1.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair1.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair1.'] ?></option>
									<option class="lvee_option" value="<?php echo $language[$lang]['hair13.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair13.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair13.'] ?></option>
									<option class="lvee_option" value="<?php echo $language[$lang]['hair2.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair2.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair2.'] ?></option>
									<option class="lvee_option" value="<?php echo $language[$lang]['hair12.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair12.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair12.'] ?></option>
									<option class="lvee_option" value="<?php echo $language[$lang]['hair11.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair11.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair11.'] ?></option>
									<option class="lvee_option" value="<?php echo $language[$lang]['hair3.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair3.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair3.'] ?></option>
									<option class="lvee_option" value="<?php echo $language[$lang]['hair4.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair4.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair4.'] ?></option>
									<option class="lvee_option" value="<?php echo $language[$lang]['hair5.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair5.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair5.'] ?></option>
									<option class="lvee_option" value="<?php echo $language[$lang]['hair6.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair6.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair6.'] ?></option>
									<option class="lvee_option" value="<?php echo $language[$lang]['hair7.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair7.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair7.'] ?></option>
									<option class="lvee_option" value="<?php echo $language[$lang]['hair8.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair8.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair8.'] ?></option>
								<?php } ?>

								<?php if($_SESSION['country'] == 'ru') { ?>

									<option class="ru_option" value="-" ><?php echo $language[$lang]['form4'] ?></option>
									<option class="ru_option" value="<?php echo $language[$lang]['hair10.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair10.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair10.'] ?></option>
									<option class="ru_option" value="<?php echo $language[$lang]['hair20.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair20.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair20.'] ?></option>
									<option class="ru_option" value="<?php echo $language[$lang]['hair30.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair30.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair30.'] ?></option>
									<option class="ru_option" value="<?php echo $language[$lang]['hair40.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair40.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair40.'] ?></option>
									<option class="ru_option" value="<?php echo $language[$lang]['hair50.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair50.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair50.'] ?></option>
									<option class="ru_option" value="<?php echo $language[$lang]['hair60.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair60.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair60.'] ?></option>
									<option class="ru_option" value="<?php echo $language[$lang]['hair70.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair70.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair70.'] ?></option>
									<option class="ru_option" value="<?php echo $language[$lang]['hair80.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair80.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair80.'] ?></option>
									<option class="ru_option" value="<?php echo $language[$lang]['hair90.'] ?>" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == $language[$lang]['hair90.'] && $errors['typeOfService'] == 0) echo "selected"; ?> ><?php echo $language[$lang]['hair90.'] ?></option>
								<?php } ?>
							<?php } ?>

						</select>
					</span>
				</div>
				<!--ERRROR  -->
					<!-- <?php echo ($error_message_t); ?> -->
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

				<a class="remodal-close"></a>
			</form>
			
			<?php
			}else if($mailSuccess){?>
				<a class="remodal-close" href="index.php"></a>
				<div class="checkk">
				<?php echo $language[$lang]['check']; ?>
				</div>
			<?php } ?>

	</div>
</div>

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