<?php if($_SESSION['firstTime'] == 1 || !isset($_SESSION['country'])) { ?>
    <div class="poup">
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
<?php } ?>
<script>
$(document).ready(function(){
	$(".submit-country").click(function () {
		$("#body1").css("background-color","rgba(0,0,0,0)");
	});
});
</script>

<link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,latin-ext" rel="stylesheet">
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
