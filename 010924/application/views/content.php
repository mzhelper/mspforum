<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card" style="background:white;">
        	<div class="col-md-12 p-b-20 text-red"><a class="text-white btn btn-success" href="<?php echo site_url('content/content_detail/0');?>">Add New Halaman</a></div>
        	<div class="card-body p-0">
          	<form id="form_dt" method="POST" action="<?php echo site_url('content/content_hapus');?>">
              <table id="table-edit" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th width="20">No</th>
										<th>Title</th>
										<th>Link</th>
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
        {orderable: false, targets: [ 0,3 ] }
      ],
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('content/content_list/');?>",
          "type": "POST"
      },
  });
  $('#table-edit').on('click', '.akt', function () {
  	var rel = $(this).attr("rel");
		var zz = $(this).attr("zz");
		var lbl;
		if(zz==2) lbl="Delete";
		else lbl="";
		if(confirm('Are your sure '+lbl+' this Page?')) {
			$.post("<?php echo site_url('content/content_aktif');?>", {idz : rel, akt : zz},  function(response) {
				window.location="<?php echo site_url('content/main');?>";
			});
		} else return false;
	});
});
</script>