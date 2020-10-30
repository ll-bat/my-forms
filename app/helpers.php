<?php

function getUrl(){
    return  \Illuminate\Support\Facades\URL::full();
}
function current_user(){
    return auth()->user();
}

function testBack(){
    return asset('storage/backgrounds/background.png');
}

function getAvatar(){
    if (auth()->user()) return current_user()->pathAvatar();
    return asset('storage/avatars/avatar.png');
}

function getTestFolder(){
    return asset('/storage/icons/folder1.png');
}

function userRoutes()
{
    return [
        ['route' => 'user.home', 'icon' => 'nc-icon nc-bank', 'name' => 'Home'],
        ['route' => 'user.profile', 'icon' => 'nc-icon nc-single-02', 'name' => 'Profile'],
    ];
}

function adminRoutes()
{
    return [
        ['route' => 'admin.docs', 'icon' => 'nc-icon nc-paper', 'name' => 'docs'],
    ];
}







