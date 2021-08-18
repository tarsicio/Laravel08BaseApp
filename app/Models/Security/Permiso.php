<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
