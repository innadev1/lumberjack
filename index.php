<?php
// hi!!!!
if(isset($_POST['submit'])) {
	$to      = 'my.worktest94@gmail.com';
	$subject = 'the subject';
	$message = 'hello';
	$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);


}
?>


<!DOCTYPE html> 
<html>
    <head>       
		<link rel="stylesheet" type="text/css" href="style/index.css">
        <title>lumberjack</title>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.CarouselLifeExample.js"></script>

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

		<script>
			$(document).ready(function(){
				$(".read_more").click(function () {
					$(".remodal-overlay").fadeIn(400);
					$(".remodal-overlay").css("display","block");
				});
				$(".remodal-close").click(function () {
					$(".remodal-overlay").css("display","none");
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
							<img src="img/logo.png" width="15%">
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
				

				<div class="remodal-overlay" style="display: none;">
					<div class="remodal" data-remodal-id="modal" style="visibility: visible;">

						<img src="img/logo-half.png" id="bookin-workshop">
						
						<form id="form" name="orderform" method="post" action="index.php">
						
							<p>To request an appointment for a one of our service - simply fill in the form below, click send and administrator will be in touch shortly to confirm your booking.</p>

							<div class="bookinput">
								<label>Name</label>
								<span class=" your-name"><input type="text" name="name" size="40" class="wpcf7-text" required="required" placeholder="Your full name"></span>
							</div>

							<div class="bookinput">
								<label>Phone</label>
								<span class="your-name"><input type="tel" name="phone" size="40" class="wpcf7-text" required="required" placeholder="Contact number"></span>
							</div>

							<div class="bookinput">
								<label>E-mail</label>
								<span class="your-name"><input type="text" name="mail" size="40" class="wpcf7-text" placeholder="Your email"></span>
							</div>

							<div class="styled-select">
								<span class="wpcf7-form-control-wrap menu-471">
									<select name="typeOfService" class="wpcf7-select" required="required">
										<option value="Type of service">Type of service</option>
										<option value="Haircut+Beard Trim">Haircut+Beard Trim</option>
										<option value="Haircut">Haircut</option>
										<option value="Beard Trim">Beard Trim</option>
										<option value="Hot Shave">Hot Shave</option>
									</select>
								</span>
							</div>

							<div class="bookinputdate">
								<label>Date</label>  <span class="wpcf7-form-control-wrap date-87"><input type="date" name="date" class="wpcf7-date" placeholder="dd/mm/yyyy"></span> 
							</div>

							<div class="booktextarea">
								<label>Details</label>
								<span class="your-message"><textarea name="details" form="form" cols="40" rows="5" class="wpcf7-textarea" placeholder="Please give us as much detail as possible!"></textarea></span>
							</div>

							<div class="col-sm-12">
								<input class="blackbutton" type="submit" id="submit" name="submit" value="Send appointment">
							</div>

						</form>
					

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