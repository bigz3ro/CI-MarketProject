<?php $this->load->view('admin/slide/header') ?>
<div class="line"></div>
<div class="wrapper" id="main_product">
	<?php $this->load->view('admin/home/message', $this->data); ?>
	<div class="widget">
		<div class="title">
			<h6>Ảnh slide</h6>
			<div class="num f12">Số lượng: <b><?php echo $total_rows ?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead>
				<tr>
					<td style="width:60px;">Mã số</td>
					<td>Ảnh hiển thị</td>
					<td>Tên ảnh</td>
					<td>Link liên kết</td>
					<td>Thứ tự hiển thị</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
			<tbody class="list_item">
				<?php foreach($list as $row): ?>
				<tr class="row_<?php echo $row->id; ?>" >
					<!-- //Id anh -->
					<td class="textC"><?php echo $row->id ?></td>
					<!-- //Anh hien thi -->
					<td>
						<div class="image_thumb" style="float:none;">
							<img src="<?php echo base_url('/upload/slide/'.$row->image_link) ?>" height="50"  style="width: 150px;">
							<div class="clear"></div>
						</div>
					</td>
					<!-- //Ten anh -->
					<td class="textR">
						<p style="text-align:center;"><?php echo $row->name ?></p>
					</td>
					<td>
						<p style="text-align:center;"><?php echo $row->link ?></p>
					</td>
					<td>
						<p style="text-align:center;"><?php echo $row->sort_order ?></p>
					</td>
					<td class="option textC">
						<a href="<?php echo admin_url('slide/edit/'.$row->id); ?>" title="Chỉnh sửa" class="tipS">
							<img src="<?php echo public_url('admin/images/icons/color/edit.png') ?>" />
						</a>
						
						<a href="<?php echo admin_url('slide/delete/'.$row->id); ?>" title="Xóa" class="tipS verify_action" >
							<img src="<?php echo public_url('admin/images/icons/color/delete.png') ?>" />
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			
		</table>
	</div>
	
</div>