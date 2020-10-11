<div class="full-width left-align" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col s12" style="position: relative;">
            <div class="">
                <div class="" style="position: relative;">
                    <img alt="" class="full-width left" src="{{ 'https://house2home.co.zw/uploads/' . $post->images[0]->url }}">
                </div>

                <div class="caption">
                    <div class="mobile-flex flex">
                        <div class="">
                            <h1 class="no-margin primary-font white-text">{{ $post->title }}</h1>
                        </div>
                    </div>

                    <h4 class="white-text no-margin top-small-margin bottom-small-margin">
                        {{ $post->content }}
                    </h4>

                    <br>

                    <h5>
                        <a href="https://house2home.co.zw/story/{{ $post->id }}" class="black-text">
                            <strong class="white-text">
                                <u>SHOP THE LOOK</u>
                            </strong>
                        </a>
                    <h5>
                </div>
            </div>
        </div>
    </div>
</div>
