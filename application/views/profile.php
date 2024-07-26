<?php
$err = $this->session->flashdata("message");
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
#registration-form input, #registration-form select, #registration-form textarea{padding:8px;font-size:14px;width:100%;border:1px solid #aaa;border-radius:5px;}
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
                            <h2 class="wow fadeInUp">Edit Profile</h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <div class="col-md-12">
														<form action="<?php echo site_url('register/profile_submit');?>" method="post" enctype="multipart/form-data" id="registration-form" style="box-shadow:0px 0px 25px #ccc;padding:20px;">
															<?php
															if($err) {?>
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
																<p class="col-md-4 lbl_text"><label class="col-md-12">Name</label></p>
																<p class="col-md-8"><input name="firstname" value="<?php echo $mem['firstname'];?>" type="text" placeholder="Name"></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">E-Mail</label></p>
																<p class="col-md-8">
																	<input id="email" type="text" value="<?php echo $mem['email'];?>" placeholder="E-Mail" disabled readonly>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Bio</label></p>
																<p class="col-md-8"><textarea name="bio" cols="5" rows="5"><?php echo $mem['bio'];?></textarea></p>
															</div>
															<div class="row">
																<p class="col-md-4"><label class="col-md-12">Photo</label></p>
																<p class="col-md-8">
																	<?php
																	echo $mem['photo'] ? "<img src='".base_url()."uploads/".$mem['photo']."' width='150' style='padding-top:8px;'>" : "";
																	?>
																</p>
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
												</div>
										</div>
								</div>
						</section>
					</div>
					
					<script>
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