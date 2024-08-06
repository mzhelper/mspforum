<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              <div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_add');?>" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id;?>">
										<div class="row">
	                		<div class="col-md-8 box-content">
					                <div class="no-b">
				                    <div class="no-p card-body-tab">
				                        <div class="tab-content" id="v-pills-tabContent1">
				                            <!-- TAB INDONESIA -->
				                            <div class="tab-pane fade active show" id="w2-tab1" role="tabpanel" aria-labelledby="w2-tab1">
				                                <div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="firstname" class="form-control" value="<?php echo isset($val['firstname']) ? $val['firstname'] : "";?>" required>
							                              <label class="form-label">First Name</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="lastname" class="form-control" value="<?php echo isset($val['lastname']) ? $val['lastname'] : "";?>" required>
							                              <label class="form-label">Last Name</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="hp" class="form-control" value="<?php echo isset($val['hp']) ? $val['hp'] : "";?>" required>
							                              <label class="form-label">Phone Number (WA)</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="email" class="email form-control" value="<?php echo isset($val['email']) ? $val['email'] : "";?>" required>
							                              <label class="form-label">Email</label>
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
															<input type="password" name="password" class="psw form-control" value="<?php echo isset($val['password']) ? $val['password'] : "";?>">
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
		                    <div class="form-group form-float float-left">
						            	<div class="float-left">
						            		Lock
							            	<div class="material-switch float-right">
			                          <input id="someSwitchOptionSuccess2" name="is_lock" type="checkbox" value="1" <?php echo isset($val['is_lock']) && $val['is_lock']==1 ? "checked=checked" : "";?>>
			                          <label for="someSwitchOptionSuccess2" class="bg-success"></label>
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
</script>