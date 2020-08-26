<nav class="navbar navbar-expand navbar-dark bg-dark static-top head_top">

   <div class='boxs'>
    <a class="navbar-brand mr-1" href="<?php echo base_url('Admin/dashboard') ?>">Build App</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button></div>

    

    <!-- Navbar -->
   
<div class="boxs nav_side">
 <ul class="navbar-nav ml-auto ml-md-0">
      
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo base_url('public/favicon.png') ?>" class="img-rounded" style="border-radius:50%;height:30px;width:30px">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <!--<a class="dropdown-item" href="#">Settings</a>-->
          <a class="dropdown-item" href="<?php echo base_url('Admin/changePassword') ?>">Change Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>
</div>
  </nav>