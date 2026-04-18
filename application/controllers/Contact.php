<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {
    public function __construct()
    {
        parent::__construct();		
    }

	public function index()
	{
		$this->data['title'] = "Contact Us";
		$this->data['act_page'] = "contact";
		$this->data['act_sub_page'] = "";	
		$this->load->view('contact_us',$this->data);
	}
}
