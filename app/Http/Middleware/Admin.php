<?php

namespace App\Http\Middleware;

use Closure;
use App\UserForm;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user())
        {
            $form_id = session()->get('form_id') ?? "";
            
            if ($form_id == "") return response('Forbidden' , 403);

            if (UserForm::findOrFail($form_id)->user->is($request->user())) 
                return $next($request);
        }
        return response('Forbidden' , 403);
    }
}
