@extends('admin.layouts.main')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Product</h1>
    </div>

<div class="row">

<div class="col-lg-8">

    <a href="/dashboard/products" class="btn btn-success mb-2"><i class="bi bi-arrow-bar-left"></i> Back To Products</a>

    <form method="post" action="/dashboard/products/{{ $product->id }}" class="mb-4" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name_product" class="form-label">Name Product</label>
            <input type="text" class="form-control @error('name_product') is-invalid @enderror"  id="name_product" name="name_product" autofocus value="{{ old('name_product', $product->name_product) }}">
            @error('name_product')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror"  id="price" name="price" required autofocus value="{{ old('price', $product->price) }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categories</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    @if (old('category_id', $product->category_id ) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else    
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Product Image</label>
            <input type="hidden" name="oldImage" value="{{ $product->image }}">
            @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror"  id="description" name="description" required autofocus value="{{ old('description', $product->description) }}">
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="text" class="form-control @error('stock') is-invalid @enderror"  id="stock" name="stock" required autofocus value="{{ old('stock', $product->stock) }}">
            @error('stock')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>



        <button type="submit" class="btn btn-primary">Update Product</button>
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