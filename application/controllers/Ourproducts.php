<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ourproducts extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('administrator/Crud_Model');		
    }

	public function index()
	{	
		$this->data['title'] = "Our Products";
		$this->data['act_page'] = "our-products";
		$this->data['act_sub_page'] = "";
		$this->load->view('our-products',$this->data);
	}

}
