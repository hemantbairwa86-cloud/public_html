<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Checkout extends MY_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('administrator/Crud_Model');		
    }    
	public function index()
	{
		$this->data['cart'] = $this->cart->contents();
		if(empty($this->data['cart'])){
			redirect('our-products'); exit;
		}
		$this->data['country_id'] = 101;
		$this->data['title'] = "Checkout";
		$this->data['country_list']=$this->Crud_Model->getDatafromtablewhere('own_countries',array('id'=>101));
		$this->db->select('users_address.*,own_states.name as state_name');
		$this->db->from('users_address');
		$this->db->join('own_states', 'own_states.id = users_address.state','left');
		$this->db->where('user_id',$this->session->userdata('user_front_session')['id']);
		$query = $this->db->get();
		$this->data['address_list']= $query->result_array();
		$this->data['discount'] = $this->db->query("SELECT u.discount FROM festival_discount u WHERE u.id = 1")->row_array();
		$this->data['shipping_limit'] = $this->db->query("SELECT u.shipping_limit FROM free_shipping u WHERE u.id = 1")->row_array();
		$this->load->view('checkout',$this->data);
	}
	public function signup()
	{
		if(is_login_user_front())
		{
			redirect('checkout'); exit;
		}
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('address','address', 'trim|required');
		$this->form_validation->set_rules('landmark','landmark', 'trim|required');
		//$this->form_validation->set_rules('country','country', 'trim|required|numeric');
		$this->form_validation->set_rules('state','state', 'trim|required|numeric');
		$this->form_validation->set_rules('city','city', 'trim|required');
		$this->form_validation->set_rules('pincode','pincode', 'trim|required');
		$this->form_validation->set_rules('mobile','mobile', 'trim|required');
		$this->form_validation->set_rules('email','email', 'trim|required');
		$this->form_validation->set_rules('password','password', 'trim|required');
		$this->form_validation->set_rules('confirm_password','confirm_password', 'trim|required|matches[password]');
		if ($this->form_validation->run() == FALSE) 
		{
			$this->data['cart'] = $this->cart->contents();
			$this->data['title'] = "Checkout";
			$this->data['country_id'] = 101;
			$this->data['country_list']=$this->Crud_Model->getDatafromtablewhere('own_countries',array('id'=>101));
			$this->data['first_name'] = trim($this->input->post('first_name'));
			$this->data['last_name'] = trim($this->input->post('last_name'));
			$this->data['address'] = trim($this->input->post('address'));
			$this->data['landmark'] = trim($this->input->post('landmark'));
			$this->data['country'] = trim($this->input->post('country'));
			$this->data['state'] = trim($this->input->post('state'));
			$this->data['city'] = trim($this->input->post('city'));
			$this->data['pincode'] = trim($this->input->post('pincode'));
			$this->data['mobile'] = trim($this->input->post('mobile'));
			$this->data['email'] = trim($this->input->post('email'));
			$this->data['password'] = trim($this->input->post('password'));
			$this->data['confirm_password'] = trim($this->input->post('confirm_password'));
			$this->load->view('checkout',$this->data);
		}
		else
		{		
			$ins_data['name'] = trim($this->input->post('first_name'));
			$ins_data['surname'] = trim($this->input->post('last_name'));
			$ins_data['address_1'] = trim($this->input->post('address'));
			$ins_data['country'] = 101;//trim($this->input->post('country'));
			$ins_data['state'] = trim($this->input->post('state'));
			$ins_data['city'] = trim($this->input->post('city'));
			$ins_data['pincode'] = trim($this->input->post('pincode'));
			$ins_data['mo_number'] = trim($this->input->post('mobile'));
			$ins_data['email'] = trim($this->input->post('email'));
			$ins_data['password'] = md5(trim($this->input->post('password')));
			$ins_data['ori_password'] = trim($this->input->post('password'));
			$ins_data['create_at'] = date("Y-m-d H:i:s");
			$this->db->insert('users',$ins_data);
			$ins_id = $this->db->insert_id();
			if($ins_id)
			{
				$ins_add['landmark'] = trim($this->input->post('landmark'));
				$ins_add['address'] = trim($this->input->post('address'));
				$ins_add['country'] = trim($this->input->post('country'));
				$ins_add['state'] = trim($this->input->post('state'));
				$ins_add['city'] = trim($this->input->post('city'));
				$ins_add['pincode'] = trim($this->input->post('pincode'));
				$ins_add['mo_number'] = trim($this->input->post('mobile'));
				$ins_add['email'] = trim($this->input->post('email'));
				$ins_add['create_at'] = date("Y-m-d H:i:s");
				$ins_add['user_id'] = $ins_id;
				$ins_add['is_default'] = 1;
				$this->db->insert('users_address',$ins_add);
				$ins_add_id = $this->db->insert_id();
				$user=$this->db->select("*")->from('users')->where('id',$ins_id)->get()->row_array();
				$user['cur_sel_address'] = $ins_add_id;
       			$this->session->set_userdata('user_front_session',$user);
			}
			redirect('checkout'); exit;
		}
	}
	public function addaddress()
	{
		if(!is_login_user_front())
		{
			redirect('checkout'); exit;
		}
		$this->form_validation->set_rules('address_extra','address', 'trim|required');
		$this->form_validation->set_rules('landmark_extra','landmark', 'trim|required');
		//$this->form_validation->set_rules('country_extra','country', 'trim|required|numeric');
		$this->form_validation->set_rules('state_extra','state', 'trim|required|numeric');
		$this->form_validation->set_rules('city_extra','city', 'trim|required');
		$this->form_validation->set_rules('pincode_extra','pincode', 'trim|required');
		if ($this->form_validation->run() == FALSE) 
		{
			$this->data['cart'] = $this->cart->contents();
			$this->data['title'] = "Checkout";
			$this->data['country_id'] = 101;
			$this->data['country_list']=$this->Crud_Model->getDatafromtablewhere('own_countries',array('id'=>101));
			$this->data['address_extra'] = trim($this->input->post('address_extra'));
			$this->data['landmark_extra'] = trim($this->input->post('landmark_extra'));
			$this->data['country_extra'] = trim($this->input->post('country_extra'));
			$this->data['state_extra'] = trim($this->input->post('state_extra'));
			$this->data['city_extra'] = trim($this->input->post('city_extra'));
			$this->data['pincode_extra'] = trim($this->input->post('pincode_extra'));
			$this->load->view('checkout',$this->data);
		}
		else
		{		
			$this->db->where('user_id',$this->session->userdata('user_front_session')['id'])->update('users_address',array('is_default',0));
			$ins_add['landmark'] = trim($this->input->post('landmark_extra'));
			$ins_add['address'] = trim($this->input->post('address_extra'));
			$ins_add['country'] = 101;//trim($this->input->post('country_extra'));
			$ins_add['state'] = trim($this->input->post('state_extra'));
			$ins_add['city'] = trim($this->input->post('city_extra'));
			$ins_add['pincode'] = trim($this->input->post('pincode_extra'));
			$ins_add['create_at'] = date("Y-m-d H:i:s");
			$ins_add['user_id'] = $this->session->userdata('user_front_session')['id'];
			$ins_add['is_default'] = 1;
			$this->db->insert('users_address',$ins_add);
			$ins_add_id = $this->db->insert_id();
			$user=$this->db->select("*")->from('users')->where('id',$this->session->userdata('user_front_session')['id'])->get()->row_array();
			$user['cur_sel_address'] = $ins_add_id;
   			$this->session->set_userdata('user_front_session',$user);
			redirect('checkout'); exit;
		}
	}
}