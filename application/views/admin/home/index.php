<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Bảng điều khiển</h5>
			<span>Trang quản lý hệ thống</span>
		</div>
		
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper">	
	<?php $this->load->view('admin/home/message', $this->data); ?>
	<div class="widgets">
		<!-- Stats -->

		<div class="clear"></div>
		
		<!-- Giao dich thanh cong gan day nhat -->
		
		<div class="widget">
			<div class="title">
				<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
				<h6>Danh sách Giao dịch</h6>
			</div>
			
			<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
				
				
				<thead>
					<tr>
						<td style="width:10px;"><img src="<?php echo public_url('admin') ?>/images/icons/tableArrows.png" /></td>
						<td style="width:60px;">Mã số</td>
						<td style="width:75px;">Thành viên</td>
						<td style="width:90px;">Số tiền</td>
						<td>Hình thức</td>
						<td style="width:100px;">Giao dịch</td>
						<td style="width:75px;">Ngày tạo</td>
						<td style="width:55px;">Hành động</td>
					</tr>
				</thead>
				
				<tfoot class="auto_check_pages">
				<tr>
					<td colspan="8">
						<div class="list_action itemActions">
							<a href="#submit" id="submit" class="button blueB" url="admin/tran/del_all.html">
								<span style='color:white;'>Xóa hết</span>
							</a>
						</div>
					</td>
				</tr>
				</tfoot>
				
				<tbody class="list_item">
					<tr>
						<td><input type="checkbox" name="id[]" value="21" /></td>
						
						<td class="textC">21</td>
						
						<td>
							Khách hàng 1					

						</td>
						
						<td class="textR red">10,000,000</td>
						
						<td>
						dathang					</td>
						
						
						<td class="status textC">
							<span class="pending">
							Chờ xử lý						</span>
						</td>
						
						<td class="textC">16-08-2014</td>
						
						<td class="textC">
							<a href="admin/tran/view/21.html" class="lightbox">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
							</a>
							
							<a href="admin/tran/del/21.html" title="Xóa" class="tipS verify_action" >
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value="20" /></td>
						
						<td class="textC">20</td>
						
						<td>
							Khách hàng 1					
						</td>
						
						<td class="textR red">5,000,000</td>
						
						<td>
						baokim					</td>
						
						
						<td class="status textC">
							<span class="pending">
							Chờ xử lý						</span>
						</td>
						
						<td class="textC">15-08-2014</td>
						
						<td class="textC">
							<a href="admin/tran/view/20.html" class="lightbox">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
							</a>
							
							<a href="admin/tran/del/20.html" title="Xóa" class="tipS verify_action" >
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value="19" /></td>
						
						<td class="textC">19</td>
						
						<td>
							Khách hàng 1					
						</td>
						
						<td class="textR red">5,000,000</td>
						
						<td>
						baokim					</td>
						
						
						<td class="status textC">
							<span class="pending">
							Chờ xử lý						</span>
						</td>
						
						<td class="textC">15-08-2014</td>
						
						<td class="textC">
							<a href="admin/tran/view/19.html" class="lightbox">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
							</a>
							
							<a href="admin/tran/del/19.html" title="Xóa" class="tipS verify_action" >
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value="18" /></td>
						
						<td class="textC">18</td>
						
						<td>
							Khách hàng 1					
						</td>
						
						<td class="textR red">5,000,000</td>
						
						<td>
						baokim					</td>
						
						
						<td class="status textC">
							<span class="pending">
							Chờ xử lý						</span>
						</td>
						
						<td class="textC">15-08-2014</td>
						
						<td class="textC">
							<a href="admin/tran/view/18.html" class="lightbox">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
							</a>
							
							<a href="admin/tran/del/18.html" title="Xóa" class="tipS verify_action" >
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value="17" /></td>
						
						<td class="textC">17</td>
						
						<td>
							Khách hàng 1					
						</td>
						
						<td class="textR red">5,000,000</td>
						
						<td>
						baokim					</td>
						
						
						<td class="status textC">
							<span class="pending">
							Chờ xử lý						</span>
						</td>
						
						<td class="textC">15-08-2014</td>
						
						<td class="textC">
							<a href="admin/tran/view/17.html" class="lightbox">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
							</a>
							
							<a href="admin/tran/del/17.html" title="Xóa" class="tipS verify_action" >
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value="16" /></td>
						
						<td class="textC">16</td>
						
						<td>
							Khách hàng 1					
						</td>
						
						<td class="textR red">5,000,000</td>
						
						<td>
						baokim					</td>
						
						
						<td class="status textC">
							<span class="pending">
							Chờ xử lý						</span>
						</td>
						
						<td class="textC">15-08-2014</td>
						
						<td class="textC">
							<a href="admin/tran/view/16.html" class="lightbox">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
							</a>
							
							<a href="admin/tran/del/16.html" title="Xóa" class="tipS verify_action" >
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value="15" /></td>
						
						<td class="textC">15</td>
						
						<td>
							Khách hàng 1					
						</td>
						
						<td class="textR red">5,000,000</td>
						
						<td>
						baokim					</td>
						
						
						<td class="status textC">
							<span class="pending">
							Chờ xử lý						</span>
						</td>
						
						<td class="textC">15-08-2014</td>
						
						<td class="textC">
							<a href="admin/tran/view/15.html" class="lightbox">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
							</a>
							
							<a href="admin/tran/del/15.html" title="Xóa" class="tipS verify_action" >
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value="14" /></td>
						
						<td class="textC">14</td>
						
						<td>
							Khách hàng 1					
						</td>
						
						<td class="textR red">10,000,000</td>
						
						<td>
						nganluong					</td>
						
						
						<td class="status textC">
							<span class="completed">
							Thành công						</span>
						</td>
						
						<td class="textC">14-08-2014</td>
						
						<td class="textC">
							<a href="admin/tran/view/14.html" class="lightbox">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
							</a>
							
							<a href="admin/tran/del/14.html" title="Xóa" class="tipS verify_action" >
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value="13" /></td>
						
						<td class="textC">13</td>
						
						<td>
							Khách hàng 1					
						</td>
						
						<td class="textR red">20,000,000</td>
						
						<td>
						nganluong					</td>
						
						
						<td class="status textC">
							<span class="completed">
							Thành công						</span>
						</td>
						
						<td class="textC">13-08-2014</td>
						
						<td class="textC">
							<a href="admin/tran/view/13.html" class="lightbox">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
							</a>
							
							<a href="admin/tran/del/13.html" title="Xóa" class="tipS verify_action" >
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value="12" /></td>
						
						<td class="textC">12</td>
						
						<td>
							Khách hàng 1					
						</td>
						
						<td class="textR red">10,000,000</td>
						
						<td>
						nganluong					</td>
						
						
						<td class="status textC">
							<span class="completed">
							Thành công						</span>
						</td>
						
						<td class="textC">13-08-2014</td>
						
						<td class="textC">
							<a href="admin/tran/view/12.html" class="lightbox">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
							</a>
							
							<a href="admin/tran/del/12.html" title="Xóa" class="tipS verify_action" >
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
				</tbody>
				
			</table>
		</div>
	</div>
	
</div>