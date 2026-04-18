<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Error_404 extends MY_Controller {
	function __construct()
	{
		parent::__construct();				
	}
	public function index()
	{
		$data['page_title'] = "Error 404 | Page Not Found.";
		$data['act_page'] = "";
		$data['act_sub_page'] = "";	
		$this->output->set_status_header('404');
		$this->load->view('404',$this->data);
	}
}