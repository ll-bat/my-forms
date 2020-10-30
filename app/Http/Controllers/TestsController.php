<?php

namespace App\Http\Controllers;

use App\Res;
use App\UserForm;
use App\Helperclass\Json;
use Illuminate\Http\Request;

class TestsController extends Controller
{
      public function index(){
        $form_id = session()->get('form_id');

        if ($form_id == null){
            return response('Unauthorized', 403);
        }

        $responses = Json::loadWhere(1);

        dd($responses);
      }
}
