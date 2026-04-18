<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo "404 Page Not Found. - ".FIRM_NAME ;  ?></title>
<meta name="description" content="<?php echo $SeoDetails['seodescription'];?>">
<meta name="keywords" content="<?php echo $SeoDetails['seokeywords'];?>">
<meta name="author" content="KD Bhindi Jewellers">
<meta property="og:title" content="<?php echo $SeoDetails['seotitle'];?> |  KD Bhindi Jewellers" />
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
            <h1 class="page-title">Error 404</h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item">Page Not Found</li>
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
      <div class="row d-flex justify-content-center p-5">
        <div class="col-lg-6 col-md-6">
          <div class="single-benner-image"> <img src="<?php echo  base_url(); ?>assest/frontend/images/404.png" alt=""> </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="error-404-page text-center">
            <h2 class="fw-bold mb-3">Oops! page can't be found.</h2>
            <p class="text">It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
            <a href="<?php echo base_url(); ?>" class="btn btn--primary">Back to Home</a> </div>
        </div>
      </div>
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