<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends MY_Controller {
  function __construct()
  {
    parent::__construct();
    $this->load->model('administrator/Crud_Model');
  } 
  public function subscribe()
  {
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
    {  
      echo '<label class="text-danger"  style="padding-left:20px"><font color="#FFFF00">Error :  Invalid Email Id.</font></span></label>';
    }  
    else  
    {  
      if($this->Crud_Model->is_email_available($_POST["email"]))  
      {  
           echo '<label class="text-danger" style="padding-left:20px"><font color="#FFFF00">Error : This Email already registered.</font></label>';  
      }  
      else  
      {  
           echo '<label class="text-success" style="padding-left:20px"><font color="#FFF">Email subscribed successfully.</font></label>';  
      } 
    }
  }
  public function set_search_data()
  {
      $txt_search = trim($this->input->post('txt_search'));
      $_SESSION['txt_search'] = $txt_search;
      echo json_encode(array('error'=>0)); exit;
  }
  public function rating()
	{
		if(count($this->input->post()) > 0 )
		{
			$this->form_validation->set_rules('product_id', 'Product Id','required|trim');
			$this->form_validation->set_rules('rating', 'Rating','required|trim|numeric');
			$this->form_validation->set_rules('full_name', 'Full Name','required|trim');			
			$this->form_validation->set_rules('city', 'City','required|trim');
			$this->form_validation->set_rules('contact', 'Contact No','required|trim');
			$this->form_validation->set_rules('review', 'Product Review','required|trim');												
			if ($this->form_validation->run() == FALSE) 
			{
				echo json_encode(array('error'=>1,'msg'=>'Error : There was a problem to add Review.')); exit;
			}
			else
			{				
				$checkdata =$this->Crud_Model->getDatafromtable('product_reviews');
				//echo "<pre>"; print_r($checkdata); 
				foreach($checkdata as $k => $v){
					if(($v['product_id'] == $this->input->post('product_id')) && ($v['contact'] == $this->input->post('contact'))){
						echo json_encode(array('error'=>2,'msg'=>'Already Submited Revied')); exit;
					}
				}
				$data['product_id'] = trim($this->input->post('product_id'));
				$data['rating'] = trim($this->input->post('rating'));
				$data['full_name'] = trim($this->input->post('full_name'));
				$data['city'] = trim($this->input->post('city'));
				$data['contact'] = trim($this->input->post('contact'));
				$data['review'] = trim($this->input->post('review'));
				$table='product_reviews';
				$ins_id = $this->Crud_Model->InsertData($table,$data);
				if($ins_id)
				{
					echo json_encode(array('error'=>0,'msg'=>'Product Review added Successfully')); exit;
				}else
				{
					echo json_encode(array('error'=>1,'msg'=>'Error : There was a problem to add Review.')); exit;
				}
			}
		}
		else
		{
			echo json_encode(array('error'=>1,'msg'=>'Error : There was a problem to add Review.')); exit;
		}
	}
	public function get_states()
	{
		  $cid = trim($this->input->post('cid'));
		  $stsid = trim($this->input->post('sts'));
		  $sts_list = '<option value="">Select</option>';
		  if($cid)
		  {
				$sts=$this->Crud_Model->getDatafromtablewhere('own_states',array('country_id'=>$cid));
				foreach ($sts as $key => $v)
				{
					if($v['id'] == 12 || $v['id'] == 22)		// Gujarat & Maharashtra Fix
					{
						$sel="";
						if($stsid==$v['id'])
						{
							$sel="selected";
						}
						$sts_list .= '<option '.$sel.' value="'.$v['id'].'">'.$v['name'].'</option>';
					}	
				}
		  }
		  echo json_encode(array('error'=>0,'sts_list'=>$sts_list)); exit;
	 }
   	public function set_seclected_address()
  	{
      $cid = trim($this->input->post('cid'));
      if($cid)
      {
      		$user=$this->db->select("*")->from('users')->where('id',$this->session->userdata('user_front_session')['id'])->get()->row_array();
					$user['cur_sel_address'] = $cid;
		   		$this->session->set_userdata('user_front_session',$user);
		   		$address=$this->db->select("users_address.*,own_states.name as state_name")->from('users_address')->join('own_states', 'users_address.state = own_states.id','left')->where('users_address.id',$cid)->get()->row_array();
      }
      echo json_encode(array('error'=>0,'address'=>$address)); exit;
  	}
  public function get_rating()
	{
		$per_page = 4;
		$page_count = trim($this->input->post('page_count'));
		$product_id = trim($this->input->post('product_id'));
		$plus_minus = trim($this->input->post('plus_minus'));
		if($plus_minus=="plus")
		{
			$start =$page_count*$per_page;
		}else{
			$page_count--;
			$start =$page_count*$per_page;
		}
		$r=$this->db->select('*')->from('product_reviews')->where('product_id',$product_id)->where('status',1)->order_by('updated_at','desc')->limit($per_page,$start)->get()->result_array();
		$tot_qry=$this->db->select('id')->from('product_reviews')->where('product_id',$product_id)->where('status',1)->count_all_results();
		$tot_record = round($tot_qry/$per_page);
		$htm="";
		$count =0;
		if(!empty($r))
		{
			$count=1;
		}
		foreach ($r as $key => $v)
		{ 
		  $htm.='<div class="pro_review">
			<div class="review_thumb"> <img alt="review images" src="'.base_url().'assest/frontend/images/others/reviewer.jpg"> </div>
			<div class="review_details">
			  <div class="review_info mb-10">
				<div class="single-product-item-rating">'; 
				  for ($i=1; $i <= $v['rating']; $i++) 
				  { 
					$htm.='<i class="icon-rt-star-solid select-star"></i>';
				  }
				  for ($j=5; $j>$v['rating']; $j--) 
				  { 
				   $htm.='<i class="icon-rt-star-solid"></i>';
				  } 
				$htm.='</div>
				<h5><span class="user-name">'.$v["full_name"].'</span> - <span class="comment-date">'.date("M , d-Y",strtotime($v['created_at'])).'</span></h5>
			  </div>
			  <p class="reviewer-text">'.$v["review"].'</p>
			</div>
		  </div>';
		}
		echo json_encode(array('error'=>0,'review'=>$htm,'count'=>$page_count,'records'=>$count,'tot_record'=>$tot_record-1)); exit;
	}
	public function get_price_by_variation()
	{
			$ctr = trim($this->input->post('ctr'));
			$tot_qry=$this->db->select('*')->from('product_price')->where('id',$ctr)->get()->row_array();
			echo json_encode(array('error'=>0,'price'=>$tot_qry)); exit;
	}
	 public function get_shippin_by_state()
	 {
		  $cid = trim($this->input->post('cid'));
		  $shipping_charge=0;
		  $shipping_charge = get_shipping_by_state($cid);
		  $cart = $this->cart->contents();
		  $total=0.00;  $total_pro = 0;
      foreach ($cart as $key => $v)
      {
        $total+=$v['subtotal'];
      }    
      $shipping_limit = $this->db->query("SELECT u.shipping_limit FROM free_shipping u WHERE u.id = 1")->row_array();
      if($total>=$shipping_limit['shipping_limit'])
      {
        $shipping_charge=0;
      }
      $discount= $this->db->query("SELECT u.discount FROM festival_discount u WHERE u.id = 1")->row_array();
      if($discount['discount'])
      {
          $dis = $total*$discount['discount']/100;
      }
      $data['shipping_charge'] = number_format($shipping_charge,2);
      $data['sub_total'] = number_format($total+$shipping_charge,2);
      $data['discount'] = number_format($dis,2);
      $data['total_amount'] = number_format($total+$shipping_charge-$dis,2);
      $data['error']=0;
		  echo json_encode($data); exit;
	 }
	 
	 
	public function check_duplicate_email()
	{
		$email = $this->input->post('email');
		$this->db->select("id");
		$this->db->from('users');
		$this->db->where('email',$email);
		$query=$this->db->get();
		$query->row_array();
		if($query->num_rows() > 0)
		{
			echo json_encode(array('error'=>1,'msg'=>'Email already exists. Enter New Email Id.')); exit;
		}else{
			echo json_encode(array('error'=>0,'msg'=>'')); exit;

		}
	}

	function SetFavoriteProducts()
  {
      $returnarray = array();        
      $productid   = $this->input->post('productid'); 
      if(is_login_user_front())
      {
      		$check = $this->db->select('id')->from('customer_favorite_products')->where('customer_id',$this->session->userdata('user_front_session')['id'])->where('products_id',$productid)->get()->row_array();
      		if(empty($check))
      		{
	      		$orderinfo =array();
						$orderinfo['customer_id']=$this->session->userdata('user_front_session')['id'];
						$orderinfo['products_id']=$productid;
						$orderinfo['status']='1';
						$orderinfo['isdelete']='0';
						$orderinfo['created_datetime']=date('Y-m-d H:i:s');
						$orderinfo['modified_datetime']='0000-00-00 00:00:00';
						$favoriteproductsid=$this->Crud_Model->InsertData('customer_favorite_products',$orderinfo);
						$returnarray['msg'] = 'success';
			      $returnarray['message'] = '';
			    }else{
			    	$returnarray['msg'] = 'info';
			      $returnarray['message'] = '';
			    }
			}else
			{
				$returnarray['msg'] = 'error';
      	$returnarray['message'] = 'Please Login';        	
      }

      $tcount = $this->db->select('COUNT(id) as total')->from('customer_favorite_products')->where('customer_id',$this->session->userdata('user_front_session')['id'])->get()->row_array();
      $returnarray['total_pro'] = $tcount['total'];

      echo json_encode($returnarray);exit;        
  }
  function RemoveFavoriteProducts()
	{
		$returnarray = array();        
		$favoriteid   = $this->input->post('favoriteid');
		if($favoriteid !='')
		{
			$this->Crud_Model->DeletData($favoriteid,'id','customer_favorite_products');
			$returnarray['msg'] = 'success';
        	$returnarray['message'] = '';
		}else{
			$returnarray['msg'] = 'error';
        	$returnarray['message'] = 'Please Login';
		}
		$returnarray['total_pro'] = $tcount['total'];
		echo json_encode($returnarray);exit;        
	}
	 
}