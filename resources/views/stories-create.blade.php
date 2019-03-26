@extends("layouts.panel");

@section('content')
    @include("partials.nav-panel")
    @include("partials.sidebar")

    <main class="full-height">

        @include("partials.linebreak")

        <div class="row">
            <div class="col s12">
                <h4>Add Story</h4>
                <p>Post a new story</p>
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

                                @if ($errors->any())
                                    <div class="">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>
                                                    <i class="material-icons red-text">error</i>
                                                    {{ $error }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <p>
                                    {{ session()->pull('code', '') }}
                                    {{ session()->pull('description', 'Fill in all required fields*') }}
                                </p>
                            </div>

                            <form action="{{ $url }}" enctype="multipart/form-data" method="POST">
                                @csrf

                                @method($method)

                                <div class="col s12">
                                    <div class="required input-field">
                                        <label class="active required">Title</label>
                                        <input type="text" placeholder="" name="title" value="{{ old('title', $story->title) }}" autofocus required>
                                    </div>
                                </div>

                                <div class="col s12">
                                    <div class="input-field">
                                        <label class="active">Content</label>
                                        <textarea type="text" placeholder="" name="content"  style="height: 400px !important;" required>{{ old('content', $story->content) }}</textarea>
                                    </div>
                                </div>

                                @include("partials.linebreak")

                                <div class="col s12">
                                    <label class="active">Please select text colour:</label>
                                </div>

                                <div class="col s12">
                                    <label class="input-field">
                                        <input class="with-gap" type="radio"name="text_colour" value="black-text" @if($story->text_colour == "black-text") checked @endif required>
                                        <span>Black Text</span>
                                    </label>
                                </div>

                                <div class="col s12">
                                    <label class="input-field">
                                        <input class="with-gap" type="radio" name="text_colour" value="white-text"  @if($story->text_colour == "white-text") checked @endif required>
                                        <span>White Text</span>
                                    </label>
                                </div>

                                @include("partials.linebreak")

                                <div class="col s12">
                                    <div class="required input-field">
                                        <label class="active required">Mandatory Image</label>
                                        <input type="file" placeholder="" name="image_one">
                                    </div>
                                </div>

                                <div class="col s12">
                                    <div class="required input-field">
                                        <label class="active required">2nd Image</label>
                                        <input type="file" placeholder="" name="image_two">
                                    </div>
                                </div>

                                <div class="col s12">
                                    <div class="required input-field">
                                        <label class="active required">3rd Image</label>
                                        <input type="file" placeholder="" name="image_three">
                                    </div>
                                </div>

                                <div class="col s12">
                                    <div class="required input-field">
                                        <label class="active required">4th Image</label>
                                        <input type="file" placeholder="" name="image_four">
                                    </div>
                                </div>

                                @include("partials.linebreak")

                                <div class="col s12 m6">
                                    <div class="input-field">
                                        <button class="pink btn-large" type="submit">
                                            Submit Story
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
