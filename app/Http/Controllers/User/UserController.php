<?php

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
                ->editColumn('confirmed_at', function($data){
                    if($data->confirmed_at == null){
                        return  $data->confirmed_at = 'PENDIENTE';
                    }else{
                        return date('d-m-Y', strtotime($data->confirmed_at));
                    }                
                })                
                ->addColumn('edit', function ($data) {
                    return '<a href="'.route('users.edit', $data->id).'" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i>' .trans('message.botones.edit').'</a>';
                })
                ->addColumn('view', function ($data) {
                    return '<a href="'.route('users.show', $data->id).'" class="btn btn-xs btn-primary"><i class="fa fa-street-view"></i>' .trans('message.botones.view').'</a>';
                })
                ->addColumn('del', function ($data) {
                    return '<a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>' .trans('message.botones.delete').'</a>';
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

    public function update_avatar(Request $request, $id){
        $count_notification = (new User)->count_noficaciones_user();
        $user = Auth::user();
        $user_Update = User::find( $id);        
        // Se actualizan todos los datos solicitados por el Cliente
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');            
            $filename = time() . '.' . $avatar->getClientOriginalExtension();            
            \Image::make($avatar)->resize(300, 300)
            ->save( public_path('/storage/avatars/' . $filename ) );            
            $user_Update->avatar = $filename;
            $user_Update->save();
            alert()->success('Usuario Actualizado','El usuario '.$user->name. ' actualizado correctamente');
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
        return 'CREATE EN CONSTRUCCIÓN .....';
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
        return 'VISTA EN CONSTRUCCIÓN .....';    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        return 'EDITAR EN CONSTRUCCIÓN .....';
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
            alert()->success('Usuario Actualizado','El usuario '.$user->name. ' actualizado correctamente');
        return view('User.users',compact('count_notification','user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        return 'ELIMINAR EN CONSTRUCCIÓN .....';    
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
