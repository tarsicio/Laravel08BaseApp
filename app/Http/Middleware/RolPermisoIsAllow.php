<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
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
     *  Realizado por @author Tarsicio Carrizales Agosto 2021
     * Correo: telecom.com.ve@gmail.com
     */
    public function handle(Request $request, Closure $next, $modulo = null, $accion = null)
    {
        $allow = (new Permiso)->userAccess($modulo,$accion,$request->user()->rols_id);        
        if (!is_null($request->user()->rols_id) && $allow == 'ALLOW') {            
            return $next($request);    
        }        
        alert()->warning(trans('message.mensajes_alert.denegado'),trans('message.mensajes_alert.mensaje'));
        return redirect('/dashboard');
    }
}
