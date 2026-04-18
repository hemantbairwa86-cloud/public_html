<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends MY_Controller  {
	function __construct()
	{
		parent::__construct();
		$this->load->model('administrator/Crud_Model');
		$this->is_admin_logged_in();
	}
	public function index()
	{ 		
		$data = array();
		$data['page_title']='Product';
		$data['button_value'] = 'Add Product';
		$data['name']='';
		$data['city']='';
		$data['contact_no']='';
		$data['id']='';
		$this->load->view('administrator/products',$data);
	}
	public function add()
	{ 		
		if(count($this->input->post()) > 0 )
		{
			$this->form_validation->set_rules('collectiontype', 'Category Type', 'required|trim');
			$this->form_validation->set_rules('name', 'Product Name', 'required|trim');
			$this->form_validation->set_rules('productcode', 'Product Code', 'required|trim');
			$sel_weight =$this->input->post('sel_weight');
			$txt_old_price =$this->input->post('txt_old_price');
			$txt_new_price =$this->input->post('txt_new_price');
			if(empty($_FILES['image_name']['name'][0])){
				$this->form_validation->set_rules('image_name[]', 'Image', 'required');
			}
			if(empty($sel_weight[0]))
			{
				$this->form_validation->set_rules('sel_weight_1', 'Weight', 'required|numeric');
			}
			/*if(empty($txt_old_price[0]))
			{
				$this->form_validation->set_rules('txt_old_price_1', 'Old Price', 'required|numeric');
			}*/
			if(empty($txt_new_price[0]))
			{
				$this->form_validation->set_rules('txt_new_price_1', 'New Price', 'required|numeric');
			}
			if ($this->form_validation->run() == FALSE) {
				$data["id"] = "";
				$data["collectiontype"] =$this->input->post('collectiontype');
				$data["name"] = trim($this->input->post('name'));
				$data["productcode"] =  trim($this->input->post('productcode'));
				$data["description"] = trim(nl2br($this->input->post('description')));
				$data["additional_information"] = trim($this->input->post('additional_information'));
				$data["button_value"]="Add Product";	
				$data['sel_weight'] = $sel_weight[0];
				$data['txt_old_price'] = $txt_old_price[0];
				$data['txt_new_price'] = $txt_new_price[0];
				$data['colletion']=$this->Crud_Model->getDatafromtablewhere('category',array('status'=>1),'ASC');
				$data['weight_master']=$this->Crud_Model->getDatafromtablewhere('weight_master',array('status'=>1),'ASC');
				$data['highlights']=$this->Crud_Model->getDatafromtablewhere('product_highlights',array('status'=>1),'ASC');
				$this->load->view('administrator/product_details',$data);				
			}else{	
				$collectiontype = $this->input->post('collectiontype');
				$productcode =  trim($this->input->post('productcode'));
				$CollectionDetails = $this->Crud_Model->getDatafromtablewheresingle('category',array('status'=>1,'id'=>$collectiontype),'ASC');
				$CollectionName =url_title($CollectionDetails['name'], 'dash', true);
				$ProductCodeName =url_title($productcode, 'dash', true);
				$ProductName = $CollectionName.'_'.url_title($productcode, 'dash', true);
				$ProductFullName = $CollectionDetails['name'].' '.$CategoryDetails['name'].' '.$productcode;
				//echo $ProductName;exit;
				$ProductSlug = $CollectionName.'_'.$ProductCodeName;		
				$data["collectiontype"] =$collectiontype;
				$data["slug"] = create_slug(trim($this->input->post('name')));//url_title($ProductSlug, 'dash', true);
				$data["name"] =trim($this->input->post('name'));
				$data["productcode"] =$productcode;
				$data["description"] = trim(nl2br($this->input->post('description')));
				$data["additional_information"] = trim($this->input->post('additional_information'));
				$data["status"] =1;
				$data["isdelete"] =0;
				$data['created_datetime']=date('Y-m-d H:i:s');
				$data['createdip']=$_SERVER['REMOTE_ADDR'];


				$this->db->select("p.pro_order");
				$this->db->from('product p')->where('collectiontype',$collectiontype);
				$this->db->limit(1);
		        $this->db->order_by('p.pro_order', 'DESC');
		        $pro_order = $this->db->get()->row_array();
		        $data['pro_order']=$pro_order['pro_order']+1;


				if($this->input->post('highlights')){
					$data["highlight"] =implode(",",$this->input->post('highlights'));
				}
				$ProductId = $this->Crud_Model->InsertData('product',$data);
				// Image Upload
				$folder='product';
				if(!is_dir('uploads/'.$folder.'/')){
					@mkdir('uploads/'.$folder.'/', 0777);
				}
				if(!is_dir('uploads/'.$folder.'/thumbnails')){
					@mkdir('uploads/'.$folder.'/thumbnails', 0777);
				}
				if(!empty($_FILES['image_name']['name'][0]))
				{
					$image = array();
					$ImageCount = count($_FILES['image_name']['name']);
					if($ImageCount > 0)
					{
				        for($i = 0; $i < $ImageCount; $i++){
				            $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
				            $_FILES['file']['type']       = $_FILES['image_name']['type'][$i];
				            $_FILES['file']['tmp_name']   = $_FILES['image_name']['tmp_name'][$i];
				            $_FILES['file']['error']      = $_FILES['image_name']['error'][$i];
				            $_FILES['file']['size']       = $_FILES['image_name']['size'][$i];
			                // Uploaded file data
			                $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
			                $image_name = rand(11111,99999).".".$ext;
							$isupload = compress($file_tmp=$_FILES["file"]["tmp_name"],'uploads/product/'.$image_name, 95);
							$upload_dir_thumb = 'uploads/product/thumbnails/';
							square_crop($file_tmp=$_FILES["file"]["tmp_name"],$upload_dir_thumb.$image_name, 550);
			                $uploadImgData['product_id'] = $ProductId;
			                $uploadImgData['image_name'] = $image_name;
			                $this->Crud_Model->InsertData('product_image',$uploadImgData);
				        }
				    }
				}
				// End Image Upload
				// Extra Field Add 
				$extrafield = $this->input->post('extrafield');
				$extrafieldvalues = $this->input->post('extrafieldvalue');
				//echo "<pre>"; print_r($extrafield); exit;
				if(count($extrafield) > 0){
					 for($i = 0; $i < count($extrafield); $i++){
					 	$extrafieldname=$extrafield[$i];
					 	$extrafieldvalue=$extrafieldvalues[$i];
					 	if($extrafieldname!=''){
					 		$ExtraFieldAdd['product_id'] = $ProductId;
			                $ExtraFieldAdd['ename'] = trim($extrafieldname);
			                $ExtraFieldAdd['evalue'] = trim($extrafieldvalue);
			                $ExtraFieldAdd['displayorder'] = 0;
			                $ExtraFieldAdd["status"] =1;
							$ExtraFieldAdd["isdelete"] =0;
							$ExtraFieldAdd['created_datetime']=date('Y-m-d H:i:s');
							$ExtraFieldAdd['createdip']=$_SERVER['REMOTE_ADDR'];
							$this->Crud_Model->InsertData('product_extra',$ExtraFieldAdd);
					 	}
					 }
				}
				$sel_weight =$this->input->post('sel_weight');
				$txt_old_price =$this->input->post('txt_old_price');
				$txt_new_price =$this->input->post('txt_new_price');
				if(count($sel_weight) > 0){
					 for($i = 0; $i < count($sel_weight); $i++){
					 	$weight=$sel_weight[$i];
					 	$old_price=$txt_old_price[$i];
					 	$new_price=$txt_new_price[$i];
					 	if($weight!='' and $new_price!=''){
					 		$priceFieldAdd['product_id'] = $ProductId;
			                $priceFieldAdd['weight'] = $weight;
			                $priceFieldAdd['old_price'] = $old_price;
			                $priceFieldAdd['new_price'] = $new_price;
			                $priceFieldAdd["status"] =1;
							$priceFieldAdd['created_datetime']=date('Y-m-d H:i:s');
							$this->Crud_Model->InsertData('product_price',$priceFieldAdd);
					 	}
					 }
				}
				// End Extra Field Add 
				$this->session->set_flashdata('success', 'Product Inserted Successfully.');
				redirect('administrator/product');
				exit;
			}
		}
		else{
			$data = array();
			$data['page_title']='Add Product';
			//$data['viewdata']=$this->Crud_Model->getDatafromtable('');
			$data['button_value'] = 'Add Product';
			$data['colletion']=$this->Crud_Model->getDatafromtablewhere('category',array('status'=>1),'ASC');
			$data['weight_master']=$this->Crud_Model->getDatafromtablewhereorderby('weight_master',array('status'=>1),'ASC','unit');
			$data['gender']=$this->Crud_Model->getDatafromtablewhere('trending',array('status'=>1),'ASC');
			$data['highlights']=$this->Crud_Model->getDatafromtablewhere('product_highlights',array('status'=>1),'ASC');
			$data['name']='';
			$data['city']='';
			$data['contact_no']='';
			$data['id']='';
			$this->load->view('administrator/product_details',$data);
		}
	}
	public function editview($id=null){
		$editdata=$this->Crud_Model->getById($id,'id','product');
		if(empty($editdata))
		{
			redirect('administrator/product');
		}
		$data = array();
		$data["id"] = $id;
		$data['page_title']='Update Product';
		//$data['viewdata']=$this->Crud_Model->getDatafromtable('');
		$data['button_value'] = 'Update Product';
		$data['colletion']=$this->Crud_Model->getDatafromtablewhere('category',array('status'=>1),'ASC');
		$data['highlights']=$this->Crud_Model->getDatafromtablewhere('product_highlights',array('status'=>1),'ASC');
		$data['category']=$this->Crud_Model->getDatafromtablelike('sub_category',array('status'=>1,'category_id'=>$editdata['collectiontype']),'ASC');
		$data['image']=$this->Crud_Model->getDatafromtablewhere('product_image',array('product_id'=>$id),'ASC');
		$data['extrafileds']=$this->Crud_Model->getDatafromtablewhere('product_extra',array('product_id'=>$id),'ASC');
		$data['product_price']=$this->Crud_Model->getDatafromtablewhere('product_price',array('product_id'=>$id),'ASC');
		$data['weight_master']=$this->Crud_Model->getDatafromtablewhereorderby('weight_master',array('status'=>1),'ASC','unit');
		$data['collectiontype']=$editdata['collectiontype'];
		$data['selectedhighlight']=explode(',',$editdata['highlight']);
		//print_r($data['selectedgender']);exit;
		$data['productcode']=$editdata['productcode'];
		$data['name']=$editdata['name'];
		$data['price']=$editdata['price'];
		$data['description']=$editdata['description'];
		$data["additional_information"] =$editdata['additional_information'];
		$this->load->view('administrator/product_details',$data);
	}
	public function edit()
	{
		//echo "<pre>"; print_r($_POST); //exit;
		if(count($this->input->post()) > 0 )
		{
			$image=$this->Crud_Model->getDatafromtablewhere('product_image',array('product_id'=>$this->input->post('id')),'ASC');
			$this->form_validation->set_rules('collectiontype', 'Category Type', 'required|trim');
			$this->form_validation->set_rules('name', 'Product Name', 'required|trim');
			$this->form_validation->set_rules('productcode', 'Product Code', 'required|trim');
			$sel_weight =$this->input->post('sel_weight');
			$txt_old_price =$this->input->post('txt_old_price');
			$txt_new_price =$this->input->post('txt_new_price');
			if(count($image)==0 && empty($_FILES['image_name']['name'][0])){
				$this->form_validation->set_rules('image_name[]', 'Image', 'required');
			}
			if(empty($sel_weight[0]))
			{
				$this->form_validation->set_rules('sel_weight_1', 'Weight', 'required|numeric');
			}
			/*if(empty($txt_old_price[0]))
			{
				$this->form_validation->set_rules('txt_old_price_1', 'Old Price', 'required|numeric');
			}*/
			if(empty($txt_new_price[0]))
			{
				$this->form_validation->set_rules('txt_new_price_1', 'New Price', 'required|numeric');
			}
			if ($this->form_validation->run() == FALSE) {
				$id=$this->input->post('id');
				$editdata=$this->Crud_Model->getById($id,'id','product');
				$data = array();
				$data["id"] = $id;
				$data['page_title']='Update Product';
				//$data['viewdata']=$this->Crud_Model->getDatafromtable('');
				$data['button_value'] = 'Update Product';
				$data['colletion']=$this->Crud_Model->getDatafromtablewhere('category',array('status'=>1),'ASC');
				$data['highlights']=$this->Crud_Model->getDatafromtablewhere('product_highlights',array('status'=>1),'ASC');
				$data['category']=$this->Crud_Model->getDatafromtablelike('sub_category',array('status'=>1,'category_id'=>$editdata['collectiontype']),'ASC');
				$data['image']=$this->Crud_Model->getDatafromtablewhere('product_image',array('product_id'=>$id),'ASC');
				$data['extrafileds']=$this->Crud_Model->getDatafromtablewhere('product_extra',array('product_id'=>$id),'ASC');
				$data['product_price']=$this->Crud_Model->getDatafromtablewhere('product_price',array('product_id'=>$id),'ASC');
				$data['weight_master']=$this->Crud_Model->getDatafromtablewhereorderby('weight_master',array('status'=>1),'ASC','unit');
				$data['collectiontype']=$editdata['collectiontype'];
				$data['categoryid']=$editdata['categoryid'];
				$data["name"] =$this->input->post('name');
				$data['sel_weight'] = $sel_weight[0];
				$data['txt_old_price'] = $txt_old_price[0];
				$data['txt_new_price'] = $txt_new_price[0];
				$data['selectedhighlight']=explode(',',$editdata['highlight']);
				//print_r($data['selectedgender']);exit;
				$data['productcode']=$editdata['productcode'];
				$data['price']=$editdata['price'];
				$data['description']=$editdata['description'];
				$data['additional_information']=$editdata['additional_information'];
				$this->load->view('administrator/product_details',$data);
				//redirect('administrator/product/edit/'.$this->input->post('id'));
			}else{		
				$collectiontype = $this->input->post('collectiontype');
				$productcode =  trim($this->input->post('productcode'));
				$CollectionDetails = $this->Crud_Model->getDatafromtablewheresingle('category',array('status'=>1,'id'=>$collectiontype),'ASC');
				$CollectionName =url_title($CollectionDetails['name'], 'dash', true);
				$ProductCodeName =url_title($productcode, 'dash', true); ;
				$ProductName = $CollectionName.'_'.$productcode;
				$ProductFullName = $CollectionDetails['name'].' '.$CategoryDetails['name'].' '.$productcode;
				$ProductSlug = $CollectionName.'_'.$ProductCodeName;
				$data["collectiontype"] =$collectiontype;
				//$data["slug"] =$ProductFullName;
				$data["slug"] =create_slug(trim($this->input->post('name'))); //url_title($ProductSlug, 'dash', true);
				$data["name"] =  trim(trim($this->input->post('name')));
				$data["productcode"] =$productcode;
				$data["price"] =$this->input->post('price');
				$data["description"] = trim(nl2br($this->input->post('description')));
				$data['additional_information']= trim($this->input->post('additional_information')); 
				$data["status"] =1;
				$data["isdelete"] =0;
				$data['created_datetime']=date('Y-m-d H:i:s');
				$data['createdip']=$_SERVER['REMOTE_ADDR'];
				if($this->input->post('highlights')){
					$data["highlight"] =implode(",",$this->input->post('highlights'));
				}
				$ProductId=$this->input->post('id');
				$this->Crud_Model->Updatedata($ProductId,'id','product',$data);
				// Image Upload
					$folder='product';
					if(!is_dir('uploads/'.$folder.'/')){
						@mkdir('uploads/'.$folder.'/', 0777);
					}
					if(!is_dir('uploads/'.$folder.'/thumbnails')){
						@mkdir('uploads/'.$folder.'/thumbnails', 0777);
					}
					if(!empty($_FILES['image_name']['name'][0]))
					{
						$image = array();
						$ImageCount = count($_FILES['image_name']['name']);
						if($ImageCount > 0)
						{
					        for($i = 0; $i < $ImageCount; $i++){
					            $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
					            $_FILES['file']['type']       = $_FILES['image_name']['type'][$i];
					            $_FILES['file']['tmp_name']   = $_FILES['image_name']['tmp_name'][$i];
					            $_FILES['file']['error']      = $_FILES['image_name']['error'][$i];
					            $_FILES['file']['size']       = $_FILES['image_name']['size'][$i];
				                // Uploaded file data
				                $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
				                $image_name = rand(11111,99999).".".$ext;
								$isupload = compress($file_tmp=$_FILES["file"]["tmp_name"],'uploads/product/'.$image_name, 95);
								$upload_dir_thumb = 'uploads/product/thumbnails/';
								square_crop($file_tmp=$_FILES["file"]["tmp_name"],$upload_dir_thumb.$image_name, 550);
				                $uploadImgData['product_id'] = $ProductId;
				                $uploadImgData['image_name'] = $image_name;
				                $this->Crud_Model->InsertData('product_image',$uploadImgData);
					        }
					    }
					}
				// End Image Upload
				// Extra Field Add 
					//echo "<pre>"; print_r($_POST); exit;
				$extrafield = $this->input->post('extrafield');
				$extra_edit_id = $this->input->post('extra_edit_id');
				$extrafieldvalues = $this->input->post('extrafieldvalue');
				if(count($extrafield) > 0){
					 for($i = 0; $i < count($extrafield); $i++){
					 	$extrafieldname=$extrafield[$i];
					 	$extrafieldvalue=$extrafieldvalues[$i];
					 	$extra_edit = $extra_edit_id[$i];
					 	if($extrafieldname!=''){
					 		$ExtraFieldAdd['product_id'] = $ProductId;
			                $ExtraFieldAdd['ename'] = trim($extrafieldname);
			                $ExtraFieldAdd['evalue'] = trim($extrafieldvalue);
			                $ExtraFieldAdd['displayorder'] = 0;
			                $ExtraFieldAdd["status"] =1;
							$ExtraFieldAdd["isdelete"] =0;
							$ExtraFieldAdd['created_datetime']=date('Y-m-d H:i:s');
							$ExtraFieldAdd['createdip']=$_SERVER['REMOTE_ADDR'];
							if($extra_edit)
							{
								$this->db->where('id',$extra_edit)->update('product_extra',$ExtraFieldAdd);
							}else{
								$this->Crud_Model->InsertData('product_extra',$ExtraFieldAdd);
							}
					 	}
					 }
				}
				$sel_weight =$this->input->post('sel_weight');
				$txt_old_price =$this->input->post('txt_old_price');
				$txt_new_price =$this->input->post('txt_new_price');
				$edit_price_row =$this->input->post('edit_price_row');
				if(count($sel_weight) > 0){
					 for($i = 0; $i < count($sel_weight); $i++){
					 	$weight=$sel_weight[$i];
					 	$old_price=$txt_old_price[$i];
					 	$new_price=$txt_new_price[$i];
					 	if($weight!='' and $new_price!=''){
					 		$priceFieldAdd['product_id'] = $ProductId;
			                $priceFieldAdd['weight'] = $weight;
			                $priceFieldAdd['old_price'] = $old_price;
			                $priceFieldAdd['new_price'] = $new_price;
			                $priceFieldAdd["status"] =1;
			                if($edit_price_row[$i]==0)
			                {
								$priceFieldAdd['created_datetime']=date('Y-m-d H:i:s');
								$this->Crud_Model->InsertData('product_price',$priceFieldAdd);
							}else{
								$this->Crud_Model->Updatedata($edit_price_row[$i],'id','product_price',$priceFieldAdd);
							}
					 	}
					 }
				}
				// End Extra Field Add 
				$this->session->set_flashdata('success', 'Product Update Successfully.');
				redirect('administrator/product');
				exit;
			}
		}else{
			redirect('administrator/product');
		}
	}
	public function delete_product($id)
	{
		if($id !='')
		{
			$this->Crud_Model->DeletData($id,'id','product');
			redirect('administrator/product'); exit;
		}
	}
	public function removeprice()
	{
		$id=$this->input->post('rid');
		if($id !='')
		{
			$this->Crud_Model->DeletData($id,'id','product_price');
		}
		echo json_encode(array("array"=>0)); exit;
	}
	public function delete_product_photo($row_id)
	{
		$editdata=$this->Crud_Model->getById($row_id,'id','product_image');
			unlink('uploads/product/'.$editdata['image_name']);
			unlink('uploads/product/thumbnails/'.$editdata['image_name']);
		  $delete = $this->Crud_Model->DeletData($row_id,'id','product_image');
	//	$udata['image_name'] = 'default.jpg';	
	//	$this->Crud_Model->Updatedata($row_id,'id','product_image',$udata);
	}
	public function delete_product_filed($row_id)
	{
		$delete = $this->Crud_Model->DeletData($row_id,'id','product_extra');
	}
		function get_dt_product()
	{
		$requestData= $_REQUEST;
        $this->db->select("p.*,c.name as collectionname,pi.image_name");
		$this->db->from('product p');
		$this->db->join('category c','c.id = p.collectiontype','LEFT');
		$this->db->join('product_image pi','pi.product_id=p.id','LEFT');
        if(!empty($requestData['search']['value'])) {
        	$this->db->group_start();
            $this->db->or_like('p.name',$requestData['search']['value']);
            $this->db->or_like('c.name',$requestData['search']['value']);
			 $this->db->or_like('p.productcode',$requestData['search']['value']);
            $this->db->group_end();
        }
        $this->db->group_by('p.id');
        $this->db->order_by('p.id', 'DESC');
        $query = $this->db->get();
        $totalData = $query->num_rows();
        $totalFiltered = $totalData;
        $this->db->select("p.*,c.name as collectionname,pi.image_name");
		$this->db->from('product p');
		$this->db->join('category c','c.id = p.collectiontype','LEFT');
		$this->db->join('product_image pi','pi.product_id=p.id','LEFT');
        if(!empty($requestData['search']['value'])) {
        	$this->db->group_start();
            $this->db->or_like('p.name',$requestData['search']['value']);
            $this->db->or_like('c.name',$requestData['search']['value']);
			 $this->db->or_like('p.productcode',$requestData['search']['value']);
            $this->db->group_end();
        }
		$this->db->group_by('p.id');
        $this->db->order_by('p.id', 'DESC');
        $this->db->limit($requestData['length'], $requestData['start']);
        $query1 = $this->db->get();
        $row=$query1->result_array();
        $k=$requestData['start'] + 1;
        $data = array();
        foreach ($row as $key => $value) 
        { 
            $nestedData = array();
            if($value['image_name']!='')
			{
				$im='uploads/product/'.$value['image_name'];
				if(file_exists($im))
				{
					$img=base_url().'uploads/product/'.$value['image_name'];
				}else{
					$img=base_url().'uploads/book.png';
				}
			}else{
				$img=base_url().'uploads/book.png';
			}
            $nestedData[] = $k;
            $nestedData[] ='<img src='.$img.' alt="Img">';
            $nestedData[] =	$value['collectionname'];	// $ins_arr[$value['title']];
            $nestedData[] = $value['name'];
            $nestedData[] = $value['productcode'];
            if($value['status']==1)
            {
            	$nestedData[] = '<button type="button" class="btn btn-sm btn-toggle active" onClick="change_status(this);" data-table="product" data-field="status" data-id-name="id" data-id="'.$value['id'].'" data-toggle="button" aria-pressed="1" id="sts_btn_'.$value['id'].'" autocomplete="off"><div class="handle"></div></button>';
            }else{
            	$nestedData[]='<button type="button" class="btn btn-sm btn-toggle" onClick="change_status(this);" data-table="product" data-field="status" data-id-name="id" data-id="'.$value['id'].'" data-toggle="button" aria-pressed="0" id="sts_btn_'.$value['id'].'" autocomplete="off"><div class="handle"></div></button>';
            }
            $edit_url = base_url().'administrator/product/editview/'.$value['id'];
            $nestedData[] = '<a href="'.$edit_url.'" class="btn  btn-sm btn-outline-primary mr-2 mb-2">Edit</a>'; 
            $data[] = $nestedData;
            $k++; 
        }
        $json_data = array(
            "draw"            =>intval($requestData['draw']),  
            "recordsTotal"    => intval( $totalData ),  
            "recordsFiltered" => intval( $totalFiltered ), 
            "data"            => $data   
            );
        echo json_encode($json_data);  // send data as json format
	}
}