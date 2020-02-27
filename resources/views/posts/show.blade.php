@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
{{--       ユーザー画像とユーザー名の表示         --}}
                <div class="d-flex align-items-center">
{{--       ユーザー画像             --}}
                    <div class="pr-3">
                        <img src="/storage/{{ $post->user->profile->image }}" class="w-100 rounded-circle" style="max-width: 50px">
                    </div>
{{--      ユーザー名              --}}
                    <div class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
{{--         Followボタン               --}}
                        <a href="#" class="pl-3"><button class="btn-primary">Follow</button></a>
                    </div>

                </div>

{{--  <hr>で仕切り線が入る              --}}
                <hr>

                <p> <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span>
                </p>
                <p>{{ $post->caption }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
