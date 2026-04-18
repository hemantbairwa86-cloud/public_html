<section class="newsletter-section bg-secondary">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 col-md-6 order-md-1 order-lg-1">
        <div class="newsletter-title-wrap">
          <div class="newsletter-icons"> <i class="iconrt- icon-rt-mail-open-outline"></i> </div>
          <div class="newsletter-content">
            <h2>Sign up to Newsletter</h2>
            <p>...and get updates about our products</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6  mt-4 mt-md-0 order-md-2 order-lg-3">
        <div class="newsletter-whatsapp-wrap">
          <div class="newsletter-whatsapp-inner">
            <div class="whatsapp-icons"> <i class="iconrt- icon-rt-logo-whatsapp"></i> </div>
            <div class="whatsapp-content">
              <p>Call Us</p>
              <h2 style="font-size:1.3rem;"><?php echo FIRM_MOBILE ; ?></h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-12 mt-4 mt-lg-0 order-md-3 order-lg-2">
        <form method="post" action="javascript:void(0)"  class="newsletter-form" enctype="multipart/form-data" name="subscriber_form" id="subscriber_form"  autocomplete="off">
          <input type="email" name="user_subs_email" id="user_subs_email" placeholder="Your Email Address..." required>
          <button class="btn btn--primary submit-button fw-semibold" type="submit">Subscribe!</button>
        </form>
        <p id='subscribe_response'></p>
      </div>
    </div>
  </div>
</section>
