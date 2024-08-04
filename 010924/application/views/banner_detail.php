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
						                              <label class="form-label">Title</label>
						                            </div>
						                        	</div>
						                        	<div class="form-group form-float">
							                          <div>
							                            <label class="form-label">Caption</label>
							                            <textarea rows="2" name="headline" class="form-control areatext"><?php echo isset($val['headline']) ? $val['headline'] : "";?></textarea>
							                          </div>
							                        </div>
							                        <div class="form-group form-float">
							                          <div class="form-line">
							                            <input name="contents" class="form-control" value="<?php echo isset($val['contents']) ? $val['contents'] : "";?>">
						                              <label class="form-label">Button Text</label>
							                          </div>
							                        </div>
			                            </div>
			                        </div>
				                    </div>
				                    <div class="title-box">Image</div>
				                    <div class="form-group form-float">
							            		<div>
		                            <input type="file" name="file" accept="image/*" class="form-control">
		                            <?php
		                            if(isset($val['file'])) {
		                            	if(file_exists("../uploads/".$val['file']) && $val['file']) echo "<br><img src='".base_url()."../uploads/".$val['file']."' style='max-height:150px;'>";
		                            }
		                            ?>
		                          </div>
		                        </div>
		                        <div class="title-box">Image Mobile</div>
				                    <div class="form-group form-float">
							            		<div>
		                            <input type="file" name="file_mobile" accept="image/*" class="form-control">
		                            <?php
		                            if(isset($val['file_mobile'])) {
		                            	if(file_exists("../uploads/".$val['file_mobile']) && $val['file_mobile']) echo "<br><img src='".base_url()."../uploads/".$val['file_mobile']."' style='max-height:150px;'>";
		                            }
		                            ?>
		                          </div>
		                        </div>
				                </div>
					            </div>
					            <div class="col-md-3 box-content box-content-kanan">
                        <div class="form-group form-float">
					            		<div>
                            <label class="form-label">Order</label>
                            <?php
                            $opt_urut=array();
                            $jum_banner=GetAll("banner",array("is_delete"=> "where/0"))->num_rows();
                            if($id==0) $jum_banner++;
                            for($i=1;$i<=$jum_banner;$i++) {
                            	$opt_urut[$i] = $i;
                            }
                            echo form_dropdown("urutan",$opt_urut,isset($val['urutan']) ? $val['urutan'] : $jum_banner,"class='form-control'");
                            ?>
                          </div>
                        </div>
                        <div class="form-group form-float">
					            		<div>
                            <label class="form-label">Title Color</label>
                            <div class="head_warna" style="border:1px solid #ddd;width:60px;height:10px;margin-bottom:10px;background:<?php echo isset($val['warna_head']) ? $val['warna_head'] : "#F15922";?>"></div>
                            <select class="form-control warna" name="warna_head">
                              <option value="#FFFFFF" <?php echo isset($val['warna_head']) && $val['warna_head']=="#FFFFFF" ? "selected" : "";?>>White</option>
                              <option value="#000000" <?php echo isset($val['warna_head']) && $val['warna_head']=="#000000" ? "selected" : "";?>>Black</option>
                              <option value="#fc0100" <?php echo isset($val['warna_head']) && $val['warna_head']=="#fc0100" ? "selected" : "";?>>Merah</option>
                              <option value="#ffcc01" <?php echo isset($val['warna_head']) && $val['warna_head']=="#ffcc01" ? "selected" : "";?>>Kuning</option>
                              <option value="#0561a9" <?php echo isset($val['warna_head']) && $val['warna_head']=="#0561a9" ? "selected" : "";?>>Biru</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group form-float">
					            		<div>
                            <label class="form-label">Caption Color</label>
                            <div class="cap_warna" style="border:1px solid #ddd;width:60px;height:10px;margin-bottom:10px;background:<?php echo isset($val['warna_caption']) ? $val['warna_caption'] : "#F15922";?>"></div>
                            <select class="form-control warna_cap" name="warna_caption">
                              <option value="#FFFFFF" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#FFFFFF" ? "selected" : "";?>>White</option>
                              <option value="#000000" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#000000" ? "selected" : "";?>>Black</option>
                              <option value="#fc0100" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#fc0100" ? "selected" : "";?>>Merah</option>
                              <option value="#ffcc01" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#ffcc01" ? "selected" : "";?>>Kuning</option>
                              <option value="#0561a9" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#0561a9" ? "selected" : "";?>>Biru</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group form-float">
					            		<div class="form-line">
                            <input name="link" class="form-control" value="<?php echo isset($val['link']) ? $val['link'] : "";?>">
                            <label class="form-label">Link URL (Redirect)</label>
                          </div>
                        </div>
					            	<div class="form-group form-float">
					            		<div class="form-line">
                            <input name="publish_date" class="date-time-picker form-control" value="<?php echo isset($val['publish_date']) ? $val['publish_date'] : date("Y-m-d H:i");?>">
                            <label class="form-label">Date Publish</label>
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
<script>
$(".warna").change(function(){
	$(".head_warna").css("background",$(this).val());
});
$(".warna_cap").change(function(){
	$(".cap_warna").css("background",$(this).val());
});
</script>