<?php
class Catalog extends MY_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('catalog_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	function index(){

		$input = array();
		$list = $this->catalog_model->get_list($input);
		$this->data['list'] = $list;

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/catalog/index';
		$this->load->view('admin/home/main', $this->data);
	}
	//Add catalog
	function add(){
		//Neu co du lieu post len kiem tra
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên danh muc', 'required');
			
			//Neu mà tất cả các giá trị kia mà đúng
			if($this->form_validation->run())
			{
				// add CSDL
				$name = $this->input->post('name');
				$sort_order = $this->input->post('sort_order');
				$parent_id = $this->input->post('parent_id');
				$data = array(
					'name' => $name,
					'sort_order' => $sort_order,
					'parent_id' => intval($parent_id)
				);
				if($this->catalog_model->create($data)){
					//Tao ra noi dung thong bao
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//Dieu huong den trang danh sach quan tri vien
				redirect(admin_url('catalog'));
			}
		}

		//Lay cac danh muc cha
		$input = array();
		$input['where'] = array('parent_id'=> 0);
		$list = $this->catalog_model->get_list($input);
		$this->data['list'] = $list;

		$this->data['temp'] = ('admin/catalog/add');
		$this->load->view('admin/home/main', $this->data);
	}
	//Edit catalog
	function edit(){
		
		$id = $this->uri->segment('4');

		$info = $this->catalog_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message',"Không tồn tại danh mục này");
			redirect(admin_url('catalog'));
		}
		$this->data['info'] = $info;
		//Neu co du lieu post len kiem tra
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên danh muc', 'required');
			
			//Neu mà tất cả các giá trị kia mà đúng
			if($this->form_validation->run())
			{
				// add CSDL
				$name = $this->input->post('name');
				$sort_order = $this->input->post('sort_order');
				$parent_id = $this->input->post('parent_id');
				$data = array(
					'name' => $name,
					'sort_order' => $sort_order,
					'parent_id' => intval($parent_id)
				);
				if($this->catalog_model->update($id, $data)){
					//Tao ra noi dung thong bao
					$this->session->set_flashdata('message', 'Chỉnh sửa thành công');
				}else{
					$this->session->set_flashdata('message', 'Chỉnh sửa không thành công');
				}
				//Dieu huong den trang danh sach quan tri vien
				redirect(admin_url('catalog'));
			}
		}

		$input = array();
		$input['where'] = array('parent_id'=> 0);
		$list = $this->catalog_model->get_list($input);
		$this->data['list'] = $list;

		$this->data['temp'] = ('admin/catalog/edit');
		$this->load->view('admin/home/main', $this->data);
	}
	//Delete catalog
	function delete(){
		//Lay id cua danh muc
		$id = $this->uri->rsegment('3');
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url('catalog'));
	}
	
	private function _del($id)
	{
		$info = $this->catalog_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Không tồn tại danh mục này');
			redirect(admin_url('catalog'));
		}
		//Kiem tra danh muc nay co san pham khong
		$this->load->model('product_model');
		$product = $this->product_model->get_info_rule(array('catalog_id' => $id), 'id');
		if($product)
		{
			$this->session->set_flashdata('message', 'Danh mục' .$info->name.'có chứa sản phẩm, cần xóa các sản phẩm trước khi xóa danh mục này');
			redirect(admin_url('catalog'));
		}

		//Xoa du lieu
		$this->catalog_model->delete($id);
	}


}