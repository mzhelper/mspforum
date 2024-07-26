<?php
$cls1=$cls2=$cls3=$cls4=$cls5="";
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
if($uri1=="about") $cls2="current";
else if($uri1=="programme") $cls3="current";
else if($uri1=="contact") $cls5="current";
else $cls1="current";
?>
				<header style="position:fixed;">
            <div class="container menumsp">
                <div class="row">
                    <div class="col-md-12">
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="index.html">
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
                                <li><a class="active" href="#top">Home</a></li>
                                <li><a href="#section-about">About</a></li>
                                <li><a href="#section-speakers">Speakers</a></li>
                                <li><a href="#section-schedules">Schedules</a></li>
                                <li><a href="#section-register">Register</a></li>
                                <li><a href="#section-sponsors">Sponsors</a></li>
                            </ul>
                        </nav>

                    </div>
                    <!-- mainmenu close -->

                </div>
            </div>
        </header>
