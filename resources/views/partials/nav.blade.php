<div class="white" style="border-bottom: 1px solid rgb(188, 193, 189);">
    <nav class="tiny-nav transparent container">
        <div class="transparent navbar-wrapper overflow-visible">
            <div class="full-width">
                <ul class="right overflow-visible">
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
                </ul>
            </div>
        </div>
    </nav>
</div>

<div id="" class="white">
    <nav class="transparent container" style="">
        <div class="transparent navbar-wrapper overflow-visible">

            <a href="{{ route('home') }}" class="brand-logo valign-wrapper black-text" style="height: 72px !important; display: flex !important;">
                <img class="ignore left-small-padding" src="{{ asset('images/logo/h2h.svg') }}" style="height: 48px !important;">
                <div class="" style="position: relative;">
                    <strong>&nbsp;House2Home</strong>
                    <div class="" style="position: absolute; top: 20px; right: 0;">
                        <span class="black white-text" style="padding: 2px;">
                            <strong>&nbsp;STORE&nbsp;</strong>
                        </span>
                    </div>
                </div>
            </a>

            <a href="#" data-target="mobile-menu" class="sidenav-trigger black-text valign-wrapper" style="height: 72px !important;">
                <img src="{{ asset("images/icons/bars.svg") }}" style="height: 24px !important;">
            </a>

            <a href="#" data-target="mobile-menu" class="right sidenav-trigger black-text valign-wrapper" style="height: 72px !important;">
                <img src="{{ asset("images/icons/cart.svg") }}" style="height: 24px !important;">
            </a>

            <ul class="right overflow-visible hide-on-med-and-down">
                <li class="{{ setActive(['/']) }}">
                    <a href="{{ route('home') }}" class="cursor-click valign-wrapper black-text full-height">
                        <h4 class="no-margin">
                            Creating A Lifestyle
                        </h4>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="white-text" style="background: linear-gradient(to right, rgba(0, 0, 0, 1), rgba(255, 0, 0, 1)), url('/images/green-and-brown.jpeg') no-repeat center center fixed; background-size: cover;">
    <nav class="tiny-nav transparent container">
        <div class="transparent navbar-wrapper overflow-visible">
            <div class="full-width">

                <ul class="left overflow-visible">
                    <li class="brand-logo">
                        <form action="{{ route("search", "all") }}" method="POST" class="center-align">
                            <div class="input-field search valign-wrapper">
                                @csrf
                                <input id="search" type="text" class="" placeholder="Search..." name="search" style="float: left;" required>
                                <button class="transparent btn hide-on-med-and-down" type="submit">
                                    <i class="material-icons" style="height: 36px; line-height: 36px; ">search</i>
                                </button>
                            </div>
                        </form>
                    </li>
                </ul>

                <ul class="right hide-on-med-and-down overflow-visible">
                    <li class="{{ setActive(['/']) }}">
                        <a href="{{ route('home') }}" class="cursor-click valign-wrapper">
                            <strong>HOME</strong>
                        </a>
                    </li>

                    <li class="{{ setActive(['decor-tips/*']) }}">
                        <a href="{{ route('decor', "ALL") }}" class="cursor-click valign-wrapper">
                            <strong>INSPIRATION</strong>
                        </a>
                    </li>

                    <li class="{{ setActive(['decor-tips/*']) }}">
                        <a href="{{ route('decor', "ALL") }}" class="cursor-click valign-wrapper">
                            <strong>ABOUT</strong>
                        </a>
                    </li>

                    <li class="{{ setActive(['decor-tips/*']) }}">
                        <a href="{{ route('decor', "ALL") }}" class="cursor-click valign-wrapper">
                            <strong>CONTACT</strong>
                        </a>
                    </li>

                    <li class="{{ setActive(['decor-tips/*']) }}">
                        <a href="{{ route('decor', "ALL") }}" class="cursor-click valign-wrapper">
                            <strong>
                                <i class="material-icons">shopping_cart</i>
                            </strong> (0)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
