<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller {
    public function __construct()
    {
        parent::__construct();	
        $this->load->model('administrator/Crud_Model');
    }
	public function login()
	{	
		if(is_login_user_front())
		{
			redirect('checkout', 'refresh'); exit;
		}
		$this->form_validation->set_rules('email','Email', 'trim|required');
		$this->form_validation->set_rules('password','password', 'trim|required');
		if ($this->form_validation->run() == FALSE) 
		{
			$this->data['cart'] = $this->cart->contents();
			$this->data['title'] = "Checkout";
			$this->data['country_id'] = 101;
			$this->data['country_list']=$this->Crud_Model->getDatafromtablewhere('own_countries',array('id'=>101));
			$this->load->view('checkout',$this->data);
		}
		else
		{		
			$email= trim($this->input->post('email'));
			$password = trim($this->input->post('password'));
			$user=$this->db->select("*")->from('users')->where('email',$email)->where('password',md5($password))->get()->row_array();
			if(empty($user))
			{
				$this->session->set_flashdata('errors', 'Invalid Email Id or Passwrod. Try Again.');
			}else
			{
				$address=$this->db->select("id")->from('users_address')->where('user_id',$user['id'])->where('is_default',1)->get()->row_array();
				$user['cur_sel_address'] = $address['id'];
   				$this->session->set_userdata('user_front_session',$user);
   			}
			redirect('checkout', 'refresh'); exit;
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user_front_session');
   		session_destroy();
   		redirect('home', 'refresh'); exit;
	}
}