<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\User;
use App\Http\Requests\User\StoreUser;
use App\Http\Requests\User\UpdateUser;
use App\Models\Security\Rol;
use Auth;
use Dompdf\Dompdf;
use App\Notifications\WelcomeUser;
use App\Notifications\RegisterConfirm;
use App\Notifications\NotificarEventos;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @author Tarsicio Carrizales telecom.com.ve@gmail.com
     * @return \Illuminate\Http\Response
     */
    public function index(){        
        $count_notification = (new User)->count_noficaciones_user();
        $tipo_alert = "";
        if(session('delete') == true){
            $tipo_alert = "Delete";
            session(['delete' => false]);
        }        
        if(session('update') == true ){
            $tipo_alert = "Update";
            session(['update' => false]);
        }
        return view('User.users',compact('count_notification','tipo_alert'));
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
                    if(($user->id != 1 && $data->id == 1)|| $data->confirmed_at == null){
                        $edit ='<a href="'.route('users.edit', $data->id).'" id="edit_'.$data->id.'" class="btn btn-xs btn-warning disabled" style="color:black;"><b><i class="fa fa-pencil"></i>&nbsp;' .trans('message.botones.edit').'</b></a>';
                    }else{
                        $edit ='<a href="'.route('users.edit', $data->id).'" id="edit_'.$data->id.'" class="btn btn-xs btn-warning" style="color:black;"><b><i class="fa fa-pencil"></i>&nbsp;' .trans('message.botones.edit').'</b></a>';
                    }
                    return $edit;
                })
                ->addColumn('view', function ($data) {
                    return '<a href="'.route('users.view', $data->id).'" id="view_'.$data->id.'" class="btn btn-xs btn-primary" style="color:black;"><b><i class="fa fa-eye"></i>&nbsp;' .trans('message.botones.view').'</b></a>';
                })
                ->addColumn('del', function ($data) {
                    if($data->id == 1){
                        $del ='<a href="javascript:void(0)" action=""><button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-title="Eliminar" data-container="body" style="color:black;" disabled><b><i class="fa fa-trash"></i>&nbsp;' .trans('message.botones.delete').'</b>';
                    }else{
                        $del ='<a href="javascript:void(0)" action="'.route('users.destroy', $data->id).'" onclick="deleteData(this)"><button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-title="Eliminar" data-container="body" style="color:black;"><b><i class="fa fa-trash"></i>&nbsp;' .trans('message.botones.delete').'</b>';
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
        //generate some PDFs!
        $html = '<div style="text-align:center"><h1>(PROYECT / PROYECTO) HORUS VENEZUELA</h1></div>
        <div style="text-align:center">(Create By / Creado Por) - Tarsicio Carrizales</div>
        <div style="text-align:center">(Mail / Correo) -  telecom.com.ve@gmail.com</div>
        <div style="text-align:center">(Contact Cell Phone / Número Movil Contacto) - +58+412-054.53.69</div>
        <div style="text-align:center">LARAVEL 8 and PWA, PHP 7.3 DATE: OCT / 2021</div>';
        $dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
        $dompdf->loadHtml($html);
        $dompdf->setPaper('latter', 'portrait');
        $dompdf->render();
        $dompdf->stream("users.pdf", array("Attachment"=>1));        
        return redirect()->back();
    }    

    public function update_avatar(Request $request, $id){
        $count_notification = (new User)->count_noficaciones_user();
        $user = Auth::user();
        $user_Update = User::find($id);
        $avatar_viejo = $user_Update->avatar; 
        $this->update_image($request,$avatar_viejo,$user_Update);
        $user_Update->updated_at = \Carbon\Carbon::now();
        $user_Update->save();
        session(['update' => true]);        
        return redirect('/users');
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
        $titulo_modulo = trans('message.users_action.new_user');
        $count_notification = (new User)->count_noficaciones_user();
        $roles = (new Rol)->datos_roles();        
        return view('User.user_create',compact('count_notification','titulo_modulo','roles'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request){
        /**
         * Verificamos que el servidor este conectado a internet
         * para que pueda enviar los correo y notificaciones de 
         * bienvenida, y no nos de error. si no tiene conexión a Internet
         * no se se podrá guarda el nuevo usuario
         */        
        // Target URL
        try{
            $count_notification = (new User)->count_noficaciones_user();            
            $Host="8.8.8.8";
            $ping = exec("ping -c 4 " . $Host, $output, $result);
            //dd($result);
        }catch(Exception $e){            
            return view('User.users',compact('count_notification'));
        }
        $avatar = '';
        $filename = '';        
        if($result == 0){
            if(!$request->hasFile('avatar')){        
                $avatar = 'default.jpg';
            }else{            
                $avatar = $request->file('avatar');            
                $filename = time() . '.' . $avatar->getClientOriginalExtension();            
                \Image::make($avatar)->resize(300, 300)
                ->save( public_path('/storage/avatars/' . $filename ) );            
                $avatar = $filename;
            }
            $user = new User([
                            'avatar' => $avatar,
                            'name' => $request->name,
                            'email' => $request->email,                        
                            'password' => \Hash::make($request->password),
                            'activo' => $request->activo,
                            'rols_id' => $request->rols_id,
                            'init_day' => $request->init_day,
                            'end_day' => $request->end_day,
                            'confirmation_code' => \Str::random(25),
                            'remember_token' => \Str::random(100),
                            'created_at' => \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now(),
                            ]);
            $user->save();            
            $notificacion = [
                'title' => trans('message.msg_notification.title'),
                'body' => trans('message.msg_notification.body')
            ]; 
            $user->notify(new NotificarEventos($notificacion));
            $when = \Carbon\Carbon::now()->addMinutes(1);
            $user->notify((new WelcomeUser)->delay($when));
            $user->notify((new RegisterConfirm)->delay($when));
            $tipo_alert = "Create";            
        }else{
            $tipo_alert = "SIN_INTERNET";
        }        
        return view('User.users',compact('count_notification','tipo_alert'));
    }        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id){
        $user_View =  (new User)->ver_User($id);        
        if($user_View[0]->ID != 1){
            $init_day = Carbon::parse($user_View[0]->FECHA_INICIO)->format('Y-m-d');
            $end_day = Carbon::parse($user_View[0]->FECHA_FIN)->format('Y-m-d');
            $user_View[0]->FECHA_INICIO = $init_day;
            $user_View[0]->FECHA_FIN = $end_day;
        }        
        $count_notification = (new User)->count_noficaciones_user();
        $titulo_modulo = trans('message.users_action.show_user');
        return view('User.show',compact('count_notification','titulo_modulo','user_View'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user_edit = User::find($id);        
        if($user_edit->id != 1){
            $init_day = Carbon::parse($user_edit->init_day)->format('Y-m-d');
            $end_day = Carbon::parse($user_edit->end_day)->format('Y-m-d');
            $user_edit->init_day = $init_day;
            $user_edit->end_day = $end_day;        
        }        
        $titulo_modulo = trans('message.users_action.edit_user');
        $count_notification = (new User)->count_noficaciones_user();
        $roles = (new Rol)->datos_roles();        
        return view('User.user_edit',compact('count_notification','titulo_modulo','roles','user_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id){        
        $count_notification = (new User)->count_noficaciones_user();
        $user = Auth::user();        
        $user_Update = User::find( $id);
        $avatar_viejo = $user_Update->avatar;        
        if($id == 1){            
            $user_Update->password = \Hash::make($request->password);
            $this->update_image($request,$avatar_viejo,$user_Update);
            $user_Update->updated_at = \Carbon\Carbon::now();
            $user_Update->save();
        }else{
            $user_Update->name = $request->name;
            $user_Update->password = \Hash::make($request->password);
            $user_Update->activo = $request->activo;
            $user_Update->rols_id = $request->rols_id;
            $user_Update->init_day = $request->init_day;
            $user_Update->end_day = $request->end_day;
            $this->update_image($request,$avatar_viejo,$user_Update);
            $user_Update->updated_at = \Carbon\Carbon::now();
            $user_Update->save();
        }
        session(['update' => true]);            
        return redirect('/users');
    }

    private function update_image($request,$avatar_viejo,&$user_Update){
        /** Se actualizan todos los datos solicitados por el Cliente 
        *  y eliminamos del Storage/avatars, el archivo indicado.
        */
        if($request->hasFile('avatar')){
            $esta = file_exists(public_path('/storage/avatars/'.$avatar_viejo));            
            if($avatar_viejo != 'default.jpg' && $esta){                
                unlink(public_path('/storage/avatars/'.$avatar_viejo));               
            }  
            $avatar = $request->file('avatar');          
            $filename = time() . '.' . $avatar->getClientOriginalExtension();            
            \Image::make($avatar)->resize(300, 300)
            ->save( public_path('/storage/avatars/' . $filename ) );            
            $user_Update->avatar = $filename;                
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id){        
        $user_delete = User::find($id);
        $nombre = $user_delete->name;
        User::destroy($id);
        $esta = file_exists(public_path('/storage/avatars/'.$user_delete->avatar));            
        if($user_delete->avatar != 'default.jpg' && $esta){                            
            unlink(public_path('/storage/avatars/'.$user_delete->avatar));
        }  
        session(['delete' => true]);
        return redirect('/users');
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
