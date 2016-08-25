<?php
class Product extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}
	
	function index()
	{
		$this->load->model('product_model');
		$total_rows = $this->product_model->get_total();
		//Lay so luong tat ca cac san pham
		$this->data['total_rows'] = $total_rows;
		$this->load->library('pagination');
		$config  = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = admin_url('product/index');
		$config['per_page'] = 7;
		$config['uri_segment'] = 4; //lay so trang muon hien thi tren url
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		//Khoi tao cac cau hinh phan trang
		$this->pagination->initialize($config); // Chạy phân trang

		$segment = $this->uri->segment(4);
		$segment = intval($segment);

		$input = array();
		$input['limit'] = array($config['per_page'], $segment);

		// kiem tra co thuc hien loc tim kiem khong
		
		$catalog_id = $this->input->get('catalog');
		$catalog_id = intval($catalog_id);
		if( $catalog_id > 0 )
		{
			$input['where']['catalog_id'] = $catalog_id;
		}

		$name = $this->input->get('name');
		if( $name != '' )
		{
			$input['like'] = array('name', $name);
		}		

		$id = $this->input->get('id');
		$id = intval($id);
		if($id > 0)
		{
			$input['where']['id'] = $id;
		}
		// pre($input);

		
		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;

		//Lay danh muc san pham
		$this->load->model('catalog_model');
		$input = array();
		$input['where'] = array('parent_id' => 0);
		$catalogs = $this->catalog_model->get_list($input);
		foreach ($catalogs as $row) {
			$input['where'] = array('parent_id' => $row->id);
			$subs = $this->catalog_model->get_list($input);
			$row->subs = $subs;
		}
		$this->data['catalogs'] = $catalogs;

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/product/index';
		$this->load->view('admin/home/main', $this->data);
	}
	function add()
	{
		//Load cac thu vien 
		$this->load->model('catalog_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		// End load cac thu vien

		//Lay danh muc san pham
		$input = array();
		$input['where'] = array('parent_id'=> 0);
		$catalogs = $this->catalog_model->get_list($input);
		
		foreach ($catalogs as $value) {
			$input = array();
			$input['where'] = array('parent_id' => $value->id);
			$subs = $this->catalog_model->get_list($input);
			$value->subs = $subs;
		}
		//End lay danh muc san pham
		
		//<-----Validata du lieu va tao moi san pham gui len database ----->

		if($this->input->post()) //Neu co du lieu post len
		{
			$this->form_validation->set_rules('name', 'Tên sản phẩm', 'required');
			$this->form_validation->set_rules('price', 'Giá của sản phẩm', 'required');
			$this->form_validation->set_rules('catalog', 'Danh mục sản phẩm', 'required');
			
			if($this->form_validation->run())//Neu du lieu validate dung het
			{
				//Lay thong tin tu cac tag input
				$catalog_id = $this->input->post('catalog');
				$discount 	= str_replace(',','',$this->input->post('discount'));
				$warranty 	= $this->input->post('warranty');
				$price 		= str_replace(',','',$this->input->post('price'));
				$name 		= $this->input->post('name');
				$gifts 		= $this->input->post('gifts');
				$content 	= $this->input->post('content');


				//Load thu vien upload image
				$this->load->library('upload_library');
				
				//Thu muc luu tru file san pham
				$upload_path 	= './upload/product';
				//Up load anh dai dien cho san pham
				$upload_data 	= $this->upload_library->upload($upload_path, 'image');
				$image_link 	= '';
				//Kiem tra xem co anh duoc up len hay hong
				if(isset($upload_data['file_name']))
				{
					$image_link = $upload_data['file_name'];
				}

				//Upoad anh kem theo
				$image_list = array();
				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
				$image_list = json_encode($image_list);

				//Dong goi du lieu vao Array de thuc hien truy van len DB
				$data_add = array(
					'name' 			=> $name,
					'catalog_id' 	=> $catalog_id,
					'price' 		=> $price,
					'image_link' 	=> $image_link,
					'image_list'	=> $image_list,
					'discount' 		=> $discount,
					'warranty' 		=> $warranty,
					'gifts' 		=> $gifts,
					'content' 		=> $content,
					'created'  		=> now()
				);

				//Neu ma tao moi san pham thanh cong
				if($this->product_model->create($data_add)){
					$this->session->set_flashdata('message', 'Thêm sản phẩm thành công');
				}else{
					$this->session->set_flashdata('message', 'Xảy ra lỗi');
				}
				//Chuyen den trang danh sach san pham
				redirect(admin_url('product'));
			}
		}
		//<-----End Validata du lieu va tao moi san pham gui len database ----->

		//Dong goi data va gui ra view
		$this->data['catalogs'] = $catalogs;
		$this->data['temp'] = 'admin/product/add';
		$this->load->view('admin/home/main', $this->data);
	}

	//Chuc nang chinh sua thong tin san pham
	function edit()
	{
		//Load cac thu vien va helper
		$this->load->model('catalog_model');
		$this->load->library('form_validation');
        $this->load->helper('form');

		//Lay ve id cua san pham can edit
		$id = $this->uri->segment(4);

		//Lay thay thong tin cua san pham theo id
		$product = $this->product_model->get_info($id);

		if(!$product)
		{
			//Khong ton tai san pham thi dua ra thong bao
			$this->session->set_flashdata('Không tồn tại sản phẩm này');
			redirect(admin_url('product'));
		}
		$this->data['product']  = $product;

		//Lay danh muc san pham o table 'Catalog'
		$input = array();
		$input['where'] = array('parent_id'=> 0);
		//Tra ra danh sach danh muc san pham
		$catalogs = $this->catalog_model->get_list($input);
		foreach ($catalogs as $value) {
			$input = array();
			$input['where'] = array('parent_id' => $value->id);
			$subs = $this->catalog_model->get_list($input);
			$value->subs = $subs;
		}
		$this->data['catalogs'] = $catalogs;

		//Validation
		if($this->input->post()) //Neu co du lieu post len()
		{
			$this->form_validation->set_rules('name', 'Tên sản phẩm', 'required');
			$this->form_validation->set_rules('price', 'Giá của sản phẩm', 'required');
			$this->form_validation->set_rules('catalog', 'Danh mục sản phẩm', 'required');
			
			if($this->form_validation->run())//Neu du lieu validate dung het
			{

				//Lay thong tin tu cac tag input
				$catalog_id = $this->input->post('catalog');
				$discount 	= str_replace(',','',$this->input->post('discount'));
				$warranty 	= $this->input->post('warranty');
				$price 		= str_replace(',','',$this->input->post('price'));
				$name 		= $this->input->post('name');
				$gifts 		= $this->input->post('gifts');
				$content 	= $this->input->post('content');

				//Load thu vien upload image
				$this->load->library('upload_library');
				
				//Thu muc luu tru file san pham
				$upload_path 	= './upload/product';
				//Up load anh dai dien cho san pham
				$upload_data 	= $this->upload_library->upload($upload_path, 'image');
				$image_link 	= '';
				//Kiem tra xem co anh duoc up len hay hong
				if(isset($upload_data['file_name']))
				{
					$image_link = $upload_data['file_name'];
				}

				//Upoad anh kem theo
				$image_list = array();
				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
				$image_list_json = json_encode($image_list);

				//Dong goi du lieu vao Array de thuc hien truy van len DB
				$update_data = array(
					'name' 			=> $name,
					'catalog_id' 	=> $catalog_id,
					'price' 		=> $price,
					'discount' 		=> $discount,
					'warranty' 		=> $warranty,
					'gifts' 		=> $gifts,
					'content' 		=> $content
				);

				if($image_link != ''){
					$update_data['image_link'] = $image_link;
				}
				if(!empty($image_list_json))
				{
					$update_data['image_list'] = $image_list_json;
				}
				//Neu ma tao moi san pham thanh cong
				echo($id);
				if($this->product_model->update($product->id, $update_data)){
					$this->session->set_flashdata('message', 'Cập nhật sản phẩm thành công');
				}else{
					$this->session->set_flashdata('message', 'Xảy ra lỗi');
				}
				//Chuyen den trang danh sach san pham
				redirect(admin_url('product'));
			}
		}


		//Dong goi du lieu
		$this->data['temp'] = 'admin/product/edit';
		$this->load->view('admin/home/main', $this->data);
	}

	//Xoa 1 san pham
	function delete()
	{
		$id = $this->uri->segment(4);
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa sản phẩm thành công');
		redirect(admin_url('product'));
	}
	//Xoa nhieu san pham
	function delete_all()
	{
		$ids = $this->input->post('ids');
		foreach($ids as $id)
		{
			$this->_del($id);
		}
	}

	private function _del($id)
	{
		$product = $this->product_model->get_info($id);
		if(!$product)
		{
			$this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
			redirect(admin_url('product'));
		}
		//Xoa du lieu
		$this->product_model->delete($product->id);
		//Xoa anh trong thu muc upload
		$image_link = './upload/product/'.$product->image_link;
		if(file_exists($image_link))
		{
			unlink($image_link);
		}
		//Xoa cac anh kiem theo
		$image_list = json_decode($product->image_list);
		if(is_array($image_list))
		{
			foreach($image_list as $image)
			{
				$image = './upload/product/'.$image;
				if(file_exists($image))
				{
					unlink($image);
				}
			}
		}
	}
}
