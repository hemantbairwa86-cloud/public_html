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
<link href="<?php echo  base_url(); ?>assest/frontend/css/font-awesome.min.css" rel="stylesheet">
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
            <h1 class="page-title">Third Party Manufacturing</h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item">Third Party Manufacturing </li>
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
        <div class="col-md-9 mx-auto">
          <div class="title text-center">
            <h2 class="fw-bold mb-3">100% <span class="text-primary">Herbal Products</span></h2>
            <p align="justify" >We "Venus Products" are a Sole Proprietorship Firm, instrumental in manufacturing and wholesaling a comprehensive assortment of Herbal Hair Products, Ayurvedic Syrup, Ayurvedic Tablet, Ayurvedic Churna and much more. We are manufacturer of wide range of herbal products. we have a Herbal products client base all across India &amp; also exporting to few countries. </p>
          </div>
        </div>
        <?php /*?><div class="col-12">
                        <div class="image mt-5">
                            <img src="assets/images/others/img_about-2048x1400.jpg" alt="">
                        </div>
                    </div><?php */ //echo "<pre>"; print_r($counter) ; 
					?>
        <div class="col-md-8 mx-auto">
          <div class="about-us-content mt-5">
            <h2 class="fw-bold mb-4">About Us</h2>
            <div class="col-sm-12 col-md-12"><h2 class="fw-bold mb-3"><?php echo FIRM_NAME ; ?> <span class="text-primary">GMP Certified</span> Company</h2></div>
            <p  align="justify">We, Venus Products, have forayed into Pharmaceutical Industry with a noble vision of serving mankind with highly effective Herbal Ayurvedic Medicines. As an eminent Manufacturer, Exporter and Supplier of Ayurvedic Herbal Products, we strive to put lives of human race on the healthy track. The products such as Herbal Hair Growth Products, Arthritis Oil &amp; Capsule, Cough Syrup, Urinary Stone Syrup, Liver Tonic, Family Health Tonic and Capsule, Gastritis Syrup &amp; Capsule and Piles Capsule and many more products are formulated with accurate composition of respective ingredients. Moreover, the aforementioned medicines goes through stringent quality testing, which determines their productive worth in terms of effectiveness, purity and safety. Most importantly, the organization put strong efforts in research and development, and keep on updating the product range based on the guidelines of prevailing market trends.</p>
            <p  align="justify">Our products conform to allopathic protocols of drug development – from toxicity and stability studies to phase I to phase iv clinical studies. Each product undergoes an average of six to eight years of research, which includes several clinical studies at leading hospitals.  </p>
            <p  align="justify">Established in the year, 1987, we have continuing the hard work, facing all the market challenges with result bound solutions. We adhere to updated work methodologies and accomplish each assigned project with strategic planning’s and holistic approaches. There is a team of experienced scientific expert, who works along-with quality analyst and other support staffs, carrying the respective business responsibilities with utmost perfection. Apart from this, the company always stay connected to clients and make sure to serve them in an ethical, transparent and cost-effective way. We always believe in Quality.</p>            
          </div>
          <div class="single-item mt-5">
            <div class="row">
              <div class="col-sm-4 col-md-3">
                <h2 class="fw-semibold">Our Vision</h2>
              </div>
              <div class="col-sm-8 col-md-9">
                <p  align="justify">At  Venus  Products  we honor  ourselves with our  supreme  ability  to  provide quality Ayurvedic products for our customers and clients. We only manufacture ayurvedic products that are approved by Fda and  manufactured  under the best techniques. With the help of our extremely qualified and skilled R&D team, we can provide an exclusive  range  of  ayurvedic products.  We  being  the  top  ayurvedic   products manufacturer in Gujarat  have a professional staff that helps us to offer the most effective, affordable, safest ayurvedic products.  Our top manufacturing  qualities make us the Best Ayurvedic Manufacturers in India.</p>
              </div>
            </div>
          </div>
          <div class="single-item mt-5">
            <div class="row">
              <div class="col-sm-4 col-md-3">
                <h2 class="fw-semibold">Our Mission</h2>
              </div>
              <div class="col-sm-8 col-md-9">
                 <p  align="justify">Venus Products offers  a  one-stop  solution to all those  who are  willing to take a shot at  entrepreneurship  in the arena of  healthcare. We firmly believe that  we should not only create job opportunities for our fellow Indians but also encourage entrepreneurship.  Our vision  is  to  make  all our  ayurvedic  products  accessible throughout the country and help as many people as possible.</p>
              <div class="">With the theme of Atmanirbharbharat, we stand affirm on two pillars:</div>
              <ul class="mypolicy">
                    <li>Swadeshi </li>
                    <li>Natural</li>
                </ul>
                <p >Our commitment is to work towards the betterment of Human Life through the goodness of Ayurveda.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
            
      <!-- fun fact Wrapper Start -->
      <div class="fun-fact-wrapper bg-secondary section-space-ptb mt-5">
        <div class="container">
          <div class="row d-flex justify-content-between">
            <div class="col-lg-3 col-sm-6">
              <div class="fun-fact"> <i class="icon-rt-heart2"></i>
                <div class="fun-fact__contnt">
                  <h6 class="fun-fact__count counter"><?php echo $counter[0]['value'] ; ?></h6>
                  <p class="fun-fact__text">Satisfied Clients</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="fun-fact"> <i class="icon-rt-rocket-outline"></i>
                <div class="fun-fact__contnt">
                  <h6 class="fun-fact__count counter"><?php echo $counter[1]['value'] ; ?></h6>
                  <p class="fun-fact__text">Total Products</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="fun-fact"> <i class="icon-rt-ribbon-outline"></i>
                <div class="fun-fact__contnt">
                  <h6 class="fun-fact__count counter"><?php echo $counter[2]['value'] ; ?></h6>
                  <p class="fun-fact__text">Manufacturing</p>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-sm-6">
              <div class="fun-fact"> <i class="icon-rt-globe-alt"></i>
                <div class="fun-fact__contnt">
                  <h6 class="fun-fact__count counter"><?php echo $counter[3]['value'] ; ?></h6>
                  <p class="fun-fact__text">Cities cover</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- fun fact Wrapper End -->
      <!-- Team Member Start -->
      <!-- Team Member End -->
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