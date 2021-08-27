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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $count_notification = (new User)->count_noficaciones_user();
        $rols_id = Auth::user()->rols_id;
        $permisos = (new Permiso)->datos_Permiso($rols_id);
        $roles = (new Rol)->datos_roles();
        if(empty($permisos) || empty($roles)){
            $permisos = empty($permisos);
            $roles = empty($roles);
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$rols_id)
    {        
        $count_notification = (new User)->count_noficaciones_user();
        $user_rols_id = Auth::user()->rols_id;
        $permisos = (new Permiso)->datos_Permiso($user_rols_id);
        $roles = (new Rol)->datos_roles();
        if(empty($permisos) || empty($roles)){
            $permisos = empty($permisos);
            $roles = empty($roles);
        }
        $nombre_rol = (new Rol)->get_nombre_rol($user_rols_id);        
        if($nombre_rol == 'ROOT'){
            $nombre_rol = 'ROOT';
        }     
        return view('Permiso.permisos',compact('count_notification','permisos','roles','nombre_rol'));
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
     *
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
