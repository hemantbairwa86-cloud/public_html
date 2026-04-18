<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('administrator/common/header-js');?>
<style type="text/css">
.counter {
  text-align: center;
}
.employees, .customer, .design, .order {
  margin-top: 10px;
  margin-bottom: 10px;
}
.counter-count {
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 2.1em;
  background-color: #fc5c65;
  border-radius: 50%;
  position: relative;
  color: #ffffff;
  text-align: center;
  line-height: 102px;
  width: 150px;
  height: 100px;
  -webkit-border-radius: 5%;
  -moz-border-radius: 5%;
  -ms-border-radius: 5%;
  -o-border-radius: 5%;
  display: inline-block;
}
.employee-p, .customer-p, .order-p, .design-p {
  font-size: 18px;
  color: #000000;
  line-height: 34px;
  margin-bottom: 40px;
}
.silver {
  background-color: #d3d3d3;
  background-image: linear-gradient(315deg, #d3d3d3 0%, #7f8c8d 74%);
}
</style>
</head>
<body>
<div class="container-scroller">
  <!-- partial:../../partials/_navbar.html -->
  <?php $this->load->view('administrator/common/header');?>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <?php $this->load->view('administrator/common/right_sidebar');?>
    <?php $this->load->view('administrator/common/sidebar');?>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="card">
          <div class="card-body">
            <div class="counter">
              <div class="row">
                <div class="col-md-12">
                  <div class="row d-flex justify-content-center">
                    <?php $a=array("1abc9c","9b59b6","2980b9","e67e22","2c3e50","c0392b","8e44ad","B53471","1289A7","6F1E51","1e3799");
                        $random_keys=array_rand($a,10);
                        foreach ($main_category as $key => $v) { ?>
                    <div class="col-lg-2 col-md-2 col-xs-12">
                      <div class="customer">
                        <p class="counter-count" style="background-color:#<?php echo $a[$random_keys[$key]]; ?>;">
                          <?php 
                            $cnt=0; 
                            foreach ($v['products'] as $sk => $sv){ 
                                  if($sv['product']>0)
                                  {
                                    $cnt +=$sv['product'];
                                  }
                               } 
                               echo $cnt;
                            ?>
                        </p>
                        <p class="customer-p"><?php echo $v['category']; ?></p>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--      Cutomer Inquiry -->
      <div class="content-wrapper">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Today's Order</h4>
            <div class="row">
              <div class="col-10 mb-4">
                <div class="table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Order #</th>
                        <th>Customer Name</th>
                        <th>City</th>
                        <th>Amount</th>                        
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  foreach ($OrderData as $key => $val) { ?>
                      <tr>
                        <td><?php echo ($key+1);?></td>
                        <td><?php echo $val['order_id']."<br>".$val['razorpay_payment_id'];?></td>
                        <td><?php echo ucwords($val['name']." ".$val['surname']);?></td>
                        <td><?php echo ucwords($val['billing_city']);?></td>
                        <td><?php echo $val['final_total'];?></td>
                        <td><a href="<?php echo base_url()."administrator/order/view/".md5($val['order_id']);?>" target="_blank" class="btn btn-primary">Print</a>
                        <a href="<?php echo base_url()."administrator/order/detail/".md5($val['order_id']);?>" class="btn btn-success">Detail</a>
                        </td>
                      </tr>
                      <?php  } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-xs-12 text-center">
                <div class="customer">
                  <p class="counter-count" style="background-color:maroon;">
                    <?php echo $total_pending_product_rating ; ?>
                  </p>
                  <p class="customer-p" style="font-size:1.0rem;">Pending Product Rating</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--      Cutomer Inquiry -->
      <div class="content-wrapper">
        <div class="row">
          <?php foreach ($main_category as $key => $v)
              { ?>
          <div class="col-lg-4 mb-5">
            <div class="block">
              <div class="list-group border-bottom"> <a href="javascript:void(0);" class="list-group-item" style="background-color:#34569e;color:#fff"><?php echo $v['category']; ?></a>
                <a href="javascript:void(0);" class="list-group-item">Total Products <span class="badge badge-primary pull-right"><?php echo $v['products'][0]['product']; ?> </span></a>
                <?php /*?><a href="javascript:void(0);" class="list-group-item">Active Products<span class="badge badge-primary pull-right">2</span></a>
                <a href="javascript:void(0);" class="list-group-item">Inactive Products<span class="badge badge-danger pull-right">2</span></a><?php */?>
                <a href="javascript:void(0);" class="list-group-item">New Arrival<span class="badge badge-primary pull-right"><?php echo $v['products'][0]['new_arrival']; ?></span></a>
                <a href="javascript:void(0);" class="list-group-item">Best Selling<span class="badge badge-primary pull-right"><?php echo $v['products'][0]['best_selling']; ?></span></a>
                <a href="javascript:void(0);" class="list-group-item" style="color:#009933">Order Today<span class="badge badge-success pull-right"><?php echo $v['orders']; ?></span></a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <?php $this->load->view('administrator/common/footer');?>
      <!-- partial -->
    </div>
  </div>
</div>
<?php $this->load->view('administrator/common/footer-js');?>
<script>
    $('.counter-count').each(function () {
    $(this).prop('Counter',0).animate({
    Counter: $(this).text()
    }, {
    duration: 5000,
    easing: 'swing',
    step: function (now) {
    $(this).text(Math.ceil(now));
    }
    });
    });
    </script>
</body>
</html>