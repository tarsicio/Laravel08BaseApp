<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
namespace App\Http\Controllers\Rol;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
                    if($user->id != 1){
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
                    if($user->id != 1){
                        $del = '<a href="'.route('rols.destroy', $data->id).'" id="delete_'.$data->id.'" class="btn btn-xs btn-danger disabled" style="color:black;"><b><i class="fa fa-trash"></i>&nbsp;' .trans('message.botones.delete').'</b></a>';
                    }else{
                        $del ='<a href="'.route('rols.destroy', $data->id).'" id="delete_'.$data->id.'" class="btn btn-xs btn-danger"style="color:black;"><b><i class="fa fa-trash"></i>&nbsp;' .trans('message.botones.delete').'</b></a>';
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
    public function create()
    {
        alert()->warning(trans('message.mensajes_alert.invite_cafe'),trans('message.mensajes_alert.mensaje_invite'));
        return redirect()->back();
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
    public function show($id)
    {
        alert()->warning(trans('message.mensajes_alert.invite_cafe'),trans('message.mensajes_alert.mensaje_invite'));
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        alert()->warning(trans('message.mensajes_alert.invite_cafe'),trans('message.mensajes_alert.mensaje_invite'));
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        alert()->warning(trans('message.mensajes_alert.invite_cafe'),trans('message.mensajes_alert.mensaje_invite'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        alert()->warning(trans('message.mensajes_alert.invite_cafe'),trans('message.mensajes_alert.mensaje_invite'));
        return redirect()->back();
    }
}
