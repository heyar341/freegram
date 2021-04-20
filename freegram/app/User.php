<?php

namespace App;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();

        static::created(function ($user){
           $user->profile()->create([
            'title' => 'NotCreated',
            'description' => 'NotCreated',
            'url' => 'NotCreated',
            'image' =>'profile/Lt7G1TYSI5iu87OpUrY5uc94P4MRVMS4RJ7q9n7t.png',
           ]);

        Mail::to($user->email)->send(new NewUserWelcomeMail());
        });
    }
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }


    public function following()
    {
        return $this->belongsToMany('App\Profile');
    }
    public function posts()
    {
        return $this->hasMany('App\Post')->orderBy('created_at','DESC');
    }
}