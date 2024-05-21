@extends('admin.layouts.main')

@section('content')

<div class="container">
  <div class="row">

      <div class="col-md-12 mt-3">

        <a href="/dashboard/order" class="btn btn-success mb-2"><i class="bi bi-arrow-bar-left"></i> Back To Orders</a>

          <div class="card shadow mb-4">
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-6">
                          <img src="{{ asset('storage/' . $order_details->product->image) }}" width="100%" alt="">
                      </div>
                      <div class="col-md-6 mt-5">
                          <h2>{{ $order_details->product->name_product }}</h2>
                          <table class="table">
                              <tbody>

                                  <tr>
                                      <td>Order Id</td>
                                      <td>:</td>
                                      <td>{{ $order->id }}</td>
                                  </tr>
                                  <tr>
                                      <td>Date</td>
                                      <td>:</td>
                                      <td>{{ $order->date }}</td>
                                  </tr>
                                  <tr>
                                      <td>Address</td>
                                      <td>:</td>
                                      <td>{{ $order->user->address }}</td>
                                  </tr>
                                  <tr>
                                      <td>No hp</td>
                                      <td>:</td>
                                      <td>{{ $order->user->nohp }}</td>
                                  </tr>
                                  <tr>
                                      <td>Username</td>
                                      <td>:</td>
                                      <td>{{ $order->user->name }}</td>
                                  </tr>
                                  <tr>
                                      <td>Email</td>
                                      <td>:</td>
                                      <td>{{ $order->user->email }}</td>
                                  </tr>
                                  <tr>
                                      <td>Qty</td>
                                      <td>:</td>
                                      <td>{{ $order_details->total }}</td>
                                  </tr>

                                @if ($order->resi == null)
                                    @if ($order->status == 1)
                                    <tr>
                                        <td>Nomer Resi</td>
                                        <td>:</td>
                                        <form action="/resi/{{ $order->id }}" method="POST">
                                            @csrf
                                            <td><input type="text" name="resi"></td>
                                            <td><button type="submit" class="btn btn-dark">Submit Resi</button></td>
                                        </form>
                                    </tr>
                                    @else

                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>Unpaid, tidak bisa mengirim resi</td>
                                    </tr>
                                        
                                    @endif
                                @else
                                <tr>
                                    <td>Nomer Resi</td>
                                    <td>:</td>
                                    <form action="/resi/{{ $order->id }}" method="POST">
                                        @csrf
                                        <td><input type="text" name="resi" autofocus value="{{ old('resi', $order->resi) }}"></td>
                                        <td><button type="submit" class="btn btn-dark">Submit Resi</button></td>
                                    </form>
                                </tr>
                                @endif

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