<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
