<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
namespace App\Models\Security;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permiso extends Model
{
    use HasFactory;

    protected $fillable = [        
        'modelos_id',
        'rols_id',
        'delete',
        'edit',
        'add',
        'view',     
    ];

    public function rol(){
        return $this->belongsTo('App\Models\Security\Rol');
    }

    public function modelo(){
        return $this->belongsTo('App\Models\Security\modelo');
    }

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
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

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
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

    public function datos_Permiso($user_rols_id){
        try {
            $permisos = DB::table('permisos')
                    ->join('modelos','modelos.id', '=', 'permisos.modelos_id')
                    ->select('permisos.id',
                        'modelos.name',
                        'permisos.delete',
                        'permisos.update',
                        'permisos.edit',
                        'permisos.delete',
                        'permisos.add',
                        'permisos.view',
                        'permisos.print',
                        'permisos.download',
                        'permisos.upload')                                
                    ->where('permisos.rols_id',$user_rols_id)                    
                    ->where('modelos.activo','ALLOW')->get();                                         
        }catch(Throwable $e){
            $permisos = [];
            return $permisos;
        }
        
        return $permisos;
    }
}
