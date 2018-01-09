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