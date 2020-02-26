<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class PostsController extends Controller
{
//middlewareでログイン中のみ投稿できるようにする
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

        $imagePath = request('image')->store('uploads','public');
//        auth()でログイン中のユーザーメソッドを使う
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

//        Post::create($data);

        return redirect('profile/' . auth()->user()->id);
    }
}
