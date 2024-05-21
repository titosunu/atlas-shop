<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <div class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Admin</div>
  </div>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Toko Atlas
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ Request::is('dashboard/products', 'dashboard/categories') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Item</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Items:</h6>
              <a class="collapse-item {{ Request::is('dashboard/products') ? 'active' : '' }}" href="/dashboard/products">Product</a>
              <a class="collapse-item {{ Request::is('dashboard/categories') ? 'active' : '' }}" href="/dashboard/categories">Categories</a>
          </div>
      </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item {{ Request::is('dashboard/order', 'dashboard/ratings') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-list"></i>
          <span>Report</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Sales Report</h6>
              <a class="collapse-item {{ Request::is('dashboard/order') ? 'active' : '' }}" href="/dashboard/order">Order</a>
              <a class="collapse-item {{ Request::is('dashboard/ratings') ? 'active' : '' }}" href="/dashboard/ratings">Rating & Review</a>
          </div>
      </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Addons
  </div>

  <li class="nav-item {{ Request::is('dashboard/home-banners') ? 'active' : '' }}" href="/dashboard/ratings">
      <a class="nav-link" href="/dashboard/home-banners">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Home Banner</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item" onclick="event.preventDefault();
  document.getElementById('logout-form').submit();">
      <a class="nav-link" href="{{ url('/profile') }}">
          <i class="fas fa-sign-out-alt"></i>
          <span>Log Out</span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
  </li>

  <hr class="sidebar-divider d-none d-md-block">

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->