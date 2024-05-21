@extends('admin.layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Ratings Table Products</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Email</th>
                        <th>Review</th>
                        <th>Ratings</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Email</th>
                        <th>Review</th>
                        <th>Ratings</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($ratings as $rating)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rating['product']['name_product'] }}</td>
                            <td>{{ $rating['user']['email'] }}</td>
                            <td>{{ $rating['review'] }}</td>
                            <td>{{ $rating['rating'] }}</td>
                            <td>
                                <form action="/dashboard/ratings/{{ $rating['id'] }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-circle btn-sm" type="submit" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  {{-- <div class="d-flex justify-content-end mb-4">
    {{ $ratings->links() }}
  </div> --}}

</div>
@endsection