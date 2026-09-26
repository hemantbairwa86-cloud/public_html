<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('administrator/common/header-js');?>
<link rel="stylesheet" href="<?php echo  base_url(); ?>assest/administrator/summernote/dist/summernote-bs4.css">
<style type="text/css">
</style>
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
    <div id="errormsg"></div>
    <div class="main-panel">
      <div class="content-wrapper">
        <?php if(isset($id) && $id!=""){
                              $action=base_url().'administrator/product/edit';
                            }else{
                              $action=base_url().'administrator/product/add';
                    } ?>
                <form action="<?php echo $action; ?>" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8" onSubmit="return validate()" autocomplete="off">
                 <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <div class="row  justify-content-center align-self-center ">
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"><?php echo $button_value;?></h4>
                <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="collectiontype">Category <span class="text-danger">*</span></label>
                        <select name='collectiontype' id="collectiontype" class="form-control border-primary">
                          <option value=''>Select Category</option>
                          <?php foreach ($colletion as $key => $value) { ?>
                          <option <?php if($collectiontype==$value['id']){ echo 'selected'; } ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                          <?php
                              } ?>
                        </select>
                        <?php echo '<div class="text-danger">'.form_error('collectiontype').'</div>' ?> </div>
                    </div>
                  </div>
                  <div class="row">
                       <div class="col-md-6">                   
                          <div class="form-group">
                            <label for="name">Product Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter Product Name">
                            <?php echo '<div class="text-danger">'.form_error('name').'</div>' ?>
                          </div>
                        </div> 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="productcode">Product Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="productcode" name="productcode" value="<?php echo $productcode; ?>" placeholder="Enter Product Code">
                        <?php echo '<div class="text-danger">'.form_error('productcode').'</div>' ?> </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12 mt-3">
                      <h4 class="card-title">Product Highlights</h4>
                      <div class="col-md-12 mb-5">
                        <div class="form-group">
                          <?php 
                                foreach ($highlights as $key => $value) { 
                              ?>
                          <div class="row">
                            <div class="chiller_cb">
                              <input id="highlights<?php echo $value['id']; ?>" name="highlights[]" type="checkbox"  value="<?php echo $value['name']; ?>" <?php if(isset($selectedhighlight)){ if(in_array($value['name'], $selectedhighlight)) {echo "checked"; } } ?>>
                              <label for="highlights<?php echo $value['id']; ?>"><?php echo $value['name']; ?> </label>
                              <span></span> </div>
                          </div>
                          <?php
                                } 
                              ?>
                          <div class="text-danger" id="cate_error" style="display: none;">
                            <p>Please Select Atleast One Highlights.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <h4 class="card-title">Product Images <span class="text-danger">*</span></h4>
                      <div class="form-group mb-4">
                        <div class="row align-items-center">
                          <div class="col-md-6">
                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="image_name[]" class="file-upload-default" multiple="" >
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Images">
                              <span class="input-group-append">
                              <button class="file-upload-browse btn btn-info" type="button"><i class="fa fa-cloud-upload"></i> Upload Photo</button>
                              </span> </div>
                          </div>
                          <div class="col-md-6">
                            <div class="upload-specs-info">
                              <span><i class="fa fa-arrows-alt"></i> Dimensions: <strong>1024 x 1024 px</strong></span>
                            </div>
                          </div>
                        </div>
                        <?php echo '<div class="text-danger">'.form_error('image_name[]').'</div>' ?> </div>
                      <div class="row mt-3 mb-2" id="new_file_previews"></div>
                    </div>
                  </div>
                  <div class="row" id="existing_file_previews">
                    <?php
                            if(!empty($image))
                            {
                              foreach ($image as $key => $value) { 
                                $thumb_rel = 'uploads/product/thumbnails/'.$value['image_name'];
                                $main_rel = 'uploads/product/'.$value['image_name'];
                                if (!file_exists($thumb_rel) && file_exists($main_rel)) {
                                    @copy($main_rel, $thumb_rel);
                                }
                                if (file_exists($thumb_rel)) {
                                    $img_src = base_url().$thumb_rel;
                                } elseif (file_exists($main_rel)) {
                                    $img_src = base_url().$main_rel;
                                } else {
                                    $img_src = base_url().'uploads/product/noimage.jpg';
                                }
                                $link_href = file_exists($main_rel) ? base_url().$main_rel : $img_src;
                    ?>
                    <div class="col-6 col-sm-4 col-md-3 mb-3" id="productimage<?php echo $value['id']; ?>">
                      <div class="preview-card-item text-center"> 
                        <div class="preview-img-wrapper">
                          <a href="<?php echo $link_href; ?>" target="_blank" title="Click to view full image">
                            <img src="<?php echo $img_src; ?>" alt="Product Thumbnail">
                          </a>
                        </div>
                        <div class="preview-details">
                          <div class="preview-filename" title="<?php echo $value['image_name']; ?>"><?php echo $value['image_name']; ?></div>
                        </div>
                        <div class="mt-2 text-center w-100"> 
                          <a onClick="check_confirm_delete('<?php echo $value['id']; ?>');" href="javascript:void(0);" class="btn btn-sm btn-outline-danger w-100" title="Delete Image"> <i class="fa fa-trash"></i> Delete </a> 
                        </div>
                      </div>
                    </div>
                    <?php
                              }
                            }
                          ?>
                  </div>
                  <br>
                  <div class="form-group mt-5">
                    <label for="description">Short Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="5" id="short_description" name="description" placeholder="Enter Description"><?php echo $description; ?></textarea>
                    <?php echo '<div class="text-danger">'.form_error('description').'</div>' ?> </div>
                  <hr> <br>
                  
                  <h4 class="card-title">Additional Information</h4>
                  <div class="form-group mt-4">

                      <textarea class="form-control" rows="8" name="additional_information" id="additional_information"><?php echo $additional_information; ?></textarea>
                    </div>
                  
                  
                  
                  <h4 class="card-title">Ingredient</h4>
                  <div class="row"  id="extrafields">
                    <input type="hidden" name="extra_edit_id[]" value="0">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="extrafield">Field </label>
                        <input type="text" class="form-control" id="extrafield" name="extrafield[]" placeholder="Enter Field Name ">
                        <?php echo '<div class="text-danger">'.form_error('extrafield').'</div>' ?> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="extrafieldvalue">Value </label>
                        <input type="text" class="form-control" id="extrafieldvalue" name="extrafieldvalue[]"  placeholder="Enter Field Value">
                        <?php echo '<div class="text-danger">'.form_error('extrafieldvalue').'</div>' ?> </div>
                    </div>
                  </div>
                  <div class="row" id="addmoreextrafield">
                    <div class="col-md-12">
                      <center>
                        <button type="button" class="btn btn-info mr-2 btn-sm" onClick="AddMoreExtraField();"> <i class="fa fa-plus"></i> Add more Field</button>
                      </center>
                    </div>
                  </div>
                  <br>
                  <?php
                          if(!empty($extrafileds)){
                            foreach ($extrafileds as $key => $value) { 
                      ?>
                  <div class="row" id="ProductExtraFiled<?php echo $value['id']; ?>">
                    <input type="hidden" name="extra_edit_id[]" value="<?php echo $value['id']; ?>">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="extrafield">Field </label>
                        <input type="text" class="form-control" name="extrafield[]" value="<?php echo $value['ename']; ?>">
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="extrafieldvalue">Value </label>
                        <input type="text" class="form-control" name="extrafieldvalue[]" value="<?php echo $value['evalue']; ?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group"> <br>
                        <a onClick="check_confirm_extra_delete('<?php echo $value['id']; ?>');" href="javascript:void(0);" class="btn btn-danger mr-2"> <i class="fa fa-trash"></i> </a> </div>
                    </div>
                  </div>
                  <?php
                            }
                          }
                      ?>
              </div>
            </div>
          </div>
          <div class="col-md-6 grid-margin stretch-card ">
          <div class="card">
              <div class="card-body">
                <h4 class="card-title">Product Price </h4>
                <hr>
                 <div class="row mb-2">
                 <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table" style="overflow:auto">
                    <thead>
                      <tr>
                        <th style="width:120px;font-weight:bold;">Weight</th>
                        <?php /* ?><th style="width:120px;font-weight:bold;">Old Price</th><?php */ ?>
                        <th style="width:120px;font-weight:bold;">M.R.P.</th>
                        <th style="font-weight:bold;">Action</th>
                      </tr>
                    </thead>
                    <tbody id="price_table">
                      <?php if(empty($product_price)){ ?>
                      <input type="hidden" id="prc_price_cnt" value="1">
                      <tr id="price_row_1">
                        <td>
                          <input type="hidden" name="edit_price_row[]" value="0">
                          <select name='sel_weight[]' id="sel_weight_1" style="padding:.4375rem .25rem"> 
                          <option value=''>Select Weight</option>
                          <?php foreach ($weight_master as $key => $value) { ?>
                          <option <?php if($sel_weight && $sel_weight==$value['id']){ echo "selected"; } ?> value="<?php echo $value['id']; ?>"><?php echo strtoupper($value['weight_name']); ?></option>
                          <?php
                              } ?>
                          </select>
                          <?php echo '<div class="text-danger">'.form_error('sel_weight_1').'</div>' ?>
                        </td>
                        <?php /* ?><td><input value="<?php if($txt_old_price){ echo $txt_old_price; } ?>" type="number" id="txt_old_price_1" name="txt_old_price[]"  placeholder="Old Price" style="padding:.4375rem .25rem;width:100px;"><?php echo '<div class="text-danger">'.form_error('txt_old_price_1').'</div>' ?></td><?php */ ?>
                        
                        <td><input type="hidden" id="txt_old_price_1" name="txt_old_price[]" value="0"><input value="<?php if($txt_new_price){ echo $txt_new_price; } ?>" type="number" id="txt_new_price_1" name="txt_new_price[]"  placeholder="M.R.P." style="padding:.4375rem .25rem;width:100px;"><?php echo '<div class="text-danger">'.form_error('txt_new_price_1').'</div>' ?></td>
                        <td></td>
                      </tr>
                    <?php }else{ ?>
                      <input type="hidden" id="prc_price_cnt" value="<?php echo count($product_price); ?>">
                      <?php $j=1; foreach ($product_price as $k => $v) { ?>
                        <tr id="price_row_<?php echo $j; ?>">
                        <td>
                          <input type="hidden" name="edit_price_row[]" value="<?php echo $v['id']; ?>">
                          <select name='sel_weight[]' id="sel_weight_<?php echo $j; ?>" style="padding:.4375rem .25rem"> 
                          <option value=''>Select Weight</option>
                          <?php foreach ($weight_master as $key => $value) { ?>
                          <option <?php if($sel_weight && $sel_weight==$value['id']){ if($j==1){  echo "selected"; }  }
                                if($v['weight']==$value['id']){ echo "selected"; } ?> value="<?php echo $value['id']; ?>"><?php echo strtoupper($value['weight_name']); ?></option>
                          <?php
                              } ?>
                        </select>
                        <?php if($j==1){ echo '<div class="text-danger">'.form_error('sel_weight_1').'</div>'; } ?>
                        </td>
                        <?php /* ?><td><input type="number" id="txt_old_price_<?php echo $j; ?>" value="<?php if($txt_old_price){ if($j==1){  echo $txt_old_price; } }else{ echo $v['old_price']; }  ?>" name="txt_old_price[]"  placeholder="Enter Field Value" style="padding:.4375rem .25rem;width:100px;"><?php if($j==1){ echo '<div class="text-danger">'.form_error('txt_old_price_1').'</div>'; } ?></td><?php */ ?>
                        <td><input type="hidden" id="txt_old_price_<?php echo $j; ?>" name="txt_old_price[]" value="0">
                          <input type="number" id="txt_new_price_<?php echo $j; ?>" value="<?php if($txt_new_price){ if($j==1){  echo $txt_new_price; } }else{ echo $v['new_price']; }  ?>" name="txt_new_price[]"  placeholder="M.R.P." style="padding:.4375rem .25rem;width:100px;"><?php if($j==1){ echo '<div class="text-danger">'.form_error('txt_new_price_1').'</div>'; } ?></td>
                        <td>
                          <?php if($j!=1){ ?>
                          <button type="button" class="btn btn-danger" onClick="remove_price_row(<?php echo $j; ?>,<?php echo $v['id']; ?>);"><i class="fa fa-remove" style="margin-right:0px;"></i></button>
                          <?php } ?>
                        </td>
                      </tr>
                      <?php $j++; } ?>
                    <?php } ?>
                    </tbody>
                  </table>
                  </div>
                  </div>
                </div>  
                <div class="row mb-5">
                    <div class="col-md-12">
                      <center>
                        <button type="button" class="btn btn-info mr-2 btn-sm" onClick="AddMoreproductprice();"> <i class="fa fa-plus"></i> Add more Varient</button>
                      </center>
                    </div>
                  </div>
                  <div class="row mt-2 align-items-center py-1">
                    <div class="col-md-12 "> <a href="<?php echo base_url('administrator/product');?>" class="btn btn-lg btn-outline-danger">Cancel</a>
                      <button type="submit" class="btn btn-success btn-lg mr-2  pull-right"><?php echo $button_value;?></button>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
         </form>
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
<script src="<?php echo  base_url(); ?>assest/administrator/js/general.js"></script>
<script src="<?php echo base_url(); ?>assest/administrator/vendors/summernote/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">

 $('#additional_information').summernote({height: 300,
        tabsize: 2,
        toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']]       
        ]
        });
        </script>
        <script type="text/javascript">
        setTimeout(function(){
          $('#myDiv').fadeOut(500);
        }, 5000);
      	$(document).ready(function(){    
    		$(".loading").attr('style',"display: none;");
    	});
	 function showInlineError($el, message) {
	    $el.addClass('border-danger').css('border-color', '#dc3545');
	    var $parent = $el.closest('.form-group, td');
	    if (!$parent.find('.js-error-msg').length) {
	        $parent.append('<div class="text-danger js-error-msg mt-1" style="font-size:0.85rem; font-weight:600;"><i class="fa fa-exclamation-circle mr-1"></i> ' + message + '</div>');
	    }
	 }

	 function clearInlineErrors() {
	    $('.js-error-msg').remove();
	    $('.form-control, select, input').removeClass('border-danger').css('border-color', '');
	 }

	 $(document).on('change input', '.form-control, select, input', function() {
	    $(this).removeClass('border-danger').css('border-color', '');
	    $(this).closest('.form-group, td').find('.js-error-msg').remove();
	 });

	 function validate() {
	    clearInlineErrors();
	    var isValid = true;
	    var $firstErrorEl = null;

	    var collectiontype = $('#collectiontype').val();
	    var name = $.trim($('#name').val());
	    var productcode = $.trim($('#productcode').val());
	    var isEdit = $('#id').val() !== '' && $('#id').val() !== '0';
	    var hasExistingImages = $('#existing_file_previews .preview-card-item, #existing_file_previews .upload-preview-box').length > 0;
	    var fileInput = $('.file-upload-default')[0];
	    var hasNewImages = fileInput && fileInput.files && fileInput.files.length > 0;

	    if (!collectiontype) {
	        showInlineError($('#collectiontype'), 'Please select a Category.');
	        isValid = false;
	        if (!$firstErrorEl) $firstErrorEl = $('#collectiontype');
	    }
	    if (!name) {
	        showInlineError($('#name'), 'Please enter a Product Name.');
	        isValid = false;
	        if (!$firstErrorEl) $firstErrorEl = $('#name');
	    }
	    if (!productcode) {
	        showInlineError($('#productcode'), 'Please enter a Product Code.');
	        isValid = false;
	        if (!$firstErrorEl) $firstErrorEl = $('#productcode');
	    }
	    if (!isEdit && !hasExistingImages && !hasNewImages) {
	        showInlineError($('.file-upload-info').length ? $('.file-upload-info') : $('.file-upload-default'), 'Please select at least one Product Image to upload.');
	        isValid = false;
	        if (!$firstErrorEl) $firstErrorEl = $('.file-upload-browse').length ? $('.file-upload-browse') : $('.file-upload-default');
	    }

	    $('select[name="sel_weight[]"]').each(function() {
	        if (!$(this).val()) {
	            showInlineError($(this), 'Please select Weight.');
	            isValid = false;
	            if (!$firstErrorEl) $firstErrorEl = $(this);
	        }
	    });

	    $('input[name="txt_new_price[]"]').each(function() {
	        if (!$.trim($(this).val())) {
	            showInlineError($(this), 'Please enter M.R.P.');
	            isValid = false;
	            if (!$firstErrorEl) $firstErrorEl = $(this);
	        }
	    });

	    if (!isValid && $firstErrorEl) {
	        $('html, body').animate({
	            scrollTop: $firstErrorEl.offset().top - 120
	        }, 400);
	        $firstErrorEl.focus();
	    }

	    return isValid;
	 }
	 $("#myForm").on('submit',function(){
		if (validate()) {
			$(".loading").attr('style',"display: block;");
			return true;
		} else {
			$(".loading").attr('style',"display: none;");
			return false;
		}
	 }); 



  function check_confirm_delete(row_id)
  {
    swal({
          title: "Delete",
          text: 'Are You Sure To Delete this Produc Image ???',
          icon: "error",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              type:'POST',
              url: "<?php echo base_url() ?>"+"administrator/product/delete_product_photo/"+row_id,
              success:function()
              {
                swal("Your Product Image Delete Successfully.");
                $("#productimage"+row_id).remove();
              }
            }); 
          } else {
            //swal("Your imaginary file is safe!");
          }
        })
  }

  function AddMoreproductprice()
  {
      var cnt = parseInt($("#prc_price_cnt").val());
      cnt++;
      $("#prc_price_cnt").val(cnt);
      var htm='<tr id="price_row_'+cnt+'">\
              <td><input type="hidden" name="edit_price_row[]" value="0">\
              <select name="sel_weight[]" id="sel_weight_'+cnt+'" style="padding:.4375rem .25rem"> \
                <option value="">Select Weight</option>\
                <?php foreach ($weight_master as $key => $value) { ?>\
                <option value="<?php echo $value['id']; ?>"><?php echo strtoupper($value['weight_name']); ?></option>\
                <?php
                    } ?>
              </select></td>\
              <td><input type="hidden" id="txt_old_price_'+cnt+'" name="txt_old_price[]" value="0"><input type="number" id="txt_new_price_'+cnt+'" name="txt_new_price[]"  placeholder="M.R.P." style="padding:.4375rem .25rem;width:100px;"></td>\
              <td><button type="button" class="btn btn-danger btn-sm" onClick="remove_price_row('+cnt+');"><i class="fa fa-remove"  style="margin-right:0px;"></i></button></td>\
            </tr>';
      $("#price_table").append(htm);
  }
  function remove_price_row(r,rid="")
  {
    $("#price_row_"+r).remove();
    if(rid!="")
    {
      $.ajax({
        type:'POST',
        url:base_url+'administrator/product/removeprice/',
        data:{rid:rid},
        dataType: "json",
        success:function(result){
         
        }
      });
    }
  }
  function check_confirm_extra_delete(row_id)
  {
    swal({
          title: "Delete",
          text: 'Are You Sure To Delete this Filed ???',
          icon: "error",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              type:'POST',
              url: "<?php echo base_url() ?>"+"administrator/product/delete_product_filed/"+row_id,
              success:function()
              {
                swal("Your Product Extra Filed Delete Successfully.");
                $("#ProductExtraFiled"+row_id).remove();
              }
            }); 
          } else {
            //swal("Your imaginary file is safe!");
          }
        })
  }
</script>
</body>
</html>