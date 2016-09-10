<div class="content">
	<div class="box-center"><!-- The box-center register-->
	<div class="tittle-box-center">
		<h2>Thông tin nhận hàng</h2>
	</div>
	<div class="box-content-center register"><!-- The box-content-center -->
	<h1>Thông tin</h1>
	<form enctype="multipart/form-data" action="<?php echo base_url('order/check_out');?>" method="post" class="t-form form_action">
		<div class="form-row">
			<label class="form-label" for="param_email">Email<span class="req">*</span></label>
			<div class="form-item">
				<input type="text" value="<?php echo $user->email ?>" name="email" id="email" class="input">
				<div class="clear"></div>
				<div id="email_error" class="error"><?php echo form_error('email'); ?></div>
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
				<input name="address" id="address" class="input" value="<?php echo $user->address ?>" >
				<div class="clear"></div>
				<div id="address_error" class="error"><?php echo form_error('address'); ?></div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="form-row">
			<label class="form-label" for="param_payment">Phương thức thanh toán:<span class="req"></span></label>
			<div class="form-item">
				<select name="payment">
					<option value="">--Chọn cổng thanh toán--</option>
					<option value="offline">Thanh toán khi nhận hàng</option>
					<option value="nganluong">Ngân lượng</option>
				</select>
				<div class="clear"></div>
				<div id="payment_error" class="error"><?php echo form_error('payment'); ?></div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="form-row">
			<label class="form-label" for="param_message">Ghi chú:<span class="req"></span></label>
			<div class="form-item">
				<textarea name="message" id="message" class="input" value=""></textarea>
				<div class="clear"></div>
				<div id="message_error" class="error"><?php echo form_error('message'); ?></div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="form-row">
			<label class="form-label" for="param_email">Tổng tiền thanh toán:</label>
			<div class="form-item">
				<p style="color:#f36f21;line-height: 25px; font-size: 16px; font-weight:500"><?php echo $total_amount ?> đ</p>
				<div class="clear"></div>
				<div id="email_error" class="error"><?php echo form_error('email'); ?></div>
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
				<button class="button"  id="submit" name="submit">Chấp nhận</button>
			</div>
		</div>
	</form>
	</div><!-- End box-content-center register-->
	</div><!-- End box-center -->
</div>

