@extends('admin.layouts.main')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Banner Home</h1>
</div>

<div class="row">

<div class="col-lg-8">

    <form method="post" action="/dashboard/home-banners" class="mb-4" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="sub_title" class="form-label">Sub Title Banner</label>
            <input type="text" class="form-control @error('sub_title') is-invalid @enderror"  id="sub_title" name="sub_title" autofocus value="{{ old('sub_title') }}">
            @error('sub_title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title Banner</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"  id="title" name="title" autofocus value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title_stroke" class="form-label">Title Stroke</label>
            <input type="text" class="form-control @error('title_stroke') is-invalid @enderror"  id="title_stroke" name="title_stroke" autofocus value="{{ old('title_stroke') }}">
            @error('title_stroke')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Banner Image <p class="text-warning">Recommended Photo Size 1600x600</p></label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="btn_txt" class="form-label">Button Text</label>
            <input type="text" class="form-control @error('btn_txt') is-invalid @enderror"  id="btn_txt" name="btn_txt" required autofocus value="{{ old('btn_txt') }}">
            @error('btn_txt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</div>

</div>

</div>

<script>

function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

</script>

@endsection