<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docs;
use App\Rels;

class HeaderController extends Controller
{
    
    public function create(){
        
        $header = Docs::create(['type' => 'header']);
        $rel = Rels::create(['docs_id' => $header->id]);
        $rel->value = "";

        $header->rels = $rel;
        return $header;
    }

}
