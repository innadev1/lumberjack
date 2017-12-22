		<div class="remodal-overlay" style="display: none;">
				<div class="remodal" data-remodal-id="modal" style="visibility: visible;">

					<img src="img/logo-half.png" id="bookin-workshop">
					<?php if(!$mailSuccess){ ?>
									
			<form id="form" name="orderform" method="post" action="barbershop.php?openPopup">

				<p><?php echo $language[$lang]['form_top'] ?></p>

				<div class="appointment_place"><p>Adress: Bolshoy Kazachiy Pereulok, 11, Sankt-Peterburg</p></div>
			
				<div class="bookinput">
					<label><?php echo $language[$lang]['form1'] ?></label>
					<span class=" your-name"><input type="text" value = "<?php if(isset($_POST['name']) && $errors['name'] == 0 ){ echo $_POST['name']; } ?>" name="name" size="40" class="wpcf7-text" required="required" placeholder="<?php echo $language[$lang]['form1_1'] ?>"></span>
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

					<label><?php echo $language[$lang]['form5'] ?></label>
					<span class="wpcf7-form-control-wrap date-87"><input class="wpcf7-date" value = "<?php if(isset($_POST['date']) && $errors['date'] == 0){ echo $_POST['date']; } ?>" name="date" type = "text" readonly="readonly" id = "datepicker-13" placeholder="<?php echo $language[$lang]['form5_1'] ?>"></spam>
					

				</div>
				<!--ERRROR  -->
					<?php echo ($error_message_d); ?>
				<!--END-->
				
				<div class="booktextarea">
					<label><?php echo $language[$lang]['form6'] ?></label>
					<span class="your-message"><textarea text="type" name="text" form="form" cols="40" rows="5" class="wpcf7-textarea" placeholder="<?php echo $language[$lang]['form6_1'] ?>"></textarea></span>
				</div>
				

				<div class="col-sm-12">

					<input type="hidden" id="hidden_input" name ='book_place' value="">

					<input class="blackbutton" type="submit" name="emailsent" value="<?php echo $language[$lang]['form8']?>">
				</div>					
				
			</form>

			<?php
			}else if($mailSuccess){
				
				$checkemail = "<p><?php echo $language[$lang]['check'] ?></p>";
				
				echo $checkemail;
			} ?>
					<a class="remodal-close_1"></a>

				</div>
		</div>
		
		
		
		
		
		<script>
		$(function(){
			$('.book').click(function(){
				val = $(this).attr('stuff')
				ind = $(this).parent().parent().index()
				p = $('.appointment_place p')			
				hiddenInput =$('#hidden_input') 	
				$(".remodal-overlay").css("display", "block")

				stuff = $(this).attr('stuff')

				if(stuff=='riga1'){
					p.html('Riharda Vagnera iela 11, Rīga, Latvia')
					hiddenInput.attr('value','riga1')
					

				}else if(stuff=='riga2'){
					p.html('Jēkaba iela 24, Rīga, Latvia')

				}else if(stuff=='estonia'){
					p.html('Pronksi 3, Tallin, Estonia-10124')

				}else if(stuff=='russia'){
					p.html('Bolshoy Kazachiy Pereulok, 11, Sankt-Peterburg')
				}

				$('#hidden_input').attr('value', stuff)
			})

			$(".remodal-close_1").click(function(){
				$(".remodal-overlay").css("display", "none")
			})
		})
		</script>