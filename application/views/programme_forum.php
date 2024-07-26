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
                            <h2 class="wow fadeInUp"><?php echo $val['title'];?></h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <div class="col-md-12">
                        		<div class="col-md-3">
                        			<div class="box_forum">
                        				<span>12</span>
                        				<label>Thematic Parallel Sessions</label>
                        			</div>
	                            <div class="box_forum">
                        				<span class="forum_kecil">+/-60</span>
                        				<label>Speakers</label>
                        			</div>
	                          </div>
                            <div class="col-md-9">
	                            <?php echo $val['contents'];?>
	                          </div>
                        </div>
                    </div>
                </div>
            </section>
      </div>