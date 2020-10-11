<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="@yield('pageTitle') | Lifestyle Furniture Shop | Home Decor | Buy Online | Shopping | Harare | Zimbabwe | Modern Furniture | Wide Range of Homeware Products & Accessories | Homeware | Decor Magazine | house2home housetohome house 2 home zw | {{ config('app.name', 'House2Home Online Store') }} ">
    <meta name="keywords" content="@yield('pageTitle') | Lifestyle Furniture Shop | Home Decor | Buy Online | Shopping | Harare | Zimbabwe | Modern Furniture | Wide Range of Homeware Products & Accessories | Homeware | Decor Magazine | house2home housetohome house 2 home zw | {{ config('app.name', 'House2Home Online Store') }} ">

    <title>@yield('pageTitle') | Lifestyle Furniture Shop | Home Decor | Buy Online | Harare | Zimbabwe | House2Home Online Store - Creating a Lifestyle</title>

    <!-- <link rel="stylesheet" href="https://use.typekit.net/ddw4llj.css"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <link rel="stylesheet" href="https://house2home.co.zw/css/app.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One&display=swap" rel="stylesheet"> -->

    <!-- Styles -->
    <style>
        .col {
            padding: 0 !important;
        }

        body, .even, .odd {
            background: #fff !important;
            color: #fff !important;
        }

        h2, h3, h4, h5, body {
            font-family: 'Barlow', sans-serif !important;
        }

        .even .caption {
            background: #000031 !important;
            margin: 0 10%;
        }

        .odd .caption {
            background: #000031 !important;
            margin: 0 10%;
        }

        .caption {
            padding: 20px 50px;
            z-index: 5;
        }

        h1 {
            font-family: 'Dancing Script', cursive !important;
        }

        div.page {
            page-break-after: always;
            page-break-inside: avoid;
        }

        .title-box {
            padding: 50px;
            margin-top: 300px;
        }

        .title-box div {
            border: 1px solid white;
            padding: 50px;
        }
    </style>
    <link rel="icon" href="{{ asset('images/logo/h2h.png') }}" sizes="32x32">

</head>
<body>

<div id="app">
    @yield('content')
</div>

<!-- <script src="{{ asset('js/jquery.js') }}"></script> -->
<!-- <script src="{{ asset('js/materialize.js') }}"></script> -->
<!-- <script src="{{ asset('js/zoomOnHover.js') }}"></script> -->
<!-- <script src="{{ asset('js/app.js') }}"></script> -->

</body>
</html>

