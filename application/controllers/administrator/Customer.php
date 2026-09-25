<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

	function __construct()

	{

		parent::__construct();

		$this->is_admin_logged_in();

		$this->load->model('administrator/Crud_Model');

	}

	public function index()
	{	   

		$data['page_title']='Customer';
		$data['active_menu'] = 'customer';
		$data['sub_active_menu'] = '';
	//	$data['viewdata']=$this->Crud_Model->GetAllCustomerDetails('');
		$this->load->view('administrator/view_customer',$data);

	}

	public function view_customer_ajax_data()
	{	   

		$requestData= $_REQUEST;
		$tot_rec=$this->db->select("id")->from('users')->where('status',1)->get()->result_array();
		$totalData = count($tot_rec);
       	$totalFiltered = $totalData; 
		$this->db->select("u.*,c.name as country_name,s.name as state_name");
        $this->db->from('users as u');                
        if(!empty($requestData['search']['value'])) {
        	$this->db->group_start();
            $this->db->or_like('u.name',$requestData['search']['value']);
			$this->db->or_like('u.surname',$requestData['search']['value']);
            $this->db->or_like('u.mo_number',$requestData['search']['value']);
            $this->db->or_like('u.email',$requestData['search']['value']);
			$this->db->or_like('u.city',$requestData['search']['value']);
            $this->db->group_end();
        }
        $this->db->join('own_countries c', 'u.country = c.id');
	    $this->db->join('own_states s', 'u.state = s.id');
		$this->db->order_by('u.id','DESC');

        $this->db->limit($requestData['length'], $requestData['start']);
        $query1 = $this->db->get();
        $row=$query1->result_array();	
        //echo $this->db->last_query();		

		$k=$requestData['start'] + 1;
        $data = array();
        foreach ($row as $key => $val) 
        { 
			$mylink = base_url()."administrator/customer/orders/".$val['id']; 
            $nestedData = array();
            $nestedData[] = $k;
            $nestedData[] = $val['name']." ".$val['surname'];
            $nestedData[] = $val['mo_number'];
            $nestedData[] = $val['email'];
            $nestedData[] = $val['city'];
			/* if($val['status'] == 1){ 

                $nestedData[] = '<button type="button" class="btn btn-sm btn-toggle changestatus active" data-table="billing_customer" data-field="status" data-id-name="id" data-id="'.$val['id'].'" data-toggle="button" aria-pressed="1" autocomplete="off"><div class="handle"></div></button>';

            } else { 

                $nestedData[] ='<button type="button" class="btn btn-sm btn-toggle changestatus" data-table="billing_customer" data-field="status" data-id-name="id" data-id="'.$val['id'].'" data-toggle="button" aria-pressed="0" autocomplete="off"><div class="handle"></div></button>';

            } */

            $nestedData[] = '<a href="'.$mylink.'" class="btn btn-sm btn-outline-info btn-action-icon" title="View Customer Details" data-toggle="tooltip"><i class="fa fa-eye"></i></a>';            
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
	
	public function orders($id)
	{		
		$this->db->select('u.*,c.name as country_name,s.name as state_name');
        $this->db->from('users as u');
		$this->db->join('own_countries c', 'u.country = c.id');
	    $this->db->join('own_states s', 'u.state = s.id');
		$this->db->where('u.id',$id);
		$query = $this->db->get();
		$data['customer'] = $query->row_array();  
		
	

		$this->db->select("customer_bill.*,users.name,users.surname");
        $this->db->from('customer_bill');                
        $this->db->join('users', 'customer_bill.customer_id = users.id','LEFT');
        //$this->db->where('customer_bill.status',1);
        $this->db->where('customer_bill.customer_id',$data['customer']['id']);
        $this->db->order_by('customer_bill.order_id','DESC');   
        $query = $this->db->get();

		$data['orders'] = $query->result_array();  
		$data['user_address']=$this->Crud_Model->Getuseraddress(array('user_id'=>$id));   	
		
		$data['wishlistitems']=$this->Crud_Model->FavoriteProductDetails(array('customer_id'=>$id));
	//	echo $this->db->last_query();	
	//	echo "<pre>"; print_r($data) ;exit;
		$data['page_title']='Customer Orsers';
		$data['active_menu'] = 'customer';
		$this->load->view('administrator/customer_orsers',$data);
	}

}

?>