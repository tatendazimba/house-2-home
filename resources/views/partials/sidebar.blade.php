<div class="sidenav sidenav-fixed">
    <nav class="" style="height: 96px !important;">
        <div class="navbar-wrapper center" style="height: 96px !important;">
            <ul>
                <li class="" style="height: 96px !important;">
                    <a href="{{ url('/') }}" class="full-height logo">
                        <div class="full-height valign-wrapper center-align">
                            <div class="full-width">
                                <img src="{{ asset('images/logo/h2h.svg') }}" class="" style="height: 40px !important;">
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="center-align">

        <p>&nbsp;</p>

        <a href="{{ route('stories.create') }}">
            <button class="btn-large btn right-align btn-large wiretap">
                <div class="text">New Story</div>
                <div class="pink circle">
                    <i class="material-icons">add</i>
                </div>
            </button>
        </a>

        <p>&nbsp;</p>

    </div>

    <ul class="uppercase collapsible">
        <li class="active">
            <a class="collapsible-header valign-wrapper">
                <div class="icon center-align">
                    <img class="full-height" src="{{ asset('images/icons/story.svg') }}">
                </div>
                Stories
            </a>

            <div class="collapsible-body">
                <div class="light-grey">
                    <a href="{{ route('stories.index') }}">
                        View All
                    </a>
                </div>

                @foreach($popularTags as $tag)
                    <div>
                        <a href="{{ route('stories.per', $tag) }}" class="full-width capitalise">
                            {{ $tag->name }}
                        </a>
                    </div>
                @endforeach

            </div>
        </li>

        <li class="">
            <a class="collapsible-header valign-wrapper">
                <div class="icon center-align">
                    <img class="full-height" src="{{ asset('images/icons/tags.svg') }}">
                </div>
                Tags
            </a>

            <div class="collapsible-body">
                <div class="">
                    <a href="{{ route('tags.create') }}">
                        <strong>Add New</strong>
                    </a>
                </div>

                <div class="light-grey">
                    <a href="{{ route('tags.index') }}">
                        View All
                    </a>
                </div>
            </div>
        </li>

    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.collapsible');
        var instances = M.Collapsible.init(elems, {});
    });
</script>
