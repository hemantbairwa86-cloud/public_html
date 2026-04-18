<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    public function __construct()
    {
        parent::__construct();	
        $this->load->model('administrator/Crud_Model');
    }

	public function index()
	{	
		$this->data['SliderDetails']=$this->Crud_Model->getDatafromtablewhere('slider',array('status'=>1),'DESC');
		$this->data['title'] = "Home";
		$this->data['act_page'] = "home";
		$this->data['act_sub_page'] = "";


		$this->db->select('b.*,c.name as category_name,c.slug as cate_slug');
        $this->db->from('product b');
        $this->db->group_start();
		$this->db->where('b.highlight','NEW ARRIVAL');
		$this->db->or_where('b.highlight','NEW ARRIVAL,BEST SELLING');
		$this->db->group_end();
		$this->db->where('b.status',1);
        $this->db->join('category c','b.collectiontype = c.id','left');
        $this->db->order_by('id', 'RANDOM');        
        $this->db->limit(10);
        $prod_new_arrival = $this->db->get()->result_array();  
     	$product_new=array();
        foreach ($prod_new_arrival as $k => $v)
        {
        	$v['category']= $v['category_name'];
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
			$product_new[] = $v;
        }
        $this->data['products_new'] =$product_new;


        $this->db->select('b.*,c.name as category_name,c.slug as cate_slug');
        $this->db->from('product b');
        $this->db->group_start();
		$this->db->where('b.highlight','BEST SELLING');
		$this->db->or_where('b.highlight','NEW ARRIVAL,BEST SELLING');
		$this->db->group_end();
		$this->db->where('b.status',1);
        $this->db->join('category c','b.collectiontype = c.id','left');    
        $this->db->order_by('id', 'RANDOM');    
        $this->db->limit(20);
        $prod_best_sell = $this->db->get()->result_array();  
     	$product_best=array();
        foreach ($prod_best_sell as $k => $v)
        {
        	$v['category']= $v['category_name'];
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
			$product_best[] = $v;
        }
        $this->data['products_best'] =$product_best;

        //echo "<pre>"; print_r($this->data['products_new']); exit;


		$this->load->view('home',$this->data);
	}
}
