 <div class="modal fade product-modal-wrapper" id="quick-view-modal-<?php echo $product['id']; ?>">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="button-close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            <div class="modal-inner-area">
              <div class="row gx-3 product-details-inner">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <!-- Product Details Left -->
                  <div class="product-details-left">
                    <div class="product-details-images slider-lg-image-1">
                      <?php foreach ($product['images'] as $pi => $piv){ ?>
                          <div class="lg-image img-zoom"> <a href="" class="img-poppu"><img src="<?php echo base_url().'uploads/product/'.$piv['image_name']; ?>" alt="Venus Products"></a> </div>
                      <?php } ?>
                    </div>
                    <div class="product-details-thumbs slider-thumbs-1">
                      <?php foreach ($product['images'] as $pi => $piv){ ?>
                          <div class="sm-image"><img src="<?php echo base_url().'uploads/product/thumbnails/'.$piv['image_name']; ?>" alt="Venus Products"></div>
                      <?php } ?>                  
                    </div>
                  </div>
                  <!--// Product Details Left -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="product-details-view-content">
                    <h3 class="title"><?php echo $product['name']; ?></h3>
                    <h5 class="sub-title"><?php echo $product['category']; ?></h5>
                    <div class="product-rating d-flex">
                      <ul class="d-flex">
                        <li><a href="#"><i class="icon-rt-star-solid select-star"></i></a></li>
                        <li><a href="#"><i class="icon-rt-star-solid select-star"></i></a></li>
                        <li><a href="#"><i class="icon-rt-star-solid select-star"></i></a></li>
                        <li><a href="#"><i class="icon-rt-star-solid select-star"></i></a></li>
                        <li><a href="#"><i class="icon-rt-star-solid"></i></a></li>
                      </ul>
                      <a href="#" class="reting-count">(<span class="count">1</span> customer review)</a> </div>
                    <p class="product-details-view-desc"><?php echo $product['description']; ?></p>
                    <div class="price-box"> <span class="new-price"><?php echo $product['price_list'][0]['new_price']; ?></span> <?php /*– <span class="old-price"> 

                      <?php echo $product['price_list'][0]['old_price']; ?></span> <?php */ ?></div>
                    <div class="single-add-to-cart">
                      <form action="javascript:;" class="cart-quantity d-flex">
                        <div class="quantity">
                          <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box minQty" value="1" min="1" type="number" id="qty_btn_<?php echo $product['id']; ?>">
                          </div>
                        </div>
                        <button class="add-to-cart btn btn--primary md:px-5" type="button" onclick="add_to_cart(<?php echo $product['id']; ?>);">Add To Cart11</button>
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>