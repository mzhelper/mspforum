			<div id="content" class="no-bottom no-top">
            <div id="top"></div>
						<div><img src="<?php echo base_url()."uploads/bg_about.jpg";?>" width="100%"></div>
						<section id="section-about">
                <div class="container">
                    <div class="row">
                        <?php
                        $this->session->set_userdata("dao_event", $val['id']);
                        $foto = file_exists("./uploads/".$val['photo']) && $val['photo'] ? $val['photo'] : "foto_default.png";
                        ?>
                        <div class="col-md-12">
                        		<div class="col-md-12">
	                            <img style="border-radius:50%;margin-right:30px;" width="150" height="150" src="<?php echo base_url()."uploads/".$foto;?>" align="left">
	                            <?php echo "<br><h2>".$val['firstname']." ".$val['lastname']."</h2><br>";?>
	                            <?php echo nl2br($val['bio']);?>
	                          </div>       
                        </div>
                        <div class="col-md-12" style="border-bottom:1px solid #ddd;padding-top:30px;"></div>
                        <div class="col-md-12 wow fadeInUp">
                            <div class="de_tab tab_style_4 text-center">
                                <?php
                                //$day1 = $this->db->query("select a.*,b.status from kg_calender a inner join kg_side_event_dao b on b.id_calender=a.id WHERE b.id_member='".$val['id']."' AND a.is_delete=0 AND (b.status='Approve' || b.status='Pending') ORDER BY a.start_date asc");
                                $day1 = $this->db->query("select a.*,b.status from kg_calender a inner join kg_side_event_dao b on b.id_calender=a.id WHERE b.id_member='".$val['id']."' AND a.is_delete=0 AND (b.status='Approve') ORDER BY a.start_date asc");
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
                                                            		<?php echo "<b>Status : ".strtoupper($r['status'])."</b><br>";?>
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