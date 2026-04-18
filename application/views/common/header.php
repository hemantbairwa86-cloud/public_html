<style type="text/css">
  
/*--------------------------
    - Search Box Css
----------------------------*/
.mysearch-field {
  display: flex;
  position: relative;
  justify-content: center;
}
.mysearch-field input {
  width: 100%;
  padding: 0 70px 0 25px;
  border-radius: 0;
  border: 0;
  flex: 1 1 auto;
  height: 50px;
  margin: 0;
  width: auto;
  color: #000000;
  background: #f2f3f5;
  border-radius: 30px;
}
.mysearch-field input::-moz-placeholder {
  color: #a7a8aa;
}
.mysearch-field input:-ms-input-placeholder {
  color: #a7a8aa;
}
.mysearch-field input::placeholder {
  color: #a7a8aa;
}
.mysearch-field .mysearch-btn {
  position: absolute;
  right: 0;
  background-color: transparent;
  top: 50%;
  transform: translateY(-50%);
  border: none;
  font-size: 20px;
  height: 50px;
  line-height: 50px;
  width: 60px;
  text-align: center;
}
.mysearch-field .mysearch-btn:hover {
  color: #179957;
}

</style>
<div class="desktop-header header1 d-none d-lg-block">
  <div class="header-top-area border-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
          <div class="header-top-left-area">
            <p class="header-top-text-message"></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="header-top-right-area header-top-settings">
            <p class="header-top-text-message"> <i class="icon-rt-call-outline"></i> Need help? Call Us: <a href="tel:<?php echo FIRM_MOBILE ; ?>"><?php echo FIRM_MOBILE ; ?></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-middle-area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3">
          <div class="logo"> <a href="<?php echo  base_url(); ?>"><img src="<?php echo  base_url(); ?>assest/frontend/images/logo.svg" alt=""></a> </div>
        </div>
        <div class="col-lg-6">
          <div class="search-box">
            <div class="mysearch-field" autocomplete="off">
              <input type="text" id="txt_search" class="search-field" placeholder="Search product..." value="<?php if(isset($_SESSION['txt_search']) && $_SESSION['txt_search']!="")
                { //echo trim($_SESSION['txt_search']); 
                } ?>">
              <button class="mysearch-btn" type="button" onclick="set_search_value();"><i class="icon-rt-loupe"></i></button>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="header-middle-right-area">
            <div class="my-account"> 
            <?php if(!is_login_user_front()) { ?>
            	<a href="<?php echo base_url()."login"; ?>" class="header-action-item"><i class="icon-rt-user"></i></a> 
                <?php } else {  ?>
				        <a href="<?php echo base_url()."dashboard"; ?>" class="header-action-item"><i class="icon-rt-user"></i></a> 
                <?php } ?>
            </div>
            <div class="wishlist"> <a href="javascript:void(0);" class="header-action-item"> <i class="icon-rt-heart2"></i> 
              <?php $whish_list = get_wishlist();
              if(!empty($whish_list)){ ?>
              <span class="wishlist-count" id="wishlist_count_span"><?php echo count($whish_list); ?></span> 
              <?php } ?>
            </a> </div>
            <div class="cart"> <a href="#miniCart" class="header-action-item toolbar-btn"> <i class="icon-rt-basket-outline"></i> <span class="wishlist-count header_min_cart_count">
              <?php $cart = $this->cart->contents(); echo count($cart); ?>
              </span> </a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-bottom-area bg-secondary header-sticky">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3">
          <div class="categories-menu-wrap_box">
            <div class="categories_menu">
              <div class="categories_title">
                <h5 class="categori_toggle"><i class="icon-rt-bars-solid"></i> Categories</h5>
              </div>
              <div class="categories_menu_toggle">
                <ul>
                  <?php foreach ($CollectionDetails as $ckey => $cvalue) { ?>
                  <li><a href="<?php echo  base_url(); ?>products/<?php echo $cvalue['slug'];?>"><img src="<?php echo  base_url(); ?>assest/frontend/images/categories-icons/almond.svg" alt="<?php echo ucwords($cvalue['name']);?>"><?php echo ucwords($cvalue['name']);?></a></li>
                  <?php } ?>
                  <li class="categories-more-less"> <a href="<?php echo base_url()."our-products"; ?>">+ View All Products</a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="main-menu-area white_text">
            <!--  Start Mainmenu Nav-->
            <nav class="main-navigation">
              <ul>
                <li class="active"><a href="<?php echo  base_url(); ?>"  <?php if($act_page=='home') { echo "class = 'activemenu'" ; } ?>>Home</a></li>
                <li class=""><a href="javascript:void(0);" <?php if($act_page=='products') { echo "class = 'activemenu'" ; } ?>>Categories <i class="icon-rt-arrow-down"></i></a>
                  <ul class="sub-menu">
                    <?php foreach ($CollectionDetails as $ckey => $cvalue) { ?>
                    <li><a href="<?php echo  base_url(); ?>products/<?php echo $cvalue['slug'];?>" ><?php echo ucwords($cvalue['name']);?></a></li>
                    <?php } ?>
                  </ul>
                </li>
                <li class="active"><a href="<?php echo base_url()."our-products"; ?>"  <?php if($act_page=='our-products') { echo "class = 'activemenu'" ; } ?>>Our Products</a></li>
                <li class=""><a href="javascript:void(0);" <?php if($act_page=='about') { echo "class = 'activemenu'" ; } ?>>About Us <i class="icon-rt-arrow-down"></i></a>
                  <ul class="sub-menu">
                    <li><a href="<?php echo base_url(); ?>about/company">About Company</a></li>
                    <li><a href="<?php echo base_url(); ?>product-manufacturing">Product Manufacturing </a></li>
                  </ul>
                </li>
                <li><a href="<?php echo base_url(); ?>third-party-manufacturing" <?php if($act_page=='third_party') { echo "class = 'activemenu'" ; } ?>>Third Party Manufacturing</a></li>
                <li><a href="<?php echo base_url(); ?>contact" <?php if($act_page=='contact') { echo "class = 'activemenu'" ; } ?> >Contact Us</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="mobile-header main-header m-header-1 d-block d-lg-none">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-3 mobile-header-start">
        <div class="d-flex gap-2">
          <div class="menu-mobile"> <a href="#moible-menu" class="m-menu-btn mobile-menu-active"> <i class="icon-rt-bars-solid"></i> </a> </div>
          <div class="m-menu-side" id="moible-menu">
            <div class="mobile-menu-inner"> <a href="#" class="side-close-icon"><i class="icon-rt-close-outline"></i></a>
              <div class="mobile-top-text-message">
                <p class="text-message"> <i class="icon-rt-call-outline"></i> Need help? Call Us: <a href="tel:<?php echo FIRM_MOBILE ; ?>"><?php echo FIRM_MOBILE ; ?></a></p>
              </div>
              <div class="mobile-tab-wrap">
                <div class="mobile-tab-menu">
                  <ul class="nav" role="tablist">
                    <li class="tab__item nav-item"> <a class="active" data-bs-toggle="tab" href="#menu_tab" role="tab">Menu</a> </li>
                    <li class="tab__item nav-item"> <a data-bs-toggle="tab" href="#categories_tab" role="tab">Categories</a> </li>
                  </ul>
                </div>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="menu_tab" role="tabpanel">
                    <nav class="offcanvas-navigation">
                      <ul>
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>about/company">About Company</a></li>
	                    <li><a href="<?php echo base_url(); ?>product-manufacturing">Product Manufacturing </a></li>
                        <li><a href="<?php echo base_url(); ?>third-party-manufacturing">Third Party Manufacturing</a></li>
                        <li><a href="<?php echo base_url(); ?>contact">Contact Us</a></li>
                        <li class="has-children"> <a href="<?php echo base_url()."our-products"; ?>">Products</a>
                          <?php /*?><ul class="sub-menu">
                            <li><a href="<?php echo base_url(); ?>products/listing">Best Selling Products</a></li>
                            <li><a href="<?php echo base_url(); ?>products/listing">New Arriaval Products</a></li>
                          </ul><?php */?>
                        </li>
                      </ul>
                    </nav>
                  </div>
                  <div class="tab-pane fade" id="categories_tab" role="tabpanel">
                    <div class="categories_menu_toggle mobile_categories_menu_toggle">
                      <ul>
                       <?php foreach ($CollectionDetails as $ckey => $cvalue) { ?>
                    <li><a href="<?php echo  base_url(); ?>products/<?php echo $cvalue['slug'];?>" ><img src="<?php echo  base_url(); ?>assest/frontend/images/categories-icons/almond.svg" alt=""><?php echo ucwords($cvalue['name']);?></a></li>
                    <?php } ?>
                      
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="header-block search-block-mobile search-sidebar">
            <button class="mobile-search-popup"><i class="icon-rt-loupe"></i></button>
          </div>
          <div class="popup-search-wrapper"> <a href="<?php echo base_url(); ?>products/listing" class="search-close-button"><i class="icon-rt-close-outline"></i></a>
            <div class="search-box">
              <div class="search-form searchbox"  autocomplete="off">
                <div class="input-wrapper">
                  <input type="text" class="search-field" id="txt_search_mob" placeholder="Search..." value="<?php if(isset($_SESSION['txt_search']) && $_SESSION['txt_search']!="")
                { //echo trim($_SESSION['txt_search']); 
                } ?>">
                  <button class="search-submit" type="button" onclick="set_search_value_mobile();"> <i class="icon-rt-loupe"></i> </button>
                </div>
              </div>
              
              <div class="search_content">
                <div class="search-keywords-list">
                  <p>Popular searches :</p>
                  <ul class="header-search-popular">
                    
                     <?php foreach ($CollectionDetails as $ckey => $cvalue) { ?>
                  <li><a href="<?php echo  base_url(); ?>products/<?php echo $cvalue['slug'];?>"><?php echo ucwords($cvalue['name']);?></a></li>
                  <?php } ?>                    
                   
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 mobile-header-mobile">
        <div class="logo text-center"><a href="<?php echo  base_url(); ?>"><img src="<?php echo  base_url(); ?>assest/frontend/images/logo.svg" ></a> </div>
      </div>
      <div class="col-3 mobile-header-right">
        <div class="header-middle-right-area">
          <div class="my-account"> 
          
           <?php if(!is_login_user_front()) { ?>
            	<a href="<?php echo base_url()."login"; ?>" class="header-action-item"><i class="icon-rt-user"></i></a> 
                <?php } else {  ?>
				<a href="<?php echo base_url()."dashboard"; ?>" class="header-action-item"><i class="icon-rt-user"></i></a> 
                <?php } ?>
          
           </div>
          <div class="cart"> <a href="#miniCart" class="header-action-item toolbar-btn" id="header_min_cart"><i class="icon-rt-basket-outline"></i> <span class="wishlist-count header_min_cart_count"><?php echo count($cart); ?></span></a></div>
        </div>
      </div>
    </div>
  </div>
</div>
