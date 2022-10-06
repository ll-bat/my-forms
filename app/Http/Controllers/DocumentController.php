<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docs;
use App\Rels;
use App\UserForm;
use App\Link;

class DocumentController extends Controller
{

    public function index(){
        $id = session()->get('form_id');
        $docs = Docs::where('uf_id', $id)->select('id','title', 'type','image','index', 'required')->orderBy('index','asc')->get();
        foreach ($docs as $doc){
             $doc->rels;
             $doc->image = $doc->getImage();
        }
        return $docs;
    }

    public function save(){
        $data = request()->validate([
            'id' => ['required', 'integer'],
            'title' => ['nullable', 'string']
        ]);

        $doc = Docs::find($data['id']);
        $doc->update($data);

        return response($doc, 200);
    }

    public static function createHeader(){
        $id = session()->get('form_id');
        $header = Docs::create(['uf_id' => $id, 'type' => 'header']);
        $rel = Rels::create(['docs_id' => $header->id]);
        $rel->value = "";

        $header->rels = $rel;
        return $header;
    }

    public function create(){
        $data = request()->validate([
            'type' => ['required', 'string']
        ]);

        $name = $data['type'].'_'.uniqid();

        $comp = Docs::create(['uf_id' => session()->get('form_id'),
                              'type' => $data['type'], 'name' => $name]);

        return response($comp->id, 200);
    }

    public function upload(Request $request, Docs $docs){
        $data = $request->validate([
            'image' => ['required', 'image']
        ]);

        if ($docs->image != 'null') {
            try {
                unlink('storage/'.$docs->image);
            } catch (\Exception $exception) {
                // image not found
            }
        }
        $docs->image = request('image')->store("docs");
        $docs->save();

        return response($docs->getImage() , 200);
    }

    public function update(Docs $docs){

        if (request()->has('required'))
        {
            $docs->toggleRequire();
            return response('success', 200);
        }

        $data = request()->validate([
            'type' => ['required', 'string'],
            'change' => ['required', 'integer']
        ]);

        $name = $data['type'].'_'.uniqid();

        $docs->update(['type' => $data['type'], 'name' => $name]);

        if ($data['change'] == 1){
            $docs->rels()->delete();
        }

        return response('success', 200);
    }

    public function updateIndex(Request $request){
        $data = request()->validate([
            'data' => ['array', 'required'],
            'data.*' => 'integer'
        ]);

        $id = session()->get('form_id');

        if (!$data || !$data['data']) return response('no data', '400');
        $data = $data['data'];

        $docs = Docs::where("uf_id", $id)->get();
        foreach ($docs as $doc){
            if ($doc->index != $data[$doc->id]){
                $doc->index = $data[$doc->id];
                $doc->save();
            }
        }

        return response('success', 200);
    }

    public function deleteUpload(Docs $docs){

        try {
            unlink('storage/'.$docs->image);
        } catch (\Exception $exception) {
            // image not found
        }

        $docs->image = 'null';
        $docs->save();

        return response('success', 200);
    }

    public function delete($id){
        $doc = Docs::find($id);
        if ($doc->image != 'null')
           unlink('storage/'.$doc->image);

        $doc->delete();

        return response('success', 200);
    }

}
