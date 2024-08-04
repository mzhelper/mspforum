<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8" />
    <title>ADMIN - HLF MSP 2024</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Mz" name="author" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
    <style>
        .loader {position: fixed;left: 0;top: 0;width: 100%;height: 100%;background-color: #F5F8FA;z-index: 9998;text-align: center;}
        .plane-container {position: absolute;top: 50%;left: 50%;}
    </style>
    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
</head>
<body class="light">
	<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<main>
    <div id="primary" class="p-t-b-100 height-full" style="padding-top:12% !important;background: #0F5096;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-md-auto">
                    <div class="shadow r-10">
                    <div class="row grid">
                        <div class="col-md-12 white p-40" style="border-radius:5px;">
                           <form class="form-material" action="<?php echo base_url();?>login/cek_login" method="POST">
                                <!-- Input -->
                                <div class="body">
                                		<div style="text-align:center;"><img src="<?php echo base_url();?>assets/images/logo.png"><br><br></div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="username" type="text" class="form-control">
                                            <label class="form-label">Username</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="password" type="password" class="form-control">
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-danger btn-sm pl-4 pr-4 btn-block" style="background:#D20A2D !important;" value="Log In">
                                </div>
                                <!-- #END# Input -->
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="<?php echo base_url();?>assets/js/app.js"></script>
</body>
</html>