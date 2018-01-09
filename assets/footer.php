<link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style/footer.css">

<div id="footer">
	<div class="footer">
		<div id="logo_footer"><img src="img/logo.png" width="9%"></div>

		<div class="links">
			<ul>
				<!-- <li><a href="https://www.facebook.com/lumberjackbarbershop.latvia/?ref=br_rs"><img src="img/facebook.png"></a></li>
				<li><a href="https://www.instagram.com/lumberjack_barbershop_/"><img src="img/instagram.png"></a></li>
				<li><a href="https://vimeo.com"><img src="img/vimeo.png"></a></li> -->

				<?php if(isset($_SESSION['country'])) { ?>
					<?php if($_SESSION['country'] == 'ru') { ?>
						
					<?php } ?>

					<?php if($_SESSION['country'] == 'lv') { ?>
						<li><a href="https://www.facebook.com/lumberjackbarbershop.latvia/?ref=br_tf"><img src="img/facebook.png"></a></li>
						<li><a href="https://www.instagram.com/lumberjack_barbershop_/"><img src="img/instagram.png"></a></li>
					<?php } ?>

					<?php if($_SESSION['country'] == 'ee') { ?>
						<li><a href="https://www.facebook.com/lumberjackbarbershop.estonia/"><img src="img/facebook.png"></a></li>
						<li><a href="https://www.instagram.com/lumberjack_barbershop_/"><img src="img/instagram.png"></a></li>
					<?php } ?>
					<?php } else { ?>
					
				<?php } ?>

			</ul>
		</div>

		<div><p><?php echo $language[$lang]['copy_right'] ?></p></div>

	</div>
</div>
