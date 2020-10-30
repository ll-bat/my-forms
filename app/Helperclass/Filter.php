<?php 

namespace App\Helperclass;

use App\Docs;
use App\Rels;

class Filter {

    public function __construct(){

    }

    public function getValidationRule(&$validator, $doc){

        $type = $doc->type;
        if ($type == 'upload') $type = 'mimes:jpeg,jpg,png';
        elseif ($type == 'paragraph') $type = 'string';
        elseif ($type == 'checkbox') $type = 'array';
        else $type = 'integer';

        $rule = [$type];
        if ($doc->required) $rule[] = 'required';
        else $rule[] = 'nullable';

        $validator[$doc->name] = $rule;

        if ($doc->type == 'checkbox'){
            $validator[$doc->name.'.*'] = 'integer';
        }
     }

     public function process($questions, $userData){
        $hasData = true;
        $answers = [];

        foreach ($questions as $question) {
            $hasData = $this->filterData($question,$userData, $answers);
            if (!$hasData) return false;
        }

        // $data = [];

        // foreach ($questions as $question){
        //     if (isset($answers[$question->name])){
        //         $question->value = $answers[$question->name];
        //         $data[$question->name] = $question;
        //     }
        // }

        // dd($answers);

        return $answers;
    }

    public function filterData($question, $params, &$answers){
        $data = null;
        $type = $question->type;

        if (!isset($params[$question->name])) {
            if (!$question->required) return true;
            else return false;
        }

        if ($type == 'checkbox'){
            $data = Rels::where('docs_id', $question->id)->whereIn('id',  $params[$question->name])->pluck('value')->toArray();
            if (count($data) == 0) return false;

            $answers[$question->name] = $data;

        }
        elseif ($type == 'radio' || $type == 'dropdown'){
            $data = Rels::where('docs_id', $question->id)->where('id', $params[$question->name])->first();
            if (!$data) return false;

            $answers[$question->name] = $data->value;
        }
        elseif ($type == 'paragraph')
        {
            $answers[$question->name] = $params[$question->name];
        }

        else if($type == 'upload'){

        }

        return true;
    }



}