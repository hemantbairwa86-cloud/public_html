<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends MY_Controller  {

	function __construct()

	{

		parent::__construct();

		$this->load->model('administrator/Crud_Model');

		$this->is_admin_logged_in();

	}

	public function shipping()
	{ 		
		if(count($this->input->post()) > 0 )
		{			
			$states = $this->input->post('stateprice');			
			foreach($states as $key=>$v)
			{
				$data['shipping_charge'] = $v;
				$data['updated_at'] = date('Y-m-d H:i:s');
				
				$this->Crud_Model->Updatedata($key,'id','own_states',$data);;
			}
		    $this->session->set_flashdata('success', 'Shipping Price Updated Successfully.');
			redirect('administrator/manage/shipping','refresh');
			exit; 
		}
		else
		{
			$data = array();
			$data['par_menu'] = "manage";
			$data['sub_menu'] = "shipping";
			$data['page_title']='Shipping Price';
	
			$data['viewdata']=$this->Crud_Model->getDatafromtablewhereorderby('own_states',array('country_id'=>101),'ASC','name');
			//$data['free_limit']=$this->Crud_Model->getDatafromtablewhereorderby('free_shipping',array('id'=>1),'ASC','id');	
			$data['free_limit']=$this->Crud_Model->getDatafromtablewheresingle('free_shipping',array('id'=>1));	
			$data['other']=$this->Crud_Model->getDatafromtablewheresingle('out_of_india',array('id'=>1));	
			$data['button_value'] = 'Add';
			$data['name']='';
			$data['id']='';			
			$this->load->view('administrator/shipping',$data);
		}	
	}
	
	public function limit()
	{
		
		if(count($this->input->post()) > 0 )
		{
			$this->form_validation->set_rules('shipping_limit', 'Shipping Limit', 'required|trim|numeric');
		
			if ($this->form_validation->run() == FALSE) {
				$data = array();
				$data['par_menu'] = "manage";
				$data['sub_menu'] = "shipping";
				$data['page_title']='Shipping Price';
				$data['viewdata']=$this->Crud_Model->getDatafromtablewhereorderby('own_states',array('country_id'=>101),'ASC','name');
				//$data['free_limit']=$this->Crud_Model->getDatafromtablewhereorderby('free_shipping',array('id'=>1),'ASC','id');
				$data['free_limit']=$this->Crud_Model->getDatafromtablewheresingle('free_shipping',array('id'=>1));	
				$data['other']=$this->Crud_Model->getDatafromtablewheresingle('out_of_india',array('id'=>1));					
				$data['button_value'] = 'Add';
				$data['id']='';
				$this->load->view('administrator/shipping',$data);
			}
			else
			{
					//echo "<pre>"; print_r($_POST) ; exit;	
					$data = array();
					$data['shipping_limit'] = trim($this->input->post('shipping_limit'));
					$this->Crud_Model->Updatedata(1,'id','free_shipping',$data);
					$this->session->set_flashdata('success', 'Free Shipping Limit Updated Successfully.');
					redirect('administrator/manage/shipping','refresh');
					exit;
			}
		}
		else
		{
			redirect('administrator/manage/shipping','refresh');
			exit; 
		}
	}
	
	public function othercountry()
	{
		
		if(count($this->input->post()) > 0 )
		{
			$this->form_validation->set_rules('other_country', 'Out Of India Shipping Price', 'required|trim|numeric');
		
			if ($this->form_validation->run() == FALSE) {
				$data = array();
				$data['par_menu'] = "manage";
				$data['sub_menu'] = "shipping";
				$data['page_title']='Shipping Price';
				$data['viewdata']=$this->Crud_Model->getDatafromtablewhereorderby('own_states',array('country_id'=>101),'ASC','name');
				//$data['free_limit']=$this->Crud_Model->getDatafromtablewhereorderby('free_shipping',array('id'=>1),'ASC','id');
				$data['free_limit']=$this->Crud_Model->getDatafromtablewheresingle('free_shipping',array('id'=>1));	
				$data['other']=$this->Crud_Model->getDatafromtablewheresingle('out_of_india',array('id'=>1));	
				$data['button_value'] = 'Add';
				$data['id']='';
				$this->load->view('administrator/shipping',$data);
			}
			else
			{
					//echo "<pre>"; print_r($_POST) ; exit;	
					$data = array();
					$data['other_country'] = trim($this->input->post('other_country'));
					$this->Crud_Model->Updatedata(1,'id','out_of_india',$data);
					$this->session->set_flashdata('success', 'Out Of India Shipping Price Updated Successfully.');
					redirect('administrator/manage/shipping','refresh');
					exit;
			}
		}
		else
		{
			redirect('administrator/manage/shipping','refresh');
			exit; 
		}
	}
	
	
	
	public function offer()
	{
		if(count($this->input->post()) > 0 )
		{			
			$this->form_validation->set_rules('discount', 'Discount', 'required|trim|numeric');
			if ($this->form_validation->run() == FALSE) {
				$data = array();
				$data['par_menu'] = "manage";
				$data['sub_menu'] = "offer";
				$data['page_title']='Discount / Offer';
				$data['offers']=$this->Crud_Model->getDatafromtablewheresingle('festival_discount',array('id'=>1));	
				$data['button_value'] = 'Add';
				$data['id']='';
				$this->load->view('administrator/offers',$data);
			}
			else
			{
					//echo "<pre>"; print_r($_POST) ; exit;	
					$data = array();
					$data['discount'] = trim($this->input->post('discount'));
					$this->Crud_Model->Updatedata(1,'id','festival_discount',$data);
					$this->session->set_flashdata('success', 'Offer Discount Updated Successfully.');
					redirect('administrator/manage/offer','refresh');
					exit;
			}
			
		}
		else
		{
			$data = array();
			$data['par_menu'] = "manage";
			$data['sub_menu'] = "offer";
			$data['page_title']='Discount / Offer';
			$data['offers']=$this->Crud_Model->getDatafromtablewheresingle('festival_discount',array('id'=>1));				
			$data['button_value'] = 'Add';
			$data['name']='';
			$data['id']='';			
			$this->load->view('administrator/offers',$data);
		}
	}





}





?>
