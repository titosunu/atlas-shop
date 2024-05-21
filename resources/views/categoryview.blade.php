@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
<!-- Homepage Banners-->
<div class="pt-7 mb-2 mb-lg-10">
    <div class="row g-4">
        <div class="col-12 col-xl-12" data-aos="fade-left">
            <div class="row g-4 justify-content-start">

                @foreach ($categories as $category)
                <div class="col-12 col-md-3 d-flex">
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
</div>
@endsection