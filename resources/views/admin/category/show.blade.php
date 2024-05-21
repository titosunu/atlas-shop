@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <a href="/dashboard/categories" class="btn btn-success"><i class="bi bi-arrow-bar-left"></i> Back To Products</a>
            <a href="/dashboard/categories/{{ $category->id }}/edit" class="btn btn-warning text-white"><i class="bi bi-pencil"></i> Edit</a>
            <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
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
                        <div class="col-md-5">
                            <img src="{{ asset('storage/' . $category->image) }}" width="70%" alt="">
                        </div>
                        <div class="col-md-7 mt-5">
                            <h2>{{ $category->name }}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Description</td>
                                        <td>:</td>
                                        <td>{{ ($category->description) }}</td>
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