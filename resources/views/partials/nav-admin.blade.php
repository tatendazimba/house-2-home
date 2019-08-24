<div id="" class="transparent">
    <nav class="transparent right-small-padding" style="">
        <div class="transparent navbar-wrapper overflow-visible">

            <a href="#" data-target="sidenav" class="sidenav-trigger black-text valign-wrapper" style="height: 72px;"><i class="material-icons">menu</i></a>

            <ul class="right overflow-visible">
                <li class="{{ setActive(['blog/*']) }}">
                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button type="submit" class="cursor-click valign-wrapper white-text btn black">
                            <span class="uppercase" style="text-transform: capitalize !important;">Logout {{ request()->user()->name }}</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>

@section("scripts")
{{--    <script>--}}

{{--        $(document).ready(function () {--}}

{{--            M.Collapsible.init(document.querySelectorAll('.collapsible'), {});--}}

{{--            M.Sidenav.init(document.querySelectorAll('.sidenav'), {});--}}
{{--        });--}}

{{--    </script>--}}
@endsection
