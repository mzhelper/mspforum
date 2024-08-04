<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              <div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_add');?>" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id;?>">
										<input type="hidden" name="type_reg" value="<?php echo $val['type_reg'];?>">
										<div class="row">
	                		<div class="col-md-8 box-content">
					                <div class="no-b">
				                    <div class="no-p card-body-tab">
				                        <div class="tab-content" id="v-pills-tabContent1">
				                            <!-- TAB INDONESIA -->
				                            <div class="tab-pane fade active show" id="w2-tab1" role="tabpanel" aria-labelledby="w2-tab1">
				                                <div class="form-group form-float">
				                                	<div class="title-box">Account Info</div>
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
							                              <input name="firstname" class="form-control" value="<?php echo isset($val['firstname']) ? $val['firstname'] : "";?>" disabled readonly>
							                              <label class="form-label">First Name</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="email" class="email form-control" value="<?php echo isset($val['email']) ? $val['email'] : "";?>" disabled readonly>
							                              <label class="form-label">Email</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="institusi" class="form-control" value="<?php echo isset($val['institusi']) ? $val['institusi'] : "";?>" disabled readonly>
							                              <label class="form-label">Organization</label>
							                            </div>
							                        	</div>
								                        <div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="designation" class="form-control" value="<?php echo isset($val['designation']) ? $val['designation'] : "";?>" disabled readonly>
							                              <label class="form-label">Designation</label>
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
														<label class="form-label">Photo</label>
														<br>
														<?php if(isset($val['photo']) && $val['photo']){ ?>
															<img src="<?php echo 'https://mspforum.id/uploads/'.$val['photo'];?>" style="height: 100px;"><br>
														<?php } ?>
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