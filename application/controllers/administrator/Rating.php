<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->is_admin_logged_in();
		$this->load->model('administrator/Crud_Model');
	}
	
	public function index()
	{
		$data['page_title']='Product Rating';
		$data['active_menu'] = 'rating';
		$data['sub_active_menu'] = '';
		$this->load->view('administrator/view_product_rating',$data);
	}

	public function view_rating_ajax_data()
	{
		$requestData= $_REQUEST;
		
		$tot_rec=$this->db->select("id")->from('product_reviews')->where(1,1)->get()->result_array();
		$totalData = count($tot_rec);
       	$totalFiltered = $totalData; 	
		$this->db->select("product_reviews.*,product.name, category.name as cat_name");
        $this->db->from('product_reviews');                
        if(!empty($requestData['search']['value'])) {
        	$this->db->group_start();
            $this->db->or_like('product_reviews.full_name',$requestData['search']['value']);
            $this->db->or_like('product_reviews.city',$requestData['search']['value']);
        //    $this->db->or_like('product.name',$requestData['search']['value']);
			$this->db->or_like('category.name',$requestData['search']['value']);
            $this->db->group_end();
        }
        $this->db->join('product', 'product.id = product_reviews.product_id','LEFT');
		$this->db->join('category', 'product.collectiontype = category.id','LEFT');
//        $this->db->where('orders.status',1);
		$this->db->order_by('product_reviews.id','desc');
        $this->db->limit($requestData['length'], $requestData['start']);
        $query1 = $this->db->get();
        $row=$query1->result_array();	
       // echo $this->db->last_query();			exit;
		$k=$requestData['start'] + 1;
        $data = array();
        foreach ($row as $key => $val) 
        { 
			$star ='';
			if($val[rating]==5){ 
			$star = '<span class="fa fa-star text-warning  checked"></span>
			<span class="fa fa-star text-warning checked"></span>
			<span class="fa fa-star text-warning checked"></span>
			<span class="fa fa-star text-warning checked"></span>
			<span class="fa fa-star text-warning checked"></span>';
			}
			if($val[rating]==4){ 
			$star = '<span class="fa fa-star text-warning  checked"></span>
			<span class="fa fa-star text-warning checked"></span>
			<span class="fa fa-star text-warning checked"></span>
			<span class="fa fa-star text-warning checked"></span>';
			}
			if($val[rating]==3){ 
			$star = '<span class="fa fa-star text-warning  checked"></span>
			<span class="fa fa-star text-warning checked"></span>
			<span class="fa fa-star text-warning checked"></span>';
			}
			if($val[rating]==2){ 
			$star = '<span class="fa fa-star text-warning  checked"></span>
			<span class="fa fa-star text-warning checked"></span>';
			}
			if($val[rating]==1){ 
			$star = '<span class="fa fa-star text-warning  checked"></span>';
			}			
			
			$mylink = base_url()."administrator/rating/view/".$val['id']; 
			if($val['status']==0) { $status = '<label class="badge badge-danger">Pending</label>' ; } 
			else { $status = '<label class="badge badge-success">Approved</label>' ; }
			
            $nestedData = array();
            $nestedData[] = $k;
            $nestedData[] = $val['cat_name'];
           // $nestedData[] = date('d-M,Y',strtotime($val['OrderDate']))." ".date('H:i A',strtotime($val['OrderTime']));;
            $nestedData[] = $val['name'];
			$nestedData[] = $star;
            $nestedData[] = $val['full_name'];
            $nestedData[] = $val['city'];
			$nestedData[] = $status ;
			$nestedData[] = '<a  href="'.$mylink.'" class="btn btn-outline-primary" >View</a>&nbsp;&nbsp;<a href="javascript:void(0);" onClick="check_confirm_delete('.$val['id'].');" class="btn btn-outline-danger">Delete</a>';            
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
	public function view($id='')
	{
		

		$review = $this->Crud_Model->get_product_reviews($id);
		//echo "<pre>" ; print_r($review) ; exit;
		if(!empty($review))
		{		
			
			$images = $this->Crud_Model->getDatafromtablewhere('product_image',array('product_id'=>$id));	
			//echo "<pre>"; print_r($images); exit;
			
			$data["review"] = $review;
			$data["images"] = $images;
			$data['page_title']='Product Rating';
			$data['active_menu'] = 'rating';
			$data['sub_active_menu'] = '';
			$this->load->view('administrator/view_product_rating_detail',$data);
		}
		else
		{
			redirect('administrator/dashboard','refresh');
			exit;
			
		}
	}

	
	public function update(){
	
		$this->form_validation->set_rules('status', 'status', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('success', 'Advertisement Update Successfully.');
			redirect('administrator/rating','refresh');
			exit;
			
		}else{		
			$id =  trim($this->input->post('id'));	
			$data['status']= trim($this->input->post('status'));					
			$this->Crud_Model->Updatedata($id,'id','product_reviews',$data);
			//echo $this->db->last_query(); exit;
			$this->session->set_flashdata('success', 'Product Rating Approved Successfully.');
			redirect('administrator/rating','refresh');
			exit;								

		}
	}
	public function delete($id)
	{
		if($id !='')
		{
			//$editdata=$this->Crud_Model->getById($id,'id','product_reviews');
			$this->Crud_Model->DeletData($id,'id','product_reviews');
			redirect('administrator/rating','refresh'); exit;
		}
	}
	
}
?>