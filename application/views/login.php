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
<style type="text/css">
form p
{
	margin-bottom:1px;
}
</style>
</head>
<body>
<header class="header">
  <?php $this->load->view('common/header.php');?>
</header>
<main>
  <!-- Breadcrumb Start -->
  <section class="breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="breadcrumb-content">
            <h1 class="page-title">Login</h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item">Login / Registraion</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb End -->
  <!-- Page Section Content Start -->
  <section class="page-secton-wrapper section-space-ptb">
          <div class="container">	
                 <div class="row">
	                <?php $this->load->view('common/errors'); ?>
	             </div>
            <!-- checkout-details-wrapper start -->
            <div class="checkout-details-wrapper">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="billing-details-wrap">
                                  
                    
                      <h3 class="shoping-checkboxt-title">New Registration</h3>
                      <div class=" content-modal-box p-5 border">
	                      <form action="<?php echo base_url()."login/signup"; ?>" class="account-form-box" method="POST"  autocomplete="off">     
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
                            <input type="email" name="email"  id="email" required value="<?php echo $email; ?>" onChange="checkDuplicateEmail()">
                            <?php echo '<div class="text-danger">'.form_error('email').'</div>' ?>
                            <span class="text-danger" id="email_errormsg" style=""></span>
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
                        </div>


                        <div class="order-button-payment mb-4">
                              <input type="submit" value="Register Now" id="btn_submit" />
                        </div>
                      </div>                    
                   	  </form>	
                      </div>

    
                </div>
              </div>

              
              <div class="col-lg-6 col-md-6">
                <!-- your-order-wrapper start -->
                <div class="your-order-wrapper ms-lg-5">
                  <h3 class="shoping-checkboxt-title">Login Now</h3>
                  <!-- your-order-wrap start-->
                  <div class="your-order-wrap">
                    <!-- your-order-table start -->
                    
                      <div class=" content-modal-box p-5 border">
                        <form action="<?php echo base_url()."login"; ?>" method="POST" class="account-form-box"  autocomplete="off">
                            <p class="coupon-input form-row-first">
                              <label>Email Id <span class="required">*</span></label>
                              <input type="email" name="email">
                              <?php echo '<div class="text-danger mb-2">'.form_error('email').'</div>' ?>
                            </p>
                            <p class="coupon-input form-row-last">
                              <label>Password <span class="required">*</span></label>
                              <input type="password" name="password">
                              <?php echo '<div class="text-danger mb-2">'.form_error('password').'</div>' ?>
                            </p>
                            <div class="clear"></div>
                            <div class="row mb-5 mt-4">
                                <div class="col-md-4 mb-2">                            
                                  <button type="submit" class="button-login btn btn--primary btn--small" name="btn" value="Login">Login Now</button>
                                </div>  
                                <div class="col-md-8 mb-2" style="text-align:right">                            
	                              <a href="<?php echo base_url();?>forgot-password">Lost your password?</a> 
                                </div>  
                            </div>
                            
                          </form>
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
  <!-- Page Section Content End -->
  <!-- Newsletter Start-->
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
  function checkDuplicateEmail()
  {
     	var email = $("#email").val();		
   	    $.ajax({
          type:'POST',
          url:'<?php echo base_url(); ?>ajax/check_duplicate_email',
          data:{'email':email},
          dataType:'JSON',
          success:function(data)
          {
            if(data.error == 1)
            {            
              $("#email_errormsg").show();
              $("#email_errormsg").text('Error : Email already registred. Enter New Email Id.');
              $("#btn_submit").prop('disabled',true);
            }
            else
            {
              $("#email_errormsg").hide();
              $("#email_errormsg").text('');
              $("#btn_submit").prop('disabled',false);
      
            }
          },
        });
    }

  </script>