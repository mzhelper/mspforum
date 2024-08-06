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
																<p class="col-md-4 lbl_text"><label class="col-md-12">Registration Type *</label></p>
																<p class="col-md-8">
																	<!--<input type="text" value="<?php echo $typez_reg;?>">-->
																	<select name="reg_type" class="reg_type" required disabled readonly>
																		<option value="3" <?php echo isset($mem['reg_type']) && $mem['reg_type']==3 ? "selected" : "";?>>Government</option>
																		<option value="4" <?php echo isset($mem['reg_type']) && $mem['reg_type']==4 ? "selected" : "";?>>Non-Government</option>
																	</select>
																</p>
															</div>
															<div class="row type_reg">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Delegation Types *</label></p>
																<p class="col-md-8">
																	<select name="type_reg" class="reg_type2" required disabled readonly>
																		<option value="7" class="gov" <?php echo $mem['type_reg']==7 ? "selected" : "";?>>Head of State</option>
																		<option value="8" class="gov" <?php echo $mem['type_reg']==8 ? "selected" : "";?>>Head of Delegation</option>
																		<option value="17" class="gov" <?php echo $mem['type_reg']==17 ? "selected" : "";?>>Security Officers</option>
																		<option value="13" class="non_gov" <?php echo $mem['type_reg']==13 ? "selected" : "";?>>International Organization</option>
																		<option value="14" class="non_gov" <?php echo $mem['type_reg']==14 ? "selected" : "";?>>Non-Government Organization/Civil Society Organization</option>
																		<option value="15" class="non_gov" <?php echo $mem['type_reg']==15 ? "selected" : "";?>>Private Sector</option>
																		<option value="16" class="non_gov" <?php echo $mem['type_reg']==16 ? "selected" : "";?>>Philantrophy</option>
																		<option value="19" class="non_gov" <?php echo $mem['type_reg']==19 ? "selected" : "";?>>Think Tank/Academician</option>
																		<option value="18" class="non_gov" <?php echo $mem['type_reg']==18 ? "selected" : "";?>>Multilateral Development Bank</option>
																	</select>
																</p>
															</div>
															<div class="row type_reg">
																<p class="col-md-4 lbl_text"><label class="col-md-12">&nbsp;</label></p>
																<p class="col-md-8">
																	<select name="type_reg2" class="reg_type3" required disabled readonly>
																		<option value="12" <?php echo $mem['type_reg2']==12 ? "selected" : "";?>>Participant</option>
																		<option value="10" <?php echo $mem['type_reg2']==10 ? "selected" : "";?>>Speakers</option>
																		<option value="11" <?php echo $mem['type_reg2']==11 ? "selected" : "";?>>Moderator</option>
																	</select>
																</p>
															</div>
															<div class="row type_reg">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Prefix *</label></p>
																<p class="col-md-8">
																	<select name="prefix" required>
																		<option value="">- Prefix -</option>
																		<option value="H.E" <?php echo $ses_mem['prefix']=="H.E" ? "selected" : "";?>>H.E</option>
																		<option value="Rt. Hon" <?php echo $ses_mem['prefix']=="Rt. Hon" ? "selected" : "";?>>Rt. Hon</option>
																		<option value="Honorable" <?php echo $ses_mem['prefix']=="Honorable" ? "selected" : "";?>>Honorable</option>
																		<option value="H.M" <?php echo $ses_mem['prefix']=="H.M" ? "selected" : "";?>>H.M</option>
																		<option value="Mr" <?php echo $ses_mem['prefix']=="Mr" ? "selected" : "";?>>Mr</option>
																		<option value="Mrs" <?php echo $ses_mem['prefix']=="Mrs" ? "selected" : "";?>>Mrs</option>
																		<option value="Ms" <?php echo $ses_mem['prefix']=="Ms" ? "selected" : "";?>>Ms</option>
																		<option value="Dr" <?php echo $ses_mem['prefix']=="Dr" ? "selected" : "";?>>Dr</option>
																	</select>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Firstname *</label></p>
																<p class="col-md-8"><input name="firstname" type="text" placeholder="Firstname" value="<?php echo $mem['firstname'];?>" disabled readonly></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Lastname *</label></p>
																<p class="col-md-8"><input name="lastname" type="text" placeholder="Lastname" value="<?php echo $mem['lastname'];?>" disabled readonly></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Preferred name (for ID Badge) *</label></p>
																<p class="col-md-8"><input name="certname" type="text" placeholder="Preferred name (for ID Badge)" value="<?php echo $ses_mem['certname'];?>" required></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Sex *</label></p>
																<p class="col-md-8">
																	<select name="gender" required>
																		<option value="">- Sex -</option>
																		<option value="Male" <?php echo $ses_mem['gender']=="Male" ? "selected" : "";?>>Male</option>
																		<option value="Female" <?php echo $ses_mem['gender']=="Female" ? "selected" : "";?>>Female</option>
																	</select>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Place of Birth</label></p>
																<p class="col-md-8">
																	<input name="pob" type="text" placeholder="Place of Birth" value="<?php echo $ses_mem['pob'];?>">
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Date of Birth *</label></p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$dob = explode("-",$ses_mem['dob']);
																	$opt=array();
																	for($i=1;$i<=31;$i++) {
																		if($i < 10) $opt["0".$i] = "0".$i;
																		else $opt[$i] = $i;
																	}
																	echo form_dropdown("tgl",$opt,$dob[2]);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=1;$i<=12;$i++) {
																		if($i < 10) $opt["0".$i] = GetMonth($i);
																		else $opt[$i] = GetMonth($i);
																	}
																	echo form_dropdown("bln",$opt,$dob[1]);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	if(!$dob[0]) $dob[0]=1970;
																	$opt=array();
																	for($i=1930;$i<=date("Y")-17;$i++) {
																		$opt[$i] = $i;
																	}
																	echo form_dropdown("thn",$opt,$dob[0]);
																	?>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Nationality *</label></p>
																<p class="col-md-8">
																	<?php
																	$opt = GetOptAll("country", "- Nationality -");
																	echo form_dropdown("kewarganegaraan",$opt,$ses_mem['kewarganegaraan'],"class='negaraz' required");
																	?>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Country of Residence *</label></p>
																<p class="col-md-8">
																	<?php
																	$opt = GetOptAll("country", "- Country of Residence -");
																	echo form_dropdown("id_country",$opt,$ses_mem['id_country'],"class='negaraz' required");
																	?>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Institution *</label></p>
																<p class="col-md-8"><input name="institusi" type="text" placeholder="Institution" value="<?php echo $mem['institusi'];?>" disabled readonly></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Position *</label></p>
																<p class="col-md-8"><input name="designation" type="text" placeholder="Position" value="<?php echo $mem['designation'];?>" disabled readonly></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Phone Number *</label></p>
																<p class="col-md-2">
																	<?php
																	$concode=$hp="";
																	if($ses_mem['hp']) {
																		$exp=explode(" ",$ses_mem['hp']);
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
																	echo form_dropdown("countrycode",$opt_cc,$concode,"required");
																	?>
																</p>
																<p class="col-md-6"><input name="hp" type="text" placeholder="Phone Number" maxlength="15" value="<?php echo $hp;?>" required></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">E-Mail *</label></p>
																<p class="col-md-8">
																	<input name="email" id="email" type="text" placeholder="E-Mail" disabled readonly value="<?php echo $mem['email'];?>" >
																	<label class="error_e" style="display:none;color:red;">Please enter a valid email address.</label>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Type of Identification *</label></p>
																<p class="col-md-8">
																	<select name="type_id" class="type_id" required>
																		<option value="">- Type of Identification -</option>
																		<option value="1" <?php echo $ses_mem['type_id']==1 ? "selected" : "";?>>Indonesian National ID (KTP)</option>
																		<option value="2" <?php echo $ses_mem['type_id']==2 ? "selected" : "";?>>Passport</option>
																	</select>
																</p>
															</div>
															<div class="luarnegriz">
																<div class="row">
																	<p class="col-md-4 lbl_text"><label class="col-md-12">Type of Passport *</label></p>
																	<p class="col-md-8">
																		<select name="passport_type">
																			<option value="">- Type of Passport -</option>
																			<option value="Diplomatic passport" <?php echo isset($ses_mem['passport_type']) && $ses_mem['passport_type']=="Diplomatic passport" ? "selected" : "";?>>Diplomatic passport</option>
																			<option value="Service passport" <?php echo isset($ses_mem['passport_type']) && $ses_mem['passport_type']=="Service passport" ? "selected" : "";?>>Service passport</option>
																			<option value="Ordinary Passport" <?php echo isset($ses_mem['passport_type']) && $ses_mem['passport_type']=="Ordinary Passport" ? "selected" : "";?>>Ordinary Passport</option>
																		</select>
																	</p>
																</div>
															</div>
																<div class="row">
																	<p class="col-md-4 lbl_text"><label class="col-md-12 lbl_passport">ID Number *</label></p>
																	<p class="col-md-8"><input name="passport" type="text" class="lbl_passport" maxlength="16" value="<?php echo $ses_mem['passport'];?>" placeholder="ID Number" required></p>
																</div>
															<div class="luarnegriz">
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
																	<p class="col-md-4 lbl_text"><label class="col-md-12">Passport Issuance *</label></p>
																	<p class="col-md-8">
																		<?php
																		$opt = GetOptAll("country", "- Passport Issuing place -");
																		echo form_dropdown("passport_place",$opt,$ses_mem['passport_place'],"class='negaraz'");
																		?>
																	</p>
																</div>
																<div class="row">
																	<p class="col-md-4 lbl_text"><label class="col-md-12">Visa Type *</label></p>
																	<p class="col-md-8">
																		<select name="visa_type">
																			<option value="">- Visa Type -</option>
																			<option value="Diplomatic and Official" <?php echo isset($ses_mem['visa_type']) && $ses_mem['visa_type']=="Diplomatic and Official" ? "selected" : "";?>>Diplomatic and Official</option>
																			<option value="Visa Exemption" <?php echo isset($ses_mem['visa_type']) && $ses_mem['visa_type']=="Visa Exemption" ? "selected" : "";?>>Visa Exemption</option>
																			<option value="E-Visa" <?php echo isset($ses_mem['visa_type']) && $ses_mem['visa_type']=="E-Visa" ? "selected" : "";?>>E-Visa</option>
																			<option value="VOA" <?php echo isset($ses_mem['visa_type']) && $ses_mem['visa_type']=="VOA" ? "selected" : "";?>>VOA</option>
																			<option value="Calling Visa" <?php echo isset($ses_mem['visa_type']) && $ses_mem['visa_type']=="Calling Visa" ? "selected" : "";?>>Calling Visa</option>
																		</select>
																	</p>
																</div>
															</div>
															<div class="row">
																<p class="col-md-4"><label class="col-md-12 lbl_passport_file">Scan KTP Upload *<br>(max size 1 MB, PDF)</label></p>
																<p class="col-md-8"><input type="file" name="ktp" required></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Hotel</label></p>
																<p class="col-md-8"><input name="hotel" type="text" placeholder="Hotel" value="<?php echo $ses_mem['hotel'];?>"></p>
															</div>
															<div class="row">
																<p class="col-md-4"><label class="col-md-12">Arrival Date</label></p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$ss = explode("-",$ses_mem['stay_start']);
																	$opt=array();
																	for($i=1;$i<=31;$i++) {
																		if($i < 10) $opt["0".$i] = "0".$i;
																		else $opt[$i] = $i;
																	}
																	echo form_dropdown("tgl_d_s",$opt,$ss[2]);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	if(!$ss[1]) $ss[1] = 8;
																	$opt=array();
																	for($i=8;$i<=10;$i++) {
																		if($i < 10) $opt["0".$i] = GetMonth($i);
																		else $opt[$i] = GetMonth($i);
																	}
																	echo form_dropdown("bln_d_s",$opt,$ss[1]);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=date("Y");$i<=date("Y");$i++) {
																		$opt[$i] = $i;
																	}
																	echo form_dropdown("thn_d_s",$opt,$ss[0]);
																	?>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Arrival Flight Number</label></p>
																<p class="col-md-8"><input name="afn" type="text" placeholder="Arrival Flight Number" value="<?php echo $ses_mem['afn'];?>"></p>
															</div>
															<div class="row">
																<p class="col-md-4"><label class="col-md-12">Departure Date</label></p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$se = explode("-",$ses_mem['stay_end']);
																	$opt=array();
																	for($i=1;$i<=31;$i++) {
																		if($i < 10) $opt["0".$i] = "0".$i;
																		else $opt[$i] = $i;
																	}
																	echo form_dropdown("tgl_d_e",$opt,$se[2]);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	if(!$se[1]) $se[1] = 8;
																	$opt=array();
																	for($i=8;$i<=12;$i++) {
																		if($i < 10) $opt["0".$i] = GetMonth($i);
																		else $opt[$i] = GetMonth($i);
																	}
																	echo form_dropdown("bln_d_e",$opt,$se[1]);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=date("Y");$i<=date("Y");$i++) {
																		$opt[$i] = $i;
																	}
																	echo form_dropdown("thn_d_e",$opt,$se[0]);
																	?>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Departure Flight Number</label></p>
																<p class="col-md-8"><input name="dfn" type="text" placeholder="Departure Flight Number" value="<?php echo $ses_mem['dfn'];?>"></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Diatery Option</label></p>
																<p class="col-md-8">
																	<select name="dietary">
																		<option value="">- Diatery Restrictions -</option>
																		<option value="Halal" <?php echo $ses_mem['dietary']=="Halal" ? "selected" : "";?>>Halal</option>
																		<option value="Gluten Free" <?php echo $ses_mem['dietary']=="Gluten Free" ? "selected" : "";?>>Gluten Free</option>
																		<option value="Vegan" <?php echo $ses_mem['dietary']=="Vegan" ? "selected" : "";?>>Vegan</option>
																		<option value="Nuts" <?php echo $ses_mem['dietary']=="Nuts" ? "selected" : "";?>>Nuts</option>
																		<option value="No Restrictions" <?php echo $ses_mem['dietary']=="No Restrictions" ? "selected" : "";?>>No Restrictions</option>
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
										            <p>Your registration request is currently being processed by the committee. Please check your email periodically</p>
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
						
						var type_idz = "<?php echo $ses_mem['type_id'];?>";
						if(type_idz==2) $(".luarnegriz").show();
						else $(".luarnegriz").hide();
						label_pass(type_idz);
						$(".type_id").change(function(){
							if($(this).val()!=2) $(".luarnegriz").hide();
							else $(".luarnegriz").show();
							label_pass($(this).val());
						});
						
						function label_pass(idx=0) {
							if(idx==2) {
								$(".lbl_passport").html("Passport Number *");
								$(".lbl_passport_file").html("Passport File *<br>(max size 1 MB, PDF)");
							} else {
								$(".lbl_passport").html("ID Number *");
								$(".lbl_passport_file").html("Scan KTP Upload *<br>(max size 1 MB, PDF)");
							}
						}
					</script>