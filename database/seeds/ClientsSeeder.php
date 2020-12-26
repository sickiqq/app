<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create(['level_id' => 1, 'name' => 'Pablo Hernandez', 'nickname' => 'Shaz01', 'show' => 1, 'experience' => 10000]);
    }
}
