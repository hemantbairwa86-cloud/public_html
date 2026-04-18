<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('administrator/Crud_Model');		
    }    
	public function index($oid="")
	{
		if(!is_login_user_front())
		{
			redirect('','refresh'); exit;
		}
		else
		{		
		$this->data['title'] = "Dashboard";
		$this->data['customer_detail'] = $this->Crud_Model->getById($_SESSION['user_front_session']['id'],'id','users');
		$this->data['order_list'] = $this->Crud_Model->getDatafromtablewhere('customer_bill',array('customer_id'=>$_SESSION['user_front_session']['id'],'paid_status'=>1),'desc');
		$this->data['user_address']=$this->Crud_Model->Getuseraddress(array('user_id'=>$_SESSION['user_front_session']['id']));
		$this->data['state_list']=$this->Crud_Model->getDatafromtablewhere('own_states',array('country_id'=>101));
			
		$this->data['FavoriteProductDetails']=$this->Crud_Model->GetFavoriteProductDetails(array('customer_id'=>$this->session->userdata('user_front_session')['id']));	
			
			//$this->data['order_list']=$this->db->select("*")->from('orders')->where('CustomerID',$this->session->userdata('user_front_session')['id'])->order_by("OrderID", "desc")->get()->result_array();			
		
			
			
			$this->load->view('dashboard',$this->data);
		}
	}
	public function update_password()
	{
		$oldpassword = trim($this->input->post('oldpassword'));
		$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');		
		$user_id=$this->session->userdata('user_front_session')['id'] ;
		if ($this->form_validation->run() == FALSE) 
		{				    
			$this->data['title'] = "Dashboard";				
			$this->session->set_flashdata("errors","Error : All fileds are requred for change Passwrod. Please Try Again !");
			$this->session->set_flashdata('active', 'password');
			redirect('dashboard','refresh');
			exit;
		}
		else
		{				
			$checkuser = $this->Crud_Model->getById($user_id,'id','users');
			if($checkuser['password'] == md5($oldpassword))
			{
				$data['password'] = md5(trim($this->input->post('password')));
				$data['ori_password'] = trim($this->input->post('password'));
				$this->Crud_Model->Updatedata($user_id,'id','users',$data);
				$this->session->set_flashdata('success', 'Password Updated Successfully.');
				$this->session->set_flashdata('active', 'password');
				redirect('dashboard','refresh');
				exit;
			}
			else
			{					
				$this->session->set_flashdata("errors","Error : Old Password was wrong, Please Try Again !");
				$this->session->set_flashdata('active', 'password');
				redirect('dashboard','refresh');
				exit;
			}
		}
	}
	public function upaddress()
	{
		$address_id= trim($this->input->post('address_id'));
		$data['address']= trim($this->input->post('address_extra'));
		$data['landmark']= trim($this->input->post('landmark_extra'));
		$data['state']= trim($this->input->post('state_extra'));
		$data['city']= trim($this->input->post('city_extra'));
		$data['pincode']= trim($this->input->post('pincode_extra'));
		if($address_id)
		{
			$this->Crud_Model->Updatedata($address_id,'id','users_address',$data);
			$this->session->set_flashdata('success', 'Address Updated Successfully.');
			$this->session->set_flashdata('active', 'address');
		}else{
			$this->session->set_flashdata("errors","Error : Something Gose wrong, Please Try Again !");
			$this->session->set_flashdata('active', 'address');
		}
		redirect('dashboard','refresh');
		exit;
	}
	public function order($OrderID)
	{
		$orderfe=array('order_id'=>$OrderID);
		//print_r($orderfe) ; exit;
		$OrderData=$this->Crud_Model->GetOrderSingleDetails_new($orderfe);				
		if(!empty($OrderData))
		{
			$dataf=array('order_id'=>$OrderData['id']);
			$GetOrderProductDetails=$this->Crud_Model->GetOrderProductDetails_new($dataf);			
			//echo "<pre>"; print_r($GetOrderProductDetails); exit;

			$this->db->select("u.*,c.name as country_name,s.name as state_name");
			  $this->db->from('users u');
			  $this->db->join('own_countries c', 'u.country = c.id');
			  $this->db->join('own_states s', 'u.state = s.id');
			  $this->db->where("u.id",$OrderData['customer_id']);
			  $query = $this->db->get();
			  $res = $query->row_array();
			 $data['cust'] = $res;
			$data["OrderData"] = $OrderData;
			$data["OrderProductDetails"] = $GetOrderProductDetails;
			$data['page_title']='Order View';
			$data['active_menu'] = 'order';
			$data['sub_active_menu'] = '';
			$this->load->view('administrator/view_order_details',$data);
		}
		else
		{
			redirect('dashboard','refresh');
			exit;
		}
	}
}
?>