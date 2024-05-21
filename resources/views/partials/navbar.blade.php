<nav class="navbar navbar-expand-lg navbar-light bg-white flex-column border-0 fixed-top">
    <div class="container-fluid">
        <div class="w-100">
            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <!-- Logo-->
                <a class="navbar-brand fw-bold fs-3 m-0 p-0 flex-shrink-0 order-0" href="/">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/atlas-logo.png') }}" alt="" width="100px">
                    </div>
                </a>
                <!-- / Logo-->

                <!-- Navbar Icons-->
                <ul class="list-unstyled mb-0 d-flex align-items-center order-1 order-lg-2 nav-sidelinks">

                    <!-- Mobile Nav Toggler-->
                    <li class="d-lg-none">
                        <span class="nav-link text-body d-flex align-items-center cursor-pointer" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation"><i class="ri-menu-line ri-lg me-1"></i> Menu</span>
                    </li>
                    <!-- /Mobile Nav Toggler-->

                    <!-- Navbar Login-->
                @guest    
                    @if (Route::has('login'))
                    <li class="ms-1 d-lg-inline-block">
                        <a class="nav-link text-body" href="{{ route('login') }}">
                            sign-in
                        </a>
                    </li>
                    @endif
                    <!-- /Navbar Login-->

                    <!-- Navbar Cart Icon-->
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="/history" role="button"  aria-expanded="false">History</a></li>
                            @role('admin')
                            <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @endrole
                            <li onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <a class="dropdown-item" href="{{ url('/profile') }}">
                                    Logout
                                </a>
        
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>  
                        </ul>
                    </li>
                    <li class="ms-1 d-inline-block position-relative dropdown-cart">
                        <?php
                            $order_first = \App\Models\Order::where('user_id', Auth::user()->id)->where('status',0)->first();
                            if(!empty($order_first))
                                {
                                    $notif = \App\Models\OrderDetail::where('order_id', $order_first->id)->count();
                                }
                        ?>
                        <a class="nav-link me-0 disable-child-pointer border-0 p-0 bg-transparent text-body"
                            type="button" href="{{ url('check-out') }}">
                            @if(!empty($notif))
                            cart ({{ $notif }})        
                            @endif
                        </a>
                    </li>
                    <!-- /Navbar Cart Icon-->
                @endguest
                </ul>
                <!-- Navbar Icons-->                

                <!-- Main Navigation-->
                <div class="flex-shrink-0 collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1 order-2 order-lg-1"
                    id="navbarNavDropdown">

                    <!-- Menu-->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown dropdown position-static">
                          <a class="nav-link dropdown-toggle {{ Request::is('/') ? 'active' : '' }}" href="/" role="button"  aria-expanded="false">
                            Home
                          </a>
                        </li>

                        <li class="nav-item dropdown dropdown position-static">
                          <a class="nav-link dropdown-toggle {{ Request::is('about') ? 'active' : '' }}" href="/about" role="button"  aria-expanded="false">
                            About
                          </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::is('shop') ? 'active' : '' }}" href="/shop" role="button"  aria-expanded="false">
                              Shop
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::is('categories') ? 'active' : '' }}" href="/categories" role="button"  aria-expanded="false">
                              Collection
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::is('refund-policy') ? 'active' : '' }}" href="/refund-policy" role="button"  aria-expanded="false">
                              Refund Policy
                            </a>
                        </li>
                        
                    </ul>                    <!-- / Menu-->

                </div>
                <!-- / Main Navigation-->

            </div>
        </div>
    </div>
</nav>