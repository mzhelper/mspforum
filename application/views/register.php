<?php
$err = $this->session->flashdata("message");
//$err = "SUCCESS";
?>
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
                            <h2 class="wow fadeInUp">Registration</h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <div class="col-md-12">
                        	<?php
                        	$typez_reg = GetValue("title","type_reg",array("id"=> "where/".$mem['type_reg']));
                        	if($mem['type_reg2']) $typez_reg .= " - ".GetValue("title","type_reg",array("id"=> "where/".$mem['type_reg2']));
                        	if($param != 9) {?>
														<form action="<?php echo site_url('register/submit');?>" method="post" enctype="multipart/form-data" id="registration-form" style="box-shadow:0px 0px 25px #ccc;padding:20px;">
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
																<p class="col-md-4 lbl_text"><label class="col-md-12">Registration Type</label></p>
																<p class="col-md-8">
																	<input type="text" value="<?php echo $typez_reg;?>" disabled readonly>
																	<!--<select class="reg_type" required>
																		<option value="">- Registration Type -</option>
																		<option value="3">Government</option>
																		<option value="4">Non-Government</option>
																	</select>-->
																</p>
															</div>
															<!--<div class="row type_reg" style="display:none;">
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
															</div>-->
															<!--<div class="row surat" style="display:none;">
																<p class="col-md-4"><label class="col-md-12">Letter of assignment<br>(File only PDF, max 1 Mb)</label></p>
																<p class="col-md-8"><input type="file" name="surat_tugas"></p>
															</div>-->
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Firstname</label></p>
																<p class="col-md-8"><input name="firstname" type="text" placeholder="Firstname" value="<?php echo $mem['firstname'];?>" disabled readonly></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Lastname</label></p>
																<p class="col-md-8"><input name="lastname" type="text" placeholder="Lastname" value="<?php echo $mem['lastname'];?>" disabled readonly></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Gender</label></p>
																<p class="col-md-8">
																	<select name="gender" required>
																		<option value="">- Gender -</option>
																		<option value="Male">Male</option>
																		<option value="Female">Female</option>
																	</select>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Phone Number</label></p>
																<p class="col-md-2">
																	<?php
																	$opt_cc=array();
																	$qq = GetAll("countrycode");
																	foreach($qq->result_array() as $rr) {
																		$opt_cc[$rr['code']] = $rr['country']." - ".$rr['code'];
																	}
																	echo form_dropdown("countrycode",$opt_cc,"","required");
																	?>
																</p>
																<p class="col-md-6"><input name="hp" type="text" placeholder="Phone Number" required></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">E-Mail</label></p>
																<p class="col-md-8">
																	<input name="email" id="email" type="text" placeholder="E-Mail" disabled readonly value="<?php echo $mem['email'];?>" >
																	<label class="error_e" style="display:none;color:red;">Please enter a valid email address.</label>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Date of Birth</label></p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=1;$i<=31;$i++) {
																		if($i < 10) $opt["0".$i] = "0".$i;
																		else $opt[$i] = $i;
																	}
																	echo form_dropdown("tgl",$opt);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=1;$i<=12;$i++) {
																		if($i < 10) $opt["0".$i] = GetMonth($i);
																		else $opt[$i] = GetMonth($i);
																	}
																	echo form_dropdown("bln",$opt);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=1930;$i<=date("Y")-17;$i++) {
																		$opt[$i] = $i;
																	}
																	echo form_dropdown("thn",$opt,1970);
																	?>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Ministry/Institution/Organization</label></p>
																<p class="col-md-8"><input name="institusi" type="text" placeholder="Ministry/Institution/Organization" value="<?php echo $mem['institusi'];?>" disabled readonly></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Country</label></p>
																<p class="col-md-8">
																	<?php
																	$opt = GetOptAll("country", "- Country -");
																	echo form_dropdown("id_country",$opt,"","class='negaraz' required");
																	?>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Designation</label></p>
																<p class="col-md-8"><input name="designation" type="text" placeholder="Designation" value="<?php echo $mem['designation'];?>" disabled readonly></p>
															</div>
															<div class="luarnegriz">
																<div class="row">
																	<p class="col-md-4 lbl_text"><label class="col-md-12">Type of Passport</label></p>
																	<p class="col-md-8">
																		<!--<input name="passport_type" type="text" placeholder="Type of Passport" required>-->
																		<select name="passport_type" required>
																			<option value="">- Type of Passport -</option>
																			<option value="Diplomatic dan Offcial">Diplomatic dan Offcial</option>
																			<option value="Visa Exemption">Visa Exemption</option>
																			<option value="E-Visa">E-Visa</option>
																			<option value="VOA">VOA</option>
																		</select>
																	</p>
																</div>
																<div class="row">
																	<p class="col-md-4 lbl_text"><label class="col-md-12">Passport Number</label></p>
																	<p class="col-md-8"><input name="passport" type="text" placeholder="Passport Number" required></p>
																</div>
																<div class="row">
																	<p class="col-md-4 lbl_text"><label class="col-md-12">Passport Expire Date</label></p>
																	<p class="col-md-1 col-xs-12">
																		<?php
																		$opt=array();
																		for($i=1;$i<=31;$i++) {
																			if($i < 10) $opt["0".$i] = "0".$i;
																			else $opt[$i] = $i;
																		}
																		echo form_dropdown("tgl_p",$opt);
																		?>
																	</p>
																	<p class="col-md-1 col-xs-12">
																		<?php
																		$opt=array();
																		for($i=1;$i<=12;$i++) {
																			if($i < 10) $opt["0".$i] = GetMonth($i);
																			else $opt[$i] = GetMonth($i);
																		}
																		echo form_dropdown("bln_p",$opt);
																		?>
																	</p>
																	<p class="col-md-1 col-xs-12">
																		<?php
																		$opt=array();
																		for($i=date("Y");$i<=date("Y")+15;$i++) {
																			$opt[$i] = $i;
																		}
																		echo form_dropdown("thn_p",$opt);
																		?>
																	</p>
																</div>
																<div class="row">
																	<p class="col-md-4 lbl_text"><label class="col-md-12">Passport Issuing place</label></p>
																	<p class="col-md-8">
																	<?php
																	$opt = GetOptAll("country", "- Passport Issuing place -");
																	echo form_dropdown("passport_place",$opt,"","class='negaraz' required");
																	?>
																</p>
																</div>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Citizenship</label></p>
																<p class="col-md-8">
																	<?php
																	$opt = GetOptAll("country", "- Citizenship -");
																	echo form_dropdown("kewarganegaraan",$opt,"","class='negaraz' required");
																	?>
																</p>
																<!--<p class="col-md-8"><input name="kewarganegaraan" type="text" placeholder="Firstname" required></p>-->
															</div>
															<!--<h3 style="padding:5px 15px;">FLIGHT</h3>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Flight/Estimate Time Arrival</label></p>
																<p class="col-md-8"><input type="text" placeholder="Firstname" required></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Flight/Estimate Time Departure</label></p>
																<p class="col-md-8"><input type="text" placeholder="Firstname" required></p>
															</div>-->
															<!--<div class="row">
																<p class="col-md-4"><label class="col-md-12">Upload Photo ID<br>(File only JPG/PNG, max 1 Mb)</label></p>
																<p class="col-md-8"><input type="file" name="photo" required></p>
															</div>-->
															<div class="row">
																<p class="col-md-4"><label class="col-md-12">Upload Passport / ID Card<br>(File only PDF, max 1 Mb)</label></p>
																<p class="col-md-8"><input type="file" name="ktp" required></p>
															</div>
															<div class="row">
																<p class="col-md-4"><label class="col-md-12">Duration of Stay</label></p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=1;$i<=31;$i++) {
																		if($i < 10) $opt["0".$i] = "0".$i;
																		else $opt[$i] = $i;
																	}
																	echo form_dropdown("tgl_d_s",$opt,1);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=1;$i<=12;$i++) {
																		if($i < 10) $opt["0".$i] = GetMonth($i);
																		else $opt[$i] = GetMonth($i);
																	}
																	echo form_dropdown("bln_d_s",$opt,9);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=date("Y");$i<=date("Y")+15;$i++) {
																		$opt[$i] = $i;
																	}
																	echo form_dropdown("thn_d_s",$opt);
																	?>
																</p>
																<p class="col-md-1 col-xs-12 text-center" style="padding-top:5px;"><small>to</small></p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=1;$i<=31;$i++) {
																		if($i < 10) $opt["0".$i] = "0".$i;
																		else $opt[$i] = $i;
																	}
																	echo form_dropdown("tgl_d_e",$opt,3);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=1;$i<=12;$i++) {
																		if($i < 10) $opt["0".$i] = GetMonth($i);
																		else $opt[$i] = GetMonth($i);
																	}
																	echo form_dropdown("bln_d_e",$opt,9);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=date("Y");$i<=date("Y")+15;$i++) {
																		$opt[$i] = $i;
																	}
																	echo form_dropdown("thn_d_e",$opt);
																	?>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Diatery Option</label></p>
																<p class="col-md-8">
																	<select name="dietary">
																		<option value="">- Diatery Option -</option>
																		<option value="Halal">Halal</option>
																		<option value="Gluten Free">Gluten Free</option>
																		<option value="Vegan">Vegan</option>
																		<option value="Nuts">Nuts</option>
																		<option value="No Restrictions">No Restrictions</option>
																	</select>
																</p>
															</div>
															<!--<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Hotel</label></p>
																<p class="col-md-8"><input type="text" placeholder="Firstname" required></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Side event(s) to attend</label></p>
																<p class="col-md-8"><input type="text" placeholder="Firstname" required></p>
															</div>-->
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
										            <p>Your registration accreditation request is currently being processed by the committee. Please check your email periodically</p>
															</div>
													<?php }?>
												</div>
										</div>
								</div>
						</section>
					</div>
					
					<script>
						$(".reg_type").change(function(){
							$(".type_reg").show();
							var vv = $(this).val();
							if(vv==3) {
								$(".reg_type2").val(7);
								$(".gov").show();
								$(".non_gov").hide();
								//$(".surat").show();
							} else if(vv==4) {
								$(".reg_type2").val(13);
								$(".gov").hide();
								$(".non_gov").show();
								//$(".surat").hide();
							}
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
						$(".negara").change(function(){
							if($(this).val() != 103) $(".luarnegri").show();
							else $(".luarnegri").hide();
						});
					</script>