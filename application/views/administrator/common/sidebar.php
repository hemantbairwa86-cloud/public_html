<?php 
  $ad = get_admin($this->session->userdata('VenusProductSession')->id);	
  $curr_p = (isset($par_menu) && !empty($par_menu)) ? $par_menu : $this->uri->segment(2);
  $curr_s = (isset($sub_menu) && !empty($sub_menu)) ? $sub_menu : $this->uri->segment(3);
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link d-flex">
        <div class="profile-image">
          <?php if(isset($ad['image']) && $ad['image']!=""){ ?>
          <img src="<?php echo base_url()."uploads/administrator/".$ad['image']; ?>" alt="image"/>
          <?php }else{ ?>
          <img src="<?php echo base_url(); ?>assest/administrator/images/faces/default_male.jpg" alt="image"/>
          <?php } ?>
        </div>
        <div class="profile-name">
          <p class="name"> <?php echo isset($ad['name']) ? $ad['name'] : ''; ?> </p>
          <p class="designation"> Administrator </p>
        </div>
      </div>
    </li>
    <li class="nav-item <?php if($curr_p == 'dashboard' || $curr_p == ''){ echo 'active'; } ?>"> 
      <a class="nav-link" href="<?php echo base_url(); ?>administrator/dashboard"> <i class="icon-layout menu-icon"></i> <span class="menu-title">Dashboard</span> </a> 
    </li>
    <li class="nav-item <?php if($curr_p == 'slider'){ echo 'active'; } ?>"> 
      <a class="nav-link" href="<?php echo base_url(); ?>administrator/slider"> <i class="fa fa-bullhorn menu-icon"></i> <span class="menu-title">Slider</span> </a> 
    </li>
    <li class="nav-item <?php if($curr_p == 'master'){ echo 'active'; } ?>"> 
      <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="<?php echo ($curr_p == 'master') ? 'true' : 'false'; ?>" aria-controls="page-layouts"> <i class="icon-box menu-icon"></i> <span class="menu-title">Master</span> <i class="menu-arrow"></i> </a>
      <div class="collapse <?php if($curr_p == 'master'){ echo 'show'; } ?>" id="page-layouts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link <?php if($curr_p == 'master' && $curr_s == 'category'){ echo 'active'; } ?>" href="<?php echo base_url(); ?>administrator/master/category">Categories</a></li>
          <li class="nav-item"> <a class="nav-link <?php if($curr_p == 'master' && $curr_s == 'weight'){ echo 'active'; } ?>" href="<?php echo base_url(); ?>administrator/master/weight">Weight</a></li>
          <li class="nav-item"> <a class="nav-link <?php if($curr_p == 'master' && $curr_s == 'trending'){ echo 'active'; } ?>" href="<?php echo base_url(); ?>administrator/master/trending">Trending Product</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item <?php if($curr_p == 'manage'){ echo 'active'; } ?>"> 
      <a class="nav-link" data-toggle="collapse" href="#price-layouts" aria-expanded="<?php echo ($curr_p == 'manage') ? 'true' : 'false'; ?>" aria-controls="price-layouts"> <i class="fa fa-rupee menu-icon"></i> <span class="menu-title">Price Master</span> <i class="menu-arrow"></i> </a>
      <div class="collapse <?php if($curr_p == 'manage'){ echo 'show'; } ?>" id="price-layouts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link <?php if($curr_p == 'manage' && $curr_s == 'shipping'){ echo 'active'; } ?>" href="<?php echo base_url(); ?>administrator/manage/shipping">Shipping Price</a></li>
          <li class="nav-item"> <a class="nav-link <?php if($curr_p == 'manage' && $curr_s == 'offer'){ echo 'active'; } ?>" href="<?php echo base_url(); ?>administrator/manage/offer">Discount / Offer</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item <?php if($curr_p == 'product'){ echo 'active'; } ?>"> 
      <a class="nav-link" href="<?php echo base_url(); ?>administrator/product"> <i class="fa fa-th menu-icon"></i> <span class="menu-title">Product Master</span> </a> 
    </li>
    <li class="nav-item <?php if($curr_p == 'customer'){ echo 'active'; } ?>"> 
      <a class="nav-link" href="<?php echo base_url(); ?>administrator/customer"> <i class="fa fa-users menu-icon"></i> <span class="menu-title">Customer</span> </a> 
    </li>
    <li class="nav-item <?php if($curr_p == 'order'){ echo 'active'; } ?>"> 
      <a class="nav-link" href="<?php echo base_url(); ?>administrator/order"> <i class="fa fa-shopping-cart menu-icon"></i> <span class="menu-title">Orders</span> </a> 
    </li>
    <li class="nav-item <?php if($curr_p == 'rating'){ echo 'active'; } ?>"> 
      <a class="nav-link" href="<?php echo base_url(); ?>administrator/rating"> <i class="fa fa-star menu-icon"></i> <span class="menu-title">Product Rating</span> </a> 
    </li>
    <li class="nav-item <?php if($curr_p == 'favorite'){ echo 'active'; } ?>"> 
      <a class="nav-link" href="<?php echo base_url(); ?>administrator/favorite"> <i class="icon-heart menu-icon"></i> <span class="menu-title">Wish List Products</span> </a> 
    </li>
    <li class="nav-item <?php if($curr_p == 'subscription'){ echo 'active'; } ?>"> 
      <a class="nav-link" href="<?php echo base_url(); ?>administrator/subscription"> <i class="mdi mdi-email menu-icon"></i> <span class="menu-title">Subscription</span> </a> 
    </li>
    <li class="nav-item <?php if($curr_p == 'counter'){ echo 'active'; } ?>"> 
      <a class="nav-link" href="<?php echo base_url(); ?>administrator/counter"> <i class="fa fa-star-o menu-icon"></i> <span class="menu-title">Counter</span> </a> 
    </li>
    <li class="nav-item <?php if($curr_p == 'seo'){ echo 'active'; } ?>"> 
      <a class="nav-link" href="<?php echo base_url(); ?>administrator/seo"> <i class="icon-search menu-icon"></i> <span class="menu-title">SEO</span> </a> 
    </li>
    <li class="" style="text-align:center">
      <a class="nav-link sidebar-logout-btn" href="javascript:void(0)" onclick="check_confirm();"><i class="mdi mdi-logout menu-icon mr-2 text-white"></i><span class="menu-title" style="font-weight:700;font-size:15px;">Logout</span> </a> 
    </li>
  </ul>
</nav>