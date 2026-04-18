<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends MY_Controller {
    public function __construct()
    {
        parent::__construct();		
    }

	public function index()
	{
		$this->
data['title'] = "Tearms &amp; Conditions";
		$this->load->view('tearms_conditions',$this->data);
	}
	public function privacy_policy()
	{
		$this->data['title'] = "Privacy Policy";
		$this->load->view('privacy_policy',$this->data);
	}
	public function refund_policy()
	{
		$this->data['title'] = "Refund Policy";
		$this->load->view('refund_policy',$this->data);
	}
	public function shipping_policy()
	{
		$this->data['title'] = "Shipping Policy";
		$this->load->view('shipping_policy',$this->data);
	}
} 