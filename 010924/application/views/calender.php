<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card" style="background:white;">
        	<div class="col-md-12 p-b-20 text-red">
        		<a class="text-white btn btn-success" href="<?php echo site_url($filez.'/'.$functionz.'_detail/0');?>">Add New <?php echo $labelz;?></a>
        		<br><br><h3><b><?php echo GetValue("title","calender_cat",array("id"=> "where/".$param));?></b></h3>
        	</div>
        	<div class="card-body p-0">
          	<form id="form_dt" method="POST" action="#">
              <table id="table-edit" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th width="20">No</th>
										<th>Title</th>
										<!--<th>Tema</th>-->
										<th>Ruangan</th>
										<th>Start Date</th>
										<th>End Date</th>
                    <th>Kuota | Approve | Pending</th>
                    <th>Status</th>
                    <th>Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</form>
          </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/js/datatables-net/datatables.min.js"></script>
<link href="<?php echo base_url();?>assets/css/datatables-net.min.css" rel="stylesheet" type="text/css" />
<script>
var table;
$(document).ready(function() {
  //datatables
  table = $('#table-edit').DataTable({
      //"scrollY": "970px",
      "order" : [],
      "searching": true,
      "info": false,
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "scrollX" : true,
      "lengthChange": true,
      "lengthMenu": [[10, 50, 100], [10, 50, 100]],
      "language": {
      	"search": "Cari",
      },
      "columnDefs" : [
        {orderable: false, targets: [ 0,1,2,3,4,5,6,7 ] }
      ],
      "ajax": {
          "url": "<?php echo site_url($filez.'/'.$functionz.'_list/'.$param);?>",
          "type": "POST"
      },
  });
  $('#table-edit').on('click', '.akt', function () {
  	var rel = $(this).attr("rel");
		var zz = $(this).attr("zz");
		var lbl;
		if(zz==2) lbl="Delete";
		else lbl="";
		if(confirm('Are your sure '+lbl+' ?')) {
			$.post("<?php echo site_url($filez.'/'.$functionz.'_aktif');?>", {idz : rel, akt : zz},  function(response) {
				window.location="<?php echo site_url($filez.'/main');?>";
			});
		} else return false;
	});
});
</script>