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
<meta name="author" content=" <?php echo FIRM_NAME ; ?>">
<meta property="og:title" content="<?php echo $SeoDetails['seotitle'];?> |   <?php echo FIRM_NAME ; ?>" />
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
            <h5 class="widget-title"> Product Categories </h5>
            <ul class="product-categorie">
              <?php foreach ($CollectionDetails as $ckey => $cvalue) { ?>
                <li class="product-categorie-item"><a href="<?php echo  base_url(); ?>products/<?php echo $cvalue['slug'];?>"><?php echo ucwords($cvalue['name']);?></a></li>
              <?php } ?>
            </ul>
          </div>
          
		  <?php /*?><div class="shop-widget">
            <h5 class="widget-title"> Filter By Price </h5>
            <!-- filter-price-content Start -->
            <div class="filter-price-content">
              <form action="#" method="post">
                <div id="price-calc" class="price-slider"></div>
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
          </div><?php */?>
          
          <div class="shop-widget">
            <h5 class="widget-title"> Trending Products </h5>            
                    <div class="latest-trnding-active">
                        
                        <?php foreach (GenderDetails() as $tkey => $tv) { ?>
                        <!-- Latest Blog Card Start -->
                        <div class="latest-blog-card">
                            <div class="latest-blog-card-image">
                                <a href="javascript:void(0);"><img src="<?php echo base_url(); ?>uploads/trending/<?php echo $tv['image']; ?>" alt="Venus Products" title="Venus Products"></a>
                            </div>
                            <div class="text-start text-center">
                                <ul class="latest-blog-card-meta text-center">
                                    <li class="post-date"><?php echo $tv['category_name']; ?></li>
                                </ul>
                                <h4 class="latest-blog-card-title"><a href="javascript:void(0);"><?php echo $tv['title']; ?></a></h4>
                            </div>
                        </div>
                        <!-- Latest Blog Card End -->
                         <?php } ?>
                        
                    </div>            
          </div>
          
          
        </div>
        <div class="col-lg-9 col-12 order-1 order-lg-2">
	        <div class="shop-toolbar-wrapper ms-lg-4 mb-3"></div>
          <!--shop toolbar start-->
          <?php if(!empty($products)){ ?>
          	<div class="shop-product-wrapper ms-lg-4 border-top border-start row gx-0 archive-products mt-5">
            
            <?php 
			
			foreach ($products as $pk => $pv)
            { ?>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
              <!-- Single Item Start -->
              <div class="single-product-item">
                <div class="single-product-item-image"> <a href="<?php echo base_url()."product/".$pv['cate_slug']."/".$pv['slug']; ?>" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url().'uploads/product/thumbnails/'.$pv['images'][0]['image_name']; ?>" alt="<?php echo $pv['name']; ?>">  </a>
                  <ul class="single-product-item-action">
                    <li class="single-product-item-action-list"> <a href="javascript:void(0);" onClick="FavoriteProducts(<?php echo $pv['id']; ?>);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
                    <li class="single-product-item-action-list"> 
                      <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal-<?php echo $pv['id']; ?> " class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> 
                    </li>
                    <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url()."product/".$pv['cate_slug']."/".$pv['slug']; ?>" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
                  </ul>
                </div>
                <div class="single-product-item-content">
                  <h6 class="sub-title txtcolor"><?php echo $pv['category']; ?></h6>
                  <h6 class="single-product-item-title"><a href="<?php echo base_url()."product/".$pv['cate_slug']."/".$pv['slug']; ?>"><?php echo $pv['name']; ?></a></h6>
                  
                  <div class="single-product-item-price"> <?php echo $pv['price_list'][0]['new_price']; ?> <?php /*- <s><?php echo $pv['price_list'][0]['old_price']; ?></s>  <?php */ ?></div>
                  <div class="product-list-style">
                    <p class="product-list-description"></p>
                    <div class="product-list-action-cart"> <a href="javascript:void(0);"><span class="text">Add to cart</span></a> </div>
                  </div>
                </div>
              </div>
              <!-- Single Item End -->
              </div>
            <?php } ?>
          </div>
	        <nav class="page-pagination">           
              <?php echo $links; ?>           
          </nav>
          <?php 
                   
                  }else{
                  ?>
                  <div class="row d-flex justify-content-center mb-5">
	                  <div class="col-8">
                        <div class="image mt-5 text-center">
                            <img src="<?php echo base_url(); ?>assest/frontend/images/no.png" alt="Venus Products">
                        </div>
                    </div>
                      
                      
                  </div>
                  <?php
                  }
                  ?>
          
          
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
<?php //$this->load->view('common/quick_view_modal.php');?>

<?php foreach ($products as $pk => $pv)
{ 
    $pdetail['product'] = $pv;
    $this->load->view('common/product-model.php',$pdetail); 
} ?>


<!-- Login & Register Modal Start -->
<?php $this->load->view('common/login_modal.php');?>
<!-- JS Vendor, Plugins & Activation Script Files -->
<?php $this->load->view('common/footer_js.php');?>
</body>
</html>
<script type="text/javascript">


 /* $("#price-calc" ).slider({
      range: true,
      min: <?php echo $min_max['min_price']; ?>,
      max: <?php echo $min_max['max_price']; ?>,
      values: [ <?php echo $min_max['min_price']; ?>, <?php echo $min_max['max_price']; ?> ],
      slide: function( event, ui ) {
          $( "#min-price" ).val('' + ui.values[ 0 ] );
          $( "#max-price" ).val('' + ui.values[ 1 ] );
      }
  });
  $( "#min-price" ).val('' + $( "#price-calc" ).slider( "values", 0 ));   
  $( "#max-price" ).val('' + $( "#price-calc" ).slider( "values", 1 )); */
  
  
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