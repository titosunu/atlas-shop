@extends('admin.layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <form action="{{ url('/dashboard/order/export') }}"  method="GET" class="d-flex align-items-center">

        <div class="col-lg-6">
            <label for="selected_month">Pilih Bulan untuk export excel</label><br>
            <select name="selected_month" id="selected_month" class="form-select mb-3">
                <!-- Buat opsi bulan sesuai kebutuhan Anda -->
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
                <!-- ... dan seterusnya -->
            </select>       
            <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2"><i
                class="fas fa-download fa-sm text-white-50"></i> Export Excel</button>
        </div>
            
    </form>
  
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
                            <th>Status</th>
                            <th>Pay</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Product Name</th>
                          <th>Status</th>
                          <th>Pay</th>
                          <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Carbon\Carbon::parse($order->date)->format('d F Y') }}</td>
                            <td>
                                @if ($order->status == 1)
                                <span class="badge bg-success text-white">Paid</span>
                                @else
                                <span class="badge bg-danger text-white">Unpaid</span>
                                @endif
                            </td>
                            <td>IDR {{ number_format($order->total_price) }}</td>
                            <td>
                                <a href="{{ url('dashboard') }}/order/detail/{{ $order->id }}" class="btn btn-dark">Detail Order</a>
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