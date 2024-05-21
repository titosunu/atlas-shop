@extends('layouts.app')

@section('content')

<!-- Main Section-->
<section class="mt-0 ">
    <!-- Page Content Goes Here -->
    
    <!-- Category Top Banner -->
    <div class="py-10 bg-img-cover bg-overlay-dark position-relative overflow-hidden bg-pos-center-center rounded-0"
        style="background-image: url(img/banner.jpg);">
        <div class="container-fluid position-relative z-index-20" data-aos="fade-right" data-aos-delay="300">
            <h1 class="fw-bold display-6 mb-4 text-white mt-5">A Collection That Never Stops Evolving</h1>
            <div class="col-12 col-md-6">
                <p class="text-white mb-0 fs-5">
                    You never know what you'll find here. Our collection is in a constant state of flux, with new treasures appearing regularly. So, make it a habit to visit us frequently and stay updated with the ever-evolving world of Semarang
                </p>
            </div>
        </div>
    </div>
    <!-- Category Top Banner -->

    <div class="container-fluid" data-aos="fade-in">
        <!-- Category Toolbar-->
            <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/">Home</a></li>
                          <li class="breadcrumb-item">Shop</li>
                        </ol>
                    </nav>        <h1 class="fw-bold fs-3 mb-2 text-uppercase">Ready Stock Atlas ({{ $totalProducts }})</h1>
                    <p class="m-0 text-muted small col-md-9 mt-4">
                    Discover a world of high-quality products and exceptional service at our online store. From a diverse range of products to a seamless shopping experience, we are committed to delivering the best to our customers.</p>
                </div>
                <div class="col-md-3 mt-4 pt-2">

                    <select id="sort" name="sort" class="form-control" onchange="filterProducts(document.getElementById('categoryFilter').value, this.value)">
                        <option value="">Sort By Price</option>
                        <option value="">All</option>
                        <option value="high-to-low">High To Low</option>
                        <option value="low-to-high">Low To High</option>
                    </select>
                    <select class="form-control mt-2" id="categoryFilter" onchange="filterProducts(this.value)">
                        <option value="">Sort By Collection</option>
                        <option value="">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>            <!-- /Category Toolbar-->

        <div class="row g-4">
            @foreach ($products as $product)

            <div class="col-12 col-sm-6 col-lg-4">
                <!-- Card Product-->
                <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                    <div class="card-img position-relative">
                        <div class="card-badges">
                            @if ($product->stock == 0)
                            <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-secondary rounded-circle d-block me-1"></span> Sold Out</span>
                            @else
                            <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> Ready Stock</span>
                            @endif
                        </div>
                        <picture class="position-relative overflow-hidden d-block bg-light">
                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="{{ asset('storage/' . $product->image) }}" alt="">
                        </picture>
                            <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Buy Now</button>
                            </div>
                    </div>
                    <div class="card-body px-0">
                        <a class="text-decoration-none link-cover" href="{{ url('order') }}/{{ $product->id }}"><h4 class="mt-2 mb-0 text-center text-uppercase">{{ $product->name_product }}</h4></a>
                        <small class="text-muted d-block text-center"><strong>Stock</strong> {{ $product->stock }}</small>
                                <p class="mt-2 mb-0 small text-center"><strong>IDR</strong> {{ number_format($product->price) }}</p>
                    </div>
                </div>
                <!--/ Card Product-->
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-end mb-4 mt-4">
            {{ $products->appends($appends)->links() }}
        </div>
    </div>
    
    <!-- /Page Content -->
</section>
<!-- / Main Section-->
        <script>
        function filterProducts(categoryId, sortValue) {
            var url = "/shop";

            if (categoryId !== "") {
                url += "?category=" + categoryId;
            }

            if (sortValue !== "") {
                url += (categoryId !== "" ? "&" : "?") + "sort=" + sortValue;
            }

            window.location.href = url;
        }
        </script>
@endsection
