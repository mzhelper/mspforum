			<div id="header-panel" class="wrapper header-parallax" style="margin-bottom: 0px;">
				<div class="header-image header-image-about container"></div>
				<div class="page-title" style="bottom: 50px;">
					<h1>Welcome Messages</h1>
				</div>
			</div>
			
			<div id="main" class="wrapper">
				<div class="main-content container">
					<div class="tabs-wrapper tabs-centered clearfix">
						<ul class="tabs">
							<?php
		        	$q = GetAll("news",array("publish_date"=> "order/asc", "is_publish"=> "where/1", "id_news_cat"=> "where/2"));
		          foreach($q->result_array() as $k=> $r) {
		          	if($k==0) echo "<li class='current'><a href='#'>".$r['title']."</a></li>";
		          	else echo "<li><a href='#'>".$r['title']."</a></li>";
		          	$link = site_url('about/welcome_messages_detail/'.$r['slug']);
		          }
		          ?>
						</ul>
					</div>
					<ul class="tabs-content" style="overflow: hidden; height: 299px;">
						<?php
		        	$q = GetAll("news",array("publish_date"=> "order/asc", "is_publish"=> "where/1", "id_news_cat"=> "where/2"));
		          foreach($q->result_array() as $k=> $r) {
		          	$clsz = $k==0 ? "current" : "";
		          ?>
							<li class="<?php echo $clsz;?>">
								<!--<div class="tab-title"><a href="#">One</a></div>-->
								<div class="tab-content" style="overflow:hidden;">
									<div class="type-portfolio type-portfolio-half clearfix">
										<!-- portfolio single content -->
										<div class="post">
											<div class="row">
												<div class="post-header col-md-4">
													<img src="<?php echo base_url().'uploads/'.$r['image'];?>" title="<?php echo $r['title'];?>" alt="<?php echo $r['title'];?>">
												</div>
												<div class="post-body col-md-7 row" style="margin-left:10px;">
													<h2 style="margin-bottom:0px;font-weight:bold;"><?php echo $r['title'];?></h2>
													<h5 style="margin-top:5px;margin-bottom:20px;"><?php echo $r['headline'];?></h5>
													<?php echo $r['contents'];?>
												</div>
											</div>
										</div>
										<!-- /portfolio single content -->					
									</div>
								</div>
							</li>
							<?php }?>
					</ul>
				</div>
			</div>