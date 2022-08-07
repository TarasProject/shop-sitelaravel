<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserEditPanel
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


        $user = User::find($request->route()->parameter('id'));

        if (Auth::user() && Auth::user()->id==$user['id'] || Auth::user() && Auth::user()->role=='ADMIN'){

            return $next($request);

        }

        \Session::flash('flash_message', json_encode([
            'class' =>  'success',
            'message'=>'Ввійдіть як користувач, щоб змінити свої дані чи видалити свій акаунт'
        ]));

        return redirect('/users');
    }
}
