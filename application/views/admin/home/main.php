<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin Page</title>
		<?php $this->load->view('admin/head'); ?>
	</head>
	<body>
		
		<!-- /LeftBar -->
		<aside>
			<?php $this->load->view('admin/home/leftBar'); ?>
		</aside>
		<!-- /End LeftBar -->
		
		<!-- /RightBar -->
		<div id="rightSide">
			
			<!-- topNav -->
				<?php $this->load->view('admin/home/topNav') ?>
			<!-- End topNav -->

			<!-- Content -->
				<?php $this->load->view($temp, $this->data) ?>
			<!-- End Content -->

			<div class="clear mt30"></div>

			<!-- /Footer -->
			<footer>
				<?php $this->load->view('admin/home/footer'); ?>
			</footer>
			<!-- /End footer -->
		</div>
		<!-- End /RightBar -->
		
		
	</body>
</html>