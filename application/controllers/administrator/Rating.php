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
		$requestData = $_REQUEST;
		
		$tot_rec = $this->db->select("id")->from('product_reviews')->get()->result_array();
		$totalData = count($tot_rec);
		$totalFiltered = $totalData; 	

		$this->db->select("product_reviews.*, product.name, category.name as cat_name");
		$this->db->from('product_reviews');                
		if(!empty($requestData['search']['value'])) {
			$this->db->group_start();
			$this->db->or_like('product_reviews.full_name', $requestData['search']['value']);
			$this->db->or_like('product_reviews.city', $requestData['search']['value']);
			$this->db->or_like('category.name', $requestData['search']['value']);
			$this->db->or_like('product.name', $requestData['search']['value']);
			$this->db->group_end();
		}
		$this->db->join('product', 'product.id = product_reviews.product_id', 'LEFT');
		$this->db->join('category', 'product.collectiontype = category.id', 'LEFT');
		$this->db->order_by('product_reviews.id', 'desc');

		$start = isset($requestData['start']) ? intval($requestData['start']) : 0;
		$length = isset($requestData['length']) ? intval($requestData['length']) : 10;
		if ($length > 0) {
			$this->db->limit($length, $start);
		}

		$query1 = $this->db->get();
		$row = $query1 ? $query1->result_array() : array();
		
		$k = $start + 1;
		$data = array();
		foreach ($row as $key => $val) 
		{ 
			$star = '';
			$rating_val = isset($val['rating']) ? intval($val['rating']) : 0;
			if($rating_val == 5){ 
				$star = '<span class="fa fa-star text-warning checked"></span>
				<span class="fa fa-star text-warning checked"></span>
				<span class="fa fa-star text-warning checked"></span>
				<span class="fa fa-star text-warning checked"></span>
				<span class="fa fa-star text-warning checked"></span>';
			}
			else if($rating_val == 4){ 
				$star = '<span class="fa fa-star text-warning checked"></span>
				<span class="fa fa-star text-warning checked"></span>
				<span class="fa fa-star text-warning checked"></span>
				<span class="fa fa-star text-warning checked"></span>';
			}
			else if($rating_val == 3){ 
				$star = '<span class="fa fa-star text-warning checked"></span>
				<span class="fa fa-star text-warning checked"></span>
				<span class="fa fa-star text-warning checked"></span>';
			}
			else if($rating_val == 2){ 
				$star = '<span class="fa fa-star text-warning checked"></span>
				<span class="fa fa-star text-warning checked"></span>';
			}
			else if($rating_val == 1){ 
				$star = '<span class="fa fa-star text-warning checked"></span>';
			}			
			
			$mylink = base_url()."administrator/rating/view/".$val['id']; 
			if($val['status'] == 0) { 
				$status = '<label class="badge badge-danger">Pending</label>'; 
			} else { 
				$status = '<label class="badge badge-success">Approved</label>'; 
			}
			
			$nestedData = array();
			$nestedData[] = $k;
			$nestedData[] = !empty($val['cat_name']) ? $val['cat_name'] : '-';
			$nestedData[] = !empty($val['name']) ? $val['name'] : '-';
			$nestedData[] = $star;
			$nestedData[] = !empty($val['full_name']) ? $val['full_name'] : '-';
			$nestedData[] = !empty($val['city']) ? $val['city'] : '-';
			$nestedData[] = $status;
			$nestedData[] = '<div class="action-btn-group"><a href="'.$mylink.'" class="btn btn-sm btn-outline-info btn-action-icon" title="View Rating Details" data-toggle="tooltip"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" onClick="check_confirm_delete('.$val['id'].');" class="btn btn-sm btn-outline-danger btn-action-icon" title="Delete Rating" data-toggle="tooltip"><i class="fa fa-trash"></i></a></div>';            
			$data[] = $nestedData;
			$k++; 			
		}

		$json_data = array(
			"draw"            => intval(isset($requestData['draw']) ? $requestData['draw'] : 1),  
			"recordsTotal"    => intval($totalData),  
			"recordsFiltered" => intval($totalFiltered), 
			"data"            => $data   
		);

		header('Content-Type: application/json');
		echo json_encode($json_data);  
		exit;
	} 
	public function view($id='')
	{
		$review = $this->Crud_Model->get_product_reviews($id);
		if(!empty($review))
		{		
			$product_id = isset($review['product_id']) ? $review['product_id'] : 0;
			$images = !empty($product_id) ? $this->Crud_Model->getDatafromtablewhere('product_image', array('product_id' => $product_id)) : array();	
			
			$data["review"] = $review;
			$data["images"] = $images;
			$data['page_title'] = 'Product Rating Detail';
			$data['active_menu'] = 'rating';
			$data['sub_active_menu'] = '';
			$this->load->view('administrator/view_product_rating_detail', $data);
		}
		else
		{
			redirect('administrator/rating', 'refresh');
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