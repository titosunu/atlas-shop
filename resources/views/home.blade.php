    @extends('layouts.app')

    <!-- Main Section-->
    @section('content')


      <!-- Page Content Goes Here -->

      <!-- / Top banner -->
      <section class="vh-75 vh-lg-60 container-fluid rounded overflow-hidden" data-aos="fade-in">
          <!-- Swiper Info -->
          <div class="swiper-container overflow-hidden rounded h-100 bg-light" data-swiper data-options='{
            "spaceBetween": 0,
            "slidesPerView": 1,
            "effect": "fade",
            "speed": 1000,
            "loop": true,
            "parallax": true,
            "observer": true,
            "observeParents": true,
            "lazy": {
              "loadPrevNext": true
              },
              "autoplay": {
                "delay": 5000,
                "disableOnInteraction": false
            },
            "pagination": {
              "el": ".swiper-pagination",
              "clickable": true
              }
            }'>
            <div class="swiper-wrapper">
          
              <!-- Slide-->
              @foreach ($homebanners as $homebanner)
              <div class="swiper-slide position-relative h-100 w-100 mt-5">
                <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                  <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                    style=" will-change: transform; background-image: url({{ asset('storage/' . $homebanner->image) }})">
                  </div>
                </div>
                <div
                  class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                  <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">{{ $homebanner->sub_title }}</p>
                  <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" data-swiper-parallax="100">
                    <span class="text-outline-light">{{ $homebanner->title }}</span> {{ $homebanner->title_stroke }}</h2>
                  <div data-swiper-parallax-y="-25">
                    <a href="./category.html" class="btn btn-psuedo text-white" role="button">{{ $homebanner->btn_txt }}</a>
                  </div>
                </div>
              </div>
              @endforeach
              <!-- /Slide-->
          
            </div>
          
            <div class="swiper-pagination swiper-pagination-bullet-light"></div>
          
          </div>
          <!-- / Swiper Info-->        </section>
      <!--/ Top Banner-->

      <!-- Featured Brands-->
      <div class="brand-section container-fluid" data-aos="fade-in">
          <div class="bg-overlay-sides-white-to-transparent bg-white py-5 py-md-7">
              <section class="marquee marquee-hover-pause">
                  <div class="marquee-body">
                      <div class="marquee-section animation-marquee-50">
                          <div class="mx-3 mx-lg-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-1.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-3 mx-lg-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-2.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-3 mx-lg-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-3.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-3 mx-lg-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-4.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-3 mx-lg-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-5.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-3 mx-lg-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-6.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-3 mx-lg-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-7.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-3 mx-lg-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-8.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-3 mx-lg-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-9.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                      </div>
                      <div class="marquee-section animation-marquee-50">
                          <div class="mx-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-1.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-2.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-3.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-4.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-5.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-6.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-7.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-8.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                          <div class="mx-5 f-w-24">
                              <a class="d-block" href="./category.html">
                                  <picture>
                                      <img class="img-fluid d-table mx-auto" src="{{ asset('./assets/images/logos/logo-9.svg') }}" alt="">
                                  </picture>
                              </a>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>
      <!--/ Featured Brands-->

      <div class="container-fluid">

          <!-- Featured Categories-->
          <div class="m-0">
                  <!-- Swiper Latest -->
                  <div class="swiper-container overflow-hidden overflow-lg-visible"
                    data-swiper
                    data-options='{
                      "spaceBetween": 25,
                      "slidesPerView": 1,
                      "observer": true,
                      "observeParents": true,
                      "breakpoints": {     
                        "540": {
                          "slidesPerView": 1,
                          "spaceBetween": 0
                        },
                        "770": {
                          "slidesPerView": 2
                        },
                        "1024": {
                          "slidesPerView": 3
                        },
                        "1200": {
                          "slidesPerView": 4
                        },
                        "1500": {
                          "slidesPerView": 5
                        }
                      },   
                      "navigation": {
                        "nextEl": ".swiper-next",
                        "prevEl": ".swiper-prev"
                      }
                    }'>


                  <div class="swiper-wrapper">
                      @foreach ($products as $index => $product)
                      @php
                          // Hitung nilai delay untuk setiap iterasi
                          $delay = $index * 100;
                      @endphp
                      <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                          <div class="me-xl-n2 me-xxl-n5" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                              <picture class="d-block mb-4 img-clip-shape">
                                  <img class="w-100" title="" src="{{ asset('storage/' . $product->image) }}" alt="">
                              </picture>
                              <p class="title-small mb-2 text-muted"><strong>IDR</strong> {{ number_format($product->price) }}</p>
                              <h4 class="lead fw-bold">{{ $product->name_product }}</h4>
                              <a href="{{ url('order') }}/{{ $product->id }}" class="btn btn-psuedo align-self-start">Shop Now</a>
                          </div>
                      </div>
                      @endforeach
                  </div>
                  
                    <div class="swiper-btn swiper-prev swiper-disabled-hide swiper-btn-side btn-icon bg-white text-dark ms-3 shadow mt-n5"><i class="ri-arrow-left-s-line "></i></div>
                    <div class="swiper-btn swiper-next swiper-disabled-hide swiper-btn-side swiper-btn-side-right btn-icon bg-white text-dark me-3 shadow mt-n5"><i class="ri-arrow-right-s-line ri-lg"></i></div>
                  
                  </div>
                  <!-- / Swiper Latest-->                <!-- SVG Used for Clipath on featured images above-->
              <svg width="0" height="0">
                <defs>
                <clipPath id="svg-slanted-one" clipPathUnits="objectBoundingBox">
                    <path d="M0.822,1 H0.016 a0.015,0.015,0,0,1,-0.016,-0.015 L0.158,0.015 A0.016,0.015,0,0,1,0.173,0 L0.984,0 a0.016,0.015,0,0,1,0.016,0.015 L0.837,0.985 A0.016,0.015,0,0,1,0.822,1"></path>
                </clipPath>
                </defs>
              </svg>            </div>
          <!-- /Featured Categories-->

          <!-- Homepage Banners-->
          <div class="pt-7 mb-5 mb-lg-10">
              <div class="row g-4">
                  <div class="col-12 col-xl-6 position-relative" data-aos="fade-right">
                      <picture class="position-relative z-index-10">
                          <img class="w-100 rounded" src="img/gambar4.jpg" alt="HTML Bootstrap Template by Pixel Rocket">
                      </picture>
                      <div class="position-absolute top-0 bottom-0 start-0 end-0 d-flex justify-content-center align-items-center z-index-20">
                          <div class="py-6 px-5 px-lg-10 text-center w-100">
                              <h2 class="display-1 mb-3 fw-bold text-white"><span class="text-outline-light">Livin</span> Lightly</h2>
                              <p class="fs-5 fw-light text-white d-none d-md-block">Thrift, often referred to as a frugal lifestyle, has gained popularity for its ability to save money and reduce environmental impact.</p>
                              <a href="./category.html" class="btn btn-psuedo text-white" role="button">Shop All Sale Items</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-xl-6" data-aos="fade-left">
                      <div class="row g-4 justify-content-start">

                        @foreach ($categories as $category)
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card position-relative overflow-hidden">
                                <picture class="position-relative z-index-10 d-block bg-light">
                                    <img class="w-100 rounded" src="{{ asset('storage/' . $category->image) }}" alt="HTML Bootstrap Template by Pixel Rocket">
                                </picture>
                                <div class="card-overlay">
                                    <p class="lead fw-bolder mb-2">{{ $category->name }}</p>
                                    <a href="/categories/{{ $category->id }}" class="btn btn-psuedo text-white py-2" role="button">See Collection</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                      </div>
                  </div>
              </div>
          </div>
          <!-- / Homepage Banners-->

          <div class="row g-3 align-items-center" data-aos="fade-up" data-aos-delay="000">
            
            <div class="col-md-4">
              <div class="card bg-white text-white" style="height: 34rem; overflow: hidden; position: relative;">
                <video src="{{ asset('./assets/video/vidio-1.mp4') }}" class="card-img-top object-fit-contain" muted autoplay loop style="height: 100%; width: 100%; object-fit: cover;"></video>
                
              </div>

            </div>

            <div class="col-md-4">
              <div class="card bg-white text-white" style="height: 34rem; overflow: hidden; position: relative;">
                <video src="{{ asset('./assets/video/vidio-2.mp4') }}" class="card-img-top object-fit-contain" muted autoplay loop style="height: 100%; width: 100%; object-fit: cover;"></video>
                
              </div>

            </div>

            <div class="col-md-4">
              <div class="card bg-white text-white" style="height: 34rem; overflow: hidden; position: relative;">
                <video src="{{ asset('./assets/video/vidio-3.mp4') }}" class="card-img-top object-fit-contain" muted autoplay loop style="height: 100%; width: 100%; object-fit: cover;"></video>
                
              </div>

            </div>
          </div>
          

          <!-- Instagram-->

          <!-- Swiper Instagram -->
          <div data-aos="fade-in">
            <h3 class="title-small text-muted text-center mb-3 mt-7"><i class="ri-instagram-line align-bottom"></i>
              Inspired outfit by Atlas
          </h3>
          <div class="overflow-hidden">
            <div class="swiper-container swiper-overflow-visible"
              data-swiper
              data-options='{
                  "spaceBetween": 20,
                  "loop": true,
                  "autoplay": {
                    "delay": 5000,
                    "disableOnInteraction": false
                  },
                  "breakpoints": {
                    "400": {
                      "slidesPerView": 2
                    },
                    "600": {
                      "slidesPerView": 3
                    },       
                    "999": {
                      "slidesPerView": 5
                    },
                    "1024": {
                      "slidesPerView": 6
                    }
                  }
                }'>
              <div class="swiper-wrapper mb-5">
          
                <!-- Start of instagram slideshow loop for items-->
                <div class="swiper-slide flex-column">
                  <picture>
                    <img
                      class="rounded shadow-sm img-fluid"
                      data-zoomable
                      src="{{ asset('./assets/images/fit/foto-1.jpg') }}"
                      title=""
                      alt="">
                  </picture>
                </div>
                <div class="swiper-slide flex-column">
                  <picture>
                    <img
                      class="rounded shadow-sm img-fluid"
                      data-zoomable
                      src="{{ asset('./assets/images/fit/foto-2.jpg') }}"
                      title=""
                      alt="">
                  </picture>
                </div>
                <div class="swiper-slide flex-column">
                  <picture>
                    <img
                      class="rounded shadow-sm img-fluid"
                      data-zoomable
                      src="{{ asset('./assets/images/fit/foto-3.jpg') }}"
                      title=""
                      alt="">
                  </picture>
                </div>
                <div class="swiper-slide flex-column">
                  <picture>
                    <img
                      class="rounded shadow-sm img-fluid"
                      data-zoomable
                      src="{{ asset('./assets/images/fit/foto-4.jpg') }}"
                      title=""
                      alt="">
                  </picture>
                </div>
                <div class="swiper-slide flex-column">
                  <picture>
                    <img
                      class="rounded shadow-sm img-fluid"
                      data-zoomable
                      src="{{ asset('./assets/images/fit/foto-5.jpg') }}"
                      title=""
                      alt="">
                  </picture>
                </div>
                <div class="swiper-slide flex-column">
                  <picture>
                    <img
                      class="rounded shadow-sm img-fluid"
                      data-zoomable
                      src="{{ asset('./assets/images/fit/foto-6.jpg') }}"
                      title=""
                      alt="">
                  </picture>
                </div>
                <div class="swiper-slide flex-column">
                  <picture>
                    <img
                      class="rounded shadow-sm img-fluid"
                      data-zoomable
                      src="{{ asset('./assets/images/fit/foto-7.jpg') }}"
                      title=""
                      alt="">
                  </picture>
                </div>
                <div class="swiper-slide flex-column">
                  <picture>
                    <img
                      class="rounded shadow-sm img-fluid"
                      data-zoomable
                      src="{{ asset('./assets/images/fit/foto-8.jpg') }}"
                      title=""
                      alt="">
                  </picture>
                </div>
                <!-- / end of items loop-->
          
              </div>
            </div>
          </div>
          </div>
          <!-- /Swiper Instagram-->
          <!-- / Instagram-->

      </div>

      <!-- /Page Content -->
    
        
    @endsection
    <!-- / Main Section-->