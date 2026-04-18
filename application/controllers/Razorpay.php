<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Razorpay extends CI_Controller {
    // construct
    public function __construct() {
        parent::__construct();   
        $this->load->library('cart');
        $this->load->model('administrator/Crud_Model');       
    }
    // initialized cURL Request
    private function get_curl_handle($payment_id, $amount)  {
        $url = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id = RAZOR_KEY_ID;
        $key_secret = RAZOR_KEY_SECRET;
        $fields_string = "amount=$amount";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__).'/ca-bundle.crt');
        return $ch;
    }   
    // callback method
    public function callback_pay() 
    {  
        if (!empty($this->input->post('razorpay_payment_id')) ) 
        {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = rand().time();
            $this->session->set_flashdata('razorpay_payment_id', $this->input->post('razorpay_payment_id'));
            $this->session->set_flashdata('merchant_order_id', $merchant_order_id);
            $currency_code = 'INR';

            $amount=0;
            foreach ($this->cart->contents() as $key => $v)
            {
              $amount+=$v['subtotal'];
            }
            $success = false;
            $error = '';
            try {                
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                    $response_array['razorpay_payment_id'] = $razorpay_payment_id;
                    $response_array['merchant_order_id'] = $merchant_order_id;
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }

         //   echo "<pre>"; print_r($this->session->userdata()); exit;
            $billing_address = $this->Crud_Model->getById($this->session->userdata('user_front_session')['cur_sel_address'],'id','users_address');


          //   echo "<pre>"; print_r($billing_address); exit;

            //if ($success === true) {
            if(1){
				
				$customer_detail =  getCustomerDetails($this->session->userdata('user_front_session')['id'])	;
				
				$customer_state = $this->db->select('name')->where('id',$billing_address['state'])->from('own_states')->get()->row_array();
				$customer_country = $this->db->select('name')->where('id',$billing_address['country'])->from('own_countries')->get()->row_array();				
				
                $up_data['customer_id'] = $this->session->userdata('user_front_session')['id'];
                $up_data['payment_date']=date('Y-m-d');
                $up_data['payment_time']=date('H:i:s');
                $up_data['bill_year']=date('Y');
                $up_data['bill_month']=date('m');				
                $ord_series = get_order_series_monthly();
                $up_data['paid_status']=1;
                $up_data['razorpay_payment_id']=$razorpay_payment_id;
                $up_data['order_id']=date("Y")."/".date("m")."/".$ord_series['order_no_disp'];
                $up_data['series']=$ord_series['order_no'];
                $shipping_limit = $this->db->select('*')->from('free_shipping')->where('id',1)->get()->row_array();
                $up_data['shipping_free_limit']=$shipping_limit['shipping_limit'];

                foreach ($this->cart->contents() as $key => $v)
                {
                  $total+=$v['subtotal'];
                }
                $up_data['total_amount']=$total;
                $shipping_charge=0;
                if(is_login_user_front())
                { 
                    $shipping_charge=get_shipping_by_state(); 
                    if($total>=$shipping_limit['shipping_limit'])
                    {
                      $shipping_charge=0;
                    }
                }
                $up_data['total_shipping_charge']=$shipping_charge;
                $up_data['sub_total'] = $up_data['total_amount'] + $up_data['total_shipping_charge'];


                $discount_row = $this->db->select('*')->from('festival_discount')->where('id',1)->get()->row_array();
                $up_data['discount_pr'] = $discount_row['discount'];
                $up_data['discount_rs'] =($up_data['total_amount']*$discount_row['discount'])/100;
              
			   //  echo "<pre>" ; print_r($up_data); exit;


                $up_data['final_total']=$this->input->post('merchant_amount');
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
				
				//  echo "<pre>" ; print_r($up_data); exit;
				
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
                }
               // echo "1111"; $this->db->last_query(); exit;
                $this->session->set_userdata('bill_id', $insert_id);
                $res = $this->db->select('cb.*')->from('customer_bill_detail cb')->where('cb.bill_id',$insert_id)->order_by('cb.id','desc')->get()->result_array();
                $this->db->select('cb.*,c.name,c.surname,c.email,cu.name as country_name,s.name as state_name,c.mo_number');
                $this->db->from('customer_bill cb');
                $this->db->join('users c','c.id = cb.customer_id');
                $this->db->join('own_countries cu','cu.id = cb.billing_country_id');
                $this->db->join('own_states s','s.id = cb.billing_state_id');
                $this->db->where('cb.id',$insert_id);
                $bill = $this->db->get()->row_array();
                if($bill["delivery_status"]==0){ 
                    $d_status = 'Pending'; 
                }
                $msg = '<!DOCTYPE html>
                    <html>
                    <head>
                        <title></title>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <style type="text/css">
                            body,
                            table,
                            td,
                            a {
                                -webkit-text-size-adjust: 100%;
                                -ms-text-size-adjust: 100%;
                            }
                            table,
                            td {
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                            }
                            img {
                                -ms-interpolation-mode: bicubic;
                            }
                            img {
                                border: 0;
                                height: auto;
                                line-height: 100%;
                                outline: none;
                                text-decoration: none;
                            }
                            table {
                                border-collapse: collapse !important;
                            }
                            body {
                                height: 100% !important;
                                margin: 0 !important;
                                padding: 0 !important;
                                width: 100% !important;
                            }
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: none !important;
                                font-size: inherit !important;
                                font-family: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                            }
                            @media screen and (max-width: 480px) {
                                .mobile-hide {
                                    display: none !important;
                                }
                                .mobile-center {
                                    text-align: center !important;
                                }
                            }
                            div[style*="margin: 16px 0;"] {
                                margin: 0 !important;
                            }
                        </style>
                        <body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
                        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
                            For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.
                        </div>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                        <tr>
                                            <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                                    <tr>
                                                        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="'.base_url().'assest/frontend/images/logo.svg" width="125" height="120" style="display: block; border: 0px;" /><br>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                                            <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;"> Hi <b>'.ucwords($bill['name'].' '.$bill['surname']).'</b>, </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 200; line-height: 0px;">
                                                        <h3>Thank you for shopping with '.FIRM_NAME.'</h3>
                                                         <div style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;"> Your order has been received. We will dispatch as soon as possible and inform you.</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:right">
                                                        <table border="0" cellpadding="0" cellspacing="0" align="right" width="60%">
                                                            <tr>
                                                                <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 0px;">
                                                                  <p style="font-size: 16px; font-weight: 400; line-height: 8px; color: #777777;margin-right:10px;"><b> Order Id : </b> '.$bill['order_id'].'</p>
                                                                  <p style="font-size: 16px; font-weight: 400; line-height: 8px; color: #777777;margin-right:10px;"><b> Order Date : </b> '.date('d-m-Y',strtotime($bill['created_at'])).'</p>
                                                                  <p style="font-size: 16px; font-weight: 400; line-height: 8px; color: #777777; margin-right:10px;"><b> Transaction Id : </b> '.$bill['razorpay_payment_id'].'</b> </p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-top: 20px;">
                                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                <tr>
                                                                    <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Product </td>
                                                                    <td width="25%" align="right" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Amount </td>
                                                                </tr>';
                                                                foreach ($res as $key => $value) { $unit = $this->config->item('weight_arr');
                                                                    $msg.='<tr>
                                                                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">'.$value['product_name'].' '.$value['weight_name'].' '.$unit[$value['unit_id']].'</td>
                                                                        <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">'.$value['subtotal'].'  </td>
                                                                    </tr>';
                                                                }   
                                                            $msg.='</table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-top: 20px;">
                                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                <tr>
                                                                    <td width="75%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> Total : </td>
                                                                    <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">'.$bill['total_amount'].'</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="75%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> Shipping Charge : </td>
                                                                    <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">'.$bill['total_shipping_charge'].'</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="75%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> Net Amount : </td>
                                                                    <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">'.$bill['final_total'].'</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                                                    <tr>
                                                        <td align="center" valign="top" style="font-size:0;">
                                                            <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                                    <tr>
                                                                        <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                                            <p style="font-weight: 800;">Delivery Address</p>
                                                                            <p>'.$bill['billing_address'].'<br>'.ucwords($bill['billing_city']).', '.$bill['state_name'].', '.'<br>'.$bill['country_name'].' - '.$bill['billing_pincode'].'</p>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                                    <tr>
                                                                        <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr> 
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </body>
                    </html>' ;

                

                $email = $bill['email'];
                if($email!=''){
                   // send_mail($email,$msg,"Order Detail"); 
                }
                $admin_msg = '<!DOCTYPE html>
                    <html>
                    <head>
                        <title></title>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <style type="text/css">
                            body,
                            table,
                            td,
                            a {
                                -webkit-text-size-adjust: 100%;
                                -ms-text-size-adjust: 100%;
                            }
                            table,
                            td {
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                            }
                            img {
                                -ms-interpolation-mode: bicubic;
                            }
                            img {
                                border: 0;
                                height: auto;
                                line-height: 100%;
                                outline: none;
                                text-decoration: none;
                            }
                            table {
                                border-collapse: collapse !important;
                            }
                            body {
                                height: 100% !important;
                                margin: 0 !important;
                                padding: 0 !important;
                                width: 100% !important;
                            }
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: none !important;
                                font-size: inherit !important;
                                font-family: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                            }
                            @media screen and (max-width: 480px) {
                                .mobile-hide {
                                    display: none !important;
                                }
                                .mobile-center {
                                    text-align: center !important;
                                }
                            }
                            div[style*="margin: 16px 0;"] {
                                margin: 0 !important;
                            }
                        </style>
                    <body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
                        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
                            For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.
                        </div>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                        <tr>
                                            <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                                    <tr>
                                                        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="'.base_url().'assest/frontend/images/logo.svg" width="125" height="120" style="display: block; border: 0px;" /><br>
                                                            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> New Order Arrival ! </h2>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                                            <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;"><b>Customer : </b>'.$bill['name'].' '.$bill['surname'].' </p>
                                                            <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;"><b>Contact No : </b>'.$bill['mo_number'].' </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:right">
                                                            <table border="0" cellpadding="0" cellspacing="0" align="right" width="60%">
                                                                <tr>
                                                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 0px;">
                                                                      <p style="font-size: 16px; font-weight: 400; line-height: 8px; color: #777777;margin-right:10px;"><b> Order Id : </b> '.$bill['order_id'].'</p>
                                                                      <p style="font-size: 16px; font-weight: 400; line-height: 8px; color: #777777;margin-right:10px;"><b> Order Date : </b> '.date('d-m-Y',strtotime($bill['created_at'])).'</p>
                                                                      <p style="font-size: 16px; font-weight: 400; line-height: 8px; color: #777777; margin-right:10px;"><b> Transaction Id : </b> '.$bill['razorpay_payment_id'].'</b> </p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-top: 20px;">
                                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                <tr>
                                                                    <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Product </td>
                                                                    <td width="25%" align="right" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Amount </td>
                                                                </tr>';
                                                                foreach ($res as $key => $value) { $unit = $this->config->item('weight_arr');
                                                                    $admin_msg.='<tr>
                                                                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">'.$value['product_name'].' '.$value['weight_name'].' '.$unit[$value['unit_id']].'</td>
                                                                        <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">'.$value['subtotal'].'  </td>
                                                                    </tr>';
                                                                }   
                                                            $admin_msg.='</table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style="padding-top: 20px;">
                                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                <tr>
                                                                    <td width="75%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> Total : </td>
                                                                    <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">'.$bill['total_amount'].'</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="75%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> Shipping Charge : </td>
                                                                    <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">'.$bill['total_shipping_charge'].'</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="75%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> Net Amount : </td>
                                                                    <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">'.$bill['final_total'].'</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                                                    <tr>
                                                        <td align="center" valign="top" style="font-size:0;">
                                                            <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                                    <tr>
                                                                        <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                                            <p style="font-weight: 800;">Delivery Address</p>
                                                                            <p>'.$bill['billing_address'].'<br>'.ucwords($bill['billing_city']).', '.$bill['state_name'].', '.'<br>'.$bill['country_name'].' - '.$bill['billing_pincode'].'</p>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                                    <tr>
                                                                        <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr> 
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </body>
                </html>' ;

               // echo $admin_msg; exit;
                $admin_email = FIRM_EMAIL;
                if($admin_email!=''){
                    //send_mail($admin_email,$admin_msg,"Order Detail"); 
                }
                $this->session->set_flashdata('front_success', 'Order Added Successfully');
                $this->cart->destroy(); 
                redirect('dashboard/'.md5($insert_id));
                if (!$order_info['order_status_id']) {
                    redirect($this->input->post('merchant_surl_id'));
                } else {
                    redirect($this->input->post('merchant_surl_id'));
                }
            } else {
                echo "FAIL"; exit;
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
            $data['title'] = 'Razorpay Failed | Venus'; 
            redirect('dashboard');           
            
        }
    } 
    public function success() 
    {
        $data['title'] = 'Razorpay Success | Venus';
        $this->cart->destroy(); 
        redirect('dashboard'); 
    }  
    public function failed() {
        $data['title'] = 'Razorpay Failed | Venus'; 
        redirect('dashboard');           
    }
    /*public function add_fail_entry()
    {
        $billing_address = $this->Crud_Model->getById($this->session->userdata('billing_address'),'id','customer_address');
        $up_data['customer_id']=$this->session->userdata('customer')['id'];
        $up_data['payment_date']=date('Y-m-d');
        $up_data['payment_time']=date('H:i:s');
        $up_data['paid_status']=0;
        $up_data['razorpay_payment_id']=$this->input->post('payment_id');
        $up_data['order_id']=$this->input->post('merchant_order_id');
        $up_data['total_amount']=$this->input->post('total_amount');
        $up_data['total_shipping_charge']=$this->input->post('shipping_charge');
        $up_data['final_total']=$this->input->post('merchant_amount');
        $up_data['billing_address'] = $billing_address['address'];
        $up_data['billing_country_id'] = $billing_address['country_id'];
        $up_data['billing_state_id'] = $billing_address['state_id'];
        $up_data['billing_city'] = $billing_address['city'];
        $up_data['billing_pincode'] = $billing_address['pincode'];
        $this->Crud_Model->InsertData('customer_bill',$up_data);
        $insert_id = $this->db->insert_id();
        foreach ($this->cart->contents() as $key => $value) {
            $data['bill_id'] = $insert_id;
            $data['product_weight_id'] = $value['id'];
            $data['product_id'] = $value['product_id'];
            $data['product_name'] = $value['name'];
            $data['weight_name'] = $value['weight_name'];
            $data['unit_id'] = $value['unit_id'];
            $data['price'] = $value['price'];
            $data['qty'] = $value['qty'];
            $data['shipping'] = $value['shipping'];
            $data['shipping_charge'] = $value['shipping_charge'];
            $data['avg_qty'] = $value['avg_qty'];
            $data['out_gujarat_shipping_charge'] = $value['out_gujarat_shipping_charge'];
            $data['out_gujarat_avg_qty'] = $value['out_gujarat_avg_qty'];
            $data['subtotal'] = $value['subtotal'];
            $this->Crud_Model->InsertData('customer_bill_detail',$data);
        }
        $this->cart->destroy(); 
        echo json_encode(array('error'=>0,'insert_id'=>md5($insert_id))); 
        exit;
    } */
}