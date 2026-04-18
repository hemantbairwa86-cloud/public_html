<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends MY_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('administrator/Crud_Model');		
    }    
	public function index()
	{
		if(!is_login_user_front())
		{	
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('address','address', 'trim|required');
			$this->form_validation->set_rules('landmark','landmark', 'trim|required');
			$this->form_validation->set_rules('state','state', 'trim|required|numeric');
			$this->form_validation->set_rules('city','city', 'trim|required');
			$this->form_validation->set_rules('pincode','pincode', 'trim|required');
			$this->form_validation->set_rules('mobile','mobile', 'trim|required');
			$this->form_validation->set_rules('email','email', 'trim|required');
			$this->form_validation->set_rules('password','password', 'trim|required');
			$this->form_validation->set_rules('confirm_password','confirm_password', 'trim|required|matches[password]');
			if ($this->form_validation->run() == FALSE) 
			{
				$this->data['cart'] = $this->cart->contents();
				$this->data['title'] = "Checkout";
				$this->data['country_id'] = 101;
				$this->data['country_list']=$this->Crud_Model->getDatafromtablewhere('own_countries',array('id'=>101));
				$this->data['first_name'] = trim($this->input->post('first_name'));
				$this->data['last_name'] = trim($this->input->post('last_name'));
				$this->data['address'] = trim($this->input->post('address'));
				$this->data['landmark'] = trim($this->input->post('landmark'));
				$this->data['country'] = trim($this->input->post('country'));
				$this->data['state'] = trim($this->input->post('state'));
				$this->data['city'] = trim($this->input->post('city'));
				$this->data['pincode'] = trim($this->input->post('pincode'));
				$this->data['mobile'] = trim($this->input->post('mobile'));
				$this->data['email'] = trim($this->input->post('email'));
				$this->data['password'] = trim($this->input->post('password'));
				$this->data['confirm_password'] = trim($this->input->post('confirm_password'));
				$this->load->view('checkout',$this->data);
			}
			else
			{		
				$ins_data['name'] = trim($this->input->post('first_name'));
				$ins_data['surname'] = trim($this->input->post('last_name'));
				$ins_data['address_1'] = trim($this->input->post('address'));
				$ins_data['country'] = 101;//trim($this->input->post('country'));
				$ins_data['state'] = trim($this->input->post('state'));
				$ins_data['city'] = trim($this->input->post('city'));
				$ins_data['pincode'] = trim($this->input->post('pincode'));
				$ins_data['mo_number'] = trim($this->input->post('mobile'));
				$ins_data['email'] = trim($this->input->post('email'));
				$ins_data['password'] = md5(trim($this->input->post('password')));
				$ins_data['ori_password'] = trim($this->input->post('password'));
				$ins_data['create_at'] = date("Y-m-d H:i:s");
				$this->db->insert('users',$ins_data);
				$ins_id = $this->db->insert_id();
				$user_id = $ins_id;

				if($ins_id)
				{
					$ins_add['landmark'] = trim($this->input->post('landmark'));
					$ins_add['address'] = trim($this->input->post('address'));
					$ins_add['country'] = 101;//trim($this->input->post('country'));
					$ins_add['state'] = trim($this->input->post('state'));
					$ins_add['city'] = trim($this->input->post('city'));
					$ins_add['pincode'] = trim($this->input->post('pincode'));
					$ins_add['mo_number'] = trim($this->input->post('mobile'));
					$ins_add['email'] = trim($this->input->post('email'));
					$ins_add['create_at'] = date("Y-m-d H:i:s");
					$ins_add['user_id'] = $ins_id;
					$ins_add['is_default'] = 1;
					$this->db->insert('users_address',$ins_add);
					$ins_add_id = $this->db->insert_id();
					$user=$this->db->select("*")->from('users')->where('id',$ins_id)->get()->row_array();
					$user['cur_sel_address'] = $ins_add_id;
	       	$this->session->set_userdata('user_front_session',$user);
					$cart = $this->cart->contents();
					if(empty($cart) || $order_ins){
						redirect('our-products'); exit;
					}else
					{
						if($this->input->post('diffrent_ship'))
						{
							$ins_add['landmark'] = trim($this->input->post('landmark_extra'));
							$ins_add['address'] = trim($this->input->post('address_extra'));
							$ins_add['country'] = 101;//trim($this->input->post('country'));
							$ins_add['state'] = trim($this->input->post('state_extra'));
							$ins_add['city'] = trim($this->input->post('city_extra'));
							$ins_add['pincode'] = trim($this->input->post('pincode_extra'));
							$ins_add['mo_number'] = trim($this->input->post('mobile_extra'));
							$ins_add['email'] = trim($this->input->post('email_extra'));
							$ins_add['create_at'] = date("Y-m-d H:i:s");
							$ins_add['user_id'] = $this->session->userdata('user_front_session')['id'];
							$this->db->insert('users_address',$ins_add);
							$ins_add_id = $this->db->insert_id();
							$user=$this->db->select("*")->from('users')->where('id',$this->session->userdata('user_front_session')['id'])->get()->row_array();
							$user['cur_sel_address'] = $ins_add_id;
			       			$this->session->set_userdata('user_front_session',$user);
			       			$user_id= $this->session->userdata('user_front_session')['id'];	
						}
						$discount_master = $this->db->query("SELECT u.discount FROM festival_discount u WHERE u.id = 1")->row_array();
						$shipping_limit = $this->db->query("SELECT u.shipping_limit FROM free_shipping u WHERE u.id = 1")->row_array();
						$user_data = $this->db->select("*")->from('users')->where("id",$user_id)->get()->row_array();
						$ship_address = $this->db->select("*")->from('users_address')->where("id",$this->session->userdata('user_front_session')['cur_sel_address'])->get()->row_array();

						$total=0.00;  $total_pro = 0;
			            foreach ($cart as $key => $v)
			            {
			              $total+=$v['subtotal'];
			              $total_pro++;
			            }

			            $shipping_charge=get_shipping_by_state(); 
			            if($total>=$shipping_limit['shipping_limit'])
			            {
			              $shipping_charge=0;
			            }
			            $discount = 0.00; 
			            if($discount_master['discount'])
			            {
			                $discount = $total*$discount_master['discount']/100;
			            }
						$series = get_order_series();
						$order['CustomerID']=$user_id;
						$order['OrderNo']=$series['order_no'];
						$order['order_no_disp']=$series['order_no_disp'];
						$order['OrderDate']=date("Y-m-d");
						$order['OrderTime']=date("H:i:s");
						$order['OrderStatus']="Received";
						$order['TotalProducts']=$total_pro;
						$order['SubValue']=$total;
						$order['ShippingCharges']=$shipping_charge;
						$order['Tax']=0;
						$order['Discount']=$discount;
						$order['TotalValue']=$total+$shipping_charge-$discount;
						$order['BillingName'] = $user_data['name']." ".$user_data['surname'];
						$order['BillingEmail'] = $user_data['email'];
						$order['BillingPhone'] = $user_data['mo_number'];
						$order['BillingAddress'] = $user_data['address_1'];
						$order['BillingCity'] = $user_data['city'];
						$order['BillingState'] = $user_data['state'];
						$order['BillingZipCode'] = $user_data['pincode'];
						$order['address_id'] = $this->session->userdata('user_front_session')['cur_sel_address'];
						$order['ShippingName'] = $user_data['name']." ".$user_data['surname'];
						$order['ShippingEmail'] = $ship_address['email'];
						$order['ShippingAddress'] = $ship_address['address'];
						$order['ShippingCity'] = $ship_address['city'];
						$order['ShippingState'] = $ship_address['state'];
						$order['ShippingCountry'] = $ship_address['country'];
						$order['ShippingZipCode'] = $ship_address['pincode'];
						$order['ShippingMobileNo'] = $ship_address['mo_number'];
						$order['created_datetime'] = date("Y-m-d H:i:s");
						$order['modified_datetime'] = date("Y-m-d H:i:s");
						$order['CreatedBy'] = $this->session->userdata('user_front_session')['id'];
						$order['status'] = 1;
						$order['isdelete'] = 0;
						$this->db->insert('orders',$order);
						$order_id = $this->db->insert_id();

						if($order_id)
						{
							$ord = $this->db->select("*")->from('orders')->where("OrderID",$order_id)->get()->row_array(); 
							foreach ($cart as $key => $v)
			        {
			            		$product = $this->db->select("*")->from('product')->where("id",$v['id'])->get()->row_array();

            		$variation_master = $this->db->select("*")->from('product_price')->where("id",$v['variation'])->get()->row_array();
            		$variation = $this->db->select("weight_name")->from('weight_master')->where("id",$variation_master['weight'])->get()->row_array();
            		$category = $this->db->select("name")->from('category')->where("id",$product['collectiontype'])->get()->row_array();
            		$sub['order_id'] = $order_id;
            		$sub['order_no'] = $ord['order_no_disp'];
            		$sub['customer_id'] = $ord['CustomerID'];
								$sub['products_id'] = $v['id'];
								$sub['products_name'] = $v['name'];
								$sub['products_code'] = $product['productcode'];
								$sub['products_price'] = $v['price'];
								$sub['products_qty'] = $v['qty'];
								$sub['products_total_cost'] = $v['subtotal'];
								$sub['variation'] = $v['variation'];
								$sub['variation_title'] = $variation['weight_name'];
								$sub['collectiontype'] = $product['collectiontype'];
								$sub['categoryid'] =  $product['collectiontype'];
								$sub['category_title'] =  $category['name'];
								$sub['products_image'] = $v['image'];
								$sub['products_extra_note'] = "";
								$sub['product_remark'] = $product['description'];
								$sub['status'] = 1;
								$sub['isdelete'] = 0;
								$sub['created_datetime'] = date("Y-m-d H:i:s");
								$sub['modified_datetime'] = date("Y-m-d H:i:s");
								$this->db->insert('order_products',$sub);            		
			            	}
						}
						$this->cart->destroy();
						$this->session->set_flashdata('success', 'Order Placed Successfully.');
						$this->session->set_flashdata('active', 'orders');
						redirect('dashboard','refresh'); exit;

					}
				}
			}
		}else{
			$user_id= $this->session->userdata('user_front_session')['id'];
			$cart = $this->cart->contents();
			if(empty($cart) || $order_ins){
				redirect('our-products'); exit;
			}else
			{
				if($this->input->post('diffrent_ship'))
				{
					$ins_add['landmark'] = trim($this->input->post('landmark_extra'));
					$ins_add['address'] = trim($this->input->post('address_extra'));
					$ins_add['country'] = 101;//trim($this->input->post('country'));
					$ins_add['state'] = trim($this->input->post('state_extra'));
					$ins_add['city'] = trim($this->input->post('city_extra'));
					$ins_add['pincode'] = trim($this->input->post('pincode_extra'));
					$ins_add['mo_number'] = trim($this->input->post('mobile_extra'));
					$ins_add['email'] = trim($this->input->post('email_extra'));
					$ins_add['create_at'] = date("Y-m-d H:i:s");
					$ins_add['user_id'] = $this->session->userdata('user_front_session')['id'];
					$this->db->insert('users_address',$ins_add);
					$ins_add_id = $this->db->insert_id();
					$user=$this->db->select("*")->from('users')->where('id',$this->session->userdata('user_front_session')['id'])->get()->row_array();
					$user['cur_sel_address'] = $ins_add_id;
	       			$this->session->set_userdata('user_front_session',$user);
	       			$user_id= $this->session->userdata('user_front_session')['id'];	
				}
				$discount_master = $this->db->query("SELECT u.discount FROM festival_discount u WHERE u.id = 1")->row_array();
				$shipping_limit = $this->db->query("SELECT u.shipping_limit FROM free_shipping u WHERE u.id = 1")->row_array();
				$user_data = $this->db->select("*")->from('users')->where("id",$user_id)->get()->row_array();
				$ship_address = $this->db->select("*")->from('users_address')->where("id",$this->session->userdata('user_front_session')['cur_sel_address'])->get()->row_array();

				$total=0.00;  $total_pro = 0;
        foreach ($cart as $key => $v)
        {
          $total+=$v['subtotal'];
          $total_pro++;
        }

        $shipping_charge=get_shipping_by_state(); 
        if($total>=$shipping_limit['shipping_limit'])
        {
          $shipping_charge=0;
        }
        $discount = 0.00; 
        if($discount_master['discount'])
        {
            $discount = $total*$discount_master['discount']/100;
        }
				$series = get_order_series();
				$order['CustomerID']=$user_id;
				$order['OrderNo']=$series['order_no'];
				$order['order_no_disp']=$series['order_no_disp'];
				$order['OrderDate']=date("Y-m-d");
				$order['OrderTime']=date("H:i:s");
				$order['OrderStatus']="Received";
				$order['TotalProducts']=$total_pro;
				$order['SubValue']=$total;
				$order['ShippingCharges']=$shipping_charge;
				$order['Tax']=0;
				$order['Discount']=$discount;
				$order['TotalValue']=$total+$shipping_charge-$discount;
				$order['BillingName'] = $user_data['name']." ".$user_data['surname'];
				$order['BillingEmail'] = $user_data['email'];
				$order['BillingPhone'] = $user_data['mo_number'];
				$order['BillingAddress'] = $user_data['address_1'];
				$order['BillingCity'] = $user_data['city'];
				$order['BillingState'] = $user_data['state'];
				$order['BillingZipCode'] = $user_data['pincode'];
				$order['address_id'] = $this->session->userdata('user_front_session')['cur_sel_address'];
				$order['ShippingName'] = $user_data['name']." ".$user_data['surname'];
				$order['ShippingEmail'] = $ship_address['email'];
				$order['ShippingAddress'] = $ship_address['address'];
				$order['ShippingCity'] = $ship_address['city'];
				$order['ShippingState'] = $ship_address['state'];
				$order['ShippingCountry'] = $ship_address['country'];
				$order['ShippingZipCode'] = $ship_address['pincode'];
				$order['ShippingMobileNo'] = $ship_address['mo_number'];
				$order['created_datetime'] = date("Y-m-d H:i:s");
				$order['modified_datetime'] = date("Y-m-d H:i:s");
				$order['CreatedBy'] = $this->session->userdata('user_front_session')['id'];
				$order['status'] = 1;
				$order['isdelete'] = 0;
				$this->db->insert('orders',$order);
				$order_id = $this->db->insert_id();

				if($order_id)
				{
					$ord = $this->db->select("*")->from('orders')->where("OrderID",$order_id)->get()->row_array(); 
					foreach ($cart as $key => $v)
	        {
	            		$product = $this->db->select("*")->from('product')->where("id",$v['id'])->get()->row_array();

        		$variation_master = $this->db->select("*")->from('product_price')->where("id",$v['variation'])->get()->row_array();
        		$variation = $this->db->select("weight_name")->from('weight_master')->where("id",$variation_master['weight'])->get()->row_array();
        		$category = $this->db->select("name")->from('category')->where("id",$product['collectiontype'])->get()->row_array();
        		$sub['order_id'] = $order_id;
        		$sub['order_no'] = $ord['order_no_disp'];
        		$sub['customer_id'] = $ord['CustomerID'];
						$sub['products_id'] = $v['id'];
						$sub['products_name'] = $v['name'];
						$sub['products_code'] = $product['productcode'];
						$sub['products_price'] = $v['price'];
						$sub['products_qty'] = $v['qty'];
						$sub['products_total_cost'] = $v['subtotal'];
						$sub['variation'] = $v['variation'];
						$sub['variation_title'] = $variation['weight_name'];
						$sub['collectiontype'] = $product['collectiontype'];
						$sub['categoryid'] =  $product['collectiontype'];
						$sub['category_title'] =  $category['name'];
						$sub['products_image'] = $v['image'];
						$sub['products_extra_note'] = "";
						$sub['product_remark'] = $product['description'];
						$sub['status'] = 1;
						$sub['isdelete'] = 0;
						$sub['created_datetime'] = date("Y-m-d H:i:s");
						$sub['modified_datetime'] = date("Y-m-d H:i:s");
						$this->db->insert('order_products',$sub);            		
	            	}
				}
				$this->cart->destroy();
				$this->session->set_flashdata('success', 'Order Placed Successfully.');
				$this->session->set_flashdata('active', 'orders');
				redirect('dashboard','refresh'); exit;

			}

		}

		/*//ORDER ENTRY START
		$cart = $this->cart->contents();
		if(empty($cart) || $order_ins){
			redirect('our-products'); exit;
		}else
		{
			if($this->input->post('diffrent_ship'))
			{
				$ins_add['landmark'] = trim($this->input->post('landmark_extra'));
				$ins_add['address'] = trim($this->input->post('address_extra'));
				$ins_add['country'] = 101;//trim($this->input->post('country'));
				$ins_add['state'] = trim($this->input->post('state_extra'));
				$ins_add['city'] = trim($this->input->post('city_extra'));
				$ins_add['pincode'] = trim($this->input->post('pincode_extra'));
				$ins_add['mo_number'] = trim($this->input->post('mobile_extra'));
				$ins_add['email'] = trim($this->input->post('email_extra'));
				$ins_add['create_at'] = date("Y-m-d H:i:s");
				$ins_add['user_id'] = $this->session->userdata('user_front_session')['id'];
				$this->db->insert('users_address',$ins_add);
				$ins_add_id = $this->db->insert_id();
				$user=$this->db->select("*")->from('users')->where('id',$this->session->userdata('user_front_session')['id'])->get()->row_array();
				$user['cur_sel_address'] = $ins_add_id;
       			$this->session->set_userdata('user_front_session',$user);
       			$user_id= $this->session->userdata('user_front_session')['id'];	
			}
			$discount_master = $this->db->query("SELECT u.discount FROM festival_discount u WHERE u.id = 1")->row_array();
			$shipping_limit = $this->db->query("SELECT u.shipping_limit FROM free_shipping u WHERE u.id = 1")->row_array();
			$user_data = $this->db->select("*")->from('users')->where("id",$user_id)->get()->row_array();
			$ship_address = $this->db->select("*")->from('users_address')->where("id",$this->session->userdata('user_front_session')['cur_sel_address'])->get()->row_array();

			$total=0.00;  $total_pro = 0;
            foreach ($cart as $key => $v)
            {
              $total+=$v['subtotal'];
              $total_pro++;
            }

            $shipping_charge=get_shipping_by_state(); 
            if($total>=$shipping_limit['shipping_limit'])
            {
              $shipping_charge=0;
            }
            $discount = 0.00; 
            if($discount_master['discount'])
            {
                $discount = $total*$discount_master['discount']/100;
            }
			$series = get_order_series();
			$order['CustomerID']=$user_id;
			$order['OrderNo']=$series['order_no'];
			$order['order_no_disp']=$series['order_no_disp'];
			$order['OrderDate']=date("Y-m-d");
			$order['OrderTime']=date("H:i:s");
			$order['OrderStatus']="Received";
			$order['TotalProducts']=$total_pro;
			$order['SubValue']=$total;
			$order['ShippingCharges']=$shipping_charge;
			$order['Tax']=0;
			$order['Discount']=$discount;
			$order['TotalValue']=$total+$shipping_charge-$discount;
			$order['BillingName'] = $user_data['name']." ".$user_data['surname'];
			$order['BillingEmail'] = $user_data['email'];
			$order['BillingPhone'] = $user_data['mo_number'];
			$order['BillingAddress'] = $user_data['address_1'];
			$order['BillingCity'] = $user_data['city'];
			$order['BillingState'] = $user_data['state'];
			$order['BillingZipCode'] = $user_data['pincode'];
			$order['address_id'] = $this->session->userdata('user_front_session')['cur_sel_address'];
			$order['ShippingName'] = $user_data['name']." ".$user_data['surname'];
			$order['ShippingEmail'] = $ship_address['email'];
			$order['ShippingAddress'] = $ship_address['address'];
			$order['ShippingCity'] = $ship_address['city'];
			$order['ShippingState'] = $ship_address['state'];
			$order['ShippingCountry'] = $ship_address['country'];
			$order['ShippingZipCode'] = $ship_address['pincode'];
			$order['ShippingMobileNo'] = $ship_address['mo_number'];
			$order['created_datetime'] = date("Y-m-d H:i:s");
			$order['modified_datetime'] = date("Y-m-d H:i:s");
			$order['CreatedBy'] = $this->session->userdata('user_front_session')['id'];
			$order['status'] = 1;
			$order['isdelete'] = 0;
			$this->db->insert('orders',$order);
			$order_id = $this->db->insert_id();

			if($order_id)
			{
				$ord = $this->db->select("*")->from('orders')->where("OrderID",$order_id)->get()->row_array(); 
				foreach ($cart as $key => $v)
            	{
            		$product = $this->db->select("*")->from('product')->where("id",$v['id'])->get()->row_array();

            		$variation_master = $this->db->select("*")->from('product_price')->where("id",$v['variation'])->get()->row_array();
            		$variation = $this->db->select("weight_name")->from('weight_master')->where("id",$variation_master['weight'])->get()->row_array();
            		$category = $this->db->select("name")->from('category')->where("id",$product['collectiontype'])->get()->row_array();
            		$sub['order_id'] = $order_id;
            		$sub['order_no'] = $ord['order_no_disp'];
            		$sub['customer_id'] = $ord['CustomerID'];
					$sub['products_id'] = $v['id'];
					$sub['products_name'] = $v['name'];
					$sub['products_code'] = $product['productcode'];
					$sub['products_price'] = $v['price'];
					$sub['products_qty'] = $v['qty'];
					$sub['products_total_cost'] = $v['subtotal'];
					$sub['variation'] = $v['variation'];
					$sub['variation_title'] = $variation['weight_name'];
					$sub['collectiontype'] = $product['collectiontype'];
					$sub['categoryid'] =  $product['collectiontype'];
					$sub['category_title'] =  $category['name'];
					$sub['products_image'] = $v['image'];
					$sub['products_extra_note'] = "";
					$sub['product_remark'] = $product['description'];
					$sub['status'] = 1;
					$sub['isdelete'] = 0;
					$sub['created_datetime'] = date("Y-m-d H:i:s");
					$sub['modified_datetime'] = date("Y-m-d H:i:s");
					$this->db->insert('order_products',$sub);            		
            	}
			}
			$this->cart->destroy();
			$this->session->set_flashdata('success', 'Order Placed Successfully.');
			redirect('dashboard'); exit;

		}*/
	}

}