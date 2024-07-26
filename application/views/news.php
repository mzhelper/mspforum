			<div id="content" class="no-bottom no-top">
            <div id="top"></div>
						<div><img src="<?php echo base_url()."uploads/bg_about.jpg";?>" width="100%"></div>
						<section id="section-schedules" class="no-top no-bottom text-dark" data-stellar-background-ratio=".2" style="background:#fff;">
                <div class="pt40 pb80">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="wow fadeInUp">News</h2>
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
                    </div>
                </div>
            </section>
      </div>