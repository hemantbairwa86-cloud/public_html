<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-success">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>administrator/dashboard" style="text-decoration:none;">
      <img src="<?php echo base_url(); ?>assest/frontend/images/logo.svg" alt="logo" style="height: 30px; max-width: 140px; width: auto; background: #ffffff; padding: 3px 8px; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.12);"/>
      <span class="brand-admin-tag ml-2">Admin</span>
    </a>
    <a class="navbar-brand brand-logo-mini" href="<?php echo base_url(); ?>administrator/dashboard">
      <span class="mini-vp-badge">VP</span>
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center text-white" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu" style="font-size: 1.4rem;"></span>
    </button>
    <ul class="navbar-nav">
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link text-white" title="Toggle Fullscreen">
          <i class="mdi mdi-fullscreen" id="fullscreen-button" style="font-size: 1.3rem;"></i>
        </a>
      </li>
      <li class="nav-item d-none d-md-block ml-3 align-self-center">
        <a href="<?php echo base_url(); ?>" target="_blank" class="btn btn-sm btn-header-visit">
          <i class="fa fa-globe mr-1"></i> Visit Storefront
        </a>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle nav-profile d-flex align-items-center" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <div class="profile-img-wrap" style="position: relative;">
            <img src="<?php echo base_url(); ?>assest/administrator/images/faces/default_male.jpg" alt="profile" style="width: 36px; height: 36px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.85); object-fit: cover;">
            <span class="online-status-dot"></span>
          </div>
          <span class="d-none d-lg-inline text-white font-weight-bold ml-2" style="font-size: 0.95rem;"><?php echo $this->session->userdata('VenusProductSession')->name; ?></span>
        </a>
        <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="profileDropdown">
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
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center text-white" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
