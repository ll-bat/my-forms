<?php

namespace App\Http\Controllers;

use App\Docs;
use App\Rels;
use App\Link;
use App\Res;
use App\Helperclass\Filter;
use App\Helperclass\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserDocsController extends Controller
{

    public function index(Link $link){
        
        if (!$link->active){
            return response('Not found', 404);
        }

        $ques = Docs::where('uf_id', $link->form_id)->orderBy('index', 'asc')->get();

        return view('user.docs.index', [
            'ques' => $ques
        ]);
     }


     public function submit(Link $link){

        if (!$link->active){
            return response('This page no longer accepts responses :((', 404);
        }

         $docs = Docs::where('uf_id', $link->form_id)->get();

         $validator = [];
         $filter    = new Filter();

         foreach ($docs as $doc) {
             $filter->getValidationRule($validator, $doc);
         }

         $data = \request()->validate($validator);

         $info = $filter->process($docs,$data);

         if (!$info){
             return back();
         }

         Json::save($link->form_id, $info);

         return response('Your response has been recorded', 200);
     }


     public function show(){
         $form_id = session()->get('form_id');

         if ($form_id == null){
              return response('Unauthorized', 403);
         }

         $questions = Docs::where('uf_id', $form_id)->orderBy('index', 'asc')->get();
 
         return view('admin.response', compact('questions'));
     }

     public function update(Res $res){
         if (!$res->form->user->is(\current_user())){
               return response('Unauthorized', 403);
         }

         $res->update(['is_seen' => 1]);

         return 'all-done';
     }
 
  
     public function getResponses(){
        $form_id = session()->get('form_id');

        if ($form_id == null){
            return response('Unauthorized', 403);
        }

        $responses = Json::load($form_id);

        return $responses;
     }

     public function getResponse($id){

        if (!session()->has('form_id'))
           return response('Unauthorized',403);

        $response = Json::loadWhere(session()->get('form_id'), $id);

        if ($response) return $response;

        return null;
     }

     public function deleteResponse($id){

        if (!session()->has('form_id')){
            return response('Unauthorized', 403);
        }

        $res = Res::find($id);

        if (!$res->form->user->is(current_user())){
            return response('Forbidden', 403);
        }

        // if (!$res->form->id != session()->get('form_id')){
        //     return response('Bad request', 400);
        // }

        $res->delete();

        return response('done', 200);
     }

}
