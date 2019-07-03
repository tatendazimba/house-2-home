@extends("layouts.panel")

@section('content')
    @include("partials.nav-admin")
    @include("partials.sidebar")

    <main class="full-height">

        @include("partials.linebreak")

        <form action="{{ $url }}" enctype="multipart/form-data" method="POST">

            @csrf
            @method($method)

            <div class="row">
                <div class="col s12">
                    <h4>Create New Post</h4>

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
            </div>


            <div class="row">
                <div class="col s12 m8">
                    <div class="col s12">
                        <div class="required input-field">
                            <label class="active required">Title</label>
                            <input type="text" placeholder="" name="title" value="{{ old('title', $story->title) }}" autofocus required>
                        </div>
                    </div>

                    <div class="col s12">
                        <div class="input-field">
                            <label class="active">Description</label>
                            <textarea type="text" placeholder="" name="content"  style="height: 250px !important;" required>{{ old('content', $story->content) }}</textarea>
                        </div>
                    </div>

                    @include("partials.linebreak")

                    <div class="col s12">
                        <strong>IMAGES ({{  $story->images->count() }})</strong> <br>
                        @foreach($story->images as $image)
                            <div class="inline-block center-align" >
                                <div class="" style="width: 80px; height: 80px; background: url('/uploads/{{ $image->url }}') no-repeat bottom right; background-size: cover">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @include("partials.linebreak")

                    <div class="col s12">
                        <strong>TAGS ({{  $story->tags->count() }})</strong> <br>
                        @foreach($story->tags as $tag)
                            <div class="label grey outline ">
                                <strong class="text uppercase">{{ $tag->name }}</strong>
                            </div>
                        @endforeach

                        @if($story->id)
                            <div class="black white-text icon label valign-wrapper">

                                <strong class="text uppercase">New Tag</strong>

                                <a class="white dropdown circle black-text cursor-click" href='#' data-target='tags-{{ $story->id }}'>
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
                        @endif
                    </div>

                    @include("partials.linebreak")

                    <div class="col s12">
                        <div class="required input-field">
                            <label class="active required">Mandatory Image</label>
                            <input type="file" placeholder="" name="image_one" class="col s12">
                        </div>
                    </div>

                    <div class="col s12">
                        <div class="required input-field">
                            <label class="active required">2nd Image</label>
                            <input type="file" placeholder="" name="image_two" class="col s12">
                        </div>
                    </div>

                    <div class="col s12">
                        <div class="required input-field">
                            <label class="active required">3rd Image</label>
                            <input type="file" placeholder="" name="image_three" class="col s12">
                        </div>
                    </div>

                    <div class="col s12">
                        <div class="required input-field">
                            <label class="active required">4th Image</label>
                            <input type="file" placeholder="" name="image_four" class="col s12">
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

                    <div class="col s12 m6">
                        <div class="input-field">
                            <button class="black btn-large" type="submit">
                                <span class="text">
                                    Save Post
                                </span>
                                <span class="circle icon white black-text">
                                    <i class="material-icons">add</i>
                                </span>
                            </button>
                        </div>

                        @include("partials.linebreak")

                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
