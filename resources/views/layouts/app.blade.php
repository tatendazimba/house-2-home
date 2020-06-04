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

    <link rel="stylesheet" href="https://use.typekit.net/ddw4llj.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One|Didact+Gothic|Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One&display=swap" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/buttons.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">--}}

    <link rel="icon" href="{{ asset('images/logo/h2h.png') }}" sizes="32x32">

</head>
<body>

<div id="app">
    @yield('content')
</div>

<script src="{{ mix('js/jquery.js') }}"></script>
<script src="{{ mix('js/materialize.js') }}"></script>
<script src="{{ mix('js/zoomOnHover.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript">
    window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","resetIdentity","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
    heap.load("2314566237");
</script>

</body>
</html>

