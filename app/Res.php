<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Res extends Model
{
     protected $fillable = ['form_id', 'data', 'is_seen'];

     public function form(){
          return $this->belongsTo(UserForm::class);
     }
}
