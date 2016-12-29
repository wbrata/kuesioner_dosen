<!DOCTYPE html>
<html lang="en">
	<!-- HEAD -->
	<?php $this->load->view('main_html_admin/head');?>
	<!-- /HEAD -->
	<body class="nav-md">
		<div class="container body">
		  <div class="main_container menu_fixed">
		  	<!-- LEFT MENU -->
		  	<?php $this->load->view('main_html_admin/left_menu');?>
		  	<!-- /LEFT MENU -->
		  	<!-- TOP MENU -->
		  	<?php $this->load->view('main_html_admin/top_menu');?>
		  	<!-- /TOP MENU -->
		  	<!-- PAGE CONTENT -->
		  	<?php $this->load->view('main_html_admin/page_content');?>
		  	<!-- /PAGE CONTENT -->
		  	<!-- FOOTER -->
		  	<?php $this->load->view('main_html_admin/foot');?>
		  	<!-- /FOOTER -->
		  </div>
		</div>

		<!-- SCRIPT -->  
		<?php $this->load->view('main_html_admin/script');?>
		<!-- /SCRIPT -->
	</body>
</html>