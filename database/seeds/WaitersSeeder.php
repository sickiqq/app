<?php

use Illuminate\Database\Seeder;
use App\Waiter;

class WaitersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Waiter::create(['name' => 'Cristian Guach']);
        Waiter::create(['name' => 'Cristina Rojas']);
        Waiter::create(['name' => 'Esteban Ramirez']);
    }
}
