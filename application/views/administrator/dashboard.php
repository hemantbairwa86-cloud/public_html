<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('administrator/common/header-js');?>
</head>
<body>
<div class="container-scroller">
  <?php $this->load->view('administrator/common/header');?>
  <div class="container-fluid page-body-wrapper">
    <?php $this->load->view('administrator/common/right_sidebar');?>
    <?php $this->load->view('administrator/common/sidebar');?>
    <div class="main-panel">
      <div class="content-wrapper">
        
        <!-- Welcome Executive Banner -->
        <div class="row mb-4">
          <div class="col-12">
            <div class="dash-welcome-card d-flex flex-column flex-md-row align-items-center justify-content-between p-4" style="background: linear-gradient(135deg, #0d342f 0%, #179957 100%); border-radius: 16px; color: #ffffff; box-shadow: 0 8px 24px rgba(23, 153, 87, 0.18);">
              <div class="welcome-text mb-3 mb-md-0">
                <h3 class="font-weight-bold mb-1" style="font-size: 1.55rem;">Welcome back, <?php echo $this->session->userdata('VenusProductSession')->name; ?>! 👋</h3>
                <p class="mb-0 opacity-8" style="font-size: 0.95rem; color: #e8f8f0;">Here is a quick snapshot of your storefront activity & product performance today.</p>
              </div>
              <div class="welcome-badge d-flex align-items-center" style="gap: 10px;">
                <span class="badge p-2 px-3" style="background: rgba(255,255,255,0.18); color: #ffffff; font-size: 0.88rem; border-radius: 10px; font-weight: 600;"><i class="fa fa-calendar mr-1"></i> <?php echo date("l, M j, Y"); ?></span>
                <a href="<?php echo base_url(); ?>administrator/product" class="btn btn-light btn-sm font-weight-bold" style="color: #184d47; border-radius: 10px; padding: 7px 16px;"><i class="fa fa-plus-circle mr-1"></i> Manage Products</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Category Metric Stat Widgets -->
        <div class="row mb-4">
          <?php 
              $category_icons = array("fa-flask", "fa-bitbucket", "fa-medkit", "fa-leaf", "fa-cubes", "fa-archive");
              $gradients = array(
                "linear-gradient(135deg, #179957 0%, #184d47 100%)",
                "linear-gradient(135deg, #00b894 0%, #006266 100%)",
                "linear-gradient(135deg, #0984e3 0%, #184d47 100%)",
                "linear-gradient(135deg, #f39c12 0%, #d35400 100%)",
                "linear-gradient(135deg, #6c5ce7 0%, #341f97 100%)",
                "linear-gradient(135deg, #e17055 0%, #d63031 100%)"
              );
              foreach ($main_category as $key => $v) { 
                $bg_grad = $gradients[$key % count($gradients)];
                $icon = $category_icons[$key % count($category_icons)];
                $cnt=0; 
                foreach ($v['products'] as $sk => $sv){ 
                  if($sv['product']>0) { $cnt += $sv['product']; }
                }
          ?>
          <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
            <div class="dash-stat-widget p-3 bg-white" style="border-radius: 14px; border: 1px solid #e2ece6; box-shadow: 0 4px 15px rgba(0,0,0,0.04); transition: transform 0.25s ease, box-shadow 0.25s ease;">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="stat-icon-wrap d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; border-radius: 12px; background: <?php echo $bg_grad; ?>; color: #ffffff; box-shadow: 0 4px 12px rgba(0,0,0,0.12);">
                  <i class="fa <?php echo $icon; ?>" style="font-size: 1.15rem;"></i>
                </div>
                <span class="badge font-weight-bold" style="color: #179957; background: #e8f8f0; font-size: 0.75rem; padding: 4px 8px; border-radius: 6px;">Active</span>
              </div>
              <h3 class="counter-count font-weight-bold mb-0" style="color: #184d47; font-size: 1.8rem; font-family: 'Inter', sans-serif; background: none; width: auto; height: auto; line-height: 1; border-radius: 0; display: block; text-align: left; margin: 10px 0 3px 0;"><?php echo $cnt; ?></h3>
              <p class="font-weight-semibold mb-0" style="font-size: 0.92rem; text-transform: capitalize; color: #4a5568 !important;"><?php echo $v['category']; ?></p>
            </div>
          </div>
          <?php } ?>
        </div>

        <!-- Today's Orders & Pending Ratings -->
        <div class="row mb-4">
          <!-- Today's Orders Card -->
          <div class="col-lg-9 mb-3">
            <div class="card h-100 mb-0">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <div>
                    <h4 class="card-title mb-0" style="font-size: 1.2rem;">Today's Orders</h4>
                    <p class="text-muted small mb-0">Real-time incoming customer orders for <?php echo date("F j, Y"); ?></p>
                  </div>
                  <span class="badge badge-success p-2 px-3" style="font-size: 0.82rem; border-radius: 8px;"><i class="fa fa-shopping-cart mr-1"></i> <?php echo count($OrderData); ?> Orders Today</span>
                </div>
                <div class="table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>City</th>
                        <th>Amount</th>                        
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($OrderData)) { 
                        foreach ($OrderData as $key => $val) { ?>
                      <tr>
                        <td class="font-weight-bold"><?php echo ($key+1);?></td>
                        <td><span class="badge badge-light text-dark font-weight-bold" style="border: 1px solid #e0e0e0;"><?php echo $val['order_id'];?></span></td>
                        <td class="font-weight-bold" style="color: #184d47;"><?php echo ucwords($val['name']." ".$val['surname']);?></td>
                        <td><?php echo ucwords($val['billing_city']);?></td>
                        <td class="font-weight-bold text-success">₹<?php echo number_format($val['final_total'], 2);?></td>
                        <td>
                          <div class="action-btn-group">
                            <a href="<?php echo base_url()."administrator/order/view/".md5($val['order_id']);?>" target="_blank" class="btn btn-sm btn-outline-primary btn-action-icon" title="Print Invoice" data-toggle="tooltip"><i class="fa fa-print"></i></a>
                            <a href="<?php echo base_url()."administrator/order/detail/".md5($val['order_id']);?>" class="btn btn-sm btn-outline-info btn-action-icon" title="View Order Details" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                          </div>
                        </td>
                      </tr>
                      <?php } } else { ?>
                      <tr>
                        <td colspan="6" class="text-center p-4 text-muted">
                          <i class="fa fa-inbox mb-2 text-muted d-block" style="font-size: 2.2rem; opacity: 0.5;"></i>
                          No orders recorded for today yet.
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Pending Rating Card -->
          <div class="col-lg-3 mb-3">
            <div class="card h-100 mb-0" style="background: linear-gradient(135deg, #fff 0%, #fdfbf7 100%); border: 1px solid #f6e0b5 !important;">
              <div class="card-body d-flex flex-column align-items-center justify-content-center text-center p-4">
                <div class="rating-icon-box d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, #f39c12 0%, #d35400 100%); color: #fff; box-shadow: 0 6px 18px rgba(243, 156, 18, 0.3);">
                  <i class="fa fa-star" style="font-size: 1.6rem;"></i>
                </div>
                <h2 class="counter-count font-weight-bold mb-1" style="color: #d35400; font-size: 2.2rem; background: none; width: auto; height: auto; line-height: 1; border-radius: 0; display: block; text-align: center; margin: 0;"><?php echo $total_pending_product_rating; ?></h2>
                <h5 class="font-weight-bold mb-2" style="color: #184d47;">Pending Reviews</h5>
                <p class="text-muted small mb-3">Customer product ratings awaiting admin approval.</p>
                <a href="<?php echo base_url(); ?>administrator/rating" class="btn btn-warning text-white btn-block font-weight-bold" style="border-radius: 10px; background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%); border: none;">Manage Ratings <i class="fa fa-arrow-right ml-1"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Category Products Breakdown -->
        <div class="row">
          <?php foreach ($main_category as $key => $v) { ?>
          <div class="col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
              <div class="card-header list-group-header-brand d-flex align-items-center justify-content-between">
                <span class="font-weight-bold"><i class="fa fa-tags mr-2"></i> <?php echo $v['category']; ?></span>
                <span class="badge badge-light text-dark font-weight-bold"><?php echo $v['products'][0]['product']; ?> Items</span>
              </div>
              <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex align-items-center justify-content-between p-3">
                    <span><i class="fa fa-cube text-primary mr-2"></i> Total Active Products</span>
                    <span class="badge badge-primary font-weight-bold px-3 p-2"><?php echo $v['products'][0]['product']; ?></span>
                  </li>
                  <li class="list-group-item d-flex align-items-center justify-content-between p-3">
                    <span><i class="fa fa-bolt text-warning mr-2"></i> New Arrivals</span>
                    <span class="badge badge-warning text-white font-weight-bold px-3 p-2"><?php echo $v['products'][0]['new_arrival']; ?></span>
                  </li>
                  <li class="list-group-item d-flex align-items-center justify-content-between p-3">
                    <span><i class="fa fa-star text-info mr-2"></i> Best Sellers</span>
                    <span class="badge badge-info font-weight-bold px-3 p-2"><?php echo $v['products'][0]['best_selling']; ?></span>
                  </li>
                  <li class="list-group-item d-flex align-items-center justify-content-between p-3" style="background-color: #f4fbf7;">
                    <span class="font-weight-bold" style="color: #179957;"><i class="fa fa-shopping-bag mr-2"></i> Orders Today</span>
                    <span class="badge badge-success font-weight-bold px-3 p-2"><?php echo $v['orders']; ?></span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

      </div>
      <?php $this->load->view('administrator/common/footer');?>
    </div>
  </div>
</div>
<?php $this->load->view('administrator/common/footer-js');?>
<script>
    $('.counter-count').each(function () {
    $(this).prop('Counter',0).animate({
    Counter: $(this).text()
    }, {
    duration: 3000,
    easing: 'swing',
    step: function (now) {
    $(this).text(Math.ceil(now));
    }
    });
    });
</script>
</body>
</html>