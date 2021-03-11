@extends('layouts.app')

@section('content')
    <div class="container mx-md-5 my-md-5 px-md-5 py-md-5 mx-sm-1 my-sm-1 px-sm-1 py-sm-1">
        <div class="row justify-content-center mt-md-5 mt-sm-3">
            <div class=" col-lg-8 col-md-8 col-sm-11">
                <div class="card">
                    <div class="h3 text-center"
                        style="color: red !important; min-width: 100% !important; margin: auto !important;">
                        <img class="img-fluid ml-lg-4 mr-md-4 mr-sm-1" src="{{ url('images/FINAL.png') }}" alt="{{ config('app.name', 'NEBRET') }}" style="width: 7rem !important; margin: auto !important; object-fit: cover !important;">
                    </div>
                    <div class="card-header text-center h4 font-weight-bold">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-sm-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6 col-sm-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-sm-12 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6 col-sm-12">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12 offset-md-4 offset-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 col-sm-12 offset-md-4 offset-sm-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 col-sm-12 text-center" style="width: 60% !important; margin: auto !important;">
                                    <a class="btn btn-link btn-sm"
                                        href="./register">{{ __('Don\'t have an account yet? Create here...') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
