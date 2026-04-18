<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>
<?php if($SeoDetails['seotitle']!=""){ echo $SeoDetails['seotitle']." | ".FIRM_NAME; }else { echo "Shipping Policy - " .FIRM_NAME; } ?>
</title>
<meta name="description" content="<?php echo $SeoDetails['seodescription'];?>">
<meta name="keywords" content="<?php echo $SeoDetails['seokeywords'];?>">
<meta name="author" content="KD Bhindi Jewellers">
<meta property="og:title" content="<?php echo $SeoDetails['seotitle'];?> |  KD Bhindi Jewellers" />
<meta property="og:description" content="<?php echo $SeoDetails['seodescription'];?>" />
<?php $this->load->view('common/common_css');?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php $this->load->view('common/common_css.php');?>
<link href="<?php echo  base_url(); ?>assest/frontend/css/font-awesome.min.css" rel="stylesheet">
<style>
.mypolicy,  li {
	margin: 0;
	padding: 0;
}
.mypolicy {
	display: table;
}
.mypolicy li {
	list-style: none;
	line-height:38px;
	display: table-row;
}
.mypolicy li:before {
	content: "\f046"; /* FontAwesome Unicode */
	font-family: FontAwesome;
	color: #009a5d;
	font-size: 18px;
	display: table-cell;
	text-align: right;
	padding-right: 1em;
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
            <h1 class="page-title">Shipping Policy</h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item">Shipping Policy</li>
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
        <div class="col-lg-12">
          <div class="privacy-policy-content">
            <h2 class="title fw-bold mb-2">Shipping Policy</h2>
            <ul class="mypolicy mb-4">
              <li>Will normally be effected within 3 to 5 working days from the date of credit in our bank account and will be subject to availability of stocks. </li>
            </ul>
            <h2 class="title fw-bold mb-2">Delivery</h2>
            <ul class="mypolicy mb-5">
              <li>Usually it will take 4 working days only.</li>
              <li>Delivery time Minimum is 4 days and Maximum 15 days. </li>
              <li>Delivery Time Depend on Your location (Delivery address) ,if Your location (Delivery address) is near to our operating location , Delivery within in 4 days and  if Your location (Delivery address) is far to our operating location Delivery  in max 15 days.</li>
              <li>Venus Products company will not be responsible for non-delivery due to short payment or defects in payment instrument. Delivery will be affected by using third party established courier services. Venus Products company will not be held responsible for any late delivery, or acts beyond its control. </li>
            </ul>
          </div>
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
