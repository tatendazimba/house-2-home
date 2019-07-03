@extends('layouts.panel')

@section('content')
    <main class="full-height no-margin no-pad" style="background-color: #f3f4f5;">
        <div class="container full-height valign-wrapper">
            <div class="row">
                <div class="col s12 m8 offset-m2 white rounded">
                    <div class="card">

                        <div class="col s12 bottom-margin" style="height: 96px !important;">
                            <ul>
                                <li class="" style="height: 96px !important;">
                                    <a href="{{ url('/') }}" class="full-height">
                                        <div class="full-height valign-wrapper">
                                            <div class="full-width">
                                                <img alt="house2home logo" src="{{ asset('images/logo/h2h.svg') }}" class="left-align" style="height: 64px !important;">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        @include("partials.linebreak")

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="col s12">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col s12">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col s12">

                                    @include("partials.linebreak")

                                    <div class="">
                                        <button type="submit" class="btn-large black">
                                            <span class="text">
                                                Submit Details
                                            </span>
                                            <span class="icon circle white black-text">
                                                <i class="material-icons">keyboard_arrow_right</i>
                                            </span>
                                        </button>

                                        <br>
                                    </div>
                                </div>


                                @if (Route::has('password.request'))
                                    <div class="col s12 top-padding">
{{--                                        <a class="grey-text small-text" href="{{ route('password.request') }}">--}}
{{--                                            <u>{{ __('Forgot Your Password?') }}</u>--}}
{{--                                        </a>--}}
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection