<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docs extends Model
{
    protected $table = 'docs';
    protected $fillable = ['uf_id', 'title', 'type', 'image', 'require', 'name'];


    public function toggleRequire(){
        $this->required = !$this->required;
        $this->save();
    }

    public function rels(){
        return $this->hasMany(Rels::class)->select('id','value');
    }

    public function rel(){
        return $this->hasOne(Rels::class);
    }

    public function hasImage(){
        return $this->image != 'null';
    }
    
    public function getImage(){
        if ($this->hasImage())
          return asset('storage/'.$this->image);
        return '';
    }

}
