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
                        <div class="col-md-12 box_shadow">
													<!--<div class="inner-title line-bottom do_mb"><h2 class="title">Welcome <?php echo $this->session->userdata("msp_name");?></h2></div>-->
													<div class="col-md-6 col-xs-12">
														<h3>Personal Info</h3>
														<?php
														$foto = file_exists("./uploads/".$mem['photo']) && $mem['photo'] ? $mem['photo'] : "foto_default.png";
														?>
														<table class="mztable zebra-striped">
															<tr>
																<td colspan="3" style="text-align:center !important;"><img src="<?php echo base_url()."uploads/".$foto;?>" width="100" style="border:1px solid #ccc;">
																	<!--<br><a href="#" style="color:blue;">Edit Profile</a></td>-->
																</td>
															</tr>
															<tr><td><b>Name</b></td><td>:</td><td><?php echo $mem['firstname']." ".$mem['lastname'];?>&nbsp;[<a href="<?php echo site_url('register/profile');?>" style="color:blue;">Edit Profile</a>]</td></tr>
															<tr><td><b>Email</b></td><td>:</td><td><?php echo $mem['email'];?></td></tr>
															<tr><td><b>Bio</b></td><td>:</td><td><?php echo nl2br($mem['bio']);?></td></tr>
															<?php
															if($mem['lastname']) {?>
															<tr><td><b>Phone Number</b></td><td>:</td><td><?php echo str_replace(substr($mem['hp'],0,7),"*******",$mem['hp']);?></td></tr>
															<tr><td><b>Date of Birth</b></td><td>:</td><td><?php echo date("F d, Y", strtotime($mem['dob']));?></td></tr>
															<tr><td><b>Gender</b></td><td>:</td><td><?php echo $mem['gender'];?></td></tr>
															<tr><td><b>Institution</b></td><td>:</td><td><?php echo $mem['institusi'];?></td></tr>
															<tr><td><b>Country</b></td><td>:</td><td><?php echo GetValue("title","country",array("id"=> "where/".$mem['id_country']));?></td></tr>
															<tr><td><b>Designation</b></td><td>:</td><td><?php echo $mem['designation'];?></td></tr>
															<!--<tr><td><b>Passport / ID Card</b></td><td>:</td><td><?php echo "<a target='_blank' href='".base_url()."uploads/".$mem['ktp']."' style='color:blue;'>Download</a>";?></td></tr>-->
															<?php }?>
															<!--<tr><td colspan="3" style="text-align:right !important;"><a href="<?php echo site_url('register/profile');?>" style="color:blue;">Edit Profile</a></td></tr>-->
														</table>
													</div>
													<div class="col-md-6 col-xs-12">
														<h3>Event Agenda</h3>
														<?php
														$q = GetAll("side_event", array("id_member"=> "where/".$mem['id']));
														if($q->num_rows() > 0) {?>
															<table class="mztable zebra-striped">
																<tr><th style='color:#000;'>No</th><th style='color:#000;'>Event Agenda</th><th style='color:#000;'>Status</th></tr>
																<?php
																$no=1;
																foreach($q->result_array() as $r) {
																	$ev = GetAll("calender",array("id"=> "where/".$r['id_calender']))->result_array()[0];
																	echo "<tr><td style='text-align:center !important;'>".$no++."</td><td><a href='".site_url('programme/agenda_detail/'.$ev['slug'])."' style='color:blue;'>".$ev['title']."</a><br>".FormatTanggalTimeAgenda($ev['start_date'], $ev['end_date'])."<br><label style='color:#fff;border-radius:5px;padding:2px 5px;background:".$warna[$ev['id_calender_cat']]."'>".$opt_tema[$ev['id_calender_cat']]."</label></td><td class='".$r['status']."' style='text-align:center !important;'>".$r['status']."</td></tr>";
																}
																?>
															</table>
															<br>
														<?php }?>
														<button class="btn-large btn-style1 merah add_side" type="button" style="border:0px;width:150px;float:none !important;">Add Event</button>
													</div>
												</div>
										</div>
								</div>
						</section>
					</div>
					
					<script>
						$(".add_side").click(function(){
							window.location="<?php echo site_url('programme/agenda');?>";
						});
					</script>