<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
    public function __construct()
    {
        parent::__construct();	
		 $this->load->model('administrator/Crud_Model');
		 $this->load->model('administrator/User','',TRUE);
    }

	public function index()
	{
		
		if(count($this->input->post()) > 0 )
		{
			
			$btn = trim($this->input->post('btn'));			
			if($btn == 'Login') 
			{
				$this->form_validation->set_rules('email', 'Email Id', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				if ($this->form_validation->run() == FALSE) 
				{
					//echo "000zzzzzzzzzzzzz"; exit;
					$this->data['title'] = "Login / Registration";
					$this->data['act_page'] = "";
					$this->data['act_sub_page'] = "";
					$this->data['country_id'] = 101;
					$this->data['country_list']=$this->Crud_Model->getDatafromtablewhere('own_countries',array('id'=>101));
					$this->load->view('login',$this->data);
				}
				else
				{
					$email= trim($this->input->post('email'));
					$password = trim($this->input->post('password'));
					$user=$this->db->select("*")->from('users')->where('email',$email)->where('password',md5($password))->get()->row_array();
					if(empty($user))
					{
						$this->session->set_flashdata('errors', 'Invalid Email Id or Passwrod. Try Again.');
						redirect('login','refresh'); exit;
					}else
					{
						$address=$this->db->select("id")->from('users_address')->where('user_id',$user['id'])->where('is_default',1)->get()->row_array();
						$user['cur_sel_address'] = $address['id'];
						$this->session->set_userdata('user_front_session',$user);
						
						redirect('dashboard','refresh'); exit;
					}
					
				}
				
				
			}
		}
		else
		{
			$this->data['title'] = "Login / Registration";
			$this->data['act_page'] = "";
			$this->data['act_sub_page'] = "";
			$this->data['country_id'] = 101;
			$this->data['country_list']=$this->Crud_Model->getDatafromtablewhere('own_countries',array('id'=>101));
			$this->load->view('login',$this->data);
		}
		
	}	
	
	public function signup()
	{
		if(is_login_user_front())
		{
			redirect('dashboard'); exit;
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
			$this->load->view('login',$this->data);
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
				$ins_add['country'] = 101;//
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

			if($this->input->post('diffrent_ship'))
			{
				$ins_add['landmark'] = trim($this->input->post('landmark_extra'));
				$ins_add['address'] = trim($this->input->post('address_extra'));
				$ins_add['country'] = 101;//trim($this->input->post('country'));
				$ins_add['state'] = trim($this->input->post('state_extra'));
				$ins_add['city'] = trim($this->input->post('city_extra'));
				$ins_add['pincode'] = trim($this->input->post('pincode_extra'));
				$ins_add['mo_number'] = trim($this->input->post('mobile_extra'));
				$ins_add['email'] = trim($this->input->post('email_extra'));
				$ins_add['create_at'] = date("Y-m-d H:i:s");
				$ins_add['user_id'] = $this->session->userdata('user_front_session')['id'];
				$this->db->insert('users_address',$ins_add);
				$ins_add_id = $this->db->insert_id();
				$user=$this->db->select("*")->from('users')->where('id',$ins_id)->get()->row_array();
				$user['cur_sel_address'] = $ins_add_id;
       			$this->session->set_userdata('user_front_session',$user);
       			$user_id= $this->session->userdata('user_front_session')['id'];	
			}
			redirect('dashboard'); exit;
		}
	}	

	public function forgot()
	{
		$this->data['title'] = "Reset Password";
		$this->data['act_page'] = "";
		$this->data['act_sub_page'] = "";
		$this->load->view('forgot_password',$this->data);
	}
	
	public function reset_link()
	{
		$this->form_validation->set_rules('email', 'Email','required|trim');
		if($this->form_validation->run() == FALSE) 
		{
			$this->data['title'] = "Reset Password";
			$this->data['act_page'] = "";
			$this->data['act_sub_page'] = "";
			$this->load->view('forgot_password',$this->data);
		}else
		{
			$email = trim($this->input->post('email'));			
			$user = $this->User->checkUser($email);	
			//echo "<pre>";  print_r($user)		; exit;
			if(count($user)>0){	
				$psw = rand(100000,999999);
				$data['password'] = md5($psw);
			//	$data['org_password'] = $psw;
				$id = $user[0]['id'];
				$username = $user[0]['email'];
				$fieldName = 'id';
				$table = "users";
				$this->Crud_Model->Updatedata($id,$fieldName,$table,$data);
				$message = '<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 18px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><table class="body-wrap" style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 18px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 18px; margin: 0;"><td style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 18px; vertical-align: top; margin: 0;" valign="top"></td><td class="container" width="600" style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 18px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top"><div class="content" style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 18px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;"><table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 18px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff"><tr style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="alert alert-warning" style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #fff; margin: 0; padding: 20px;" align="center" bgcolor="#2f353f" valign="top"><img src="'.base_url("assest/frontend/images/logo.svg").'" width="300" height="auto"><div style="color:green;line-height:32px;font-size:18px;">GMP Certified Company</div></td></tr><tr style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding:20px;padding-top:0px;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 24px;line-height:28px;vertical-align: top; margin: 0; padding: 10px 20px;" valign="top"><div style="line-height:20px;">'.FIRM_NAME.'<div style="font-size:18px;line-height:28px;">'.FIRM_ADDRESS.'</div></div><hr><p style="font-family:Verdana;font-size:16px;">Email : <b>'.$username.'</b></p><p style="font-family:Verdana;">New Password : <b>'.$psw.'</b></p><br><p style="line-height:38px;">Please click on below link <br><a target="_blank" style="background-color: #4CAF50; border: none; color: white;padding: 5px 30px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;font-weight:bold;font-family:Verdana;" href="'.base_url().'login/">Login Now</a></p></td></tr><tr><td><table width="100%" cellpadding="5" cellspacing="2" style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 14px; margin: 0;"></table><br></td></tr><tr style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top"></td></tr><tr style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">Thank you. </td></tr></table></td></tr></table></div></td><td style="font-family: Helvetica Neue; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td></tr></table></body>';									
				echo $message ; exit;
				  if(send_mail($email,$message,'Venus Products | Reset Password')){
					   $this->session->set_flashdata("success","Email sent successfully. Check Your E-mail.");
				  }
				  else{
						 //show_error($this->email->print_debugger());
						 $this->session->set_flashdata("errors","Email sent error"); 
				  }
				redirect("forgot-password",'refresh'); exit;
			}else{
				$this->session->set_flashdata("errors","Error :Email does not exist. Please enter registered Email.");
				redirect("forgot-password",'refresh'); exit;
			}
			
			
			
					
		}
	}
	
	
	
}
