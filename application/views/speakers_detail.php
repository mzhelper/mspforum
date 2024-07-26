			<div id="content" class="no-bottom no-top">
            <div id="top"></div>
						<div><img src="<?php echo base_url()."uploads/bg_about.jpg";?>" width="100%"></div>
						<section id="section-about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="wow fadeInUp"><?php echo $val['title'];?><br><small><?php echo $val['headline'];?></small></h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <?php
                        $foto_speaker = file_exists("./uploads/".$val['image']) && $val['image'] ? $val['image'] : "foto_default.png";
                        ?>
                        <div class="col-md-12">
                        		<div class="col-md-12 text-center">
	                            <p class="lead">
	                            	<img src="<?php echo base_url()."uploads/".$foto_speaker;?>" width="200">
	                            </p>
	                          </div>
	                          <div class="col-md-12">
	                            <?php echo $val['contents'];?>
	                          </div>                            
                        </div>
                        
                        <div class="col-md-12" style="border-bottom:1px solid #ddd;padding-top:30px;"></div>
                        <div class="col-md-12 wow fadeInUp">
                            <div class="de_tab tab_style_4 text-center">
                                <?php
                                $day1 = $this->db->query("select a.* from kg_calender a WHERE a.headline like '%-".$val['id']."-%' AND a.is_delete=0 ORDER BY a.start_date asc");
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
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
      </div>