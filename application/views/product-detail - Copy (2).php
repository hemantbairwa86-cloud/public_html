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
            <div class="product-rating d-flex">
              <ul class="d-flex">
                <li><a href="#"><i class="icon-rt-star-solid select-star"></i></a></li>
                <li><a href="#"><i class="icon-rt-star-solid select-star"></i></a></li>
                <li><a href="#"><i class="icon-rt-star-solid select-star"></i></a></li>
                <li><a href="#"><i class="icon-rt-star-solid select-star"></i></a></li>
                <li><a href="#"><i class="icon-rt-star-solid"></i></a></li>
              </ul>
              <a href="#" class="reting-count">(<span class="count">1</span> customer review)</a> </div>
            <p class="product-details-view-desc">90 plus, a phytopharmaceutical formulation, is recommended for the treatment of male infertility due to oligospermina. <br>
              90 plus significantly improves sperm count, sperm quality, sperm morphology and motility, and thus helps increase conception rate in man. 90 plus is safe, with no adverse effects. </p>
            <div class="price-box"> <span class="new-price" style="color:#179957"><?php echo $pricelist[0]['new_price']; ?></span> <span class="old-price"><?php echo $pricelist[0]['old_price']; ?></span> </div>
            <div class="price-box"> <a href=""  class="btn btn-outline-info mr-2 mb-2 active">10 ML</a> <a href=""  class="btn btn-outline-info mr-2 mb-2">50 ML</a> </div>
            <div class="single-add-to-cart">
              <form action="#" class="cart-quantity d-flex">
                <div class="quantity">
                  <div class="cart-plus-minus">
                    <input class="cart-plus-minus-box" value="1" type="text">
                  </div>
                </div>
                <button class="add-to-cart btn btn--primary md:px-5" type="submit">Add To Cart</button>
              </form>
            </div>
            <div class="add-to-wishlist"> <a href="wishlist.html" class="add_to_wishlist"><i class="icon-rt-heart2"></i> Add to Wishlist</a> </div>
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
                  <div class="product_desc mb-30">
                    <table class="product-attributes_table">
                      <tbody>
                        <tr>
                          <td class="product-attributes-item__value"><ul class="order-list">
                              <li>Oligospermia</li>
                              <li>Low Libido</li>
                              <li>Male Sexual Weakness</li>
                              <li>For Strength &amp; Stemina, As it Delays Aeging Process. </li>
                            </ul></td>
                        </tr>
                      </tbody>
                    </table>
                    Clinical Pharmacology :-<br>
                    90 Plus has potent androgenic and antioxidant actions, which increase testosterone levels, spermatogenesis, and sexual desire.
                    90 Plus promotes spermatogenesis by improving the testicular, seminal vesicle and epididymal functions, and, improves sperm count and the quality of semen by increasing the LH-FSH producing basophil cells in the pituitary. </div>
                </div>
              </div>
              <!-- End Single Content -->
              <!-- Start Single Content -->
              <div class="product_tab_content tab-pane" id="description" role="tabpanel">
                <div class="product_additional-information mt-30"> Composition :
                  
                  Each hard gelatin capsule contains Ext.of :
                  <table class="product-attributes_table">
                    <tbody>
                      <tr>
                        <th class="product-attributes-item__label">Ashwagandha</th>
                        <td class="product-attributes-item__value"><p>150 mg</p></td>
                      </tr>
                      <tr>
                        <th class="product-attributes-item__label">Sarpagandha</th>
                        <td class="product-attributes-item__value"><p>50 mg</p></td>
                      </tr>
                      <tr>
                        <th class="product-attributes-item__label">Kaucha</th>
                        <td class="product-attributes-item__value"><p>100 mg</p></td>
                      </tr>
                      <tr>
                        <th class="product-attributes-item__label">Ashwagandha</th>
                        <td class="product-attributes-item__value"><p>150 mg</p></td>
                      </tr>
                      <tr>
                        <th class="product-attributes-item__label">Sarpagandha</th>
                        <td class="product-attributes-item__value"><p>50 mg</p></td>
                      </tr>
                      <tr>
                        <th class="product-attributes-item__label">Kaucha</th>
                        <td class="product-attributes-item__value"><p>100 mg</p></td>
                      </tr>
                      <tr>
                        <th class="product-attributes-item__label">Ashwagandha</th>
                        <td class="product-attributes-item__value"><p>150 mg</p></td>
                      </tr>
                      <tr>
                        <th class="product-attributes-item__label">Sarpagandha</th>
                        <td class="product-attributes-item__value"><p>50 mg</p></td>
                      </tr>
                      <tr>
                        <th class="product-attributes-item__label">Kaucha</th>
                        <td class="product-attributes-item__value"><p>100 mg</p></td>
                      </tr>
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
                      <div class="pro_review">
                        <div class="review_thumb"> <img alt="review images" src="<?php echo  base_url(); ?>assest/frontend/images/others/reviewer.jpg"> </div>
                        <div class="review_details">
                          <div class="review_info mb-10">
                            <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                            <h5><span class="user-name">mix83</span> - <span class="comment-date"> November 19, 2022</span></h5>
                          </div>
                          <p class="reviewer-text">Have bought several times. Great tasting keto Granola. Too expensive to use as a breakfast cereal but Great to add as a topping .</p>
                        </div>
                      </div>
                      <!-- End Single Review -->
                      <!-- Start Single Review -->
                      <div class="pro_review">
                        <div class="review_thumb"> <img alt="review images" src="<?php echo  base_url(); ?>assest/frontend/images/others/reviewer.jpg"> </div>
                        <div class="review_details">
                          <div class="review_info mb-10">
                            <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                            <h5> <span class="user-name">453swq </span> - <span class="comment-date"> November 12, 2022</span></h5>
                          </div>
                          <p class="reviewer-text">Have bought several times. Great tasting keto Granola. Too expensive to use as a breakfast cereal but Great to add as a topping .</p>
                        </div>
                      </div>
                      <!-- End Single Review -->
                      <div class="pro_review">
                        <div class="review_thumb"> <img alt="review images" src="<?php echo  base_url(); ?>assest/frontend/images/others/reviewer.jpg"> </div>
                        <div class="review_details">
                          <div class="review_info mb-10">
                            <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                            <h5><span class="user-name">mix83</span> - <span class="comment-date"> November 19, 2022</span></h5>
                          </div>
                          <p class="reviewer-text">Have bought several times. Great tasting keto Granola. Too expensive to use as a breakfast cereal but Great to add as a topping .</p>
                        </div>
                      </div>
                      <div class="pro_review">
                        <div class="review_thumb"> <img alt="review images" src="<?php echo  base_url(); ?>assest/frontend/images/others/reviewer.jpg"> </div>
                        <div class="review_details">
                          <div class="review_info mb-10">
                            <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
                            <h5> <span class="user-name">453swq </span> - <span class="comment-date"> November 12, 2022</span></h5>
                          </div>
                          <p class="reviewer-text">Have bought several times. Great tasting keto Granola. Too expensive to use as a breakfast cereal but Great to add as a topping .</p>
                        </div>
                      </div>
                      <div class="col-md-12 text-center text-dark"><a href="" class="btn btn-outline-info">Load More</a></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Start RAting Area -->
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
                    <!-- End RAting Area -->
                    <div class="comments-area comments-reply-area" style="margin-top:0px;">
                      <div class="row">
                        <div class="col-lg-12">
                          <form action="#" class="comment-form-area">
                            <div class="row comment-input">
                                <div class="col-md-12 comment-form-author mt-3">
                                    <label>Full Name <span class="required">*</span></label>
                                    <input type="text" required="required" name="full_name" id="full_name" placeholder="">
                                </div>                                                        
                            </div>
                            <div class="row comment-input">
                                <div class="col-md-6 comment-form-author mt-3">
                                    <label>City <span class="required">*</span></label>
                                    <input type="text" required="required" name="city" id="city" placeholder="">
                                </div>
                                <div class="col-md-6 comment-form-email mt-3">
                                    <label>Contact No <span class="required">*</span></label>
                                    <input type="text" required="required" name="contact" id="contact" placeholder="">
                                </div>
                            </div>
                            <div class="comment-form-comment mt-3">
                              <label>Comment</label>
                              <textarea class="comment-notes" required="required"></textarea>
                            </div>
                            <div class="comment-form-submit mt-3">
                              <input type="submit" value="Submit Review" class="comment-submit">
                            </div>
                          </form>
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
  <section class="product-item-section section-space-pb pt-5" style="background-color:#f3fffa">
    <div class="container">
      <div class="row">
        <div class="col-12 position-relative">
          <div class="section-title-wrap">
            <h2 class="section-title"> Related Products </h2>
          </div>
        </div>
      </div>
      <div class="product-slider-active product-border-box" style="background-color:#FFFFFF">
        <div class="single-product-item">
          <div class="single-product-item-image"> <a href="product-details.html" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-2-1.jpg" alt=""> </a>
            <ul class="single-product-item-action">
              <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
              <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
              <li class="single-product-item-action-list product-cart"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
            </ul>
          </div>
          <div class="single-product-item-content">
            <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
            <h6 class="single-product-item-title"><a href="product-details.html">Dried mango</a></h6>
            <div class="single-product-item-price"> 10.00 - <s>70.00</s> </div>
          </div>
        </div>
        <div class="single-product-item">
          <div class="single-product-item-image"> <a href="product-details.html" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-1-1.jpg" alt=""> </a>
            <ul class="single-product-item-action">
              <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
              <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
              <li class="single-product-item-action-list product-cart"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
            </ul>
          </div>
          <div class="single-product-item-content">
            <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
            <h6 class="single-product-item-title"><a href="product-details.html">Dried mango</a></h6>
            <div class="single-product-item-price"> 10.00 - <s>70.00</s> </div>
          </div>
        </div>
        <div class="single-product-item">
          <div class="single-product-item-image"> <a href="product-details.html" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-3-1.jpg" alt=""> </a>
            <ul class="single-product-item-action">
              <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
              <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
              <li class="single-product-item-action-list product-cart"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
            </ul>
          </div>
          <div class="single-product-item-content">
            <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
            <h6 class="single-product-item-title"><a href="product-details.html">Dried mango</a></h6>
            <div class="single-product-item-price"> 10.00 - <s>70.00</s> </div>
          </div>
        </div>
        <div class="single-product-item">
          <div class="single-product-item-image"> <a href="product-details.html" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-4-1.jpg" alt=""> </a>
            <ul class="single-product-item-action">
              <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
              <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
              <li class="single-product-item-action-list product-cart"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
            </ul>
          </div>
          <div class="single-product-item-content">
            <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
            <h6 class="single-product-item-title"><a href="product-details.html">Dried mango</a></h6>
            <div class="single-product-item-price"> 10.00 - <s>70.00</s> </div>
          </div>
        </div>
        <div class="single-product-item">
          <div class="single-product-item-image"> <a href="product-details.html" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-5-1.jpg" alt=""> </a>
            <ul class="single-product-item-action">
              <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
              <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
              <li class="single-product-item-action-list product-cart"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
            </ul>
          </div>
          <div class="single-product-item-content">
            <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
            <h6 class="single-product-item-title"><a href="product-details.html">Dried mango</a></h6>
            <div class="single-product-item-price"> 10.00 - <s>70.00</s> </div>
          </div>
        </div>
        <div class="single-product-item">
          <div class="single-product-item-image"> <a href="product-details.html" class="prodcut-images"> <img class="primary-image" src="<?php echo  base_url(); ?>assest/frontend/images/products/product-image-6-1.jpg" alt=""> </a>
            <ul class="single-product-item-action">
              <li class="single-product-item-action-list"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-heart2"></i></a> </li>
              <li class="single-product-item-action-list"> <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link"><i class="icon-rt-eye2"></i></a> </li>
              <li class="single-product-item-action-list product-cart"> <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a> </li>
            </ul>
          </div>
          <div class="single-product-item-content">
            <div class="single-product-item-rating"> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid select-star"></i> <i class="icon-rt-star-solid"></i> </div>
            <h6 class="single-product-item-title"><a href="product-details.html">Dried mango</a></h6>
            <div class="single-product-item-price"> 10.00 - <s>70.00</s> </div>
          </div>
        </div>
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
<?php $this->load->view('common/quick_view_modal.php');?>
<!-- Login & Register Modal Start -->
<?php $this->load->view('common/login_modal.php');?>
<!-- JS Vendor, Plugins & Activation Script Files -->
<?php $this->load->view('common/footer_js.php');?>
<script language="javascript">
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
