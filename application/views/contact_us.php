<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php if($SeoDetails['seotitle']!=""){ echo $SeoDetails['seotitle']." | ".FIRM_NAME; }else { echo FIRM_NAME; } ?></title>
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
                            <h1 class="page-title">Contact Us</h1>
                            <ul class="breadcrumb-page-list">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb-item">Contact Us</li>
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
                    <div class="col-lg-4"  style="margin-bottom:30px;">
                        <div class="contact-us-area">
                            <h2 class="fw-bold mb-3">Contact Us</h2>                           
                            <h2 class="fw-bold mb-3"><span class="text-primary">GMP Certified</span> Company</h2>
                            <ul class="mt-5">
                                <li class="contact-feature-item">
                                    <div class="contact-feature-icon">
                                        <i class="icon-rt-location-pin"></i>
                                    </div>
                                    <div class="contact-feature-content">
                                        <h5 class="contact-feature-title fw-bold mb-1">
                                            Office Location
                                        </h5>
                                        <p class="text"><?php echo FIRM_NAME ; ?><br /><?php echo FIRM_ADDRESS ; ?></p>
                                    </div>
                                </li>
                                <li class="contact-feature-item">
                                    <div class="contact-feature-icon feature-icon-2">
                                        <i class="icon-rt-phone-volume-solid"></i>
                                    </div>
                                    <div class="contact-feature-content">
                                        <h5 class="contact-feature-title fw-bold mb-1">
                                            Call us anytime
                                        </h5>
                                        <p class="text"><?php echo FIRM_MOBILE ; ?>
                                            <?php // echo "<br>".FIRM_CONTACT ; ?></p>
                                    </div>
                                </li>
                                <li class="contact-feature-item">
                                    <div class="contact-feature-icon feature-icon-3">
                                        <i class="icon-rt-mail-outline"></i>
                                    </div>
                                    <div class="contact-feature-content">
                                        <h5 class="contact-feature-title fw-bold mb-1">
                                            Send Mail
                                        </h5>
                                        <p class="text">
                                            <a href="javascript:void(0);"> <?php echo FIRM_EMAIL ; ?></a>                                             
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="contact-us-form-wrap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3710.6311073230336!2d70.4682150757634!3d21.56127498022472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3958024ee8613189%3A0x43151da0f9b8802f!2sVenus%20Products!5e0!3m2!1sen!2sin!4v1684130179929!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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