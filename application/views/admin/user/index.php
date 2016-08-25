<?php $this->load->view('admin/user/header') ?>
<div class="line"></div>
<div class="wrapper">
	<?php
		$this->load->view('admin/home/message', $this->data); 
	?>
	<div class="widget">
		<div class="title">
			<h6>Danh sách Người dùng</h6>
			<div class="num f12">Tổng số: <b><?php echo $total ?></b></div>
		</div>
		
		<form action="#" method="get" class="form" name="filter">
			<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
				<thead>
					<tr>
						<td style="width:10px;"><img src="<?php echo public_url() ?>/admin/images/icons/tableArrows.png" /></td>
						<td style="width:80px;">Mã số</td>
						<td>Họ tên</td>
						<td>Email</td>
						<td>Phone</td>
						<td>Address</td>
						<td style="width:100px;">Hành động</td>
					</tr>
				</thead>
				
				<tbody style="text-align: center">
					<!-- Filter -->
					<?php foreach ($list as $row): ?>
					<tr>
						<td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>" /></td>
						
						<td class="textC"><?php echo $row->id ?></td>
						
						
						<td>
							<span title="<?php echo $row->name ?>" class="tipS">
								<?php echo $row->name ?>					
							</span>
						</td>
						
						<td>
							<?php echo $row->email ?>						
						</td>
						<td>
							<?php echo $row->phone ?>						
						</td>

						<td>
							<?php echo $row->phone ?>						
						</td>

						<td class="option">
							<a href="<?php echo admin_url('user/edit/'.$row->id); ?>" title="Chỉnh sửa" class="tipS ">
								<img src="<?php echo public_url() ?>/admin/images/icons/color/edit.png" />
							</a>
							
							<a href="<?php echo admin_url('user/delete/'.$row->id); ?>" title="Xóa" class="tipS verify_action" >
								<img src="<?php echo public_url() ?>/admin/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<?php endforeach; ?>
					
				</tbody>
			</table>
		</form>
	</div>
</div>