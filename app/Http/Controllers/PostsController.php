<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){

        $data = request()->validate([
            'caption' =>'required',
            'image' => ['required','image'],
            ]
        );
//        auth()でログイン中のユーザーメソッドを使う
        auth()->user()->posts()->create($data);

//        Post::create($data);

        dd(request()->all());
    }
}
