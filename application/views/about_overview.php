<style>
.subtheme div{padding:0px;border-radius:10px;}
.subtheme span{display:block !important;border-radius:10px;padding:10px;}
@media(max-width: 799px) {
	.subtheme div{padding:0px;margin-bottom:0px;}
}
</style>
			<div id="content" class="no-bottom no-top">
            <div id="top"></div>
						<div><img src="<?php echo base_url()."uploads/bg_about.jpg";?>" width="100%"></div>
						<section id="section-about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="wow fadeInUp">About HLF MSP 2024</h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <div class="col-md-12">
                        		<div class="col-md-6">
	                            <?php echo $val['contents'];?>
	                          </div>
                            <div class="col-md-6">
	                            <p class="lead">
	                            	<img src="<?php echo base_url()."uploads/".$val['file'];?>" width="100%">
	                            </p>
	                          </div>
                        </div>
                        <div class="col-md-12 text-center subtheme">
                        	<br>
                        	<?php echo $val['contents_eng'];?>
                        </div>
                    </div>
                </div>
            </section>
            
            <?php
            $val = GetAll("contents",array("id"=> "where/2"))->result_array()[0];
            ?>
            <section id="section-forum" style="background-color:#ddd;">
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
            
            <?php
            $val = GetAll("contents",array("id"=> "where/4"))->result_array()[0];
            ?>
            <section id="section-special-event">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="wow fadeInUp"><?php echo $val['title'];?></h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <div class="col-md-12">
                        		<div class="col-md-12">
	                            <?php echo $val['contents'];?>
	                          </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <?php
            $val = GetAll("contents",array("id"=> "where/3"))->result_array()[0];
            ?>
            <section id="section-special-event" style="background-color:#ddd;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="wow fadeInUp"><?php echo $val['title'];?></h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <div class="col-md-12">
                        		<div class="col-md-9">
	                            <?php echo $val['contents'];?>
	                          </div>
	                          <div class="col-md-3">
                        			<div class="box_nonforum">
                        				<!--<span>10</span>-->
                        				<label>Cultural Nights</label>
                        			</div>
	                            <div class="box_nonforum">
                        				<label>Exhibition</label>
                        			</div>
                        			<div class="box_nonforum">
                        				<label>Gala Diner</label>
                        			</div>
	                          </div>
                        </div>
                    </div>
                </div>
            </section>
      </div>