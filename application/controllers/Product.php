<?php
class Product extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}

	function catalog()
	{
		//lấy ID của thể loại
        $id = intval($this->uri->rsegment(3));
        //lay ra thông tin của thể loại
        $this->load->model('catalog_model');
        $catalog = $this->catalog_model->get_info($id);
        if(!$catalog)
        {
            redirect();
        }
        
        $this->data['catalog'] = $catalog;
        $input = array();
        
        //kiêm tra xem đây là danh con hay danh mục cha
        if($catalog->parent_id == 0)
        {
            $input_catalog = array();
            $input_catalog['where']  = array('parent_id' => $id);
            $catalog_subs = $this->catalog_model->get_list($input_catalog);
            if(!empty($catalog_subs)) //neu danh muc hien tai co danh muc con
            {
                $catalog_subs_id = array();
                foreach ($catalog_subs as $sub)
                {
                    $catalog_subs_id[] = $sub->id;
                }
                //lay tat ca san pham thuoc cac danh mục con do
                $this->db->where_in('catalog_id', $catalog_subs_id);
            }else{
                $input['where'] = array('catalog_id' => $id);
            }
        }else{
            $input['where'] = array('catalog_id' => $id);
        }
 
        //lấy ra danh sách sản phẩm thuộc danh mục đó
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = base_url('product/catalog/'.$id); //link hien thi ra danh sach san pham
        $config['per_page']   = 6;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);
        
        
        //lay danh sach san pham
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
        
        //hiển thị ra view
        $this->data['temp'] = 'site/product/catalog';
        $this->load->view('site/layout', $this->data);



	}
	function view(){
		//Lay id cua san pham muon xem
		$id = $this->uri->rsegment(3);
		$product = $this->product_model->get_info($id);

		if(!$product) redirect();

        //Tong so diem trung binh danh gia
        $product->raty = ($product->rate_count > 0) ? $product->rate_total/$product->rate_count : 0;
        $this->data['product'] = $product;

		//Danh sach hinh anh kem theo
		$image_list = @json_decode($product->image_list);
		$this->data['image_list'] = $image_list;

        //Cap nhat lai luot xem
        //Mang de luu so view
        $arr_view = array();
        $arr_view['view'] = $product->view + 1;
        $this->product_model->update($product->id, $arr_view);

		//Lay thong tin cua danh muc san pham
		$catalog = $this->catalog_model->get_info($product->catalog_id);
		$this->data['catalog'] = $catalog;
		
		//hien thi ra view
		$this->data['temp'] = 'site/product/view';
		$this->load->view('site/layout', $this->data);
	}
	function page(){
		 $id = intval($this->uri->rsegment(3));
        //lay ra thông tin của thể loại
        $this->load->model('catalog_model');
        $catalog = $this->catalog_model->get_info($id);
        if(!$catalog)
        {
        	redirect();
        }
        // pre($catalog);
        if($catalog->parent_id == 0){
    		$input_catalog = array();
			$input_catalog['where'] = array('parent_id' => $id);
			$catalog_subs = $this->catalog_model->get_list($input_catalog);
			if(!empty($catalog_subs))//Neu danh muc hien tai co cac danh muc con
			{
				$catalog_subs_id = array();
				foreach ($catalog_subs as $sub) 
				{
					//lay cac san pham trong danh muc con
					$catalog_subs_id[] = $sub->id;
				}
				$this->db->where_in('catalog_id', $catalog_subs_id);
				$list_all = $this->db->get('product');
				$list_all = $list_all->result();
				$this->data['list_all'] = $list_all;
			}
        }
        // pre($list_all);
        $this->data['temp'] = 'site/product/page';
        $this->load->view('site/layout',$this->data);
	}

    //Tim kiem theo ten
    function search()
    {
        if($this->uri->segment(3) == 1)
        {
            $key = $this->input->get('term');  
        }else{
            $key = $this->input->get('key-search');
        }
        $this->data['key'] = trim($key);
        $input = array();
        $input['like'] = array('name', $key);
        
        //Lay danh sach sp theo name search
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;

        //autocomplete
        if($this->uri->segment(3) == 1)
        {
            $result = array();
            foreach ($list as $row) {
                //Dong goi lai du lieu cho vao bien result roi chuyen ve dang json
                $item['id'] = $row->id;
                $item['label'] = $row->name;
                $item['value'] = $row->name;
                $result[] = $item;
            }
            die(json_encode($result));
        }else{
            $this->data['temp'] ='site/product/search';
            $this->load->view('site/layout', $this->data);
        }
    }
    function search_price()
    {
        $price_from = intval($this->input->get('price_from'));
        $price_to = intval($this->input->get('price_to'));
        $this->data['price_to'] = $price_to;
        $this->data['price_from'] = $price_from;
        
        $input = array();
        $input['where'] = array('price >=' => $price_from ,'price <=' => $price_to);
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
        //load ra view
        $this->data['temp'] ='site/product/search_price';
        $this->load->view('site/layout', $this->data);

    }
    function raty()
    {
        $result = array();
    
        // Lay thong tin
        $id = $this->input->post('id');//lấy id sản phẩm gửi lên từ trang ajax
        $id = (!is_numeric($id)) ? 0 : $id;
        $info = $this->product_model->get_info($id);//lấy thông tin sản phẩm cần đánh giá
        if (!$info)
        {
            exit();
        }
    
        //kiem tra xem khach da binh chon hay chua
        $raty   = $this->session->userdata('session_raty');
        $raty   = (!is_array($raty)) ? array() : $raty;
        $result = array();
        //nếu đã tồn tại id sản phẩm này trong session đánh giá
        if(isset($raty[$id]))
        {
            $result['msg'] = 'Bạn chỉ được đánh giá 1 lần cho sản phẩm này';
            $output        = json_encode($result);//trả về mã json
            echo $output;
            exit();
        }
        //cap nhat trang thai da binh chon
        $raty[$id] = TRUE;
        $this->session->set_userdata('session_raty', $raty);
    
        $score = $this->input->post('score');//lấy số điểm post lên từ trang ajax
        $data  = array();
        $data['rate_total'] = $info->rate_total + $score;//tổng số điểm
        $data['rate_count'] = $info->rate_count + 1;//tổng số lượt đánh giá
        //cập nhật lại đánh gia cho sản phẩm
        $this->product_model->update($id,$data);
    
        // Khai bao du lieu tra ve
        $result['complete'] = TRUE;
        $result['msg']      = 'Cám ơn bạn đã đánh giá cho sản phẩm này';
        $output             = json_encode($result);//trả về mã json
        echo $output;
        exit();
    }
}