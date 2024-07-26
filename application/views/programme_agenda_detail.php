<style>
.speak_agenda img{border-radius:10px;}
</style>
			<div id="content" class="no-bottom no-top">
            <div id="top"></div>
						<div><img src="<?php echo base_url()."uploads/bg_about.jpg";?>" width="100%"></div>
						<section id="section-about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="wow fadeInUp"><?php echo $val['title'];?></h2>
                            <div><?php echo $hari;?></div>
                            <div><?php echo $opt_ruangan[$val['id_lokasi']];?></div>
                            <div class="small-border"></div>
                        </div>
                        <div class="col-md-12">
                        		<div class="col-md-12">
                        			<h3 style="margin-bottom:10px;">Description</h3>
	                            <?php echo $val['contents'];?>
	                            <!--<div class="<?php echo $tema;?>" style="float:left;width:30px;">&nbsp;</div>
	                            <div style="float:left;padding-top:5px;padding-left:5px;font-weight:bold;"><?php echo $opt_tema[$val['id_calender_cat']];?></div>-->
	                            <?php
	                            $is_login=GetUserID();
	                            if($is_login){
                              	$cek = GetValue("id","side_event",array("id_member"=> "where/".$is_login,"id_calender"=> "where/".$val['id'],"is_delete"=> "where/0"));
                              	if($cek) echo "<div class='join_event' style='float:left;'><button class='btn-style1 merah_tipis' rel='".$val['id']."'>Cancel</button></div>";
                              	else echo "<div class='join_event' style='float:left;'><button class='btn-style1 hijau' rel='".$val['id']."'>Click to Join</button></div>";
                              }
                              ?>
	                          </div>
                        </div>
                        
                        <div class="col-md-12 text-center mt40">
                            <h2 class="wow fadeInUp">Speakers</h2>
                            <div class="small-border"></div>
                        </div>
                        <div class="col-md-12 text-center">
                        	<?php
                        	$exp = explode(",",str_replace("-","",$val['headline']));
                        	foreach($exp as $e) {
                        		if($e) {
	                        		$r = GetAll("speakers",array("id"=> "where/".$e))->result_array()[0];
	                        		$foto_speaker = file_exists("./uploads/".$r['image']) && $r['image'] ? $r['image'] : "foto_default.png";
									          	?>
															<div class="speak_agenda col-md-2 col-sm-6 col-xs-12">
																<a href="<?php echo site_url('about/speakers_event/'.$r['slug']);?>">
																	<div class="team-header"><img src="<?php echo base_url().'uploads/'.$foto_speaker;?>" alt="Speakers"></div>
																	<div class="team-content">
																		<h5 class="tcenter" style="line-height:18px;"><?php echo $r['title'];?><br><small><?php echo $r['headline'];?></small></h5>
																	</div>
																</a>
															</div>
															<?php }
														}
													?>
                        </div>
                        <div class="col-md-12 text-center mt40">
                            <h2 class="wow fadeInUp">Attendees</h2>
                            <div class="small-border"></div>
                        </div>
                        <div class="col-md-12 text-center">
                        	<?php
                        		$q = $this->db->query("select a.id_member,b.photo,b.firstname from kg_side_event a inner join kg_member b on b.id=a.id_member WHERE a.status='Approve' AND a.id_calender='".$val['id']."'");
                        		foreach($q->result_array() as $r) {
                        			$foto = file_exists("./uploads/".$r['photo']) && $r['photo'] ? $r['photo'] : "foto_default.png";
								          	?>
															<div style="float:left;padding-right:10px;">
																<a href="<?php echo site_url('about/profile/'.$r['id_member']);?>">
																	<img width="80" height="80" style="border-radius:50%;border:1px solid #ccc;" src="<?php echo base_url().'uploads/'.$foto;?>" title="<?php echo $r['firstname'];?>" alt="<?php echo $r['firstname'];?>">
																</a>
															</div>
														<?php }
													?>
                        </div>
                    </div>
                </div>
            </section>
      </div>
      <script>
      	$(".hijau").click(function(){
      		var but = $(this);
      		var conf = confirm('Are you sure to join this event?');
      		if(conf) {
      			var rel = $(this).attr("rel");
      			$.post("<?php echo site_url('programme/add_side');?>", {param : rel},  function(response) {
      				if(response=="ok") window.location="<?php echo site_url('programme/agenda_detail/'.$val['slug']);?>";
						});
      		}
      	});
      	
      	$(".merah_tipis").click(function(){
      		var but = $(this);
      		var conf = confirm('Are you sure?');
      		if(conf) {
      			var rel = $(this).attr("rel");
      			$.post("<?php echo site_url('programme/add_side/1');?>", {param : rel},  function(response) {
      				if(response=="ok") window.location="<?php echo site_url('programme/agenda_detail/'.$val['slug']);?>";
						});
      		}
      	});
      	</script>