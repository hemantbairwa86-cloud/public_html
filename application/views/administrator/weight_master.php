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
        <div class="row">
          <?php $this->load->view('administrator/common/errors');?>
          <div class="col-md-4 ">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"><?php echo $button_value;?></h4>
                <hr>
                <?php if(isset($id) && $id!=""){
                            $action=base_url().'administrator/master/edit_weight/'.$id;
                          }else{
                            $id=0;
                            $action=base_url().'administrator/master/add_weight';
                          }?>
                <?php  echo form_open_multipart($action, array('id' => 'myForm','autocomplete' => 'off'));?>
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                <div class="form-group mb-4">
                  <label for="exampleInputName1">Weight Title <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="name" name="name" onChange="check_duplicate('<?php echo $id; ?>')" value="<?php echo $name; ?>" placeholder="for ex. 100">
                  <?php echo '<div class="text-danger">'.form_error('name').'</div>' ?> <span class="text-danger" id="duplicate_errormsg" style="display: none;"></span> </div>
                <div class="form-group">
                  <label for="exampleInputName1">Unit <span class="text-danger">*</span></label>
                  <select class="form-control" id="unit" name="unit" onChange="check_duplicate('<?php echo $id; ?>')">
                    <option value="">Select Unit</option>
                    <?php foreach ($this->config->item('weight_arr') as $key => $value) { ?>
                    <option <?php if($unit == $key){ echo 'selected'; } ?> value="<?php echo $key ?>"><?php echo $value; ?></option>
                    <?php
                        } ?>
                  </select>
                  <?php echo '<div class="text-danger">'.form_error('unit').'</div>' ?> </div>
                <hr>
                <a href="<?php echo base_url('administrator/master/weight');?>" class="btn btn-outline-danger">Cancel</a>
                <button type="submit" id="btn_submit" class="btn btn-success mr-2 pull-right"><?php echo $button_value;?></button>
                <?php echo form_close(); ?> </div>
            </div>
          </div>
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">View Weight</h4>
                <hr>
                <div class="table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Weight Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;
                      if(!empty($viewdata)){
                      foreach($viewdata as $key=>$val)
                      { $unit = $this->config->item('weight_arr');
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php  echo strtoupper($val['weight_name']) ; // echo $val['name'].' '.$unit[$val['unit']]; ?></td>
                        <td><?php if($val['status'] == 1){ ?>
                          <button type="button" class="btn btn-sm btn-toggle changestatus active" data-table="weight_master" data-field="status" data-id-name="id" data-id="<?php echo $val['id'];?>" data-toggle="button" aria-pressed="1" autocomplete="off">
                          <div class="handle"></div>
                          </button>
                          <?php } else { ?>
                          <button type="button" class="btn btn-sm btn-toggle changestatus" data-table="weight_master" data-field="status" data-id-name="id" data-id="<?php echo $val['id'];?>" data-toggle="button" aria-pressed="0" autocomplete="off">
                          <div class="handle"></div>
                          </button>
                          <?php } ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url(); ?>administrator/master/edit_weight/<?php echo $val['id']; ?>" class="btn btn-sm btn-outline-primary btn-action-icon" title="Edit Weight Variant" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>
                          <a href="javascript:void(0);" onClick="check_confirm_delete('<?php echo $val['id']; ?>');" class="btn btn-sm btn-outline-danger btn-action-icon" title="Delete Weight Variant" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php
                      $i++;
                      } } ?>
                    </tbody>
                  </table>
                </div>
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
	 });

    function check_confirm_delete(row_id)
    {
      swal({
            title: "Delete",
            text: 'Are you sure you want to delete this weight variant?',
            icon: "error",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                window.location.href = "<?php echo base_url() ?>"+"administrator/master/delete_weight/"+row_id;
            }
          });
    }
    </script>
</body>
</html>
