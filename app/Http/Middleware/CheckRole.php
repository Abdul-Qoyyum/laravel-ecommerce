<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{

    protected $customer_id = 21;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Only grant staffs passage to the admin dashboard
        if ($request->user()->role_id != $this->customer_id){
            return $next($request);
        }
          return redirect('/home');
    }
}
