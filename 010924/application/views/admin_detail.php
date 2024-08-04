<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              <div class="card-box">
                	<?php
									$msg = $this->session->flashdata('message');
									if($msg) {
										$exp = explode("-",$msg);
										?>
										<div class="alert alert-<?php echo $exp[0];?> alert-dismissible bg-<?php echo $exp[0];?> text-white border-0 fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $exp[1];?>
                    </div>
							      <?php
									}
									?>
									<form class="form-material" method="POST" action="<?php echo site_url('admin/admin_add');?>" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id;?>">
	                	<div class="row">
	                		<div class="col-md-12">
	                			<div class="form-group form-float">
                          <div class="form-line">
                            <input name="name" class="form-control" value="<?php echo isset($val['name']) ? $val['name'] : "";?>" required>
                            <label class="form-label">Nama</label>
                          </div>
                        </div>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <input name="username" class="form-control" value="<?php echo isset($val['username']) ? $val['username'] : "";?>" required>
                            <label class="form-label">Username</label>
                          </div>
                        </div>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <input name="userpass" class="form-control" value="<?php echo isset($val['userpass']) ? $val['userpass'] : "";?>" required>
                            <label class="form-label">Kata Sandi</label>
                          </div>
                        </div>
                        <!--<div class="form-group form-float">
                          <div class="form-line">
                            <input name="email" class="form-control" value="<?php echo isset($val['email']) ? $val['email'] : "";?>">
                            <label class="form-label">Email</label>
                          </div>
                        </div>-->
                        <div class="form-group form-float">
                          <div class="form-line">
                            <?php 
                            $grup=GetOptGrup();
                            echo form_dropdown("id_admin_grup", $grup, isset($val['id_admin_grup']) ? $val['id_admin_grup'] : 2, "class='form-control' required");
                            ?>
                            <label class="form-label">Role</label>
                          </div>
                        </div>
                        <!--<div class="form-group">
	                          <label>Foto</label>
	                          <input type="file" accept="image/*" name="file" class="form-control" style="margin-bottom:6px;">
	                          <?php echo isset($val['keterangan']) ? "Download File : <a href='./../../../../uploads/".$val['keterangan']."' target='_blank'>".$val['keterangan']."</a>" : "";?>
	                      </div>-->
	                    </div>
	                  </div>
	                	<button type="submit" class="btn btn-warning btn-sm float-right width-100">Simpan</button>
	                	<button type="button" class="btn btn-outline-warning btn-sm float-right width-100 batal" style="margin-right:20px;">Batal</button>
	                	
	                </form>
                </div>
          </div>
        </div>
    </div>
</div>