<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function pathAvatar(){
        $path = $this->avatar ?? '';
        if ($path == '') $path='/avatars/avatar.png';
        return asset('storage/'.$path);
    }

    public function pathBack(){
        $path = $this->background ?? '';
        if ($path == '') $path = '/backgrounds/background.png';
        return asset('storage/'.$path);
    }
}
