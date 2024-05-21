@extends('admin.layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Table Products</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Product Name</th>
                          <th>Stock</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Stock</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($lowStocks as $lowstock)

                      <tr class="{{ $lowstock->stock == 0 ? 'table-danger' : ($lowstock->stock < 3 ? 'table-warning' : 'table-success') }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lowstock->name_product }}</td>
                        <td>{{ $lowstock->stock }}</td>
                        <td align=center>

                          <a href="/dashboard/products/{{ $lowstock->id }}" class="btn btn-info btn-sm">
                            <i class="fas fa-info-circle"></i>
                          </a>

                        </td>
                      </tr>
                        
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <div class="d-flex justify-content-end mb-4">
    {{ $lowStocks->links() }}
  </div>

</div>
<!-- /.container-fluid -->


@endsection