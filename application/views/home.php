<div id="content" class="no-bottom no-top">
            <div id="top"></div>

            <!-- section begin -->
            <section id="section-intro" class="full-height relative owl-slide-wrapper no-top no-bottom text-white" data-stellar-background-ratio=".2">
                <div class="overlay-gradient" style="background:none;opacity:1;">

                    <div class="owl-slider-nav">
                        <div class="next"></div>
                        <div class="prev"></div>
                    </div>

                    <div id="custom-owl-slider" class="owl-slide" data-scroll-speed="2">
                        <?php
                		$q = GetAll("banner",array("is_publish"=> "where/1", "is_delete"=> "where/0", "urutan"=> "order/asc"));
                		foreach($q->result_array() as $r) {?>
	                        <div class="item">
	                            <img src="<?php echo base_url().'uploads/'.$r['file'];?>" alt="">
	                        </div>
	                        <?php 
	                      }?>
                    </div>

                    <div class="center-y relative">
                        <div class="container">
                            <div class="row">
                                <?php
                            	$q = GetAll("banner",array("is_publish"=> "where/1", "is_delete"=> "where/0", "urutan"=> "order/asc", "limit"=> "0/1"));
                            	foreach($q->result_array() as $r) {?>
	                            	<div class="item_info">
	                                <div class="col-md-8" style="border-radius:10px;background-color:rgba(0, 0, 0, 0.2);">
																		<div class="spacer-half sm-hide"></div>
	                                  <h1 class="bigz"><?php echo $r['headline'];?></h1>
	                                  <div class="spacer-single"></div>
	                                  <div class="subtitle s2"><span><i class="icon icon-calendar"></i>September 1-3, 2024</span><span><i class="icon icon-map-marker"></i>Bali, Indonesia</span></div>
	                                </div>
	                                <div class="countdown col-md-4 text-center" style="padding-right:0px;padding-top:0px;">
	                                    <div class="inline-block md-float-right">
	                                        <div class="spacer-single sm-hide"></div>
	                                        <!--<div class="subtitle s3 mb20">Event Begin In</div>-->
	                                        <div class="clearfix"></div>
	                                        <div id="countdown"></div>
	                                        <div class="clearfix"></div>
	                                        <?php
	                                        if(GetUserID()){?>
	                                        <div style="margin-top:20px;">
	                                        	<a href="<?php echo site_url('register');?>" class="btn-custom scroll-to" style="background:#D20A2D;">Register Now</a>
	                                        </div>
	                                      	<?php }?>
	                                    </div>
	                                </div>
	                              </div>
	                              <?php 
	                            }?>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="wow fadeInUp">About HLF MSP 2024</h2>
                            <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                        </div>
                        <div class="col-md-12 text-center">
                            <p class="lead wow fadeInUp">
                            	<?php echo GetValue("headline","contents",array("id"=> "where/1"));?>
                            </p>
                            <p><a href="<?php echo site_url('about/overview');?>" class="link-style3">Read more &raquo;</a></p>
                        </div>
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <h2 class="wow fadeInUp">Prominent Speakers</h2>
                        <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="bg_box wow fadeInUp">
                      <div class="owl-carousel owl-sponsors">
                      	<?php
                      	$q = GetAll("leaders",array("urutan"=> "order/asc", "is_publish"=> "where/1"));
                      	foreach($q->result_array() as $r) {
                      		?>
			                    <div class="item">
			                        <div class="profile_pic text-center sm-mb30">
			                        	<a href="<?php echo site_url('about/speakers_detail/'.$r['slug']);?>">
			                            <figure class="s2 mb10">
			                                <img src="<?php echo base_url()."uploads/".$r['image'];?>" class="img-responsive" alt="">
			                            </figure>
			
			                            <h3><?php echo $r['title'];?></h3>
			                            <span class="subtitle"><?php echo $r['headline'];?></span>
			                          </a>
			                        </div>
			                    </div>
			                    <?php 
			                  }
			                  ?>
		                  </div>
	                  </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <?php if(GetUserID()) {?>
            <section id="section-fun-facts" class="no-top no-bottom text-light" data-stellar-background-ratio=".2" style="background:<?php echo base_url()."uploads/bg_reg.jpg";?>">
                <div class="overlay-gradients pt80 pb80">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                            	<div class="regz"><a href="<?php echo site_url('register');?>" style="color:#000;">Register here</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php } ?>
            <!-- section close -->


            <!-- section begin -->
            <section id="section-sponsorss" class="no-top no-bottom" data-stellar-background-ratio=".2">
                <div class="overlay-gradients pt80">
                    <div class="container relative">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-12 text-center">
						                        <h2 class="wow fadeInUp">Partners</h2>
						                        <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
						                    </div>

                                <div class="col-md-12 text-center">
                                    <div class="owl-carousel owl-sponsors ">
                                    	<?php
							                      	$q = GetAll("partners",array("urutan"=> "order/asc", "is_publish"=> "where/1"));
							                      	foreach($q->result_array() as $r) {
							                      		?>
                                        <div class="item"><img src="<?php echo base_url()."uploads/".$r['image'];?>" alt="<?php echo $r['title'];?>"></div>
                                        <?php 
                                      } 
                                      ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->
            
            <section id="section-about">
                <div class="container">
                    <div class="col-md-12 text-center">
                        <h2 class="wow fadeInUp">Latest News</h2>
                        <div class="small-border wow fadeInUp" data-wow-delay=".2s"></div>
                    </div>

                    <div class="clearfix"></div>
                    <?php
					        	$q = GetAll("news",array("publish_date"=> "order/asc", "is_publish"=> "where/1", "id_news_cat"=> "where/1"));
					          foreach($q->result_array() as $r) {
					          	$link = site_url('news/detail/'.$r['slug']);
					          	$tgl = substr($r['publish_date'],8,2);
					          	$bln = GetMonth(intval(substr($r['publish_date'],5,2)));
					          	?>
	                    <div class="col-md-4 wow fadeIn">
	                        <div class="news_pic text-center sm-mb30">
	                            <figure class="s2s mb10">
	                            	<div class="box_img_news">
	                                <a class="simple-ajax-popup" href="<?php echo $link;?>">
	                                	<img src="<?php echo base_url().'uploads/'.$r['image'];?>" alt="">
	                                </a>
	                              </div>
	                            </figure>
	
	                            <h3><?php echo $r['title'];?></h3>
	                            <span class="subtitles">
	                            	<?php echo word_limiter(strip_tags($r['contents']), 10);?><br><a href="<?php echo $link;?>"><u>Read more</u></a>
	                            </span>	                            
	                        </div>
	                    </div>
	                    <?php 
	                  } ?>
                </div>
            </section>
        </div>