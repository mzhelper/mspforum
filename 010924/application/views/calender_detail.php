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
							                              <input name="title" class="form-control" value="<?php echo isset($val['title']) ? $val['title'] : "";?>">
							                              <label class="form-label">Nama Event</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
							                            <div class="form-line">
							                            	<?php
							                            	$speak = GetOptSpeakers();
							                            	$mul=isset($val['headline']) ? explode(",",str_replace("-","",$val['headline'])) : array();
								                          	echo form_dropdown("pembicara[]", $speak, $mul, "class='select2' multiple='multiple'");
								                            ?>
							                              <!--<input name="seo_title" class="form-control" value="<?php echo isset($val['seo_desc']) ? $val['seo_desc'] : "";?>">-->
							                              <label class="form-label" style="top:-20px !important;">Daftar Pembicara</label>
							                            </div>
							                        	</div>
								                        <div class="form-group form-float">
								                          <div>
								                            <label class="form-label">Deskripsi</label>
								                            <textarea rows="30" id="editor1" name="contents"><?php echo isset($val['contents']) ? $val['contents'] : "";?></textarea>
								                          </div>
								                        </div>
								                        <!--<div class="title-box">SEO</div>
								                        <div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="seo_title" class="form-control" value="<?php echo isset($val['seo_title']) ? $val['seo_title'] : "";?>">
							                              <label class="form-label">SEO Title</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group">
								                          <div>
								                            <label class="form-label">SEO Content</label>
								                            <textarea rows="3" name="seo_desc" class="form-control areatext"><?php echo isset($val['seo_desc']) ? $val['seo_desc'] : "";?></textarea>
								                          </div>
								                        </div>-->
				                            </div>
				                        </div>
				
				                    </div>
				                </div>
					            </div>
					            <div class="col-md-3 box-content box-content-kanan">
					            	<div class="form-group form-float">
													<div>
														<label class="form-label">Lampiran</label>
														<input type="file" name="image" class="form-control">
														<?php if(isset($val['image']) && $val['image']) echo $val['image'];?>
													</div>
												</div>
												<div class="form-group form-float">
					            		<div>
                            <label class="form-label">Tema</label>
                            <?php
                            $opt_cat=GetOptCalenderCat();
                            echo form_dropdown("id_calender_cat",$opt_cat,isset($val['id_calender_cat']) ? $val['id_calender_cat'] : 1,"class='form-control'");
                            ?>
                          </div>
                        </div>
                        <div class="form-group form-float">
					            		<div>
                            <label class="form-label">Lokasi</label>
                            <?php
                            $opt_cat=GetOptCalenderLokasi();
                            echo form_dropdown("id_lokasi",$opt_cat,isset($val['id_lokasi']) ? $val['id_lokasi'] : 1,"class='form-control'");
                            ?>
                          </div>
                        </div>
                        <div class="form-group form-float">
					            		<div class="form-line">
                            <input name="start_date" class="date-time-picker form-control" value="<?php echo isset($val['start_date']) ? $val['start_date'] : date("Y-m-d H:i");?>">
                            <label class="form-label">Start Date</label>
                          </div>
                        </div>
                        <div class="form-group form-float">
					            		<div class="form-line">
                            <input name="end_date" class="date-time-picker form-control" value="<?php echo isset($val['end_date']) ? $val['end_date'] : date("Y-m-d H:i");?>">
                            <label class="form-label">End Date</label>
                          </div>
                        </div>
                        <div class="form-group form-float">
					            		<div class="form-line">
                            <input name="kuota" class="form-control" value="<?php echo isset($val['kuota']) ? $val['kuota'] : 0;?>">
                            <label class="form-label">Kuota Peserta</label>
                          </div>
                        </div>
                        <div class="form-group form-float float-left">
						            	<div class="float-left">
						            		Publish
							            	<div class="material-switch float-right">
			                          <input id="someSwitchOptionSuccess" name="is_publish" type="checkbox" value="1" <?php echo isset($val['is_publish']) && $val['is_publish'] ? "checked=checked" : "";?>>
			                          <label for="someSwitchOptionSuccess" class="bg-success"></label>
			                      </div>
			                    </div>
		                    </div>
	                      <div class="form-group float-left">
					            		<button type="submit" class="btn btn-success btn-sm w100">Simpan</button>
					            	</div>
					            </div>
	                  </div>
	                	<!--<button type="button" class="btn btn-outline-warning btn-sm float-right width-100 batal" style="margin-right:20px;">Batal</button>-->
	                </form>
                </div>
          </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/js/editor.js"></script>