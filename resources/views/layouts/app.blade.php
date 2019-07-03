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
    <meta name="description" content="{{ config('app.name', '') }} house2home housetohome house 2 home zw harare Mirror Kitchen Rugs Living Room Bedroom Table Bathroom accessories Storage Mink Decor Tips Throw Clock Accent Chairs Lamp Cushions & Pillows">
    <meta name="keywords" content="{{ config('app.name', '') }}  house2home housetohome house 2 home zw harare Mirror Kitchen Rugs Living Room Bedroom Table Bathroom accessories Storage Mink Decor Tips Throw Clock Accent Chairs Lamp Cushions & Pillows">

    <title>{{ config('app.name', '') }}</title>

    <link rel="stylesheet" href="https://use.typekit.net/ddw4llj.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Didact+Gothic|Josefin+Sans" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/buttons.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">--}}

    <link rel="icon" href="{{ asset('images/logo/h2h.png') }}" sizes="32x32">

    <script type="text/javascript">
        window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","resetIdentity","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
        heap.load("2314566237");
    </script>

</head>
<body>

<div id="app">
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>

@yield("scripts")

</body>
</html>

