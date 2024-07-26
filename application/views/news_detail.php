			<div id="content" class="no-bottom no-top">
            <div id="top"></div>
						<div><img src="<?php echo base_url()."uploads/bg_about.jpg";?>" width="100%"></div>
						<section id="section-schedules" class="no-top no-bottom text-dark" data-stellar-background-ratio=".2" style="background:#fff;">
                <div class="pt40 pb80">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="wow fadeInUp"><?php echo $val['title'];?></h2>
                                <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 row" style="margin-left:10px;">
															<img align="left" width="40%" style="padding-right:10px;" src="<?php echo base_url().'uploads/'.$val['image'];?>" title="<?php echo $val['title'];?>" alt="<?php echo $val['title'];?>">
															<?php echo $val['contents'];?>
															<div class="clearfix"></div>
															<ul style="margin-top:20px;">
																<li><span>Date: <?php echo $dt = FormatTanggal($val['publish_date']);?> WIB</li>
																<li><span>Tags: <?php echo $val['seo_title'];?></li>
															</ul>
														</div>
                         </div>
                    </div>
                </div>
            </section>
      </div>