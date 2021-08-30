<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
namespace App\Models\Security;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rol extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'activo',        
    ];

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function users(){
        return $this->hasMany('App\Models\User\User');
    }

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function permisos(){
        return $this->hasMany('App\Models\Security\Permiso');
    }

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function datos_roles(){
        return DB::table('rols')->select('id','name')->orderBy('id')
        ->where('activo','ALLOW')->pluck('name', 'id')->toArray();        
    }

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function get_nombre_rol($user_rols_id){
        try{
            $nombre = "";
            $nombres = DB::table('rols')->select('name')
                    ->where('activo','ALLOW')
                    ->where('id',$user_rols_id)->get();
                    if(!$nombres->isEmpty()){
                        foreach($nombres as $nombre_01){
                            $nombre = $nombre_01->name;
                        }
                    }
        }catch(Throwable $e){
            return $nombre;
        }
        return $nombre;
    }

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function getRolsList_DataTable(){        
        return DB::table('rols')->select('id','name','activo')->get();
    }    
} // END CLASS
