<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>
<?php if($SeoDetails['seotitle']!=""){ echo $SeoDetails['seotitle']." | ".FIRM_NAME; }else { echo "Privacy Policy - " .FIRM_NAME; } ?>
</title>
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
            <h1 class="page-title">Privacy Policy</h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item">Privacy Policy</li>
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
                            <h2 class="title fw-bold mb-2">Who we are</h2>
                            <p class="text">Our website address is: https://venusproducts.in</p>
                            <p class="text"align="justify">This privacy policy is an electronic record in the form of an electronic contract formed under the information technology act, 2000 and the rules made there under and the amended provisions pertaining to electronic documents / records in various statutes as amended by the information technology act, 2000. This privacy policy does not require any physical, electronic or digital signature.
Venus Products company and its affiliates and Associate Companies is/are concerned about the privacy of the data and information of users (including sellers and buyers/customers whether registered or non-registered), offering, selling or purchasing products or services on websites, mobile sites or mobile applications (“Website”) on the Website and otherwise doing business with us. “Associate Companies” here shall have the same meaning as ascribed in Companies Act, 2013.
This Privacy Policy is a contract between you and the respective entity whose website you use or access or you otherwise deal with. This Privacy Policy shall be read together with the respective Terms Of Use or other terms and condition of the respective entity and its respective website or nature of business of the Website.</p>
                            
							<h2 class="fw-bold mb-2">Collection of Personally Identifiable Information</h2>
                            <p class="text" align="justify">We (venusproducts.in) view protection of your privacy as a very important principle. We understand clearly that You and your personal information is one of our most important assets.
We collect information from you when you place an order or subscribe to our website. When ordering or registering on our site, as appropriate, you may be asked to enter your: name, e-mail address, mailing address, phone number or credit card information.
Our primary goal in doing so is to provide you a safe, efficient, smooth and customized experience.
The information we learn from customers helps us personalize and continually improve your experience of shopping from our web store.</p>
                            
                            <h2 class="fw-bold mb-2">Comments</h2>
                            <p class="text" align="justify">When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.</p>
                            
                            <h2 class="fw-bold mb-2">Cookies</h2>
                            <p class="text">Yes, Cookies are small files that a site or its service provider transfers to your computer’s hard drive through your Web browser (if you allow it) that enables the sites or service providers systems to recognize your browser and capture and remember certain information. We use cookies to help us remember and process the items in your shopping cart. The cookies do not contain any of your personally identifiable information.
</p>

                            <h2 class="fw-bold mb-2">Sharing of personal information</h2>
                            <p class="text" align="justify">Your providing the Information to Venus Products company and it's consequent storage, collection, usage, transfer, access or processing of the same shall not be in violation of any third party agreement, laws, charter documents, judgments, orders and decrees.</p>
                            <p class="text" align="justify">We may disclose personal information if required to do so by law or in the good faith belief that such disclosure is reasonably necessary to respond to subpoenas, court orders, or other legal process.
</p>

                            <h2 class="fw-bold mb-2">Your Approval</h2>
                            <p class="text" align="justify">By using the Website and/ or by providing your information, you consent to the collection and use of the information you disclose on the Website in accordance with this Privacy Policy. If we decide to change our privacy policy, we will post those changes on this page. </p>

                            <h2 class="fw-bold mb-2">Contact Us</h2>
                            <p class="text mb-5">If there are any questions regarding this privacy policy you may contact us. </p>
                           

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
