<div class="content">
	<?php $this->load->view('site/home/slide', $this->data); ?>
	<div class="box-center"><!-- The box-center product-->
		<div class="tittle-box-center">
			<h2>Sản phẩm mới</h2>
		</div>
		<div class="box-content-center product"><!-- The box-content-center -->
		<?php foreach($product_new as $product): ?>
		<div class='product_item'>
			<h3>
			<a href="<?php echo base_url('product/view/'.$product->id) ?>" title="<?php echo $product->name; ?>">
				<?php echo $product->name; ?>
			</a>
			</h3>
			<div class='product_img'>
				<a  href="<?php echo base_url('product/view/'.$product->id) ?>" title="<?php echo $product->name; ?>">
					<img src="<?php echo base_url('upload').'/product/'.$product->image_link; ?>" alt=''/>
				</a>
			</div>
		<?php if($product->discount > 0): ?>
			<?php $price_new = $product->price - $product->discount; ?>
			<p class='price'>
				<?php echo number_format($price_new) ?>
				<span class="price_old"><?php echo number_format($product->price) ?></span>
			</p>
		<?php else: ?>
			<p><?php echo number_format($product->price) ?></p>
		<?php endif; ?>
			<center>
			<div class='raty' style='margin:10px 0px' id='9' data-score='4'></div>
			</center>
			<div class='action'>
				<p>Lượt xem: <b><?php echo $product->view ?></b></p>
				<a class='button' href="<?php echo base_url('product/view/'.$product->id);?>" title='Mua ngay'>Mua ngay</a>
				<div class='clear'></div>
			</div>
		</div>
		<?php endforeach; ?>
		<div class='clear'></div>
		</div><!-- End box-content-center -->
	</div>

	<div class="box-center"><!-- The box-center product-->
		<div class="tittle-box-center">
			<h2>Sản phẩm bán chạy</h2>
		</div>
		<div class="box-content-center product"><!-- The box-content-center -->
		<?php foreach($product_buyed as $buy): ?>
		<div class='product_item'>
			<h3>
			<a  href="<?php echo base_url('product/view/'.$product->id) ?>" title="<?php echo $buy->name; ?>">
				<?php echo $buy->name; ?>
			</a>
			</h3>
			<div class='product_img'>
				<a  href="<?php echo base_url('product/view/'.$product->id) ?>" title="<?php echo $buy->name; ?>">
					<img src="<?php echo base_url('upload').'/product/'.$buy->image_link; ?>" alt=''/>
				</a>
			</div>
			<p class='price'>
				<?php echo $buy->price ?>
			</p>
			<center>
			<div class='raty' style='margin:10px 0px' id='9' data-score='4'></div>
			</center>
			<div class='action'>
				<p>Lượt mua: <b><?php echo $buy->buyed ?></b></p>
				<a class='button' href="<?php echo base_url('product/view/'.$product->id);?>" title='Mua ngay'>Mua ngay</a>
				<div class='clear'></div>
			</div>
		</div>
		<?php endforeach; ?>
		<div class='clear'></div>
		</div><!-- End box-content-center -->
	</div>

</div>