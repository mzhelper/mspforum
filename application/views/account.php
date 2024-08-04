<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
#registration-form input, #registration-form select{padding:8px;font-size:14px;width:100%;border:1px solid #aaa;border-radius:5px;}
#registration-form select{padding:10px;}
#registration-form option{font-family:'Tahoma' !important;}
p.lbl_text{margin-bottom:0px;}
</style>
			<div id="content" class="no-bottom no-top">
            <div id="top"></div>
						<div><img src="<?php echo base_url()."uploads/bg_about.jpg";?>" width="100%"></div>
						<section id="section-about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="wow fadeInUp">Create Account</h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <div class="col-md-12">
                        	<?php
                        	if($err != 9) {?>
														<form action="<?php echo site_url('register/account_submit');?>" method="post" enctype="multipart/form-data" id="registration-form" style="box-shadow:0px 0px 25px #ccc;padding:20px;">
															<?php
															if($err) {
																$err = $this->session->flashdata("message");
																?>
																<div class="row">
																	<div class="col-md-12 lbl_text">
																		<label class="col-md-12 merah">
																			<?php echo $err;?>
																		</label>
																	</div>
																</div>
															<?php }
															?>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Registration Type</label></p>
																<p class="col-md-8">
																	<select class="reg_type" required>
																		<option value="">- Registration Type -</option>
																		<option value="3">Government</option>
																		<option value="4">Non-Government</option>
																		<option value="5">DAO</option>
																	</select>
																</p>
															</div>
															<div class="row type_reg" style="display:none;">
																<p class="col-md-4 lbl_text"><label class="col-md-12">&nbsp;</label></p>
																<p class="col-md-8">
																	<select name="type_reg" class="reg_type2" required>
																		<option value="7" class="gov">Head of State</option>
																		<option value="8" class="gov">Head of Delegation</option>
																		<option value="9" class="gov">Staff</option>
																		<option value="13" class="non_gov">International Organization</option>
																		<option value="14" class="non_gov">Non-Government Organization</option>
																		<option value="15" class="non_gov">Private</option>
																		<option value="16" class="non_gov">Philantrophy</option>
																	</select>
																</p>
															</div>
															<div class="row type_reg" style="display:none;">
																<p class="col-md-4 lbl_text"><label class="col-md-12">&nbsp;</label></p>
																<p class="col-md-8">
																	<select name="type_reg2" class="reg_type3" required>
																		<option value="10">Speakers</option>
																		<option value="11">Moderator</option>
																		<option value="12">Participant</option>
																	</select>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">First Name</label></p>
																<p class="col-md-8"><input name="firstname" type="text" placeholder="First Name" required></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Last Name</label></p>
																<p class="col-md-8"><input name="lastname" type="text" placeholder="Last Name" required></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">E-Mail</label></p>
																<p class="col-md-8">
																	<input name="email" id="email" type="text" placeholder="E-Mail" required>
																	<label class="error_e" style="display:none;color:red;">Please enter a valid email address.</label>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Password</label></p>
																<p class="col-md-8">
																	<input class="psw" name="password" minlength="8" type="password" placeholder="Password" required autocomplete="off">
																	<label>Min 8 character and must contain of one lower case, upper case, number and special character</label>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Re-Type Password</label></p>
																<p class="col-md-8">
																	<input class="psw2" name="re_password" minlength="8" type="password" placeholder="Re-Type Password" required autocomplete="off">
																	<!--<label>Min 8 character and must contain of one lower case, upper case, number and special character</label>-->
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Organization</label></p>
																<p class="col-md-8"><input name="institusi" type="text" placeholder="Organization" required></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Designation</label></p>
																<p class="col-md-8"><input name="designation" type="text" placeholder="Designation" required></p>
															</div>
															<div class="row">
																<p class="col-md-4"><label class="col-md-12">Upload Official Photo (do not change)<br>(File only JPG/PNG, max 1 Mb)</label></p>
																<p class="col-md-8"><input type="file" name="photo" required></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"></p>
																<div class="col-md-8">
																	<div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('site_key');?>"></div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12" style="text-align:center;">
																	<p><button class="btn-large btn-style1 merah" type="submit" style="margin-right:0px;margin-top:20px;border:0px;width:150px;">SUBMIT</button></p>
																	<br><br>
																</div>
															</div>
															<div class="nspace-20"></div>
														</form>
													<?php } else {?>
															<div class="text-center" style="box-shadow:0px 0px 25px #ccc;padding:20px;">
																<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
										                <path fill="#4caf50" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path><path fill="#ccff90" d="M34.602,14.602L21,28.199l-5.602-5.598l-2.797,2.797L21,33.801l16.398-16.402L34.602,14.602z"></path>
										            </svg>
										            <p>Thank you for your interest in joining HLF MSP 2024. Your account is currently being processed to be activated by the committee. Please, kindly check your email periodically</p>
															</div>
													<?php }?>
												</div>
										</div>
								</div>
						</section>
					</div>
					
					<script>
						$(".psw").change(function(){
							var newPassword = $(this).val();
							var regularExpression  = /^.*(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).*$/;
							//alert(newPassword);
							if(newPassword.length < 8) {
								alert("Min 8 character");
							} else if(!regularExpression.test(newPassword)) {
								alert("The password must contain of one lower case, upper case, number and special character");
								$(".psw").val("");
							}
						});
						
						$(".psw2").change(function(){
							var newPassword = $(this).val();
							var newPassword_utama = $(".psw").val();
							var regularExpression  = /^.*(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).*$/;
							//alert(newPassword); 
							if(newPassword.length < 8) {
								alert("Min 8 character");
							} else if(!regularExpression.test(newPassword)) {
								alert("The password must contain of one lower case, upper case, number and special character");
								$(".psw2").val("");
							} else if(newPassword_utama != newPassword) {
								alert("Password & Re-Type Password not match");
								$(".psw2").val("");
							}
						});
						
						$(".reg_type").change(function(){
							$(".type_reg").show();
							var vv = $(this).val();
							if(vv==3) {
								$(".reg_type2").val(7);
								$(".gov").show();
								$(".non_gov").hide();
							} else if(vv==4) {
								$(".reg_type2").val(13);
								$(".gov").hide();
								$(".non_gov").show();
							} else if(vv==5) window.location="<?php echo site_url('register/login/dao');?>";
							$(".reg_type3").val(12);
						});
						$("#email").change(function(){
							var email = $(this).val();
							if(email.length == 0 || email.indexOf('@') == '-1'|| email.indexOf('.') == '-1'){
	                $('#email').addClass("error_input");
	                $(".error_e").show();
	                $(this).val("");
	            }else{
	                $('#email').removeClass("error_input");
	                $(".error_e").hide();
	            }
						});
					</script>