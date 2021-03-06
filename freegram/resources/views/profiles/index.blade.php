@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="background-color:#e3f2fd;">
            <div class="col-3 p-5">
                <img src="/storage/{{ $user->profile->image }}" class="rounded-circle w-100">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <h4>{{ $user->username }}</h4>

                        @if(auth()->user()->id != $user->id )
                        <follow-button user-id = "{{$user->id}}" follows="{{ $follows }}"></follow-button>
                        @endif
                    </div>
                    @can('update',$user->profile)
                        <a href="/p/create" class=" bg-white">Add a Post</a>
                    @endcan
                </div>
                @can('update',$user->profile)
                <a href="/profile/{{ $user->id }}/edit" class=" bg-white">Edit Profile</a>
                @endcan
                <div class="d-flex pt-5">
                    <div class="pr-5"><h4><strong>{{ $postCount }}</strong>posts</h4></div>
                    <div class="pr-5"><h4><strong>{{ $followersCount }}</strong>follower</h4></div>
                    <div class="pr-5"><h4><strong>{{$followingCount}}</strong>following</h4></div>
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
