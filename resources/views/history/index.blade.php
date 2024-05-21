@extends('layouts.app')

@section('content')

@if(count($orders) > 0)

<div class="container-fluid mt-5">
    <div class="position-relative row my-lg-7 pt-5 pt-lg-0 g-8">


        <!-- Breadcrumbs-->
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item">History</li>
                </ol>
            </nav>
        </div>
        <!-- / Breadcrumbs-->

        <div class="col-md-12 mt-2 mb-5">

            <div class="table-responsive">

                    <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3>
                    <table class="table table-striped align-middle table-hover">
                        <thead class="table-dark">
                            <tr>
                                <td>No</td>
                                <td>Date</td>
                                <td>Status</td>
                                <td>Total Price</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ Carbon\Carbon::parse($order->date)->format('d F Y') }}</td>
                                    <td>
                                        @if ($order->status == 1)
                                            <span class="badge bg-success rounded-pill text-black fw-bold">PAID</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill text-black fw-bold">UNPAID</span>
                                        @endif
                                    </td>
                                    <td>IDR {{ number_format($order->total_price) }}</td>
                                    <td>
                                        <a href="{{ url('history') }}/{{ $order->id }}" class="btn btn-dark d-block w-100 my-4"><i class="fa fa-info"></i>Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
</div>

@else

<div class="container-fluid mt-10 mb-10">
    <div class="position-relative row my-lg-7 pt-5 pt-lg-0 g-8">
        <div class="mb-10 mt-10">

            <h1 class="text-center">NO HISTORY RESULT, CHECK <a href="/shop">SHOP</a></h1>
            
        </div>
    </div>
</div>

@endif



@endsection