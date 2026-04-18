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
            <h1 class="page-title">Venus Products</h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0);">Our Products</a></li>
              <li class="breadcrumb-item">Venus Products</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb End -->
  <!-- Page Section Content Start -->
  <section class="page-secton-wrapper section-space-pb">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-12 sidebar widget-area-side left-sidebar order-2 order-lg-1">
          <div class="shop-widget">
            <h5 class="widget-title"> Product categories </h5>
            <ul class="product-categorie">
              <li class="product-categorie-item"><a href="#">Oils and Ointments</a></li>
              <li class="product-categorie-item"><a href="#">Syrups</a></li>
              <li class="product-categorie-item"><a href="#">Capsules</a></li>
              <li class="product-categorie-item"><a href="#">Churans </a></li>
              <li class="product-categorie-item"><a href="#">Tablets </a></li>
            </ul>
          </div>
          <div class="shop-widget">
            <h5 class="widget-title"> Filter By Price </h5>
            <!-- filter-price-content Start -->
            <div class="filter-price-content">
              <form action="#" method="post">
                <div id="price-slider" class="price-slider"></div>
                <div class="filter-price-wapper">
                  <div class="filter-price-cont"> <span>Price Rs. </span>
                    <div class="input-type">
                      <input type="text" id="min-price" readonly="" />
                    </div>
                    <span>—</span>
                    <div class="input-type">
                      <input type="text" id="max-price" readonly="" />
                    </div>
                  </div>
                  <a class="add-to-cart-button" href="#"> <span>Filter</span> </a> </div>
              </form>
            </div>
            <!-- filter-price-content end -->
          </div>
        </div>
        <div class="col-lg-9 col-12 order-1 order-lg-2">
          <!--shop toolbar start-->
          <div class="shop-toolbar-wrapper ms-lg-4 mb-3"> </div>
          <!--shop toolbar end-->
          <div class="shop-product-wrapper ms-lg-4 border-top border-start row gx-0 archive-products">
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-2-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Fresh organic kiwi</a></h6>
                  
                  <div class="single-product-item-price"> $10.00 - $70.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-1-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                  <div class="single-product-item-price"> $10.00 - $70.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-3-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried banana</a></h6>
                  <div class="single-product-item-price"> $12.00 - $72.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-4-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Crunchy crisps</a></h6>
                  <div class="single-product-item-price"> $12.00 - $72.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-5-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> <i class="icon-rt-star-solid"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Jewel cranberries</a></h6>
                  <div class="single-product-item-price"> $12.00 - $72.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-6-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Fresh Broccoli</a></h6>
                  <div class="single-product-item-price"> $11.00 - $61.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-7-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Organic coconut</a></h6>
                  <div class="single-product-item-price"> $11.00 - $61.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-8-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Almond organic</a></h6>
                  <div class="single-product-item-price"> $3.00 - $31.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-9-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Almond organic</a></h6>
                  <div class="single-product-item-price"> $3.00 - $31.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-10-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried apricots</a></h6>
                  <div class="single-product-item-price"> $13.00 - $44.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-11-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Fresh tomato 1kg</a></h6>
                  <div class="single-product-item-price"> $13.00 - $44.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-12-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Fresh Orange 1Kg</a></h6>
                  <div class="single-product-item-price"> $11.00 - $41.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-13-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Fresh Orange 1Kg</a></h6>
                  <div class="single-product-item-price"> $11.00 - $41.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-14-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Toor dal 1kg</a></h6>
                  <div class="single-product-item-price"> $1.00 - $11.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-15-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Utela 1kg</a></h6>
                  <div class="single-product-item-price"> $7.00 - $18.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-16-1.jpg" alt="">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url(); ?>/products/detail" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> <i class="icon-rt-star-solid"></i> </div>
                  <h6 class="single-product-item-title"><a href="javascript:void(0);">Organic mango strips</a></h6>
                  <div class="single-product-item-price"> $10.00 - $50.00 </div>
                  <div class="product-list-style">
                    <p class="product-list-description">Almonds are one of the earth’s most ancient and nutritious food sources, packed with protein, fiber, magnesium and vitamin E</p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
            </div>
          </div>
          <nav class="page-pagination">
            <ul class='page-pagination-numbers'>
              <li> <a href="#" aria-current="page" class="page-numbers current">1</a> </li>
              <li> <a class="page-numbers" href="#">2</a> </li>
              <li> <a class="next page-numbers" href="#"><i class="icon-rt-arrow-right-solid"></i></a> </li>
            </ul>
          </nav>
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