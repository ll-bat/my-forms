<?php

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
