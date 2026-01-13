@extends ('website.layout.structure')

@section('content')
<!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="dashboard" class="text-nowrap logo-img">
            <img src="assets/images/logos/logo2.png" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./dashboard" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
         
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-layout-grid"></i>
                  </span>
                  <span class="hide-menu">Categories</span>
                </div>
                
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a class="sidebar-link justify-content-between"  
                    href="add_categories">
                    <div class="d-flex align-items-center gap-3">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">Add Categories</span>
                    </div>
                    
                  </a>
                </li>
                 <li class="sidebar-item">
                  <a class="sidebar-link justify-content-between"  
                    href="manage_categories">
                    <div class="d-flex align-items-center gap-3">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">Manage Categories</span>
                    </div>
                    
                  </a>
                </li>
              </ul>
			  
            </li>
			<li class="sidebar-item">
              <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-layout-grid"></i>
                  </span>
                  <span class="hide-menu">Product</span>
                </div>
                
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a class="sidebar-link justify-content-between"  
                    href="add_product">
                    <div class="d-flex align-items-center gap-3">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">Add Product</span>
                    </div>
                    
                  </a>
                </li>
                 <li class="sidebar-item">
                  <a class="sidebar-link justify-content-between"  
                    href="manage_product">
                    <div class="d-flex align-items-center gap-3">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">Manage Product</span>
                    </div>
                    
                  </a>
                </li>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./manage_customer" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Customer</span>
              </a>
            </li>
			
			<li class="sidebar-item">
              <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-layout-grid"></i>
                  </span>
                  <span class="hide-menu">Rider</span>
                </div>
                
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a class="sidebar-link justify-content-between"  
                    href="add_rider">
                    <div class="d-flex align-items-center gap-3">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">Add rider</span>
                    </div>
                    
                  </a>
                </li>
                 <li class="sidebar-item">
                  <a class="sidebar-link justify-content-between"  
                    href="manage_rider">
                    <div class="d-flex align-items-center gap-3">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">Manage rider</span>
                    </div>
                    
                  </a>
                </li>
              </ul>
			  
            </li>
			
			
		
			
			<li class="sidebar-item">
              <a class="sidebar-link" href="./manage_cart" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Cart</span>
              </a>
            </li>
			<li class="sidebar-item">
              <a class="sidebar-link" href="./manage_order" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Order</span>
              </a>
            </li>	
            <li class="sidebar-item">
              <a class="sidebar-link" href="./manage_contact" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Contact</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./manage_feedback" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Feedback</span>
              </a>
            </li>		


          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    @endsection
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
    <!-- 2 Include these two files --> 
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> 