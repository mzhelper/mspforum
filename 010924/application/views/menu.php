<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-150px mt-3 mb-3 ml-3">
            <img src="<?php echo base_url();?>assets/images/logo.png" alt="">
        </div>
        <div class="relative">
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                    	<?php
                    	$avatar = $this->session->userdata("admin_instansi");
                    	$img = $avatar ? str_replace("admin/","",base_url()."uploads/".$avatar) : base_url()."assets/img/dummy/u2.png";
                    	?>
                      <img class="user_avatar" src="<?php echo $img;?>" alt="Avatar" title="Avatar">
                    </div>
                    <div class="float-left info text-white">
                        <h6 class="font-weight-light mt-2 mb-1 text-black"><b><?php echo $this->session->userdata("admin");?></b></h6>
                        <!--<div style="white-space:nowrap;">-->
	                        <?php echo GetValue("title","admin_grup",array("id"=> "where/".$this->session->userdata("admin_grup")));?> | 
	                        <a href="<?php echo site_url('login/logout');?>"><b>Logout</b></a>
                      	<!--</div>-->
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Home</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('banner');?>"><i class="icon icon-angle-right s-18"></i>Slider</a></li>
	                <li><a href="<?php echo site_url('leaders');?>"><i class="icon icon-angle-right s-18"></i>Leaders</a></li>
	                <li><a href="<?php echo site_url('partners');?>"><i class="icon icon-angle-right s-18"></i>Partners</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>About the Programme</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('content/content_detail/1');?>"><i class="icon icon-angle-right s-18"></i>Overview</a></li>
	                <!--<li><a href="<?php echo site_url('welcome');?>"><i class="icon icon-angle-right s-18"></i>Welcome Messages</a></li>
	                <li><a href="<?php echo site_url('committee');?>"><i class="icon icon-angle-right s-18"></i>Organizing Committee</a></li>-->
	                <li><a href="<?php echo site_url('content/content_detail/2');?>"><i class="icon icon-angle-right s-18"></i>Parallel Thematic Session</a></li>
	                <li><a href="<?php echo site_url('content/content_detail/3');?>"><i class="icon icon-angle-right s-18"></i>Special Event</a></li>
	                <li><a href="<?php echo site_url('content/content_detail/4');?>"><i class="icon icon-angle-right s-18"></i>Side Event</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="<?php echo site_url('news');?>">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>News</span>
           		</a>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Programme</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
                <li><a href="<?php echo site_url('calender/main/1');?>"><i class="icon icon-angle-right s-18"></i>High Level Plenary</a></li>
                <li><a href="<?php echo site_url('calender/main/3');?>"><i class="icon icon-angle-right s-18"></i>Side Events</a></li>
                <li><a href="<?php echo site_url('calender/main/4');?>"><i class="icon icon-angle-right s-18"></i>Special Event</a></li>
                <li><a href="<?php echo site_url('calender/main/2');?>"><i class="icon icon-angle-right s-18"></i>Thematic - SSTC</a></li>
                <li><a href="<?php echo site_url('calender/main/5');?>"><i class="icon icon-angle-right s-18"></i>Thematic - Sustainable Economy</a></li>
                <li><a href="<?php echo site_url('calender/main/6');?>"><i class="icon icon-angle-right s-18"></i>Thematic - Innovative Financing</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="<?php echo site_url('travel');?>">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Travel Info</span>
           		</a>
            </li>
            <li class="treeview">
            	<a href="<?php echo site_url('speakers');?>">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Speakers</span>
           		</a>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Registration</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
           			<li class="treeview">
           				<a href="#">
		            		<i class="icon icon-dialpad blue-text"></i>
		                <span>Create Account</span><i class="icon icon-angle-left s-18 pull-right"></i>
		           		</a>
		           		<ul class="treeview-menu">
			                <li><a href="<?php echo site_url('akun/main/7');?>"><i class="icon icon-angle-right s-18"></i>Head of State</a></li>
			                <li><a href="<?php echo site_url('akun/main/8');?>"><i class="icon icon-angle-right s-18"></i>Head of Delegation</a></li>
			                <li><a href="<?php echo site_url('akun/main/9');?>"><i class="icon icon-angle-right s-18"></i>Staff</a></li>
			                <li><a href="<?php echo site_url('akun/main/13');?>"><i class="icon icon-angle-right s-18"></i>International Organization</a></li>
			                <li><a href="<?php echo site_url('akun/main/14');?>"><i class="icon icon-angle-right s-18"></i>Non-Government Organization</a></li>
			                <li><a href="<?php echo site_url('akun/main/15');?>"><i class="icon icon-angle-right s-18"></i>Private</a></li>
			                <li><a href="<?php echo site_url('akun/main/16');?>"><i class="icon icon-angle-right s-18"></i>Philantrophy</a></li>
			            </ul>
			          </li>
			          <li>
			          	<a href="#">
		            		<i class="icon icon-dialpad blue-text"></i>
		                <span>Akreditation</span><i class="icon icon-angle-left s-18 pull-right"></i>
		           		</a>
		           		<ul class="treeview-menu">
			                <li><a href="<?php echo site_url('user/main/7');?>"><i class="icon icon-angle-right s-18"></i>Head of State</a></li>
			                <li><a href="<?php echo site_url('user/main/8');?>"><i class="icon icon-angle-right s-18"></i>Head of Delegation</a></li>
			                <li><a href="<?php echo site_url('user/main/9');?>"><i class="icon icon-angle-right s-18"></i>Staff</a></li>
			                <li><a href="<?php echo site_url('user/main/13');?>"><i class="icon icon-angle-right s-18"></i>International Organization</a></li>
			                <li><a href="<?php echo site_url('user/main/14');?>"><i class="icon icon-angle-right s-18"></i>Non-Government Organization</a></li>
			                <li><a href="<?php echo site_url('user/main/15');?>"><i class="icon icon-angle-right s-18"></i>Private</a></li>
			                <li><a href="<?php echo site_url('user/main/16');?>"><i class="icon icon-angle-right s-18"></i>Philantrophy</a></li>
			            </ul>
			          </li>
			          <li class="treeview">
           				<a href="<?php echo site_url('dao');?>">
		            		<i class="icon icon-dialpad blue-text"></i>
		                <span>DAO</span>
		           		</a>
			          </li>
			      	</ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Data Master</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('master/ruangan');?>"><i class="icon icon-angle-right s-18"></i>Ruangan</a></li>
	                <!--<li><a href="<?php echo site_url('master/image');?>"><i class="icon icon-angle-right s-18"></i>Bank Image</a></li>-->
	            </ul>
            </li>
            <!--<li class="treeview">
            	<a href="<?php echo site_url('content');?>">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Contents</span>
           		</a>
            </li>
            -->
            <!--
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Contact</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('contact');?>"><i class="icon icon-angle-right s-18"></i>All Contact</a></li>
	            </ul>
            </li>-->
        </ul>
    </section>
</aside>