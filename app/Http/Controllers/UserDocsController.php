<?php

namespace App\Http\Controllers;

use App\Docs;
use App\Rels;
use Illuminate\Http\Request;

class UserDocsController extends Controller
{
     public function index(){
        $ques = Docs::all();

        return view('user.docs.index', [
            'ques' => $ques
        ]);
     }

     public function getValidationRule(&$validator, $doc){

        $type = $doc->type;
        if ($type == 'upload') $type = 'mimes:jpeg,jpg,png';
        elseif ($type == 'paragraph') $type = 'string';
        elseif ($type == 'checkbox') $type = 'array';
        else $type = 'integer';

        $rule = [$type];
        if ($doc->required) $rule[] = 'required';

        $validator[$doc->name] = $rule;
        if ($doc->type == 'checkbox'){
            $validator[$doc->name.'.*'] = 'integer';
        }
     }

     public function submit(){
         $docs = Docs::all();

         $validator = [];

         foreach ($docs as $doc) {
             $this->getValidationRule($validator, $doc);
         }

         $data = \request()->validate($validator);

         $this->process($docs,$data);
     }


     public function process($docs, $data){
         $ys = true;
         $rels = [];
         foreach ($docs as $doc) {
             $rel = $this->getData($doc->id, $data[$doc->name],  $doc->type);
             if (!$rel){
                 $ys = !$ys;
                 break;
             }
             $rels[$doc->name] = $rel;
         }

         if (!$ys){
//             return redirect()->to('docs');
         }

         dd($rels);
     }

     public function getData($id, $param, $t){
         $type = gettype($param);
         $data = null;
         if ($type == 'array'){
             $data = Rels::whereIn('id',  $param)->get();
             if (!$data) return false;

             $data = $data->map(function($d){
                 return $d->value;
             });
         }
         elseif ($type == 'string'){
             if  ($t != 'paragraph') {
                 $data = Rels::find($param);
                 if (!$data) return false;
                 $data = $data->value;
             }
             else
             {
                 return $param;
             }
         }
         elseif ($t == 'upload')
              return $param;

         return $data;
     }


}
