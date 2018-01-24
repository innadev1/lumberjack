<link rel="stylesheet" type="text/css" href="style/header.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&amp;subset=cyrillic-ext" rel="stylesheet">

<script type="text/javascript" src="js/open_close.js"></script>
<link rel="stylesheet" type="text/css" href="style/form.css">

<div id="information">
	<div class="information">
		<ul>
			<li><a href="<?php echo $language[$lang]['franchise_'] ?>" open="<?php echo $language[$lang]['franchise_'] ?>" target="_blank"><?php echo $language[$lang]['franch.'] ?></a></li>
			<li class="border"></li>
			<li><a href="contacts.php"><img src="img/call.png" width="1%"></a></li>
			<li class="border"></li>
			<!-- <li><a href="http://lumberjackbarbershop.com/shop/en_US/shop/"><img src="img/bag.png" width="0.8%"></a></li> -->
			<li class="border"></li>

            <?php if(isset($_SESSION['country'])) { ?>
                <?php if($_SESSION['country'] == 'ru') { ?>
        			<li><a href="?lang=en">EN</a></li>
        			<li><a href="?lang=ru">RU</a></li>
                <?php } ?>

                <?php if($_SESSION['country'] == 'lv') { ?>
                    <li><a href="?lang=lv">LV</a></li>
        			<li><a href="?lang=en">EN</a></li>
        			<li><a href="?lang=ru">RU</a></li>
                <?php } ?>

                <?php if($_SESSION['country'] == 'ee') { ?>
                    <li><a href="?lang=en">EE</a></li>
        			<li><a href="?lang=en">EN</a></li>
                <?php } ?>
            <?php } else { ?>
                <li><a href="?lang=lv">LV</a></li>
    			<li><a href="?lang=en">EN</a></li>
    			<li><a href="?lang=ru">RU</a></li>
            <?php } ?>

		</ul>
	</div>
</div>

<div id="logo">
	<a href="index.php"><img src="img/logo.png"></a>
</div>

<div class="menu"><a id="toggler" href="#"><img src="img/menu.png"></a></div>
<div id="box" style="display: none;">
	<a id="toggler_close" style="display:none" href="#"><div class="close"><img src="img/close.png"></div></a>
    <div>
        <ul class="box_li">
			<li><a href="index.php"><?php echo $language[$lang]['home'] ?></a></li>
			<li><a href="our_story.php"><?php echo $language[$lang]['our_story'] ?></a></li>
			<li><a href="barbershop.php"><?php echo $language[$lang]['our_barber'] ?></a></li>

			<?php if(!isset($_SESSION['country']) || $_SESSION['country'] != 'ru') { ?>
			    <!-- <li><a href="http://lumberjackbarbershop.com/shop/en_US/shop/"><?php echo $language[$lang]['online_store'] ?></a></li> -->
			<?php } ?>

			<li><a href="haircuts.php"><?php echo $language[$lang]['haircuts'] ?></a></li>

            <?php if(!isset($_SESSION['country']) || $_SESSION['country'] != 'ru') { ?>
			    <li><a href="wall_of_fame.php"><?php echo $language[$lang]['wof'] ?></a></li>
			<?php } ?>

			<li><a href="price_list.php"><?php echo $language[$lang]['price_list'] ?></a></li>
			<li><a href="contacts.php"><?php echo $language[$lang]['contact_us'] ?></a></li>

			<?php if(!isset($_SESSION['country']) || $_SESSION['country'] != 'ru') { ?>
			    <li><a href="partners.php"><?php echo $language[$lang]['partners'] ?></a></li>
			<?php } ?>

        </ul>
    </div>
	<div class="information">
			<p><?php echo $language[$lang]['franch.'] ?></p>
		<ul>
			<li><a href="#"><img src="img/call_brown.png" width="23px" style="padding-right:5px"></a></li>
			<li class="border"></li>
			<li><a href="#"><img src="img/bag_brown.png" width="20px" style="padding-right:5px; padding-left:5px"></a></li>
			<li class="border"></li>
			<li style="padding-left:5px"><a href="?lang=lv">LV</a></li>
			<li><a href="?lang=en">EN</a></li>
			<li><a href="?lang=ru">RU</a></li>
		</ul>
	</div>
</div>
		<script>
			$(document).ready(function(){
				$("#toggler").click(function () {
					$("#box").css("display","block");
					$("#toggler_close").css("display","block");
					$("#logo").css("position","fixed");
					$("#logo").css("z-index","10");
					$("#logo").css("width","100%");
			});
			$("#toggler_close").click(function () {
					$("#box").css("display","none");
					$("#toggler_close").css("display","none");
					$("#logo").css("position","relative");
					$("#logo").css("z-index","inherit");
					$("#logo").css("width","inherit");

			});
			});
		</script>

<div id="navigation">
	<div class="navigation">
			<ul>
				<li><a href="https://open.spotify.com/user/aleksejkozlov/playlist/3p4Ww5eWafB4hEaligbA0X"><img src="img/radio.png" class="radio"></a></li>

				<li class="link"><a href="our_story.php"><?php echo $language[$lang]['our_story'] ?></a></li>

				<li><a><img src="img/vector.png"></a></li>
				<li class="link"><a href="barbershop.php"><?php echo $language[$lang]['our_barber'] ?></a></li>

				<?php if(!isset($_SESSION['country']) || $_SESSION['country'] != 'ru') { ?>
    				<!-- <li><a><img src="img/vector.png"></a></li> -->
					<!-- <li class="link"><a href="http://lumberjackbarbershop.com/shop/en_US/shop/"><?php echo $language[$lang]['online_store'] ?></a></li> -->
                <?php } ?>

				<li><a><img src="img/vector.png"></a></li>
				<li class="link"><a href="haircuts.php"><?php echo $language[$lang]['haircuts'] ?></a></li>

				<!--<li><a><img src="img/vector.png"></a></li>
				<li class="link"><a href="lifestyle.php"><?php echo $language[$lang]['lfs'] ?></a></li>-->

                <?php if(!isset($_SESSION['country']) || $_SESSION['country'] != 'ru') { ?>
    				<li><a><img src="img/vector.png"></a></li>
    				<li class="link"><a href="wall_of_fame.php"><?php echo $language[$lang]['wof'] ?></a></li>
                <?php } ?>

				<li><a><img src="img/vector.png"></a></li>
				<li class="link"><a href="price_list.php"><?php echo $language[$lang]['price_list'] ?></a></li>

				<li><a><img src="img/vector.png"></a></li>
				<li class="link"><a href="contacts.php"><?php echo $language[$lang]['contact_us'] ?></a></li>
				
				<?php if(!isset($_SESSION['country']) || $_SESSION['country'] != 'ru') { ?>
			    	<li><a><img src="img/vector.png"></a></li>
					<li class="link"><a href="partners.php"><?php echo $language[$lang]['partners'] ?></a></li>
				<?php } ?>
			</ul>
	</div>
</div>

<?php 

if($_SESSION['firstTime'] == 1 || !isset($_SESSION['country'])) { ?>
    <div class="poup">
        <div class="poup1">
			<form class="" action="" method="post">
				<h1>Select current country:</h1>
				<select name="country">
					<option value="lv">Latvia</option>
					<option value="ru">Russia</option>
					<option value="ee">Estonia</option>
				</select>
				<input type="submit" name="changeCountry" value="Submit" class="submit-country">
			</form>
		</div>
    </div>
<?php } ?>
