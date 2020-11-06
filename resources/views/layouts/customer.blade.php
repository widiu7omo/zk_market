<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache"/>
    <meta http-equiv="cache-control" content="max-age=604800"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>Zona Kopi - Delivery</title>
    @laravelPWA
    <link href="{{asset('favicon.ico')}}" rel="shortcut icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Unica+One&display=swap" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('vendor/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Font awesome 5 -->
    <link href="{{asset('fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">

    <!-- custom style -->
    <link href="{{asset('css/mobile.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
    @livewireStyles

    <!-- custom javascript -->
    <script src="https://unpkg.com/eva-icons"></script>
    <script src="{{asset('js/script.js')}}" type="text/javascript"></script>

</head>
<body>


<!-- =============== screen-wrap =============== -->
<div class="screen-wrap">

    @if(Route::current()->uri !== 'detail'&& Route::current()->uri !== 'list/{name}' && Route::current()->uri !== 'list-address' &&Route::current()->uri !== 'pick_address' && Route::current()->uri !== 'cart' && Route::current()->uri !== 'profile' && Route::current()->uri !== 'payment' && Route::current()->uri !== 'checkout'&& Route::current()->uri !== 'address'&& Route::current()->uri !== 'orders'&& Route::current()->uri !== 'detail_order/{id}')
        @livewire('customer.components.header')
    @endif

    {{ $slot }}

<!-- nav-bottom -->
    @if(Route::current()->uri !== 'detail'&& Route::current()->uri !== 'address'&& Route::current()->uri !== 'checkout'&& Route::current()->uri !== 'pick_address'&& Route::current()->uri !== 'cart'&& Route::current()->uri !== 'detail_order/{id}')
        @livewire('customer.components.navbar')
    @endif

</div>
<!-- =============== screen-wrap end.// =============== -->

<script src="{{asset('vendor/snackbar/snackbar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/jquery-plugin/jquery.number.min.js')}}"></script>
@livewireScripts
<script type="text/javascript">
    /// some script
    eva.replace();
    // jquery ready start
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    // jquery end
</script>
<script>
    const cart = localStorage.getItem('cart');
    const mainHelper = {
        setItemCount(total) {
            $('span#cart-item').text(total);
        }
    }
    if (cart) {
        var parsed = JSON.parse(cart);
        const itemsCount = Object.keys(parsed);
        mainHelper.setItemCount(itemsCount.length);
    } else {
        localStorage.setItem('cart', JSON.stringify({}));
    }
</script>
@stack('script')
</body>
</html>
