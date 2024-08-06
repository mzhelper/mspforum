<style>
.speak_agenda img{border-radius:10px;}
</style>
			<div id="content" class="no-bottom no-top">
            <div id="top"></div>
						<div><img src="<?php echo base_url()."uploads/bg_about.jpg";?>" width="100%"></div>
						<section id="section-about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center mt40">
                            <h2 class="wow fadeInUp">Prominent Speakers</h2>
                            <div class="small-border"></div>
                        </div>
                        <div class="col-md-12 text-center">
                        	<?php
                        	foreach($val->result_array() as $key=> $r) {
	                        		$foto_speaker = file_exists("./uploads/".$r['image']) && $r['image'] ? $r['image'] : "foto_default.png";
	                        		if($key > 5 && $key%6==0) echo "<div class='clearfix'></div>";
									          	?>
															<div class="speak_agenda col-md-2 col-sm-6 col-xs-12">
																<a href="<?php echo site_url('about/speakers_detail/'.$r['slug']);?>">
																	<div class="team-header"><img src="<?php echo base_url().'uploads/'.$foto_speaker;?>" alt="Speakers"></div>
																	<div class="team-content">
																		<h5 class="tcenter" style="line-height:18px;"><?php echo $r['title'];?><br><small><?php echo $r['headline'];?></small></h5>
																	</div>
																</a>
															</div>
															<?php }
													?>
                        </div>
                    </div>
                </div>
            </section>
      </div>