<?php
class Home extends MY_Controller{
	function __construct(){
		parent::__construct();
	}
	function index()
	{

		$this->load->model('slide_model');
		//Du lieu tu class cha MY_Controller
		//Lay danh sach cac slide
		$list_slide = $this->slide_model->get_list();
		$this->data['slide'] = $list_slide;

		//Lay danh sach san pham moi
		$this->load->model('product_model');
		$input = array();
		$input['limit'] = array(8, 0); 
		$product_new = $this->product_model->get_list($input);
		$this->data['product_new'] = $product_new;

		//San pham duoc mua nhieu
		$order = array();
		$order['limit'] = array(8, 0); 
		$order['order_by'] = array('buyed', 'DESC');
		$product_buyed = $this->product_model->get_list($order);
		$this->data['product_buyed'] = $product_buyed;

		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}
}