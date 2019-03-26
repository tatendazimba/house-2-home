<div class="black">
    <nav class="tiny-nav transparent container" style="height: 56px;">
        <div class="transparent navbar-wrapper overflow-visible">
            <ul class="right overflow-visible">
                <li>
                    <a target="_blank" href="https://www.facebook.com/House2HomeZ/" class="valign-wrapper">
                        <img class="ignore" src="{{ asset('images/icons/social/facebook.svg') }}" style="height: 16px !important;">
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://www.instagram.com/house2home.zw/" class="valign-wrapper">
                        <img class="ignore" src="{{ asset('images/icons/social/instagram.svg') }}" style="height: 16px !important;">
                    </a>
                </li>

                <li>
                    <a target="_blank" href="https://wa.me/263733636940?text={{ urlencode("Hi, I was going through your website and I'd like to make an enquiry.") }}" class="valign-wrapper">
                        <img class="ignore" src="{{ asset('images/icons/social/whatsapp.svg') }}" style="height: 16px !important;"> &nbsp;&nbsp;
                        +263 733 636 940
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div id="" class="white">
    <nav class="transparent container" style="">
        <div class="transparent navbar-wrapper overflow-visible">

            <a href="{{ route('home') }}" class="brand-logo valign-wrapper" style="height: 72px !important; display: flex !important;">
                <img class="ignore" src="{{ asset('images/logo/h2h.svg') }}" style="height: 32px !important;">
            </a>

            <a href="#" data-target="mobile-menu" class="sidenav-trigger black-text valign-wrapper" style="height: 72px;"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down overflow-visible">
                <li class="{{ setActive(['/']) }}">
                    <a href="{{ route('home') }}" class="cursor-click valign-wrapper black-text">
                        HOME
                    </a>
                </li>

                <li class="{{ setActive(['gallery/*']) }}">
                    <a href="{{ route('gallery', "ALL") }}" class="cursor-click valign-wrapper black-text">
                        GALLERY
                    </a>
                </li>

                <li class="{{ setActive(['makeovers/*']) }}">
                    <a href="{{ route('blog', "ALL") }}" class="cursor-click valign-wrapper black-text">
                        MAKEOVERS
                    </a>
                </li>

                <li class="{{ setActive(['decor-tips/*']) }}">
                    <a href="{{ route('decor', "ALL") }}" class="cursor-click valign-wrapper black-text">
                        DECOR TIPS
                    </a>
                </li>

                <li class="{{ setActive(['inspiration/*']) }}">
                    <a href="{{ route('inspirations', 'ALL') }}" class="cursor-click valign-wrapper black-text">
                        INSPIRATION
                    </a>
                </li>

                <li>
                    <a href="{{ route('shop', "ALL") }}" class="primary btn cursor-click valign-wrapper">
                        SHOP FOR PRODUCTS
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<ul class="sidenav" id="mobile-menu" style="margin-top: 36px;">
    <li class="{{ setActive(['/']) }}">
        <a href="{{ route('home') }}" class="cursor-click valign-wrapper black-text">
            HOME
        </a>
    </li>

    <li class="{{ setActive(['gallery/*']) }}">
        <a href="{{ route('gallery', "ALL") }}" class="cursor-click valign-wrapper black-text">
            GALLERY
        </a>
    </li>

    <li class="{{ setActive(['makeovers/*']) }}">
        <a href="{{ route('blog', "ALL") }}" class="cursor-click valign-wrapper black-text">
            MAKEOVERS
        </a>
    </li>

    <li class="{{ setActive(['decor-tips/*']) }}">
        <a href="{{ route('decor', "ALL") }}" class="cursor-click valign-wrapper black-text">
            DECOR TIPS
        </a>
    </li>

    <li class="{{ setActive(['inspiration/*']) }}">
        <a href="{{ route('inspirations', 'ALL') }}" class="cursor-click valign-wrapper black-text">
            INSPIRATION
        </a>
    </li>

    <li>
        <a href="{{ route('shop', "ALL") }}" class="primary btn cursor-click valign-wrapper white-text">
            <strong>SHOP FOR PRODUCTS</strong>
        </a>
    </li>
</ul>
