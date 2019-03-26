@extends("layouts.panel");

@section('content')
    @include("partials.nav-panel")
    @include("partials.sidebar")

    <main class="full-height">

        @include("partials.linebreak")

        <div class="row">
            <div class="col s12">
                <h4>Tags</h4>
                <p>Add, View, Edit & Delete Tags</p>
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Stories</th>
                            <th>Created On</th>
                            <th>Last Edited</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tagsList as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>
                                    <a href="{{ route('tags.edit', $tag) }}">
                                    {{ $tag->name }}
                                    </a>
                                </td>
                                <td>{{ $tag->description }}</td>
                                <td>{{ $tag->posts()->count() }}</td>
                                <td>{{ $tag->created_at }}</td>
                                <td>{{ $tag->updated_at }}</td>
                                <td>
                                    <div class="red accent-3 icon label white-text valign-wrapper">
                                        <form action="{{ route('tags.destroy', ['tag' => $tag]) }}" method="post">
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
                    {{ $tagsList->links() }}
                </div>
            </div>

        </div>
    </main>
@endsection
