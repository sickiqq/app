<?php

use Illuminate\Database\Seeder;
use App\Clan;

class ClansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clan::create(['name' => 'Amigos de Iquique', 'description' => 'Grupo de amigos de iquique sector sur']);
        Clan::create(['name' => 'Amigos de Hospicio', 'description' => 'Grupo de amigos de Alto hospicio']);
        Clan::create(['name' => 'Cavancha+', 'description' => 'amigos de la vida']);
    }
}
