<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {
    public function __construct()
    {
        parent::__construct();	
		 $this->load->model('administrator/Crud_Model');
    }

	public function index()
	{
		$this->data['title'] = "About Compnay";
		$this->data['act_page'] = "about";
		$this->data['act_sub_page'] = "about_us";
		$this->data['counter']=$this->Crud_Model->getDatafromtablewhere('counter',array(1=>1),'ASC');
	//	echo $this->db->last_query(); 	
	//	echo "<pre>"; print_r($data['counter']) ; exit;
		$this->load->view('about_us',$this->data);
	}
	
	public function product_manufacturing()
	{
		$this->data['title'] = "Product Manufacturing";
		$this->data['act_page'] = "about";
		$this->data['act_sub_page'] = "product_manufacturing";
		$this->data['counter']=$this->Crud_Model->getDatafromtablewhere('counter',array(1=>1),'ASC');
		$this->load->view('product_manufacturing',$this->data);
	}
	public function third_party_manufacturing()
	{
		$this->data['title'] = "Third Party Manufacturing";
		$this->data['act_page'] = "third_party";
		$this->data['counter']=$this->Crud_Model->getDatafromtablewhere('counter',array(1=>1),'ASC');
		$this->data['act_sub_page'] = "third_party_manufacturing";
		$this->load->view('third_party_manufacturing',$this->data);
	}
	
}
