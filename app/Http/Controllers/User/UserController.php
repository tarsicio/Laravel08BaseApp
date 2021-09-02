<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\User;
use Auth;
use Dompdf\Dompdf;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @author Tarsicio Carrizales telecom.com.ve@gmail.com
     * @return \Illuminate\Http\Response
     */
    public function index(){        
        $count_notification = (new User)->count_noficaciones_user();        
        return view('User.users',compact('count_notification'));
    }

    public function getUsers(Request $request){
        try{
            if ($request->ajax()) {
                $data =  (new User)->getUsersList_DataTable();                
                return datatables()->of($data)
                ->editColumn('activo', function($data){
                    if($data->activo == 'DENY'){
                        $data->activo = trans('message.permisos_rol.deny');
                        return $data->activo;
                    }else{
                        $data->activo = trans('message.permisos_rol.allow');
                        return $data->activo;
                    }                
                })
                ->editColumn('confirmed_at', function($data){
                    if($data->confirmed_at == null){
                        return  $data->confirmed_at = trans('message.permisos_rol.confirmado');
                    }else{
                        return date('d-m-Y', strtotime($data->confirmed_at));
                    }                
                })                
                ->addColumn('edit', function ($data) {
                    $user = Auth::user();                    
                    if($user->id != 1 && $data->id == 1){
                        $edit ='<a href="'.route('users.edit', $data->id).'" id="edit_'.$data->id.'" class="btn btn-xs btn-warning disabled" style="color:black;"><b><i class="fa fa-pencil"></i>&nbsp;' .trans('message.botones.edit').'</b></a>';
                    }else{
                        $edit ='<a href="'.route('users.edit', $data->id).'" id="edit_'.$data->id.'" class="btn btn-xs btn-warning" style="color:black;"><b><i class="fa fa-pencil"></i>&nbsp;' .trans('message.botones.edit').'</b></a>';
                    }
                    return $edit;
                })
                ->addColumn('view', function ($data) {
                    return '<a href="'.route('users.show', $data->id).'" id="view_'.$data->id.'" class="btn btn-xs btn-primary" style="color:black;"><b><i class="fa fa-eye"></i>&nbsp;' .trans('message.botones.view').'</b></a>';
                })
                ->addColumn('del', function ($data) {
                    if($data->id == 1){
                        $del = '<a href="'.route('users.destroy', $data->id).'" id="delete_'.$data->id.'" class="btn btn-xs btn-danger disabled" style="color:black;"><b><i class="fa fa-trash"></i>&nbsp;' .trans('message.botones.delete').'</b></a>';
                    }else{
                        $del ='<a href="'.route('users.destroy', $data->id).'" id="delete_'.$data->id.'" class="btn btn-xs btn-danger"style="color:black;"><b><i class="fa fa-trash"></i>&nbsp;' .trans('message.botones.delete').'</b></a>';
                    }
                    return $del;
                })                
                ->rawColumns(['edit','view','del'])->toJson();  
            }
        }catch(Throwable $e){
            echo "Captured Throwable: " . $e->getMessage(), "\n";
        }        
    }

    public function profile(){
        $count_notification = (new User)->count_noficaciones_user();
        $user = Auth::user();        
        return view('User.profile',compact('count_notification','user'));
    }
    
    public function usersPrint(){
        alert()->warning(trans('message.mensajes_alert.invite_cafe'),trans('message.mensajes_alert.mensaje_invite'));
        return redirect()->back();
    }    

    public function update_avatar(Request $request, $id){
        $count_notification = (new User)->count_noficaciones_user();
        $user = Auth::user();
        $user_Update = User::find($id);        
        // Se actualizan todos los datos solicitados por el Cliente
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');            
            $filename = time() . '.' . $avatar->getClientOriginalExtension();            
            \Image::make($avatar)->resize(300, 300)
            ->save( public_path('/storage/avatars/' . $filename ) );            
            $user_Update->avatar = $filename;
            $user_Update->save();
            alert()->success(trans('message.mensajes_alert.user_update'),trans('message.mensajes_alert.msg_01').$user->name. trans('message.mensajes_alert.msg_02'));
        }        
        return redirect('/dashboard');
    }

    public function print(){
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml('hello world');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
        return true;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        alert()->warning(trans('message.mensajes_alert.invite_cafe'),trans('message.mensajes_alert.mensaje_invite'));
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        alert()->warning(trans('message.mensajes_alert.invite_cafe'),trans('message.mensajes_alert.mensaje_invite'));
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
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
    public function update(Request $request, $id){
        $count_notification = (new User)->count_noficaciones_user();
        $user = Auth::user();
        $user_Update = User::find( $id);        
            alert()->success(trans('message.mensajes_alert.user_update'),trans('message.mensajes_alert.msg_01').$user->name. trans('message.mensajes_alert.msg_02'));
        return view('User.users',compact('count_notification','user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id){
        alert()->warning(trans('message.mensajes_alert.invite_cafe'),trans('message.mensajes_alert.mensaje_invite'));
        return redirect()->back();
    }

    public function usuarioRol(Request $request){
      if($request->ajax()){
        $countUserRol = (new User)->count_User_Rol();        
        return response()->json($countUserRol);
      }
    }

    public function notificationsUser(Request $request){
      if($request->ajax()){
        $countNotificationsUsers = (new User)->count_User_notifications();        
        return response()->json($countNotificationsUsers);
      }
    }

} // Fin de la clase UserController.
