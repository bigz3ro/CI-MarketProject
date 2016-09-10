<style type="text/css">
	#button-edit{
	    background: #3B5998 !important;
		border-radius: 5px;
		border: none;
		color: #FFFFFF;
		cursor: pointer;
		font-family: 'Roboto Condensed',tahoma,sans-serif,arial;
		font-size: 14px;
		font-weight: bold;
		padding: 5px;
	}
	#table-info{
		margin-bottom: 10px;
		width: 100%;
	}
	#table-info tr{
		border: 1px solid #D9E4E6;
	}
	#table-info tr:nth-child(odd) {
  		background-color: #EAF3F3;
	}
	#table-info td {
		  border: 1px solid #FFF;
		  background-color: #8e9696;
		  color: #000;
		  padding: 1em;
		}
</style>
<div class="content">
	<div class="box-center"><!-- The box-center register-->
	<div class="tittle-box-center">
		<h2>Thông tin người dùng</h2>
	</div>
	
	<table width="100%" id="table-info" class="table">
		<tr>
			<td>Họ tên</td>
			<td><?php echo $user->name ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $user->email ?></td>
		</tr>
		<tr>
			<td>Số điện thoại</td>
			<td><?php echo $user->phone ?></td>
		</tr>
		<tr>
			<td>Địa chỉ</td>
			<td><?php echo $user->address ?></td>
		</tr>
	</table>
	<a href="<?php echo site_url('user/edit'); ?>" class="button" id="button-edit">Chỉnh sửa thông tin</a>
	</div>
</div>