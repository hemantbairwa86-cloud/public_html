<footer class="footer-section border-top" style="background-color:#f3fffa">
  <div class="footer-top-area pt-4 section-space-pb border-bottom" style="padding-bottom:30px;">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
              <div class="footer-widget">
                <div class="footer-logo"> <a href="<?php echo  base_url(); ?>"><img src="<?php echo  base_url(); ?>assest/frontend/images/logo.svg" alt=""></a> </div>
                <?php $firm = getFirmDetails() ; 
				?>
                <ul class="footer-social-list">
                  <li> <a href="<?php if(isset($firm['facebook'])) { echo $firm['facebook'] ; } else { echo "javascript:void(0)";  }  ?>" <?php if(isset($firm['facebook'])) { echo 'target="_blank"'; } ?> class="facebook"><i class="icon-rt-4-facebook-f"></i></a> </li>
                  <li> <a href="<?php if(isset($firm['twitter'])) { echo $firm['twitter'] ; } else { echo "javascript:void(0)";  }  ?>"  <?php if(isset($firm['twitter'])) { echo 'target="_blank"'; } ?> class="twitter"><i class="icon-rt-logo-twitter"></i></a></li>
                  <li> <a href="<?php if(isset($firm['instagram'])) { echo $firm['instagram'] ; } else { echo "javascript:void(0)";  }  ?>" <?php if(isset($firm['instagram'])) { echo 'target="_blank"'; } ?> class="instagram"><i class="icon-rt-logo-instagram"></i></a> </li>
                  <li> <a href="<?php if(isset($firm['youtube'])) { echo $firm['youtube'] ; } else { echo "javascript:void(0)";  }  ?>" <?php if(isset($firm['youtube'])) { echo 'target="_blank"' ; } ?> class="youtube"><i class="icon-rt-2-youtube2"></i></a> </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
              <div class="footer-widget">
                <h6 class="footer-title">Useful Links</h6>
                <ul class="footer-list">
                  <li><a href="<?php echo  base_url(); ?>">Home</a></li>
                  <li><a href="<?php echo base_url(); ?>about/company">About us</a></li>
                  <li><a href="<?php echo base_url(); ?>product-manufacturing">Product Manufacturing</a></li>
                  <li><a href="<?php echo base_url(); ?>third-party-manufacturing">Third Party Manufacturing</a></li>
                  <li><a href="<?php echo base_url(); ?>contact">Contact Us</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
              <div class="footer-widget">
                <h6 class="footer-title">Categories</h6>
                <ul class="footer-list">
                  <?php foreach ($CollectionDetails as $ckey => $cvalue) { ?>
                  <li><a href="<?php echo  base_url(); ?>products/<?php echo $cvalue['slug'];?>"><?php echo ucwords($cvalue['name']);?></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="row d-flex justify-content-between pt-1 mt-4">
            <div class="col-md-3">
             <h6 > <a href="<?php echo base_url();?>terms-and-conditions" class="foooter-terms">Tearms &amp; Conditions</a> </h6>
            </div>
            <div class="col-md-3 ">
              <h6 > <a href="<?php echo base_url();?>privacy-policy" class="foooter-terms">Privacy Policy</a> </h6>
            </div>
            <div class="col-md-3 ">
              <h6 > <a href="<?php echo base_url();?>refund-policy" class="foooter-terms">Refund Policy</a> </h6>
            </div>
            <div class="col-md-3 ">
              <h6 > <a href="<?php echo base_url();?>shipping-policy" class="foooter-terms">Shipping Policy</a> </h6>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="footer-widget">
                <h6 class="footer-title">Contact Us</h6>
                <div class="contact-us-area">
                  <ul class="">
                    <li class="contact-feature-item">
                      <div class="contact-feature-icon"> <i class="icon-rt-location-pin"></i> </div>
                      <div class="contact-feature-content">
                        <p class="text">
                          <?php $firm = getFirmDetails() ; 
						 echo $firm['firm_name'] ;
						//echo FIRM_NAME ; ?>
                          <br />
                          <?php  echo $firm['address'] ; //echo FIRM_ADDRESS ; ?>
                        </p>
                      </div>
                    </li>
                    <li class="contact-feature-item">
                      <div class="contact-feature-icon feature-icon-2"> <i class="icon-rt-phone-volume-solid"></i> </div>
                      <div class="contact-feature-content">
                        <p class="text">For immediate help please call <br>
                          <?php echo FIRM_MOBILE ; ?> <?php // echo ", ".FIRM_CONTACT ; ?></p>
                      </div>
                    </li>
                    <li class="contact-feature-item">
                      <div class="contact-feature-icon feature-icon-3"> <i class="icon-rt-mail-outline"></i> </div>
                      <div class="contact-feature-content">
                        <p class="text"> Send Mail<br>
                          <a href="javascript:void(0);">
                          <?php //  echo $firm['cemail'] ;
                          echo FIRM_EMAIL ; ?>
                          </a> </p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="copy-right-content">
        <p>Copyright © <a href="javascript:void(0);">Venus Products</a>. All Rights Reserved.</p>
        <div class="payment-image">Developed by <a href="https://vinayakwebinfotech.com/" target="_blank">Vinayak Infotech</a> </div>
      </div>
    </div>
  </div>
</footer>
