<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('administrator/common/header-js');?>
  </head>
  <div class="loading style-2" style="display: none;">
    <div class="loading-wheel"></div>
  </div>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php $this->load->view('administrator/common/header');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <?php $this->load->view('administrator/common/right_sidebar');?>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <?php $this->load->view('administrator/common/sidebar');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12">
                <div id="errormsg"></div>
                <?php $this->load->view('administrator/common/errors');?>
              </div>
            </div>
            <div class="row d-flex justify-content-center mb-4">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sales Report</h4>
                    <hr>
                    <form method="POST" action="<?php echo base_url()."administrator/report/orders"; ?>" target="_blank" id="form_one">
                      <div class="row mb-3">
                        <div class="col-md-2 form-group">
                          <label for="designation">From Date<span class="text-danger">*</span></label>
                          <div id="datepicker-popup" class="input-group date">
                            <input type="text" name="from_date" class="form-control" id="from_date_first" placeholder="From Date"   value="<?php  echo date('d/m/Y');  ?>" required>
                            <span class="input-group-addon input-group-append border-left"> <span class="mdi mdi-calendar input-group-text" id="from_datebtn"></span> </span> </div>
                            <?php echo '<div class="text-danger">'.form_error('from_date').'</div>' ?> </div>
                            <div class="col-md-2 form-group">
                              <label for="designation">To Date <span class="text-danger">*</span></label>
                              <div id="datepicker-popup" class="input-group date">
                                <input type="text" name="to_date" class="form-control" id="to_date_first" placeholder="To Date"   value="<?php  echo date('d/m/Y');  ?>" required>
                                <span class="input-group-addon input-group-append border-left"> <span class="mdi mdi-calendar input-group-text" id="to_datebtn"></span> </span> </div>
                                <?php echo '<div class="text-danger">'.form_error('to_date').'</div>' ?> </div>
                                <div class="col-md-5 form-group">
                                  <label for="designation">Select Customer <span class="text-danger">*</span></label>
                                  <select name="user_id" id="user_id"  class="form-control js-example-basic-single" style="width:100%">
                                    <option value="all">-All-</option>
                                   
                                    <?php foreach ($users as $key => $value) { ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']." ".$value['surname']; ?></option>
                                    <?php
                                    } ?>
                                  </select>
                                  <?php echo '<div class="text-danger">'.form_error('dealer_name').'</div>' ?> </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <label for="exampleInputName1">Transaction Type</label>
                                      <select class="form-control border-success" id="payment_mode" name="payment_mode">
                                        <option>-All-</option>
                                        <option>Success</option>
                                        <option>Cancel</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col-md-3 form-group">
                                    <label for="designation">&nbsp;</label>
                                    <div  class="input-group">
                                      <?php /*?><button type="submit" onClick="change_url('excel');" name="export_data" value="export_data" id="btn_submit_excel" class="btn btn-sm btn-success mr-2 mb-2 pull-right">Export Report</button><?php */?>
                                      <button type="submit" onClick="change_url('print');" name="print_data" value="print_data" id="btn_submit_print" class="btn btn-sm btn-primary mr-2 mb-2 pull-right">Print Report</button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row d-flex justify-content-center mb-4">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Product Report</h4>
                              <hr>
                              <form method="POST" action="<?php echo base_url()."administrator/report/product"; ?>" target="_blank" id="form_two">
                                <div class="row mb-3">
                                  <div class="col-md-2 form-group">
                                    <label for="designation">From Date<span class="text-danger">*</span></label>
                                    <div id="datepicker-popup" class="input-group date">
                                      <input type="text" name="from_date" class="form-control" id="from_date_third" placeholder="From Date"   value="<?php  echo date('d/m/Y');  ?>" required>
                                      <span class="input-group-addon input-group-append border-left"> <span class="mdi mdi-calendar input-group-text" id="pro_from_datebtn"></span> </span> </div>
                                      <?php echo '<div class="text-danger">'.form_error('from_date').'</div>' ?> </div>
                                      <div class="col-md-2 form-group">
                                        <label for="designation">To Date <span class="text-danger">*</span></label>
                                        <div id="datepicker-popup" class="input-group date">
                                          <input type="text" name="to_date" class="form-control" id="to_date_fourth" placeholder="To Date"   value="<?php  echo date('d/m/Y');  ?>" required>
                                          <span class="input-group-addon input-group-append border-left"> <span class="mdi mdi-calendar input-group-text" id="pro_to_datebtn"></span> </span> </div>
                                          <?php echo '<div class="text-danger">'.form_error('to_date').'</div>' ?> </div>
                                          <div class="col-md-3 form-group">
                                            <label for="designation">Select Category <span class="text-danger">*</span></label>
                                            <select name="category" id="category"  class="form-control js-example-basic-single" style="width:100%" onChange="get_ajax_sub(this.value);">
                                              <option value="All">-All-</option>
                                              <?php  foreach($product_category as $key=>$val) { ?>
                                              <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                              <?php } ?>
                                            </select>
                                            <?php echo '<div class="text-danger">'.form_error('category').'</div>' ?> </div>
                                            <div class="col-md-5">
                                              <div class="form-group">
                                                <label for="exampleInputName1">Select Product</label>
                                                <select name="product_id" id="product_id"  class="form-control js-example-basic-single" style="width:100%">
                                                  <option value="All">-All-</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row mb-3">
                                            <div class="col-md-3 form-group">
                                              <label for="designation">&nbsp;</label>
                                              <div  class="input-group">
                                                <?php /*?><button type="submit" onClick="change_url('excel');" name="export_data" value="export_data" id="btn_submit_excel" class="btn btn-sm btn-success mr-2 mb-2 pull-right">Export Report</button><?php */?>
                                                <button type="submit" onClick="change_url('print');" name="print_data" value="print_data" id="btn_submit_print" class="btn btn-sm btn-primary mr-2 mb-2 pull-right">Print Report</button>
                                              </div>
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                
                              </div>
                              
                              <!-- content-wrapper ends -->
                              <!-- partial:partials/_footer.html -->
                              <?php $this->load->view('administrator/common/footer');?>
                              <!-- partial -->
                            </div>
                            <!-- main-panel ends -->
                          </div>
                          <!-- page-body-wrapper ends -->
                        </div>
                        <!-- container-scroller -->
                        <?php $this->load->view('administrator/common/footer-js');?>
                        <script src="<?php echo  base_url(); ?>assest/administrator/js/select2.js"></script>
                        <script>
                        $( function() {
                        $( "#from_date_first" ).datepicker({format: 'dd/mm/yyyy'});
                        $( "#to_date_first" ).datepicker({format: 'dd/mm/yyyy'});
                          $( "#from_date_third" ).datepicker({format: 'dd/mm/yyyy'});
                        $( "#to_date_fourth" ).datepicker({format: 'dd/mm/yyyy'});
                          });
                        </script>
                        <script type="text/javascript">
                        function get_ajax_sub(cat_id)
                        {
                        if(cat_id!="" && cat_id>0 && cat_id!='All')
                        {
                        $.ajax({
                        type: 'POST',
                        dataType:'JSON',
                        url:'<?php echo base_url(); ?>administrator/report/getProducts',
                        data: {cat_id:cat_id},
                        error: function() {
                        console.log("Error");
                        },
                        success: function(data) {
                        $('#product_id').html(data.html);
                        }
                        });
                        }else{
                        $('#product_id').html('<option value="All">- All Products -</option>');
                        
                        }
                        }
                        </script>
                      </body>
                    </html>