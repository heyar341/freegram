<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ProfilesController extends Controller
{
    public function index($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('profiles.index', [
            'user' => $user,
                ]);
    }

    public function edit($user){
        $user = User::findOrFail($user);
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        auth()->user()->profile()->update($data);

        return redirect("/profile/{$user->id}");


    }
}
