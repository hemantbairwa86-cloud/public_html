<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Counter extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->is_admin_logged_in();
		$this->load->model('administrator/Crud_Model');
	}
	public function index()
	{
	    if(count($this->input->post()) > 0 )
		{
			$this->form_validation->set_rules('val1', 'Satisfied Clients', 'trim|required|numeric');
			$this->form_validation->set_rules('val2', 'Total Products', 'trim|required|numeric');
			$this->form_validation->set_rules('val3', 'Manufacturing', 'trim|required|numeric');
			$this->form_validation->set_rules('val4', 'Cities Cover', 'trim|required|numeric');						
			if ($this->form_validation->run() == FALSE) 
			{
				$counter=$this->Crud_Model->getDatafromtable('counter','asc');
				$data["val1"] = $this->input->post('val1');
				$data["val2"] = $this->input->post('val2');
				$data["val3"] = $this->input->post('val3');
				$data["val4"] = $this->input->post('val4');				
				$data["button_value"]="Update";
				$data['page_title']='Counter';
				$this->load->view('administrator/counter.php',$data);
			}
			else
			{
				$data["val1"] = $this->input->post('val1');
				$data["val2"] = $this->input->post('val2');
				$data["val3"] = $this->input->post('val3');
				$data["val4"] = $this->input->post('val4');	
				$fieldName = 'id';
				$table = "counter";
				for($i=1;$i<=4;$i++)
				{
					$udata['value'] =  $data['val'.$i];
					//echo $udata."<br>";
					$this->db->where('id', $i);
					$this->db->update($table, $udata);					
				}
				
				
				
				
				$this->session->set_flashdata('success', 'Counter Update Successfully.');
				redirect('administrator/counter','refresh');
				exit;
			}
		}
		else
		{		
			$counter=$this->Crud_Model->getDatafromtable('counter','asc');
			$i=1;
			foreach ($counter as $key => $v)
			{
				$data['val'.$i]=$v['value'];
				$i++;
			}			
			$data["button_value"]="Update";
			$data['page_title']='Counter';
		//	echo "<pre>"; print_r($data) ; exit;
			$this->load->view('administrator/counter.php',$data);
		}	
	}
	
			

}