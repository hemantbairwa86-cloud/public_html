<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php if($SeoDetails['seotitle']!=""){ echo $SeoDetails['seotitle']." | ".FIRM_NAME; }else { echo FIRM_NAME; } ?></title>
    <meta name="description" content="<?php echo $SeoDetails['seodescription'];?>">
    <meta name="keywords" content="<?php echo $SeoDetails['seokeywords'];?>">
    <meta name="author" content=" <?php echo FIRM_NAME ; ?>">
    <meta property="og:title" content="<?php echo $SeoDetails['seotitle'];?> |   <?php echo FIRM_NAME ; ?>" />
    <meta property="og:description" content="<?php echo $SeoDetails['seodescription'];?>" />
    <?php $this->load->view('common/common_css');?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->load->view('common/common_css.php');?>
</head>

<body>


    <header class="header">        
		<?php $this->load->view('common/header');?>
    </header>

    <main>
        <!-- Breadcrumb Start -->
        <section class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h1 class="page-title">Checkout</h1>
                            <ul class="breadcrumb-page-list">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb-item">Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb End -->

        <section class="page-secton-wrapper section-space-ptb">
          <div class="container">
            <?php if(!is_login_user_front()){ ?>
              <div class="row">
                

                <?php $this->load->view('common/errors'); ?>

                <div class="col">
                  <div class="coupon-area">
                    <!-- coupon-accordion start -->
                    <div class="coupon-accordion">
                      <h3>Returning customer? <span class="coupon" id="showlogin">Click here to login</span></h3>
                      <div class="coupon-content" id="checkout-login">
                        <div class="coupon-info">
                          <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                          <form action="<?php echo base_url()."user/login"; ?>" method="POST">
                            <p class="coupon-input form-row-first">
                              <label>Username or email <span class="required">*</span></label>
                              <input type="text" name="email">
                              <?php echo '<div class="text-danger">'.form_error('email').'</div>' ?>
                            </p>
                            <p class="coupon-input form-row-last">
                              <label>Password <span class="required">*</span></label>
                              <input type="password" name="password">
                              <?php echo '<div class="text-danger">'.form_error('password').'</div>' ?>
                            </p>
                            <div class="clear"></div>
                            <p>
                              <button type="submit" class="button-login btn btn--primary btn--small" name="login" value="Login">Login</button>
                            </p>
                            <p class="lost-password"> <a href="#">Lost your password?</a> </p>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- coupon-accordion end -->
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- checkout-details-wrapper start -->
            <div class="checkout-details-wrapper">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="billing-details-wrap">
                    <form action="<?php echo base_url()."order"; ?>" method="POST">
                    <?php if(is_login_user_front()){ ?>
                    <div class="coupon-accordion">
                      <h3><span class="coupon" id="showcoupon">Shipping Address</span></h3>
                      <div class="coupon-content" id="checkout-coupon" style="display: block;">
                        <div class="coupon-info">
                          <div class="payment-method">
                            <div class="payment-accordion" style="border-bottom:0px;">
                              <?php foreach ($address_list as $key => $v) { ?>
                                <div class="accordion-item"> 
                                  <span class="payment-accordion-item-button">
                                    <input type="radio" onClick="set_seclected_address(<?php echo $v['id']; ?>);" id="shipping_Address_<?php echo $v['id']; ?>" name="paymentsSelector" <?php if($this->session->userdata('user_front_session')['cur_sel_address']==$v['id']){ echo "checked"; } ?>>
                                    <label for="shipping_Address_<?php echo $v['id']; ?>" style="font-weight:700"><?php echo $v['landmark']; ?></label>
                                  </span>
                                  <p class="payments-text-body <?php if($this->session->userdata('user_front_session')['cur_sel_address']==$v['id']){ echo "current"; } ?>"> <?php echo $v['address']; ?> , <?php echo $v['city']; ?> - <?php echo $v['state_name']; ?>  <?php echo $v['pincode']; ?> 
                                  </p>
                                </div>
                              <?php } ?>                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php }else{ ?>
                    
                      <h3 class="shoping-checkboxt-title">Billing Details</h3>
                      <div class="row">
                        <div class="col-lg-6">
                          <p class="single-form-row">
                            <label>First Name <span class="required">*</span></label>
                            <input type="text" name="first_name" value="<?php echo $first_name; ?>" required>
                            <?php echo '<div class="text-danger">'.form_error('first_name').'</div>' ?>
                          </p>
                        </div>
                        <div class="col-lg-6">
                          <p class="single-form-row">
                            <label>Last Name <span class="required">*</span></label>
                            <input type="text" name="last_name" value="<?php echo $last_name; ?>">
                            <?php echo '<div class="text-danger">'.form_error('last_name').'</div>' ?>
                          </p>
                        </div>
                        <div class="col-lg-12">
                          <p class="single-form-row">
                            <label>Address <span class="required">*</span></label>
                            <input type="text" name="address" required value="<?php echo $address; ?>">
                            <?php echo '<div class="text-danger">'.form_error('address').'</div>' ?>
                          </p>
                        </div>
                        <div class="col-lg-12">
                          <p class="single-form-row">
                            <label>Landmark <span class="required">*</span></label>
                            <input type="text" name="landmark" required value="<?php echo $landmark; ?>">
                            <?php echo '<div class="text-danger">'.form_error('landmark').'</div>' ?>
                          </p>
                        </div>
                        <div class="col-lg-6">
                          <div class="single-form-row">
                            <label>Country <span class="required">*</span></label>
                            <div class="nice-select wide">
                             <input type="text" name="country" required value="India" readonly>
                              <?php /*?><select id="country" name="country" required onChange="get_states(this.value);">
                                
                                <?php foreach ($country_list as $key => $v){ ?>
                                    <option <?php if($country_id==$v['id']){ echo "selected"; } ?> value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                                <?php } ?>
                              </select><?php */?>
                              <?php echo '<div class="text-danger">'.form_error('country').'</div>' ?>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="single-form-row">
                            <label>State <span class="required">*</span></label>
                            <div class="nice-select wide">
                              <select id="state" name="state" required onChange="get_shiping_charge(this.value);">
                                <option value="">Select</option>
                              </select>
                              <?php echo '<div class="text-danger">'.form_error('state').'</div>' ?>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <p class="single-form-row">
                            <label>City <span class="required">*</span></label>
                            <input type="text" name="city" required value="<?php echo $city; ?>">
                            <?php echo '<div class="text-danger">'.form_error('city').'</div>' ?>
                          </p>
                        </div>
                        <div class="col-lg-6">
                          <p class="single-form-row">
                            <label>Pincode <span class="required">*</span></label>
                            <input type="text" name="pincode" required value="<?php echo $pincode; ?>">
                            <?php echo '<div class="text-danger">'.form_error('pincode').'</div>' ?>
                          </p>
                        </div>
                        <div class="col-lg-6">
                          <p class="single-form-row">
                            <label>Mobile No <span class="required">*</span></label>
                            <input type="text" name="mobile" required value="<?php echo $mobile; ?>">
                            <?php echo '<div class="text-danger">'.form_error('mobile').'</div>' ?>
                          </p>
                        </div>
                        <div class="col-lg-6">
                          <p class="single-form-row">
                            <label>Email <span class="required">*</span></label>
                            <input type="email" name="email" required value="<?php echo $email; ?>">
                            <?php echo '<div class="text-danger">'.form_error('email').'</div>' ?>
                          </p>
                        </div>
                        <div class="col-lg-6">
                          <p class="single-form-row">
                            <label>Password <span class="required">*</span></label>
                            <input type="password" name="password" required value="<?php echo $password; ?>">
                            <?php echo '<div class="text-danger">'.form_error('password').'</div>' ?>
                          </p>
                        </div>
                        <div class="col-lg-6">
                          <p class="single-form-row">
                            <label>Password Confirmation <span class="required">*</span></label>
                            <input type="password" name="confirm_password" required value="<?php echo $confirm_password; ?>">
                            <?php echo '<div class="text-danger">'.form_error('confirm_password').'</div>' ?>
                          </p>
                        </div>
                       
                        <?php /* <div class="col-lg-12">
                          <div class="your-order-wrap">
                            <!-- your-order-table start -->
                            <div class="your-order-table table-responsive mt-3 mb-3">
                              <h5>Shipping Details</h5>
                              <hr>
                              <p> <b>Title Display Here</b><br>
                                8, Kiran Complex, Mavdi Main Road, Opp Mavdi Fire Station, Mavadi Industrial Area, Chandreshnagar, Rajkot, Gujarat 360004 </p>
                            </div>
                          </div>
                          <div class="checkout-box-wrap">
                            <label id="chekout-box-2">
                            <input type="checkbox">
                            Ship to a different address?</label>
                            <div class="ship-box-info">
                              <div class="row">
                                <div class="col-lg-6">
                                  <p class="single-form-row">
                                    <label>First name <span class="required">*</span></label>
                                    <input type="text" name="First name">
                                  </p>
                                </div>
                                <div class="col-lg-6">
                                  <p class="single-form-row">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input type="text" name="Last Name">
                                  </p>
                                </div>
                                <div class="col-lg-12">
                                  <p class="single-form-row">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" name="email">
                                  </p>
                                </div>
                                <div class="col-lg-6">
                                  <div class="single-form-row">
                                    <label>Country <span class="required">*</span></label>
                                    <div class="nice-select wide">
                                      <select>
                                        <option value="IN" selected>India</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="single-form-row">
                                    <label>State <span class="required">*</span></label>
                                    <div class="nice-select wide">
                                      <select>
                                        <option>Select State</option>
                                        <option>Gujarat</option>
                                        <option>Maharashtra</option>
                                        <option>Argentina</option>
                                        <option>Austria</option>
                                        <option>Azerbaijan</option>
                                        <option>Bangladesh</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <p class="single-form-row">
                                    <label>City <span class="required">*</span></label>
                                    <input type="text" name="Enter your City">
                                  </p>
                                </div>
                                <div class="col-lg-6">
                                  <p class="single-form-row">
                                    <label>Pincode <span class="required">*</span></label>
                                    <input type="text" name="Enter your Pincode">
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <p class="single-form-row m-0">
                            <label>Order notes</label>
                            <textarea placeholder="Notes about your order, e.g. special notes for delivery." class="checkout-mess" rows="2" cols="5"></textarea>
                          </p>
                        </div><?php */ ?>
                        <div class="order-button-payment mb-4">
                              <input type="submit" value="Submit" />
                        </div>
                      </div>
                    
                      <?php } ?>

					
                     <?php if(is_login_user_front()){ ?>
                      <div class="row">                         
                          <div class="col-lg-12">
                            <div class="your-order-wrap">                          
                              <!-- your-order-table start -->
                              <div class="your-order-table table-responsive mt-3 mb-3">
                                <h5>Shipping Details</h5>
                                <hr>
                                <?php foreach ($address_list as $key => $v) { 
                                  if($this->session->userdata('user_front_session')['cur_sel_address']==$v['id']){ ?>
                                  <div id="address_div">
                                    <p> <b><?php echo $v['landmark']; ?></b><br>
                                    <?php echo $v['address']; ?> , <?php echo $v['city']; ?> - <?php echo $v['state_name']; ?>  <?php echo $v['pincode']; ?>
                                    </p>
                                  </div>
                                <?php } } ?>
                              </div>
                            </div>
                            <div class="checkout-box-wrap">
                              <label id="chekout-box-2">
                              <input type="checkbox" name="diffrent_ship" id="diffrent_ship">
                              Ship to a different address?</label>
                              <div class="ship-box-info">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <p class="single-form-row">
                                      <label>Address <span class="required">*</span></label>
                                      <input type="text" name="address_extra" id="address_extra" value="<?php echo $address_extra; ?>">
                                      <?php echo '<div class="text-danger">'.form_error('address_extra').'</div>' ?>
                                    </p>
                                  </div>
                                  <div class="col-lg-12">
                                    <p class="single-form-row">
                                      <label>Landmark <span class="required">*</span></label>
                                      <input type="text" name="landmark_extra" id="landmark_extra" value="<?php echo $landmark_extra; ?>">
                                      <?php echo '<div class="text-danger">'.form_error('landmark_extra').'</div>' ?>
                                    </p>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="single-form-row">
                                      <label>Country <span class="required">*</span></label>
                                      <div class="nice-select wide">
                                       <input type="text" name="country_extra" value="India" readonly>
                                        <?php /*?><select id="country_extra" name="country_extra" onChange="get_states_extra(this.value);">
                                          
                                          <?php foreach ($country_list as $key => $v){ ?>
                                              <option <?php if($country_id==$v['id']){ echo "selected"; } ?> value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                                          <?php } ?>
                                        </select><?php */?>
                                        <?php echo '<div class="text-danger">'.form_error('country_extra').'</div>' ?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="single-form-row">
                                      <label>State <span class="required">*</span></label>
                                      <div class="nice-select wide">
                                        <select id="state_extra" name="state_extra" onChange="get_shiping_charge(this.value);">
                                          <option value="">Select</option>
                                        </select>
                                        <?php echo '<div class="text-danger">'.form_error('state_extra').'</div>' ?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <p class="single-form-row">
                                      <label>City <span class="required">*</span></label>
                                      <input type="text" name="city_extra" id="city_extra" value="<?php echo $city_extra; ?>">
                                      <?php echo '<div class="text-danger">'.form_error('city_extra').'</div>' ?>
                                    </p>
                                  </div>
                                  <div class="col-lg-6">
                                    <p class="single-form-row">
                                      <label>Pincode <span class="required">*</span></label>
                                      <input type="text" name="pincode_extra" id="pincode_extra" value="<?php echo $pincode_extra; ?>">
                                      <?php echo '<div class="text-danger">'.form_error('pincode_extra').'</div>' ?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="order-button-payment mb-4">
                                  <input type="submit" value="Submit" />
                                </div>
                            </div>
                          </div>                                                    
                      </div>
                      <?php } ?>
                   </form>
                </div>
              </div>

              <?php $total=0.00;  $total_pro = 0;
              foreach ($cart as $key => $v)
              {
                $total+=$v['subtotal'];
                $total_pro++;
              } ?>
              <div class="col-lg-6 col-md-6">
                <!-- your-order-wrapper start -->
                <div class="your-order-wrapper ms-lg-5">
                  <h3 class="shoping-checkboxt-title">Your Order</h3>
                  <!-- your-order-wrap start-->
                  <div class="your-order-wrap">
                    <!-- your-order-table start -->
                    <div class="your-order-table table-responsive">
                      <div class="cart-page-total mt-4">
                        <ul>
                          <?php $shipping_charge=0; ?>
                          <li>Total Products <span>( <?php echo $total_pro; ?> )</span></li>
                          <li>Amount<span>₹ <?php echo number_format($total,2); ?></span></li>

                          <?php if(is_login_user_front()){ 
                              $shipping_charge=get_shipping_by_state(); 

                              if($total>=$shipping_limit['shipping_limit'])
                              {
                                $shipping_charge=0;
                              }
                          } ?>
                          <li>Shipping Charge<span>₹&nbsp;<span id="shipping_charge"><?php echo number_format($shipping_charge,2); ?></span></span></li>
                          <li style="background-color:#e6f9f2">Sub Total<span>₹&nbsp;<span id="sub_total"><?php echo number_format($total+$shipping_charge,2); ?></span></span></li>

                          <?php 
                          $dis = 0.00; 
                          if($discount['discount'])
                          {
                              $dis = $total*$discount['discount']/100;
                              ?>
                              <li style="color:#009933">Discount<span>₹&nbsp;<span id="discount"><?php echo number_format($dis,2); ?></span></span></li>
                         <?php } ?>

                          
                          <li style="background-color:#e6f9f2">Total Amount Rs.<span>₹&nbsp;<span id="total_amount"><?php echo number_format($total+$shipping_charge-$dis,2); ?></span></span></li>
                        </ul><?php /* 
                        <div class="payment-method">
                          <div class="order-button-payment mb-4">
                            <input type="submit" value="Place order" />
                          </div>
                        </div><?php */ ?>
                      </div>
                    </div>
                    <!-- your-order-table end -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- checkout-details-wrapper end -->
        </div>
      </section>
	<?php $this->load->view('common/newsletter.php');?>
  <!-- Newsletter End -->
  <!-- Our Feature Section Start -->
	<?php $this->load->view('common/features.php');?>
  <!-- Our Feature Section End -->
</main>
	<?php $this->load->view('common/footer.php');?>
<!--  offcanvas Minicart Start -->
	<?php $this->load->view('common/cart.php');?>
<!--  offcanvas Minicart End -->
<!-- Quick View Modal Start -->
	<?php $this->load->view('common/quick_view_modal.php');?>
<!-- Login & Register Modal Start -->
	<?php $this->load->view('common/login_modal.php');?>
<!-- JS Vendor, Plugins & Activation Script Files -->
	<?php $this->load->view('common/footer_js.php');?>
</body>
</html>
<script type="text/javascript">

  $(document).ready(function() {
      <?php if($country_id){ ?>
          get_states('<?php echo $country_id; ?>','<?php echo $state; ?>');
          get_states_extra('<?php echo $country_id; ?>','<?php echo $state; ?>');
        <?php } ?>
  });

  $("#diffrent_ship").on("click",function(){

    if($('#diffrent_ship').is(':checked'))
    {
      $('#address_extra').prop('required',true);
      $('#landmark_extra').prop('required',true);
      $('#state_extra').prop('required',true);
      $('#city_extra').prop('required',true);
      $('#pincode_extra').prop('required',true);
    }else{
      $('#address_extra').removeAttr('required');
      $('#landmark_extra').removeAttr('required');
      $('#state_extra').removeAttr('required');
      $('#city_extra').removeAttr('required');
      $('#pincode_extra').removeAttr('required');
    }

  });
  
  function get_states(cid,sts=0)
  {
      if(cid)
      {
          $.ajax({  
               url:"<?php echo base_url(); ?>ajax/get_states",  
               method:"POST",  
               dataType:'JSON',
               data:{cid:cid,sts:sts},  
               success:function(data){  
                    $("#state").empty().append(data.sts_list);
               }  
          });  
      }else{
        $("#state").empty().append('<option value="">Select</option>');
      }
  }
  function get_shiping_charge(cid)
  {
      
      $.ajax({  
           url:"<?php echo base_url(); ?>ajax/get_shippin_by_state",  
           method:"POST",  
           dataType:'JSON',
           data:{cid:cid},  
           success:function(data){  
                $("#shipping_charge").html(data.shipping_charge);
                $("#discount").html(data.discount);
                $("#sub_total").html(data.sub_total);
                $("#total_amount").html(data.total_amount);
           }  
      });  
      
  }

  function get_states_extra(cid,sts=0)
  {
      if(cid)
      {
          $.ajax({  
               url:"<?php echo base_url(); ?>ajax/get_states",  
               method:"POST",  
               dataType:'JSON',
               data:{cid:cid,sts:sts},  
               success:function(data){  
                    $("#state_extra").empty().append(data.sts_list);
               }  
          });  
      }else{
        $("#state_extra").empty().append('<option value="">Select</option>');
      }
  }
  function set_seclected_address(cid)
  {
      if(cid)
      {
          $.ajax({  
               url:"<?php echo base_url(); ?>ajax/set_seclected_address",  
               method:"POST",  
               dataType:'JSON',
               data:{cid:cid},  
               success:function(d){  
                    $("#address_div").empty().html("<p> <b>"+d.address.landmark+"</b><br>"+d.address.address+" , "+d.address.city+" - "+d.address.state_name+" "+d.address.pincode+" </p>");
               }  
          });  
      }else{
        
      }
  }


</script>