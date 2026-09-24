<?php
$SeoDetails = is_array($SeoDetails ?? null) ? $SeoDetails : array();
$seo_title = $SeoDetails['seotitle'] ?? '';
$seo_desc  = $SeoDetails['seodescription'] ?? '';
$seo_keys  = $SeoDetails['seokeywords'] ?? '';
$firm_name = defined('FIRM_NAME') ? FIRM_NAME : 'Venus Products';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo !empty($seo_title) ? ($seo_title . " | " . $firm_name) : $firm_name; ?></title>
<meta name="robots" content="noindex, follow" />
<meta name="description" content="<?php echo $seo_desc; ?>">
<meta name="keywords" content="<?php echo $seo_keys; ?>">
<meta name="author" content="<?php echo $firm_name; ?>">
<meta property="og:title" content="<?php echo !empty($seo_title) ? ($seo_title . " | " . $firm_name) : $firm_name; ?>" />
<meta property="og:description" content="<?php echo $seo_desc; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="<?php echo  base_url(); ?>assest/frontend/css/font-awesome.min.css" rel="stylesheet">
<?php $this->load->view('common/common_css.php');?>

</head>
<body>
<header class="header">
<?php $this->load->view('common/header.php');?>
</header>
<main>
  <!-- Slider Main Start -->
  <section class="hero-slider-one-active">
    <div class="single-hero-slider hero-slider-one"> <a href="javascript:void(0);" class="hero-slider-bg-image"> <img src="<?php echo  base_url(); ?>assest/frontend/images/slider/01.jpg" alt="Venus Products" title="Venus Products"> </a>
      <div class="row  d-flex justify-content-center">
        <div class="col-12">
          <div class="single-hero-slider-inner text-center">
            <h5 class="sub-title" style="color:#134d47">Welcome To</h5>
            <h1 class="title" style="color:#134d47">Venus Products<span>&#174;</span> </h1>
            <h5 class="sub-title" style="color:#134d47">Since 1987</h5>
            <h2 class="d-none d-md-block" style="color:#134d47;font-size:2.2rem;">100% Herbal Products</h2>
            <a class="slideshow-button" href="<?php echo base_url();?>our-products">shop now <i class="icon-rt-arrow-right-solid"></i></a> </div>
        </div>
      </div>
    </div>
    <?php foreach ($SliderDetails as $k => $sv){ ?>
        <div class="single-hero-slider hero-slider-one"> <a href="javascript:void(0);" class="hero-slider-bg-image"> <img src="<?php echo  base_url(); ?>uploads/slider/<?php echo $sv['image']; ?>" alt="Venus Products" title="Venus Products"> </a> 
          <?php /*?><div class="row  d-flex justify-content-center">
            <div class="col-12">
              <div class="single-hero-slider-inner text-center">
                <h5 class="sub-title" style="color:#134d47"><?php echo $sv['title']; ?></h5>
            </div>
          </div>
        </div><?php */?>
      </div>
    <?php } ?>
   
  </section>
  <!-- Slider Main End -->
  
  <!-- Category Start -->
	<?php $this->load->view('common/categories.php');?>  
  <!-- Category End -->
  
  <!--  About Us Start -->
  <section class="simple-about-us-section section-space-ptb-90">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="banner text-center"> <img src="<?php echo  base_url(); ?>assest/frontend/images/banners/about.jpg" alt=""> 
           <h5 class="pandemic-message">A GMP Certified Company</h5>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="simple-about-us-content mt-30">
            <div class="section-title-two text-center">
              <h3 class="sub-title">About Us</h3>
              <h2 class="section-title">Venus Products</h2>
            </div>
            <div class="single-about-inner-content">
              <h6 class="process-title">100% Herbal Products</h6>
              <p class="text" align="justify">At  Venus  Products  we honor  ourselves with our  supreme  ability  to  provide quality Ayurvedic products for our customers and clients. We only manufacture ayurvedic products that are approved by Fda and  manufactured  under the best techniques. With the help of our extremely qualified and skilled R&D team, we can provide an exclusive  range  of  ayurvedic products.  We  being  the  top  ayurvedic   products manufacturer in Gujarat  have a professional staff that helps us to offer the most effective, affordable, safest ayurvedic products.  Our top manufacturing  qualities make us the Best Ayurvedic Manufacturers in India.</p>
              <p class="text" align="justify">Venus Products offers  a  one-stop  solution to all those  who are  willing to take a shot at  entrepreneurship  in the arena of  healthcare. We firmly believe that  we should not only create job opportunities for our fellow Indians but also encourage entrepreneurship.  Our vision  is  to  make  all our  ayurvedic  products  accessible throughout the country and help as many people as possible.</p>
              <div class="">With the theme of Atmanirbharbharat, we stand affirm on two pillars:</div>
              <ul class="mypolicy">
                    <li>Swadeshi </li>
                    <li>Natural</li>
                </ul>
                <p class="text">Our commitment is to work towards the betterment of Human Life through the goodness of Ayurveda.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  About Us End -->
 
  <!-- New Arrivals Product Section Start -->
  <section class="product-item-section pb-5">
    <div class="container">
      <div class="row">
        <div class="col-12 position-relative">
          <div class="section-title-wrap">
            <h2 class="section-title"> New Arrivals </h2>
            <p></p>
          </div>
        </div>
      </div>
      <div class="product-slider-active product-border-box-two">
        <?php 
        $products_new = is_array($products_new ?? null) ? $products_new : array();
        foreach ($products_new as $key => $v) {
          $rating = get_product_rating($v['id']);
          $thumb_img = (!empty($v['images'][0]['image_name'])) ? $v['images'][0]['image_name'] : 'noimagethumb.jpg';
         ?>
        <div class="single-product-item">
          <div class="single-product-item-image"> <a href="<?php echo base_url()."product/".$v['cate_slug']."/".$v['slug']; ?>" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url().'uploads/product/thumbnails/'.$thumb_img; ?>" alt="<?php echo $v['name']; ?>"></a>
            <ul class="single-product-item-action">
              <li class="single-product-item-action-list"> 
                <a href="javascript:void(0);" onClick="FavoriteProducts(<?php echo $v['id']; ?>);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> 
              </li>
              <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal-<?php echo $v['id']; ?>" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
              <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url()."product/".$v['cate_slug']."/".$v['slug']; ?>" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
            </ul>
          </div>
          <div class="single-product-item-content">
            <div class="single-product-item-rating"> 
                    <?php for ($r=1; $r <=5; $r++) { 
                      if($rating['rating']>=$r)
                      {
                        echo '<i class="icon-rt-star-solid select-star"></i>';
                      }else{
                        echo '<i class="icon-rt-star-solid"></i> ';
                      }
                    ?>            
                    <?php } ?>
            </div>
            <h6 class="single-product-item-title"><a href="<?php echo base_url()."product/".$v['cate_slug']."/".$v['slug']; ?>"><?php echo $v['name']; ?></a></h6>
            <div class="single-product-item-price"> <?php echo $v['price_list'][0]['new_price']; ?> <?php /*- ?><s><?php echo $v['price_list'][0]['old_price']; ?></s> <?php */ ?></div>
          </div>
        </div>
        <?php 
        } ?>
      </div>
    </div>
  </section>
  <!-- New Arrivals Product Section End -->
 
  <!-- Banner Section Start -->
  <div class="banner-section n section-space-ptb-90" style="background-color:#f3fffa">
    <div class="container">
      <div class="row">
        <?php foreach (GenderDetails() as $tkey => $tv) { ?>
        <div class="col-lg-6 col-md-6">
          <div class="single-banner-area sm-mt-30">
            <div class="single-benner-image"> <img src="<?php echo base_url(); ?>uploads/trending/<?php echo $tv['image']; ?>" alt="Venus Products" title="Venus Products"> </div>
            <div class="banner-content">
              <h2 class="banner-title2 fw-semibold"><?php echo $tv['title']; ?></h2>
              <h2 class="banner-offer mt-3"> <?php echo $tv['category_name']; ?> </h2>
              <a href="javascript:void(0);" class="mt-4 btn btn--primary btn--small">Shop Now <i class="icon-rt-arrow-right-solid"></i></a> </div>
          </div>
        </div>
        <?php } /* ?>
        <div class="col-lg-6 col-md-6">
          <div class="single-banner-area sm-mt-30 tb-mt-30">
            <div class="single-benner-image"> <img src="<?php echo  base_url(); ?>assest/frontend/images/banners/2.jpg" alt=""> </div>
            <div class="banner-content">
              <h2 class="banner-title2 fw-semibold">Product Name Here</h2>
              <h2 class="banner-offer mt-3"> Oils and Ointments </h2>
              <a href="javascript:void(0);" class="mt-4 btn btn--primary btn--small">Shop Now <i class="icon-rt-arrow-right-solid"></i></a> </div>
          </div>
        </div> <?php */ ?>
      </div>
    </div>
  </div>
  <!-- Banner Section End -->
  
  <!-- Best Selling  Product Item   Section Start -->
  <section class="product-item-section pb-5 pt-5">
    <div class="container">
      <div class="row">
        <div class="col-12 position-relative">
          <div class="section-title-wrap">
            <h2 class="section-title"> Best Selling Products </h2>
            <p></p>
          </div>
        </div>
      </div>
      <div class="product-slider-active-grid product-border-box">
        <?php 
        $products_best = is_array($products_best ?? null) ? $products_best : array();
        foreach ($products_best as $key => $v) { 
          $rating = get_product_rating($v['id']); 
          $thumb_img = (!empty($v['images'][0]['image_name'])) ? $v['images'][0]['image_name'] : 'noimagethumb.jpg';
          $new_price = (!empty($v['price_list'][0]['new_price'])) ? $v['price_list'][0]['new_price'] : '';
        ?>
        <div class="single-product-item">
          <div class="single-product-item-image"> <a href="<?php echo base_url()."product/".$v['cate_slug']."/".$v['slug']; ?>" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url().'uploads/product/thumbnails/'.$thumb_img; ?>" alt="<?php echo $v['name']; ?>"></a>
            <ul class="single-product-item-action">
              <li class="single-product-item-action-list"> 
                <a href="javascript:void(0);" onClick="FavoriteProducts(<?php echo $v['id']; ?>);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> 
              </li>
              <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal-<?php echo $v['id']; ?>" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
              <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url()."product/".$v['cate_slug']."/".$v['slug']; ?>" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
            </ul>
          </div>
          <div class="single-product-item-content">
            <div class="single-product-item-rating"> 
              <?php for ($r=1; $r <=5; $r++) { 
                      if($rating['rating']>=$r)
                      {
                        echo '<i class="icon-rt-star-solid select-star"></i>';
                      }else{
                        echo '<i class="icon-rt-star-solid"></i> ';
                      }
                    ?>            
                    <?php } ?>
            </div>
            <h6 class="single-product-item-title"><a href="<?php echo base_url()."product/".$v['cate_slug']."/".$v['slug']; ?>"><?php echo $v['name']; ?></a></h6>
            <div class="single-product-item-price"> <?php echo $new_price; ?> <?php /*- ?><s><?php echo $v['price_list'][0]['old_price']; ?></s> <?php */ ?> </div>
          </div>
        </div>
        <?php 
        } ?>
      </div>
    </div>
  </section>
  <!-- Best Selling Product Item Section End -->
  
  <section class="latest-news-section section-space-pb">
    <div class="container">
      
      <div class="row">
                    <div class="col-12">
                        <div class="section-title-two position-relative text-center mb-30">
                            <h3 class="sub-title">Venus Products</h3>
                            <h2 class="section-title">
                                Product Manufacturing
                            </h2>
                        </div>
                    </div>
                </div>
      <div class="latest-blog-active">
        <!-- Latest Blog Card Start -->
        <div class="latest-blog-card">
          <div class="latest-blog-card-image"> <a href="<?php echo base_url(); ?>product-manufacturing"><img src="<?php echo  base_url(); ?>assest/frontend/images/machine/01.jpg" alt=""></a> </div>
          <div class="latest-blog-card-content text-start">
            <ul class="latest-blog-card-meta d-flex">
              <li class="post-date">Venus Products</li>
            </ul>
            <h4 class="latest-blog-card-title"><a href="<?php echo base_url(); ?>product-manufacturing">Capsule Filling Machine</a></h4>
          </div>
        </div>
        <!-- Latest Blog Card End -->
        <!-- Latest Blog Card Start -->
        <div class="latest-blog-card">
          <div class="latest-blog-card-image"> <a href="<?php echo base_url(); ?>product-manufacturing"><img src="<?php echo  base_url(); ?>assest/frontend/images/machine/02.jpg" alt=""></a> </div>
          <div class="latest-blog-card-content text-start">
            <ul class="latest-blog-card-meta d-flex">
              <li class="post-date">Venus Products</li>
            </ul>
            <h4 class="latest-blog-card-title"><a href="<?php echo base_url(); ?>product-manufacturing">Semi Automatic Liquid Filling Machine</a></h4>
          </div>
        </div>
        <!-- Latest Blog Card End -->
        <!-- Latest Blog Card Start -->
        <div class="latest-blog-card">
          <div class="latest-blog-card-image"> <a href="<?php echo base_url(); ?>product-manufacturing"><img src="<?php echo  base_url(); ?>assest/frontend/images/machine/03.jpg" alt=""></a> </div>
          <div class="latest-blog-card-content text-start">
            <ul class="latest-blog-card-meta d-flex">
              <li class="post-date">Venus Products</li>
            </ul>
            <h4 class="latest-blog-card-title"><a href="<?php echo base_url(); ?>product-manufacturing">Churna Mixing Machine</a></h4>
          </div>
        </div>
        <!-- Latest Blog Card End -->
        <!-- Latest Blog Card Start -->
        <div class="latest-blog-card">
          <div class="latest-blog-card-image"> <a href="<?php echo base_url(); ?>product-manufacturing"><img src="<?php echo  base_url(); ?>assest/frontend/images/machine/04.jpg" alt=""></a> </div>
          <div class="latest-blog-card-content text-start">
            <ul class="latest-blog-card-meta d-flex">
              <li class="post-date">Venus Products</li>
            </ul>
            <h4 class="latest-blog-card-title"><a href="<?php echo base_url(); ?>product-manufacturing">Automatic Liquid Filling Machine</a></h4>
          </div>
        </div>
        <!-- Latest Blog Card End -->
        <div class="latest-blog-card">
          <div class="latest-blog-card-image"> <a href="<?php echo base_url(); ?>product-manufacturing"><img src="<?php echo  base_url(); ?>assest/frontend/images/machine/05.jpg" alt=""></a> </div>
          <div class="latest-blog-card-content text-start">
            <ul class="latest-blog-card-meta d-flex">
              <li class="post-date">Venus Products</li>
            </ul>
            <h4 class="latest-blog-card-title"><a href="<?php echo base_url(); ?>product-manufacturing">Automatic Labelling Machine</a></h4>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  	<?php $this->load->view('common/third-party.php');?>

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
	<?php // $this->load->view('common/quick_view_modal.php');?>
    
<?php foreach ($products_new as $key => $v) {
  $pdetail['product'] = $v;
  $this->load->view('common/product-model.php',$pdetail);
} ?>

<?php foreach ($products_best as $key => $v) {
  $pdetail['product'] = $v;
  $this->load->view('common/product-model.php',$pdetail);
} ?>
    
<!-- Login & Register Modal Start -->
	<?php $this->load->view('common/login_modal.php');?>
<!-- JS Vendor, Plugins & Activation Script Files -->
	<?php $this->load->view('common/footer_js.php');?>
</body>
</html>