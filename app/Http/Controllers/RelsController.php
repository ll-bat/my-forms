<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rels;
class RelsController extends Controller
{

    

    public function create(){
        $data = request()->validate([
            'id' => ['required', 'integer', 'exists:docs,id']
        ]);

        $rel = Rels::create(['docs_id' => $data['id']]);

        return response($rel->id, 200);
    }

    public function save(){
        $data = request()->validate([
            'id'  => ['required','integer'],
            'value' => ['nullable','string']
        ]);

        $rels = Rels::find($data['id']);
        $rels->update($data);

        return \response('success', 200);
    }

    public function remove(Rels $rels){
           $rels->delete();

           return response('success', 200);
    }
}
