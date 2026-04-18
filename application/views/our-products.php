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
	background: #134d47  url("<?php echo base_url(); ?>assest/frontend/images/banners/bg.webp")  repeat 0 0;
	-webkit-animation: 10s linear 0s normal none infinite animate;
	-moz-animation: 10s linear 0s normal none infinite animate;
	-ms-animation: 10s linear 0s normal none infinite animate;
	-o-animation: 10s linear 0s normal none infinite animate;
	animation: 10s linear 0s normal none infinite animate;
	min-height:300px;
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
            <h1 class="page-title">Venus Products</h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0);">Our Products</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view('common/categories.php');?>
  <!-- Breadcrumb End -->
  <?php foreach ($CollectionDetails as $ckey => $cvalue) { ?>
  <section class="product-item-section pb-5 pt-5">
    <div class="container">
      <div class="row">
        <div class="col-12 position-relative">
          <div class="d-lg-flex align-items-center justify-content-lg-between mb-4">
            <div class="section-title-wrap mb-md-0">
              <h2 class="section-title" style="color:#009a5d"><?php echo ucwords($cvalue['name']);?> </h2>
              <p></p>
            </div>
          </div>
        </div>
      </div>
      <div class="custom-row product-border-box">
        <div class="custom-col-20 d-none d-lg-block">
          <div class="container h-100 mybg">
            <div class="row align-items-center h-100">
              <div class="col-12 mx-auto">
                <div class="jumbotron" style="font-size:2.2rem;text-align:center;font-weight:800;line-height:38px;color:#FFFFFF;"> <?php echo ucwords($cvalue['name']);?><br>
                  <a href="<?php echo  base_url(); ?>products/<?php echo $cvalue['slug'];?>" class="btn success mt-3">View All</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-col-80">
          <div class="tab-content">
            <div class="tab-pane active" id="fruits">
              <div class="product-slider-active-4">
                <?php $products = products_by_category($cvalue['id']); 
				        foreach ($products as $key => $v) { ?>
                <div class="single-product-item">
                  <div class="single-product-item-image"> <a href="<?php echo base_url()."product/".$cvalue['slug']."/".$v['slug']; ?>" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url().'uploads/product/thumbnails/'.$v['images'][0]['image_name']; ?>" alt="<?php echo $v['name']; ?>"> </a>
                    <ul class="single-product-item-action">
                      <li class="single-product-item-action-list"> <a href="javascript:void(0);" onClick="FavoriteProducts(<?php echo $v['id']; ?>);"  class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                      <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal-<?php echo $v['id']; ?>" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
                      <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url()."product/".$cvalue['slug']."/".$v['slug']; ?>" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                    </ul>
                  </div>
                  <div class="single-product-item-content">
                    <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                    <h6 class="single-product-item-title"><a href="<?php echo base_url()."product/".$cvalue['slug']."/".$v['slug']; ?>"><?php echo $v['name']; ?></a></h6>
                    <div class="single-product-item-price"> <?php echo $v['price_list'][0]['new_price']; ?> - <s><?php echo $v['price_list'][0]['old_price']; ?></s> </div>
                  </div>
                </div>
                <?php }
                                    ?>
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
<?php //$this->load->view('common/quick_view_modal.php');?>
<?php 
foreach ($CollectionDetails as $ckey => $cvalue) 
{
  $products = products_by_category($cvalue['id']);
  foreach ($products as $pk => $pv)
  { 
    $pdetail['product'] = $pv;
    $this->load->view('common/product-model.php',$pdetail);
  } 
} ?>
<!-- Login & Register Modal Start -->
<?php $this->load->view('common/login_modal.php');?>
<!-- JS Vendor, Plugins & Activation Script Files -->
<?php $this->load->view('common/footer_js.php');?>
</body>
</html>
<script type="text/javascript">
  var latestBlog = $('.latest-trnding-active');
    latestBlog.slick({
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        prevArrow: '<button type="button" class="slick-prev"> <i class="icon-rt-arrow-left-solid"> </i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="icon-rt-arrow-right-solid"> </i></button>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 479,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
</script>
