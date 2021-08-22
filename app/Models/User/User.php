<?php

namespace App\Models\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rols_id',
        'name',        
        'foto',
        'email',
        'password',
        'activo',
        'init_day',
        'end_day',
        'confirmation_code',
        'confirmed_at',  
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rol(){
        return $this->belongsTo('App\Models\Security\Rol');
    }

    public function count_noficaciones_user(){
        $user_id = auth()->user()->id;        
        $sql_count_notifications = DB::table('notifications')->where('notifiable_id', $user_id)->count();        
        return $sql_count_notifications;
    }

    public function getUsersList_DataTable(){        
        return DB::table('users')->select('id','name','avatar','email','activo','confirmed_at')->get();
    }

    public function userAccess($modelo,$status,$user_rols_id){
        $permiso = 'DENY';        
        switch ($status) {
            case 'view':
                $id_model = DB::table('modelos')
                                ->select('id')
                                ->where('name',$modelo)
                                ->where('activo','ALLOW')->get(); 
                                $model_id = 0;
                                foreach($id_model as $id){
                                    $model_id = $id->id;
                                }                                
                $tabla = DB::table('permisos')
                                ->select('view')
                                ->where('modelos_id',$model_id)
                                ->where('rols_id',$user_rols_id)->get();
                                foreach($tabla as $name){
                                    $permiso = $name->view;
                                }                                
                break;
            case 'add':
                $id_model = DB::table('modelos')
                                ->select('id')
                                ->where('name',$modelo)
                                ->where('activo','ALLOW')->get();
                                $model_id = 0;
                                foreach($id_model as $id){
                                    $model_id = $id->id;
                                } 
                $tabla = DB::table('permisos')
                                ->select('add')
                                ->where('modelos_id',$model_id)
                                ->where('rols_id',$user_rols_id)->get();
                                foreach($tabla as $name){
                                    $permiso = $name->add;
                                }
                break;
            case 'edit':
                $id_model = DB::table('modelos')
                                ->select('id')
                                ->where('name',$modelo)
                                ->where('activo','ALLOW')->get();
                                $model_id = 0;
                                foreach($id_model as $id){
                                    $model_id = $id->id;
                                }
                $tabla = DB::table('permisos')
                                ->select('edit')
                                ->where('modelos_id',$model_id)
                                ->where('rols_id',$user_rols_id)->get();
                                foreach($tabla as $name){
                                    $permiso = $name->edit;
                                }
                break;
            case 'update':
                $id_model = DB::table('modelos')
                                ->select('id')
                                ->where('name',$modelo)
                                ->where('activo','ALLOW')->get();
                                $model_id = 0;
                                foreach($id_model as $id){
                                    $model_id = $id->id;
                                }
                $tabla = DB::table('permisos')
                                ->select('update')
                                ->where('modelos_id',$model_id)
                                ->where('rols_id',$user_rols_id)->get();
                                foreach($tabla as $name){
                                    $permiso = $name->update;
                                }                                
                break;    
            case 'delete':
                $id_model = DB::table('modelos')
                                ->select('id')
                                ->where('name',$modelo)
                                ->where('activo','ALLOW')->get();
                                $model_id = 0;
                                foreach($id_model as $id){
                                    $model_id = $id->id;
                                }
                $tabla = DB::table('permisos')
                                ->select('delete')
                                ->where('modelos_id',$model_id)
                                ->where('rols_id',$user_rols_id)->get();
                                foreach($tabla as $name){
                                    $permiso = $name->delete;
                                }
                break;
        }        
        return $permiso;
    }
}
