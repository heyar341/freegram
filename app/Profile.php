<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];


//    public function profileImage(){
//        $imagePath = ($this->image) ? $this->image : "profile/Lt7G1TYSI5iu87OpUrY5uc94P4MRVMS4RJ7q9n7t.png";
//        return '/storage/' .$imagePath;
//    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function followers()
{
    return $this->belongsToMany('App\User');
}
}
