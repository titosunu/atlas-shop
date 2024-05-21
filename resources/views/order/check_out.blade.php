@extends('layouts.app')

@section('content')

<!-- Main Section-->
<section class="mt-0 overflow-lg-hidden  vh-lg-100">
    <!-- Page Content Goes Here -->
    <div class="container">
        <div class="row g-0 vh-lg-100">
            <div class="col-12 col-lg-7 pt-5 pt-lg-10">
                <div class="pe-lg-5">
                    <!-- Logo-->
                    <a class="navbar-brand fw-bold fs-3 flex-shrink-0 mx-0 px-0" href="">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('img/atlas-logo.png') }}" alt="" width="200px" class="rounded mx-auto d-block">
                            </div>
                    </a>
                    <!-- / Logo-->
                    <div class="mt-5">
                        <h3 class="fs-5 fw-bolder mb-0 border-bottom pb-4">Your Cart</h3>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <tbody class="border-0">

                                    <!-- Cart Item-->
                                    @if (!empty($order))

                                    @foreach ($order_details as $order_detail)

                                    <div class="row mx-0 py-4 g-0 border-bottom">
                                        <div class="col-2 position-relative">
                                            <picture class="d-block border">
                                                <img class="img-fluid" src="{{ asset('storage/' . $order_detail->product->image) }}" alt="Atlas Pict">
                                            </picture>
                                        </div>
                                        <div class="col-9 offset-1">
                                            <div>
                                                <h6 class="justify-content-between d-flex align-items-start mb-2">
                                                    {{ $order_detail->product->name_product }}
                                                    <form action="{{ url('check-out') }}/{{ $order_detail->id }}" method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="border-0" onclick="return confirm('anda yakin?');"><i class="ri-close-line ms-3"></i></button>
                                                    </form>
                                                </h6>
                                                <span class="d-block text-muted fw-bolder text-uppercase fs-9">Size: {{ $order_detail->product->description }} / Qty: {{ $order_detail->total }}</span>
                                            </div>
                                            <p class="fw-bolder text-end text-muted m-0">IDR. {{ number_format($order_detail->product->price) }}</p>
                                        </div>
                                    </div>
                                        
                                    @endforeach
                                    
                                    @endif

                                    <!-- Cart Item-->
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                    <div class="pb-4 border-bottom">
                        <div class="d-flex flex-column flex-md-row justify-content-md-between mb-4 mb-md-2">
                            <div>
                                <p class="m-0 fw-bold fs-5">Grand Total</p>
                                <span class="text-muted small">Inc IDR {{ number_format($order->tax) }} Ongkir JNE</span>
                            </div>
                            <p class="m-0 fs-5 fw-bold">IDR {{ number_format($order->total_price) }}</p>
                        </div>
                    </div>
                    <button id="pay-button" class="btn btn-dark w-100 text-center">Pay!</button>                  </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</section>
<!-- / Main Section-->

<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          window.location.href = '/history/{{ $order->id }}' 
          console.log(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
</script>
@endsection
