<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('administrator/Crud_Model');		
    }    
	public function index()
	{
		$this->data['act_page'] = "our-products";
		$this->data['act_sub_page'] = "";
		$this->data['title'] = "My Cart";
		$this->load->view('cart',$this->data);
	}
	public function add_to_cart()
	{
		$qty = $this->input->post('qty');
		$pid = $this->input->post('pid');
		$variation = $this->input->post('variation');

		if($qty>0 && $pid)
		{
			$images=$this->Crud_Model->getDatafromtablewhere('product_image',array('product_id'=>$pid),'ASC');
			if($variation)
			{
				$pricelist = $this->Crud_Model->getDatafromtablewhere('product_price',array('product_id'=>$pid,'id'=>$variation),'ASC');
			}else{
				$pricelist = $this->Crud_Model->getDatafromtablewhere('product_price',array('product_id'=>$pid),'ASC');
			}
			$product = $this->db->select('name,slug')->from('product')->where('id',$pid)->get()->row_array();
			$data = array(
	            'id'    => $pid,
	            'qty'    => $qty,
	            'price'    => $pricelist[0]['new_price'],
	            'variation'    => $pricelist[0]['id'],
	            'name'    => $product['name'],
	            'image' => base_url()."uploads/product/thumbnails/".$images[0]['image_name']
	        );
        	$this->cart->insert($data);
			$response['error']=0;
		}else{
			$response['error']=1;
		}
		echo json_encode($response); exit;
	}
	public function update_to_cart()
	{
		$qty = $this->input->post('qty');
		$rowid = $this->input->post('rowid');
		$finaltotal = 0.0;
		if($qty>0)
		{
			$update = 0;        	        
	        if(!empty($rowid) && !empty($qty)){
	            $data = array(
	                'rowid' => $rowid,
	                'qty'   => $qty
	            );
	            $update = $this->cart->update($data);
	            $cart = $this->cart->contents();

	            $pro = $cart[$rowid];
	            $pro['subtotal']=number_format($pro['subtotal'],2);
	            $response['product'] = $pro;
	            foreach ($cart as $key => $v)
	            {
	            	$finaltotal+=$v['subtotal'];
	            }
	            $response['finaltotal']=number_format($finaltotal,2);
	        }
			$response['error']=0;
		}else{
			$response['error']=1;
		}
		echo json_encode($response); exit;
	}
	public function get_cart_content()
	{
		$cart = $this->cart->contents();
		if(empty($cart))
		{
			$response['qty_count'] = 0;
			$response['sub_total'] = 0;
			$response['error'] = 0;
			$response['cart_json'] = "";
			$response['cart_html'] = "Cart Is Empty";
			$response['msg']="Cart is Empty";
		}else{
			$htm=""; $qty_count = 0;
			foreach ($cart as $key => $v)
			{
				$row_id = "'".$v['rowid']."'";
				$htm.='<li class="minicart-product"> <a class="product-item_img"> <img style="height:75px;width:auto;" class="img-fluid" src="'.$v['image'].'" alt="'.$v['name'].'"></a>
			          <div class="product-item_content"> <a class="product-item_title" href="javascript:void(0);">'.$v['name'].'</a>
			            <label class="product-item_quantity"><span>'.$v['qty'].'</span> x<span> ₹ '.$v['price'].'</span></label>
			          </div>
			          <a class="product-item_remove" href="javascript:;" onClick="remove_from_cart('.$row_id.');"><i class="icon-rt-close-outline"></i></a> 
			        </li>';
			    $total+=$v['subtotal'];
			    $qty_count++;
			}
			$response['qty_count'] = $qty_count;
			$response['error'] = 0;
			$response['sub_total'] = number_format($total,2);
			$response['cart_json'] = $cart;
			$response['cart_html'] = $htm;
			$response['msg']='Cart Details';
		}
		echo json_encode($response); exit;
	}
	public function remove_from_cart()
	{
		$rowid = $this->input->post('rid');
		$remove = $this->cart->remove($rowid);
		$response['error']=0;
		echo json_encode($response); exit;
	}
}
