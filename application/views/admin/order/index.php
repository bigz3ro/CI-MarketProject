
<!-- Main content wrapper -->
<div class="wrapper">

	<div class="widget">
		<div class="title">
			<span class="titleIcon"><img src="<?php echo public_url('admin/images/icons/tableArrows.png'); ?>" /></span>
			<h6>Danh sách đơn hàng</h6>
			
		 	<div class="num f12">Tổng số: <b><?php echo $total_rows?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead class="filter"><tr><td colspan="9">
				<form class="list_filter form" action="<?php echo $action; ?>" method="get">
					<table cellpadding="0" cellspacing="0" width="100%"><tbody>
					
						<tr>
							<td class="label" style="width:60px;"><label for="filter_id">Mã đơn hàng</label></td>
							<td class="item"><input name="id" value="<?php if(isset($filter['order.id'])){echo $filter['order.id'];}?>" id="filter_id" type="text" style="width:95px;" /></td>
							
							<td class="label" style="width:60px;"><label for="filter_type">Đơn hàng</label></td>
							<td class="item">
								<select name="status">
									<option value=""></option>
									<option value='0' <?php if(isset($filter['order.status']) && $filter['order.status']=='0'){echo 'selected';}?>>Đợi xử lý</option>
									<option value='1' <?php if(isset($filter['order.status']) && $filter['order.status']=='1'){echo 'selected';}?>>Đã gửi hàng</option>
									<option value='2' <?php if(isset($filter['order.status']) && $filter['order.status']=='2'){echo 'selected';}?>>Hủy bỏ</option>
								</select>
							</td>
							
							<td class="label" style="width:60px;"><label for="filter_created">Ngày đặt</label></td>
							<td class="item"><input name="created" value="<?php if($created){echo $created;}?>" id="filter_created" type="text" class="datepicker" /></td>

							
							<td colspan='2' style='width:60px'>
							<input type="submit" class="button blueB" value="Tìm kiếm" />
							<input type="reset" class="basic" value="Reset" onclick="window.location.href = '<?php echo $action; ?>'; ">
							</td>
							
						</tr>
						
						<tr>
						    <td class="label" style="width:60px;"><label for="filter_user">Mã thành viên</label></td>
							<td class="item"><input name="user" value="<?php if(isset($filter['user_id'])){echo $filter['user_id'];}?>" id="filter_user" class="tipS" title="Nhập mã thành viên" type="text" /></td>

							<td class="label"><label for="filter_status">Thanh toán</label></td>
							<td class="item">
								<select name="transaction_status">
									<option value=""></option>
									<option value='0' <?php if(isset($filter['transaction.status']) && $filter['transaction.status']=='0'){echo 'selected';}?>>Đợi xử lý</option>
									<option value='1' <?php if(isset($filter['transaction.status']) && $filter['transaction.status']=='1'){echo 'selected';}?>>Thành công</option>
									<option value='2' <?php if(isset($filter['transaction.status']) && $filter['transaction.status']=='2'){echo 'selected';}?>>Hủy bỏ</option>
								</select>
							</td>
							
							<td class="label"><label for="filter_created_to">Ngày giao hàng</label></td>
							<td class="item"><input name="created_to" value="<?php if($created_to){echo $created_to;}?>" id="filter_created_to" type="text" class="datepicker" /></td>

							<td class="label"></td>
							<td class="item"></td>
						</tr>
						
					</tbody></table>
				</form>
			</td></tr></thead>
			
			<thead>
				<tr>
					<td style="width:60px;"><ISINDEX></ISINDEX></td>
					<td>Sản phẩm</td>
					<td style="width:80px;">Giá</td>
					<td style="width:50px;">Số lượng</td>
					<td style="width:70px;">Tổng tiền</td>
					<td style="width:75px;"><Đặt hàng</td>
					<td style="width:75px;">Tran</td>
					<td style="width:75px;">Thời gian </td>
					<td style="width:55px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="9">
						
					     <div class='pagination'>
			               <?php echo $this->pagination->create_links();?>
			            </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
			     <?php foreach ($list as $row):?>

			      <tr class='row_<?php echo $row->id?>'>
					
					<td class="textC"><?php echo $row->id?></td>
					
					<td>
					
					<a href="<?php echo site_url('product/view/'.$row->product_id)?>" class="tipS" title="" target="_blank">
					<b><?php echo $row->product_name ?></b>
					</a>	
					</td>
					
					<td class="textR">
					    <?php if($row->discount > 0){?>
                               <?php 
                               $price_new = $row->price - $row->discount;
                               ?>
                               <?php echo number_format($price_new)?> đ
	                       <p style='text-decoration:line-through'><?php echo number_format($row->price)?> đ</p>
                           <?php }else{?>
                                 <?php echo number_format($row->price)?> đ
                           <?php }?>
					</td>
					
					<td class="textC"><?php echo $row->qty?></td>
					
					<td class="textC"><?php echo $row->_amount?></td>
					
					
					<td class="status textC">
						<span class="<?php echo $row->_status; ?>">
						<?php echo lang('order_status_'.$row->_status); ?>
						</span>
					</td>
					
					<td class="status textC">
						<span class="<?php echo $row->_transaction_status; ?>">
						<?php echo lang('tran_status_'.$row->_transaction_status); ?>
						</span>
					</td>
					
					<td class="textC"><?php echo mdate('%d-%m-%Y',$row->created)?></td>
					
					<td class="textC">
							<a href="<?php echo admin_url('transaction/view/'.$row->transaction_id) ?>" class="lightbox">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
							</a>
					</td>
				</tr>
			<?php endforeach;?>	
			</tbody>
			
		</table>
	</div>
	
</div>
        