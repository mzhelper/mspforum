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
                            <h2 class="wow fadeInUp">Registration DAO</h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <div class="col-md-12">
                        	<?php
                        	$typez_reg = GetValue("title","type_reg",array("id"=> "where/".$mem['type_reg']));
                        	if($mem['type_reg2']) $typez_reg .= " - ".GetValue("title","type_reg",array("id"=> "where/".$mem['type_reg2']));
                        	if($param != "ok") {?>
														<form action="<?php echo site_url('register/submit_dao');?>" method="post" enctype="multipart/form-data" id="registration-form" style="box-shadow:0px 0px 25px #ccc;padding:20px;">
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
																	<!--<select class="reg_type" requiredz>
																		<option value="">- Registration Type -</option>
																		<option value="3">Government</option>
																		<option value="4">Non-Government</option>
																	</select>-->
																</p>
															</div>
															<!--<div class="row type_reg" style="display:none;">
																<p class="col-md-4 lbl_text"><label class="col-md-12">&nbsp;</label></p>
																<p class="col-md-8">
																	<select name="type_reg" class="reg_type2" requiredz>
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
																	<select name="type_reg2" class="reg_type3" requiredz>
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
																<p class="col-md-4 lbl_text"><label class="col-md-12">Sex</label></p>
																<p class="col-md-8">
																	<select name="gender" requiredz>
																		<option value="">- Sex -</option>
																		<option value="Male" <?php echo isset($mem['gender']) && $mem['gender']=="Male" ? "selected" : "";?>>Male</option>
																		<option value="Female" <?php echo isset($mem['gender']) && $mem['gender']=="Female" ? "selected" : "";?>>Female</option>
																	</select>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Phone Number</label></p>
																<p class="col-md-2">
																	<?php
																	$concode=$hp="";
																	if(isset($mem['hp'])) {
																		$exp=explode(" ",$mem['hp']);
																		foreach($exp as $k=> $e) {
																			if($k==0) $concode = $e;
																			else $hp .= $e;
																		}									
																	}
																	$opt_cc=array();
																	$qq = GetAll("countrycode");
																	foreach($qq->result_array() as $rr) {
																		$opt_cc[$rr['code']] = $rr['country']." - ".$rr['code'];
																	}
																	echo form_dropdown("countrycode",$opt_cc,$concode,"requiredz");
																	?>
																</p>
																<p class="col-md-6"><input name="hp" type="text" placeholder="Phone Number" value="<?php echo $hp;?>" requiredz></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">E-Mail</label></p>
																<p class="col-md-8">
																	<input name="email" id="email" type="text" placeholder="E-Mail" value="<?php echo $mem['email'];?>">
																	<label class="error_e" style="display:none;color:red;">Please enter a valid email address.</label>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Ministry/Institution/Organization</label></p>
																<p class="col-md-8"><input name="institusi" type="text" placeholder="Ministry/Institution/Organization" value="<?php echo $mem['institusi'];?>" requiredz></p>
															</div>
															<!--<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Country</label></p>
																<p class="col-md-8">
																	<?php
																	$opt = GetOptAll("country", "- Country -");
																	echo form_dropdown("id_country",$opt,"","class='negaraz' requiredz");
																	?>
																</p>
															</div>-->
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Designation</label></p>
																<p class="col-md-8"><input name="designation" type="text" placeholder="Designation" value="<?php echo $mem['designation'];?>" requiredz></p>
															</div>
															<div class="luarnegriz">
																<div class="row">
																	<p class="col-md-4 lbl_text"><label class="col-md-12">Type of Passport</label></p>
																	<p class="col-md-8">
																		<!--<input name="passport_type" type="text" placeholder="Type of Passport" requiredz>-->
																		<select name="passport_type" requiredz>
																			<option value="">- Type of Passport -</option>
																			<option value="Reguler passport" <?php echo isset($mem['passport_type']) && $mem['passport_type']=="Reguler passport" ? "selected" : "";?>>Reguler passport</option>
																			<option value="Services passport" <?php echo isset($mem['passport_type']) && $mem['passport_type']=="Services passport" ? "selected" : "";?>>Services passport</option>
																			<option value="Diplomatic passport" <?php echo isset($mem['passport_type']) && $mem['passport_type']=="Diplomatic passport" ? "selected" : "";?>>Diplomatic passport</option>
																		</select>
																	</p>
																</div>
																<div class="row">
																	<p class="col-md-4 lbl_text"><label class="col-md-12">Passport Number</label></p>
																	<p class="col-md-8"><input name="passport" type="text" placeholder="Passport Number" value="<?php echo $mem['passport'];?>" requiredz></p>
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
																		echo form_dropdown("passport_place",$opt,$mem['passport_place'],"class='negaraz' requiredz");
																		?>
																	</p>
																</div>
																<div class="row">
																	<p class="col-md-4 lbl_text"><label class="col-md-12">Visa Type</label></p>
																	<p class="col-md-8">
																		<select name="visa_type" requiredz>
																			<option value="">- Visa Type -</option>
																			<option value="Diplomatic and Official" <?php echo isset($mem['visa_type']) && $mem['visa_type']=="Diplomatic and Official" ? "selected" : "";?>>Diplomatic and Official</option>
																			<option value="Visa Exemption" <?php echo isset($mem['visa_type']) && $mem['visa_type']=="Visa Exemption" ? "selected" : "";?>>Visa Exemption</option>
																			<option value="E-Visa" <?php echo isset($mem['visa_type']) && $mem['visa_type']=="E-Visa" ? "selected" : "";?>>E-Visa</option>
																			<option value="VOA" <?php echo isset($mem['visa_type']) && $mem['visa_type']=="VOA" ? "selected" : "";?>>VOA</option>
																			<option value="Calling Visa" <?php echo isset($mem['visa_type']) && $mem['visa_type']=="Calling Visa" ? "selected" : "";?>>Calling Visa</option>
																		</select>
																	</p>
																</div>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Citizenship</label></p>
																<p class="col-md-8">
																	<?php
																	$opt = GetOptAll("country", "- Citizenship -");
																	echo form_dropdown("kewarganegaraan",$opt,$mem['kewarganegaraan'],"class='negaraz' requiredz");
																	?>
																</p>
																<!--<p class="col-md-8"><input name="kewarganegaraan" type="text" placeholder="Firstname" requiredz></p>-->
															</div>
															<!--<h3 style="padding:5px 15px;">FLIGHT</h3>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Flight/Estimate Time Arrival</label></p>
																<p class="col-md-8"><input type="text" placeholder="Firstname" requiredz></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Flight/Estimate Time Departure</label></p>
																<p class="col-md-8"><input type="text" placeholder="Firstname" requiredz></p>
															</div>-->
															<div class="row">
																<p class="col-md-4"><label class="col-md-12">Upload Photo ID<br>(File only JPG/PNG, max 1 Mb)</label></p>
																<p class="col-md-8">
																	<input type="file" name="photo" requiredz>
																	<input type="hidden" name="photo_old" value="<?php echo $mem['photo'];?>">
																</p>
															</div>
															<div class="row">
																<p class="col-md-4"><label class="col-md-12">Upload Passport / ID Card<br>(File only PDF, max 1 Mb)</label></p>
																<p class="col-md-8">
																	<input type="file" name="ktp" requiredz>
																	<input type="hidden" name="ktp_old" value="<?php echo $mem['ktp'];?>">
																</p>
															</div>
															<!--<div class="row">
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
															</div>-->
															<div class="row">
																<p class="col-md-4 lbl_text"></p>
																<div class="col-md-8">
																	<div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('site_key');?>"></div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12" style="text-align:center;">
																	<p><button class="btn-large btn-style1 merah" name="btn_finish" value="1" type="submit" style="margin-right:0px;margin-top:20px;border:0px;width:150px;">SUBMIT & FINISH</button> <span style='display: inline-block;vertical-align: top;margin-top: 40px !important;padding:0px 20px;'>OR</span>
																	<button class="btn-large btn-style1 merah" name="btn_next" value="1" type="submit" style="margin-right:0px;margin-top:20px;border:0px;width:250px;">SUBMIT &<br>NEXT DELEGATE</button></p>
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
										            <p>SUCCESS</p>
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