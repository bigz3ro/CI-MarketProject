<?php $this->load->view('admin/slide/header') ?>
<div class="wrapper">
	<!-- Form -->
	<form class="form" id="form" action="<?php echo admin_url('slide/add')?>" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
				<div class="title">
					<img src="<?php echo public_url('admin') ?>/images/icons/dark/add.png" class="titleIcon">
					<h6>Thêm ảnh slide</h6>
				</div>
				
				<ul class="tabs">
					<li><a href="#tab1">Thông tin ảnh</a></li>
				</ul>
				
				<div class="tab_container">
					<div id="tab1" class="tab_content pd0">
						<!-- Name -->
						<div class="formRow">
							<label class="formLeft" for="param_name">Tên slide:<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo">
									<input name="name" id="param_name" _autocheck="true" type="text">
								</span>
								<span name="name_autocheck" class="autocheck"></span>
								<div name="name_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<!--End Name -->
						
						<!-- Images  -->
						<div class="formRow">
							<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
							<div class="formRight">
								<div class="left"><input type="file" id="image" name="image"></div>
								<div name="image_error" class="clear error">
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<!--End Images  -->
						<!-- Link lien ket  -->
						<div class="formRow">
							<label class="formLeft" for="param_price">
								Link liên kết
								<span class="req">*</span>
							</label>
							<div class="formRight">
								<span class="oneTwo">
									<input type="text" name="link">
								</span>
								<span name="price_autocheck" class="autocheck"></span>
								<div name="price_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<!-- Thu tu hien thi anh -->
						<div class="formRow">
							<label class="formLeft" for="param_discount">
								Thứ tự hiển thị
								<span></span>:
							</label>
							<div class="formRight">
								<span class="oneTwo">
									<input type="text" name="sort_order" value="">
								</span>
								<span name="discount_autocheck" class="autocheck"></span>
								<div name="discount_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow hide"></div>
					</div>
					</div><!-- End tab_container-->
					
					<div class="formSubmit">
						<input type="submit" value="Thêm mới" class="redB">
						<input type="reset" value="Hủy bỏ" class="basic">
					</div>
					<div class="clear"></div>
				</div>
			</fieldset>
		</form>
	</div>