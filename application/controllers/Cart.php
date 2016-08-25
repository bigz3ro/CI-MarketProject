<?php
class Cart extends MY_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('cart');
	}
	//Function them san pham vao gio hang
	function add()
	{
		$this->load->model('product_model');
		$id = $this->uri->segment(3);
		$product = $this->product_model->get_info($id);
		if(!$product)
		{
			redirect();
		}
		$qty = 1;
		$price = $product->price;
		if($product->discount > 0)
		{
			$price = $product->price - $product->discount;
		}

		$data = array();
		$data['id'] = $product->id;
		$data['qty'] = $qty;
		$data['name'] = url_title($product->name);
		$data['image_link'] = $product->image_link;
		$data['price'] = $price;
		$this->cart->insert($data);
		redirect();

}
		function index()
		{
			$carts = $this->cart->contents();
			$total_items = $this->cart->total_items();
			
			$this->data['carts']  = $carts;
			$this->data['total_items'] = $total_items;
			// pre($carts);

			$this->data['temp'] = 'site/cart/index';
			$this->load->view('site/layout', $this->data);

		}
		function update()
		{
			$carts = $this->cart->contents();
			foreach ($carts as $key => $row) {
				$total_qty = $this->input->post('qty_'.$row['id']);
				$data = array();
				$data['rowid'] = $key;
				$data['qty'] = $total_qty;
				$this->cart->update($data);
			}
			redirect(base_url('cart'));
		}
		function del(){
			$id = intval($this->uri->rsegment(3));
			$carts = $this->cart->contents();
			if($id > 0)
			{
				
				foreach ($carts as $key => $row) 
				{
					if($row['id'] == $id)
					{
						$data = array();
						$data['rowid'] = $key;
						$data['qty'] = 0;
						$this->cart->update($data);
					}
				}
			}else{
				$this->cart->destroy();
			}
			redirect(base_url('cart'));
		}
}