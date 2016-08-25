<?php $this->load->view('admin/product/header') ?>
<div class="wrapper">
	<!-- Form -->
	<form class="form" id="form" action="" method="POST" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
				<div class="title">
					<img src="<?php echo public_url('admin') ?>/images/icons/dark/add.png" class="titleIcon">
					<h6>Cập nhật Sản phẩm</h6>
				</div>
				
				<ul class="tabs">
					<li><a href="#tab1">Thông tin sản phẩm</a></li>
				</ul>
				
				<div class="tab_container">
					<div id="tab1" class="tab_content pd0">
						<!-- Name -->
						<div class="formRow">
							<label class="formLeft" for="param_name">Tên sản phẩm:<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo">
									<input value="<?php echo $product->name ?>" name="name" id="param_name" _autocheck="true" type="text">
								</span>
								<span name="name_autocheck" class="autocheck"></span>
								<div name="name_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<!--End Name -->

						<!--Catalog-->
						<div class="formRow">
							<label class="formLeft" for="param_cat">Danh mục:<span class="req">*</span></label>
							<div class="formRight">
								
								<select name="catalog">
									<option value=""></option>
									<!-- Lap qua cac danh muc san pham  -->
									<?php foreach ($catalogs as $row): ?>
									<!-- kiem tra danh muc co danh muc con hay khong -->
									<?php if(count($row->subs) > 0): ?>	<!-- True -->
									<optgroup label="<?php echo $row->name ?>">
										<!-- Lap qua cac danh muc con va in ra  -->
										<?php foreach($row->subs as $value): ?>
										<option value="<?php echo $value->id; ?>" <?php echo ($product->catalog_id == $value->id) ? 'selected' : '' ?> >
											<?php echo $value->name; ?>
										</option>
										<?php endforeach; ?>
									</optgroup>
									<?php else: ?>
									<option value="<?php echo $row->id ?>" <?php echo ($product->catalog_id == $row->id) ? 'selected' : '' ?> >
										<?php echo $row->name; ?>
									</option>
									<?php endif; ?>
									<?php endforeach; ?>
									<!-- kiem tra danh muc co danh muc con hay khong -->
								</select>
								<span name="cat_autocheck" class="autocheck"></span>
								<div name="cat_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<!-- End catalog -->
						
						<!-- Images  -->
						<div class="formRow">
							<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
							<div class="formRight">
								<div class="left">
									<input type="file" id="image" name="image">
									<!-- Cho hien thi anh  -->
									<div>
										<img src="<?php echo base_url('upload/product/'.$product->image_link); ?>" style="width: 50px; height: 50px;margin: 5px" >
									</div>
								</div>
								<div name="image_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<!-- Chuyen doi danh sach anh tu json ra array de hien thi -->
						<?php $image_list = json_decode($product->image_list); ?>
						<div class="formRow">
							<label class="formLeft">Ảnh kèm theo:</label>
							<div class="formRight">
								<div class="left">
									<input type="file" id="image_list" name="image_list[]" multiple="">
									<div>
									<!-- Lap qua danh sach image_list cua Ảnh kèm theo -->
									<?php if(is_array($image_list)): ?>
										<?php foreach($image_list as $image): ?>
											<img src="<?php echo base_url('upload/product/'.$image); ?>" style="width: 50px; height: 50px;margin-top: 5px;">
										<?php endforeach; ?>
									<?php endif; ?>
									</div>
								</div>
								<div name="image_list_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<!--End Images  -->
						<!-- Price -->
						<div class="formRow">
							<label class="formLeft" for="param_price">
								Giá :
								<span class="req">*</span>
							</label>
							<div class="formRight">
								<span class="oneTwo">
									<input name="price" style="width:100px" id="param_price" class="format_number" _autocheck="true" type="text" value="<?php echo $product->price ?>" >
									<img class="tipS" title="Giá bán sử dụng để giao dịch" style="margin-bottom:-8px" src="<?php echo public_url('admin') ?>/crown/images/icons/notifications/information.png">
								</span>
								<span name="price_autocheck" class="autocheck"></span>
								<div name="price_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<!-- Price -->
						<div class="formRow">
							<label class="formLeft" for="param_discount">
								Giảm giá (VNĐ)
								<span></span>:
							</label>
							<div class="formRight">
								<span>
									<input name="discount" style="width:100px" id="param_discount" class="format_number" type="text" value="<?php echo $product->discount ?>" >
									<img class="tipS" title="Số tiền giảm giá" style="margin-bottom:-8px" src="<?php echo public_url('admin') ?>/crown/images/icons/notifications/information.png">
								</span>
								<span name="discount_autocheck" class="autocheck"></span>
								<div name="discount_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						
						<!-- warranty -->
						<div class="formRow">
							<label class="formLeft" for="param_warranty">
								Bảo hành :
							</label>
							<div class="formRight">
								<span class="oneFour">
									<input name="warranty" id="param_warranty" type="text" value="<?php echo $product->warranty ?>" >
								</span>
								<span name="warranty_autocheck" class="autocheck"></span>
								<div name="warranty_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft" for="param_sale">Tặng quà:</label>
							<div class="formRight">
								<span class="oneTwo">
									<textarea name="gifts" id="param_sale" rows="4" cols="">
									<?php echo $product->gifts ?>
									</textarea>
								</span>
								<span name="sale_autocheck" class="autocheck"></span>
								<div name="sale_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div id='tab3' class="tab_content pd0">
							<div class="formRow">
								<label class="formLeft">Nội dung:</label>
								<div class="formRight">
									<textarea name="content" id="param_content" class="editor">
									<?php echo $product->content ?>
									</textarea>
									<div name="content_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="formRow hide"></div>
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