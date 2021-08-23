<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Security\Permiso;

class RolPermisoIsAllow
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $modulo = null, $status = null)
    {
        $allow = (new Permiso)->userAccess($modulo,$status,$request->user()->rols_id);        
        if (!is_null($request->user()->rols_id) && $allow == 'ALLOW') {            
            return $next($request);    
        }        
        alert()->warning('Acceso Denegado','Consulte a su Administrador');
        return redirect('/dashboard');
    }
}
