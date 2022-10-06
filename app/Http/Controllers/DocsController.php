<?php

namespace App\Http\Controllers;

use App\UserForm;
use App\Link;
use App\Helperclass\Json;
use Illuminate\Http\Request;

class DocsController extends Controller
{

    public function index(){
        $forms = UserForm::where('user_id', current_user()->id)->get();
        return view('user/home', compact('forms'));
    }

    public function choose($model){
        $id = preg_replace('/[^0-9]/','',$model);

        if ($id == null) return redirect()->route('user.home');
        else {
            $t = UserForm::findOrFail($id)->user->is(current_user());
            if (!$t){return response('Forbidden' , 403);}
        }

        session()->forget('form_id');
        session()->put('form_id', $id);
        
        return redirect()->route('admin.docs');
    }

    public function create(){

        $form = UserForm::create(['user_id' => current_user()->id]);
        $link = Link::create(['form_id' => $form->id, 'link' => substr(md5(\uniqid()), 0, 25)]);

        session()->forget('form_id');
        session()->put('form_id', $form->id);

        call_user_func([DocumentController::class, 'createHeader']);
        
        return redirect()->route('admin.docs');
    }

    public function show(){
        $id = session()->get("form_id");
       

        $link = Link::where('form_id', $id)->first();

 
        $responseCount = Json::getCount($id);

        // dd($responses);

        return view('admin.docs', [
            'link' => $link->getFormAddress(),
            'active' => $link->active,
            'resCount' => $responseCount
        ]);
    }

    public function delete(UserForm $userform){
        if ($userform->user->is(\current_user())){
            $userform->delete();
            return back()->with('message', 'Form has been deleted successfully');
        }
        else {
            return response('Forbidden', 403);
        }
    }

    public function active(){
        $form_id = session()->get('form_id');
        Link::where('form_id', $form_id)->update(['active' => 1]);

        return response('ok', 200);
    }

    public function disable(){
        $form_id = session()->get('form_id');
        Link::where('form_id', $form_id)->update(['active' => 0]);
        
        return response('ok',200);
    }
}
