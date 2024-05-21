@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <div class="container mt-5">
    <!-- Title -->
    <div class="d-flex justify-content-between align-items-center py-3">
      <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #16123222</h2>
    </div>
  
    <!-- Main content -->
    <div class="row">
      <div class="col-lg-7">
        <!-- Details -->
        <div class="card">
          <div class="card-body">
            <div class="mb-3 d-flex justify-content-between">
              <div>
                <span class="me-3 text-muted">{{ Carbon\Carbon::parse($order->date)->format('d F Y') }}</span>
                <span class="me-3 fw-bold">ORDER ID: #{{ $order->id }}</span>
                @if ($order->status == 1)
                  <span class="badge rounded-pill bg-success">Status PAID</span>
                @else
                  <span class="badge rounded-pill bg-danger">Status UNPAID</span>
                @endif
              </div>
              <div class="d-flex">
                <div class="dropdown">
                  <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> Print</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <table class="table table-borderless">

              <tbody>                
                @foreach ($order_details as $order_detail)
                  <tr>
                    <td>
                      <div class="d-flex mb-2">
                        <div class="flex-shrink-0">
                          <img src="{{ asset('storage/' . $order_detail->product->image) }}" alt="" width="35" class="img-fluid">
                        </div>
                        <div class="flex-lg-grow-1 ms-3">
                          <h6 class="small mb-0">{{ $order_detail->product->name_product }}</h6>
                          <span class="small">{{ $order_detail->product->description }}</span>
                        </div>
                      </div>
                    </td>
                    <td><span class="badge rounded-pill bg-dark">Qty {{ $order_detail->total }}</span></td>
                    <td class="text-end">IDR. {{ number_format($order_detail->product->price) }}</td>
                  </tr>
                @endforeach
              </tbody>

              <tfoot>
                <tr>
                  <td colspan="2">Shipping (JNE)</td>
                  <td class="text-end">{{ number_format($order->tax) }}</td>
                </tr>
                <tr class="fw-bold">
                  <td colspan="2">TOTAL</td>
                  <td class="text-end">IDR. {{ number_format($order->total_price) }}</td>
                </tr>
              </tfoot>

            </table>
          </div>
        </div>
        <!-- Payment -->
        <div class="card">
          <div class="card-body">
            
            <div class="row">

              <ul class="list-group mb-5 d-lg-block rounded-0">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <span class="text-muted small me-2 f-w-36 fw-bolder">To:</span>
                        <span class="small text-uppercase">{{ $order->user->name }}</span>
                    </div>

                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <div class="d-flex">
                      <span class="text-muted small me-2 f-w-36 fw-bolder">Street:</span>
                      <span class="small">{{ $order->user->address }}</span>
                  </div>

                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <div class="d-flex">
                      <span class="text-muted small me-2 f-w-36 fw-bolder">Phone:</span>
                      <span class="small">{{ $order->user->nohp }}</span>
                  </div>

              </li>
              </ul>

              <div class="col-lg-12 text-center">
                <h4>Resi Information</h4>
                <span>
                  @if ($order->status == 1)
                      @if ($order->resi == null)
                        <p class="text-muted">Admin sedang memroses pengiriman barang, silahkan tunggu nomer resi akan dikirim disini.</p>
                      @else
                        <p class="text-muted">NO RESI: <span class="fw-bold">{{ $order->resi }}</span> <a href="https://parcelsapp.com/id/carriers/jne" class="text-muted" target="_blank">Click to tracking JNE</a></p>
                      @endif
                  @else
                      <p class="text-muted">Secure Your Experience: Complete Your <a href="/check-out">Payment</a> Today!</p>
                  @endif
                </span>
              </div>

              <a href="/export-invoice/{{ $order->id }}" class="btn btn-dark col-lg-12">EXPORT INVOICE</a>

            </div>

          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <!-- Customer Notes -->
        <div class="card ">
          <div class="card-body">
            <h4>Refund Policy</h4>
            <ul class="text-muted">
                <li>Pelanggan yang menerima produk yang rusak atau cacat diharapkan melaporkan kerusakan melalui video. Video harus jelas menunjukkan kondisi produk dan kerusakannya.</li>
                <li>Klaim pengembalian melalui video harus diajukan dalam waktu 7 hari setelah penerimaan produk.</li>
                <li>Jika klaim melalui video diterima, pelanggan dapat memilih antara penggantian produk yang rusak atau pengembalian dana penuh, termasuk biaya pengiriman awal.</li>
                <li>Produk pengganti akan dikirimkan setelah klaim melalui video diterima dan diverifikasi. Pengiriman produk pengganti dapat dikenakan biaya tambahan atau dapat disertakan dengan biaya pengiriman gratis.</li>
                <li>Pengembalian melalui video hanya berlaku untuk produk yang mengalami kerusakan atau cacat. Produk yang dikembalikan karena alasan lain mungkin tunduk pada kebijakan pengembalian standar.</li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
    </div>

@endsection
