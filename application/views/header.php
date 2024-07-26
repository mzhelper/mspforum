<?php
$cls1=$cls2=$cls3=$cls4=$cls5="";
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
if($uri1=="about") $cls2="active";
else if($uri1=="programme") $cls3="active";
else if($uri1=="news") $cls4="active";
else if($uri1=="travel") $cls5="active";
else $cls1="active";
?>
				<header style="position:fixed;">
            <div class="container menumsp">
                <div class="row">
                    <div class="col-md-12">
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="<?php echo site_url();?>">
                                <img class="logo" src="<?php echo base_url();?>uploads/LOGO-HLF-MSP-HORIZONTAL.png" alt="" width="120">
                                <img class="logo-2" src="<?php echo base_url();?>uploads/LOGO-HLF-MSP-HORIZONTAL.png" alt="" width="80">
                            </a>
                        </div>
                        <!-- logo close -->

                        <!-- small button begin -->
                        <span id="menu-btn"></span>
                        <!-- small button close -->

                        <!-- mainmenu begin -->
                        <nav>
                            <ul id="mainmenu">
                                <li><a class="<?php echo $cls1;?>" href="<?php echo site_url('home');?>">Home</a></li>
                                <!--<li><a class="<?php echo $cls2;?>" href="<?php echo site_url('about/overview');?>">About the Programme</a></li>-->
                                <li><a href="#" class="<?php echo $cls3;?>">Programme</a>
                                	<ul class="submenu">
                                		<li><a href="<?php echo site_url('about/overview');?>" style="white-space:nowrap;">About the Programme</a></li>
                                		<li><a href="<?php echo site_url('programme/agenda');?>">Event Agenda</a></li>
                                	</ul>
                                </li>
                                <li><a href="#" class="<?php echo $cls4;?>">Publications</a>
                                	<ul class="submenu">
                                		<li><a href="<?php echo site_url('news');?>">News</a></li>
                                		<li><a href="<?php echo site_url('news/documentation');?>">Documentations</a></li>
                                	</ul>
                                </li>
                                <li><a class="<?php echo $cls5;?>" href="<?php echo site_url('travel');?>">Travel Info</a></li>
                                <?php if(!GetUserID()){?>
	                                <li><a href="<?php echo site_url('register/login');?>" class="regz" style="background:#0F6EB9;padding:0px;margin-top:25px;margin-left:20px;color:#fff;border-radius:10px;padding:0px 10px;">Login</a></li>
	                                <!--<li><a href="<?php echo site_url('register');?>" class="regz" style="background:#D20A2D;padding:0px;margin-top:25px;margin-left:20px;color:#fff;border-radius:10px;padding:0px 10px;">Register</a></li>
	                                -->
	                               <?php } else {?>
	                                <li><a href="<?php echo site_url('myaccount');?>" class="regz" style="background:#0F6EB9;padding:0px;margin-top:25px;margin-left:20px;color:#fff;border-radius:10px;padding:0px 10px;">My Account</a></li>
	                                <li><a href="<?php echo site_url('register/logout');?>" class="regz" style="background:#D20A2D;padding:0px;margin-top:25px;margin-left:20px;color:#fff;border-radius:10px;padding:0px 10px;">Logout</a></li>
	                               <?php }?>
                            </ul>
                        </nav>

                    </div>
                    <!-- mainmenu close -->

                </div>
            </div>
        </header>
