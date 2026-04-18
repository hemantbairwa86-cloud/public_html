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
                  <div class="card">
                     <div class="card-body">
                        <div id="errormsg"></div>
                        <?php $this->load->view('administrator/common/errors');?> 
                        <div class="d-flex justify-content-between align-items-center">
                           <h4 class="card-title">View Product Rating</h4>
                        </div>
                        <hr />
                        
                        
                        
                        
                     </div>
                  </div>
                  
                  <div class="row">

            <div class="col-lg-3 ">
              <div class="row">
               
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body avatar">
                      <h4 class="card-title text-center"><?php echo $review['cat_name'] ; ?></h4>
                      <p class="mt-2  text-center" align="justify"><?php echo $review['name'] ; ?></p>
                      
                       <hr>
                        <div class="owl-carousel owl-theme full-width">
						<?php if(!empty($images)) {
                          foreach ($images as $key => $value) { ?>                            
                            <div class="item">
                              <img src="<?php echo  base_url().'uploads/product/thumbnails/'.$value['image_name']; ?>" alt=""/>
                            </div>                    
                            <?php } } ?>
                  </div>                      
                      
                      
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-9 grid-margin stretch-card ">
             
                
                <div class="table-responsive">
                   <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <form method="post" id="myForm" action="<?php echo base_url('administrator/rating/update'); ?>"  autocomplete="off">
                <div class="card-body">
                  <h4 class="card-title">Rating : <?php echo $review[rating] ; ?></h4>
                  <p class="card-description"></p>
                  <table class="table table-striped">                    
                    <tbody>
                      <tr>
                        <td>Rating</td>
                        <td><?php if($review[rating]==5){ 
			$star = '<span class="fa fa-star text-warning  checked"></span>
			<span class="fa fa-star text-warning checked"></span>
			<span class="fa fa-star text-warning checked"></span>
			<span class="fa fa-star text-warning checked"></span>
			<span class="fa fa-star text-warning checked"></span>';
			}
			if($review[rating]==4){ 
			$star = '<span class="fa fa-star text-warning  checked"></span>
			<span class="fa fa-star text-warning checked"></span>
			<span class="fa fa-star text-warning checked"></span>
			<span class="fa fa-star text-warning checked"></span>';
			}
			if($review[rating]==3){ 
			$star = '<span class="fa fa-star text-warning  checked"></span>
			<span class="fa fa-star text-warning checked"></span>
			<span class="fa fa-star text-warning checked"></span>';
			}
			if($review[rating]==2){ 
			$star = '<span class="fa fa-star text-warning  checked"></span>
			<span class="fa fa-star text-warning checked"></span>';
			}
			if($review[rating]==1){ 
			$star = '<span class="fa fa-star text-warning  checked"></span>';
			}	echo $star ; ?></td>
                      </tr>
                      
                      <tr>
                      	<td>Full Name</td>
                        <td><?php echo $review['full_name'] ; ?></td>
                      </tr>
                      <tr>
                      	<td>City</td>
                        <td><?php echo $review['city'] ; ?></td>
                      </tr>
                      <tr>
                      	<td>Contact No</td>
                        <td><?php echo $review['contact'] ; ?></td>
                      </tr>
                      <tr>
                      	<td>Product Review</td>
                        <td><?php echo $review['review'] ; ?></td>
                      </tr>
                      <tr>
                      	<td>Entry Date</td>
                        <td><?php echo date('d/m/Y',strtotime($review['created_at'])) ; ?></td>
                      </tr>
                    </tbody>
                  </table>
                  
                  <?php if($review['status']!=1)  { ?>
                   <div class="row mt-4">               
		                <div class="col-12 grid-margin stretch-card">
		                  <div class="col-md-4 ">
	                          <div class="form-group">

                  <select class="form-control" id="status" name="status" required>
                    <option value="">Select Status</option>
                    <option value="1">Review Approve</option>                    
                  </select>
                  <?php echo '<div class="text-danger">'.form_error('status').'</div>' ?> </div>
                  			</div>
                  		</div>
                   </div>
                   <?php } else {  echo '<p class="p-5 card-title">Status : Approved</p>' ;  } ?>
                   
                   <hr>
                   <input type="hidden" name="id" value="<?php echo $review['id'] ; ?>" >
                <a href="<?php echo base_url('administrator/rating');?>" class="btn btn-outline-danger">Cancel</a>
                <?php if($review['status']!=1)  { ?>
                	<button type="submit" id="btn_submit" class="btn btn-success mr-2 pull-right">Approve Now</button>
               <?php } ?>     
                   
                        
                </div>
                </form>
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
       <script src="<?php echo  base_url(); ?>assest/administrator/js/owl-carousel.js"></script>
      <script type="text/javascript">
            $(document).ready(function() {
              var dataTable = $('#tbl_listing').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax":{
                url :"<?php echo base_url(); ?>administrator/rating/view_rating_ajax_data", // json datasource
                type: "post",  // method  , by default get
                error: function(){  // error handling          
                }
                }
              } );
            } );
      </script>
      <script type="text/javascript">
  function check_confirm_delete(row_id)
  {

    swal({
          title: "Delete",
          text: 'Are You Sure To Delete this Product Rating ?',
          icon: "error",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
             
              window.location.href = "<?php echo base_url() ?>"+"administrator/rating/delete/"+row_id;
          } else {
            //swal("Your imaginary file is safe!");
          }
        })
  }
</script>
   </body>
</html>