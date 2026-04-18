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
            <h1 class="page-title">My Cart</h1>
            <ul class="breadcrumb-page-list">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item">My Cart</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb End -->
  <!-- Page Section Content Start -->
  <section class="page-secton-wrapper section-space-ptb">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <div class="wishlist-tiel">
            <h2 class="mb-5 fw-bold">My Cart</h2>
          </div>
          <form action="#" class="cart-table">
            <div class="table-content table-responsive">
              <table class="table border table-hover">
                <thead>
                  <tr>
                    <th class="plantmore-product-remove">Remove</th>
                    <th class="plantmore-product-thumbnail">Images</th>
                    <th class="cart-product-name">Product</th>
                    <th class="plantmore-product-price">Unit Price</th>
                    <th class="plantmore-product-quantity">Quantity</th>
                    <th class="plantmore-product-subtotal">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $cart = $this->cart->contents();
						$total=0.00;  $total_pro = 0;
						foreach ($cart as $key => $v)
						{
						$total+=$v['subtotal'];
						$total_pro++;
						?>
                  <tr id="table_row_<?php echo $v['id']; ?>">
                    <input type="hidden" name="product_id[]" value="<?php echo $v['rowid']; ?>">
                    <td class="plantmore-product-remove">
                    <a href="javascript:;" onClick="check_confirm_remove('<?php echo $v['rowid']; ?>');"><i class="icon-rt-close-outline text-danger" style="font-size:1.2rem;font-weight:900;"></i></a>
                    <?php /*?><a href="javascript:;" onClick="remove_from_cart_page('<?php echo $v['rowid']; ?>');"><i class="icon-rt-close-outline"></i></a><?php */?></td>
                    <td class="plantmore-product-thumbnail"><a href="javascript:;"><img style="height: 50px;width: auto;" src="<?php echo $v['image']; ?>" alt="<?php echo $v['name']; ?>"></a></td>
                    <td class="plantmore-product-name" style="text-align:left"><?php echo $v['name']; ?></td>
                    <td class="plantmore-product-price"><span class="amount">₹ <?php echo number_format($v['price'],2); ?></span></td>
                    <td class="plantmore-product-quantity"><div class="quantity">
                        <div class="cart-plus-minus justify-content-center">
                          <input class="cart-plus-minus-box minQty" min="1" value="<?php echo $v['qty']; ?>" type="number">
                        </div>
                      </div></td>
                    <td class="product-subtotal" style="text-align:right;"><span style="padding-right:10px;" class="amount" id="<?php echo $v['rowid']; ?>">₹ <?php echo number_format($v['subtotal'],2); ?></span></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="coupon-all mt-4">
                  <div class="coupon2"> <a href="<?php echo base_url()."our-products"; ?>" class="btn btn-sm btn--primary continue-btn ms-2">Continue Shopping</a> </div>
                </div>
              </div>
              <div class="col-md-4 ml-auto">
                <div class="cart-page-total mt-4">
                  <h2 class="fw-bold mb-3">Total</h2>
                  <ul>
                    <li>Total Products <span>( <?php echo $total_pro; ?> )</span></li>
                    <?php /* <li>Sub Price <span>170.00</span></li>
                                            <li>Shipping Charge <span>10.00</span></li>
                                            <li>Other As per<span>50.00</span></li><?php */ ?>
                    <li>Total <span id="total_amt">₹ <?php echo number_format($total,2); ?></span></li>
                  </ul>
                  <?php if($total_pro>0){ ?>
                    <div class="button-box mt-3 text-end mt-5 mb-3"> <a href="<?php echo base_url(); ?>checkout" class="proceed-checkout-btn btn btn--primary w-full">Proceed to checkout</a> </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
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
<script type="text/javascript">

$(".qtybutton").on("click", function() {
    var $button = $(this);
    var qty = $button.parent().find("input").val();
    var rowid = $(this).closest('tr').find("input[name='product_id[]']").val();
    update_to_cart(rowid,qty);
});

function update_to_cart(rowid="",qty="")
{
    if(qty>0)
    {
        $.ajax({  
          url:APP_URL+"cart/update_to_cart",  
          method:"POST",  
          dataType:"JSON",
          data:{qty:qty,rowid:rowid},  
          success:function(data){  
            if(data.error==0)
            {
                $("#"+rowid).html("₹ "+data.product.subtotal);
                $("#total_amt").html("₹ "+data.finaltotal);
                get_cart_content(1);
            }
          }
        });  
    }
 } 


  function check_confirm_remove(rid)
  {
    swal({
          title: "Remove from Cart",
          text: 'Are You Sure Remove this Product ?',
          icon: "error",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            if(rid!="")
            {
                swal("Product removed successfully from cart.");
                $.ajax({  
                  url:APP_URL+"cart/remove_from_cart",  
                  method:"POST",  
                  dataType:"JSON",
                  data:{rid:rid},  
                  success:function(data){  
                    if(data.error==0)
                    {
                        location.reload();
                    }
                  }
                });  
            }
          } else {
            //swal("Your imaginary file is safe!");
          }
        })
  }
</script>
