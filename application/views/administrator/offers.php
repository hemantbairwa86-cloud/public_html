<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('administrator/common/header-js');?>
</head>
<body>
<div class="loading style-2" style="display: none;">
  <div class="loading-wheel"></div>
</div>
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
        <div class="row d-flex justify-content-center">
          <div class="col-md-12">
            <div id="errormsg"></div>
            <?php $this->load->view('administrator/common/errors');?>
          </div>
          
          
          
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                      <h4 class="card-title">Discount / Offer</h4>
                      
                      <?php $action=base_url().'administrator/manage/offer';?>
                  	  <?php echo form_open_multipart($action, array('id' => 'myForm'));?>
                     
	                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-5 col-form-label"><b>Enter Discount in % </b></label>
                          <div class="col-sm-5">
                           <div class="input-group">
                          
                          <input type="number" name="discount" class="form-control" placeholder="Enter Discount" value="<?php echo $offers['discount'] ; ?>">
                          <div class="input-group-append bg-primary border-primary">
                            <span class="input-group-text bg-transparent"><i class="fa fa-percent text-white"></i></span>
                          </div>
                          <?php echo '<div id="error_message" style="color:#FF0000">'.form_error('discount').'</div>' ?>
                        </div>
                          </div>
                        </div>
                     
                        <button type="submit" class="btn btn-success mr-2 mt-5">Save Discount</button>
                        <a href="<?php echo base_url(); ?>administrator/manage/offer" class="btn btn-light mt-5">Cancel</a>
                      </form>
                    
                     	<div class="alert alert-secondary mt-5" role="alert"><b>Last Updated  : </b><?php echo date('d/m/Y H:i:s A',strtotime($offers['updated_at'])) ; ?></div>
                    
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
<script src="<?php echo  base_url(); ?>assest/administrator/js/file-upload.js"></script>
<script type="text/javascript">

    function check_duplicate(table_name,row_id,field_name,field_value)

    {

    if(table_name != '' && field_name != '' && field_value != '')

    {

    $.ajax({

    type:'POST',

    url:'<?php echo base_url(); ?>administrator/master/check_duplicate',

    data:{'table_name':table_name,'row_id':row_id,'field_name':field_name,'field_value':field_value},

    dataType:'JSON',

    success:function(data)

    {

    if(data.error == 1)

    {

    $("#duplicate_errormsg").show();

    $("#duplicate_errormsg").text(data.msg);

    $("#btn_submit").prop('disabled',true);

    }

    else

    {

    $("#duplicate_errormsg").hide();

    $("#duplicate_errormsg").text('');

    $("#btn_submit").prop('disabled',false);

    }

    },

    });

    }

    }

    </script>
    <script type="text/javascript">
    setTimeout(function(){
      $('#myDiv').fadeOut(500);
    }, 5000);
  	$(document).ready(function(){    
		$(".loading").attr('style',"display: none;");
	});
	 $("#myForm").on('submit',function(){
		$(".loading").attr('style',"display: block;");
	 }) 	
    </script>
</body>
</html>
