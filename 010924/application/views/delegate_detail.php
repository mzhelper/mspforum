<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              <div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_add');?>" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id;?>">
										<input type="hidden" name="id_parents" value="<?php echo $val['id_parents'];?>">
										<div class="row">
	                		<div class="col-md-8 box-content">
					                <div class="no-b">
				                    <div class="no-p card-body-tab">
				                        <div class="tab-content" id="v-pills-tabContent1">
				                            <!-- TAB INDONESIA -->
				                            <div class="tab-pane fade active show" id="w2-tab1" role="tabpanel" aria-labelledby="w2-tab1">
				                                <div class="form-group form-float">
				                                	<div class="title-box">Personal Info</div>
													            		<div>
								                            <label class="form-label">Type Reg</label>
								                            <?php
								                            $q = GetAll("type_reg");
								                            foreach($q->result_array() as $r) {
								                            	$opt_type[$r['id']]=$r['title'];
								                            }
								                            echo form_dropdown("type_reg",$opt_type,isset($val['type_reg']) ? $val['type_reg'] : 10,"class='form-control' disabled readonly");
								                            ?>
								                            <?php
								                            $q = GetAll("type_reg");
								                            foreach($q->result_array() as $r) {
								                            	$opt_type[$r['id']]=$r['title'];
								                            }
								                            echo form_dropdown("type_reg2",$opt_type,isset($val['type_reg2']) ? $val['type_reg2'] : 10,"class='form-control' disabled readonly");
								                            ?>
								                          </div>
								                        </div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="firstname" class="form-control" value="<?php echo isset($val['firstname']) ? $val['firstname'] : "";?>">
							                              <label class="form-label">First Name</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="lastname" class="form-control" value="<?php echo isset($val['lastname']) ? $val['lastname'] : "";?>">
							                              <label class="form-label">Last Name</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
													            		<div>
								                            <label class="form-label">Gender</label>
								                            <?php
								                            $opt_gen['Male'] = "Male";
								                            $opt_gen['Female'] = "Female";
								                            echo form_dropdown("gender",$opt_gen,isset($val['gender']) ? $val['gender'] : "Male","class='form-control'");
								                            ?>
								                          </div>
								                        </div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="email" class="email form-control" value="<?php echo isset($val['email']) ? $val['email'] : "";?>">
							                              <label class="form-label">Email</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
													            		<div class="form-line">
								                            <input name="dob" class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="<?php echo isset($val['dob']) ? $val['dob'] : date("Y-m-d");?>">
								                            <label class="form-label">Date of Birth</label>
								                          </div>
								                        </div>
								                        <div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="hp" class="form-control" value="<?php echo isset($val['hp']) ? $val['hp'] : "";?>">
							                              <label class="form-label">Phone Number (WA)</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="institusi" class="form-control" value="<?php echo isset($val['institusi']) ? $val['institusi'] : "";?>">
							                              <label class="form-label">Ministry/Institution/Organization</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
													            		<div>
								                            <label class="form-label">Country</label>
								                            <?php
								                            $opt_country = GetOptAll("country");
								                            echo form_dropdown("id_country",$opt_country,isset($val['id_country']) ? $val['id_country'] : 103,"class='form-control'");
								                            ?>
								                          </div>
								                        </div>
								                        <div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="designation" class="form-control" value="<?php echo isset($val['designation']) ? $val['designation'] : "";?>">
							                              <label class="form-label">Designation</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
							                            <div>
							                              <label class="form-label">Citizenship</label>
								                            <?php
								                            echo form_dropdown("kewarganegaraan",$opt_country,isset($val['kewarganegaraan']) ? $val['kewarganegaraan'] : 103,"class='form-control'");
								                            ?>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="dietary" class="form-control" value="<?php echo isset($val['dietary']) ? $val['dietary'] : "";?>">
							                              <label class="form-label">Dietary Restrictions</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
								                          <div>
								                            <label class="form-label">Bio</label>
								                            <textarea rows="30" id="editor1" name="bio"><?php echo isset($val['bio']) ? $val['bio'] : "";?></textarea>
								                          </div>
								                        </div>
							                        	<div class="title-box">Passport</div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="passport_type" class="form-control" value="<?php echo isset($val['passport_type']) ? $val['passport_type'] : "";?>">
							                              <label class="form-label">Type of Passport</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="passport" class="form-control" value="<?php echo isset($val['passport']) ? $val['passport'] : "";?>">
							                              <label class="form-label">Passport Number</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
													            		<div class="form-line">
								                            <input name="passport_exp" class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="<?php echo isset($val['passport_exp']) ? $val['passport_exp'] : date("Y-m-d");?>">
								                            <label class="form-label">Passport Expire Date</label>
								                          </div>
								                        </div>
								                        <div class="form-group form-float">
							                            <div>
							                              <label class="form-label">Passport Issuing place</label>
								                            <?php
								                            echo form_dropdown("passport_place",$opt_country,isset($val['passport_place']) ? $val['passport_place'] : 103,"class='form-control'");
								                            ?>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="visa_type" class="form-control" value="<?php echo isset($val['visa_type']) ? $val['visa_type'] : "";?>">
							                              <label class="form-label">Visa Type</label>
							                            </div>
							                        	</div>
				                            </div>
				                        </div>
				
				                    </div>
				                </div>
					            </div>
					            <div class="col-md-3 box-content box-content-kanan">
					            	<div class="form-group form-float">
													<div>
														<label class="form-label">Photo ID</label>
														<input type="file" name="photo" class="form-control">
														<?php if(isset($val['photo']) && $val['photo']){ ?>
															<img src="<?php echo 'https://mspforum.id/uploads/'.$val['photo'];?>" style="height: 100px;"><br>
														<?php } ?>
														<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
													</div>
												</div>
												<div class="form-group form-float">
													<div>
														<label class="form-label">Passport / ID Card</label>
														<input type="file" name="ktp" class="form-control">
														<?php if(isset($val['ktp']) && $val['ktp']){ ?>
															<img src="<?php echo 'https://mspforum.id/uploads/'.$val['ktp'];?>" style="height: 100px;"><br>
														<?php } ?>
														<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
													</div>
												</div>
												<div class="form-group form-float">
													<div>
														<label class="form-label">Attachment PDF</label>
														<input type="file" accept=".pdf" name="surat_tugas" class="form-control">
														<?php if(isset($val['surat_tugas']) && $val['surat_tugas']){ ?>
															<a href="https://mspforum.id/uploads/<?php echo $val['surat_tugas'];?>">Download</a><br>
														<?php } ?>
														<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat PDF<span>
													</div>
												</div>
												<div class="form-group form-float">
													<div>
														<label class="form-label">AKSES LOGIN</label><br>
														<label class="form-label">Username</label>
														<div class="form-line">
															<input type="text" name="alt_email" class="form-control" value="<?php echo isset($val['alt_email']) ? $val['alt_email'] : "";?>">
														</div>
														<label class="form-label">Password</label>
														<div class="form-line">
															<input type="password" name="password" class="form-control" value="<?php echo isset($val['password']) ? $val['password'] : "";?>">
															<input type="hidden" name="password_old" class="form-control" value="<?php echo isset($val['password']) ? $val['password'] : "";?>">
														</div>
													</div>
												</div>
												
												<div class="form-group form-float float-left">
						            	<div class="float-left">
						            		Aktivasi
							            	<div class="material-switch float-right">
			                          <input id="someSwitchOptionSuccess" name="is_active" type="checkbox" value="Active" <?php echo isset($val['is_active']) && $val['is_active']=="Active" ? "checked=checked" : "";?>>
			                          <label for="someSwitchOptionSuccess" class="bg-success"></label>
			                      </div>
			                    </div>
		                    </div>
	                      <div class="form-group float-left">
					            		<button type="submit" class="btn btn-success btn-sm w100">Simpan</button>
					            	</div>
					            </div>
	                  </div>
	                </form>
                </div>
          </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/js/editor.js"></script>