<div class="full-width left-align">
    <div class="white bottom-margin">
        <div class="ignore square no-margin fade" style="">
            <idea-view-component :post="{{ json_encode($post) }}"></idea-view-component>
        </div>

        <div class="">
            <div class="with-small-padding">

                <div class="mobile-flex flex">
                    <div class="">
                        <h1 class="flow-text no-margin primary-font truncate">{{ $post->title }}</h1>
                    </div>
                </div>

                <h1 class="truncate small-text grey-text no-margin top-small-margin bottom-small-margin">{{ $post->content }}</h1>

                <a class="black-text">
                    <strong class="small-text">
                        BROWSE
                        <i class="material-icons">arrow_right</i>
                    </strong>
                </a>

            </div>
        </div>
    </div>
</div>
