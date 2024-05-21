@extends('admin.layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <a href="/dashboard/home-banners/create" class="btn btn-success mb-3"> Tambah Banner</a>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Home Banners</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($homebanners as $homebanner)
        
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td><img src="{{ asset('storage/' . $homebanner->image) }}" width="150"></td>
                      <td>{{ $homebanner->title }}</td>
                      <td>
                        <a href="/dashboard/home-banners/{{ $homebanner->id }}/edit" class="btn btn-warning btn-circle btn-sm">
                          <i class="fas fa-info-circle"></i>
                        </a>
                        <form action="/dashboard/home-banners/{{ $homebanner->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                        
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>

</div>
<!-- /.container-fluid -->

@endsection