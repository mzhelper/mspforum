<style>
td{text-align:left !important;border-top:1px solid #fff;}
.mztable {width:100%;}
.mztable td{background:#eee !important;}
</style>
<div id="content" class="no-bottom no-top">
            <div id="top"></div>
						<div><img src="<?php echo base_url()."uploads/bg_about.jpg";?>" width="100%"></div>
						<section id="section-about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="wow fadeInUp">My Account</h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <?php
                        $final = $this->session->flashdata("final");
                        if($final) {?>
                        <div class="text-center" style="box-shadow:0px 0px 25px #ccc;padding:20px;">
													<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
							                <path fill="#4caf50" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path><path fill="#ccff90" d="M34.602,14.602L21,28.199l-5.602-5.598l-2.797,2.797L21,33.801l16.398-16.402L34.602,14.602z"></path>
							            </svg>
							            <p>Your registration request is currently being processed by the committee. Please check your DAO email periodically to receive the accreditation letter</p>
												</div>
												<?php }?>
                        <div class="col-md-12 box_shadow">
													<div class="col-md-4 col-xs-12">
														<h3>Info DAO</h3>
														<?php
														$foto = file_exists("./uploads/".$mem['photo']) && $mem['photo'] ? $mem['photo'] : "foto_default.png";
														?>
														<table class="mztable zebra-striped">
															<tr>
																<td colspan="3" style="text-align:center !important;"><img src="<?php echo base_url()."uploads/".$foto;?>" width="100" style="border:1px solid #ccc;">
																	<!--<br><a href="#" style="color:blue;">Edit Profile</a></td>-->
																</td>
															</tr>
															<tr><td><b>Firstname</b></td><td>:</td><td><?php echo $mem['firstname'];?></td></tr>
															<tr><td><b>Lastname</b></td><td>:</td><td><?php echo $mem['lastname'];?></td></tr>
															<tr><td><b>Phone</b></td><td>:</td><td><?php echo str_replace(substr($mem['hp'],0,7),"*******",$mem['hp']);?></td></tr>
															<tr><td><b>Email</b></td><td>:</td><td><?php echo $mem['email'];?></td></tr>
														</table>
													</div>
													<div class="col-md-8 col-xs-12">
														<h3>List Delegate</h3>
														<?php
														$q = GetAll("member_dao", array("id_parents"=> "where/".GetIDDAO(), "is_delete"=> "where/0"));
														if($q->num_rows() > 0) {?>
															<table class="mztable zebra-striped">
																<tr><th style='color:#000;'>No</th><th style='color:#000;'>Name</th><th style='color:#000;'>Registration Type</th><th style='color:#000;'>Action</th></tr>
																<?php
																$no=1;
																$opt_type = GetOptAll("type_reg");
																foreach($q->result_array() as $r) {
																	//site_url('register/dao_edit/'.$r['uid'])
																	$link="";
																	if(!$r['is_lock']) $link = "<a href='".site_url('register/dao_delegate/'.$no)."' style='color:red;'>Edit</a> | ";
																	$link .= "<a href='".site_url('register/dao_event/'.$r['uid'])."' style='color:red;'>Add Event/Session</a>";
																	echo "<tr><td style='text-align:center !important;'>".$no."</td><td><a href='".site_url('about/profile_dao/'.$r['uid'])."' style='color:blue;'>".$r['firstname']." ".$r['lastname']."</a></td><td style='text-align:center !important;'>".$opt_type[$r['type_reg']]."</td><td style='text-align:center !important;'>".$link."</td></tr>";
																	$no++;
																}
																?>
															</table>
															<br>
														<?php }
														?>
														<div style="color:red;padding-bottom:10px;">
														*Delegates can only attend chosen events (click "Add event/session" to select)<br>
														**The approved list of events can be seen by clicking the name of each delegate<br>
														***If Delegation Accreditation Officers are to participate in the event, they are also required to complete their own forms
														</div>
														<?php if(!$r['is_lock']) {?>
														<button class="btn-large btn-style1 merah add_side" type="button" style="margin-right:40px;border:0px;width:150px;float:none !important;">Add Delegate</button>
														<button class="btn-large btn-style1 hijau final" type="button" style="border:0px;width:150px;float:none !important;">Final Submission</button>
														<?php }?>
													</div>
												</div>
										</div>
								</div>
						</section>
					</div>
					
					<script>
						$(".add_side").click(function(){
							window.location="<?php echo site_url('register/dao_delegate');?>";
						});
						$(".final").click(function(){
							var conf = confirm("Confirm final submission?\n*Submitted data are not subject to changes");
							if(conf) {
								window.location="<?php echo site_url('register/dao_final');?>";
							}
						});
					</script>