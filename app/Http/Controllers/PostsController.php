<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
//middlewareでログイン中のみ投稿できるようにする
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

//followしていないとデータベースアクセスでエラーが出るので、followしていない場合、自分のprofileページに飛ぶ
        if(auth()->user()->following()->exists()){
            $users = auth()->user()->following()->pluck('profiles.user_id');

            $posts = Post::where('user_id', $users)->with('user')->latest()->paginate(3);

            return view('posts.index', compact('posts'));

        }
        else {
            return redirect('profile/' .auth()->user()->id);

        }
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

        //
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

//        auth()でログイン中のユーザーメソッドを使う
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

//        Post::create($data);

        return redirect('profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post)
    {
        return view('posts.show',compact('post'));
    }
}
