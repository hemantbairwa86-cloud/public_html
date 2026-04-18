<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class favorite extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->is_admin_logged_in();
		$this->load->model('administrator/Crud_Model');
	}
	public function index()
	{
		$data['page_title']='order';
		$data['active_menu'] = 'order';
		$data['sub_active_menu'] = '';
		$this->load->view('administrator/view_favorite_product',$data);
	}
	public function view_favorite_ajax_data()
	{
		$requestData= $_REQUEST;
       	$this->db->select('f.*,p.name as pname,p.slug as pslug,p.productcode,count(f.customer_id) as totalcustomer,c.name as collectionname,c.shortname as collectionshortname');
        $this->db->from('customer_favorite_products as f');
        if(!empty($requestData['search']['value'])) {
        	$this->db->group_start();
            $this->db->or_like('p.name',$requestData['search']['value']);
            $this->db->or_like('c.name',$requestData['search']['value']);
            $this->db->group_end();
        }
        $this->db->join('product as p','f.products_id=p.id','LEFT');
        $this->db->join('category as c','c.id=p.collectiontype','LEFT');
        $this->db->where('f.status','1');    
        $this->db->where('f.isdelete','0');
        if(isset($data['OrderBy']) and $data['OrderBy']!=''){
            $this->db->order_by($data['OrderBy'], $data['order']);
        }
        $this->db->group_by('f.products_id');        
        $this->db->order_by('totalcustomer','DESC');
        $query1 = $this->db->get();
        $row_count=$query1->result_array();
        $totalData = count($row_count);
       	$totalFiltered = $totalData;               
		$this->db->select('f.*,p.name as pname,p.slug as pslug,p.productcode,count(f.customer_id) as totalcustomer,c.name as collectionname,c.shortname as collectionshortname');
        $this->db->from('customer_favorite_products as f');
        if(!empty($requestData['search']['value'])) {
        	$this->db->group_start();
            $this->db->or_like('p.name',$requestData['search']['value']);
            $this->db->or_like('c.name',$requestData['search']['value']);
            $this->db->group_end();
        }
        $this->db->join('product as p','f.products_id=p.id','LEFT');
        $this->db->join('category as c','c.id=p.collectiontype','LEFT');
        $this->db->where('f.status','1');    
        $this->db->where('f.isdelete','0');
        if(isset($data['OrderBy']) and $data['OrderBy']!=''){
            $this->db->order_by($data['OrderBy'], $data['order']);
        }
        $this->db->group_by('f.products_id');        
        $this->db->order_by('totalcustomer','DESC');
        $this->db->limit($requestData['length'], $requestData['start']);
        $query1 = $this->db->get();
        $row=$query1->result_array();
		$k=$requestData['start'] + 1;
        $data = array();
        foreach ($row as $key => $val) 
        { 
        	$images = get_product_images($val['products_id']);
        	$img='<img src="'.base_url().'uploads/product/'.$images[0]['image_name'].'" style="height:50px;width:auto;" alt="'.$val['productcode'].'">';
            $nestedData = array();
            $nestedData[] = $k;
            $nestedData[] = $img;
            $nestedData[] = $val['pname'];
			 $nestedData[] = ucwords($val['collectionname']);
            $nestedData[] = $val['totalcustomer'];
            $data[] = $nestedData;
            $k++  ; 			
        }
        $json_data = array(
            "draw"            =>intval($requestData['draw']),  
            "recordsTotal"    => intval( $totalData ),  
            "recordsFiltered" => intval( $totalFiltered ), 
            "data"            => $data   
            );
        echo json_encode($json_data);  // send data as json format 
	}
}
?>