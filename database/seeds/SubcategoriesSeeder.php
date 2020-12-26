<?php

use Illuminate\Database\Seeder;
use App\Subcategory;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::create(['category_id' => 1, 'name' => 'Cervezas']);
        Subcategory::create(['category_id' => 1, 'name' => 'Shops']);
        Subcategory::create(['category_id' => 1, 'name' => 'Piscolas']);
        Subcategory::create(['category_id' => 1, 'name' => 'Roncolas']);
        Subcategory::create(['category_id' => 1, 'name' => 'Mojitos']);
        Subcategory::create(['category_id' => 1, 'name' => 'Botellas']);

        Subcategory::create(['category_id' => 2, 'name' => 'Hamburguesas']);
        Subcategory::create(['category_id' => 2, 'name' => 'Tablas para compartir']);
        Subcategory::create(['category_id' => 2, 'name' => 'Menus']);
        Subcategory::create(['category_id' => 2, 'name' => 'Picoteo']);
    }
}
