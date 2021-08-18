<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
        $this->call(ModelosSeeder::class);
        $this->call(RolsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PermisosSeeder::class);
    }
}
