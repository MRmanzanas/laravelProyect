<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

 /**http://127.0.0.1:8000/storage/profile/dYF8kcpcdv1yTdzYFJwmQkzdPA7MZNJy4i4c1eOh.png */

    public function profileImage(){

        $imagePath = ($this->image) ? $this->image : '/profile/dYF8kcpcdv1yTdzYFJwmQkzdPA7MZNJy4i4c1eOh.png';
        return '/storage/' . $imagePath;
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function followers(){

        return $this->belongsToMany(User::class);
    }
}
