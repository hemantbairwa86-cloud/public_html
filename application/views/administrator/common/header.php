<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-success">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo d-none d-lg-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>administrator/dashboard" style="text-decoration:none;">
      <img src="<?php echo base_url(); ?>assest/frontend/images/logo.svg" alt="logo" style="height: 30px; max-width: 140px; width: auto; background: #ffffff; padding: 3px 8px; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.12);"/>
      <span class="brand-admin-tag ml-2">Admin</span>
    </a>
    <a class="navbar-brand brand-logo-mini d-flex d-lg-none align-items-center justify-content-center" href="<?php echo base_url(); ?>administrator/dashboard">
      <span class="mini-vp-badge">VP</span>
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
      <button class="navbar-toggler navbar-toggler align-self-center text-white d-none d-lg-block" type="button" data-toggle="minimize" title="Toggle Sidebar">
        <span class="mdi mdi-menu" style="font-size: 1.4rem;"></span>
      </button>
      <a href="<?php echo base_url(); ?>" target="_blank" class="btn btn-sm btn-header-visit ml-2 d-none d-sm-inline-flex align-items-center" title="Visit Storefront">
        <i class="fa fa-globe mr-1"></i> <span class="d-none d-md-inline">Visit Storefront</span>
      </a>
    </div>

    <ul class="navbar-nav navbar-nav-right d-flex align-items-center flex-row">
      <li class="nav-item d-none d-lg-block mr-2">
        <a class="nav-link text-white p-2" title="Toggle Fullscreen" href="javascript:void(0);">
          <i class="mdi mdi-fullscreen" id="fullscreen-button" style="font-size: 1.3rem;"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle nav-profile d-flex align-items-center" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <div class="profile-img-wrap" style="position: relative;">
            <img src="<?php echo base_url(); ?>assest/administrator/images/faces/default_male.jpg" alt="profile" style="width: 34px; height: 34px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.85); object-fit: cover;">
            <span class="online-status-dot"></span>
          </div>
          <span class="d-none d-md-inline text-white font-weight-bold ml-2" style="font-size: 0.9rem;"><?php echo isset($this->session->userdata('VenusProductSession')->name) ? $this->session->userdata('VenusProductSession')->name : 'Admin'; ?></span>
        </a>
        <div class="dropdown-menu navbar-dropdown dropdown-menu-right shadow-lg border-0" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>administrator/profile">
            <i class="mdi mdi-account-circle mr-2 text-success" style="font-size:1.1rem;"></i> My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url(); ?>administrator/change_password">
            <i class="mdi mdi-key-variant mr-2 text-success" style="font-size:1.1rem;"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="javascript:void(0)" onClick="check_confirm();">
            <i class="mdi mdi-power mr-2 text-danger" style="font-size:1.1rem;"></i> Signout
          </a>
        </div>
      </li>
      <li class="nav-item d-lg-none ml-2">
        <button class="navbar-toggler navbar-toggler-right align-self-center text-white border-0 p-2" type="button" data-toggle="offcanvas" aria-label="Toggle Menu">
          <span class="mdi mdi-menu" style="font-size: 1.5rem;"></span>
        </button>
      </li>
    </ul>
  </div>
</nav>
