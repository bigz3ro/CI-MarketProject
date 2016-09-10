<?php
class User extends MY_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('user_model');
	}
	//Xu li dang ki user
	function register(){
		if($this->session->userdata('user_id_login'))
		{
			redirect(site_url('user')); 
		}
		if($this->input->post())
		{
			$this->form_validation->set_error_delimiters('<div class="error"></div>');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('re_password', 'Nhập lại', 'trim|required|matches[password]');
			$this->form_validation->set_rules('name', 'Tên', 'trim|required');

			if($this->form_validation->run())
			{
				$data_new = array(
						'name' 		=> $this->input->post('name'),
						'email' 	=> $this->input->post('email'),
						'phone' 	=> $this->input->post('phone'),
						'address' 	=> $this->input->post('address'),
						'password' 	=> md5($this->input->post('password')),
						'created' 	=> now()
					);
				if($this->user_model->create($data_new))
				{
					$this->session->set_flashdata('message', 'Đăng kí thành công');
					redirect(base_url('user/login'));
				}else{
					$this->session->set_flashdata('message', 'Đăng kí không thành công');
					redirect();
				}

			}
		}
		$this->data['temp'] = 'site/user/register';
		$this->load->view('site/layout', $this->data);
	
	}
	function login(){
		//Neu dang nhap thi chuyen ve trang thong tin thanh vien
		if($this->session->userdata('user_id_login'))
		{
			redirect(site_url('user')); 
		}
		if($this->input->post())
		{
			$this->form_validation->set_rules('email','Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Mật khẩu', 'required');
			$this->form_validation->set_rules('login', 'login', 'callback_check_login');

			//Validate return true;
			if($this->form_validation->run())
			{
				$user = $this->_get_user_info();
				$this->session->set_userdata('user_id_login', $user->id);
				$this->session->set_flashdata('message', 'Đăng nhập thành công');
				redirect();
			}
		}
		$this->data['temp'] = 'site/user/login';
		$this->load->view('site/layout', $this->data);
	}
	function check_login(){
		$user = $this->_get_user_info();
		if($user){
			return true;
		}
		$this->form_validation->set_message(__FUNCTION__, 'Đăng nhập không thành không');
		return false;
	}
	private function _get_user_info()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password = md5($password);

		$where = array('email' => $email, 'password' => $password);
		$user = $this->user_model->get_info_rule($where);
		return $user;
	}

	//Hien thi thong tin thanh vien
	function index(){
		if(!$this->session->userdata('user_id_login'))
		{
			redirect();
		}	
		$user_id = $this->session->userdata('user_id_login');
		$user = $this->user_model->get_info($user_id);
		if(!$user){
			redirect();
		}
		$this->data['user'] = $user;
		//Load view
		$this->data['temp'] = '/site/user/index';
		$this->load->view('site/layout', $this->data);
	}

	//Chinh sua thong tin thanh vien
	function edit(){
		if(!$this->session->userdata('user_id_login'))
		{
			redirect(site_url('user/login'));
		}
		//Lay ra thong tin thanh vien
		$user_id = $this->session->userdata('user_id_login');
		echo $user_id;
		$user = $this->user_model->get_info($user_id);
		if(!$user){
			redirect();
		}

		if($this->input->post())
		{
			$password = $this->input->post('password');
			if($password)
			{
				$this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('re_password', 'Nhập lại', 'trim|required|matches[password]');
			}
			$this->form_validation->set_rules('name', 'Tên', 'trim|required');

			if($this->form_validation->run())
			{
				if($password)
				{
					$data_update['password'] = md5($password);
				}
				$data_update = array(
						'name' 		=> $this->input->post('name'),
						'phone' 	=> $this->input->post('phone'),
						'address' 	=> $this->input->post('address'),
					);
				if($this->user_model->update($user_id , $data_update))
				{
					$this->session->set_flashdata('message', 'Chỉnh sửa thành công');
					redirect(base_url('user'));
				}else{
					$this->session->set_flashdata('message', 'Chỉnh sửa không thành công');
				}

			}
		}


		$this->data['user'] = $user;
		$this->data['temp'] = 'site/user/edit';
		$this->load->view('site/layout', $this->data);
	}

	//Thuc hien dang xuat
	function logout(){
		if($this->session->userdata('user_id_login')){
			$this->session->unset_userdata('user_id_login');
		}
		$this->session->set_flashdata('message', 'Đăng xuất thành công');
		redirect();
	}

}