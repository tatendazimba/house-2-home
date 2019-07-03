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

        <div class="row">
            <div class="col s12 m8">
                <div class="white rounded">
                    <div id="page-1" class="page row">
                        <div class="col s12">

                            <div class="col s12">
                                <h4>Details</h4>
                                <p>
                                    {{ session()->pull('code', '') }}
                                    {{ session()->pull('description', 'Fill in all required fields*') }}
                                </p>
                            </div>

                            <form action="{{ $url }}" method="POST">
                                @csrf
                                @method($method)

                                <div class="col s12">
                                    <div class="required input-field">
                                        <label class="active required">Tag Name</label>
                                        <input type="text" placeholder="" name="name" value="{{ old('name', $tag->name)}}" autofocus required>
                                    </div>
                                </div>

                                <div class="col s12">
                                    <div class="input-field">
                                        <label class="active">Description</label>
                                        <textarea type="text" placeholder="" name="description">{{ old('description', $tag->description) }}</textarea>
                                    </div>
                                </div>

                                @include("partials.linebreak")

                                <div class="col s12 m6">
                                    <div class="input-field">
                                        <button class="black white-text btn-large" type="submit">
                                            <span class="text">
                                                Sumbit Tag
                                            </span>
                                            <span class="icon circle white black-text">
                                                <i class="material-icons">add</i>
                                            </span>
                                        </button>
                                    </div>

                                    @include("partials.linebreak")

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
