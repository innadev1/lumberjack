<html>
<head>
<link rel="stylesheet" type="text/css" href="style/haircuts.css">
<link rel="stylesheet" type="text/css" href="style/style.css">
<link rel="stylesheet" type="text/css" href="style/form.css">
<title>haircuts</title>

<link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">

<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>
<body>
<?php include 'assets/header.php'; ?>
<?php
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

	<div id="content">

		<div id="main">
			<div class="wrap flex">
				<div class="p1"><button id="b1" class="button" value=0 haircutsn = "name1" >Hairstyle name</button></div>
				<div class="p2"><button id="b2" class="button" value=1 haircutsn = "name2" >Hairstyle name</button></div>
			</div>
			<div class="wrap1 flex">
				<div class="p3"><button id="b3" class="button" value=2 haircutsn = "name3" >Hairstyle name</button></div>
				<div class="p4"><button id="b4" class="button" value=3 haircutsn = "name4" >Hairstyle name</button></div>
			</div>
			<div class="wrap2 flex">
				<div class="p5"><button id="b5" class="button" value=4 haircutsn = "name5" >Hairstyle name</button></div>
				<div class="p6"><button id="b6" class="button" value=5 haircutsn = "name6" >Hairstyle name</button></div>
			</div>
			<div class="wrap3 flex">
				<div class="p7"><button id="b7" class="button" value=6 haircutsn = "name7" >Hairstyle name</button></div>
			</div>
		</div>

	</div>

<?php include 'assets/footer.php'; ?>

</div>
</body>
</html>
