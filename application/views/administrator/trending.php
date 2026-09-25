<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('administrator/common/header-js');?>
<link rel="stylesheet" href="<?php echo  base_url(); ?>assest/administrator/summernote/dist/summernote-bs4.css">
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
        <?php if(isset($id) && $id!=""){ ?>
        <div class="row justify-content-md-center mb-5">
          <div class="col-md-8">
            <?php $this->load->view('administrator/common/errors');?>
            <div id="errormsg"></div>
          </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Edit Trending Product</h4>
                <hr>
                <?php
        $action=base_url().'administrator/master/edit_trending/'.$id;
        echo form_open_multipart($action, array('id' => 'myForm','autocomplete' => 'off'));?>
                <div class="form-group">
                  <label for="exampleInputName1">Trending Product Photo</label>
                  <div class="row align-items-center mb-4">
                    <div class="col-md-6">
                      <input type="file" accept="image/x-png,image/gif,image/jpeg" class="file-upload-default" name="image">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                        <button class="file-upload-browse btn btn-info" type="button"><i class="fa fa-cloud-upload"></i> Upload Photo</button>
                        </span> </div>
                      <?php echo '<div class="text-danger">'.form_error('image').'</div>' ?>
                    </div>
                    <?php 
                      if(isset($id) && $id!="")
                      {
                        $img=base_url().'uploads/trending/'.$image;
                      }
                      else{
                        $img=base_url().'uploads/book.png';
                      }    ?>
                    <div class="col-md-6 text-center">
                      <input type="hidden" name="img_hidden" value="<?php echo $image; ?>">
                      <div class="upload-preview-box">
                        <a id="previewbanner_link" href="<?php echo $img; ?>" target="_blank" title="Click to view full image">
                          <img id="previewbanner1" src="<?php echo $img; ?>" alt="Trending Image Preview">
                        </a>
                      </div>
                      <div class="upload-specs-info mt-2">
                        <span><i class="fa fa-arrows-alt"></i> Dimensions: <strong>850 x 500 px</strong></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                       <div class="col-md-6">                   
                          <div class="form-group">
                            <label for="title">Trending Product Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" placeholder="Enter Trending Product Title">
                            <?php echo '<div class="text-danger">'.form_error('title').'</div>' ?>
                          </div>
                        </div> 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="category_id">Product Category <span class="text-danger">*</span></label>
                        <select name='category_id' id="category_id" class="form-control border-primary">
                          <option value=''>Select Category</option>
                          <?php foreach ($colletion as $key => $value) { ?>
                          <option <?php if($category_id==$value['id']){ echo 'selected'; } ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                          <?php
                              } ?>
                        </select>
                        <?php echo '<div class="text-danger">'.form_error('category_id').'</div>' ?> </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">                   
                          <div class="form-group">
                            <label for="url">Product Link URL <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="url" name="url" value="<?php echo $url; ?>" placeholder="Enter Trending Product Title">
                            <?php echo '<div class="text-danger">'.form_error('url').'</div>' ?>
                          </div>
                        </div> 
                  </div>
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                <a href="<?php echo base_url('administrator/master/trending');?>" class="btn btn-outline-danger mt-3">Cancel</a>
                <button type="submit" id="btn_submit" class="btn btn-success mr-2 pull-right  mt-3"><?php echo $button_value;?></button>
                <?php echo form_close(); ?> </div>
            </div>
          </div>
        </div>
        <?php }else{ ?>
        <div class="row justify-content-md-center">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <h4 class="card-title">List of Trending Products</h4>
                     </div>   
                 <div class="col-md-4 text-right">
                  <a href="<?php echo base_url('assest/administrator/sample/trending-product.jpg');?>" download><i class="fa fa-download"></i> Sample</a>
                </div>
                </div>                
                <hr>
                <div class="table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Product / Category</th>
                        <?php /*?><th>Status</th><?php */?>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;
                      if(!empty($viewdata)){
                      foreach($viewdata as $key=>$val)
                      {
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><a href="<?php echo base_url()."uploads/trending/".$val['image']; ?>" target="_blank"> <img src="<?php echo base_url()."uploads/trending/".$val['image']; ?>" style="width:100px;height:auto;border-radius:0;"> </a></td>
                        <td><a href="" target="_blank"><?php echo $val['title']." / ".$val['category_name']; ?></a></td>
                        <?php /*?><td><?php if($val['status'] == 1){ ?>
                            <button type="button" class="btn btn-sm btn-toggle changestatus active" data-table="trending" data-field="status" data-id-name="id" data-id="<?php echo $val['id'];?>" data-toggle="button" aria-pressed="1" autocomplete="off">
                            <div class="handle"></div>
                            </button>
                            <?php } else { ?>
                            <button type="button" class="btn btn-sm btn-toggle changestatus" data-table="trending" data-field="status" data-id-name="id" data-id="<?php echo $val['id'];?>" data-toggle="button" aria-pressed="0" autocomplete="off">
                            <div class="handle"></div>
                            </button>
                            <?php } ?>
                          </td><?php */?>
                        <td><a href="<?php echo base_url(); ?>administrator/master/edit_trending/<?php echo $val['id']; ?>" class="mb-2"> <i class="fa fa-pencil"></i></a> </td>
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
        <?php } ?>
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