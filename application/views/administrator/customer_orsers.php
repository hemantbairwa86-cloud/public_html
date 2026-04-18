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
        <?php $this->load->view('administrator/common/errors');?>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Customer Details</h4>
                <hr>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo ucwords($customer['name'])." ".ucwords($customer['surname']); ?></h5>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><?php echo $customer['address_1']; ?></li>
                      <li class="list-group-item"><?php echo $customer['city']; ?> <?php echo $customer['pincode']; ?></li>
                      <li class="list-group-item"><?php echo $customer['state_name']; ?> - <?php echo $customer['country_name']; ?></li>
                      <li class="list-group-item">Contact : <?php echo $customer['mo_number']; ?></li>
                      <li class="list-group-item">Email : <?php echo $customer['email']; ?></li>
                    </ul>
                  </div>
                </div>
               </div>
            </div>
            <div class="card mt-3">
                  <div class="card-body">
                    <h5 class="card-title">Shipping Address</h5>
                    <ul class="list-group list-group-flush">
                      <?php  foreach($user_address as $akey=>$av){ ?>
                      <li class="list-group-item">
                      <address>
                                  <p><?php echo $av['address']; ?> <br>
                                  <?php echo $av['landmark']; ?><br>
                                  <?php echo $av['city']." - ".$av['pincode']."<br>";
                                     echo $av['state_name']." - ".$av['country_name']."<br>"; ?></p>
                                 <?php /*?> <p>Mobile: <?php echo $av['mo_number']; ?></p><?php */?>
                                  </address>
                      </li>
                      <?php } ?>
                      
                    </ul>
                  </div>
                </div>
          </div>
          <div class="col-md-8 mb-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"><i class="fa fa-shopping-cart" style="color:#009966"></i> Orders</h4>
                <hr>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order_listing" class="table">
                        <thead>
                          <tr>
                            <th>Sr No.</th>
                            <th>Date</th>
                            <th>Order No.</th>                            
                            <th>Amount</th>
                            <th>Status</th>
                            <th>View</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $j=1; foreach ($orders as $key => $val) { 
						  	$mylink = base_url()."administrator/order/view/".md5($val['order_id']); 
							$detail = base_url()."administrator/order/detail/".md5($val['order_id']); 
						  ?>
                          <tr>
                            <td><?php echo $j; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($val['oreder_date'])); ?></td>
                            <td><?php echo $val['order_id']."<br>".$val['razorpay_payment_id']; ?></td>                            
                            <td><?php echo $val['final_total']; ?></td>
                            <td><?php if($val['paid_status']==1)
                                  {
                              echo '<label class="badge badge-success">Paid</label>';
                            }else{
                              echo  '<label class="badge badge-danger">Failed</label>';

                            } ?></td>
                            <td><?php echo '<a  href="'.$mylink.'" target="_blank" class="btn btn-outline-primary mb-2" >Print</a>&nbsp;&nbsp;<a  href="'.$detail.'" class="btn btn-outline-success" >Detail</a>' ; ?></td>
                          </tr>
                          <?php $j++; } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="card mt-5">
              <div class="card-body">
                <h4 class="card-title"><i class="fa fa-heart" style="color:#CC0000"></i>  Wishlist</h4>
                <hr>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>Sr No.</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Category</th>                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
							$i=1; 
							foreach($wishlistitems as $key=>$val){
							$images = get_product_images($val['products_id']);
							// echo "<pre>"; print_r($images);  exit;
						  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><img src="<?php  echo base_url().'uploads/product/'.$images[0]['image_name'];?>" style="height:50px;width:auto;" alt="<?php echo $val['productcode'];?>"></td>
                        <td><?php echo $val['pname']; ?></td>
                        <td><?php echo ucwords($val['collectionname']) ; ?></td>                        

                      </tr>
                      <?php $i++; } ?>
                    </tbody>
                  </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php $this->load->view('administrator/common/footer');?>
      <!-- partial -->
    </div>
  </div>
</div>
<?php $this->load->view('administrator/common/footer-js');?>
<script type="text/javascript">
            $(document).ready(function() {
              $('#order_listing').DataTable();
            });
      </script>
</body>
</html>
