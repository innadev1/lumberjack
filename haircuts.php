<?php
	include "assets/lang.php";
$error_message_choose_m = "";
$error_message_n = "";
$error_message_n2 = "";
$error_message_p1 = "";
$error_message_p2 = "";
$error_message_m = "";
$error_message_t = "";
$error_message_d = "";

$mailSuccess = false;

$hair_syles = ['style0',$language[$lang]['hair1.'],$language[$lang]['hair2.'],$language[$lang]['hair3.'],$language[$lang]['hair4.'],$language[$lang]['hair5.'],$language[$lang]['hair6.'],$language[$lang]['hair7.'],$language[$lang]['hair8.'],$language[$lang]['hair9.']];

if(isset($_POST['emailsent']))
{
// echo ($error_message_choose_m);
// echo ($error_message_n);
// echo ($error_message_n2);
// echo ($error_message_p1);
// echo ($error_message_p2);
// echo ($error_message_m);
// echo ($error_message_t);
// echo ($error_message_d);

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


// // Type Of Style
// if($_POST['typeOfService'] == '-'){
// 	$error_message_t .= '<p class="red">'.$language[$lang]['form4_e1'].'</p>';
// 	$errors['typeOfService'] = 1;
// }

// DATE 
if(empty($date)){
	$error_message_d .= '<p class="red">'.$language[$lang]['form5_e1'].'</p>';
	$errors['date'] = 1;
}

$mailSuccess = false;


if( empty($error_message_choose_m) && empty($error_message_n) && empty($error_message_p) && empty($error_message_m) && empty($error_message_d) ) {
	$to      = $_POST['chooseMail'];
	$subject = $language[$lang]['client'];
	$message = $language[$lang]['form1'] . " : " . " " . $name . "\r\n" . $language[$lang]['form2'] . " : " . " " . $phone . "\r\n" . $language[$lang]['form3'] . " : " . " " . $email . "\r\n" . $language[$lang]['form4'] . " : " . " " . $typeOfService . "\r\n" . $language[$lang]['form5'] . " : " . " " . $date . "\r\n" . $language[$lang]['form6'] . " : " . " " . $text;
	$headers = "";

	if(mail($to, $subject, $message, $headers)){
		$mailSuccess = true;
	}
	$to2      = $email;
	$subject = $language[$lang]['client'];
	$message = $language[$lang]['form1'] . " : " . " " . $name . "\r\n" . $language[$lang]['form2'] . " : " . " " . $phone . "\r\n" . $language[$lang]['form3'] . " : " . " " . $email . "\r\n" . $language[$lang]['form4'] . " : " . " " . $hair_syles[strval($typeOfService) ] . "\r\n" . $language[$lang]['form5'] . " : " . " " . $date . "\r\n" . $language[$lang]['form6'] . " : " . " " . $text;
	$headers = $language[$lang]['from'] . $email . "\r\n" .
	
	'Reply-To:' . $email . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

	mail($to2, $subject2, $message2, $headers2);

	// echo "check Your Email";

}else{


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

<div id="banner">
	<div class="caption">
		<h1><img src="img/vector_white.png"><?php echo $language[$lang]['haircuts'] ?><img src="img/vector_white.png"></h1>
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
				<button id="b1" class="button" value=0 haircutsn = "name1" ><?php echo $language[$lang]['book'] ?></button>
			</div>
		</div>
		<div class="photo photo_2">
			<div class="text">
				<h1>HairStyle 2.</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
				</p>
				<button class="button" value=1  haircutsn = "name2" ><?php echo $language[$lang]['book'] ?></button>
			</div>
		</div>
		<div class="photo photo_3">
			<div class="text">
				<h1>HairStyle 3.</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
				</p>
				<button class="button" value=2 haircutsn = "name3" ><?php echo $language[$lang]['book'] ?></button>
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
				<button class="button" value=3 haircutsn = "name4" ><?php echo $language[$lang]['book'] ?></button>
			</div>
		</div>
		<div class="photo photo_5">
			<div class="text">
				<h1>HairStyle 5.</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
				</p>
				<button class="button" value=4 haircutsn = "name5" ><?php echo $language[$lang]['book'] ?></button>
			</div>
		</div>
		<div class="photo photo_6">
			<div class="text">
				<h1>HairStyle 6.</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
				</p>
				<button class="button" value=5 haircutsn = "name6" ><?php echo $language[$lang]['book'] ?></button>
			</div>
		</div>
		<div class="photo photo_1">
			<div class="text">
				<h1>HairStyle 7.</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
				</p>
				<button class="button" value=6 haircutsn = "name7" ><?php echo $language[$lang]['book'] ?></button>
			</div>
		</div>
		<div class="photo photo_2">
			<div class="text">
				<h1>HairStyle 8.</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
				</p>
				<button class="button" value=7 haircutsn = "name8" ><?php echo $language[$lang]['book'] ?></button>
			</div>
		</div>
		<div class="photo photo_3">
			<div class="text">
				<h1>HairStyle 9.</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
				</p>
				<button class="button" value=8 haircutsn = "name9" ><?php echo $language[$lang]['book'] ?></button>
			</div>
		</div>
	</div>
</div>

<div class="button_more"><button id="button">MORE</button></div>

<?php include 'assets/footer.php'; ?>

<!--FORMA  -->

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

		
		<form id="form" name="orderform" method="post" action="haircuts.php">

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
				<select id="typeOfService" name="typeOfService" class="wpcf7-select" required="required">
					<option value="1" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '1') echo "selected"; ?>><?php echo $hair_syles[1]; ?></option>
					<option value="2" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '2') echo "selected"; ?>><?php echo $hair_syles[2]; ?></option>
					<option value="3" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '3') echo "selected"; ?>><?php echo $hair_syles[3]; ?></option>
					<option value="4" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '4') echo "selected"; ?>><?php echo $hair_syles[4]; ?></option>
					<option value="5" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '5') echo "selected"; ?>><?php echo $hair_syles[5]; ?></option>
					<option value="6" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '6') echo "selected"; ?>><?php echo $hair_syles[6]; ?></option>
					<option value="7" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '7') echo "selected"; ?>><?php echo $hair_syles[7]; ?></option>
					<option value="8" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '8') echo "selected"; ?>><?php echo $hair_syles[8]; ?></option>
					<option value="9" <?php if(isset($_POST["typeOfService"]) && $_POST['typeOfService'] == '9') echo "selected"; ?>><?php echo $hair_syles[9]; ?></option>
				</select>
			</spam>
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