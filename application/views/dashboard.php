<?php $loginuser = getCustomerDetails($this->session->userdata('user_front_session')['id']); 

  $act_tab="dashboard";
  if($this->session->flashdata('active') && $this->session->flashdata('active')=="address")
  {
      $act_tab="address";
  }
  else if($this->session->flashdata('active') && $this->session->flashdata('active')=="password")
  {
      $act_tab="password";
  }
  else if($this->session->flashdata('active') && $this->session->flashdata('active')=="orders")
  {
      $act_tab="orders";
  }

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>
<?php if($SeoDetails['seotitle']!=""){ echo $SeoDetails['seotitle']." | ".FIRM_NAME; }else { echo FIRM_NAME; } ?>
</title>
<meta name="description" content="<?php echo $SeoDetails['seodescription'];?>">
<meta name="keywords" content="<?php echo $SeoDetails['seokeywords'];?>">
<meta name="author" content=" <?php echo FIRM_NAME ; ?>">
<meta property="og:title" content="<?php echo $SeoDetails['seotitle'];?> |   <?php echo FIRM_NAME ; ?>" />
<meta property="og:description" content="<?php echo $SeoDetails['seodescription'];?>" />
<?php $this->load->view('common/common_css');?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php $this->load->view('common/common_css.php');?>
<style>
.button {
	background-color: #009a5d; /* Green */
	border: none;
	color: white;
	padding: 5px 10px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 14px;
	margin: 2px;
	transition-duration: 0.4s;
	cursor: pointer;
}
.button1 {
	background-color: white;
	color: black;
	border: 1px solid #009a5d;
}
.button1:hover {
	background-color: #009a5d;
	color: white;
}
.button2 {
	background-color: white;
	color: black;
	border: 1px solid #008CBA;
}
.button2:hover {
	background-color: #008CBA;
	color: white;
}
.button3 {
	background-color: white;
	color: black;
	border: 1px solid #f44336;
}
.button3:hover {
	background-color: #f44336;
	color: white;
}
.button4 {
	background-color: white;
	color: black;
	border: 1px solid #e7e7e7;
}
.button4:hover {
	background-color: #e7e7e7;
}
.button5 {
	background-color: white;
	color: black;
	border: 1px solid #555555;
}
.button5:hover {
	background-color: #555555;
	color: white;
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
            <h1 class="page-title">My Account</h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item">My Account</li>
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
        <div class="col-12">
          <div class="account-dashboard">
            <?php $this->load->view('common/errors');?>
            <div class="dashboard-upper-info">
              <div class="row align-items-center no-gutters">
                <div class="col-lg-10 col-md-12">
                  <div class="d-single-info">
                    <p class="user-name">Hello <span><?php echo strtoupper($loginuser['name']); ?></span></p>
                   <?php /* <p><a href="#">Last Login : 26-Jan-2023 10:00 AM</a></p> */ ?>
                  </div>
                </div>
                <div class="col-lg-2 col-md-12">
                  <div class="d-single-info text-lg-center"> <a href="<?php echo base_url()."user/logout"; ?>" class="view-cart btn btn--primary">Logout</a> </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-lg-2">
                <!-- Nav tabs -->
                <ul role="tablist" class="nav flex-column dashboard-list" style="border:1px solid #ebebeb;">
                  <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link <?php if($act_tab=="dashboard"){ echo "active"; } ?>">Dashboard</a></li>
                  <li> <a href="#orders" data-bs-toggle="tab" class="nav-link <?php if($act_tab=="orders"){ echo "active"; } ?>">Orders</a></li>
                  <li><a href="#downloads" data-bs-toggle="tab" class="nav-link">Wishlist</a></li>
                  <li><a href="#address" data-bs-toggle="tab" class="nav-link <?php if($act_tab=="address"){ echo "active"; } ?>">Addresses</a></li>
                  <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Account details</a></li>
                  <li><a href="#password" data-bs-toggle="tab" class="nav-link <?php if($act_tab=="password"){ echo "active"; } ?>">Change Password</a></li>
                  <li><a href="<?php echo base_url()."user/logout"; ?>" class="nav-link">logout</a></li>
                </ul>
              </div>
              <div class="col-md-12 col-lg-10">
                <!-- Tab panes -->
                <div class="tab-content dashboard-content">
                  <div class="tab-pane <?php if($act_tab=="dashboard"){ echo "active"; } ?>" id="dashboard">
                    <h3 class="myheading">Dashboard </h3>
                    <p> Welcome , <span><?php echo strtoupper($loginuser['name']); ?> 
                    <br> 
                    <?php /* From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a> */ ?>
                    <div class="coupon2 text-center"> <a href="<?php echo base_url();?>our-products" class="btn btn-sm btn--primary continue-btn ms-2">Continue Shopping</a> </div>
                    </p>
                  </div>
                  <div class="tab-pane fade <?php if($act_tab=="orders"){ echo "active"; } ?>" id="orders">
                    <h3  class="myheading">Orders</h3>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Order No</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
            						  if(!empty($order_list)) { 
            						  $i=1;
            						  foreach($order_list as $key => $v) { 
            						  $mylink = base_url()."dashboard/order/".md5($v['order_id']); 
            						  ?>
                          <tr>
                            <td><?php echo $i; $i++ ; ?></td>
                            <td><?php echo $v['order_id']  ; ?></td>
                            <td><?php echo date('M d, Y',strtotime($v['oreder_date'])) ; ?></td>
                            <td><?php if($v['paid_status']==1){ echo "Paid"; }else{ echo "Failed"; } ?></td>
                            <td><?php echo $v['final_total']  ; ?></td>
                            <td><a href="<?php echo $mylink ; ?>" target="_blank" class="view btn btn--primary">view</a></td>
                          </tr>
                          <?php } } else { ?>
                          <tr>
                            <td colspan="6">No order found.</td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="downloads">
                    <h3 class="myheading">Wishlist</h3>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 												 
            						//	echo "<pre>"; print_r($FavoriteProductDetails); 
            							if(!empty($FavoriteProductDetails)) {
            								foreach($FavoriteProductDetails as $tckey=>$tcval){ ?>
                          <tr id="favoriteproducts<?php echo $tcval['id']; ?>">
                            <td><img src="<?php echo base_url(); ?>uploads/product/thumbnails/<?php echo $tcval['image_name'];?>" height="50" width="auto" alt=""></td>
                            <td><?php echo $tcval['collectionname'];?> - <?php echo $tcval['pname'];?></td>
                            <td><a href="<?php echo base_url()."product/".$tcval['cate_slug']."/".$tcval['pslug']; ?>" class="button button1">View</a> 
                              <a href="javascript:;" onClick="FavoriteProductsRemove('<?php echo $tcval['id']; ?>');" class="button button3">Remove</a> </td>
                          </tr>
                          <?php } } else {  ?>
                          <tr>
                            <td colspan="3">No data found.</td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane <?php if($act_tab=="address"){ echo "active"; } ?>" id="address">
                    <h3  class="myheading">Billing Address</h3>
                    <div class="row">
                      <?php                          
                          if(!empty($user_address)) {
                            foreach($user_address as $akey=>$av){ ?>
                                <div class="col-lg-6 mb-5">
                                  <address>
                                  <p><strong><?php echo $av['landmark']; ?></strong></p>
                                  <p><?php echo $av['address']; ?> <br>
                                    <?php echo $av['city']." ".$av['pincode']."<br>";
                                     echo $av['state_name']." ".$av['country_name']."<br>";
                                 // echo "Mobile: ". $av['mo_number']; ?></p>
                                  </address>
                                  <a href="javascript:;" data-toggle="modal" data-target="#exampleModal<?php echo $av['id']; ?>" class="view-cart btn btn--primary" style="padding:5px 10px;"> Edit Address</a> 
                                </div>


                                
                                <div class="modal fade" id="exampleModal<?php echo $av['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="<?php echo base_url()."dashboard/upaddress" ?>">
                                        <input type="hidden" name="address_id" value="<?php echo $av['id']; ?>">
                                      <div class="modal-body">
                                        
                                          
                                            <div class="row">
                                              <div class="col-lg-12">
                                                <p class="single-form-row">
                                                  <label>Address <span class="required">*</span></label>
                                                  <input type="text" name="address_extra" id="address_extra" value="<?php echo $av['address']; ?>" required>
                                                  <?php echo '<div class="text-danger">'.form_error('address_extra').'</div>' ?>
                                                </p>
                                              </div>
                                              <div class="col-lg-12">
                                                <p class="single-form-row">
                                                  <label>Landmark <span class="required">*</span></label>
                                                  <input type="text" name="landmark_extra" id="landmark_extra" value="<?php echo $av['landmark']; ?>" required>
                                                  <?php echo '<div class="text-danger">'.form_error('landmark_extra').'</div>' ?>
                                                </p>
                                              </div>
                                              <div class="col-lg-6">
                                                <div class="single-form-row">
                                                  <label>Country <span class="required">*</span></label>
                                                  <div class="nice-select wide">
                                                   <input type="text" name="country_extra" value="India" readonly>
                                                    <?php echo '<div class="text-danger">'.form_error('country_extra').'</div>' ?>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-lg-6">
                                                <div class="single-form-row">
                                                  <label>State <span class="required">*</span></label>
                                                  <div class="nice-select wide">
                                                    <select id="state_extra" name="state_extra" required>
                                                      <option value="">Select</option>
                                                      <?php foreach ($state_list as $sk => $ssv){ ?>
                                                          <option <?php if($av['state']==$ssv['id']){ echo "selected"; } ?> value="<?php echo $ssv['id']; ?>"><?php echo $ssv['name']; ?></option>
                                                      <?php } ?>
                                                    </select>
                                                    <?php echo '<div class="text-danger">'.form_error('state_extra').'</div>' ?>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-lg-6">
                                                <p class="single-form-row">
                                                  <label>City <span class="required">*</span></label>
                                                  <input type="text" name="city_extra" id="city_extra" value="<?php echo $av['city']; ?>" required>
                                                  <?php echo '<div class="text-danger">'.form_error('city_extra').'</div>' ?>
                                                </p>
                                              </div>
                                              <div class="col-lg-6">
                                                <p class="single-form-row">
                                                  <label>Pincode <span class="required">*</span></label>
                                                  <input type="text" name="pincode_extra" id="pincode_extra" value="<?php echo $av['pincode']; ?>" required>
                                                  <?php echo '<div class="text-danger">'.form_error('pincode_extra').'</div>' ?>
                                                </p>
                                              </div>
                                          </div>
                                        
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>



                          <?php } } else {  ?>
                              <div class="col-lg-6 mb-5">
                                <address>
                                <p><strong>No Address Found</strong></p>
                                </address>
                              </div>
                          <?php } ?>                                           
                    </div>
                  </div>
                  <div class="tab-pane fade" id="account-details">
                    <h3  class="myheading">Account details </h3>
                    <div class="login">
                      <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th>Full Name</th>
                            <td><?php echo $loginuser['name']." ".$loginuser['surname']; ?></td>
                          </tr>
                          <tr>
                            <th>Address </th>
                            <td><?php echo $loginuser['address_1'] ; ?></td>
                          </tr>
                        <?php /*?>  <tr>
                            <th>Landmark </th>
                            <td><?php echo $loginuser['landmark'] ; ?></td>
                          </tr><?php */?>
                          <tr>
                            <th>Country </th>
                            <td><?php echo $loginuser['country_name'] ; ?></td>
                          </tr>
                          <tr>
                            <th>State </th>
                            <td><?php echo $loginuser['state_name'] ; ?></td>
                          </tr>
                          <tr>
                            <th>City </th>
                            <td><?php echo $loginuser['city']." / ".$loginuser['pincode']; ; ?></td>
                          </tr>
                          <tr>
                            <th>Mobile No </th>
                            <td><?php echo $loginuser['mo_number']; ; ?></td>
                          </tr>
                          <tr>
                            <th>Email </th>
                            <td><?php echo $loginuser['email']; ; ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade <?php if($act_tab=="password"){ echo "active"; } ?>" id="password">
                    <h3  class="myheading">Change Password </h3>
                    <div class="login">
                      <div class="login-form-container">
                        <div class="account-login-form">
                          <form action="<?php echo base_url();?>profile/change-password" method="POST"  autocomplete="off">
                            <div class="row d-flex justify-content-center">
                              <div class="col-lg-6 single-form-row">
                                <div class="form-group row mb-2">
                                  <label for="staticEmail" class="col-sm-4 col-form-label">Current Password</label>
                                  <div class="col-sm-8">
                                    <input type="text" name="oldpassword" class="form-control-plaintext" id="oldpassword" value="">
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label for="staticEmail" class="col-sm-4 col-form-label">New Password</label>
                                  <div class="col-sm-8">
                                    <input type="text" name="password" class="form-control-plaintext" id=""password value="">
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label for="staticEmail" class="col-sm-4 col-form-label">Confirm Password</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext" name="confirm_password" id="confirm_password" value="">
                                  </div>
                                </div>
                                <div class="order-button-payment mb-4">
                                  <input type="submit" value="Update Password">
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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

$(".qtybutton").on("click", function() {
    var $button = $(this);
    var qty = $button.parent().find("input").val();
    var rowid = $(this).closest('tr').find("input[name='product_id[]']").val();
    update_to_cart(rowid,qty);
});

function update_to_cart(rowid="",qty="")
{
    if(qty>0)
    {
        $.ajax({  
          url:APP_URL+"cart/update_to_cart",  
          method:"POST",  
          dataType:"JSON",
          data:{qty:qty,rowid:rowid},  
          success:function(data){  
            if(data.error==0)
            {
                $("#"+rowid).html("₹ "+data.product.subtotal);
                $("#total_amt").html("₹ "+data.finaltotal);
                get_cart_content(1);
            }
          }
        });  
    }
 } 

function check_confirm_remove(rid)
  {
    swal({
          title: "Remove from Cart",
          text: 'Are You Sure Remove this Product ?',
          icon: "error",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            if(rid!="")
            {
                swal("Product removed successfully from cart.");
                $.ajax({  
                  url:APP_URL+"cart/remove_from_cart",  
                  method:"POST",  
                  dataType:"JSON",
                  data:{rid:rid},  
                  success:function(data){  
                    if(data.error==0)
                    {
                        location.reload();
                    }
                  }
                });  
            }
          } else {
            //swal("Your imaginary file is safe!");
          }
        })
  }
</script>