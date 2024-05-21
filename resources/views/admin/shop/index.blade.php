@extends('admin.layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <a href="/dashboard/products/create" class="btn btn-success mb-3"> Tambah Produk</a>

  <div class="mb-3">
    <label for="categoryFilter">Filter by Category:</label>
    <select class="form-control" id="categoryFilter" onchange="filterProducts(this.value)">
      <option value="">Filter</option>
      <option value="">All</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>

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
                    @foreach ($products as $product)

                      <tr class="{{ $product->stock == 0 ? 'table-danger' : ($product->stock < 3 ? 'table-warning' : 'table-success') }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name_product }}</td>
                        <td>{{ $product->stock }}</td>
                        <td align=center>

                          <a href="/dashboard/products/{{ $product->id }}" class="btn btn-info btn-sm">
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
    {{ $products->links() }}
  </div>

</div>
<!-- /.container-fluid -->

<script>
  function filterProducts(categoryId) {
    // Cek jika categoryId kosong (All Categories)
    if (categoryId === "") {
      window.location.href = "/dashboard/products";
    } else {
      window.location.href = "/dashboard/products?category=" + categoryId;
    }
  }
</script>

@endsection