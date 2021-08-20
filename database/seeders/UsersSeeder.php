<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('users')->insert([
            [
                'rols_id'           => 1,
                'name'              => 'Tarsicio Carrizales',                
                'avatar'            => 'default.jpg',
                'email'             => 'telecom.com.ve@gmail.com',
                'email_verified_at' => null,
                'password'          => \Hash::make('123456'), // Password de entrada -> 123456
                'activo'            => 'ALLOW', 
                'init_day'          => null, // Fecha inicio para controlar desde cuando puede entrar al sistema
                'end_day'           => null, // Fecha fin para indicar hasta cuando puede entrar al sistema
                'remember_token'    => \Str::random(100),
                'confirmation_code' => null,
                'confirmed_at'      => \Carbon\Carbon::now(),
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now(),                
            ],
            [
                'rols_id'           => 2,
                'name'              => 'Carlos Gonzalez',                
                'avatar'            => 'default.jpg',
                'email'             => 'user@user.com',
                'email_verified_at' => null,
                'password'          => \Hash::make('123456'), 
                'activo'            => 'ALLOW',
                'init_day'          => \Carbon\Carbon::now(),
                'end_day'           => \Carbon\Carbon::now()->addMonth(6),
                'remember_token'    => \Str::random(100),
                'confirmation_code' => null,
                'confirmed_at'      => \Carbon\Carbon::now(),
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now(),                
            ],
            [
                'rols_id'           => 8,
                'name'              => 'José Pérez',                
                'avatar'            => 'default.jpg',
                'email'             => 'user_2@user.com',
                'email_verified_at' => null,
                'password'          => \Hash::make('123456'),
                'activo'            => 'ALLOW',
                'init_day'          => \Carbon\Carbon::now(),
                'end_day'           => \Carbon\Carbon::now()->addMonth(6),
                'remember_token'    => \Str::random(100),
                'confirmation_code' => null,
                'confirmed_at'      => \Carbon\Carbon::now(),
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now(),                
            ],
        ]);
    }
}
