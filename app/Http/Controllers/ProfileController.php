<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(){
       return view('user.profile' ,[
           'profile' => auth()->user()->profile
           ]);
    }

    public function update(){

        $data = request()->validate([
            'firstname' => ['string', 'max:50', 'nullable'],
            'lastname'  => ['string', 'max:50', 'nullable'],
            'address'   => ['string', 'max:120','nullable'],
            'city'      => ['string', 'max:50', 'nullable'],
            'country'   => ['string', 'max:50', 'nullable'],
            'postalCode'=> ['string', 'max:15', 'nullable'],
            'aboutMe'   => ['string', 'max:255','nullable']
        ]);

        $profile = auth()->user()->profile;

        $profile->update($data);

        return back();
    }

    public function store(){
        $data = request()->validate([
            'avatar'    => ['image'],
            'background'=> ['image']
        ]);

        if (isset($data['avatar']))
         $data['avatar'] = request('avatar')->store('avatars');

        if (isset($data['background']))
         $data['background'] = request('background')->store('backgrounds');

        $profile = auth()->user()->profile;
        $profile->update($data);

        return back();
    }
}
