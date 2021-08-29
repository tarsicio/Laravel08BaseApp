<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
namespace App\Http\Controllers\Permiso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\User;
use App\Models\Security\Modulo;
use App\Models\Security\Rol;
use App\Models\Security\Permiso;
use Auth;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @author Tarsicio Carrizales telecom.com.ve@gmail.com
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $count_notification = (new User)->count_noficaciones_user();
        $rols_id = Auth::user()->rols_id;        
        $permisos = (new Permiso)->datos_Permiso($rols_id);        
        $roles = (new Rol)->datos_roles();
        if(isset($permisos) || isset($roles)){
            //$permisos = empty($permisos);
            //$roles = empty($roles);
        }
        $nombre_rol = (new Rol)->get_nombre_rol($rols_id);        
        return view('Permiso.permisos',compact('count_notification','permisos','roles','nombre_rol','rols_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @author Tarsicio Carrizales telecom.com.ve@gmail.com
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$rols_id)
    {        
        $count_notification = (new User)->count_noficaciones_user();        
        $permisos = (new Permiso)->datos_Permiso($rols_id);
        $roles = (new Rol)->datos_roles();        
        if(isset($permisos)){            
            alert()->info(trans('message.mensajes_alert.creando'),trans('message.mensajes_alert.creando_permisos'));
            /**
             * success
             * error
             * warning
             * info
             * question 
             */
        }        
        $nombre_rol = (new Rol)->get_nombre_rol($rols_id);
        //return redirect()->route('Permiso.permisos', ['$count_notification' => count_notification,'$permisos' => permisos,'$roles' => roles,'$nombre_rol' => nombre_rol,'$rols_id' => rols_id]);
        return view('Permiso.permisos',compact('count_notification','permisos','roles','nombre_rol','rols_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @author Tarsicio Carrizales telecom.com.ve@gmail.com
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $accion,$cambio,$id,$modulos_id,$rols_id)
    {        
        if($request->ajax()) {
            $resultado = (new Permiso)->updatePermiso($accion,$cambio,$id,$modulos_id,$rols_id);            
            return response()->json($resultado);
            //return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json($id);
    }
}
