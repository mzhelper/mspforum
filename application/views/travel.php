<style>
.subtheme div, .subtheme span{padding:20px;border-radius:10px;}
</style>
			<div id="content" class="no-bottom no-top">
            <div id="top"></div>
						<div><img src="<?php echo base_url()."uploads/bg_about.jpg";?>" width="100%"></div>
						<section id="section-about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="wow fadeInUp"><?php echo $val[1]['title'];?></h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <div class="col-md-12">
                        		<div class="col-md-6">
	                            <?php echo $val[1]['contents'];?>
	                          </div>
                            <div class="col-md-6">
	                            <p class="lead">
	                            	<img src="<?php echo base_url()."uploads/".$val[1]['image'];?>" width="100%">
	                            </p>
	                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <br><br>
                        <div class="col-md-12 text-center">
                            <h2 class="wow fadeInUp">Venue</h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <?php 
                        $k=0;
                        foreach($q->result_array() as $r) {
                        	if($r['id'] > 1 && $r['id'] != 6) {
                        		$k++;
                        		if($r['id']%2==1){
                        		?>
		                        <div class="col-md-12">
		                        		<div class="col-md-6">
			                            <?php echo $r['contents'];?>
			                          </div>
		                            <div class="col-md-6">
			                            <p class="lead">
			                            	<img src="<?php echo base_url()."uploads/".$r['image'];?>" width="100%">
			                            </p>
			                          </div>
		                        </div>
		                        <div class="clearfix"></div>
                        		<br><br>
                      			<?php } else {?>
                      			<div class="col-md-12">
		                        		<div class="col-md-6">
			                            <p class="lead">
			                            	<img src="<?php echo base_url()."uploads/".$r['image'];?>" width="100%">
			                            </p>
			                          </div>
			                          <div class="col-md-6">
			                            <?php echo $r['contents'];?>
			                          </div>
		                        </div>
		                        <div class="clearfix"></div>
                        		<br><br>
                      			<?php
                      			}
                      		}
                      	}?>
                      	<div class="col-md-12 text-center">
                            <h2 class="wow fadeInUp"><?php echo $val[6]['title'];?></h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                      	<div class="col-md-12">
                        		<div class="col-md-6">
	                            <?php echo $val[6]['contents'];?>
	                          </div>
                            <div class="col-md-6">
	                            <p class="lead">
	                            	<img src="<?php echo base_url()."uploads/".$val[6]['image'];?>" width="100%">
	                            </p>
	                          </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        <br><br>
                        <div class="col-md-12">
                        	<a href="#">
                        		<img src="<?php echo base_url()."uploads/complete_travel_info.png";?>" width="100%">
                        	</a>
                        </div>
                    </div>
                </div>
            </section>
      </div>