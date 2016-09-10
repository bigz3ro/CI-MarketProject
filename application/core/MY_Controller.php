<?php
//Co dau tien !!
//Tao ra controller chinh de phan tach giua trang admin va trang giao dien ngoai
class MY_Controller extends CI_Controller{
	//du lieu dung chung cho tat ca cac controller
	public $data = array();

	public function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->data['total_items'] = $this->cart->total_items();
		//Lay tren url neu co chu admin thi chuyen toi trang login
		$controller = $this->uri->segment(1);
		switch ($controller)
		{
			case 'admin':
			{
				$this->load->helper('admin_helper');
				$this->_check_login();
			}
				break;
			default:
			{
				$this->load->model('catalog_model');

				$input = array();
				$input['where'] = array('parent_id' => 0);
				$catalog_list = $this->catalog_model->get_list($input);
				foreach ($catalog_list as $list) {
					$input = array();
					$input['where'] = array('parent_id' => $list->id);
					$subs = $this->catalog_model->get_list($input);
					$list->subs = $subs;
				}
				$this->data['catalog_list'] = $catalog_list;
				//Kien tra  xem thanh vien da dang nhap hay chưa
				$user_id_login = $this->session->userdata('user_id_login');
				$this->data['user_id_login'] = $user_id_login;
				if($user_id_login)
				{
					$this->load->model('user_model');
					$user_info = $this->user_model->get_info($user_id_login);
					$this->data['user_info'] = $user_info;
				}
			}
		};
	}
	private function _check_login()
	{
		//lay tren url phan doan thu 2
		$controller = $this->uri->segment('2');
		$controller = strtolower($controller);
		$login = $this->session->userdata('logged_in');//Bien nay xem da dang nhap thang cong chua
		//Neu ma url o phan doan 2 ma khong co va session['login'] ma co gia tri thi moi cho dang nhap khong cu van o trang login nay
		if(!$login && $controller != 'login'){
			redirect(admin_url('login'));
		}
	}
}