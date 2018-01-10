<!DOCTYPE html> 
<html>
    <head>   
		<link rel="shortcut icon" href="img/favicon.png" type="image/png">	
		<link rel="stylesheet" type="text/css" href="style/index.css">
		<link rel="stylesheet" type="text/css" href="style/form.css">
        <title>lumberjack</title>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.CarouselLifeExample.js"></script>
		<script type="text/javascript" src="js/open_close.js"></script>
		<script type="text/javascript" src="js/hammer.min.js"></script>
		
		<link href="https://fonts.googleapis.com/css?family=Arvo:400i" rel="stylesheet">

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
         <link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,latin-ext" rel="stylesheet">
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
			
			<?php include 'assets/button.php'; ?>
			<?php include 'assets/header.php'; ?>

			<div id="banner">
				<div id="slider-wrapper">
						<div class="slide"></div>
						<div class="slide"></div>
						<div class="slide"></div>
						<div class="slide"></div>
						<div class="slide"></div>
						<div class="button_more" style=""><button class="read_more"><?php echo $language[$lang]['book'] ?></button></div>
						<div class="text"><div class="line1"></div><div class="line2"></div><p></p></div>
						
						<div class="nav flex">
							<div class="active"></div>
							<div></div>
							<div></div>
							<div></div>
						</div>

				</div>
			</div>
			<script>
				var clickable = true;
				var now = 0;
				var next = 1;
				texts = ['<b>It is not simply a haircut</b><br><b> – it is the philosophy of masculinity.</b>','<b>We will emphasize the male character</b><br><b> and the mood of a growing and an already held gentleman</b><br><b> with irreproachable professionalism.</b>','<b>We believe that representatives of the stronger sex</b><br> <b>have rights to rely on a verified</b><br><b> and top-quality personal care.</b>','<b>Lumberjack Barber- shop – remind yourself</b><br><b> how cool it is to be a man!</b>'];

				$('#banner .text p').html(texts[0]);
				$('#banner .text p b').css({'top':0,'opacity':1})

				var textLen = 0;
				stringOld = texts[now]
				function rmoveLetter(l=0){
					console.log($('#banner .text b').length)
				/*	s = ""
					for (var i = 0; i < l-1; i++) {
						s+=stringOld[i]
						if (stringOld[i]=='<') {
							while(stringOld[i]!='>'){
								i++
								s+=stringOld[i]
							}
						}
					}
					$('#banner .text p').html(s)
					if (l>0) {
						setTimeout(function(){
							rmoveLetter(l-1)
						},2500/stringOld.length)
					}else{
						$('#banner .slide:eq('+(next)+')').css({'opacity':1,'z-index':0})
						$('#banner .slide:eq('+(now)+')').animate({'opacity':0},400,function(){
							$(this).css({'z-index':1})
						})


						addLetter(0,'')
					}*/
					var counter = 0
					for (var i = 0; i < $('#banner .text b').length; i++) {

						$('#banner .text b:eq('+i+')').delay(300*i).animate({"opacity":0,'top':'1vw'},400,function(){
							//console.log(counter,$('#banner .text b').length)
							counter++
							if (counter==$('#banner .text b').length) {
								//alert('go')
								$('#banner .slide:eq('+(next)+')').css({'opacity':1,'z-index':0})
								$('#banner .slide:eq('+(now)+')').animate({'opacity':0},400,function(){
									$(this).css({'z-index':1})
								})
								$('#banner .text p').html(texts[next])
								counter = 0
								addLetter()
							}
						})
					}

				}
			//	rmoveLetter()

				function addLetter(l,s){
					var counter = 0
					for (var i = 0; i < $('#banner .text b').length; i++) {
						$('#banner .text b:eq('+i+')').delay(300*i).animate({"opacity":1,'top':'0'},300,function(){
							counter++
							console.log(counter,$('#banner .text b').length)
							if (counter==$('#banner .text b').length) {
							//	alert('go')
								now = next
								next++
								counter = 0
								if (next==$('#banner .slide').length-1) {
									next=0
								}
								clickable=true
								animInterval = setInterval(function(){animEng(next)},5000)


							}
						})
					}
				}



				function animEng(to){
					//alert('GO')
					clearInterval(animInterval)

					clickable = false
					next = to 
					rmoveLetter(stringOld.length)
					console.log('aaaaaadddddd')
					$('#banner .nav div').removeClass('active')
					$('#banner .nav div:eq('+to+')').addClass('active')


				}
				//animEng(1)

				var animInterval = setInterval(function(){animEng(next)},4000)

				$('#banner .nav div').click(function(){
					if (clickable) {
					//alert('go')
						that = $(this)
						ind = that.index()
						animEng(ind)
					}
				})

			</script>

			<div id="banner_mobile">
				<div class="caption">
					<h1>LUMBERJACK<br>BARBERSHOP</h1>
					<!--<h2>NEW TRADITIONAL BARBERSHOP</h2>-->
					<button class="read_more"><?php echo $language[$lang]['book'] ?></button>
				</div>
				<div class="round_buttons">
					<button id="flip_1"></button>
					<button id="flip_2"></button>
					<button id="flip_3"></button>
				</div>
			</div>
				
			<div class="wrap">
				<div class="photo photo_1">
							
					<a href="<?php echo $language[$lang]['franchise_'] ?>" open="<?php echo $language[$lang]['franchise_'] ?>" target="_blank"><button class="read_more_card"><?php echo $language[$lang]['gift_franc'] ?></button></a>

				</div>

				<div class="photo photo_2">
				
					<a href="http://testlumberjack.ml/shop/lv/product-category/gift-cards/"><button class="read_more_card"><?php echo $language[$lang]['gift_card'] ?></button></a>
				
				</div>
				

			
			</div>

			<div id="products">
			
				<div class="products"><h3><?php echo $language[$lang]['product'] ?></h3></div>


						<div class="slide_nav right"></div>	
						<div class="slide_nav left"></div>	
						<div class="wrap_product" id="wrap_product">
							<div class="product_slider">

								<div class="product product_1" >
									<h4>Uppercut Deluxe Pomade</h4>
									<p>20,00 €</p>
								</div>

								<div class="product product_2">
									<h4>Mr. Bear Beard Balm</h4>

									<p>20,00 €</p>
								</div>

								<div class="product product_3">
									<h4>Corleone</h4>
									<p>20,00 €</p>
								</div>

								<div class="product product_4">
									<h4>Reuzel Blue W/B<br> Strong Hold Pig</h4>
									<p>20,00 €</p>
								</div>

								<div class="product product_5">
									<h4>Uppercut Featherweight</h4>
									<p>20,00 €</p>
								</div>

								<div class="product product_5">
									<h4>Uppercut Featherweight</h4>
									<p>20,00 €</p>
								</div>

								<div class="product product_5">
									<h4>Uppercut Featherweight</h4>
									<p>20,00 €</p>
								</div>

								<div class="product product_5">
									<h4>Uppercut Featherweight</h4>
									<p>20,00 €</p>
								</div>

								<div class="product product_5">
									<h4>Uppercut Featherweight</h4>
									<p>20,00 €</p>
								</div>

								<div class="product product_5">
									<h4>Uppercut Featherweight</h4>
									<p>20,00 €</p>
								</div>


							</div>

						</div>
				
			</div>
			<script type="text/javascript">
				$(function(){
					var clickable = true
					pw = $('.product').width()
					
					limit = $('.product').length - 5;
					now_pr = 0
					auto_dir = -1;
					
					function slide_pr(dir){
							to = now_pr+dir

						if (clickable&&to<1&&to>-(limit+1)) {
							clickable=false
							clearTimeout(slide_timer)

							console.log(to)
							$('.product').animate({'left': to*pw},400,function(){
								clickable = true
								now_pr = to
							 	if (to==-limit) {

							 	auto_dir=1

							 	}else if( to==0){

							 	auto_dir=-1

							 	}
							})
								slide_timer = setTimeout(function(){slide_pr(auto_dir)},3000)

						}
					}

						$('.slide_nav.left ').click(function(){
							slide_pr(1)
						})
						$('.slide_nav.right ').click(function(){
							slide_pr(-1)

						})
					if (window.innerWidth>900) {
							var slide_timer = setTimeout(function(){slide_pr(auto_dir)},3000)
						
					}

				})

			</script>
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
					<!-- LightWidget WIDGET --><script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/1643d0d20257552c9f1cd97ef73be4ef.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>

				</div>
			</div>
			
			<?php include 'assets/footer.php'; ?>
			
		</div>
	</body>
</html>

