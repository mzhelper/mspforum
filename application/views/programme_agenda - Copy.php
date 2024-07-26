<style>
.ruang1,.ruang2,.ruang3{display:none;}
</style>
			<div id="content" class="no-bottom no-top">
            <div id="top"></div>
						<div><img src="<?php echo base_url()."uploads/bg_about.jpg";?>" width="100%"></div>
						<section id="section-schedules" class="no-top no-bottom text-dark" data-stellar-background-ratio=".2" style="background:#fff;">
                <div class="pt40 pb80">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="wow fadeInUp">Event Agenda</h2>
                                <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                            </div>

                            <div class="col-md-12 wow fadeInUp">
                                <div class="de_tab tab_style_4 text-center">
                                    <ul class="de_nav">
                                        <li class="active" data-link="#section-services-tab">
                                            <h3>Day <span>01</span></h3>
                                            <h4>Sunday, 1 September 2024</h4>
                                        </li>
                                        <li data-link="#section-services-tab">
                                            <h3>Day <span>02</span></h3>
                                            <h4>Monday, 2 September 2024</h4>
                                        </li>
                                        <li data-link="#section-services-tab">
                                            <h3>Day <span>03</span></h3>
                                            <h4>Tuesday, 3 September 2024</h4>
                                        </li>
                                    </ul>

                                    <div class="de_tab_content text-left">
                                        <div id="tab1" class="tab_single_content">
	                                        	<table class="tbl_agenda">
	                                        		<tr style="background:rgba(0,0,0,.1);">
	                                        			<?php
	                                        			$is_login = GetUserID();
	                                        			foreach($day1_lokasi->result_array() as $k=> $r) {
	                                        				if($k==0) echo "<td class='aktip tdruang1' rel='ruang1".$r['id_lokasi']."' alt='ruang1'>".$opt_ruangan[$r['id_lokasi']]."</td>";
	                                        				else echo "<td class='tdruang1' rel='ruang1".$r['id_lokasi']."' alt='ruang1'>".$opt_ruangan[$r['id_lokasi']]."</td>";
	                                        			}
	                                        			?>
	                                        		</tr>
	                                        	</table>
	                                        	<?php
	                                        	foreach($day1_lokasi->result_array() as $k=> $rr) {
	                                        		?>
	                                            <div class="row ruang1 ruang1<?php echo $rr['id_lokasi'];?>" style="<?php echo $k==0 ? "display:block;" : "";?>">
	                                                <div class="col-md-12">
	                                                	<?php
	                                                	foreach($day1->result_array() as $r) {
	                                                		if($r['id_lokasi']==$rr['id_lokasi']) {
	                                                		?>
	                                                    <div class="schedule-listing">
	                                                        <div class="schedule-item">
	                                                            <div class="col-md-2 sc-timez"><?php echo FormatTanggalTimeAgenda($r['start_date'], $r['end_date']);?></div>
	                                                            <div class="col-md-10">
	                                                            	<div class="baris_event">
		                                                            	<div class="sc-infoz kat<?php echo $r['id_calender_cat'];?>">
		                                                                <a href="<?php echo site_url('programme/agenda_detail/'.$r['id']);?>"><h3><?php echo $r['title'];?></h3></a>
		                                                                <div class="pembicara text-center">
		                                                                	<?php echo GetPembicaraAgenda($r['headline']);?>
		                                                                </div>
		                                                              </div>
		                                                              <?php if($is_login){
		                                                              	$cek = GetValue("id","side_event",array("id_member"=> "where/".$is_login,"id_calender"=> "where/".$r['id'],"is_delete"=> "where/0"));
		                                                              	if($cek) echo "<div class='join_event'><button class='btn-style1 merah_tipis' rel='".$r['id']."'>Cancel</button></div>";
		                                                              	else echo "<div class='join_event'><button class='btn-style1 hijau' rel='".$r['id']."'>Click to Join</button></div>";
		                                                              }?>
			                                                          </div>
			                                                          <div class="clearfix baris"></div>
	                                                              <?php
	                                                              $q = GetAll("calender",array("id_lokasi"=> "where/".$r['id_lokasi'], "start_date"=> "where/".$r['start_date'], "end_date"=> "where/".$r['end_date'], "id !="=> "where/".$r['id']));
	                                                              foreach($q->result_array() as $s) {?>
	                                                              	<div class="baris_event">
			                                                              <div class="sc-infoz kat<?php echo $s['id_calender_cat'];?>" style="margin-top:1px;">
			                                                                <a href="<?php echo site_url('programme/agenda_detail/'.$s['id']);?>"><h3><?php echo $s['title'];?></h3></a>
			                                                                <div class="pembicara text-center">
			                                                                	<?php echo GetPembicaraAgenda($s['headline']);?>
			                                                                </div>
			                                                              </div>
			                                                              <?php if($is_login){
		                                                              	$cek = GetValue("id","side_event",array("id_member"=> "where/".$is_login,"id_calender"=> "where/".$s['id'],"is_delete"=> "where/0"));
		                                                              	if($cek) echo "<div class='join_event'><button class='btn-style1 merah_tipis' rel='".$s['id']."'>Cancel</button></div>";
		                                                              	else echo "<div class='join_event'><button class='btn-style1 hijau' rel='".$s['id']."'>Click to Join</button></div>";
		                                                              }?>
			                                                            </div>
			                                                            <div class="clearfix"></div>
		                                                             <?php }?>
	                                                            </div>
	                                                            <div class="clearfix"></div>
	                                                        </div>
	                                                    </div>
	                                                    <?php 
	                                                  	}
	                                                  }
	                                                  ?>
	                                                </div>
	                                            </div>
	                                          	<?php }
	                                          ?>
                                        </div>

                                        <div id="tab2" class="tab_single_content">
	                                        	<table class="tbl_agenda">
	                                        		<tr style="background:rgba(0,0,0,.1);">
	                                        			<?php
	                                        			foreach($day2_lokasi->result_array() as $k=> $r) {
	                                        				if($k==0) echo "<td class='aktip tdruang2' rel='ruang2".$r['id_lokasi']."' alt='ruang2'>".$opt_ruangan[$r['id_lokasi']]."</td>";
	                                        				else echo "<td class='tdruang2' rel='ruang2".$r['id_lokasi']."' alt='ruang2'>".$opt_ruangan[$r['id_lokasi']]."</td>";
	                                        			}
	                                        			?>
	                                        		</tr>
	                                        	</table>
	                                        	<?php
	                                        	foreach($day2_lokasi->result_array() as $k=> $rr) {
	                                        		?>
	                                            <div class="row ruang2 ruang2<?php echo $rr['id_lokasi'];?>" style="<?php echo $k==0 ? "display:block;" : "";?>">
	                                                <div class="col-md-12">
	                                                	<?php
	                                                	foreach($day2->result_array() as $r) {
	                                                		if($r['id_lokasi']==$rr['id_lokasi']) {
	                                                		?>
	                                                    <div class="schedule-listing">
	                                                        <div class="schedule-item">
	                                                            <div class="col-md-2 sc-timez"><?php echo FormatTanggalTimeAgenda($r['start_date'], $r['end_date']);?></div>
	                                                            <div class="col-md-10">
	                                                            	<div class="baris_event">
		                                                            	<div class="sc-infoz kat<?php echo $r['id_calender_cat'];?>">
		                                                                <a href="<?php echo site_url('programme/agenda_detail/'.$r['id']);?>"><h3><?php echo $r['title'];?></h3></a>
		                                                                <div class="pembicara text-center">
		                                                                	<?php echo GetPembicaraAgenda($r['headline']);?>
		                                                                </div>
		                                                              </div>
		                                                              <?php if($is_login){
		                                                              	$cek = GetValue("id","side_event",array("id_member"=> "where/".$is_login,"id_calender"=> "where/".$r['id'],"is_delete"=> "where/0"));
		                                                              	if($cek) echo "<div class='join_event'><button class='btn-style1 merah_tipis' rel='".$r['id']."'>Cancel</button></div>";
		                                                              	else echo "<div class='join_event'><button class='btn-style1 hijau' rel='".$r['id']."'>Click to Join</button></div>";
		                                                              }?>
			                                                          </div>
			                                                          <div class="clearfix baris"></div>
	                                                              <?php
	                                                              $q = GetAll("calender",array("id_lokasi"=> "where/".$r['id_lokasi'], "start_date"=> "where/".$r['start_date'], "end_date"=> "where/".$r['end_date'], "id !="=> "where/".$r['id']));
	                                                              foreach($q->result_array() as $s) {?>
	                                                              	<div class="baris_event">
			                                                              <div class="sc-infoz kat<?php echo $s['id_calender_cat'];?>" style="margin-top:1px;">
			                                                                <a href="<?php echo site_url('programme/agenda_detail/'.$s['id']);?>"><h3><?php echo $s['title'];?></h3></a>
			                                                                <div class="pembicara text-center">
			                                                                	<?php echo GetPembicaraAgenda($s['headline']);?>
			                                                                </div>
			                                                              </div>
			                                                              <?php if($is_login){
			                                                              	$cek = GetValue("id","side_event",array("id_member"=> "where/".$is_login,"id_calender"=> "where/".$s['id'],"is_delete"=> "where/0"));
			                                                              	if($cek) echo "<div class='join_event'><button class='btn-style1 merah_tipis' rel='".$s['id']."'>Cancel</button></div>";
			                                                              	else echo "<div class='join_event'><button class='btn-style1 hijau' rel='".$s['id']."'>Click to Join</button></div>";
			                                                              }?>
			                                                            </div>
			                                                            <div class="clearfix"></div>
		                                                             <?php }?>
	                                                            </div>
	                                                            <div class="clearfix"></div>
	                                                        </div>
	                                                    </div>
	                                                    <?php 
	                                                  	}
	                                                  }
	                                                  ?>
	                                                </div>
	                                            </div>
	                                          	<?php }
	                                          ?>
                                        </div>
                                        
                                        <div id="tab3" class="tab_single_content">
	                                        	<table class="tbl_agenda">
	                                        		<tr style="background:rgba(0,0,0,.1);">
	                                        			<?php
	                                        			foreach($day3_lokasi->result_array() as $k=> $r) {
	                                        				if($k==0) echo "<td class='aktip tdruang3' rel='ruang3".$r['id_lokasi']."' alt='ruang3'>".$opt_ruangan[$r['id_lokasi']]."</td>";
	                                        				else echo "<td class='tdruang3' rel='ruang3".$r['id_lokasi']."' alt='ruang3'>".$opt_ruangan[$r['id_lokasi']]."</td>";
	                                        			}
	                                        			?>
	                                        		</tr>
	                                        	</table>
	                                        	<?php
	                                        	foreach($day3_lokasi->result_array() as $k=> $rr) {
	                                        		?>
	                                            <div class="row ruang3 ruang3<?php echo $rr['id_lokasi'];?>" style="<?php echo $k==0 ? "display:block;" : "";?>">
	                                                <div class="col-md-12">
	                                                	<?php
	                                                	foreach($day3->result_array() as $r) {
	                                                		if($r['id_lokasi']==$rr['id_lokasi']) {
	                                                		?>
	                                                    <div class="schedule-listing">
	                                                        <div class="schedule-item">
	                                                            <div class="col-md-2 sc-timez"><?php echo FormatTanggalTimeAgenda($r['start_date'], $r['end_date']);?></div>
	                                                            <div class="col-md-10">
	                                                            	<div class="baris_event">
		                                                            	<div class="sc-infoz kat<?php echo $r['id_calender_cat'];?>">
		                                                                <a href="<?php echo site_url('programme/agenda_detail/'.$r['id']);?>"><h3><?php echo $r['title'];?></h3></a>
		                                                                <div class="pembicara text-center">
		                                                                	<?php echo GetPembicaraAgenda($r['headline']);?>
		                                                                </div>
		                                                              </div>
		                                                              <?php if($is_login){
		                                                              	$cek = GetValue("id","side_event",array("id_member"=> "where/".$is_login,"id_calender"=> "where/".$r['id'],"is_delete"=> "where/0"));
		                                                              	if($cek) echo "<div class='join_event'><button class='btn-style1 merah_tipis' rel='".$r['id']."'>Cancel</button></div>";
		                                                              	else echo "<div class='join_event'><button class='btn-style1 hijau' rel='".$r['id']."'>Click to Join</button></div>";
		                                                              }?>
			                                                          </div>
			                                                          <div class="clearfix baris"></div>
	                                                              <?php
	                                                              $q = GetAll("calender",array("id_lokasi"=> "where/".$r['id_lokasi'], "start_date"=> "where/".$r['start_date'], "end_date"=> "where/".$r['end_date'], "id !="=> "where/".$r['id']));
	                                                              foreach($q->result_array() as $s) {?>
	                                                              	<div class="baris_event">
			                                                              <div class="sc-infoz kat<?php echo $s['id_calender_cat'];?>" style="margin-top:1px;">
			                                                                <a href="<?php echo site_url('programme/agenda_detail/'.$s['id']);?>"><h3><?php echo $s['title'];?></h3></a>
			                                                                <div class="pembicara text-center">
			                                                                	<?php echo GetPembicaraAgenda($s['headline']);?>
			                                                                </div>
			                                                              </div>
			                                                              <?php if($is_login){
			                                                              	$cek = GetValue("id","side_event",array("id_member"=> "where/".$is_login,"id_calender"=> "where/".$s['id'],"is_delete"=> "where/0"));
			                                                              	if($cek) echo "<div class='join_event'><button class='btn-style1 merah_tipis' rel='".$s['id']."'>Cancel</button></div>";
			                                                              	else echo "<div class='join_event'><button class='btn-style1 hijau' rel='".$s['id']."'>Click to Join</button></div>";
		                                                              	}?>
			                                                            </div>
			                                                            <div class="clearfix"></div>
		                                                             <?php }?>
	                                                            </div>
	                                                            <div class="clearfix"></div>
	                                                        </div>
	                                                    </div>
	                                                    <?php 
	                                                  	}
	                                                  }
	                                                  ?>
	                                                </div>
	                                            </div>
	                                          	<?php }
	                                          ?>
                                        </div>
                                    </div>
                                    <div style="mt40">&nbsp;</div>
                                    <div class="col-md-2"><span class="biru">High Level Plenary</span></div>
                                    <div class="col-md-2"><span class="merah">Thematic Session</span></div>
                                    <div class="col-md-2"><span class="gelap">Side Events</span></div>
                                    <div class="col-md-2"><span class="jingga">Special Event</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
      </div>
      
      <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  		<script>
      	$(".tbl_agenda td").click(function(){
      		var rel = $(this).attr("rel");
      		var alt = $(this).attr("alt");
      		$(".tbl_agenda td.td"+alt).removeClass("aktip");
      		$(this).addClass("aktip");
      		$("."+alt).hide();
      		$("."+rel).show();
      	});
      	
      	$(".hijau").click(function(){
      		var but = $(this);
      		var conf = confirm('Are you sure to join this event?');
      		if(conf) {
      			var rel = $(this).attr("rel");
      			$.post("<?php echo site_url('programme/add_side');?>", {param : rel},  function(response) {
      				if(response=="ok") window.location="<?php echo site_url('programme/agenda');?>";
						});
      		}
      	});
      	
      	$(".merah_tipis").click(function(){
      		var but = $(this);
      		var conf = confirm('Are you sure?');
      		if(conf) {
      			var rel = $(this).attr("rel");
      			$.post("<?php echo site_url('programme/add_side/1');?>", {param : rel},  function(response) {
      				if(response=="ok") window.location="<?php echo site_url('programme/agenda');?>";
						});
      		}
      	});
      </script>