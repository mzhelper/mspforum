<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card" style="background:white;">
        	<div class="col-md-12 p-b-20 text-red"><a class="text-white btn btn-success" href="<?php echo site_url($filez.'/'.$functionz.'_detail/0');?>">Add New <?php echo $labelz;?></a></div>
        	<div class="card-body p-0 col-md-6">
        		<ul class="timeline">
            <?php
        		$q = GetAll("menu_top",array("id_parents"=> "where/0", "urutan"=> "order/asc"));
        		foreach($q->result_array() as $r) {?>
          	   <li>
                 <i class="ion icon-th-list grey"></i>
                 <div class="timeline-item card">
                   <div>
                   	<?php echo $r['title'];?> 
                   	<span class="float-right">
                   		<a href="<?php echo site_url('menuz/top_detail/'.$r['id']);?>"><i class='ion icon-pencil text-blue'></i></a>&nbsp;&nbsp;
                     	<?php if($r['is_publish']==1) echo "<i class='ion pub icon-eye text-yellow' rel='".$r['id']."'></i>&nbsp;&nbsp;";
                     	else echo "<i class='ion pub icon-eye-slash' rel='".$r['id']."'></i>&nbsp;&nbsp;";?>
                     	<i class="ion icon-toggle-up text-green" rel="<?php echo $r['id'];?>"></i>&nbsp;&nbsp;
                     	<i class="ion icon-toggle-down text-red" rel="<?php echo $r['id'];?>"></i>
                    </span>
                   </div>
                 </div>
                 <?php
                 $qq = GetAll("menu_top",array("id_parents"=> "where/".$r['id'], "urutan"=> "order/asc"));
                 if($qq->num_rows() > 0) {
                 	echo "<ul class='timeline timeline_sub'>";
                 	foreach($qq->result_array() as $rr) {?>
		               <li>
		                 <i class="ion icon-th-list grey"></i>
		                 <div class="timeline-item card">
		                     <div>
		                     	<?php echo $rr['title'];?>
		                     	<span class="float-right">
			                   		<a href="<?php echo site_url('menuz/top_detail/'.$rr['id']);?>"><i class='ion icon-pencil text-blue'></i></a>&nbsp;&nbsp;
			                     	<?php if($rr['is_publish']==1) echo "<i class='ion pub icon-eye text-yellow' rel='".$rr['id']."'></i>&nbsp;&nbsp;";
			                     	else echo "<i class='ion pub icon-eye-slash' rel='".$rr['id']."'></i>&nbsp;&nbsp;";?>
			                     	<i class="ion icon-toggle-up text-green" rel="<?php echo $rr['id'];?>"></i>&nbsp;&nbsp;
			                     	<i class="ion icon-toggle-down text-red" rel="<?php echo $rr['id'];?>"></i>
			                    </span>
		                     </div>
		                 </div>
		                 <?php
		                 $qqq = GetAll("menu_top",array("id_parents"=> "where/".$rr['id'], "urutan"=> "order/asc"));
		                 if($qqq->num_rows() > 0) {
		                 	echo "<ul class='timeline timeline_sub'>";
		                 	foreach($qqq->result_array() as $rrr) {?>
				               <li>
				                 <i class="ion icon-th-list grey"></i>
				                 <div class="timeline-item card">
				                     <div>
				                     	<?php echo $rrr['title'];?>
				                     	<span class="float-right">
					                   		<a href="<?php echo site_url('menuz/bottom_detail/'.$rrr['id']);?>"><i class='ion icon-pencil text-blue'></i></a>&nbsp;&nbsp;
					                     	<?php if($rrr['is_publish']==1) echo "<i class='ion pub icon-eye text-yellow' rel='".$rrr['id']."'></i>&nbsp;&nbsp;";
					                     	else echo "<i class='ion pub icon-eye-slash' rel='".$rrr['id']."'></i>&nbsp;&nbsp;";?>
					                     	<i class="ion icon-toggle-up text-green" rel="<?php echo $rrr['id'];?>"></i>&nbsp;&nbsp;
					                     	<i class="ion icon-toggle-down text-red" rel="<?php echo $rrr['id'];?>"></i>
					                    </span>
				                     </div>
				                 </div>
				               </li>
				             <?php }
		                 echo "</ul>";
		                 }
		                 ?>
		               </li>
		             <?php }
                 echo "</ul>";
                 }
                 ?>
               </li>
               <?php
             }
             ?>
             </ul>
          </div>
        </div>
    </div>
</div>
<script>
	$(".pub").click(function(){
		var rel = $(this).attr("rel");
		$.post("<?php echo site_url($filez.'/'.$functionz.'_aktif');?>", {idz:rel},  function(response) {
			window.location="<?php echo site_url($filez.'/top');?>";
		});
	});
	
	$(".icon-toggle-up").click(function(){
		var rel = $(this).attr("rel");
		$.post("<?php echo site_url($filez.'/'.$functionz.'_updown');?>", {idz:rel, param:"up"},  function(response) {
			window.location="<?php echo site_url($filez.'/top');?>";
		});
	});
	
	$(".icon-toggle-down").click(function(){
		var rel = $(this).attr("rel");
		$.post("<?php echo site_url($filez.'/'.$functionz.'_updown');?>", {idz:rel, param:"down"},  function(response) {
			window.location="<?php echo site_url($filez.'/top');?>";
		});
	});
	
</script>