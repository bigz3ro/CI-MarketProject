<div class="content">
	<div class="box-center"><!-- The box-center register-->
	<div class="tittle-box-center">
		<h2>Đăng ký thành viên</h2>
	</div>
	<div class="box-content-center register"><!-- The box-content-center -->
	<h1>Đăng ký thành viên</h1>
	<form enctype="multipart/form-data" action="<?php site_url('user/register');?>" method="post" class="t-form form_action">
		<div class="form-row">
			<label class="form-label" for="param_email">Email<span class="req">*</span></label>
			<div class="form-item">
				<input type="text" value="" name="email" id="email" class="input">
				<div class="clear"></div>
				<div id="email_error" class="error"></div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="form-row">
			<label class="form-label" for="param_password">Mật khẩu:<span class="req">*</span></label>
			<div class="form-item">
				<input type="password" name="password" id="password" class="input">
				<div class="clear"></div>
				<div id="password_error" class="error"></div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="form-row">
			<label class="form-label" for="param_re_password">Gõ lại mật khẩu:<span class="req">*</span></label>
			<div class="form-item">
				<input type="password" name="re_password" id="re_password" class="input">
				<div class="clear"></div>
				<div id="re_password_error" class="error"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="form-row">
			<label class="form-label" for="param_name">Họ và tên :<span class="req">*</span></label>
			<div class="form-item">
				<input type="text" value="" name="name" id="name" class="input">
				<div class="clear"></div>
				<div id="name_error" class="error"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="form-row">
			<label class="form-label" for="param_phone">Số điện thoại :<span class="req">*</span></label>
			<div class="form-item">
				<input type="text" value="" name="phone" id="phone" class="input">
				<div class="clear"></div>
				<div id="phone_error" class="error"></div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="form-row">
			<label class="form-label" for="param_address">Địa chỉ:<span class="req">*</span></label>
			<div class="form-item">
				<input name="address" id="address" class="input">
				<div class="clear"></div>
				<div id="address_error" class="error"></div>
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
				<button value="Đăng ký" class="button" id="submit" name="submit">Đăng kí</button>
			</div>
		</div>
	</form>
	</div><!-- End box-content-center register-->
	</div><!-- End box-center -->
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
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
				 	url: '<?php echo base_url('user/register'); ?>',
				  	type: 'POST',
				  	data: form_data,
				  	//Function xu li du lieu tra ve
					success: function(msg) 
					{
				    	if(msg == "YES")
				    		$('.message').html('Đăng kí thành công');
				    	else
				    		$('.message').html('Đăng kí không thành công');
			  		}
			});
			return false;
		});
</script>
