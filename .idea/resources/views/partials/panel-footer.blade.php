<div class="grey">

    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <div class="container">
        <div class="flex row">
            <div class="col s12 m4">
                <div class="container">
                    <h5>Categories</h5>

                    <ul>
                        @foreach($tags->slice(0, 5) as $tag)
                            <li>
                                <a class="capitalise black-text" href="{{ route('shop', $tag->name) }}">
                                    {{ $tag->name }}
                                </a>
                                <p class="truncate">{{ $tag->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="container">
                    <h5>Inspiration</h5>

                    <ul>
                        @foreach($inspiration->slice(0, 3) as $post)
                            <li>
                                <a class="capitalise black-text" href="">
                                    {{ $post->title }}
                                </a>
                                <p class="truncate">{{ $post->content }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="container">
                    <h5>Social Media</h5>

                    <p>
                        <a target="_blank" href="https://www.facebook.com/House2HomeZ/" class="">
                            <img class="right-margin" src="{{ asset('images/icons/social/facebook-dark.svg') }}" style="height: 16px !important;">
                        </a>
                        <a target="_blank" href="https://www.instagram.com/house2home.zw/" class="">
                            <img class="right-margin" src="{{ asset('images/icons/social/instagram-dark.svg') }}" style="height: 16px !important;">
                        </a>
                    </p>

                    <p>&nbsp;</p>

                    <h5>Location</h5>
                    <p>6 Cumberland Court</p>
                    <p>Avenues</p>
                    <p>Harare, Zimbabwe</p>

                    <p>&nbsp;</p>

                    <h5>Contact Us</h5>
                    <p><strong>Email</strong>: </p>
                    <p><strong>Phone</strong>: +263 733 636 940</p>

                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
