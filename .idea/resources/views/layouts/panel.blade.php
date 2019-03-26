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
    <meta name="description" content="Bedroom Decor Living Room Decor Home Makeover">
    <meta name="keywords" content="Bedroom, Decor, Living, Room, Decor, Home, Makeover">

    <title>{{ config('app.name', '') }}</title>

    <link rel="stylesheet" href="https://rawgit.com/cycle-path/nhanga/master/src/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata:700|Amatic+SC:400,700|Didact+Gothic|News+Cycle|Josefin+Sans:300|Hind:300" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles-panel.css') }}" rel="stylesheet">

    {{--<!-- Include external CSS. -->--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">--}}

    {{--<!-- Include Editor style. -->--}}
    {{--<link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />--}}
    {{--<link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/css/froala_style.min.css" rel="stylesheet" type="text/css" />--}}

    <link rel="icon" href="{{ asset('images/logo/h2h.png') }}" sizes="32x32">

</head>
<body>

<div id="app">
@yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- Include JS file. -->
{{--<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/js/froala_editor.min.js'></script>--}}

{{--<script> $(function() { $('textarea').froalaEditor() }); </script>--}}

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

