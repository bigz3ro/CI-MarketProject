<?php
class Slide extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}
	
	function index()
	{
		$this->load->model('slide_model');
		$total_rows = $this->slide_model->get_total();

		//Lay so luong tat ca cac slide
		$this->data['total_rows'] = $total_rows;
		$input = array();

		//Lay danh sach slide
		$list = $this->slide_model->get_list($input);
		$this->data['list'] = $list;

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/slide/index';
		$this->load->view('admin/home/main', $this->data);
	}
	//Them moi anh slide
	function add()
	{
		$this->load->model('slide_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('upload_library');

		//Neu ma co du lieu post len
		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Username' ,'required');
			$this->form_validation->set_rules('link', 'Link' ,'required');
			// Neu validate ma dung 
			if($this->form_validation->run())
			{	
				$upload_path = './upload/slide';
				$data_return = $this->upload_library->upload($upload_path, 'image');
				if(!is_array($data_return))
				{
					$this->session->set_flashdata('message', 'Upload ảnh không thành công');
					redirect(admin_url('slide'));
				}

				$data_upload = array(
					'name' => $this->input->post('name'),
					'image_name' => $data_return['raw_name'],
					'image_link' => $data_return['file_name'],
					'link' => $this->input->post('link'),
					'sort_order' => $this->input->post('sort_order')
				);
				if($this->slide_model->create($data_upload))
				{
					$this->session->set_flashdata('message' , 'Thêm mới thành công');
					redirect(admin_url('slide'));
				}else{
					$this->session->set_flashdata('message' , 'Thêm mới không thành công');
					redirect(admin_url('slide'));
				}
			}
		}

		$this->data['temp'] = 'admin/slide/add';
		$this->load->view('admin/home/main', $this->data);
	}
	function edit()
	{
		$this->load->model('slide_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$id = $this->uri->segment(4);
		$id = intval($id);
		
		$info = $this->slide_model->get_info($id);

		if(!$info)
		{
			$this->session->set_flashdata('message', 'Không tồn tại slide');
			redirect(admin_url('slide'));
		}

		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('link', 'Link', 'required');
			if($this->form_validation->run())
			{
				//Dong goi du lieu update len server
					$data_update = array(
						'name' 			=> $this->input->post('name'),
						'link' 			=> $this->input->post('link'),
						'sort_order' 	=> $this->input->post('sort_order'),
					);

				
				$this->load->library('upload_library');
				$upload_path = './upload/slide';
				$info = $this->upload_library->upload($upload_path, 'image');
				//Kiem tra xem co theo doi anh khong thi moi cap nhat
				if(isset($info['file_name']))
				{
					$data_update['image_link'] = $info['file_name'];
					$data_update['image_name'] = $info['raw_name'];
				}

				$this->slide_model->update($id, $data_update);
				$this->session->set_flashdata('message', 'Chỉnh sửa thành công');
				redirect(admin_url('slide'));
			}			

		}

		$this->data['info'] = $info;
		$this->data['temp'] = 'admin/slide/edit';
		$this->load->view('admin/home/main', $this->data);
	}
	function delete()
	{
		$id = $this->uri->segment(4);
		$id = intval($id);

		$this->load->model('slide_model');
		$list = $this->slide_model->get_info($id);
		if(!$list)
		{
			$this->session->set_flashdata('message', 'Không tồn tại slide');
			redirect(admin_url('slide'));
		}else{
			$this->session->set_flashdata('message', 'Xoá thành công');	
			$this->slide_model->delete($id);		
			redirect(admin_url('slide'));
		}
	}
}
