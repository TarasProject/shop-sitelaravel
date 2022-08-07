<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Support\Facades\Auth;

class UsersPanel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

//        dd($request->route());
        $product = Product::find($request->route()->parameter('id'));
        if (Auth::user() && Auth::user()->id==$product['user_id']|| Auth::user() && Auth::user()->role=='ADMIN'){

            return $next($request);

        }
        \Session::flash('flash_message', json_encode([
            'class' =>  'success',
            'message'=>'Ввійдіть як користувач, щоб редагувати чи видалити оголошення'
        ]));
        return redirect('/products');
    }
}
