<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Master extends MY_Controller  {
	function __construct()
	{
		parent::__construct();
		$this->load->model('administrator/Crud_Model');
		$this->is_admin_logged_in();
	}
	public function category()
	{ 		
		$data = array();
		$data['par_menu'] = "master";
		$data['sub_menu'] = "categories";
		$data['page_title']='category';
		$data['viewdata']=$this->Crud_Model->getDatafromtable('category');
		$data['button_value'] = 'Add';
		$data['name']='';
		$data['id']='';
		$this->load->view('administrator/category',$data);
	}
	public function add_category()
	{	
		if(count($this->input->post()) > 0 )
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('image', '', 'callback_file_check');
			if ($this->form_validation->run() == FALSE) {
				$data["id"] = "";
				$data["name"] =$this->input->post('name');
				$data["button_value"]="Add";
				$data['viewdata']=$this->Crud_Model->getDatafromtablewhere('category',array(1=>1),'DESC');
				$data['par_menu'] = "master";
				$data['sub_menu'] = "category";
				$this->load->view('administrator/category',$data);				
			}else{		
				$data["name"] =trim($this->input->post('name'));
				$data["shortname"] =trim($this->input->post('name'));
				$cnt = $this->Crud_Model->getDatafromtablewhere('category',array('id!='=>0),'DESC');
				$data["displayorder"] =count($cnt)+1;
				$data["isdelete"] =0;
				$data["createdip"] =0;
				$data["status"] =1;
				$data["slug"] =create_slug($data["name"]);
				$data["created_datetime"] =date("Y-m-d H:i:s");
				$data["modified_datetime"] =date("Y-m-d H:i:s");
				$config['upload_path']   = 'uploads/collections/';
                $config['allowed_types'] = 'png';
                $config['encrypt_name'] = TRUE;
               // $config['max_size']      = 1024;
                $config['max_width']  = '600';
        		$config['max_height']  = '600';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $uploadedFile = $uploadData['file_name'];                   
                    $data['image'] = $uploadedFile;
                }			
				$this->Crud_Model->InsertData('category',$data);
				$this->session->set_flashdata('success', 'Category Inserted Successfully.');
				redirect('administrator/master/category');
				exit;
			}
		}else{ 
			$data["id"] = "";
			$data['name']='';
			$data["button_value"]="Add";
			$data['page_title']='Category';
			$data['par_menu'] = "master";
			$data['sub_menu'] = "categories";
			$data['viewdata']=$this->Crud_Model->getDatafromtablewhere('category',array(1=>1),'DESC');
			$this->load->view('administrator/category',$data);
		}	
	}
	public function file_check($str){
        $allowed_mime_type_arr = array('image/png');
        $mime = get_mime_by_extension($_FILES['image']['name']);
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr))
            {
            	 list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
            	 if ($width != 600 || $height != 600 )
            	 {
            	 	$this->form_validation->set_message('file_check', 'Invaliad Width / Height.');
                	return false;
            	 }else
            	 { 
                	return true;
                }
            }else{
                $this->form_validation->set_message('file_check', 'Please select only png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }
	public function edit_category($id)
	{
		if(count($this->input->post()) > 0 )
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('image', 'Image', 'callback_file_check_edit');
			if ($this->form_validation->run() == FALSE) {
				$data["id"] = $this->input->post('id');
				$data["name"] =$this->input->post('name');
				$data["button_value"]="Update";
				$data['par_menu'] = "master";
				$data['sub_menu'] = "categories";
				$this->load->view('administrator/category',$data);
			}else{		
				$data["name"] =$this->input->post('name');
				if(isset($_FILES['image']['name']) && $_FILES['image']['name']!="")
				{
					$config['upload_path']   = 'uploads/collections/';
	                $config['allowed_types'] = 'png';
	                $config['encrypt_name'] = TRUE;
	               // $config['max_size']      = 1024;
	                $config['max_width']  = '600';
	        		$config['max_height']  = '600';
	                $this->load->library('upload', $config);
	                if($this->upload->do_upload('image')){
	                    $uploadData = $this->upload->data();
	                    $uploadedFile = $uploadData['file_name'];                   
	                    $data['image'] = $uploadedFile;
	                }	
	                $editdata=$this->Crud_Model->getById($id,'id','category');
					unlink('uploads/collections/'.$editdata['image']);
					unlink('uploads/collections/thumbnails/'.$editdata['image']);
	            }	
				$id=$this->input->post('id');
				$this->Crud_Model->Updatedata($id,'id','category',$data);
				$this->session->set_flashdata('success', 'Category Update Successfully.');
				redirect('administrator/master/category','refresh');
				exit;
			}
		}else{
			$editdata=$this->Crud_Model->getById($id,'id','category');
			$data["id"] = $id;
			$data["button_value"]="Update";
			$data['name']=$editdata['name'];
			$data['image']=$editdata['image'];
			$data['page_title']='Category';
			$data['par_menu'] = "master";
			$data['sub_menu'] = "categories";
			$data['viewdata']=$this->Crud_Model->getDatafromtablewhere('category',array(1=>1),'DESC');
			$this->load->view('administrator/category',$data);
		}
	}
	public function delete_category($id = null)
	{
		if(!empty($id))
		{
			$editdata = $this->Crud_Model->getById($id, 'id', 'category');
			if (!empty($editdata['image'])) {
				@unlink(FCPATH . 'uploads/collections/' . $editdata['image']);
				@unlink(FCPATH . 'uploads/collections/thumbnails/' . $editdata['image']);
			}
			$this->Crud_Model->DeletData($id, 'id', 'category');
			$this->session->set_flashdata('success', 'Category Deleted Successfully.');
		}
		redirect('administrator/master/category');
		exit;
	}
	public function file_check_edit($str)
	{
	        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
	        $mime = get_mime_by_extension($_FILES['image']['name']);
	        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
	            if(in_array($mime, $allowed_mime_type_arr))
	            {
	            	 list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
	            	 if ($width != 600 || $height != 600 )
	            	 {
	            	 	$this->form_validation->set_message('file_check_edit', 'Invaliad Width / Height.');
	                	return false;
	            	 }else
	            	 { 
	                	return true;
	                }
	            }else{
	                $this->form_validation->set_message('file_check_edit', 'Please select only jpg/png file.');
	                return false;
	            }
	        }else{
	            return true;
	        }
    }
	public function check_duplicate()
	{
		$row_id = trim($this->input->post('row_id'));
		$table_name = trim($this->input->post('table_name'));
		$field_name = trim($this->input->post('field_name'));
		$field_value = trim($this->input->post('field_value'));
		$this->db->select("*");
		$this->db->from($table_name);
		$this->db->where($field_name,$field_value);
		if($row_id != 0 && $row_id != '')
		{
			$this->db->where('id !=',$row_id);
		}
		$query=$this->db->get();
		$query->row_array();
		if($query->num_rows() > 0)
		{
			echo json_encode(array('error'=>1,'msg'=>'Error : Name Already Exists..')); exit;
		}else{
			echo json_encode(array('error'=>0,'msg'=>'Insert Successfully..')); exit;
		}
	}
	public function file_check_category($str)
	{
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['image']['name']);
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr))
            {
            	 list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
            	 if ($width != 600 || $height != 450 )
            	 {
            	 	$this->form_validation->set_message('file_check_category', 'Invaliad Width / Height.');
                	return false;
            	 }else
            	 { 
                	return true;
                }
            }else{
                $this->form_validation->set_message('file_check_category', 'Please select only png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_category', 'Please choose a file to upload.');
            return false;
        }
    }
	public function GetCollectionWiseCategory()
	{ 		
		$collectionid = $this->input->post('collectionid');
		$SubcategoryDetailsHtml='';
		if($collectionid!=''){
            $SubcategoryDetails=$this->Crud_Model->getDatafromtablelike('sub_category',array('status'=>1,'category_id'=>$collectionid),'ASC','name');            
            if(!empty($SubcategoryDetails)){
             	foreach ($SubcategoryDetails as $sckey => $scvalue) {
                    $SubcategoryDetailsHtml .='<option value="'.$scvalue['id'].'">'.ucwords($scvalue['name']).'</option>'; 
                } 
            }else{
            	$SubcategoryDetailsHtml .='<option value="">Select Category</option>';	
            }
        }else{
        	 $SubcategoryDetailsHtml .='<option value="">Select Category</option>';
        }
        echo json_encode($SubcategoryDetailsHtml);exit;
	}
	//Trending  START
	public function trending()
	{ 		
		$data = array();
		$data['page_title']='Trending Products';
	    $this->db->select('t.*,s.name as category_name');
	    $this->db->where("t.status",1);
	    $this->db->from('trending t');
	    $this->db->join('category s', 't.category_id = s.id');
	    $data['viewdata'] = $this->db->get()->result_array();
		$data['button_value'] = 'Trending Product';
		$data['name']='';
		$data['par_menu'] = "master";
		$data['sub_menu'] = "trending";
		$this->load->view('administrator/trending',$data);
	}
	public function edit_trending($id)
	{
		if(count($this->input->post()) > 0 )
		{
			if($this->input->post('img_hidden')=="")
			{
				$this->form_validation->set_rules('image', '', 'callback_file_check_trending');
			}
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('category_id', 'Category', 'required');
			$this->form_validation->set_rules('url', 'Url', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data["id"] = $this->input->post('id');
				$editdata=$this->Crud_Model->getById($id,'id','trending');
				$data["button_value"]="Update";
				$data['image']=$editdata['image'];
				$data['title']=$this->input->post('title');
				$data['category_id']=$this->input->post('category_id');
				$data['url']=$this->input->post('url');
				$data['page_title']='Trending Product';
				$data['viewdata']=$this->Crud_Model->getDatafromtable('trending');
				$data['colletion']=$this->Crud_Model->getDatafromtablewhere('category',array('status'=>1),'ASC');
				$data['par_menu'] = "master";
				$data['sub_menu'] = "trending";
				$this->load->view('administrator/trending',$data);
			}else{	
				$id=$this->input->post('id');
				$data['title']=trim($this->input->post('title'));
				$data['category_id']=$this->input->post('category_id');
				$data['url']=trim($this->input->post('url'));
				if(isset($_FILES['image']['name']) && $_FILES['image']['name']!="")
				{
					$config['upload_path']   = 'uploads/trending/';
	                $config['allowed_types'] = 'gif|jpg|png';
	                $config['encrypt_name'] = TRUE;
	               // $config['max_size']      = 1024;
	                $config['max_width']  = '850';
	        		$config['max_height']  = '500';
	                $this->load->library('upload', $config);
	                if($this->upload->do_upload('image')){
	                    $uploadData = $this->upload->data();
	                    $uploadedFile = $uploadData['file_name'];                   
	                    $data['image'] = $uploadedFile;
	                    $editdata=$this->Crud_Model->getById($id,'id','trending');
						unlink('uploads/trending/'.$editdata['image']);
						
	                }	
	            }
	            $this->Crud_Model->Updatedata($id,'id','trending',$data);
				$this->session->set_flashdata('success', 'Trending Product Update Successfully.');
				redirect('administrator/master/trending','refresh');
				exit;
			}
		}else{
			$editdata=$this->Crud_Model->getById($id,'id','trending');
			$data["id"] = $id;
			$data["button_value"]="Update";
			$data['image']=$editdata['image'];
			$data['title']=$editdata['title'];
			$data['category_id']=$editdata['category_id'];
			$data['url']=$editdata['url'];
			$data['page_title']='Trending Products';
			$data['viewdata']=$this->Crud_Model->getDatafromtable('trending');
			$data['colletion']=$this->Crud_Model->getDatafromtablewhere('category',array('status'=>1),'ASC');
			$data['par_menu'] = "master";
			$data['sub_menu'] = "trending";
			$this->load->view('administrator/trending',$data);
		}
	}
	public function file_check_trending($str)
	{
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['image']['name']);
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr))
            {
            	 list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
            	 if ($width != 850 || $height != 500 )
            	 {
            	 	$this->form_validation->set_message('file_check_trending', '<b>Error :</b> Invaliad Width / Height.');
                	return false;
            	 }else
            	 { 
                	return true;
                }
            }else{
                $this->form_validation->set_message('file_check_trending', 'Please select only Image file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_trending', '<b>Error :</b> Please upload Trending Product Image');
            return false;
        }
    }
    //END OF Trending Products
   	//WEIGHT MASTER
	public function weight()
	{ 		
		$data = array();
		$data['page_title']='weight';
		$data['viewdata']=$this->Crud_Model->getDatafromtable('weight_master');
		$data['button_value'] = 'Add weight';
		$data['name']='';
		$data['unit']='';
		$data['weight_name']='';		
		$data['id']='';
		$data['par_menu'] = "master";
		$data['sub_menu'] = "weight";
		$this->load->view('administrator/weight_master',$data);
	}
	public function add_weight()
	{	
		if(count($this->input->post()) > 0 )
		{
			$viewdata =$this->Crud_Model->getDatafromtable('weight_master');
			//echo "<pre>"; print_r($_POST); 
			foreach($viewdata as $k => $v){
				if(($v['name'] == $this->input->post('name')) && ($v['unit'] == $this->input->post('unit'))){
					$this->session->set_flashdata('errors', 'Error : Weight Title already exists. Enter New Title');
					redirect('administrator/master/weight','refresh');
				}
			}
			$this->form_validation->set_rules('name', 'Weight Title', 'required|trim');
			$this->form_validation->set_rules('unit', 'Unit', 'required|trim');
			if ($this->form_validation->run() == FALSE) {
				$data["id"] = "";
				$data["name"] = trim($this->input->post('name'));				
				$data["unit"] = trim($this->input->post('unit'));
				$data['weight_name']='';		
				$data["button_value"]="Add";
				$data['viewdata']=$viewdata;
				$data['par_menu'] = "master";
				$data['sub_menu'] = "weight";
				//$data['viewdata']=$this->Crud_Model->getDatafromtablewhere('weight_master',array('status'=>1),'DESC');
				$this->load->view('administrator/weight_master',$data);	
			}else{		
				$unit_name = '';
				$name = trim($this->input->post('name'));				
				foreach ($this->config->item('weight_arr') as $key => $value) {
					if($this->input->post('unit') == $key){
						$unit_name = $name." ".$value;
					}	
				}
				$data["name"] = $name;
				$data["unit"] =$this->input->post('unit');
				$data["weight_name"] = $unit_name;
				//echo "<pre>"; print_r($data);  exit;
				$this->Crud_Model->InsertData('weight_master',$data);
				$this->session->set_flashdata('success', 'Weight Inserted Successfully.');
				redirect('administrator/master/weight','refresh');
			}
		}else{ 
			$data["id"] = "";
			$data['name']='';
			$data['unit']='';
			$data['weight_name']='';
			$data["button_value"]="Add";
			$data['page_title']='Weight';
			$data['par_menu'] = "master";
			$data['sub_menu'] = "weight";
			$data['viewdata']=$this->Crud_Model->getDatafromtablewhere('weight_master',array('status'=>1),'DESC');
			$this->load->view('administrator/weight_master',$data);
		}	
	}
	public function edit_weight($id)
	{
		if(count($this->input->post()) > 0 )
		{
			$viewdata =$this->Crud_Model->getDatafromtable('weight_master');
			//echo "<pre>"; print_r($viewdata); exit;
			foreach($viewdata as $k => $v){
				if(($v['name'] == $this->input->post('name')) && ($v['unit'] == $this->input->post('unit')) && ($v['id'] != $id)  ){
					$this->session->set_flashdata('errors', 'Error : Weight Title already exists. Enter New Title');
					redirect('administrator/master/weight','refresh');
				}
			}
			$this->form_validation->set_rules('name', 'Weight Title', 'required|trim');
			$this->form_validation->set_rules('unit', 'Unit', 'required|trim');
			if ($this->form_validation->run() == FALSE) {
				$data["id"] = $this->input->post('id');
				$data["name"] =$this->input->post('name');
				$data["unit"] =$this->input->post('unit');
				$data['weight_name']="";
				$data["button_value"]="Update";
				$data['par_menu'] = "master";
				$data['sub_menu'] = "weight";	
				$data['viewdata']=$viewdata;
				$this->load->view('administrator/weight_master',$data);	
			}else{	
				$unit_name = '';
				$name = trim($this->input->post('name'));				
				foreach ($this->config->item('weight_arr') as $key => $value) {
					if($this->input->post('unit') == $key){
						$unit_name = $name." ".$value;
					}	
				}
				$data["name"] = $name;
				$data["unit"] =$this->input->post('unit');
				$data["weight_name"] = $unit_name;
				$id=$this->input->post('id');
				$this->Crud_Model->Updatedata($id,'id','weight_master',$data);
				$this->session->set_flashdata('success', 'Weight Update Successfully.');
				redirect('administrator/master/weight','refresh');
				exit;
			}
		}else{
			$editdata=$this->Crud_Model->getById($id,'id','weight_master');
			$data["id"] = $id;
			$data["button_value"]="Update";
			$data['name']=$editdata['name'];
			$data['gram']=$editdata['gram'];
			$data['weight_name']=$editdata['weight_name'];
			$data['unit']=$editdata['unit'];
			$data['page_title']='Cast';
			$data['viewdata']=$this->Crud_Model->getDatafromtable('weight_master');
			//$data['viewdata']=$this->Crud_Model->getDatafromtablewhere('weight_master',array('status'=>1),'DESC');
			$data['par_menu'] = "master";
			$data['sub_menu'] = "weight";
			$this->load->view('administrator/weight_master',$data);	
		}
	}

	public function product($id)
	{
		$editdata=$this->Crud_Model->getById($id,'id','category');
		$data['name']=$editdata['name'];
		$data['page_title']='Product';
		$data['par_menu'] = "master";
		$data['sub_menu'] = "category";

		$this->db->select("p.*");
		$this->db->from('product p')->where('collectiontype',$id);
		//$this->db->join('product_image pi','pi.product_id=p.id','INNER');
        $this->db->order_by('p.pro_order', 'ASC');
        $data['pro_list']= $this->db->get()->result_array();

		$this->load->view('administrator/product_sequence',$data);
	}

	public function change_product_order()
	{ 		
		$pro_arr = $this->input->post('pro_arr');
		$sequence=1;
		foreach ($pro_arr as $key => $v)
		{
			$this->db->where('id',$v)->update("product",array('pro_order'=>$sequence));
			$sequence++;
		}
		
        echo json_encode(array("status"=>1));exit;
	}

	public function delete_weight($id = null)
	{
		if(!empty($id))
		{
			$this->Crud_Model->DeletData($id, 'id', 'weight_master');
			$this->session->set_flashdata('success', 'Weight Variant Deleted Successfully.');
		}
		redirect('administrator/master/weight');
		exit;
	}
}
?>