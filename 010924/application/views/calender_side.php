<style>
.mztable th{font-size:14px !important;}
.mztable td{font-size:12px !important;}
.mztable span{cursor:pointer;}
</style>
<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              <div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_add');?>" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id;?>">
	                	<div class="row">
	                		<div class="col-md-12 box-content pb-5">
					                <div class="no-b">
				                    <div class="no-p card-body-tab">
			                        <div class="tab-content" id="v-pills-tabContent1">
			                            <div class="tab-pane fade active show" id="w2-tab1" role="tabpanel" aria-labelledby="w2-tab1">
			                                <div class="form-group form-float">
						                            <div class="form-line">
						                              <input name="title" class="form-control" value="<?php echo isset($val['title']) ? $val['title'] : "";?>" disabled>
						                              <label class="form-label">Event Agenda</label>
						                            </div>
						                        	</div>
			                            </div>
			                        </div>
				                    </div>
				                	</div>
				                	<div class="row">
					                	<div class="col-md-6">
					                		<h4>Approve</h4>
								            	<table class="mztable">
								            		<tr><th>No</th><th>Nama</th><th>Type Reg</th><th>Action</th></tr>
								            		<?php
								            		$opt_type = GetOptAll("type_reg");
								            		$no=1;
								            		$q = $this->db->query("select a.id,firstname, lastname, email, type_reg from kg_member a inner join kg_side_event b on b.id_member=a.id AND b.status='Approve' WHERE b.id_calender='".$id."'");
								            		foreach($q->result_array() as $r) {
								            			echo "<tr><td style='text-align:center;'>".$no++."</td><td>".$r['firstname']." ".$r['lastname']."</td><td>".$opt_type[$r['type_reg']]."</td><td style='text-align:center;'><span class='rjc' rel='".$r['id']."'>Reject</span></td></tr>";
								            		}
								            		?>
								            	</table>
								            	<h4><br>Approve DAO</h4>
								            	<table class="mztable">
								            		<tr><th>No</th><th>DAO</th><th>Nama</th><th>Type Reg</th><th>Action</th></tr>
								            		<?php
								            		$opt_type = GetOptAll("type_reg");
								            		$no=1;
								            		$q = $this->db->query("select a.id,id_parents,firstname, lastname, email, type_reg from kg_member_dao a inner join kg_side_event_dao b on b.id_member=a.id AND b.status='Approve' WHERE b.id_calender='".$id."'");
								            		foreach($q->result_array() as $r) {
								            			if(!isset($dao[$r['id_parents']])) {
								            				$dao[$r['id_parents']] = GetValue("firstname","member_dao",array("id"=> "where/".$r['id_parents']));
								            				$dao[$r['id_parents']] .= " ".GetValue("lastname","member_dao",array("id"=> "where/".$r['id_parents']));
								            			}
								            			echo "<tr><td style='text-align:center;'>".$no++."</td><td>".$dao[$r['id_parents']]."</td><td>".$r['firstname']." ".$r['lastname']."</td><td>".$opt_type[$r['type_reg']]."</td><td style='text-align:center;'><span class='rjc_dao' rel='".$r['id']."'>Reject</span></td></tr>";
								            		}
								            		?>
								            	</table>
								            </div>
								            <div class="col-md-6">
					                		<h4>Pending</h4>
								            	<table class="mztable">
								            		<tr><th>No</th><th>Nama</th><th>Type Reg</th><th>Action</th></tr>
								            		<?php
								            		$no=1;
								            		$q = $this->db->query("select a.id,firstname, lastname, email, type_reg from kg_member a inner join kg_side_event b on b.id_member=a.id AND b.status='Pending' WHERE b.id_calender='".$id."'");
								            		foreach($q->result_array() as $r) {
								            			echo "<tr><td style='text-align:center;'>".$no++."</td><td>".$r['firstname']." ".$r['lastname']."</td><td>".$opt_type[$r['type_reg']]."</td><td style='text-align:center;'><span class='acc' rel='".$r['id']."'>Approve</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span class='rjc' rel='".$r['id']."'>Reject</span></td></tr>";
								            		}
								            		?>
								            	</table>
								            	<h4><br>Pending DAO</h4>
								            	<table class="mztable">
								            		<tr><th>No</th><th>DAO</th><th>Nama</th><th>Type Reg</th><th>Action</th></tr>
								            		<?php
								            		$no=1;
								            		$q = $this->db->query("select a.id,id_parents,firstname, lastname, email, type_reg from kg_member_dao a inner join kg_side_event_dao b on b.id_member=a.id AND b.status='Pending' WHERE b.id_calender='".$id."'");
								            		foreach($q->result_array() as $r) {
								            			if(!isset($dao[$r['id_parents']])) {
								            				$dao[$r['id_parents']] = GetValue("firstname","member_dao",array("id"=> "where/".$r['id_parents']));
								            				$dao[$r['id_parents']] .= " ".GetValue("lastname","member_dao",array("id"=> "where/".$r['id_parents']));
								            			}
								            			echo "<tr><td style='text-align:center;'>".$no++."</td><td>".$dao[$r['id_parents']]."</td><td>".$r['firstname']." ".$r['lastname']."</td><td>".$opt_type[$r['type_reg']]."</td><td style='text-align:center;'><span class='acc_dao' rel='".$r['id']."'>Approve</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span class='rjc_dao' rel='".$r['id']."'>Reject</span></td></tr>";
								            		}
								            		?>
								            	</table>
								            </div>
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
$(".acc").click(function(){
	var but = $(this);
	var conf = confirm('Are you sure to Approve this user?');
	if(conf) {
		var rel = $(this).attr("rel");
		$.post("<?php echo site_url('calender/add_side');?>", {param : <?php echo $id;?>, idz : rel},  function(response) {
			if(response=="ok") window.location="<?php echo site_url('calender/side_event/'.$id);?>";
		});
	}
});
$(".acc_dao").click(function(){
	var but = $(this);
	var conf = confirm('Are you sure to Approve this user?');
	if(conf) {
		var rel = $(this).attr("rel");
		$.post("<?php echo site_url('calender/add_side_dao');?>", {param : <?php echo $id;?>, idz : rel},  function(response) {
			if(response=="ok") window.location="<?php echo site_url('calender/side_event/'.$id);?>";
		});
	}
});
$(".rjc").click(function(){
	var but = $(this);
	var conf = confirm('Are you sure to Reject this user?');
	if(conf) {
		var rel = $(this).attr("rel");
		$.post("<?php echo site_url('calender/add_side/1');?>", {param : <?php echo $id;?>, idz : rel},  function(response) {
			if(response=="ok") window.location="<?php echo site_url('calender/side_event/'.$id);?>";
		});
	}
});
$(".rjc_dao").click(function(){
	var but = $(this);
	var conf = confirm('Are you sure to Reject this user?');
	if(conf) {
		var rel = $(this).attr("rel");
		$.post("<?php echo site_url('calender/add_side_dao/1');?>", {param : <?php echo $id;?>, idz : rel},  function(response) {
			if(response=="ok") window.location="<?php echo site_url('calender/side_event/'.$id);?>";
		});
	}
});
</script>