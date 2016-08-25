<?php $this->load->view('admin/admin/header') ?>
<div class="line"></div>
<div class="wrapper">
	<form class="form" id="form" action="#" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
				<div class="title">
					<img src="<?php echo public_url()?>/admin/images/icons/dark/add.png" class="titleIcon">
					<h6>Thêm mới quản trị viên</h6>
				</div>
				
				<ul class="tabs">
					<li><a href="#tab1">Thông tin chung</a></li>
				</ul>
				
				<div class="tab_container">
					
					<div id="tab1" class="tab_content pd0">
						
						<div id="tab1" class="tab_content pd0">

							<div class="formRow">
								<label class="formLeft" for="param_name">Họ và tên<span class="req">*</span></label>
								<div class="formRight">
									<span class="oneTwo"><input value="<?php echo set_value('name') ?>" name="name" id="param_name" _autocheck="true" type="text"></span>
									<span name="name_autocheck" class="autocheck"></span>
									<div name="name_error" class="clear error"><?php echo form_error('name') ?></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="formRow">
								<label class="formLeft" for="param_username">Username<span class="req">*</span></label>
								<div class="formRight">
									<span class="oneTwo"><input value="<?php echo set_value('name') ?>" name="username" id="param_username" _autocheck="true" type="text"></span>
									<span name="username_autocheck" class="autocheck"></span>
									<div name="username_error" class="clear error"><?php echo form_error('username') ?></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="formRow">
								<label class="formLeft" for="param_password">Mật khẩu<span class="req">*</span></label>
								<div class="formRight">
									<span class="oneTwo"><input name="password" id="param_password" _autocheck="true" type="password" ></span>
									<span name="password_autocheck" class="autocheck"></span>
									<div name="password_error" class="clear error"><?php echo form_error('password') ?></div>
								</div>
								<div class="clear"></div>
							</div>

							</div>
							<div class="formRow">
								<label class="formLeft" for="param_repassword">Nhập lại mật khẩu<span class="req">*</span></label>
								<div class="formRight">
									<span class="oneTwo"><input name="repassword" id="param_repassword" _autocheck="true" type="password"></span>
									<span name="repassword_autocheck" class="autocheck"></span>
									<div name="repassword_error" class="clear error"><?php echo form_error('repassword') ?>
										
									</div>
								</div>
								<div class="clear"></div>
							</div>
							
						</div>
					</div>
					</div><!-- End tab_container-->
					
					<div class="formSubmit">
						<input type="submit" value="Thêm mới" class="redB">
					</div>
					<div class="clear"></div>
				</div>
			</fieldset>
		</form>
	</div>