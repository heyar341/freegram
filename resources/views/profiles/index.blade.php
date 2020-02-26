@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="https://scontent-nrt1-1.cdninstagram.com/v/t51.2885-19/s150x150/83213956_3360255157381124_5752385570823208960_n.jpg?_nc_ht=scontent-nrt1-1.cdninstagram.com&_nc_ohc=LBeT5dZZAtIAX-Z9-Su&oh=bc2c99c4e25f67b893e9c583d9267cc2&oe=5EF649BA"
                     class="rounded-circle">
            </div>
            <div class="col-9 pt-5">
                <div><h1>{{ $user->username }}</h1></div>
                <div class="d-flex">
                    <div class="pr-5"><strong>153</strong>posts</div>
                    <div class="pr-5"><strong>24</strong>follower</div>
                    <div class="pr-5"><strong>123</strong>following</div>
                </div>

                <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="www.freecodecamp.org">{{ $user->profile->url }}</a></div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-4">
                <img class="w-100" src="https://scontent-nrt1-1.cdninstagram.com/v/t51.2885-15/e35/c0.111.928.928a/s150x150/85099648_2535244706754098_6509943847503270911_n.jpg?_nc_ht=scontent-nrt1-1.cdninstagram.com&_nc_cat=102&_nc_ohc=RB_1bc2S1fUAX-iSPM8&oh=db65964a137393b4ed7679d9ce50c9b5&oe=5E8CE64D">
            </div>
            <div class="col-4">
                <img class="w-100" src="https://scontent-nrt1-1.cdninstagram.com/v/t51.2885-15/e35/c0.111.928.928a/s150x150/85099648_2535244706754098_6509943847503270911_n.jpg?_nc_ht=scontent-nrt1-1.cdninstagram.com&_nc_cat=102&_nc_ohc=RB_1bc2S1fUAX-iSPM8&oh=db65964a137393b4ed7679d9ce50c9b5&oe=5E8CE64D">
            </div>
            <div class="col-4">
                <img class="w-100" src="https://scontent-nrt1-1.cdninstagram.com/v/t51.2885-15/e35/c0.111.928.928a/s150x150/85099648_2535244706754098_6509943847503270911_n.jpg?_nc_ht=scontent-nrt1-1.cdninstagram.com&_nc_cat=102&_nc_ohc=RB_1bc2S1fUAX-iSPM8&oh=db65964a137393b4ed7679d9ce50c9b5&oe=5E8CE64D">
            </div>
        </div>
    </div>
@endsection
