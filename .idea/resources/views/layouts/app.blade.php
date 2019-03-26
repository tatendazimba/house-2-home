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
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link rel="icon" href="{{ asset('images/logo/h2h.png') }}" sizes="32x32">

</head>
<body>

<div id="app">
@yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>

    $(document).ready(function () {
        const instance = M.Modal.init(
            document.getElementById("image-modal")
        );

        M.Sidenav.init(document.querySelectorAll('.sidenav'), {});

        $("img").click(function () {

            if ($(this).attr("class")) {
                if (!$(this).attr("class").includes("ignore")) {
                    const image = $(this.cloneNode(true));

                    image.removeClass("full-width").addClass("full-height");

                    $("#image-modal #content").html(image);

                    instance.open();
                }
            }
        });

        $("div").click(function () {

            if ($(this).attr("class")) {
                if (!$(this).attr("class").includes("ignore")) {
                    if ($(this).css('background')) {

                        const background = $(this).css('background');

                        // check if there's a url
                        if (background.indexOf("url(\"") !== -1) {

                            // get data between url ()
                            const url = background.substring(
                                background.lastIndexOf('url("') + 5,
                                background.lastIndexOf("\")")
                            );

                            // create image element
                            const img = document.createElement("img");

                            img.setAttribute("src", url);

                            // make full height
                            img.setAttribute("class", "full-height");

                            // append to modal
                            $("#image-modal #content").html(img);

                            // instance open
                            instance.open();

                        }
                    }
                }
            }
        });
    });

    M.Carousel.init(document.querySelectorAll(".carousel.carousel-slider"), {
        fullWidth: true,
        indicators: true,
        duration: 200
    });

    // const instance = M.Carousel.getInstance(elem);

    M.Collapsible.init(document.querySelectorAll('.collapsible'), {});

    M.Sidenav.init(document.querySelectorAll('.mobile-menu'), {});

</script>

@yield("scripts")
</body>
</html>

