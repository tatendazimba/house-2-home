<div class="brown full-width" style="position: relative;">

    <div class="full-width row center-align" style="position: absolute; top: 10px; left: 0; right: 0;">
        <div class="col s12">
            <a target="_blank" href="#" data-target="mobile-menu" class="sidenav-trigger">
                <img class="ignore" src="{{ asset('images/icons/bars.svg') }}" style="height: 24px !important;">
            </a>
        </div>
    </div>

    <div class="full-width row center-align" style="position: absolute; bottom: 10px; left: 0; right: 0;">
        <div class="col s12 bottom-small-margin">
            <a target="_blank" href="https://www.facebook.com/House2HomeZ/" class="">
                <img class="ignore" src="{{ asset('images/icons/social/facebook-dark.svg') }}" style="height: 16px !important;">
            </a>
        </div>
        <div class="col s12">
            <a target="_blank" href="https://www.instagram.com/house2home.zw/" class="">
                <img class="ignore" src="{{ asset('images/icons/social/instagram-dark.svg') }}" style="height: 16px !important;">
            </a>
        </div>
    </div>
</div>

<div id="mobile-menu" class="sidenav valign-wrapper center-align" style="background: linear-gradient(rgba(255, 255, 255, .97), rgba(255, 255, 255, .93)), url('{{ asset("images/green-and-brown.jpeg") }}') no-repeat bottom right; background-size: cover;">

    <a href="#" class="sidenav-close" style="position: absolute; top: 10px; right: 20px;">
        <h1>
            <i class="material-icons">close</i>
        </h1>
    </a>

    <ul class="center-align full-width">

        <li class="">
            <a href="{{ route('home') }}" class="top-margin bottom-margin" style="height: 48px !important;">
                <img class="ignore full-height" src="{{ asset('images/logo/h2h.svg') }}" >
            </a>
        </li>

        <li class="{{ setActive(['/']) }}">
            <a href="{{ route('home') }}" class="cursor-click valign-wrapper black-text">
                HOME
            </a>
        </li>

        <li class="{{ setActive(['decor-tips/*']) }}">
            <a href="{{ route('decor', "ALL") }}" class="cursor-click valign-wrapper black-text">
                DECOR TIPS
            </a>
        </li>

        @foreach($popularTags as $tag)
            <li class="{{ setActive(['/tag/' . $tag->name]) }}">
                <a href="{{ route('search', $tag->name) }}" class="cursor-click valign-wrapper  black-text">
                    {{ $tag->name }}
                </a>
            </li>
        @endforeach

        <li>
            <div class="full-width">
                <a href="{{ route('shop', "ALL") }}" class="primary btn cursor-click white-text" style="width: auto;">
                    <strong>BUY HOMEWARE</strong>
                </a>
            </div>
        </li>
    </ul>
</div>
