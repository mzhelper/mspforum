<!DOCTYPE html>
<html lang="zxx">
		<head>
		    <meta charset="utf-8" />
		    <title>ADMIN - HLF MSP</title>
		    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		    <meta content="Mz" name="author" />
		    <link rel="icon" href="<?php echo base_url();?>assets/images/favicon_32.png">
		    <!-- CSS -->
		    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
		    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/hlf_admin.css">
		    <style>
		        .loader {position: fixed;left: 0;top: 0;width: 100%;height: 100%;background-color: #F5F8FA;z-index: 9998;text-align: center;}
		        .plane-container {position: absolute;top: 50%;left: 50%;}
		    </style>
		    <!--<script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>-->
		    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
		</head>
		<body class="light">
		<div id="app">
			<?php $this->load->view($menu); ?>
			<div class="page has-sidebar-left">
				<?php $this->load->view($header); ?>
				
				<?php if($main) $this->load->view($main); ?>
			</div>
			
			<?php $this->load->view($footer); ?>
			<div class="control-sidebar-bg shadow white fixed"></div>
		</div>
		<script src="<?php echo base_url();?>assets/js/app.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="<?php echo base_url();?>assets/plugins/froala/froala_editor.pkgd.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/plugins/froala/froala_style.min.css" rel="stylesheet" />
		<script src="<?php echo base_url();?>assets/plugins/froala/froala_editor.pkgd.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/froala/editors.js"></script>
		<!--<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>-->
</body>
</html>