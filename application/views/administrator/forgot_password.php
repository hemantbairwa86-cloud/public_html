<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo FIRM_NAME ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo  base_url(); ?>assest/administrator/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>assest/administrator/vendors/iconfonts/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>assest/administrator/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>assest/administrator/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo  base_url(); ?>assest/administrator/css/style.css">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>assest/administrator/css/custom-theme.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo  base_url(); ?>assest/administrator/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth auth-theme-bg">
        <div class="row w-100">
          <div class="col-lg-5 col-md-7 mx-auto">
            <div class="auth-form-emerald text-left p-5">
              <h2 class="text-center mb-1" style="font-weight:800;font-size:2.2rem;color:#184d47">Reset Password</h2>
              <p class="text-center mb-4" style="color:#64748b;">Enter your email to receive a password reset link</p>
              
              <?php $this->load->view('administrator/common/errors');?> 
              <form id="loginform" class="pt-2" action="<?php echo base_url(); ?>administrator/home/reset_link" method="post"  autocomplete="off">
                <div class="form-group mb-4">
                  <label for="exampleInputEmail1">Email Address</label>
                  <input type="email" class="form-control" name="identity" id="identity" placeholder="Enter your registered email" style="padding:12px 14px;" required>
                  <?php echo '<div id="error_message" class="text-danger small mt-1">'. form_error('identity').'</div>' ?>
                </div>
                
                <div class="mt-4">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-bold" style="padding:12px;font-size:1rem;"> Send Reset Link</button>
                </div>
                <div class="mt-4 text-center">
                 <p style="color:#4a5568;">Remember your password? <a href="<?php echo base_url(); ?>administrator/home" class="auth-link" style="color:#179957;font-weight:700;text-decoration:none;">Login Now</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo  base_url(); ?>assest/administrator/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo  base_url(); ?>assest/administrator/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo  base_url(); ?>assest/administrator/js/off-canvas.js"></script>
  <script src="<?php echo  base_url(); ?>assest/administrator/js/hoverable-collapse.js"></script>
  <script src="<?php echo  base_url(); ?>assest/administrator/js/misc.js"></script>
  <script src="<?php echo  base_url(); ?>assest/administrator/js/settings.js"></script>
  <script src="<?php echo  base_url(); ?>assest/administrator/js/todolist.js"></script>
  <!-- endinject -->
</body>
</html>
