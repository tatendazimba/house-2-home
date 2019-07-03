<div class="transparent hide-on-med-and-down">
    <nav class="tiny-nav transparent container" style="height: 356px;">
        <div class="transparent navbar-wrapper overflow-visible">
            <div class="full-width">
                <ul>
                    <li class="valign-wrapper">
                        <form action="{{ route("search") }}" method="POST" class="full-width">
                            @csrf
                            <input id="search" type="text" class="no-margin" placeholder="Search" name="search">
                        </form>
                    </li>
                </ul>
                <ul class="right overflow-visible hide-on-med-and-down">
                    <li>
                        <a target="_blank" href="https://www.facebook.com/House2HomeZ/" class="valign-wrapper">
                            <img class="ignore" src="{{ asset('images/icons/social/facebook-colour.svg') }}" style="height: 16px !important;">
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.instagram.com/house2home.zw/" class="valign-wrapper">
                            <img class="ignore" src="{{ asset('images/icons/social/instagram-colour.svg') }}" style="height: 16px !important;">
                        </a>
                    </li>

                    <li>
                        <a target="_blank" href="https://wa.me/263733636940?text={{ urlencode("Hi, I was going through your website and I'd like to make an enquiry.") }}" class="valign-wrapper black-text">
                            <img class="ignore" src="{{ asset('images/icons/social/whatsapp-colour.svg') }}" style="height: 16px !important;"> &nbsp;&nbsp;
                            +263 733 636 940
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div id="" class="">
    <nav class="transparent container" style="">
        <div class="transparent navbar-wrapper overflow-visible">

            <a href="{{ route('home') }}" class="brand-logo valign-wrapper black-text" style="height: 72px !important; display: flex !important;">
                <img class="ignore left-small-padding" src="{{ asset('images/logo/h2h.svg') }}" style="height: 32px !important;">
            </a>

            <a href="#" data-target="mobile-menu" class="sidenav-trigger black-text valign-wrapper" style="height: 72px;">
                <img src="{{ asset("images/icons/menu.svg") }}">
            </a>

            <ul class="right hide-on-med-and-down overflow-visible">
                <li class="{{ setActive(['/']) }}">
                    <a href="{{ route('home') }}" class="cursor-click valign-wrapper black-text full-height">
                        HOME
                    </a>
                </li>

                <li class="{{ setActive(['decor-tips/*']) }}">
                    <a href="{{ route('decor', "ALL") }}" class="cursor-click valign-wrapper black-text">
                        DECOR TIPS
                    </a>
                </li>

                @foreach($popularTags as $tag)
                    <li class="{{ setActive([route("search", $tag->name, false)]) }}">
                        <a href="{{ route('search', $tag->name) }}" class="cursor-click valign-wrapper black-text full-height uppercase">
                            {{ strtoupper($tag->name) }}
                        </a>
                    </li>
                @endforeach

                <li>
                    <a href="{{ route('shop', "ALL") }}" class="primary btn-large cursor-click valign-wrapper ">
                        BUY HOMEWARE
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="transparent hide-on-large-only">
    <nav class="tiny-nav transparent container">
        <div class="transparent navbar-wrapper overflow-visible">
            <div class="full-width">
                <ul class="full-width">
                    <li class="valign-wrapper full-width">
                        <form action="{{ route("search") }}" method="POST" class="full-width center-align">
                            @csrf
                            <input id="search" type="text" class="" placeholder="Search" name="search" style="margin: 5px;">
                        </form>
                    </li>
                </ul>
                <ul class="right overflow-visible hide-on-med-and-down">
                    <li>
                        <a target="_blank" href="https://www.facebook.com/House2HomeZ/" class="valign-wrapper">
                            <img class="ignore" src="{{ asset('images/icons/social/facebook-colour.svg') }}" style="height: 16px !important;">
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.instagram.com/house2home.zw/" class="valign-wrapper">
                            <img class="ignore" src="{{ asset('images/icons/social/instagram-colour.svg') }}" style="height: 16px !important;">
                        </a>
                    </li>

                    <li>
                        <a target="_blank" href="https://wa.me/263733636940?text={{ urlencode("Hi, I was going through your website and I'd like to make an enquiry.") }}" class="valign-wrapper black-text">
                            <img class="ignore" src="{{ asset('images/icons/social/whatsapp-colour.svg') }}" style="height: 16px !important;"> &nbsp;&nbsp;
                            +263 733 636 940
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<ul class="sidenav" id="mobile-menu" style="background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('{{ asset("images/green-and-brown.jpeg") }}') no-repeat bottom right; background-size: cover;">

    <li class="">
        <a href="{{ route('home') }}" class="top-margin bottom-margin" style="height: 48px !important;">
            <img class="ignore full-height" src="{{ asset('images/logo/h2h.svg') }}" >
        </a>
    </li>

    <li class="{{ setActive(['/']) }}">
        <a href="{{ route('home') }}" class="cursor-click valign-wrapper white-text full-height">
            HOME
        </a>
    </li>

    <li class="{{ setActive(['decor-tips/*']) }}">
        <a href="{{ route('decor', "ALL") }}" class="cursor-click valign-wrapper white-text">
            DECOR TIPS
        </a>
    </li>

    @foreach($popularTags as $tag)
        <li class="{{ setActive(['/tag/' . $tag->name]) }}">
            <a href="{{ route('search', $tag->name) }}" class="cursor-click valign-wrapper white-text full-height uppercase">
                {{ $tag->name }}
            </a>
        </li>
    @endforeach

    <li>
        <a href="{{ route('shop', "ALL") }}" class="primary btn cursor-click valign-wrapper white-text">
            <strong>BUY HOMEWARE</strong>
        </a>
    </li>
</ul>
