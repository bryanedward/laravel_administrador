<?php

namespace App\Http\Middleware;

use Closure;

class RolesUsuarios
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        //obtener todos los parametros recibidos verificacion
        //con middleware 
        $rol = func_get_args();
        $rol = array_splice($rol, 2);
        
        // if(auth()->user()->verificarRol($rol)){
        //     return $next($request);
        // }
        foreach($rol as $itemMiddleware){
            foreach(auth()->user()->roles as $itemRol){
                if( $itemRol->rol_user === $itemMiddleware)
                    return $next($request);    
            }
        }
        return redirect('/home');         
    }
}
