<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($user_id)
    {
        $user = User::find($user_id);
        return view('home', [
            'user' => $user,
                ]);
    }
}
