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
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>{{ config('app.name', '') }}</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles-panel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/breakpoints.css') }}" rel="stylesheet">

    <link rel="icon" href="{{ asset('images/logo/h2h.png') }}" sizes="32x32">

</head>
<body>

    <div id="app" style="height: 100%;">
        @yield('content')
    </div>

    <script src="{{ asset('js/exif.js') }}"></script>
    <script src="{{ asset('js/ImageUploader.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        M.Carousel.init(document.querySelectorAll(".carousel.carousel-slider"), {
            fullWidth: true,
            indicators: true,
            duration: 200
        });

        M.Collapsible.init(document.querySelectorAll('.collapsible'), {});

        M.Dropdown.init(document.querySelectorAll('.dropdown'), {
            constrainWidth: false
        });

    </script>

    @yield("scripts")

</body>
</html>

