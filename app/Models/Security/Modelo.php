<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'activo',        
    ];

    public function permisos(){
        return $this->hasMany('App\Models\Security\Permiso');
    }
}
