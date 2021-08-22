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

    public function users(){
        return $this->hasMany('App\Models\User\User');
    }

    public function permisos(){
        return $this->hasMany('App\Models\Security\Permiso');
    }

    public function datos_roles(){
        return DB::table('rols')->select('id','name')->orderBy('id')
        ->where('activo','ALLOW')->pluck('name', 'id')->toArray();        
    }
}
