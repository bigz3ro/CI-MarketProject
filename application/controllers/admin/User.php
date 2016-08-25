<?php
/**
* Liệt kê user trong trang admin
*/
class User extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	function index()
	{
		$input = array();
		$list = $this->user_model->get_list($input);
		$this->data['list'] = $list;
		$total = $this->user_model->get_total();
		$this->data['total'] = $total;
		//Lay du lieu cua bien message flashdata
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		//Du lieu thay doi
		$this->data['temp'] = ('admin/user/index');
		//Khung cua trang quan tri
		$this->load->view('admin/home/main', $this->data);
	}

}