<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['form_id', 'link', 'active'];

    function getFormAddress() {
        $base = request()->getHost();
        if (! str_starts_with($base, 'http')) {
            $base = 'http://' . $base;
        }

        $port = null; 
        if (env('APP_ENV') === 'local') {
            $port = request()->getPort();
        }
        
        $url = $base . ($port ? ":$port" : '') . '/form/' . $this->link;
        return $url;
    }
}
