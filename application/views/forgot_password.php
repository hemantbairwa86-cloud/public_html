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
            <h1 class="page-title">Forgot Passwrod</h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item">Forgot Passwrod</li>
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
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 col-md-6">
            <!-- your-order-wrapper start -->
            <div class="your-order-wrapper ms-lg-5 pb-5">
              <h3 class="shoping-checkboxt-title">Reset Password</h3>
              <!-- your-order-wrap start-->
              <div class="your-order-wrap">
                <!-- your-order-table start -->
                <div class=" content-modal-box p-5 border">
                  <form id="loginform" class="account-form-box" action="<?php echo base_url(); ?>reset-password" method="post"  autocomplete="off">
                    <p class="coupon-input form-row-first">
                      <label>Enter Registered email <span class="required">*</span></label>
                      <input type="email" name="email" placeholder="" required>
                      <?php echo '<div class="text-danger">'.form_error('email').'</div>' ?> </p>
                    <div class="clear"></div>
                    <div class="row ">
                      <div class="col-md-6 mb-2">
                        <button type="submit" class="button-login btn btn--primary btn--small" name="login" value="Login">Reset Password</button>
                      </div>
                      <div class="col-md-6 mb-2" style="text-align:right"> <a href="<?php echo base_url();?>login">Login Now</a> </div>
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