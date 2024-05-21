@extends('layouts.app')

@section('content')

<!-- Breadcrumbs-->
<div class="bg-dark py-6 mt-9">
    <div class="container-fluid">
        <nav class="m-0" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item breadcrumb-light"><a href="/">Home</a></li>
              <li class="breadcrumb-item breadcrumb-light"><a href="/shop">Shop</a></li>
              <li class="breadcrumb-item  breadcrumb-light active" aria-current="page">{{ $product->name_product }}</li>
            </ol>
        </nav>            
    </div>
</div>
<!-- / Breadcrumbs-->

<div class="container-fluid mt-5">

    <div class="row g-9" data-sticky-container>
        {{-- Product images --}}
        <div class="col-12 col-md-6 col-xl-7">
            <div class="row g-3" data-aos="fade-right">
                <div class="col-12">
                    <picture>
                        <img class="img-fluid" data-zoomable src="{{ asset('storage/' . $product->image) }}" alt="ATLAS PICT">
                    </picture>
                </div>
            </div>
        </div>
        {{-- /product images --}}

        <?php
            $star = 1;
            while($star<=$avgStarRating){ ?>
                
            <?php $star++;
            }?>

        <!-- Product Information-->
        <div class="col-12 col-md-6 col-lg-5">
            <div class="sticky-top top-5">
                <div class="pb-3" data-aos="fade-in">
                    <div class="d-flex align-items-center mb-4">
                        <p class="fw-bolder text-uppercase tracking-wider m-0 me-4"><a href="/categories/{{ $product->category->id }}">{{ $product->category->name }}</a></p>
                        <div class="d-flex justify-content-start align-items-center disable-child-pointer cursor-pointer"
                                data-pixr-scrollto
                                data-target=".reviews">
                                <!-- Review Stars Small-->
                                <div class="rating position-relative d-table">
                                    <div class="position-absolute stars" style="width: 100%">
                                        <?php
                                            $star = 1;
                                            while($star<=$avgStarRating){ ?>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                            <?php $star++;
                                        }?>
                                    </div>
                                    <div class="stars">
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                    </div>
                                </div>        <small class="text-muted d-inline-block ms-2 fs-bolder">({{ $avgRating }})</small>
                    </div>
                    </div>
                    
                    <h1 class="mb-1 fs-2 fw-bold">{{ $product->name_product }}</h1>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="fs-4 m-0">IDR {{ number_format($product->price) }}</p>
                    </div>
                    <div class="border-top mt-4 mb-3 product-option">
                        <small class="text-uppercase pt-4 d-block fw-bolder ,b-">
                            <span class="text-muted">Available Stock </span> : <span class="selected-option fw-bold"
                                    data-pixr-product-option="size">{{ number_format($product->stock) }}</span>
                            </small>
                        <small class="text-uppercase pt-4 d-block fw-bolder">
                            <span class="text-muted">Available Sizes </span> : <span class="selected-option fw-bold"
                                data-pixr-product-option="size">{{ ($product->description) }}</span>
                        </small>
                    </div>
                    <form action="{{ url('order') }}/{{ $product->id }}" method="post">
                        @csrf
                        <input type="hidden" name="destination" value="398">
                        <input type="hidden" name="weight" value="1000">
                        <input type="hidden" name="code" value="jne">
                        <input type="number" name="total_order" class="form-control" min="1" max="{{ $product->stock }}" placeholder="Enter the Total You Want to Buy" required>
                    <button class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow" type="submit">Add To Shopping Bag</button>
                    </form>
                
                    <!-- Product Highlights-->
                        <div class="my-5">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="text-center px-2">
                                        <i class="ri-24-hours-line ri-2x"></i>
                                        <small class="d-block mt-1">Next-day Delivery</small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="text-center px-2">
                                        <i class="ri-secure-payment-line ri-2x"></i>
                                        <small class="d-block mt-1">Secure Checkout</small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="text-center px-2">
                                        <i class="ri-service-line ri-2x"></i>
                                        <small class="d-block mt-1">Free Returns</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- / Product Highlights-->
                
                </div>
        </div>
        <!-- / Product Information-->
    </div>

    <!-- Review add -->
    <div class="card-details mt-2">
        <div class="row pt-3">
      
          <div class="col-md-12">
            <div class="form-group">

            <h3 class="fs-4 fw-bolder mb-2 reviews">Write a Review Here</h3>

                <form method="post" action="{{ url('/add-rating') }}" name="ratingForm" id="ratingForm">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="rate">
                        <input type="radio" id="star5" name="rating" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>

                    <input type="text" class="form-control" id="cc-number" name="review">

                    <input class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow" type="submit" name="submit">
                </form>

            </div>
          </div>
      
        </div>
      </div>
      <!-- / Review add -->

    <!-- Reviews-->
    <div class="col-12 mt-2" data-aos="fade-up">
        <h3 class="fs-4 fw-bolder mt-7 mb-4 reviews">Reviews</h3>
        
        <!-- Review Summary-->
        <div class="bg-light p-5 justify-content-between d-flex flex-column flex-lg-row">
            <div class="d-flex flex-column align-items-center mb-4 mb-lg-0">
                <div class="bg-dark text-white f-w-24 f-h-24 d-flex rounded-circle align-items-center justify-content-center fs-2 fw-bold mb-3">{{ $avgRating }}</div>
                <!-- Review Stars Medium-->
                <div class="rating position-relative d-table">
                    <div class="position-absolute stars" style="width: 100%">
                        <?php
                        $star = 1;
                            while($star<=$avgStarRating){ ?>
                                <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                            <?php $star++;
                        }?>
                    </div>
                    <div class="stars">
                        <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                        <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                        <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                        <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                        <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                    </div>
                </div>    </div>
            <div class="d-flex flex-grow-1 flex-column ms-lg-8">
                <div class="d-flex align-items-center justify-content-start mb-2">
                    <div class="f-w-20">
                        <!-- Review Stars Small-->
                        <div class="rating position-relative d-table">
                            <div class="position-absolute stars" style="width: 100%">
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                            </div>
                            <div class="stars">
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            </div>
                        </div>            </div>
                    <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ ( $userCounts[5] > 0 ? ($userCounts[5] / $ratingsCount) * 100 : 0) }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="fw-bold small d-block f-w-4 text-end">{{ $userCounts[5] }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-start mb-2">
                    <div class="f-w-20">
                        <!-- Review Stars Small-->
                        <div class="rating position-relative d-table">
                            <div class="position-absolute stars" style="width: 80%">
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                            </div>
                            <div class="stars">
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            </div>
                        </div>            </div>
                    <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ ( $userCounts[4] > 0 ? ($userCounts[4] / $ratingsCount) * 100 : 0) }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="fw-bold small d-block f-w-4 text-end">{{ $userCounts[4] }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-start mb-2">
                    <div class="f-w-20">
                        <!-- Review Stars Small-->
                        <div class="rating position-relative d-table">
                            <div class="position-absolute stars" style="width: 60%">
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                            </div>
                            <div class="stars">
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            </div>
                        </div>            </div>
                    <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ ( $userCounts[3] > 0 ? ($userCounts[3] / $ratingsCount) * 100 : 0) }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="fw-bold small d-block f-w-4 text-end">{{ $userCounts[3] }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-start mb-2">
                    <div class="f-w-20">
                        <!-- Review Stars Small-->
                        <div class="rating position-relative d-table">
                            <div class="position-absolute stars" style="width: 40%">
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                            </div>
                            <div class="stars">
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            </div>
                        </div>            </div>
                    <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ ( $userCounts[2] > 0 ? ($userCounts[2] / $ratingsCount) * 100 : 0) }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="fw-bold small d-block f-w-4 text-end">{{ $userCounts[2] }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-start mb-2">
                    <div class="f-w-20">
                        <!-- Review Stars Small-->
                        <div class="rating position-relative d-table">
                            <div class="position-absolute stars" style="width: 20%">
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                                <i class="ri-star-fill text-dark mr-1"></i>
                            </div>
                            <div class="stars">
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            </div>
                        </div>            </div>
                    <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ ( $userCounts[1] > 0 ? ($userCounts[1] / $ratingsCount) * 100 : 0) }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="fw-bold small d-block f-w-4 text-end">{{ $userCounts[1] }}</span>
                </div>
                <p class="mt-3 mb-0 d-flex align-items-start"><i class="ri-chat-voice-line me-2"></i> {{ $ratingsCount }} customers have reviewed this product</p>
            </div>
        </div><!-- / Rewview Summary-->

        @if (count($ratings)>0)
        
        <div class="row g-6 g-md-8 g-lg-10 my-3 mb-5">

            @foreach ($ratings as $rating)
            <div class="col-12 col-lg-6 col-xxl-4 ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Review Stars Small-->
                    <div class="rating position-relative d-table">
                        <div class="position-absolute stars" style="width: 100%">
                            <?php
                                $count=1;
                                while($count<=$rating->rating){ ?>
                                <i class="ri-star-fill text-dark mr-1"></i>
                            <?php $count++;    } ?>
                        </div>
                        <div class="stars">
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                        </div>
                    </div>            <div class="text-muted small">{{ date('j F Y', strtotime($rating->created_at)) }}</div>
                </div>
                <p class="fw-bold mb-2">{{ ucwords($rating->user->name) }}</p>
                <p class="fs-7">{{ $rating->review }}</p>
            </div>
            @endforeach

        </div>

        @else

        <p class="fw-bold mb-2 text-center mt-2">Review are not Available for this Product !</p>

        @endif

</div>

@endsection