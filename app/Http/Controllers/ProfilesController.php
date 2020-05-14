<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(\App\User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $newtime = strtotime($user->created_at);
        $data = date('M d, Y',$newtime);

        return view('profiles/index',compact('user', 'follows','data') );
    }

     public function edit(\App\User $user)
    {
        $this->authorize('update',$user->profile);
        return view('profiles/edit', compact('user'));
    }

    public function update(User $user){

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);        

        

        if (request('image')){
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

            $imageArray =  ['image' => $imagePath];
        }

      
        auth()->user()->profile->update(array_merge(

            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
 