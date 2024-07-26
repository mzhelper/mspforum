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
                        <div class="col-md-12">
                        		<div class="col-md-12 text-center">
	                            <p class="lead">
	                            	<img src="<?php echo base_url()."uploads/".$val['image'];?>" width="200">
	                            </p>
	                          </div>
	                          <div class="col-md-12">
	                            <?php echo $val['contents'];?>
	                          </div>                            
                        </div>
                    </div>
                </div>
            </section>
      </div>