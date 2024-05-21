<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    <title>{{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto"
        rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image" sizes="16x16">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/libs.bundle.css') }}" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/theme.bundle.css') }}" />

    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="9edbc3bd-5239-4c11-9290-854a5dc1e915";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

    <noscript>
    <style>
        /**
            * Reinstate scrolling for non-JS clients
            */
        .simplebar-content-wrapper {
        overflow: auto;
        }
        
    </style>
    </noscript>

</head>
<body class="">

    @include('partials.navbar')
   
    <section class="mt-0 overflow-hidden">
        @yield('content')
    </section>

    @include('partials.footer')


    <!-- Vendor JS -->
    <script src="{{ asset('./assets/js/vendor.bundle.js') }}"></script>
    
    <!-- Theme JS -->
    <script src="{{ asset('./assets/js/theme.bundle.js') }}"></script>

    <script src="{{ asset('sign-in/js/jquery-3.7.1.min.js') }}"></script>
    {{-- <script src="{{ asset('sign-in/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweetalert::alert')

    <script>
        $(document).ready(function(){
            //ajax select kota asal
            $('select[name="province_origin"]').on('change', function () {
                let provinceId = $(this).val();
                if (provinceId) {
                    jQuery.ajax({
                        url: '/province/'+provinceId+'/cities',
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="city_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="city_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_id"]').empty();
                }
            });
        });
    </script>
    
</body>
</html>
