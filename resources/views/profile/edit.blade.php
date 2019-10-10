@extends('layout.app')
@section('content')
@include("includes/_navigation")
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-12 card shadow-sm border-0 mt-5">
            <div class="card-header text-center font-weight-bold" style="background-color:white;">Welcome back!</div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-6 form-group float-right">
                        <label for="username">{{ __('Username') }}</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $profile->username }}" required autocomplete="username">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $profile->email }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6 form-group float-right">
                        <label for="avatar">{{ __('Avatar') }}</label>
                        <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                        <small class="text-warning">If you would like your avatar not be change, leave blank.</small>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                        <small class="text-warning">If you would like your password not be change, leave blank.</small>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 form-group">
                        <label for="about">{{ __('About') }}</label>
                        <textarea id="about" class="form-control @error('about') is-invalid @enderror" name="about">{{$profile->about}}</textarea>
                        @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group text-center col-4 float-right">
                        <button type="submit" class="btn btn-home btn-block">
                            {{ __('Update') }}
                        </button>
                    </div>
                    <div class="form-group text-right col-4 float-right">
                        <a href={{route('profile.destroy')}} class="btn btn-outline-danger">Destroy Profile</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
