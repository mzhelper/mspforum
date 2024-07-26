			<div id="header-panel" class="wrapper header-parallax" style="margin-bottom: 0px;">
				<div class="header-image header-image-about container"></div>
				<div class="page-title" style="bottom: 50px;">
					<h1>About HLF MSP</h1>
				</div>
			</div>
			
			<div id="main" class="wrapper">
				<div class="main-content container">
					<!-- About -->
					<h2 class="main-title">Organizing Committee</h2>
					<table class="mztable" style="margin:auto;">
						<?php
		        	$q = GetAll("news",array("publish_date"=> "order/asc", "is_publish"=> "where/1", "id_news_cat"=> "where/3"));
		          foreach($q->result_array() as $k=> $r) {
		          	$clsz = $k==0 ? "current" : "";
		          	echo "<tr>";
		          	if($r['image']) echo "<td><img src='".base_url()."uploads/".$r['image']."' width='100'></td>";
		          	else echo "<tr>&nbsp;</td>";
		          	echo "<td valign='top'><span style='opacity:0.5'>Jabatan di Keppres : <i>".$r['headline']."</i></span><br>
		          	Name : <b>".$r['title']."</b><br>
		          	Jabatan Formal : ".$r['seo_title']."</td>";
		          	echo "</tr>";
		          }
		          ?>
		       </table>
				</div>
			</div>