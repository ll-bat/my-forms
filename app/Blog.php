<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = ['user_id', 'title','excerpt' ,'body', 'image'];

    public function path(){
        if ($this->image == '')
             return testBack();
        return asset('storage/'.$this->image);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getDay(){
        return  $this->created_at->format('d');
    }
    public function getMonth(){
        return  $this->created_at->format('M');
    }
    public function postDate(){
        return  $this->created_at->format('d M, yy');
    }
}
