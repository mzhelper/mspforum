<style>
#registration-form input, #registration-form select{padding:8px;font-size:14px;min-width:300px;border:1px solid #aaa;border-radius:5px;}
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
                            <h2 class="wow fadeInUp">Login</h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <div class="col-md-12">
													<form action="<?php echo site_url('register/login_submit');?>" method="post" name="contact-form" id="registration-form" style="box-shadow:0px 0px 25px #ccc;padding:20px;">
														<?php
														if($err=="dao") {
															echo "<div class='row text-center'><label class='col-md-12'>Please insert username and password your DAO Account</label></div>";
														}
														if($err && $err != "dao") {?>
															<div class="row">
																<div class="col-md-12 lbl_text">
																	<label class="col-md-12 merah">
																		Incorrect Username or Password or Your account is not active yet
																	</label>
																</div>
															</div>
														<?php }
														?>
														<div class="row text-center">
															<label class="col-md-12">Username</label>
															<p class="col-md-12"><input type="text" tabindex="1" value="" name="email" class="required"></p>
														</div>
														<div class="row text-center">
															<label class="col-md-12">Password</label>
															<p class="col-md-12"><input type="password" tabindex="2" name="password" autocomplete="off"></p>
														</div>
														<div class="row text-center">
															<div class="col-md-12">
																<button class="btn-large btn-style1 merah" type="submit" style="margin-right:0px;margin-top:20px;border:0px;width:150px;float:none !important;">LOGIN</button>
																<p><br>make a new account click <a href="<?php echo site_url('register/account');?>" style="color:blue;">here</a></p>
															</div>				
														</div>
														<div class="nspace-20"></div>
													</form>
												</div>
										</div>
								</div>
						</section>
			</div>