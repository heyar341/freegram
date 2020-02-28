@extends('layouts.app')

@section('content')
<div class="content">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">

        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <h1>Edit</h1>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">{{ __('Title') }}</label>

                    <input id="title"
                           type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label">{{ __('Description') }}</label>
                <input id="description"
                       type="text"
                       class="form-control @error('description') is-invalid @enderror"
                       name="description" value="{{ old('description') ?? $user->profile->description}}" required autocomplete="description" autofocus>

                @error('description')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">{{ __('URL') }}</label>
                    <input id="url"
                       type="text"
                       class="form-control @error('url') is-invalid @enderror"
                       name="url" value="{{ old('url') ?? $user->profile->url}}" required autocomplete="url" autofocus>

                @error('url')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
                </div>

                <div class="row">
                    <label for="name" class="col-md-4 col-form-label">{{ __('Profile Image') }}</label>
                    <input type="file", class="form-control-file" id="image" name="image">

                    @error('image')
                    {{--                        <span class="invalid-feedback" role="alert">--}}
                    <strong>{{ $message }}</strong>
                    {{--                                    </span>--}}
                    @enderror
                </div>

                <div class="row pt-3">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
