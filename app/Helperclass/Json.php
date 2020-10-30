<?php 

namespace App\Helperclass;

use App\Res;

class Json {

    public static function save($formId, $data){
         $data = json_encode($data);
         Res::create(['form_id' => $formId, 'data' => $data]);
    }

    public static function load($formId){
         $all = Res::where('form_id', $formId)->get();
         $data = [];

     //     foreach ($all as $r){
     //          $d =  json_decode($r, true);
     //          $r =  json_decode($d['data'], true);
     //          $d['data'] = $r;

     //          $data[] = $d;
     //     }

         return $all;
    }

    public static function loadWhere($formId,$id){
        $res = Res::where('form_id', $formId)->where('id', $id)->first();

        return $res ?? false;
    }

    public static function getCount($formId){
        return Res::where('form_id', $formId)->count();
    }
}