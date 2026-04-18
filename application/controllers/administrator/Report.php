<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report extends MY_Controller  {
	function __construct()
	{
		parent::__construct();
		$this->load->model('administrator/Crud_Model');
		$this->is_admin_logged_in();
	}
	public function index()
	{
		$data = array();
		$data['par_menu'] = "report";
		$data['sub_menu'] = "";
		$data['page_title']='Sales Report';
		$data['product_category']=$this->Crud_Model->getDatafromtable('category','ASC');
		$data['users']=$this->Crud_Model->getDatafromtablewhereorderby('users',array('status'=>1),'ASC','name');
		$this->load->view('administrator/report',$data);
	}

	public function orders()
	{
		$data = array();
		$data['par_menu'] = "report";
		$data['sub_menu'] = "";
		$data['page_title']='Sales Report';
		$from_date = date("Y-m-d",strtotime(str_replace("/","-",$this->input->post('from_date'))));
		$to_date = date("Y-m-d",strtotime(str_replace("/","-",$this->input->post('to_date'))));
		$user_id = $this->input->post('user_id');
		$this->db->select('b.*');
        $this->db->from('orders b');
        if($user_id!="all")
        {
            $this->db->where('b.CustomerID',$user_id);
        }
        $this->db->where('b.OrderDate BETWEEN "'.$from_date. '" and "'.$to_date.'"');
        $this->db->order_by('b.OrderDate', 'DESC');
        $data['orders'] = $this->db->get()->result_array();
        $data['from_date'] = $from_date;
        $data['to_date'] = $to_date;  		
		$this->load->view('administrator/report-sales-detail',$data); 
	}


	
	public function getProducts()
	{ 
		$cat_id= $this->input->post('cat_id');
	    $html ='';
	    $this->db->select('*');
    	$this->db->where("collectiontype",$cat_id);
		$this->db->where("status",1);
    	$res_data = $this->db->from('product')->get()->result_array();
	    $html .='<option value="All">- All Products -</option>';
	    foreach ($res_data as $key => $res) 
	    {
			 $html .='<option value='.$res['id'].'>'.$res['name'].'</option>'; 
	    }
	    echo json_encode(array('html'=>$html));
	    exit;
	}
	
	public function product()
	{	
		//	echo "<pre>"; print_r($_POST)	;
		$data = array();
		$data['par_menu'] = "report";
		$data['sub_menu'] = "";
		$data['page_title']='Product Report';
		
		$from_date = date("Y-m-d",strtotime(str_replace("/","-",$this->input->post('from_date'))));
		$to_date = date("Y-m-d",strtotime(str_replace("/","-",$this->input->post('to_date'))));
		$category = $this->input->post('category');
		$product_id = $this->input->post('product_id');
		
		if($category=='All' && $product_id=='All')
		{
				$this->db->select('ord.*');
				$this->db->from('orders ord');
				$this->db->join('order_products op','ord.OrderID=op.order_id','LEFT');				
				$this->db->where('ord.OrderDate BETWEEN "'. $from_date. '" and "'. $to_date.'"');
				$this->db->order_by('ord.OrderID','ASC');        
				$this->db->group_by('op.order_id');        				
				$data['orders'] =  $this->db->get()->result_array();
			//	echo $this->db->last_query(); 
			//	echo "<pre>"; print_r($data['orders'])	; exit;
			
		}
		else
		{
		
				$this->db->select('op.*,ord.OrderID,ord.order_no_disp,ord.OrderDate,ord.ShippingName,ord.ShippingCity,ord.TotalValue,ord.OrderStatus');
				$this->db->from('order_products op');
				$this->db->join('orders ord','ord.OrderID=op.order_id','LEFT');
				$this->db->join('product p','op.products_id=p.id','LEFT');
				$this->db->join('category c','c.id=p.collectiontype','LEFT');
				$this->db->where('ord.OrderDate BETWEEN "'. $from_date. '" and "'. $to_date.'"');
				if(isset($category) and $category!='All'){
					$this->db->where('c.id',$category);    
				}
				if(isset($product_id) and $product_id!='All'){					
					$this->db->where('op.products_id',$product_id);
				}	
				$this->db->order_by('op.order_products_id','ASC');        
				if($category=='All')
				{
					$this->db->group_by('op.order_products_id');        
				}	
				//echo $this->db->last_query(); 
				$data['orders'] =  $this->db->get()->result_array();
			//	echo "<pre>"; print_r($data['orders'])	; exit;
			
		}	
			
			
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;  		
		
		if($category=='All')
		{
			
			$data['print_category'] =  'All';		
			$data['print_product'] =  'All';			
		}
		else
		{
			if($product_id=='All')
			{
				$product = $this->db->select('p.name,s.name as category')->where("p.isdelete",0)->where('p.collectiontype',$category)->from('product p')->join('category s', 'p.collectiontype = s.id','left')->get()->result_array();				
				$data['print_category'] =  $product[0]['category'];
				$data['print_product'] =  'All';	
			}
			else
			{
				
				$product = $this->db->select('p.name,s.name as category')->where("p.isdelete",0)->where('p.id',$product_id)->where('p.collectiontype',$category)->from('product p')->join('category s', 'p.collectiontype = s.id','left')->get()->result_array();
				//echo "<pre>"; print_r($product); exit;
				$data['print_category'] =  $product[0]['category'];
				$data['print_product'] =   $product[0]['name'];	
			}			
		}	

		
		$this->load->view('administrator/report-product-detail',$data); 
		
	}	
	
	
}
?>