@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <a href="/dashboard/products" class="btn btn-success"><i class="bi bi-arrow-bar-left"></i> Back To Products</a>
            <a href="/dashboard/products/{{ $product->id }}/edit" class="btn btn-warning text-white"><i class="bi bi-pencil"></i> Edit</a>
            <form action="/dashboard/products/{{ $product->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</button>
            </form>
        </div>

        {{-- {{ asset('storage/' . $product->image) }} --}}

        <div class="col-md-12 mt-3">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/' . $product->image) }}" width="100%" alt="">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2>{{ $product->name_product }}</h2>
                            <table class="table">
                                <tbody>

                                    <tr>
                                        <td>IDR</td>
                                        <td>:</td>
                                        <td>{{ number_format($product->price) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stock</td>
                                        <td>:</td>
                                        <td>{{ number_format($product->stock) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>:</td>
                                        <td>{{ ($product->description) }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection