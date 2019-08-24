<div id="sidenav" class="sidenav sidenav-fixed black white-text">
    <nav class="top-margin bottom-margin" style="height: 120px !important;">
        <div class="navbar-wrapper center" style="height: 120px !important;">
            <ul>
                <li class="" style="height: 120px !important;">
                    <div href="{{ url('/') }}" class="full-height valign-wrapper">
                        <div class="full-width center-align">
                            <img src="{{ asset('images/logo/h2h.svg') }}" class="" style="height: 72px !important;">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="center-align">

        <p>&nbsp;</p>

        <a href="{{ route('stories.create') }}">
            <button class="btn-large btn right-align btn-large white black-text">
                <div class="text">New Product</div>
                <div class="circle white-text black">
                    <i class="material-icons">add</i>
                </div>
            </button>
        </a>

        <p>&nbsp;</p>

    </div>

    <ul class="uppercase collapsible transparent">
        <li class="active">
            <a class="collapsible-header valign-wrapper white-text">
                <div class="icon center-align">
                    <img class="full-height" src="{{ asset('images/icons/story.svg') }}">
                </div>
                Posts
            </a>

            <div class="collapsible-body transparent">
                @foreach($allTags as $tag)
                    <div class="">
                        <a href="{{ route('stories.per', $tag) }}" class="full-width capitalise white-text">
                            {{ $tag->name }}
                        </a>
                    </div>
                @endforeach

                <div class="">
                    <a class="white-text" href="{{ route('tags.index') }}">
                        View All Tags
                    </a>
                </div>

            </div>
        </li>
    </ul>
</div>

{{--<script>--}}
{{--    document.addEventListener('DOMContentLoaded', function() {--}}
{{--        var elems = document.querySelectorAll('.collapsible');--}}
{{--        var instances = M.Collapsible.init(elems, {});--}}
{{--    });--}}
{{--</script>--}}
