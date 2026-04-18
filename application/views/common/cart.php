<div class="offcanvas-minicart_wrapper" id="miniCart">
  <div class="minicart-inner">
    <div class="close-btn-box"> <a href="#" class="close-button"><i class="icon-rt-close-outline"></i></a> </div>
    <div class="minicart-content">
      <h6 class="mini-cart-title">YOUR CART</h6>
      <ul class="minicart-list" id="sidebar_cart">
        <?php $cart = $this->cart->contents(); 
		if(!empty($cart))
		{
			foreach ($cart as $key => $v)
			{
			  $row_id = "'".$v['rowid']."'";
			  echo '<li class="minicart-product"> <a class="product-item_img"> <img style="height:75px;width:auto;" class="img-fluid" src="'.$v['image'].'" alt="'.$v['name'].'"></a>
					  <div class="product-item_content"> <a class="product-item_title" href="javascript:void(0);">'.$v['name'].'</a>
						<label class="product-item_quantity"><span>'.$v['qty'].'</span> x<span> ₹ '.$v['price'].'</span></label>
					  </div>
					  <a class="product-item_remove" href="javascript:;" onClick="remove_from_cart('.$row_id.');"><i class="icon-rt-close-outline"></i></a> 
					</li>';
				$total+=$v['subtotal'];
			}
		}
		else { ?>
        <center><img src="<?php echo base_url();?>assest/frontend/images/cart.png"></center>
         <?php } ?>
        <?php /* ?><li class="minicart-product"> <a class="product-item_img"> <img class="img-fluid" src="<?php echo  base_url(); ?>assest/frontend/images/products/cart/cart-1.jpg" alt="Product Image"> </a>
          <div class="product-item_content"> <a class="product-item_title" href="javascript:void(0);">Plant pots</a>
            <label class="product-item_quantity"><span>1</span> x<span> $20.00</span></label>
          </div>
          <a class="product-item_remove" href="javascript:void(0)"><i class="icon-rt-close-outline"></i></a> 
        </li>
        <li class="minicart-product"> <a class="product-item_img"> <img class="img-fluid" src="<?php echo  base_url(); ?>assest/frontend/images/products/cart/cart-2.jpg" alt="Product Image"> </a>
          <div class="product-item_content"> <a class="product-item_title" href="javascript:void(0);">Teapot with black tea</a>
            <label class="product-item_quantity"><span>1</span> x<span> $20.00</span></label>
          </div>
          <a class="product-item_remove" href="javascript:void(0)"><i class="icon-rt-close-outline"></i></a> 
        </li>
        <li class="minicart-product"> <a class="product-item_img"> <img class="img-fluid" src="<?php echo  base_url(); ?>assest/frontend/images/products/cart/cart-3.jpg" alt="Product Image"> </a>
          <div class="product-item_content"> <a class="product-item_title" href="javascript:void(0);">Simple Chair</a>
            <label class="product-item_quantity"><span>1</span> x<span> $20.00</span></label>
          </div>
          <a class="product-item_remove" href="javascript:void(0)"><i class="icon-rt-close-outline"></i></a> 
        </li><?php */ ?>
      </ul>
    </div>
    <div class="minicart-item_total"> <span class="font-weight--reguler">Total:</span> <span class="ammount font-weight--reguler" id="sidebar_cart_subtotal">₹ <?php echo number_format($total,2); ?></span> </div>
    <div class="minicart-btn_area"> <a href="<?php echo base_url(); ?>shopping-cart" class="btn btn--full btn--primary">Checkout</a> </div>
  </div>
  <div class="global-overlay"></div>
</div>
