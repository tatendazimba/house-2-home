<div id="" class="grey">
    <nav class="transparent" style="">
        <div class="transparent navbar-wrapper overflow-visible">
            <ul class="overflow-visible">
                <li class="">
                    <a class="cursor-click valign-wrapper black-text full-height">
                        Browse:
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

            </ul>
        </div>
    </nav>
</div>
