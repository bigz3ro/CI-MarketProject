<?php $this->load->view('admin/slide/header') ?>
<div class="wrapper">
	<!-- Form -->
	<form class="form" id="form" action="" method="POST" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
				<div class="title">
					<img src="<?php echo public_url('admin') ?>/images/icons/dark/add.png" class="titleIcon">
					<h6>Cập nhật ảnh slide</h6>
				</div>
				
				<ul class="tabs">
					<li><a href="#tab1">Thông tin</a></li>
				</ul>
				<div class="tab_container">
					<div id="tab1" class="tab_content pd0">
						<!-- Name -->
						<div class="formRow">
							<label class="formLeft" for="param_name">Tên slide:<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo">
									<input value="<?php echo $info->name ?>" name="name" id="param_name" _autocheck="true" type="text">
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
								<div class="left">
									<input type="file" id="image" name="image">
									<!-- Cho hien thi anh  -->
									<div>
										<img src="<?php echo base_url('upload/slide/'.$info->image_link); ?>" style="width: 50px; height: 50px;margin: 5px" >
									</div>
								</div>
								<div name="image_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						
						<!-- Link -->
						<div class="formRow">
							<label class="formLeft" for="param_link">
								Link
							<span class="req"></span>
							</label>
							<div class="formRight">
								<span>
									<input name="link" style="width:300px" id="param_link" type="text" value="<?php echo $info->link ?>" >
								</span>
								<span name="link_autocheck" class="autocheck"></span>
								<div name="link_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<!-- Link -->

						<div class="formRow">
							<label class="formLeft" for="param_sort_order">
								Thứ tự hiển thị
								<span></span>:
							</label>
							<div class="formRight">
								<span>
									<input name="sort_order" style="width:100px" id="param_sort_order" class="format_number" type="text" value="<?php echo $info->sort_order ?>" >
								</span>
								<span name="sort_order_autocheck" class="autocheck"></span>
								<div name="sort_order_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						
						<div class="formRow hide"></div>
					</div>
					</div><!-- End tab_container-->
					
					<div class="formSubmit">
						<input type="submit" value="Cập nhật" class="redB">
						<input type="reset" value="Hủy bỏ" class="basic">
					</div>
					<div class="clear"></div>
				</div>
			</fieldset>
		</form>
	</div>