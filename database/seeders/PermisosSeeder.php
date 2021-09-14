<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Los presente permiso corresponden al rol = Root
        \DB::table('permisos')->insert([
            [
                'modulos_id' => 1,                        
                'rols_id'    => 1,
                'delete'     => 'ALLOW',
                'update'     => 'ALLOW',
                'edit'       => 'ALLOW',
                'add'        => 'ALLOW',
                'view'       => 'ALLOW',
                'print'      => 'ALLOW',
                'download'   => 'ALLOW',
                'upload'     => 'ALLOW',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'modulos_id' => 2,                        
                'rols_id'    => 1,
                'delete'     => 'ALLOW',
                'update'     => 'ALLOW',
                'edit'       => 'ALLOW',
                'add'        => 'ALLOW',
                'view'       => 'ALLOW',
                'print'      => 'ALLOW',
                'download'   => 'ALLOW',
                'upload'     => 'ALLOW',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'modulos_id' => 3,                        
                'rols_id'    => 1,
                'delete'     => 'ALLOW',
                'update'     => 'ALLOW',
                'edit'       => 'ALLOW',
                'add'        => 'ALLOW',
                'view'       => 'ALLOW',
                'print'      => 'ALLOW',
                'download'   => 'ALLOW',
                'upload'     => 'ALLOW',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'modulos_id' => 4,                        
                'rols_id'    => 1,
                'delete'     => 'ALLOW',
                'update'     => 'ALLOW',
                'edit'       => 'ALLOW',
                'add'        => 'ALLOW',
                'view'       => 'ALLOW',
                'print'      => 'ALLOW',
                'download'   => 'ALLOW',
                'upload'     => 'ALLOW',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'modulos_id' => 5,                        
                'rols_id'    => 1,
                'delete'     => 'ALLOW',
                'update'     => 'ALLOW',
                'edit'       => 'ALLOW',
                'add'        => 'ALLOW',
                'view'       => 'ALLOW',
                'print'      => 'ALLOW',
                'download'   => 'ALLOW',
                'upload'     => 'ALLOW',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);        
    }
}
