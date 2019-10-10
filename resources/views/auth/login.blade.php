@extends('layout.app')

@section('content')
<style>
    html,
    body {
        height: 100%;
    }
</style>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">

        <div class="card shadow-sm border-0" style="width: 20rem;">
            <div class="card-header text-center font-weight-bold" style="background-color:white;">Welcome back!</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="password">{{ __('E-Mail Address') }}</label>
                        <div class="">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <div class="">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-home btn-block">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link mt-3 btn-sm" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="card-footer mx-auto" style="background-color:white;">
                <small>Not yet <a href="{{route('register')}}">signed up?</a></small>
            </div>
        </div>
    </div>
</div>
@endsection
