<?php $this->load->view('admin/catalog/header') ?>
<div class="line"></div>
<div class="wrapper">
	<form class="form" id="form" action="#" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
				<div class="title">
					<img src="<?php echo public_url()?>/admin/images/icons/dark/add.png" class="titleIcon">
					<h6>Chỉnh sửa danh mục</h6>
				</div>
				
				<ul class="tabs">
					<li><a href="#tab1">Thông tin chung</a></li>
				</ul>
				
				<div class="tab_container">
					
					<div id="tab1" class="tab_content pd0">
						
						<div id="tab1" class="tab_content pd0">
							<div class="formRow">
								<label class="formLeft" for="param_name">Tên danh mục<span class="req">*</span></label>
								<div class="formRight">
									<span class="oneTwo"><input value="<?php echo $info->name ?>" name="name" id="param_name" _autocheck="true" type="text"></span>
									<span name="name_autocheck" class="autocheck"></span>
									<div name="name_error" class="clear error" id='name_error'><?php echo form_error('name') ?></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="formRow">
								<label class="formLeft" for="param_sort_order">Thứ tự hiển thị<span class="req">*</span></label>
								<div class="formRight">
									<span class="oneTwo"><input value="<?php echo $info->sort_order ?>" name="sort_order" id="param_sort_order" _autocheck="true" type="text"></span>
									<span name="sort_order_autocheck" class="autocheck"></span>
									<div name="sort_order_error" class="clear error" id="sort_error"><?php echo form_error('sort_order') ?></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="formRow">
								<label class="formLeft" for="param_name">Danh mục cha</label>
								<div class="formRight">
									<span class="oneTwo">
										<select autocheck="true" id="parent_id_param" name="parent_id">
											<option value="0">Là danh mục cha</option>
											<?php foreach ($list as $row): ?>
												<option value="<?php echo $row->id ?>" <?php echo ($row->id == $info->parent_id) ? 'selected' : ''; ?>>
													<?php echo $row->name ?>
												</option>
											<?php endforeach; ?>
										</select>
									</span>
									<span name="parent_id_autocheck" class="autocheck"></span>
									<div name="parent_id_error" class="clear error" id="name_error"><?php echo form_error('parent_id') ?></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					</div><!-- End tab_container-->
					
					<div class="formSubmit">
						<input type="submit" value="Chỉnh sửa" class="redB">
					</div>
					<div class="clear"></div>
				</div>
			</fieldset>
		</form>
	</div>