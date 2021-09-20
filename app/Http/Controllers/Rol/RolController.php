<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
namespace App\Http\Controllers\Rol;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Rol\StoreRol;
use App\Http\Requests\Rol\UpdateRol;
use App\Models\User\User;
use App\Models\Security\Modulo;
use App\Models\Security\Rol;
use App\Models\Security\Permiso;
use Auth;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     * @author Tarsicio Carrizales telecom.com.ve@gmail.com
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $count_notification = (new User)->count_noficaciones_user();
        return view('Rol.rols',compact('count_notification'));
    }

    /**
     * Display a listing of the resource.
     * @author Tarsicio Carrizales telecom.com.ve@gmail.com
     * @return \Illuminate\Http\Response
     */
    public function getRols(Request $request){     
        try{
            if ($request->ajax()) {
                $data =  (new Rol)->getRolsList_DataTable();                
                return datatables()->of($data)
                ->addColumn('edit', function ($data) {
                    $user = Auth::user();                    
                    if($data->name == 'ROOT'){
                        $edit ='<a href="'.route('rols.edit', $data->id).'" id="edit_'.$data->id.'" class="btn btn-xs btn-warning disabled" style="color:black;"><b><i class="fa fa-pencil"></i>&nbsp;' .trans('message.botones.edit').'</b></a>';
                    }else{
                        $edit ='<a href="'.route('rols.edit', $data->id).'" id="edit_'.$data->id.'" class="btn btn-xs btn-warning" style="color:black;"><b><i class="fa fa-pencil"></i>&nbsp;' .trans('message.botones.edit').'</b></a>';
                    }
                    return $edit;
                })
                ->addColumn('view', function ($data) {
                    return '<a href="'.route('rols.show', $data->id).'" id="view_'.$data->id.'" class="btn btn-xs btn-primary" style="color:black;"><b><i class="fa fa-eye"></i>&nbsp;' .trans('message.botones.view').'</b></a>';
                })
                ->addColumn('del', function ($data) {
                    $user = Auth::user();                    
                    if($data->name == 'ROOT'){
                        $del ='<form method="GET" action="'.route('rols.destroy', $data->id).'" accept-charset="UTF-8" id="delete_'.$data->id.'"><button disabled type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-title="Eliminar" data-container="body" style="color:black;" onclick="return confirm(\'¿Está seguro de eliminar el registro ?\')"><b><i class="fa fa-trash"></i>&nbsp;' .trans('message.botones.delete').'</b></form>';
                    }else{
                        $del ='<form method="GET" action="'.route('rols.destroy', $data->id).'" accept-charset="UTF-8" id="delete_'.$data->id.'"><button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-title="Eliminar" data-container="body" style="color:black;" onclick="return confirm(\'¿Está seguro de eliminar el registro ?\')"><b><i class="fa fa-trash"></i>&nbsp;' .trans('message.botones.delete').'</b></form>';
                    }
                    return $del;
                })                
                ->rawColumns(['edit','view','del'])->toJson();        
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
    public function create(){
        $count_notification = (new User)->count_noficaciones_user();
        $titulo_modulo = trans('message.rols_action.new_rols');        
        return view('Rol.rols_create',compact('count_notification','titulo_modulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRol $request){    
        $count_notification = (new User)->count_noficaciones_user();
        $rol = new Rol([                            
                        'name' => strtoupper($request->name),
                        'description' => $request->description,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    ]);
        $rol->save();
        alert()->success(trans('message.mensajes_alert.rol_create'),trans('message.mensajes_alert.msg_rol_01').$rol->name. trans('message.mensajes_alert.msg_03'));
        return view('Rol.rols',compact('count_notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $rol = Rol::find($id);
        $count_notification = (new User)->count_noficaciones_user();
        $titulo_modulo = trans('message.rols_action.show_rols');
        return view('Rol.rols_show',compact('count_notification','titulo_modulo','rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $rol = Rol::find($id);
        $count_notification = (new User)->count_noficaciones_user();
        $titulo_modulo = trans('message.rols_action.edit_rols');
        return view('Rol.rols_edit',compact('count_notification','titulo_modulo','rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRol $request, $id){
        $rol_Update = Rol::find($id);
        $rol_Update->description = $request->description;
        $rol_Update->updated_at = \Carbon\Carbon::now();
        $rol_Update->save();
        alert()->success(trans('message.mensajes_alert.rol_update'),trans('message.mensajes_alert.msg_rol_01').$rol_Update->name. trans('message.mensajes_alert.msg_02'));
        return redirect('/rols');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $rol_Delete = Rol::find($id);        
        $nombre_rol = $rol_Delete->name;        
        $no_Asociado = (new Rol)->buscarTablasAsociados($id);
        //dd($no_Asociado);
        if(!$no_Asociado){
            Rol::destroy($id);
            alert()->success(trans('message.mensajes_alert.rol_delete'),trans('message.mensajes_alert.msg_rol_01').$nombre_rol. trans('message.mensajes_alert.msg_04')); 
        }else{
            alert()->error(trans('message.mensajes_alert.rol_no_delete'),trans('message.mensajes_alert.msg_rol_01').$nombre_rol. trans('message.mensajes_alert.msg_no_delete')); 
        }        
        return redirect('/rols');
    }

    public function rolsPrint(){
        alert()->warning(trans('message.mensajes_alert.invite_cafe'),trans('message.mensajes_alert.mensaje_invite'));
        return redirect()->back();
    }
}
