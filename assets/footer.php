<?php if($_SESSION['firstTime'] == 1 || !isset($_SESSION['country'])) { ?>
    <div class="poup" style="position:absolute;width:200px;height:200px;background-color:red;top:0px;left:0px;" >
        <form class="" action="" method="post">
            Select current country:
            <select name="country">
                <option value="lv">Latvia</option>
                <option value="ru">Russian</option>
                <option value="ee">Estonia</option>
            </select>
            <input type="submit" name="changeCountry" value="Submit">
        </form>

    </div>
<?php } ?>

<link rel="stylesheet" type="text/css" href="style/footer.css">

<div id="footer">
	<div class="footer">
		<div id="logo_footer"><img src="img/logo.png" width="9%"></div>

<div class="links">
	<ul>
		<li><a href="https://www.facebook.com/lumberjackbarbershop.latvia/?ref=br_rs"><img src="img/facebook.png"></a></li>
		<li><a href="https://www.instagram.com/lumberjack_barbershop_/"><img src="img/instagram.png"></a></li>
		<!--<li><a href="https://vimeo.com"><img src="img/vimeo.png"></a></li>-->
	</ul>
</div>

<div><p><?php echo $language[$lang]['copy_right'] ?></p></div>
	</div>
</div>
