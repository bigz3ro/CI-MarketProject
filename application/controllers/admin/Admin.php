<?php
class Admin extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('encrypt');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	function index()
	{
		$input = array();
		$list = $this->admin_model->get_list($input);
		$this->data['list'] = $list;
		$total = $this->admin_model->get_total();
		$this->data['total'] = $total;
		//Lay du lieu cua bien message flashdata
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		//Du lieu thay doi
		$this->data['temp'] = ('admin/admin/index');
		//Khung cua trang quan tri
		$this->load->view('admin/home/main', $this->data);
	}
	function check_space()
	{
		$str = $this->input->post('username');
		if( ! preg_match('/^[A-Za-z0-9_]+$/', $str)){
			$this->form_validation->set_message(__FUNCTION__, 'Tài khoản chứa kí tự không hợp lệ!');
			return false;
		}
			return true;
	}
	function check_username(){
		$username = $this->input->post('username');
		$where = array('username' => $username);
		if($this->admin_model->check_exists($where)){
			//Tra ve thong bao loi
			$this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại!');
			return false;
		}
		return true;
	}
	function add()
	{
		//Neu co du lieu post len kiem tra
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			$this->form_validation->set_rules('username', 'Tài khoản', 'trim|required|min_length[5]|max_length[16]|callback_check_username|callback_check_space');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('repassword', 'Nhập lại mật khẩu', 'trim|matches[password]');
			//Neu mà tất cả các giá trị kia mà đúng
			if($this->form_validation->run())
			{
				// add CSDL
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data = array(
					'name' => $name,
					'username' => $username,
					'password' => md5($password)
				);
				if($this->admin_model->create($data)){
					//Tao ra noi dung thong bao
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//Dieu huong den trang danh sach quan tri vien
				redirect(admin_url('admin'));
			}
		}
		$this->data['temp'] = ('admin/admin/addUser');
		$this->load->view('admin/home/main', $this->data);
	}
	//Chinh sua thong tin quan tri vien
	function edit()
	{
		//Lay id cua quan tri vien can quan tri
		$id = $this->uri->rsegment('3');
		//lay thong tin cua quan tri vien
		$info = $this->admin_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata("message","Không tồn tại quản trị viên này");
			redirect(admin_url('admin'));
		}
		$this->data['info'] = $info;
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			$this->form_validation->set_rules('username', 'Tài khoản', 'trim|required|min_length[5]|max_length[16]|callback_check_space');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('repassword', 'Nhập lại mật khẩu', 'trim|matches[password]');

			
			if($this->form_validation->run())
			{
				// add CSDL
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data = array(
					'name' => $name,
					'username' => $username,
				);
				//Neu nguoi dung cap nhat lai passwords
				if($password)
				{
					$data['password'] = md5($password);
				}
				if($this->admin_model->update($id, $data)){
					//Tao ra noi dung thong bao
					$this->session->set_flashdata('message', 'Update thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thành công');
				}
				//Dieu huong den trang danh sach quan tri vien
				redirect(admin_url('admin'));
			}
		}
		$this->data['temp'] = ('admin/admin/edit');
		$this->load->view('admin/home/main', $this->data);
	}
	function delete()
	{
		//Lay id cua quan tri vien can quan tri
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->admin_model->get_info($id);
		if($info)
		{
			$this->admin_model->delete($id);
			$this->session->set_flashdata('message', 'Xóa thành công');
			redirect(admin_url('admin'));
		}else{
			$this->session->set_flashdata('message', 'Xóa không thành công');
			redirect(admin_url('admin'));
		}
		
	}
	function logout(){
		if($this->session->userdata('login'))
		{
			$this->session->unset_userdata('login');
		}
		redirect(admin_url('login'));
	}
}