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
<style type="text/css">
.rating {
	display: flex;
	flex-direction: row-reverse;
	justify-content: center;
}
.rating > input {
	display:none;
}
.rating > label {
	position: relative;
	width: 1em;
	font-size: 6vw;
	color: #FFD600;
	cursor: pointer;
}
.rating > label::before {
 content: "\2605";
 position: absolute;
 opacity: 0;
}
.rating > label:hover:before, .rating > label:hover ~ label:before {
 opacity: 1 !important;
}
 .rating > input:checked ~ label:before {
 opacity:1;
}
 .rating:hover > input:checked ~ label:before {
opacity: 0.4;
}
/* Small Devices, Tablets */
@media only screen and (max-width : 768px) {
.rating > label {
 font-size: 12vw;
}
}
.product_tab_content ul {
	margin-top: -15px;
	margin-bottom: 15px;
	list-style:disc;
	padding-left:20px;
}
.product_description_wrap ul
{
	padding-top:10px!important;
}
.product_description_wrap ul li 
{
	line-height:28px !important;
	font-size:15px !important;
}
.product_description_wrap p
{
	font-size:15px !important;
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
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>products">Products</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>products/<?php echo $product['cateslug']; ?>"><?php echo $product['categoryname']; ?></a></li>
              <li class="breadcrumb-item"><?php echo $product['name']; ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb End -->
  <section class="product-details-secton section-space-pt">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <!-- Product Details Left -->
          <div class="product-details-left">
            <div class="product-details-images slider-lg-image-1">
              <?php foreach ($images as $pi => $piv){ ?>
              <div class="lg-image img-zoom"> <a href="<?php echo base_url().'uploads/product/'.$piv['image_name']; ?>" class="img-poppu"><img src="<?php echo base_url().'uploads/product/'.$piv['image_name']; ?>" alt="Venus Products"></a> </div>
              <?php } ?>
            </div>
            <div class="product-details-thumbs slider-thumbs-1">
              <?php foreach ($images as $pi => $piv){ ?>
              <div class="sm-image"><img src="<?php echo base_url().'uploads/product/thumbnails/'.$piv['image_name']; ?>" alt="Venus Products"></div>
              <?php } ?>
            </div>
          </div>
          <!--// Product Details Left -->
        </div>
        <div class="col-md-6">
          <div class="product-details-view-content">
            <h3 class="title"><?php echo $product['name']; ?></h3>
            <h5 class="sub-title"><?php echo $product['categoryname']; ?></h5>
            <?php $rating = get_product_rating($product['id']); ?>
            <div class="product-rating d-flex">
              <ul class="d-flex">
                <?php for ($r=1; $r <=5; $r++) { 
                  if($rating['rating']>=$r)
                  {
                    echo '<li><a href="javascript:;"><i class="icon-rt-star-solid select-star"></i></a></li>';
                  }else{
                    echo '<li><a href="javascript:;"><i class="icon-rt-star-solid"></i></a></li>';
                  }
                ?>            
                <?php } ?>
              </ul>
              <a href="#" class="reting-count">(<span class="count"><?php echo $rating['tot_customer']; ?></span> customer review)</a> </div>
             <p class="product-details-view-desc"><?php echo $product['description']; ?> </p>
            <div class="price-box"> <span class="new-price" style="color:#179957" id="new_price"><?php echo $pricelist[0]['new_price']; ?></span> <?php /* <span class="old-price" id="old_price"><?php echo $pricelist[0]['old_price']; ?></span> <?php */ ?> </div>
            <div class="price-box">
              <?php $j=1; foreach ($pricelist as $key => $pv) {
                ?>
              <a href="javascript:;" id="variation_<?php echo $pv['id']; ?>" onClick="get_variation_price(<?php echo $pv['id']; ?>);" class="btn btn-sm btn-outline-info var_class mr-2 mb-2 <?php if($j==1){ echo "active"; } ?>"><?php echo $pv['weight_name']; ?></a>
              <?php $j++; } ?>
            </div>
            <input type="hidden" name="cur_variation_id" id="cur_variation_id" value="<?php echo $pricelist[0]['id']; ?>">
            <div class="single-add-to-cart">
              <form action="javascript:;" class="cart-quantity d-flex">
                <div class="quantity">
                  <div class="cart-plus-minus">
                    <input class="cart-plus-minus-box minQty" value="1" type="number" min="1" id="qty_btn_<?php echo $product['id']; ?>">
                  </div>
                </div>
                <button class="add-to-cart btn btn--primary md:px-5" type="button" onClick="add_tocart_variation(<?php echo $product['id']; ?>);">Add To Cart</button>
              </form>
            </div>
            <div class="add-to-wishlist"> 
              <?php if(!is_login_user_front()){ ?>
                <a href="javascript:;" class="add_to_wishlist" onClick="FavoriteProducts(<?php echo $product['id']; ?>);"><i class="icon-rt-heart2"></i> Add to Wishlist</a>
              <?php }else
              {

                if(check_in_wishlist($product['id'],$this->session->userdata('user_front_session')['id']))
                {
                ?>
                  <a href="javascript:;" class="in_wishlist"><i class="icon-rt-heart-solid"></i> In Wishlist</a> </div>
              <?php }else{ ?>
                  <a href="javascript:;" class="add_to_wishlist" onClick="FavoriteProducts(<?php echo $product['id']; ?>);"><i class="icon-rt-heart2"></i> Add to Wishlist</a>
              <?php }
               } ?>
              
            <?php /*?><div class="product-meta">
                                <div class="posted_in">
                                    <span>Categories: </span>
                                    <a href="#">Applesauce</a>
                                    <a href="#">Beef</a>
                                    <a href="#">Beverages</a>
                                    <a href="#">Frozen Desserts</a>
                                    <a href="#">Frozen Foods</a>
                                    <a href="#">Frozen Potatoes</a>
                                    <a href="#">Hot Dogs & Sausages</a>
                                    <a href="#">Meats & Seafood</a>
                                    <a href="#">Pantry</a>
                                    <a href="#">Scones</a>
                                    <a href="#">Shop</a>
                                    <a href="#">Snacks</a>
                                    <a href="#">Soft Drinks</a>
                                </div>
                            </div><?php */?>
            <div class="share-product-socail-area">
              <p>Share:</p>
              <ul class="single-product-share">
                <li><a href="#"><i class="icon-rt-4-facebook-f"></i></a></li>
                <li><a href="#"><i class="icon-rt-logo-pinterest"></i></a></li>
                <li><a href="#"><i class="icon-rt-logo-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="product-description-area section-pt">
        <div class="row">
          <div class="col-lg-12">
            <div class="product-details-tab">
              <ul role="tablist" class="nav">
                <li class="active" role="presentation"> <a data-bs-toggle="tab" role="tab" href="#additional-information" class="active">additional information</a> </li>
                <li class="active"  role="presentation"> <a data-bs-toggle="tab" role="tab" href="#description">Ingredient </a> </li>
                <li role="presentation"> <a data-bs-toggle="tab" role="tab" href="#reviews">Reviews</a> </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="product_details_tab_content tab-content">
              <!-- Start Single Content -->
              <div class="product_tab_content tab-pane active" id="additional-information" role="tabpanel">
                <div class="product_description_wrap  mt-30">
                  <div class="product_desc mb-30"> <?php echo $product['additional_information']; ?> </div>
                </div>
              </div>
              <!-- End Single Content -->
              <!-- Start Single Content -->
              <div class="product_tab_content tab-pane" id="description" role="tabpanel">
                <div class="product_additional-information mt-30">
                  <table class="product-attributes_table">
                    <tbody>
                      <?php foreach ($extra as $pex => $vex) { 
					  if($vex['evalue']!='') {  ?>
                      <tr>
                        <th class="product-attributes-item__label" style="width:200px;"><?php echo $vex['ename']; ?></th>
                        <td class="product-attributes-item__value"><p><?php echo $vex['evalue']; ?></p></td>
                      </tr>
                      <?php } else { ?>
                      <tr>
                        <th colspan="2" class="product-attributes-item__label" style="width:200px;"><?php echo $vex['ename']; ?></th>
                      </tr>
                      <?php }  } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- End Single Content -->
              <!-- Start Single Content -->
              <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                <div class="row">
                  <div class="col-md-6">
                    <div class="review_address_inner mt-30">
                      <!-- Start Single Review -->
                      <input type="hidden" name="page_count" id="page_count" value="1">
                      <input type="hidden" name="product_id" id="product_id" value="<?php echo $product['id']; ?>">
                      <div id="review_div">
                        <?php 
						if(!empty($review)) { 
						foreach ($review as $key => $v)
                        { ?>
                        <div class="pro_review">
                          <div class="review_thumb"> <img alt="review images" src="<?php echo  base_url(); ?>assest/frontend/images/others/reviewer.jpg"> </div>
                          <div class="review_details">
                            <div class="review_info mb-10">
                              <div class="single-product-item-rating">
                                <?php for ($i=1; $i <= $v['rating']; $i++) 
                                { 
                                  echo '<i class="icon-rt-star-solid select-star"></i>';
                                }
                                for ($j=5; $j>$v['rating']; $j--) 
                                { 
                                  echo '<i class="icon-rt-star-solid"></i>';
                                } ?>
                              </div>
                              <h5><span class="user-name"><?php echo $v['full_name']; ?></span> - <span class="comment-date"> <?php echo date("M , d-Y",strtotime($v['created_at'])); ?></span></h5>
                            </div>
                            <p class="reviewer-text"><?php echo $v['review']; ?></p>
                          </div>
                        </div>
                        <?php } } else { ?>
                        <h3>No Rating found.</h3>
                        <div class="row">
                          <div class="col-md-12"> <img src="<?php echo  base_url(); ?>assest/frontend/images/rate.webp"> </div>
                        </div>
                        <?php } ?>
                      </div>
                      <?php if(count($total_review)>4)
                      { ?>
                      <div class="col-md-12 text-center text-dark mb-5"> <a href="javascript:;" id="btn_prev" style="display:none;" onClick="get_reviews('minus');" class="btn btn-outline-info"><<</a> <a href="javascript:;" id="btn_next" onClick="get_reviews('plus');" class="btn btn-outline-info">>></a> </div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Start RAting Area -->
                    <!-- End RAting Area -->
                    <div class="comments-area comments-reply-area" style="margin-top:0px;">
                      <div class="row">
                        <div class="col-lg-12">
                          <div id="rating_div">
                            <form method="post" id="product_rating" name="product_rating" enctype="multipart/form-data" autocomplete="off" >
                              <div class="rating_wrap mt-50">
                                <h5 class="rating-title-1">Add a Review </h5>
                                <div class="rating">
                                  <input type="radio" name="rating" value="5" id="5">
                                  <label for="5">☆</label>
                                  <input type="radio" name="rating" value="4" id="4">
                                  <label for="4">☆</label>
                                  <input type="radio" name="rating" value="3" id="3">
                                  <label for="3">☆</label>
                                  <input type="radio" name="rating" value="2" id="2">
                                  <label for="2">☆</label>
                                  <input type="radio" name="rating" value="1" id="1">
                                  <label for="1">☆</label>
                                </div>
                              </div>
                              <div class="row comment-input">
                                <div class="col-md-12 comment-form-author mt-3">
                                  <label>Full Name <span class="required">*</span></label>
                                  <input type="text" name="full_name" id="full_name" required="required" placeholder="">
                                </div>
                              </div>
                              <div class="row comment-input">
                                <div class="col-md-6 comment-form-author mt-3">
                                  <label>City <span class="required">*</span></label>
                                  <input type="text" name="city" id="city" required="required" placeholder="">
                                </div>
                                <div class="col-md-6 comment-form-email mt-3">
                                  <label>Contact No <span class="required">*</span></label>
                                  <input type="text" name="contact" id="contact" required="required" placeholder="">
                                </div>
                              </div>
                              <div class="comment-form-comment mt-3">
                                <label>Product Review</label>
                                <textarea class="comment-notes" name="review" id="review" required="required"></textarea>
                              </div>
                              <div class="comment-form-submit mt-3">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <input type="submit" name="submit_review" id="submit_review" value="Submit Review" class="comment-submit">
                              </div>
                            </form>
                          </div>
                          <div class="alert alert-danger mt-3 err_msg" role="alert" style="display:none"> <b>ERROR : All fields are required.</b> </div>
                          <div id="rating_div_msg" style="display: none;">
                            <div class="rating_wrap mt-50">
                              <div class="card">
                                <div class="card-header" style="background-color:#009a5d;color:#FFFFFF"> Product Review has been successfully submitted </div>
                                <div class="card-body">
                                  <blockquote class="blockquote mb-0">
                                    <p>Thank you for your valuable feedback. Your review will be verify by admin approval.</p>
                                    <footer class="blockquote-footer"><?php echo FIRM_NAME ; ?></footer>
                                  </blockquote>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="rating_div_submited_msg" style="display: none;">
                            <div class="rating_wrap mt-50">
                              <div class="card">
                                <div class="card-header" style="background-color:#483d8b;color:#FFFFFF"> Product Review already submitted </div>
                                <div class="card-body">
                                  <blockquote class="blockquote mb-0">
                                    <p>Thank you for your valuable feedback but you are already submited  Product Review for this Product.</p>
                                    <footer class="blockquote-footer"><?php echo FIRM_NAME ; ?></footer>
                                  </blockquote>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Single Content -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="product-item-section section-space-pb pt-5 mt-5" style="background-color:#f3fffa">
    <div class="container">
      <div class="row">
        <div class="col-12 position-relative">
          <div class="section-title-wrap">
            <h2 class="section-title"> Related Products </h2>
          </div>
        </div>
      </div>
      <div class="product-slider-active product-border-box" style="background-color:#FFFFFF">
        <?php $rea_pro = products_by_category($product['cate_id']); 
        foreach ($rea_pro as $key => $v) { if($product['id']!=$v['id']){ ?>
        <div class="single-product-item">
          <div class="single-product-item-image"> <a href="<?php echo base_url()."product/".$product['cateslug']."/".$v['slug']; ?>" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url().'uploads/product/thumbnails/'.$v['images'][0]['image_name']; ?>" alt="<?php echo $v['name']; ?>"></a>
            <ul class="single-product-item-action">
              <li class="single-product-item-action-list"> 
                <a href="javascript:void(0);" onClick="FavoriteProducts(<?php echo $v['id']; ?>);" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> 
              </li>
              <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal-<?php echo $v['id']; ?>" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
              <li class="single-product-item-action-list product-cart"> <a href="<?php echo base_url()."product/".$product['cateslug']."/".$v['slug']; ?>" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
            </ul>
          </div>
          <div class="single-product-item-content">
            <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
            <h6 class="single-product-item-title"><a href="<?php echo base_url()."product/".$product['cateslug']."/".$v['slug']; ?>"><?php echo $v['name']; ?></a></h6>
            <div class="single-product-item-price"> <?php echo $v['price_list'][0]['new_price']; ?> <?php /*- ?><s><?php echo $v['price_list'][0]['old_price']; ?></s> <?php */ ?> </div>
          </div>
        </div>
        <?php 
        } } ?>
      </div>
    </div>
  </section>
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
<?php foreach ($rea_pro as $key => $v) {
  $pdetail['product'] = $v;
  $this->load->view('common/product-model.php',$pdetail);
} ?>
<!-- Login & Register Modal Start -->
<?php $this->load->view('common/login_modal.php');?>
<!-- JS Vendor, Plugins & Activation Script Files -->
<?php $this->load->view('common/footer_js.php');?>
<script language="javascript">
  $("#product_rating").submit(function (event) {
      event.preventDefault();
      var form = $("#product_rating");
      $.ajax({
            type: "POST",
            url: '<?php echo base_url()."ajax/rating"; ?>',
            data: form.serialize(),
            dataType:'JSON',
            success: function(data) {           
              if(data.error==0)
              {
                  $(".err_msg").hide();
                  $("#product_rating")[0].reset();
                  $("#rating_div").hide();                            
                  $("#rating_div_msg").show();
                  $("#rating_div_submited_msg").hide();                             
                }
                else if(data.error==2)
                {
                  $(".err_msg").hide();
                  $("#product_rating")[0].reset();
                  $("#rating_div").hide();                            
                  $("#rating_div_msg").hide();
                  $("#rating_div_submited_msg").show();
                }
              else
              {
                $(".err_msg").show();
                
              }
            },
            error: function(data) {
              //  alert("some Error");
            }
      });  
  });
  
  function get_variation_price(ctr)
  {
      
      $(".var_class").removeClass("active");
      $("#variation_"+ctr).addClass("active");


      $.ajax({
          type: "POST",
          url: '<?php echo base_url()."ajax/get_price_by_variation"; ?>',
          data: {'ctr':ctr},
          dataType:'JSON',
          success: function(data) {           
            if(data.error==0)
            {
                $("#new_price").html(data.price.new_price);
                $("#old_price").html(data.price.old_price);
                $("#cur_variation_id").val(ctr);
            }
          }
      });  
  }

  function add_tocart_variation(pid)
  {
      var variation = $("#cur_variation_id").val();
      add_to_cart(pid,"",variation);
  }




  function get_reviews(plus_minus='plus')
  {
      var page_count = parseInt($("#page_count").val());
      var product_id = $("#product_id").val();
      
      if(plus_minus=="minus" && page_count>1)
      {
        var page_count = parseInt($("#page_count").val());
        page_count--;
        $("#page_count").val(page_count);
      }

      

      $.ajax({
          type: "POST",
          url: '<?php echo base_url()."ajax/get_rating"; ?>',
          data: {'page_count':page_count,'product_id':product_id,'plus_minus':plus_minus},
          dataType:'JSON',
          success: function(data) {           
            if(data.error==0)
            {
                if(data.records)
                {
                    $("#review_div").empty().append(data.review);
                    
                    if(plus_minus=="plus")
                    {
                      var page_count = parseInt($("#page_count").val());
                      page_count++;
                      $("#page_count").val(page_count);
                    }
                    if(data.count+1>1)
                    {
                      $("#btn_prev").show();
                    }else{
                      $("#btn_prev").hide();
                    }
                }
                if(data.tot_record==data.count)
                {
                  $("#btn_next").hide();
                }else{
                  $("#btn_next").show();
                }
            }
          }
      });  
  }



 /*--
    Product Slider
    --------------------------------------------*/
    var productSlider = $('.product-slider-active');
    productSlider.slick({
        dots: false,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        prevArrow: '<button type="button" class="slick-prev"> <i class="icon-rt-arrow-left-solid"> </i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="icon-rt-arrow-right-solid"> </i></button>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
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
</body>
</html>
