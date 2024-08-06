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
                            <h2 class="wow fadeInUp">Registration Delegate</h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <div class="col-md-12">
                        	<?php
                        	$typez_reg = GetValue("title","type_reg",array("id"=> "where/".$mem['type_reg']));
                        	if($mem['type_reg2']) $typez_reg .= " - ".GetValue("title","type_reg",array("id"=> "where/".$mem['type_reg2']));
                        	?>
													<form action="<?php echo site_url('register/submit_dao_edit');?>" method="post" enctype="multipart/form-data" id="registration-form" style="box-shadow:0px 0px 25px #ccc;padding:20px;">
														<input type="hidden" name="uid" value="<?php echo $mem['uid'];?>">
														<input type="hidden" name="urutan" value="<?php echo $param;?>">
														<?php
														if($err) {?>
															<div class="row">
																<div class="col-md-12 lbl_text">
																	<label class="col-md-12 hijau">
																		<?php echo $err;?>
																	</label>
																</div>
															</div>
														<?php }
														$opt_del=array();
														for($i=1;$i<$ke;$i++) {
															$opt_del[$i] = $i;
														}
														$opt_del[0] = "Add";
														?>
														<div class="row">
															<p class="col-md-12 lbl_text"><h3 style="padding-left:30px;">Delegate <?php echo form_dropdown("dao_member",$opt_del,$param,"class='ganti_del' style='width:70px;'");?></h3></p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Registration Type *</label></p>
															<p class="col-md-8">
																<select name="reg_type" class="reg_type" required>
																	<option value="">- Registration Type -</option>
																	<option value="3" <?php echo isset($mem['reg_type']) && $mem['reg_type']==3 ? "selected" : "";?>>Government</option>
																	<option value="4" <?php echo isset($mem['reg_type']) && $mem['reg_type']==4 ? "selected" : "";?>>Non-Government</option>
																</select>
															</p>
														</div>
														<div class="row type_reg">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Delegation Types *</label></p>
															<p class="col-md-8">
																<select name="type_reg" class="reg_type2" required>
																	<option value="">- Delegation Type -</option>
																	<option value="7" class="gov" <?php echo $mem['type_reg']==7 ? "selected" : "";?>>Head of State</option>
																	<option value="8" class="gov" <?php echo $mem['type_reg']==8 ? "selected" : "";?>>Head of Delegation</option>
																	<option value="5" class="gov" <?php echo $mem['type_reg']==5 ? "selected" : "";?>>DAO</option>
																	<option value="6" class="gov" <?php echo $mem['type_reg']==6 ? "selected" : "";?>>Delegates</option>
																	<option value="17" class="gov" <?php echo $mem['type_reg']==17 ? "selected" : "";?>>Security Officers</option>
																	<option value="13" class="non_gov" <?php echo $mem['type_reg']==13 ? "selected" : "";?>>International Organization</option>
																	<option value="18" class="non_gov" <?php echo $mem['type_reg']==18 ? "selected" : "";?>>Multilateral Development Bank</option>
																</select>
															</p>
														</div>
														<div class="row type_reg">
															<p class="col-md-4 lbl_text"><label class="col-md-12">&nbsp;</label></p>
															<p class="col-md-8">
																<select name="type_reg2" class="reg_type3" required>
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
																	<option value="H.E" <?php echo $mem['prefix']=="H.E" ? "selected" : "";?>>H.E</option>
																	<option value="Rt. Hon" <?php echo $mem['prefix']=="Rt. Hon" ? "selected" : "";?>>Rt. Hon</option>
																	<option value="Honorable" <?php echo $mem['prefix']=="Honorable" ? "selected" : "";?>>Honorable</option>
																	<option value="H.M" <?php echo $mem['prefix']=="H.M" ? "selected" : "";?>>H.M</option>
																	<option value="Mr" <?php echo $mem['prefix']=="Mr" ? "selected" : "";?>>Mr</option>
																	<option value="Mrs" <?php echo $mem['prefix']=="Mrs" ? "selected" : "";?>>Mrs</option>
																	<option value="Ms" <?php echo $mem['prefix']=="Ms" ? "selected" : "";?>>Ms</option>
																	<option value="Dr" <?php echo $mem['prefix']=="Dr" ? "selected" : "";?>>Dr</option>
																</select>
															</p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">First Name *</label></p>
															<p class="col-md-8"><input name="firstname" type="text" placeholder="First Name" value="<?php echo $mem['firstname'];?>" required></p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Last/Family Name *</label></p>
															<p class="col-md-8"><input name="lastname" type="text" placeholder="Last/Family Name" value="<?php echo $mem['lastname'];?>" required></p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Preferred name (for ID Badge) *</label></p>
															<p class="col-md-8"><input name="certname" type="text" placeholder="Preferred name (for ID Badge)" value="<?php echo $mem['certname'];?>" required></p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Sex *</label></p>
															<p class="col-md-8">
																<select name="gender" required>
																	<option value="">- Sex -</option>
																	<option value="Male" <?php echo $mem['gender']=="Male" ? "selected" : "";?>>Male</option>
																	<option value="Female" <?php echo $mem['gender']=="Female" ? "selected" : "";?>>Female</option>
																</select>
															</p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Place of Birth</label></p>
															<p class="col-md-8">
																<input name="pob" type="text" placeholder="Place of Birth" value="<?php echo $mem['pob'];?>">
															</p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Date of Birth *</label></p>
															<p class="col-md-1 col-xs-12">
																<?php
																$dob = explode("-",$mem['dob']);
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
																echo form_dropdown("kewarganegaraan",$opt,$mem['kewarganegaraan'],"class='negaraz' required");
																?>
															</p>
															<!--<p class="col-md-8"><input name="kewarganegaraan" type="text" placeholder="Firstname" required></p>-->
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Country of Residence *</label></p>
															<p class="col-md-8">
																<?php
																$opt = GetOptAll("country", "- Country of Residence -");
																echo form_dropdown("id_country",$opt,$mem['id_country'],"class='negaraz' required");
																?>
															</p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Institution *</label></p>
															<p class="col-md-8"><input name="institusi" type="text" placeholder="Institution" value="<?php echo $mem['institusi'];?>" required></p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Position *</label></p>
															<p class="col-md-8"><input name="designation" type="text" placeholder="Position" value="<?php echo $mem['designation'];?>" required></p>
														</div>														
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Phone Number *</label></p>
															<p class="col-md-2">
																<?php
																$concode=$hp="";
																if($mem['hp']) {
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
																echo form_dropdown("countrycode",$opt_cc,$concode,"required");
																?>
															</p>
															<p class="col-md-6"><input name="hp" type="text" placeholder="Phone Number" value="<?php echo $hp;?>" required></p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">E-Mail *</label></p>
															<p class="col-md-8">
																<input name="email" id="email" type="text" placeholder="E-Mail" value="<?php echo $mem['email'];?>" required>
																<label class="error_e" style="display:none;color:red;">Please enter a valid email address.</label>
															</p>
														</div>
														<div class="luarnegriz">
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Passport Type *</label></p>
																<p class="col-md-8">
																	<select name="passport_type" required>
																		<option value="">- Type of Passport -</option>
																		<option value="Diplomatic passport" <?php echo isset($mem['passport_type']) && $mem['passport_type']=="Diplomatic passport" ? "selected" : "";?>>Diplomatic passport</option>
																		<option value="Service passport" <?php echo isset($mem['passport_type']) && $mem['passport_type']=="Service passport" ? "selected" : "";?>>Service passport</option>
																		<option value="Ordinary Passport" <?php echo isset($mem['passport_type']) && $mem['passport_type']=="Ordinary Passport" ? "selected" : "";?>>Ordinary Passport</option>
																	</select>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Passport Number *</label></p>
																<p class="col-md-8"><input name="passport" type="text" placeholder="Passport Number" value="<?php echo $mem['passport'];?>" required></p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Passport Expire Date *</label></p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$pe = explode("-",$mem['passport_exp']);
																	$opt=array();
																	for($i=1;$i<=31;$i++) {
																		if($i < 10) $opt["0".$i] = "0".$i;
																		else $opt[$i] = $i;
																	}
																	echo form_dropdown("tgl_p",$opt,$pe[2]);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=1;$i<=12;$i++) {
																		if($i < 10) $opt["0".$i] = GetMonth($i);
																		else $opt[$i] = GetMonth($i);
																	}
																	echo form_dropdown("bln_p",$opt,$pe[1]);
																	?>
																</p>
																<p class="col-md-1 col-xs-12">
																	<?php
																	$opt=array();
																	for($i=date("Y");$i<=date("Y")+15;$i++) {
																		$opt[$i] = $i;
																	}
																	echo form_dropdown("thn_p",$opt,$pe[0]);
																	?>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Passport Issuance *</label></p>
																<p class="col-md-8">
																	<?php
																	$opt = GetOptAll("country", "- Passport Issuing place -");
																	echo form_dropdown("passport_place",$opt,$mem['passport_place'],"class='negaraz' required");
																	?>
																</p>
															</div>
															<div class="row">
																<p class="col-md-4 lbl_text"><label class="col-md-12">Visa Type</label></p>
																<p class="col-md-8">
																	<select name="visa_type" required>
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
															<p class="col-md-4"><label class="col-md-12">Upload Photo *<br>(File only JPG/PNG, max 1 Mb)</label></p>
															<p class="col-md-8"><input type="file" name="photo"><br>
																<img src="<?php echo base_url()."uploads/".$mem['photo'];?>">
															</p>
														</div>
														<div class="row">
															<p class="col-md-4"><label class="col-md-12">Upload Passport File *<br>(File only PDF, max 1 Mb)</label></p>
															<p class="col-md-8"><input type="file" name="ktp"><br>
																<img src="<?php echo base_url()."uploads/".$mem['ktp'];?>">
															</p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Hotel</label></p>
															<p class="col-md-8"><input name="hotel" type="text" placeholder="Hotel" value="<?php echo $mem['hotel'];?>"></p>
														</div>
														<div class="row">
															<p class="col-md-4"><label class="col-md-12">Arrival Date</label></p>
															<p class="col-md-1 col-xs-12">
																<?php
																$ss = explode("-",$mem['stay_start']);
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
																$opt=array();
																for($i=1;$i<=12;$i++) {
																	if($i < 10) $opt["0".$i] = GetMonth($i);
																	else $opt[$i] = GetMonth($i);
																}
																echo form_dropdown("bln_d_s",$opt,$ss[1]);
																?>
															</p>
															<p class="col-md-1 col-xs-12">
																<?php
																$opt=array();
																for($i=date("Y");$i<=date("Y")+15;$i++) {
																	$opt[$i] = $i;
																}
																echo form_dropdown("thn_d_s",$opt,$ss[0]);
																?>
															</p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Arrival Flight Number</label></p>
															<p class="col-md-8"><input name="afn" type="text" placeholder="Arrival Flight Number" value="<?php echo $mem['afn'];?>"></p>
														</div>
														<div class="row">
															<p class="col-md-4"><label class="col-md-12">Departure Date</label></p>
															<p class="col-md-1 col-xs-12">
																<?php
																$se = explode("-",$mem['stay_end']);
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
																$opt=array();
																for($i=1;$i<=12;$i++) {
																	if($i < 10) $opt["0".$i] = GetMonth($i);
																	else $opt[$i] = GetMonth($i);
																}
																echo form_dropdown("bln_d_e",$opt,$se[1]);
																?>
															</p>
															<p class="col-md-1 col-xs-12">
																<?php
																$opt=array();
																for($i=date("Y");$i<=date("Y")+15;$i++) {
																	$opt[$i] = $i;
																}
																echo form_dropdown("thn_d_e",$opt,$se[0]);
																?>
															</p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Departure Flight Number</label></p>
															<p class="col-md-8"><input name="dfn" type="text" placeholder="Departure Flight Number" value="<?php echo $mem['dfn'];?>"></p>
														</div>
														<div class="row">
															<p class="col-md-4 lbl_text"><label class="col-md-12">Dietary Restrictions</label></p>
															<p class="col-md-8">
																<select name="dietary">
																	<option value="">- Diatery Restrictions -</option>
																	<option value="Halal" <?php echo $mem['dietary']=="Halal" ? "selected" : "";?>>Halal</option>
																	<option value="Gluten Free" <?php echo $mem['dietary']=="Gluten Free" ? "selected" : "";?>>Gluten Free</option>
																	<option value="Vegan" <?php echo $mem['dietary']=="Vegan" ? "selected" : "";?>>Vegan</option>
																	<option value="Nuts" <?php echo $mem['dietary']=="Nuts" ? "selected" : "";?>>Nuts</option>
																	<option value="No Restrictions" <?php echo $mem['dietary']=="No Restrictions" ? "selected" : "";?>>No Restrictions</option>
																</select>
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
																<p><button class="btn-large btn-style1 merah" name="btn_finish" value="1" type="submit" style="margin-right:0px;margin-top:20px;border:0px;width:150px;">SUBMIT</button>
																	<!--<span style='display: inline-block;margin-top: 40px !important;padding:0px 20px;'>OR</span>
																<button class="btn-large btn-style1 merah" name="btn_next" value="1" type="submit" style="margin-right:0px;margin-top:20px;border:0px;width:250px;">NEXT DELEGATE</button>-->
																</p>
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
						var vv = "<?php echo $mem['reg_type'];?>";
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
						$(".ganti_del").change(function(){
							window.location="<?php echo site_url('register/dao_delegate/"+$(this).val()+"');?>";
						});
					</script>