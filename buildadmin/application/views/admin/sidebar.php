  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('Admin/dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>All MarketUsers</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header"> Lists:</h6>
		  <a class="dropdown-item" href="<?php echo base_url('Admin/allcontractors') ?>">Contractors List</a>
          <a class="dropdown-item" href="<?php echo base_url('Admin/allsub_cont') ?>">Sub-Contractors List</a>
          <a class="dropdown-item" href="<?php echo base_url('Admin/allLabours') ?>">Labour List</a>
          <a class="dropdown-item" href="<?php echo base_url('Admin/allSuppliers') ?>">Suppliers List</a>
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Admin/tenderList') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>All Tenders</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Admin/locations') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>View All Locations</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Admin/aoi') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>View All Area of Industries</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Subscription Plans</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header"> Lists:</h6>
		  <a class="dropdown-item" href="<?php echo base_url('Admin/contractorSubscription') ?>">For Contractors </a>
		  <a class="dropdown-item" href="<?php echo base_url('Admin/subContractorSubscription') ?>">For Sub-Contractors</a>
          <a class="dropdown-item" href="<?php echo base_url('Admin/supplierSubscription') ?>">For Suppliers</a>
          
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Site Settings</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header"> Lists:</h6>
		  <a class="dropdown-item" href="<?php echo base_url('Admin/aboutUs') ?>">About Us</a>
          <a class="dropdown-item" href="<?php echo base_url('Admin/tnc') ?>">Terms and Conditions</a>
          <a class="dropdown-item" href="<?php echo base_url('Admin/privacy') ?>">Privacy Policy</a>
          <a class="dropdown-item" href="<?php echo base_url('Admin/faq') ?>">FAQ's</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Admin/transactions') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Transaction Details</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Notifications</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header"> Lists:</h6>
		  <a class="dropdown-item" href="<?php echo base_url('Notification/tenderNotification') ?>">Tender</a>
          <a class="dropdown-item" href="<?php echo base_url('Notification/marketplaceNotification') ?>">Marketplace</a>
          
        </div>
      </li>
    </ul>

  