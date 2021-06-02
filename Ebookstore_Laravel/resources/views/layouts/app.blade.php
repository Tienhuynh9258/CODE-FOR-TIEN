<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .slider-cap {
            font-size:30px;
        }

        .shop-now {
            width: 180px;
            height: 50px;
            border: 3px solid #fff;    
            background-color: rgba(255,255,255,0);
            color: #fff;
            font-size:15px;
        }

        .shop-now:hover {
            background-color: #3490dc;
            border: 3px solid #3490dc;    
        }

        #menu-list > li > a:hover {
            background-color: #3490dc;
            color: #fff;
        }

        .badge {
            padding-left: 9px;
            padding-right: 9px;
            border-radius: 9px;
        }

        .label-warning[href],
        .badge-warning[href] {
            background-color: #c67605;
        }

        #lblCartCount {
            font-size: 12px;
            background: #ff0000;
            color: #fff;
            padding: 0 5px;
            vertical-align: top;
            margin-left: -10px; 
        }

        .modal-lg {
            max-width: 80% !important;
        }

    </style>
    @stack('styles')
</head>
<body id='app'>
    <div class='container-fluid p-0'>
        @yield('nav')
        @yield('slider')
        @yield('content')
        @include('layouts.partials.footer')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
    <!-- <script type="text/javascript">
        alert(1);
    </script> -->
</body>
</html>