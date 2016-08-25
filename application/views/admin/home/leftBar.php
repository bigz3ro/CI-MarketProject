<?php 
	if(isset($this->session->userdata['username']))
	{
		$username = $this->session->userdata['username'];
	} 
?>
<!-- Left side content -->
<div id="left_content">
	<div id="leftSide" style="padding-top:30px;">
		
		<!-- Account panel -->
		
		<div class="sideProfile">
			<a href="#" title="" class="profileFace"><img width="40" src="<?php echo public_url(); ?>/admin/images/user.png" /></a>
			<span>Xin chào:</span>
			<span><strong style="color:red;"><?php echo $username ?></strong></span>
			<div class="clear"></div>
		</div>
		<div class="sidebarSep"></div>
		<!-- Left navigation -->
		
		<ul id="menu" class="nav">
			<li class="home">
				
				<a href="<?php echo admin_url();?>" class="active" id="current">
					<span>Bảng điều khiển</span>
					<strong></strong>
				</a>
				
				
			</li>
			<li class="tran">
				
				<a href="" class=" exp" >
					<span>Quản lý bán hàng</span>
					<strong>2</strong>
				</a>
				
				<ul class="sub">
					<li >
						<a href="">
						Giao dịch							</a>
					</li>
					<li >
						<a href="">
						Đơn hàng sản phẩm							</a>
					</li>
				</ul>
				
			</li>
			<li class="product">
				
				<a href="<?php echo admin_url('product'); ?>" class=" exp" >
					<span>Sản phẩm</span>
					<strong>2</strong>
				</a>
				
				<ul class="sub">
					<li >
						<a href="<?php echo admin_url('product'); ?>">
							Sản phẩm							
						</a>
					</li>
					<li >
						<a href="<?php echo admin_url('catalog'); ?>">
							Danh mục							
						</a>
					</li>
				</ul>
				
			</li>
			<li class="account">
				
				<a href="" class=" exp" >
					<span>Tài khoản</span>
					<strong>2</strong>
				</a>
				
				<ul class="sub">
					<li >
						<a href="<?php echo admin_url('admin');?>">
						Ban quản trị							
						</a>
					</li>

					<li >
						<a href="<?php echo admin_url('user');?>">
						Thành viên							
						</a>
					</li>
				</ul>
				
			</li>
			<li class="support">
				
				<a href="admin/support.html" class=" exp" >
					<span>Hỗ trợ và liên hệ</span>
					<strong>2</strong>
				</a>
				
				<ul class="sub">
					<li >
						<a href="">
						Hỗ trợ							
						</a>
					</li>
					<li >
						<a href="">
						Liên hệ							
						</a>
					</li>
				</ul>
				
			</li>
			<li class="content">
				
				<a href="admin/content.html" class=" exp" >
					<span>Nội dung</span>
					<strong>1</strong>
				</a>
				
				<ul class="sub">
					<li >
						<a href="<?php echo admin_url('slide')?> ">
							Slide							
						</a>
					</li>
				</ul>
				
			</li>
			
		</ul>
		
	</div>
	<div class="clear"></div>
</div>