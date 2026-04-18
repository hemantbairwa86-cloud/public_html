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
  <?php $this->load->view('administrator/common/header');?>
  <div class="container-fluid page-body-wrapper">
    <?php $this->load->view('administrator/common/right_sidebar');?>
    <?php $this->load->view('administrator/common/sidebar');?>
    <div class="main-panel">
      <div class="content-wrapper">
        <?php $this->load->view('administrator/common/errors');?>
        <div class="row d-flex justify-content-center">
          <div class="col-md-6 stretch-card mb-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Counter Details</h4>
                <hr>
                <?php $action=base_url().'administrator/counter';?>
                <?php  echo form_open_multipart($action, array('id' => 'myForm'));?>
                <div class="form-group">
                  <label for="exampleInputName1">Satisfied Clients <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="val1" name="val1" value="<?php echo $val1; ?>" placeholder="Name">
                  <?php echo '<div id="error_message" class="text-danger">'.form_error('val1').'</div>' ?> </div>
                <div class="form-group">
                  <label for="exampleInputEmail3">Total Products <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="val2" name="val2" value="<?php echo $val2; ?>" placeholder="Name">
                  <?php echo '<div id="error_message" class="text-danger">'.form_error('val2').'</div>' ?> </div>
                <div class="form-group">
                  <label for="exampleInputEmail3">Manufacturing <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="val3" name="val3" value="<?php echo $val3; ?>" placeholder="Name">
                  <?php echo '<div id="error_message" class="text-danger">'.form_error('val3').'</div>' ?> </div>
                <div class="form-group">
                  <label for="exampleInputEmail3">Cities Cover <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="val4" name="val4" value="<?php echo $val4; ?>" placeholder="Name">
                  <?php echo '<div id="error_message" class="text-danger">'.form_error('val4').'</div>' ?> </div>
                <hr>
                <button type="submit" class="btn btn-success mr-2 pull-right"><?php echo $button_value;?></button>
                <?php echo form_close(); ?> </div>
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
<script src="<?php echo  base_url(); ?>assest/administrator/js/file-upload.js"></script>
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
	 $("#myForm2").on('submit',function(){
		$(".loading").attr('style',"display: block;");
	 })
	 $("#myForm3").on('submit',function(){
		$(".loading").attr('style',"display: block;");
	 })
	 $("#myForm4").on('submit',function(){
		$(".loading").attr('style',"display: block;");
	 }) 
    </script>
</body>
</html>