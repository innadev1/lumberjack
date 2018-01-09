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
		if( empty($error_message_choose_m) && empty($error_message_n) && empty($error_message_p) && empty($error_message_m) && empty($error_message_t) && empty($error_message_d) ) {
			// $to      = 'my.worktest94@gmail.com';
			$subject = $language[$lang]['client'];
			$message = $place . "\r\n" . "\r\n" . $language[$lang]['form1'] . " : " . " " . $name . "\r\n" . $language[$lang]['form2'] . " : " . " " . $phone . "\r\n" . $language[$lang]['form3'] . " : " . " " . $email . "\r\n" . $language[$lang]['form4'] . " : " . " " . $typeOfService . "\r\n" . $language[$lang]['form5'] . " : " . " " . $date . "\r\n" . $language[$lang]['form6'] . " : " . " " . $text;
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="CallMe.css" media="screen" />
<script type="text/javascript" src="CallMe.js"></script>

<div  class="tbForm_CallMe read_more" style="position:fixed; right: 2vw; bottom: 1.5vw; zoom:2.5" >
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

