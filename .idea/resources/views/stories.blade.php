@extends("layouts.panel");

@section('content')
    @include("partials.nav-panel")
    @include("partials.sidebar")

    <main class="full-height">

        @include("partials.linebreak")

        <div class="row">
            <div class="col s12">
                <h4>Stories</h4>
                <p>Add, View, Edit & Delete Stories</p>
            </div>
        </div>

        @include("partials.linebreak")

        <div class="">
            <div class="row">
                <div class="white col s12">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            {{--<th>Content</th>--}}
                            <th>Published On</th>
                            <th>Last Edited</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stories as $story)
                            <tr>
                                <td>{{ $story->id }}</td>
                                <td>
                                    <strong>{{ $story->title }}</strong>
                                    [ <a href="{{ route('stories.edit', $story) }}">Edit</a> ]

                                    <br><br>

                                    @if($story->images->count() > 0)
                                        @foreach($story->images as $image)
                                            @if(substr( $image->url, 0, 4 ) === "http")
                                                <div class="inline-block center-align" >
                                                    <div class="" style="width: 80px; height: 80px; background: url('{{ $image->url }}') no-repeat bottom right; background-size: cover">
                                                    </div>
                                                    <form action="{{ route('images.destroy', $image) }}" method="POST">
                                                        @csrf
                                                        @method("DELETE")

                                                        <button type="submit" class="link delete">Remove</button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="inline-block center-align" >
                                                    <div class="" style="width: 80px; height: 80px; background: url('/uploads/{{ $image->url }}') no-repeat bottom right; background-size: cover">
                                                    </div>
                                                    <form action="{{ route('images.destroy', $image) }}" method="POST">
                                                        @csrf
                                                        @method("DELETE")

                                                        <button type="submit" class="link delete">Remove</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif

                                    <br><br>

                                    @foreach($story->tags as $tag)
                                        <div class="{{ $colours[strlen($tag->name) % count($colours)] }} icon label valign-wrapper">
                                            <form action="{{ route('remove.tag', ['story' => $story, 'tag' => $tag])  }}" method="post">
                                                @csrf

                                                <strong class="text uppercase">{{ $tag->name }}</strong>

                                                <button type="submit" class="circle black-text cursor-click">
                                                    <i class="material-icons">close</i>
                                                </button>

                                            </form>
                                        </div>
                                    @endforeach

                                    <div class="blue-grey lighten-1 white-text icon label valign-wrapper">

                                        <strong class="text uppercase">New Tag</strong>

                                        <a class="blue-grey darken-2 dropdown circle white-text cursor-click" href='#' data-target='tags-{{ $story->id }}'>
                                            <i class="material-icons">more_horiz</i>
                                        </a>
                                    </div>

                                    <ul id='tags-{{ $story->id }}' class='dropdown-content'>
                                        @foreach($allTags as $tag)
                                            <li>
                                                <form class="" action="{{ route('add.tag', ['story' => $story, 'tag' => $tag]) }}" method="post">
                                                    @csrf

                                                    <input type="hidden" name="status" value="{{ $tag->id }}" required>

                                                    <button type="submit" class="btn full-width left-align">
                                                        {{ $tag->name }}
                                                    </button>

                                                </form>
                                            </li>
                                        @endforeach
                                        <li>
                                    </ul>

                                </td>
                                <td>{{ $story->created_at }}</td>
                                <td>{{ $story->updated_at }}</td>
                                <td>
                                    <div class="red accent-3 icon label white-text valign-wrapper">
                                        <form action="{{ route('stories.destroy', ['story' => $story->id]) }}" method="post">
                                            @csrf
                                            @method("DELETE")

                                            <strong class="text uppercase">Delete</strong>

                                            <button type="submit" class="circle black-text cursor-click">
                                                <i class="material-icons">close</i>
                                            </button>

                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @include("partials.linebreak")

            <div class="row">
                <div class="col s12">
                    {{ $stories->links() }}
                </div>
            </div>

        </div>
    </main>
@endsection
