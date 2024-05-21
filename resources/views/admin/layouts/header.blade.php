<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow ">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
  </button>

  <img src="{{ asset('/img/atlas-logo.png') }}" width="120px">

  @php
    $lowStockCount = \App\Models\Product::where('stock', '<', 3)->count();
  @endphp

  <ul class="navbar-nav ml-auto">

  <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <!-- Counter - Alerts -->
          <span class="badge badge-danger badge-counter">@if ($lowStockCount > 0) {{ $lowStockCount }} @endif</span>
      </a>
      <!-- Dropdown - Alerts -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
          aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">
              Alert Product
          </h6>
          @if ($lowStockCount > 0)
          <a class="dropdown-item d-flex align-items-center" href="/lowstock">
              <div class="mr-3">
                  <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                  </div>
              </div>
              <div>
                  <div class="small text-gray-500">Product Notif</div>
                  {{ $lowStockCount }} Product stocknya akan habis segera cek
              </div>
              <a class="dropdown-item text-center small text-gray-500">Alerts</a>
          </a>
          @else
            <a class="dropdown-item text-center small text-gray-500">Tidak Ada Notif</a>
          @endif
  </li>

  </ul>

</nav>
<!-- End of Topbar -->