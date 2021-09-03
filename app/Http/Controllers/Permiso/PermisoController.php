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
use App\Models\Security\CreateRecordPermiso AS InsertRecord;

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
        $roles = (new Rol)->datos_roles();        
        $nombre_rol = (new Rol)->get_nombre_rol($rols_id);        
        return view('Permiso.permisos',compact('count_notification','roles','nombre_rol','rols_id'));
    }

    /**
     * Display a listing of the resource.
     * @author Tarsicio Carrizales telecom.com.ve@gmail.com
     * @return \Illuminate\Http\Response
     */
    public function getModulos(Request $request){        
        try{
            if ($request->ajax()) {
                $data =  (new Modulo)->getModulosList_DataTable();                
                return datatables()->of($data)
                ->addColumn('edit', function ($data) {
                    $rols_id = Auth::user()->rols_id;
                    if($rols_id != 1){
                        $edit ='<a href="" id="edit_'.$data->id.'" class=" editar_permiso btn btn-xs btn-warning disabled" style="color:black;" data-toggle="modal" data-backdrop="static" data-target="#edit_permisos" onclick="update_permisos('.$data->id.')"><b><i class="fa fa-pencil"></i>&nbsp;' .trans('message.botones.edit').'</b></a>';
                    }else{
                        $edit ='<a href="" id="edit_'.$data->id.'" class=" editar_permiso btn btn-xs btn-warning" style="color:black;" data-toggle="modal" data-backdrop="static" data-target="#edit_permisos"cupdate_permisosupdate_permisos onclick="update_permisos('.$data->id.')"><b><i class="fa fa-pencil"></i>&nbsp;' .trans('message.botones.edit').'</b></a>';
                    }
                    return $edit;
                })
                ->addColumn('view', function ($data) {
                    return '<a href="" id="view_'.$data->id.'" class="ver_permiso btn btn-xs btn-primary" style="color:black;" data-toggle="modal" data-backdrop="static" data-target="#view_permisos" onclick="mostrar_permisos('.$data->id.')"><b><i class="fa fa-eye"></i>&nbsp;' .trans('message.botones.view').'</b></a>';
                })
                ->rawColumns(['edit','view'])->toJson();
            }
        }catch(Throwable $e){
            echo "Captured Throwable: " . $e->getMessage(), "\n";
        }        
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
        $total_registros = $permisos->count();        
        if($total_registros == 0){            
            alert()->info(trans('message.mensajes_alert.creando'),trans('message.mensajes_alert.creando_permisos'));
            /**
             * success
             * error
             * warning
             * info
             * question 
             */
            $modulos = (new Modulo)->datos_modulos();
            foreach($modulos as $modulo){
                $bolean = (new InsertRecord)->generarPermisosModuloRol($modulo->id,$rols_id);
            }
            $permisos = (new Permiso)->datos_Permiso($rols_id);
            alert()->success(trans('message.mensajes_alert.permisos_creado'),trans('message.mensajes_alert.mensaje_permiso_new'));
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

    /**     
     * @author Tarsicio Carrizales telecom.com.ve@gmail.com 
     */
    public function getPermisos(Request $request, $modulo_id,$rol_id)
    {
        if($request->ajax()) {
            $resultado = (new Permiso)->get_Permisos_Rol_Modulos($modulo_id,$rol_id);
            return response()->json($resultado);        
        }
    }

}
