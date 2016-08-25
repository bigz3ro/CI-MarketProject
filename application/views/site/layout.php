<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('site/head.php') ?>
	</head>
	<body>
		<a href="#" id="back_to_top">
			<img src="<?php echo public_url() ?>/site/images/top.png" />
		</a>
		<!-- the wraper -->
		<div class="wraper">
			<!-- the header -->
			<header class="header">
				<?php $this->load->view('site/header',$this->data); ?>
			</header>
			<!-- End header-->
			
			<!-- //Main container -->
			<section id="container">
				<!-- Left bar -->
				<aside>
					<div class="left">
						<?php $this->load->view('site/leftBar', $this->data); ?>
					</div>
				</aside>
				<!-- End left bar -->
				<!-- /Content -->
				<article>
					<?php $this->load->view($temp, $this->data); ?>
				</article>
				<!-- /End Content -->
				
				<!-- Right bar -->
				<aside>
					<?php $this->load->view('site/rightBar.php'); ?>
				</aside>
				<!-- Right bar -->
			</section>
			<!-- //Main container -->
			
			<!-- Footer -->
			<footer>
				<?php $this->load->view('site/footer.php'); ?>
			</footer>
			<!-- End footer -->
		</div>
		<!-- End wraper -->
	</body>
</html>