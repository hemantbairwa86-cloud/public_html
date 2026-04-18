<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('administrator/Crud_Model');		
    }

	public function index()
	{
		$type = $this->uri->segment(2);
		if($type!="search")
		{
			$CollectionSingleDetails=$this->Crud_Model->getDatafromtablewheresingle('category',array('status'=>1,'slug'=>$type));
			$cate_id = $CollectionSingleDetails['id'];
			$_SESSION['txt_search']="";
		}else{
			$cate_id = "";
		}
		$this->load->library('pagination');
		$config = array();
		$config["base_url"] = base_url()."products/".$type;
		if($cate_id!="")
		{
			$config['total_rows'] = $this->Crud_Model->get_count_product("product",1,array('b.collectiontype'=>$cate_id));
		}else{
			$config['total_rows'] = $this->Crud_Model->get_count_product("product",1);
		}
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
        if($cate_id!="")
		{
        	$products= $this->Crud_Model->get_limit_data_product_where($config["per_page"], $start,"product",array('b.collectiontype'=>$CollectionSingleDetails['id'],'b.status'=>1));
        }else{
        	$products= $this->Crud_Model->get_limit_data_product_where($config["per_page"], $start,"product",array('b.status'=>1));
        }

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
  			$v['price_list'] = $this->Crud_Model->getDatafromtablewhere('product_price',array('product_id'=>$v['id']),'ASC');
			
			$product_details[] = $v;
        }
        $this->data['products'] =$product_details;

		
		$this->data['page_title'] = "Products";
		$this->data['title'] = "Products";
		$this->data['act_page'] = "our-products";
		$this->data['act_sub_page'] = "";
		//echo "<pre>"; print_r($this->data["links"]); print_r($this->data['products']); exit;
		$this->data['min_max'] = $this->db->select("MIN(new_price) as min_price,MAX(new_price) as max_price")->from('product_price')->where('status',1)->get()->row_array();

		$this->data['title'] = "Our Products";
		$this->data['act_page'] = "products";
		$this->data['act_sub_page'] = "";
		$this->load->view('product-listing',$this->data);
	}
	public function product($cate="",$slug="")
	{
		$this->db->select('p.*,c.id as cate_id,c.slug as cateslug,c.name as categoryname');
        $this->db->from('product p');
        $this->db->join('category c','c.id=p.collectiontype','LEFT');
        $this->db->where('p.slug',$slug);       
        $this->db->where('p.isdelete','0');       
        $query=$this->db->get();
        $pro = $query->row_array();
		if(empty($pro) || $slug=="")
		{
			redirect('products','refresh'); exit;
		}
		$this->data['images']=$this->Crud_Model->getDatafromtablewhere('product_image',array('product_id'=>$pro['id']),'ASC');
		$this->data['extra']=$this->Crud_Model->getDatafromtablewhere('product_extra',array('product_id'=>$pro['id']),'ASC');
		

		$this->db->select('p.*,c.weight_name');
        $this->db->from('product_price p');
        $this->db->join('weight_master c','c.id=p.weight','LEFT');
        $this->db->where('p.status','1');
        $this->db->where('p.product_id',$pro['id']);      
        $this->db->order_by("p.id", "ASC"); 
        $query=$this->db->get();
        $this->data['pricelist'] = $query->result_array();
		//$this->data['pricelist'] = $this->Crud_Model->getDatafromtablewhere('product_price',array('product_id'=>$pro['id']),'ASC');
		$this->data['product'] = $pro;


		$this->data['review']=$this->db->select('*')->from('product_reviews')->where('product_id',$pro['id'])->where('status',1)->order_by('updated_at','desc')->limit(4)->get()->result_array();
		$this->data['total_review']=$this->db->select('id')->from('product_reviews')->where('product_id',$pro['id'])->where('status',1)->order_by('updated_at','desc')->get()->result_array();


		$this->data['page_title'] = "Products";
		$this->data['title'] = "Product Detail";
		$this->data['act_page'] = "our-products";
		$this->data['act_sub_page'] = "";
		$this->load->view('product-detail',$this->data);
	}
	/////////

	public function cart()
	{
		$this->data['title'] = "My Cart";
		$this->data['act_page'] = "our-products";
		$this->data['act_sub_page'] = "";
		$this->load->view('cart',$this->data);
	}
	
	
}
