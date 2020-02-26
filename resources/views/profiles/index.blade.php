@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="https://scontent-nrt1-1.cdninstagram.com/v/t51.2885-19/s150x150/83213956_3360255157381124_5752385570823208960_n.jpg?_nc_ht=scontent-nrt1-1.cdninstagram.com&_nc_ohc=LBeT5dZZAtIAX-Z9-Su&oh=bc2c99c4e25f67b893e9c583d9267cc2&oe=5EF649BA"
                     class="rounded-circle">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
                    @can('update',$user->profile)
                        <a href="/p/create">Add a Post</a>
                    @endcan
                </div>
                @can('update',$user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan
                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts()->count() }}</strong>posts</div>
                    <div class="pr-5"><strong>24</strong>follower</div>
                    <div class="pr-5"><strong>123</strong>following</div>
                </div>
                @if($user->profile->title != 'NotCreated')
                <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                @endif
                @if($user->profile->description != 'NotCreated')
                <div>{{ $user->profile->description }}</div>
                @endif
                @if($user->profile->url != 'NotCreated')
                <div><a href="www.freecodecamp.org">{{ $user->profile->url }}</a></div>
                @endif
            </div>
        </div>

        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{ $post->id }}">
                    <img class="w-100" src="/storage/{{ $post->image }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
