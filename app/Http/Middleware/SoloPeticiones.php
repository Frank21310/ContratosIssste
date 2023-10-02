<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloPeticiones
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        switch(auth::user()->rol_id){
            case ('1'):
                return redirect('SoloAdministrador');//Administrador
            break;
            case ('2'):
                return $next($request);
            break;
            case ('3'):
                return redirect('home');//X
            break;
        }       
         
    }
}