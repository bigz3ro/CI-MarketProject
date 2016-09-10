<div class="content">
	<div class="box-center"><!-- The box-center register-->
	<div class="tittle-box-center">
		<h2>Chỉnh sửa thông tin </h2>
	</div>
	<div class="box-content-center register"><!-- The box-content-center -->
	<h1>Thông tin</h1>
	<form enctype="multipart/form-data" action="<?php echo base_url('user/edit');?>" method="post" class="t-form form_action">
		<div class="form-row">
			<label class="form-label" for="param_email">Email</label>
			<div class="form-item">
				<?php echo $user->email; ?>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="form-row">
			<label class="form-label" for="param_password">Mật khẩu:</label>
			<div class="form-item">
				<input type="password" name="password" id="password" class="input">
				<div class="clear"></div>
				<p style="color: red">Nếu thay đổi mật khẩu thì nhập dữ liệu</p>
				<div id="password_error" class="error"><?php echo form_error('password'); ?></div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="form-row">
			<label class="form-label" for="param_re_password">Gõ lại mật khẩu:</label>
			<div class="form-item">
				<input type="password" name="re_password" id="re_password" class="input">
				<div class="clear"></div>
				<div id="re_password_error" class="error"><?php echo form_error('re_password'); ?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="form-row">
			<label class="form-label" for="param_name">Họ và tên :<span class="req">*</span></label>
			<div class="form-item">
				<input type="text" value="<?php echo $user->name ?>" name="name" id="name" class="input">
				<div class="clear"></div>
				<div id="name_error" class="error"><?php echo form_error('name'); ?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="form-row">
			<label class="form-label" for="param_phone">Số điện thoại :<span class="req"></span></label>
			<div class="form-item">
				<input type="text" value="<?php echo $user->phone ?>" name="phone" id="phone" class="input">
				<div class="clear"></div>
				<div id="phone_error" class="error"><?php echo form_error('phone'); ?></div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="form-row">
			<label class="form-label" for="param_address">Địa chỉ:<span class="req"></span></label>
			<div class="form-item">
				<input name="address" id="address" class="input" value="<?php echo $user->address ?>">
				<div class="clear"></div>
				<div id="address_error" class="error"><?php echo form_error('address'); ?></div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="form-row">
			<span class="message"></span>
			<div class="clear"></div>
		</div>

		<div class="form-row">
			<label class="form-label">&nbsp;</label>
			<div class="form-item">
				<button class="button"  id="submit" name="submit">Chỉnh sửa</button>
			</div>
		</div>
	</form>
	</div><!-- End box-content-center register-->
	</div><!-- End box-center -->
</div>
<!-- <script type="text/javascript">
			//Khi click nut submit
			$('#submit').click(function()
			{
				var form_data = {
					 email : $('#email').val(),
					 password : $('#password').val(),
					 re_password : $('#re_password').val(),
					 name : $('#name').val(),
					 phone : $('#phone').val(),
					 address : $('#address').val(),
				};
				jQuery.ajax({
				 	url: ' echo base_url('user/register')',
				  	type: 'POST',
				  	data: form_data,
				  	//Function xu li du lieu tra ve
					success: function(msg) 
					{
						console.log(msg);
			  		}
			});
			return false;
		});
</script> --> 
