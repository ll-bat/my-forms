<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
      protected $fillable = ['name'];

      public function allBlogs(){
          return $this->hasMany(Blog::class);
      }


      public function getCount(){
          return $this->hasMany(Blog::class)->where('is_public', 1)->count();
      }
}
