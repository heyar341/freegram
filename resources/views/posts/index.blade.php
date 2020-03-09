@extends('layouts.app')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            {{--            投稿表示の領域--}}

            <div class="row d-flex align-items-center">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div>
                                <h3>本の題名</h3>
                                <div class="text-center">
                                    <a href="/profile/{{$post->user->id}}" style="max-width: 300px">
                                        <img src="/storage/{{ $post->image }}" class="w-50 h-50 d-block mx-auto" style="display: inline-block; max-width: 300px">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    {{--       ユーザー画像             --}}
                                    <div class="pr-3">
                                        <img src="/storage/{{ $post->user->profile->image }}" class="w-100 rounded-circle" style="max-width: 35px">
                                    </div>
                                    {{--      ユーザー名              --}}
                                    <div class="font-weight-bold">
                                        <a href="/profile/{{ $post->user->id }}">
                                            <span class="text-dark">{{ $post->user->username }}</span>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class=>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">お気に入り</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">コメント</button>
                                    </div>
                                    <small class="text-muted">{{ $post->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection
