<!DOCTYPE html>
<!--[if gt IE 9]>	<!--><html dir="ltr" lang="en-US" class="gt-ie9 non-ie"> <!--<![endif]-->
<head>

<!-- meta tags -->
<meta charset="UTF-8">
<meta name="author" content="Granthweb">
<meta name="description" content="High Level Forum on Multi Stakeholder Partnership (HLF MSP) 2024">
<meta name="keywords" content="High, Level, Forum, on, Multi, Stakeholder, Partnership, HLF MSP 2024, Forum, International, Bali, Indonesia, Nusa Dua, Partnership">
<meta name="robots" content="index, follow">

<!-- mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- favicon -->
<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/x-icon">

<!-- page title -->
<title>HLF MSP 2024</title>

<!-- css stylesheets -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/magnific-popup.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.countdown.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/color.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/colors/orange.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/colors/gradient-1.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bg.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/hlf.css" type="text/css">

<!-- js head -->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/plugins/jquery-1.8.1.min.js"><\/script>')</script>-->
</head>

<!-- body -->
<body id="homepage">

    <div id="wrapper">

        <!--Header-->
				<?php $this->load->view($header);?>
							
				<!--Main-->
				<?php $this->load->view($main_content);?>
			
				<!--Footer-->
				<?php $this->load->view($footer);?>
	</div>
	<!-- /#wrapper -->

	<!-- js body -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jquery-1.8.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jquery.countdown.js"></script>
	<script>
		$('#countdown').countdown({until: new Date(2024, 9-1, 24)});
	</script>
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.isotope.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/easing.js"></script>
  <script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.countTo.js"></script>
  <script src="<?php echo base_url();?>assets/js/wow.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/enquire.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.plugin.js"></script>
  <!--<script src="<?php echo base_url();?>assets/js/jquery.countdown.js"></script>
  <script src="<?php echo base_url();?>assets/js/countdown-custom.js"></script>
  <script src="<?php echo base_url();?>assets/js/map.js"></script>-->
  <script src="<?php echo base_url();?>assets/js/mspforum.js"></script>
	<script src="<?php echo base_url();?>assets/js/validation.js"></script>
</body>
<!-- /body -->
</html>