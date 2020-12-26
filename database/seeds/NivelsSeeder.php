<?php

use Illuminate\Database\Seeder;
use App\Level;

class NivelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create(['name' => 'Nivel 1 - principiante', 'description' => '...']);
        Level::create(['name' => 'Nivel 2 - tomador ocasional', 'description' => '...']);
        Level::create(['name' => 'Nivel 3 - carretero promedio', 'description' => '...']);
        Level::create(['name' => 'Nivel 4 - Te gusta el webeo', 'description' => '...']);
        Level::create(['name' => 'Nivel 5 - Chantate', 'description' => '...']);
    }
}
