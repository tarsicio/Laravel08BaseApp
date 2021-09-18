<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
namespace App\Http\Controllers\Modulo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Modulo\StoreModulo;
use App\Http\Requests\Modulo\UpdateModulo;
use App\Models\User\User;
use App\Models\Security\Modulo;
use App\Models\Security\Rol;
use App\Models\Security\Permiso;
use Auth;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     * @author Tarsicio Carrizales telecom.com.ve@gmail.com
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_notification = (new User)->count_noficaciones_user();        
        return view('Modulo.modulos',compact('count_notification'));
    }

    public function getModulos(Request $request){
        try{
            if ($request->ajax()) {
                $data =  (new Modulo)->getModulosList_DataTable();            
                return datatables()->of($data)
                ->addColumn('edit', function ($data) {                                       
                    if($data->name == 'user' || $data->name == 'notification' || $data->name == 'modulo' || $data->name == 'permiso' || $data->name == 'rol'){
                        $edit ='<a href="'.route('modulos.edit', $data->id).'" id="edit_'.$data->id.'" class="btn btn-xs btn-warning disabled" style="color:black;"><b><i class="fa fa-pencil"></i>&nbsp;' .trans('message.botones.edit').'</b></a>';
                    }else{
                        $edit ='<a href="'.route('modulos.edit', $data->id).'" id="edit_'.$data->id.'" class="btn btn-xs btn-warning" style="color:black;"><b><i class="fa fa-pencil"></i>&nbsp;' .trans('message.botones.edit').'</b></a>';
                    }
                    return $edit;
                })
                ->addColumn('view', function ($data) {
                    return '<a href="'.route('modulos.show', $data->id).'" id="view_'.$data->id.'" class="btn btn-xs btn-primary" style="color:black;"><b><i class="fa fa-eye"></i>&nbsp;' .trans('message.botones.view').'</b></a>';
                })
                ->addColumn('del', function ($data) {                                    
                    if($data->name == 'user' || $data->name == 'notification' || $data->name == 'modulo' || $data->name == 'permiso' || $data->name == 'rol'){
                        $del = '<a href="'.route('modulos.destroy', $data->id).'" id="delete_'.$data->id.'" class="btn btn-xs btn-danger disabled" style="color:black;"><b><i class="fa fa-trash"></i>&nbsp;' .trans('message.botones.delete').'</b></a>';
                    }else{
                        $del ='<a href="'.route('modulos.destroy', $data->id).'" id="delete_'.$data->id.'" class="btn btn-xs btn-danger"style="color:black;"><b><i class="fa fa-trash"></i>&nbsp;' .trans('message.botones.delete').'</b></a>';
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
        $titulo_modulo = trans('message.modulo_action.new_modulo');        
        return view('Modulo.modulo_create',compact('count_notification','titulo_modulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModulo $request){
        $count_notification = (new User)->count_noficaciones_user();
        $modulo = new Modulo([                            
                        'name' => strtolower($request->name),
                        'description' => $request->description,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    ]);
        $modulo->save();
        alert()->success(trans('message.mensajes_alert.modulo_create'),trans('message.mensajes_alert.msg_modulo_01').$modulo->name. trans('message.mensajes_alert.msg_03'));
        return view('Modulo.modulos',compact('count_notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $modulo = Modulo::find($id);
        $count_notification = (new User)->count_noficaciones_user();
        $titulo_modulo = trans('message.modulo_action.show_modulo');
        return view('Modulo.modulo_show',compact('count_notification','titulo_modulo','modulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $modulo = Modulo::find($id);
        $count_notification = (new User)->count_noficaciones_user();
        $titulo_modulo = trans('message.modulo_action.edit_modulo');
        return view('Modulo.modulo_edit',compact('count_notification','titulo_modulo','modulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModulo $request, $id){
        $modulo_Update = Modulo::find($id);
        $modulo_Update->description = $request->description;
        $modulo_Update->updated_at = \Carbon\Carbon::now();
        $modulo_Update->save();
        alert()->success(trans('message.mensajes_alert.modulo_update'),trans('message.mensajes_alert.msg_modulo_01').$modulo_Update->name. trans('message.mensajes_alert.msg_02'));
        return redirect('/modulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $modulo_Delete = Modulo::find($id);        
        $nombre_modulo = $modulo_Delete->name;        
        $no_Asociado = (new Modulo)->buscarTablasAsociados($id);
        //dd($no_Asociado);
        if(!$no_Asociado){
            Modulo::destroy($id);
            alert()->success(trans('message.mensajes_alert.modulo_delete'),trans('message.mensajes_alert.msg_modulo_01').$nombre_modulo. trans('message.mensajes_alert.msg_04')); 
        }else{
            alert()->error(trans('message.mensajes_alert.modulo_no_delete'),trans('message.mensajes_alert.msg_modulo_01').$nombre_modulo. trans('message.mensajes_alert.msg_no_delete')); 
        }        
        return redirect('/modulos');
    }

    public function modulosPrint(){
        alert()->warning(trans('message.mensajes_alert.invite_cafe'),trans('message.mensajes_alert.mensaje_invite'));
        return redirect()->back();
    }
}
