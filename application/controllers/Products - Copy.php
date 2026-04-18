<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('administrator/Crud_Model');		
    }

	/*public function index()
	{
		$type = $this->uri->segment(2);
		$typevalue = $this->uri->segment(3);

		if(isset($type) && $type!='' && $type=='search')
		{

		}else{
			if(isset($type) && $type!='' && $typevalue=="")
			{
				$CollectionSingleDetails=$this->Crud_Model->getDatafromtablewheresingle('category',array('status'=>1,'slug'=>$type));
				if(!empty($CollectionSingleDetails))
				{
					$SubType = $CollectionSingleDetails['name'];
					$CollectionId = $CollectionSingleDetails['id'];
					$collectionwise=array('collectiontype'=>$CollectionId);
					$product_details=array();
					foreach ($this->Crud_Model->GetProductDetails($collectionwise) as $key => $v) 
					{
						$v['images']=$this->Crud_Model->getDatafromtablewhere('product_image',array('product_id'=>$v['id']),'ASC');
						$ProductExtraDetail=$this->Crud_Model->getDatafromtablewhere('product_extra',array('product_id'=>$v['id']),'ASC');
						$ProductDetailsHtml ='';					
			  			if(!empty($v['images'])){
			  				foreach ($v['images'] as $pikey => $pivalue) {
			  					$ProductDetailsHtml .='<div class="">';
			    					$ProductDetailsHtml .='<img src="'.base_url().'uploads/product/thumbnails/'.$pivalue['image_name'].'" alt="'.$v['productcode'].'">';
			    				$ProductDetailsHtml .='</div>';
			  				}
			  			}else{
			  				$ProductDetailsHtml .='<div class="">';
								$ProductDetailsHtml .='<img src="'.base_url().'uploads/product/thumbnails/noimagethumb.jpg" alt="'.$v['productcode'].'">';
							$ProductDetailsHtml .='</div>';
			  			}
			  			$v['sliderfor'] = $ProductDetailsHtml;
			  			$v['pricelist'] = $this->Crud_Model->getDatafromtablewhere('product_price',array('product_id'=>$v['id']),'ASC');
						
						$product_details[] = $v;
					}
					//echo "<pre>"; print_r($product_details);
				}
			}else{

			}
		}
		//exit;
		$this->data['title'] = "Our Products";
		$this->load->view('product-listing',$this->data);
		//$this->load->view('our_products',$this->data);
	}*/
	public function index()
	{
		$type = $this->uri->segment(2);
		$CollectionSingleDetails=$this->Crud_Model->getDatafromtablewheresingle('category',array('status'=>1,'slug'=>$type));
		$this->load->library('pagination');
		$config = array();
		$config["base_url"] = base_url()."products/".$type;
		$config['total_rows'] = $this->Crud_Model->get_count("product",1,array('collectiontype'=>$CollectionSingleDetails['id']));
		$config['per_page'] = 12;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="page-pagination-numbers">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li><a href='javascript:;'  aria-current='page' class='page-numbers current'>";
		$config['cur_tag_close'] = '</a></li>';
		$config['first_link'] = '<<';
		$config['last_link'] = '>>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$num_pages = $config["total_rows"] / $config["per_page"];
		$config['num_links'] = 3;
		$this->pagination->initialize($config);
		$start = ($this->uri->segment(2)) ? $this->uri->segment(3) : 0;
		if($start)
		{
			$start = ($start - 1) * $config['per_page'];
		}
        $this->data["links"] = $this->pagination->create_links();
        $products= $this->Crud_Model->get_limit_data_where($config["per_page"], $start,"product",array('collectiontype'=>$CollectionSingleDetails['id'],'status'=>1));

        $product_details=array();
        foreach ($products as $k => $v)
        {
        	$category=$this->Crud_Model->getDatafromtablewhere('category',array('id'=>$v['collectiontype']),'ASC');
        	$v['category']= $category[0]['name'];
        	$v['images']=$this->Crud_Model->getDatafromtablewhere('product_image',array('product_id'=>$v['id']),'ASC');
			$ProductExtraDetail=$this->Crud_Model->getDatafromtablewhere('product_extra',array('product_id'=>$v['id']),'ASC');
			$ProductDetailsHtml ='';					
  			if(!empty($v['images'])){
  				foreach ($v['images'] as $pikey => $pivalue) {
  					$ProductDetailsHtml .='<div class="">';
    					$ProductDetailsHtml .='<img src="'.base_url().'uploads/product/thumbnails/'.$pivalue['image_name'].'" alt="'.$v['productcode'].'">';
    				$ProductDetailsHtml .='</div>';
  				}
  			}else{
  				$ProductDetailsHtml .='<div class="">';
					$ProductDetailsHtml .='<img src="'.base_url().'uploads/product/thumbnails/noimagethumb.jpg" alt="'.$v['productcode'].'">';
				$ProductDetailsHtml .='</div>';
  			}
  			//$v['sliderfor'] = $ProductDetailsHtml;
  			$v['pricelist'] = $this->Crud_Model->getDatafromtablewhere('product_price',array('product_id'=>$v['id']),'ASC');
			
			$product_details[] = $v;
        }
        $this->data['products'] =$product_details;

		$this->data['active_menu'] = "home";
		$this->data['page_title'] = "Products";
		//echo "<pre>"; print_r($this->data["links"]); print_r($this->data['products']); exit;
		$this->data['title'] = "Our Products";
		$this->load->view('product-listing',$this->data);
	}
	public function listing()
	{
		$this->data['title'] = "Product Listing";
		$this->load->view('product-listing',$this->data);
	}
	public function detail()
	{
		$this->data['title'] = "Product Detail";
		$this->load->view('product-detail',$this->data);
	}
	public function cart()
	{
		$this->data['title'] = "My Cart";
		$this->load->view('cart',$this->data);
	}
}
