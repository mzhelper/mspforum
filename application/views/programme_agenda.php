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
                                    <?php
	                                  $is_login = GetUserID();
	                                  $temp_tgl=0;
	                                  ?>
                                    <div class="de_tab_content text-left">
                                        <div id="tab1" class="tab_single_content">
	                                            <div class="row">
	                                                <div class="col-md-9">
	                                                	<?php
	                                                	foreach($day1->result_array() as $r) {
	                                                		$tgl = substr($r['start_date'],0,10);
	                                                		if($temp_tgl != $tgl) {
	                                                			$temp_tgl = $tgl;
	                                                			echo "<h3 style='padding-left:40px;' class='padding30'>".date("l - F d, Y", strtotime($tgl))."</h3>";
	                                                		}
	                                                		?>
	                                                		<div class="schedule-listing">
	                                                        <div class="schedule-item">
	                                                            <div class="col-md-3 sc-timez"><?php echo FormatTanggalTimeAgenda($r['start_date'], $r['end_date']);?></div>
	                                                            <div class="col-md-9">
	                                                            	<div class="baris_event">
		                                                            	<div class="sc-infoz" style="background:<?php echo $warna[$r['id_calender_cat']];?>">
		                                                            		<?php echo $opt_ruangan[$r['id_lokasi']];?>
		                                                                <a href="<?php echo site_url('programme/agenda_detail/'.$r['slug']);?>"><h3><?php echo $r['title'];?></h3></a>
		                                                                <div class="pembicara">
		                                                                	<?php echo GetPembicaraAgenda($r['headline']);?>
		                                                                </div>
		                                                              </div>
			                                                          </div>
	                                                            </div>
	                                                            <div class="clearfix"></div>
	                                                        </div>
	                                                    </div>
	                                                    <?php 
	                                                  }
	                                                  ?>
	                                                </div>
	                                                <div class="col-md-3 pt80">
	                                                	<label style="font-size:14px;">Filter By Date</label>
	                                                	<select class="by_date form-control">
	                                                		<option value="">All</option>
	                                                		<option value="1" <?php echo $param==1 ? "selected":"";?>>Sunday - September 1, 2024</option>
	                                                		<option value="2" <?php echo $param==2 ? "selected":"";?>>Monday - September 2, 2024</option>
	                                                		<option value="3" <?php echo $param==3 ? "selected":"";?>>Tuesday - September 3, 2024</option>
	                                                	</select>
	                                                	<label class="pt20" style="font-size:14px;padding-bottom:6px;">Filter By Type</label>
	                                                	<?php
								                                    foreach($opt_tema as $k=> $v) {
								                                    	echo "<div class='by_tema' style='margin-bottom:20px;white-space:nowrap;cursor:pointer;' rel='9".$k."'><span style='background:".$warna[$k].";padding:5px 10px;color:#fff;border-radius:10px;font-size:12px;'>".$v."</span></div>";
								                                    }
								                                    ?>
								                                    <label class="pt20" style="font-size:14px;padding-bottom:6px;">Recently active attendees</label>
								                                    <div class="clearfix"></div>
								                                    <?php
												                        		$q = $this->db->query("select a.id_member,b.photo,b.firstname from kg_side_event a inner join kg_member b on b.id=a.id_member WHERE a.status='Approve' GROUP By a.id_member ORDER BY a.create_date desc");
												                        		foreach($q->result_array() as $r) {
												                        			$foto = file_exists("./uploads/".$r['photo']) && $r['photo'] ? $r['photo'] : "foto_default.png";
																				          	?>
																											<div style="float:left;padding-right:10px;">
																												<a href="<?php echo site_url('about/profile/'.$r['id_member']);?>">
																													<img width="40" height="40" style="border-radius:50%;border:1px solid #ccc;" src="<?php echo base_url().'uploads/'.$foto;?>" title="<?php echo $r['firstname'];?>" alt="<?php echo $r['firstname'];?>">
																												</a>
																											</div>
																										<?php }
																									?>
	                                                </div>
	                                            </div>
                                        </div>
                                    </div>
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
      	
      	$(".by_date").change(function(){
      		var rel = $(this).val();
      		window.location="<?php echo site_url('programme/agenda/"+rel+"');?>";
      	});
      	$(".by_tema").click(function(){
      		var rel = $(this).attr("rel");
      		window.location="<?php echo site_url('programme/agenda/"+rel+"');?>";
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