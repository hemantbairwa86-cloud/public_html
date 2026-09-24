<!DOCTYPE html>
<html lang="en">
   <head>
      <?php $this->load->view('administrator/common/header-js');?>
   </head>
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
                  <div class="card mb-4">
                     <div class="card-body py-3">
                        <div id="errormsg"></div>
                        <?php $this->load->view('administrator/common/errors');?> 
                        <div class="d-flex justify-content-between align-items-center">
                           <h4 class="card-title mb-0" style="color:var(--admin-primary-dark); font-weight:700;">
                              <i class="mdi mdi-star text-warning mr-2"></i>Product Rating Details
                           </h4>
                           <a href="<?php echo base_url('administrator/rating');?>" class="btn btn-outline-secondary btn-sm">
                              <i class="mdi mdi-arrow-left mr-1"></i>Back to Ratings List
                           </a>
                        </div>
                     </div>
                  </div>
                  
                  <div class="row">
                     <!-- Product Info Card -->
                     <div class="col-lg-4 col-md-5 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body text-center">
                              <span class="badge badge-success mb-2" style="font-size:0.85rem; padding:6px 14px;">
                                 <?php echo !empty($review['cat_name']) ? htmlspecialchars($review['cat_name']) : 'Category'; ?>
                              </span>
                              <h4 class="font-weight-bold mt-2" style="color:#184d47;">
                                 <?php echo !empty($review['name']) ? htmlspecialchars($review['name']) : 'Product'; ?>
                              </h4>
                              <hr />
                              <?php if(!empty($images)) { ?>
                                 <div class="owl-carousel owl-theme full-width">
                                    <?php foreach ($images as $key => $value) { ?>                            
                                       <div class="item text-center">
                                          <img src="<?php echo base_url().'uploads/product/thumbnails/'.$value['image_name']; ?>" class="img-fluid rounded shadow-sm" alt="Product Image" style="max-height:220px; object-fit:contain;" />
                                       </div>                    
                                    <?php } ?>
                                 </div>
                              <?php } else { ?>
                                 <div class="py-4 text-muted">
                                    <i class="mdi mdi-image-off display-4"></i>
                                    <p class="small mt-2">No product image available</p>
                                 </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>

                     <!-- Review Detail & Action Form -->
                     <div class="col-lg-8 col-md-7 grid-margin stretch-card">
                        <div class="card">
                           <form method="post" id="myForm" action="<?php echo base_url('administrator/rating/update'); ?>" autocomplete="off" class="w-100">
                              <div class="card-body">
                                 <?php 
                                    $rating_val = isset($review['rating']) ? intval($review['rating']) : 0;
                                    $star = '';
                                    for ($i = 1; $i <= 5; $i++) {
                                       if ($i <= $rating_val) {
                                          $star .= '<span class="fa fa-star text-warning checked mr-1" style="font-size:1.2rem;"></span>';
                                       } else {
                                          $star .= '<span class="fa fa-star text-muted mr-1" style="font-size:1.2rem; opacity:0.3;"></span>';
                                       }
                                    }
                                 ?>
                                 <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title mb-0" style="color:#184d47; font-weight:700;">
                                       Rating Overview
                                    </h4>
                                    <div>
                                       <?php if(isset($review['status']) && $review['status'] == 1) { ?>
                                          <span class="badge badge-success px-3 py-2" style="font-size:0.9rem;"><i class="mdi mdi-check-circle mr-1"></i>Approved</span>
                                       <?php } else { ?>
                                          <span class="badge badge-warning text-dark px-3 py-2" style="font-size:0.9rem;"><i class="mdi mdi-clock-outline mr-1"></i>Pending Review</span>
                                       <?php } ?>
                                    </div>
                                 </div>

                                 <table class="table table-bordered table-striped">                    
                                    <tbody>
                                       <tr>
                                          <td style="width:30%; font-weight:600;">Rating Stars</td>
                                          <td><?php echo $star; ?> <span class="ml-2 font-weight-bold text-dark">(<?php echo $rating_val; ?> / 5)</span></td>
                                       </tr>
                                       <tr>
                                          <td style="font-weight:600;">Customer Name</td>
                                          <td><?php echo !empty($review['full_name']) ? htmlspecialchars($review['full_name']) : '-'; ?></td>
                                       </tr>
                                       <tr>
                                          <td style="font-weight:600;">City</td>
                                          <td><?php echo !empty($review['city']) ? htmlspecialchars($review['city']) : '-'; ?></td>
                                       </tr>
                                       <tr>
                                          <td style="font-weight:600;">Contact No</td>
                                          <td><?php echo !empty($review['contact']) ? htmlspecialchars($review['contact']) : '-'; ?></td>
                                       </tr>
                                       <tr>
                                          <td style="font-weight:600;">Customer Review</td>
                                          <td class="text-justify" style="line-height:1.6;"><?php echo !empty($review['review']) ? nl2br(htmlspecialchars($review['review'])) : '-'; ?></td>
                                       </tr>
                                       <tr>
                                          <td style="font-weight:600;">Submitted On</td>
                                          <td><?php echo !empty($review['created_at']) ? date('d M Y, h:i A', strtotime($review['created_at'])) : '-'; ?></td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 
                                 <input type="hidden" name="id" value="<?php echo isset($review['id']) ? $review['id'] : ''; ?>">

                                 <?php if(isset($review['status']) && $review['status'] != 1) { ?>
                                    <div class="row mt-4 align-items-center">               
                                       <div class="col-md-6">
                                          <div class="form-group mb-0">
                                             <label class="font-weight-bold mb-1">Update Status</label>
                                             <select class="form-control" id="status" name="status" required style="border-radius:6px; padding:8px 12px;">
                                                <option value="">-- Select Status Action --</option>
                                                <option value="1">Approve Review</option>                    
                                             </select>
                                             <?php echo '<div class="text-danger small mt-1">'.form_error('status').'</div>'; ?>
                                          </div>
                                       </div>
                                    </div>
                                 <?php } ?>

                                 <hr class="my-4">
                                 <div class="d-flex justify-content-between align-items-center">
                                    <a href="<?php echo base_url('administrator/rating');?>" class="btn btn-outline-danger px-4">
                                       <i class="mdi mdi-close mr-1"></i>Cancel
                                    </a>
                                    <?php if(isset($review['status']) && $review['status'] != 1) { ?>
                                       <button type="submit" id="btn_submit" class="btn btn-success px-4 font-weight-bold" style="background:#179957; border-color:#179957;">
                                          <i class="mdi mdi-check mr-1"></i>Approve Now
                                       </button>
                                    <?php } ?>     
                                 </div>
                              </div>
                           </form>
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
      <script src="<?php echo base_url(); ?>assest/administrator/js/owl-carousel.js"></script>
      <script type="text/javascript">
         function check_confirm_delete(row_id) {
            swal({
               title: "Delete",
               text: 'Are You Sure To Delete this Product Rating?',
               icon: "error",
               buttons: true,
               dangerMode: true,
            }).then((willDelete) => {
               if (willDelete) {
                  window.location.href = "<?php echo base_url() ?>"+"administrator/rating/delete/"+row_id;
               }
            });
         }
      </script>
   </body>
</html>