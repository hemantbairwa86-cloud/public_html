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
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Shipping Details</h4>
                <hr>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo strtoupper($cust['name']." ".$cust['surname']);?> </h5>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><?php echo ucwords($OrderData['billing_address']);?> <br>
                        <?php echo ucwords($OrderData['billing_city']);?> - <?php echo ucwords($OrderData['billing_pincode']);?> <br>
                        <?php echo ucwords($OrderData['billing_state_name']);?> - <?php echo ucwords($OrderData['billing_country_name']);?></li>
                      <li class="list-group-item"> Contact : <?php echo ucwords($OrderData['billing_mobile']);?></li>
                      <li class="list-group-item">Email : <?php echo $OrderData['billing_email'];?> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mt-4">
              <div class="card-body">
                <h4 class="card-title">Customer Details
                  <?php  $customerdata = getCustomerDetails($OrderData['customer_id']);  ?>
                </h4>
                <hr>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo ucwords($customerdata['name'])." ".ucwords($customerdata['surname']); ?> </h5>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><?php echo ucwords($customerdata['address_1']);?> <br>
                        <?php echo ucwords($customerdata['city']);?> - <?php echo ucwords($customerdata['pincode']);?> <br>
                        <?php echo ucwords($customerdata['state_name']);?> - <?php echo ucwords($customerdata['country_name']);?></li>
                      <li class="list-group-item"> Contact : <?php echo $customerdata['mo_number'];?></li>
                      <li class="list-group-item">Email : <?php echo strtolower($customerdata['email']);?> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8 stretch-card mb-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Order Detail <span class="badge badge-primary pull-right">Status : <?php if($OrderData['paid_status']==1){ echo "Paid"; }else{ echo "Failed"; } ?></span> </h4>
                <hr>
                <div class="row">
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card text-black">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-6">
                            <div class="wrapper">
                              <h5 class="mb-1">Order No</h5>
                              <h4 class="mb-1"><strong><?php echo $OrderData['order_id'];?></strong></h4>
                            </div>
                          </div>
                          <div class="col-6 d-flex justify-content-end">
                            <div class="wrapper">
                              <h5 class="mb-1">Order Date</h5>
                              <h4 class="mb-1"><strong><?php echo date('d/m/Y',strtotime($OrderData['oreder_date']));?></strong></h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table align="center" cellpadding="10" cellspacing="0" border="0" width="100%" id="customers" style="line-height:32px;padding:3px;" frame="box" rules="all">
                        <tr>
                          <th style="width:65px;padding:10px;">Sr No</th>
                          <th colspan="4" style="width:430px;">Product Description </th>
                          <th style="text-align:center">Rate</th>
                          <th style="text-align:center">Qty</th>
                          <th style="text-align:center">Amount</th>
                        </tr>
                        <?php  
                  
                    $i=1;
                    foreach ($OrderProductDetails as $key => $value) { ?>
                        <tr class="item <?php echo ($i==count($OrderProductDetails))?"last":''; ?>">
                          <td style="text-align:center;border-bottom:none;border-top:none;"><?php echo ($key+1);?></td>
                          <td  colspan="4" style="border-bottom:none;border-top:none;vertical-align:middle;"><img src="<?php echo base_url(); ?>uploads/product/thumbnails/<?php echo $value['image_name'];?>" height="60" width="auto" /> <span style="vertical-align:top"><?php echo $value['product_category']."-".$value['product_name'];?> &nbsp;<b style="color:#0066CC">(<?php echo ucwords($value['productcode']);?>)</b></span> </td>
                          <td style="font-weight:bold;text-align:right;border-bottom:none;border-top:none;padding-right:10px;"><?php echo $value['price'];?> </td>
                          <td style="font-weight:bold;text-align:center;border-bottom:none;border-top:none;"><?php echo $value['qty'];?> </td>
                          <td style="font-weight:bold;text-align:right;border-bottom:none;border-top:none;padding-right:10px;"><?php echo $value['subtotal'];?> </td>
                        </tr>
                        <?php  } 
                         for($j=1;$j<=5-$i;$j++){  ?>
                        <tr class=''>
                          <td style='border-bottom:none;border-top:none;'>&nbsp;</td>
                          <td colspan="4" style='border-bottom:none;border-top:none;'>&nbsp;</td>
                          <td style='border-bottom:none;border-top:none;'>&nbsp;</td>
                          <td style='border-bottom:none;border-top:none;'>&nbsp;</td>
                        </tr>
                        <?php } ?>
                        <tr>
                          <td colspan="8" style="line-height:24px;"><b>Remarks :</b> <?php echo $OrderData['remarks']; ?></td>
                        </tr>
                        <tr style="background-color:#F4F4F4">
                          <td colspan="7" style="text-align:right;font-weight:bold;">Sub Total</td>
                          <td style="font-weight:bold;text-align:right;padding-right:10px;"><?php echo $OrderData['total_amount'];?></td>
                        </tr>
                        <tr>
                          <td colspan="7" style="text-align:right;font-weight:bold">Shipping Charge</td>
                          <td style="font-weight:bold;text-align:right;padding-right:10px;"><?php echo $OrderData['total_shipping_charge'];?></td>
                        </tr>
                        <tr style="background-color:#F4F4F4">
                          <td colspan="7" style="text-align:right;font-weight:bold">Total Amount</td>
                          <td style="font-weight:bold;text-align:right;padding-right:10px;"><?php 
						  $tamount = $OrderData['total_amount'] + $OrderData['total_shipping_charge'];
							echo number_format($tamount, 2, '.', '');
							?></td>
                        </tr>
                        <tr>
                          <td colspan="7" style="text-align:right;font-weight:bold">Discount</td>
                          <td style="font-weight:bold;text-align:right;padding-right:10px;"><?php echo $OrderData['discount_rs'];?></td>
                        </tr>
                        <tr style="background-color:#F4F4F4">
                          <td colspan="7" style="text-align:right;font-weight:bold">Net Amount</td>
                          <td style="font-weight:bold;text-align:right;padding-right:10px;font-weight:bold"><?php echo $OrderData['final_total'];?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <a href="<?php echo base_url(); ?>administrator/order" class="btn btn-outline-danger mt-5">Back</a> </div>
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
