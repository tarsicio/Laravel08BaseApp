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
                $permiso = $this->permisoReturn($status,$user_rols_id,$modelo,$permiso);
                break;
            case 'add':
                $permiso = $this->permisoReturn($status,$user_rols_id,$modelo,$permiso);
                break;
            case 'edit':
                $permiso = $this->permisoReturn($status,$user_rols_id,$modelo,$permiso);
                break;
            case 'update':
                $permiso = $this->permisoReturn($status,$user_rols_id,$modelo,$permiso);
                break;    
            case 'delete':
                $permiso = $this->permisoReturn($status,$user_rols_id,$modelo,$permiso);
                break;
                case 'print':
                $permiso = $this->permisoReturn($status,$user_rols_id,$modelo,$permiso);
                break;
            case 'download':
                $permiso = $this->permisoReturn($status,$user_rols_id,$modelo,$permiso);
                break;    
            case 'upload':
                $permiso = $this->permisoReturn($status,$user_rols_id,$modelo,$permiso);
                break;
        }        
        return $permiso;
    }

    public function permisoReturn($status,$user_rols_id,$modelo,$permiso){                
        try {
            $permisos = DB::table('permisos')
                    ->join('modelos', 'modelos.id', '=', 'permisos.modelos_id')
                    ->select('permisos.'.$status)                                
                    ->where('permisos.rols_id',$user_rols_id)
                    ->where('modelos.name',$modelo)
                    ->where('modelos.activo','ALLOW')->get();                     
                    if(!$permisos->isEmpty()){
                        foreach($permisos as $permiso_02){
                            switch ($status) {
                                case 'view':            
                                    $permiso = $permiso_02->view;
                                    break;
                                case 'add':
                                    $permiso = $permiso_02->add;
                                    break;
                                case 'edit':
                                    $permiso = $permiso_02->edit;
                                    break;
                                case 'update':
                                    $permiso = $permiso_02->update;
                                    break;    
                                case 'delete':
                                    $permiso = $permiso_02->delete;
                                    break;
                                    case 'print':
                                    $permiso = $permiso_02->print;
                                    break;
                                case 'download':
                                    $permiso = $permiso_02->download;
                                    break;    
                                case 'upload':
                                    $permiso = $permiso_02->upload;
                                    break;
                                }                            
                        }
                    }                    
        } catch (Throwable $e){
            //echo "Captured Throwable: " . $e->getMessage(), "\n";
            return $permiso;
        }        
        return $permiso;
    }
}
