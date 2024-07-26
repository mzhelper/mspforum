			<link href='<?php echo base_url();?>assets/plugins/kalender/core/main.css' rel='stylesheet' />
			<link href='<?php echo base_url();?>assets/plugins/kalender/daygrid/main.css' rel='stylesheet' />
			<script src='<?php echo base_url();?>assets/plugins/kalender/core/main.js'></script>
			<script src='<?php echo base_url();?>assets/plugins/kalender/interaction/main.js'></script>
			<script src='<?php echo base_url();?>assets/plugins/kalender/daygrid/main.js'></script>
			<script>
			  document.addEventListener('DOMContentLoaded', function() {
			    var calendarEl = document.getElementById('calendarz');
			
			    var calendar = new FullCalendar.Calendar(calendarEl, {
			      plugins: [ 'interaction', 'dayGrid' ],
			      defaultDate: "<?php echo date('Y-m-d');?>",
			      editable: true,
			      eventLimit: true, // allow "more" link when too many events
			      events: [<?php echo $event_list;?>]
			    });
			
			    calendar.render();
			  });
			</script>
			
			<div id="header-panel" class="wrapper header-parallax" style="margin-bottom: 0px;">
				<div class="header-image header-image-about container"></div>
				<div class="page-title" style="bottom: 50px;">
					<h1>About HLF MSP</h1>
				</div>
			</div>
			
			<div id="main" class="wrapper">
				<div class="main-content container">
					<!-- About -->
					<h2 class="main-title">List of Programme</h2>
					<div id='calendarz'></div>
				</div>
			</div>