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
<style type="text/css">
.mybg {
  margin: 0;
  padding: 0;
  font-family: "arial", heletica, sans-serif;
  font-size: 12px;
  background: #134d47
    url("<?php echo  base_url(); ?>assest/frontend/images/banners/bg.webp")
    repeat 0 0;
  -webkit-animation: 10s linear 0s normal none infinite animate;
  -moz-animation: 10s linear 0s normal none infinite animate;
  -ms-animation: 10s linear 0s normal none infinite animate;
  -o-animation: 10s linear 0s normal none infinite animate;
  animation: 10s linear 0s normal none infinite animate;
}

@-webkit-keyframes animate {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 500px 0;
  }
}

@-moz-keyframes animate {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 500px 0;
  }
}

@-ms-keyframes animate {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 500px 0;
  }
}

@-o-keyframes animate {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 500px 0;
  }
}

@keyframes animate {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 500px 0;
  }
}
.btn {
  border: 2px solid black;
  background-color: white;
  color: black;
  padding: 8px 25px;
  font-size: 16px;
  cursor: pointer;
}

/* Green */
.success {
  border-color: #04AA6D;
  color: green;
}

.success:hover {
  background-color: #04AA6D;
  color: white;
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
            <h1 class="page-title">Our Products</h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item">Our Products</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb End -->
  <?php $this->load->view('common/categories.php');?>
  
  <section class="product-item-section section-space-ptb-90">
    <div class="container">
      <div class="row">
        <div class="col-12 position-relative text-center">
          <div class="section-title-two  mb-30">
            <h3 class="sub-title">Our Products</h3>
            <h2 class="section-title">What’s Hot</h2>
          </div>
          <div class="col-12">
            <ul class="nav menu-tabs menu-tabs-style-center justify-content-center mb-30 me-0" role="tablist">
              <li class="active"><a class="active" href="#best-seller" role="tab" data-bs-toggle="tab">Best seller</a></li>
              <li><a href="#new-arrivals" role="tab" data-bs-toggle="tab"> New Arrivals </a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="best-seller">
          <div class="product-slider-active slider-inner-pagination slider-gap">
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-12-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Fresh Orange 1Kg</a></h6>
                <div class="single-product-item-price"> $22.00 - $30.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-13-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Fresh mango 1kg</a></h6>
                <div class="single-product-item-price"> $40.00 - $50.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-10-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried apricots</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-14-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Toor dal 1kg</a></h6>
                <div class="single-product-item-price"> $13.00 - $20.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-5-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-6-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-4-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-5-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-6-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-4-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-5-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-6-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="new-arrivals">
          <div class="product-slider-active slider-inner-pagination slider-gap">
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-2-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-1-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-3-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-4-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-5-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-6-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-4-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-5-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-6-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-4-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-5-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
            <div class="single-product-item--three">
              <div class="single-product-item-image"> <a href="javascript:void(0);" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-6-1.jpg" alt="">  </a>
                <ul class="single-product-item-action">
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                  <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                </ul>
              </div>
              <div class="single-product-item-content">
                <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                <div class="single-product-item-price"> $10.00 - $70.00 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
  
        
     <?php foreach ($CollectionDetails as $ckey => $cvalue) { ?>    
	    <section class="product-item-section pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 position-relative">
                <div class="d-lg-flex align-items-center justify-content-lg-between mb-4">
                    <div class="section-title-wrap mb-md-0">
                        <h2 class="section-title">
                            <?php echo ucwords($cvalue['name']);?>
                        </h2>
                        <?php /*?><p>There is no one who loves pain itself, who seeks after it</p><?php */?>
                    </div>                            
                </div>
            </div>
        </div>
        <div class="custom-row product-border-box">
            <div class="custom-col-20 d-none d-lg-block">
                                           
                    <div class="container h-100 mybg">
                    <div class="row align-items-center h-100">
                        <div class="col-12 mx-auto">
                            <div class="jumbotron" style="font-size:2.2rem;text-align:center;font-weight:800;line-height:38px;color:#FFFFFF;">
                               <?php echo ucwords($cvalue['name']);?><br>
                               <a href="product-listing.php" class="btn success mt-3">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
    
    
                
            </div>
            <div class="custom-col-80">
                <div class="tab-content">
                    <div class="tab-pane active" id="fruits">
                        <div class="product-slider-active-4">
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="javascript:void(0);" class="prodcut-images">
                                        <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-2-1.jpg" alt="">
                                        
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list">
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="single-product-item-content">
                                    <div class="single-product-item-rating">
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid"></i>
                                    </div>
                                    <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                                    <div class="single-product-item-price">
                                        $10.00 - $70.00
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="javascript:void(0);" class="prodcut-images">
                                        <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-1-1.jpg" alt="">
                                        
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list">
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="single-product-item-content">
                                    <div class="single-product-item-rating">
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid"></i>
                                    </div>
                                    <h6 class="single-product-item-title"><a href="javascript:void(0);">Crunchy crisps</a></h6>
                                    <div class="single-product-item-price">
                                        $10.00 - $70.00
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="javascript:void(0);" class="prodcut-images">
                                        <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-3-1.jpg" alt="">
                                        
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list">
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="single-product-item-content">
                                    <div class="single-product-item-rating">
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid"></i>
                                    </div>
                                    <h6 class="single-product-item-title"><a href="javascript:void(0);">Jewel cranberries</a></h6>
                                    <div class="single-product-item-price">
                                        $10.00 - $70.00
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="javascript:void(0);" class="prodcut-images">
                                        <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-4-1.jpg" alt="">
                                        
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list">
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="single-product-item-content">
                                    <div class="single-product-item-rating">
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid"></i>
                                    </div>
                                    <h6 class="single-product-item-title"><a href="javascript:void(0);">Almond organic</a></h6>
                                    <div class="single-product-item-price">
                                        $10.00 - $70.00
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="javascript:void(0);" class="prodcut-images">
                                        <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-5-1.jpg" alt="">
                                        
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list">
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="single-product-item-content">
                                    <div class="single-product-item-rating">
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid"></i>
                                    </div>
                                    <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                                    <div class="single-product-item-price">
                                        $10.00 - $70.00
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="javascript:void(0);" class="prodcut-images">
                                        <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-6-1.jpg" alt="">
                                        
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list">
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="single-product-item-content">
                                    <div class="single-product-item-rating">
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid"></i>
                                    </div>
                                    <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                                    <div class="single-product-item-price">
                                        $10.00 - $70.00
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="javascript:void(0);" class="prodcut-images">
                                        <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-4-1.jpg" alt="">
                                        
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list">
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="single-product-item-content">
                                    <div class="single-product-item-rating">
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid"></i>
                                    </div>
                                    <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                                    <div class="single-product-item-price">
                                        $10.00 - $70.00
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="javascript:void(0);" class="prodcut-images">
                                        <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-5-1.jpg" alt="">
                                        
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list">
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="single-product-item-content">
                                    <div class="single-product-item-rating">
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid"></i>
                                    </div>
                                    <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                                    <div class="single-product-item-price">
                                        $10.00 - $70.00
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="javascript:void(0);" class="prodcut-images">
                                        <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-6-1.jpg" alt="">
                                        
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list">
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="single-product-item-content">
                                    <div class="single-product-item-rating">
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid"></i>
                                    </div>
                                    <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                                    <div class="single-product-item-price">
                                        $10.00 - $70.00
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="javascript:void(0);" class="prodcut-images">
                                        <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-4-1.jpg" alt="">
                                        
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list">
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="single-product-item-content">
                                    <div class="single-product-item-rating">
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid"></i>
                                    </div>
                                    <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                                    <div class="single-product-item-price">
                                        $10.00 - $70.00
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="javascript:void(0);" class="prodcut-images">
                                        <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-5-1.jpg" alt="">
                                        
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list">
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="single-product-item-content">
                                    <div class="single-product-item-rating">
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid"></i>
                                    </div>
                                    <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                                    <div class="single-product-item-price">
                                        $10.00 - $70.00
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="javascript:void(0);" class="prodcut-images">
                                        <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-6-1.jpg" alt="">
                                        
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list">
                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a>
                                        </li>
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="single-product-item-content">
                                    <div class="single-product-item-rating">
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid select-star"></i>
                                        <i class="icon-rt-star-solid"></i>
                                    </div>
                                    <h6 class="single-product-item-title"><a href="javascript:void(0);">Dried mango</a></h6>
                                    <div class="single-product-item-price">
                                        $10.00 - $70.00
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    </section>
    <?php } ?>
    
    
   
  
  
  
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