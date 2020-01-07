<div class="white bordered full-width left-align bottom-margin">
    <div class="white">
        <div class="mobile-flex flex row no-margin">
            <div class="col s9 no-pad">
                <div class="ignore square no-margin left" style="">
                    <idea-view-component :post="{{ json_encode($post) }}"></idea-view-component>
                </div>
            </div>
            <div class="col s3 no-pad">
                <div class="container">
                    <h1 class="small-text no-margin primary-font">
                        <strong>{{ $post->title }}</strong>
                    </h1>
{{--                    <h1 class="small-text black-text no-margin top-small-margin bottom-small-margin">{{ $post->content }}</h1>--}}
                </div>
            </div>
        </div>
    </div>
</div>
