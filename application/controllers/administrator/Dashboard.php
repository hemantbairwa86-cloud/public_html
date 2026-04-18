<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller  {
	function __construct()
	{
		parent::__construct();
		$this->load->model('administrator/Crud_Model');
		$this->is_admin_logged_in();
	}
	public function index($oid="")
	{ 					
		$data = array();		
		$category=$this->Crud_Model->getDatafromtablewhere('category',array('status'=>1));
		$main_category = array();
		foreach ($category as $k => $v)
		{
			$arr['id'] = $v['id'];
			$arr['category'] = $v['name'];			
			$sc = array();
			$sv['product'] = $this->Crud_Model->getCount('product',array('collectiontype'=>$v['id'],'status'=>1));
			$this->db->select('p.id'); 
			$this->db->from('product p');
			$this->db->where('p.collectiontype',$v['id']);
			$this->db->group_start();
			$this->db->where('p.highlight','NEW ARRIVAL');
			$this->db->or_where('p.highlight','NEW ARRIVAL,BEST SELLING');
			$this->db->group_end();
			$this->db->where('p.status',1);
			$this->db->order_by('p.id','desc');				
			$query = $this->db->get();
			//echo $this->db->last_query(); exit;
			$new = $query->result_array();
			$sv['new_arrival'] =  count($new);
			$this->db->select('p.id'); 
			$this->db->from('product p');
			$this->db->where('p.collectiontype',$v['id']);
			$this->db->group_start();
			$this->db->where('p.highlight','BEST SELLING');
			$this->db->or_where('p.highlight','NEW ARRIVAL,BEST SELLING');
			$this->db->group_end();
			$this->db->where('p.status',1);
			$this->db->order_by('p.id','desc');				
			$query = $this->db->get();
			$best = $query->result_array();
			$sv['best_selling'] =  count($best);
			$sc[] = $sv;
			$arr['products'] = $sc;

			$this->db->select('COUNT(OrderID) as orders');
			$this->db->from('orders');
			$this->db->join('order_products', 'order_products.order_id = orders.OrderID', 'left');
			$this->db->where('orders.OrderDate',date("Y-m-d"));
			$this->db->where('order_products.categoryid',$v['id']);
			$query_ord = $this->db->get()->row_array(); 
			$arr['orders'] = $query_ord['orders'];
			$main_category[] = $arr;
		}
		$data['main_category'] = $main_category;
		$data['total_pending_product_rating'] = $this->Crud_Model->getCount('product_reviews',array('status'=>0));			
		$orderfe=array('oreder_date'=>date('Y-m-d'));
		$OrderData=$this->Crud_Model->GetOrderDetails_new($orderfe);
		$data['OrderData'] = $OrderData;	
		
		
		
		
		$this->load->view('administrator/dashboard',$data);
	}
}
?>