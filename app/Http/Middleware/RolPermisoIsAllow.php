<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolPermisoIsAllow
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->rols_id == 1) {
            return $next($request);    
        }
        alert()->warning('Acceso Denegado','Consulte a su Administrador');
        return redirect('/dashboard');
    }
}
