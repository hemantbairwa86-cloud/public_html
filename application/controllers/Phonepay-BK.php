<?php

ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    class Phonepay extends CI_Controller {
    // construct
    public function __construct() {
        parent::__construct();   
        $this->load->library('cart');
        $this->load->model('administrator/Crud_Model');       
    }
    // initialized cURL Request
    // callback method
    public function callback_pay() 
    {  
        if (!empty($this->input->post()) ) 
        {
            $merchant_order_id = rand().time();
            $merchant_trans_id = time().rand();
            $this->session->set_flashdata('merchant_order_id', $merchant_order_id);
            $amount=0; $shipping_charge=0; $final_total =0;
            $cart = $this->cart->contents();
            if(empty($cart))
            {
                echo 'An error occured. Cart Is Empty';
                $data['title'] = 'Phonepay Failed | Venus'; 
                redirect('checkout'); 
            }
            foreach ($cart as $key => $v)
            {
              $amount+=$v['subtotal'];
            }
            $shipping_limit = $this->db->query("SELECT u.shipping_limit FROM free_shipping u WHERE u.id = 1")->row_array();
            if(is_login_user_front())
            { 
                $shipping_charge=get_shipping_by_state(); 
                if($amount>=$shipping_limit['shipping_limit'])
                {
                  $shipping_charge=0;
                }
            }
            $discount = $this->db->query("SELECT u.discount FROM festival_discount u WHERE u.id = 1")->row_array();

            $dis = 0.00; 
            if($discount['discount'])
            {
                $dis = $amount*$discount['discount']/100;
            }
            $final_total = $amount+$shipping_charge-$dis;

            //INSERTING RECORDS
            $billing_address = $this->Crud_Model->getById($this->session->userdata('user_front_session')['cur_sel_address'],'id','users_address');
            $customer_detail =  getCustomerDetails($this->session->userdata('user_front_session')['id']);

            $customer_state = $this->db->select('name')->where('id',$billing_address['state'])->from('own_states')->get()->row_array();
            $customer_country = $this->db->select('name')->where('id',$billing_address['country'])->from('own_countries')->get()->row_array();              
            $up_data['customer_id'] = $this->session->userdata('user_front_session')['id'];
            $up_data['payment_date']=date('Y-m-d');
            $up_data['payment_time']=date('H:i:s');
            $up_data['bill_year']=date('Y');
            $up_data['bill_month']=date('m');               
            $ord_series = get_order_series();
            $up_data['paid_status']=0;
            $up_data['razorpay_payment_id']="TR".$merchant_trans_id;
            $up_data['order_id']=date("Y")."/".date("m")."/".$ord_series['order_no_disp'];
            $up_data['series']=$ord_series['order_no_disp'];
            $shipping_limit = $this->db->select('*')->from('free_shipping')->where('id',1)->get()->row_array();
            $up_data['shipping_free_limit']=$shipping_limit['shipping_limit'];
            $up_data['total_amount']=$amount;
            $up_data['total_shipping_charge']=$shipping_charge;
            $up_data['sub_total'] = $up_data['total_amount'] + $up_data['total_shipping_charge'];
            $discount_row = $this->db->select('*')->from('festival_discount')->where('id',1)->get()->row_array();
            $up_data['discount_pr'] = $discount_row['discount'];
            $up_data['discount_rs'] =$dis;
            $up_data['final_total']=$final_total;
            $up_data['billing_address'] = $billing_address['address'];
            $up_data['billing_landmark'] = $billing_address['landmark'];
            $up_data['billing_country_id'] = $billing_address['country'];
            $up_data['billing_state_id'] = $billing_address['state'];
            $up_data['billing_state_name'] = $customer_state['name'];
            $up_data['billing_country_name'] = $customer_country['name'];               
            $up_data['billing_city'] = $billing_address['city'];
            $up_data['billing_pincode'] = $billing_address['pincode'];
            $up_data['billing_mobile'] = $billing_address['mo_number'];
            $up_data['billing_email'] = $billing_address['email'];
            $up_data['payment_mode'] = 'Netbanking';
            //echo "<pre>" ; print_r($up_data); exit;        
            $this->Crud_Model->InsertData('customer_bill',$up_data);
            $insert_id = $this->db->insert_id();

            foreach ($this->cart->contents() as $key => $value) 
            {
                $product = $this->db->select('*')->where('id',$value['id'])->from('product')->get()->row_array();
                $data['bill_id'] = $insert_id;
                $data['product_weight_id'] = $value['variation'];
                $data['product_id'] = $value['id'];
                $data['product_name'] = $value['name'];
                $data['price'] = $value['price'];
                $data['qty'] = $value['qty'];
                $data['subtotal'] = $value['subtotal'];
                $prod_vari = $this->db->select('*')->where('id',$value['variation'])->from('weight_master')->get()->row_array();
                if(!empty($prod_vari))
                {
                    $data['weight_name'] = $prod_vari['weight_name'];
                    $data['unit'] = $prod_vari['unit'];
                }else{
                    $data['weight_name'] = "";
                    $data['unit'] = "";
                }
                $product_cate = $this->db->select('name')->where('id',$product['collectiontype'])->from('category')->get()->row_array();
                if(!empty($product_cate))
                {
                    $data['product_category'] = $product_cate['name'];
                }
                $this->Crud_Model->InsertData('customer_bill_detail',$data);
                //echo $this->db->last_query();
            }
            //echo "1111";  exit;
            $this->session->set_userdata('bill_id', $insert_id);

            //END OF INSERT


            $merchantID = PHONE_PAY_MERCHENT;
            $apiKey=PHONE_PAY_KEY;
            $redirectUrl = base_url().'phonepay/success';
            //Add transaction details
            $mobile = $customer_detail['mo_number'];
           // echo $final_total; exit;
            //$final_total = 1; //amount in INR REMOVE THIS
            $eventPayload = [
                'merchantId' => $merchantID,
                'merchantTransactionId' => "TR".$merchant_trans_id, 
                'merchantUserId' => $merchant_trans_id,
                'amount' => $final_total*100,
                'redirectUrl' => $redirectUrl,
                'redirectMode' => 'POST',
                'callbackUrl' => $redirectUrl,
                'mobileNumber' => $mobile,
                'paymentInstrument' => [
                    'type' => 'PAY_PAGE',
                ],
            ];
            // Encode payload to base64
            $encodedPayload = base64_encode(json_encode($eventPayload));
            // Set API Key and Index
            $saltKey = PHONE_PAY_KEY; // Your API Key
            $saltIndex = 1;
            // Construct X-VERIFY header
            $string = $encodedPayload . '/pg/v1/pay' . $saltKey;
            $sha256 = hash('sha256', $string);
            $finalXHeader = $sha256 . '###' . $saltIndex;
            // Set headers for the request
            $headers = [
                'Content-Type: application/json',
                'X-VERIFY: ' . $finalXHeader,
            ];
            // Define PhonePe API URL
            //$phonePayUrl = 'https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay'; // For Development
            $phonePayUrl = 'https://api.phonepe.com/apis/hermes/pg/v1/pay'; // For Production
            // Prepare data for the request
            $data = [
                'request' => $encodedPayload,
            ];
            // Set options for the HTTP request
            $options = [
                'http' => [
                    'method' => 'POST',
                    'content' => json_encode($data),
                    'header' => implode("\r\n", $headers),
                ],
            ];
            // Create a stream context
            $context = stream_context_create($options);
            // Make the request to PhonePe API
            $response = file_get_contents($phonePayUrl, false, $context);
            // Decode the response
            $result = json_decode($response, true);
            // Extract the redirect URL for payment
            $redirectUrl = $result['data']['instrumentResponse']['redirectInfo']['url'];
            // Redirect the user to PhonePe for payment
            header("Location: $redirectUrl");
            exit();
            
        } else {
            echo 'An error occured. Contact site administrator, please!';
            $data['title'] = 'Phonepay Failed | Venus'; 
            redirect('dashboard');           
        }
    }

    public function success() 
    {        // Define PhonePe gateway information
        $gateway = (object) [
            'token' => PHONE_PAY_MERCHENT,
            'secret_key' => PHONE_PAY_KEY,
        ];
        // Extract transaction ID from POST data
        $orderId = $_POST['transactionId'];
        // Construct X-VERIFY header for status check
        $encodeIn265 = hash('sha256', '/pg/v1/status/' . $gateway->token . '/' . $orderId . $gateway->secret_key) . '###1';
        // Set headers for the status check request
        $headers = [
            'Content-Type: application/json',
            'X-MERCHANT-ID: ' . $gateway->token,
            'X-VERIFY: ' . $encodeIn265,
            'Accept: application/json',
        ];
        // Define PhonePe status check URL
        $phonePeStatusUrl = 'https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/status/' . $gateway->token . '/' . $orderId; // For Development
        // $phonePeStatusUrl = 'https://api.phonepe.com/apis/hermes/pg/v1/status/' . $gateway->token . '/' . $orderId; // For Production
        // Initialize cURL for status check
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $phonePeStatusUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        // Decode the status check response
        $api_response = json_decode($response);
        // Check if the payment was successful
        //echo "<pre>"; print_r($_POST); print_r($api_response); exit;
        if ($_POST['code'] == "PAYMENT_SUCCESS") {
            
            $this->db->where('razorpay_payment_id',$_POST['transactionId'])->update('customer_bill',array('paid_status'=>1));
            $this->cart->destroy(); 
            //echo "Thank you for your payment. We will contact you shortly!";
        } else {
            // Handle failed transactions
            //echo "Transaction Failed";
            $data['title'] = 'Phonepay Failed | Venus'; 
            redirect('dashboard');  
        }
        //echo "<pre>"; print_r($_POST); print_r($api_response); exit;
        $data['title'] = 'Phonepay Success | Venus';
        //$this->cart->destroy(); 
        redirect('dashboard'); 
    }  
    public function failed() {
        $data['title'] = 'Phonepay Failed | Venus'; 
        redirect('dashboard');           
    }
}