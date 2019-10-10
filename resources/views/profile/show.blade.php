@extends('layout.app')
@section('content')
@include("includes/_navigation")
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-12 card shadow-sm border-0 mt-5">
            <div class="card-header text-center font-weight-bold">
                <img class="img-fluid img-thumbnail" width="64" height="64" src="{{$profile->avatar}}" alt="{{$profile->username}}"/>
                <h4 class="text-center">{{$profile->username}} <a href="{{route('profile.edit')}}" title="Edit Profile" class="btn btn-sm btn-outline-primary text-sm">Edit</a></h4>
                <p class="text-muted">{{$profile->about}}</p>
            </div>
            <div class="card-body">
                <h4>Your Posts <small>({{number_format(count($profile->posts))}})</small></h4>
                @if(count($profile->posts) > 0)
                    <ul>
                        @foreach($profile->posts as $post)
                            <li>{{$post->title}}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Send your <a href="{{ route('index') }}">first post</a></p>
                    <!-- @TODO: Add post create route to up href -->
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
