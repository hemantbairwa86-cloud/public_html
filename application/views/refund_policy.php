<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>
<?php if($SeoDetails['seotitle']!=""){ echo $SeoDetails['seotitle']." | ".FIRM_NAME; }else { echo "Refund Policy - " .FIRM_NAME; } ?>
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
            <h1 class="page-title">Refund Policy</h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item">Refund Policy</li>
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
            <h2 class="title fw-bold mb-2">Refund Policy</h2>
            <ul class="mypolicy mb-5">
              <li><b>Refunds / Returns shall NOT be allowed in the following cases:</b></li>
              <li>Due to COVID-19 situation there are no any kind of Refunds / Returns Policies. Customer buy products online as per requirement. If you order via Online, any purchased Products are non-refundable.</li>
              <li>Return request is made outside the specified time frame of 5 (Five) days as specified above.</li>
              <li>In case where price tags, labels, original packing, freebies and accessories, box are missing.</li>
              <li><b>Note.</b> Return product’s all responsibility taken by customer in case product not reached to our proper location customer will not get any refund.</li>
              <li>Kindly return product with good courier.</li>
              <li>Delivery Charges Paid by customer was not refunded in any case.</li>
              <li>If the Product is damaged by the customer, in any manner as may be determined by www.venusproducts.com at its sole discretion.</li>
              <li>If Product has been used by the customer.</li>
              <li>If Product sold as combo/sets cannot be returned as individual Product.</li>
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
