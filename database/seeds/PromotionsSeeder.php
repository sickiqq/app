<?php

use Illuminate\Database\Seeder;
use App\Promotion;

class PromotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promotion::create(['branch_office_id' => 1, 'name' => 'Promoción 1 - Caja Hell', 'description' => 'Consta en papas fritas y un shop', 'price' => 5000]);
        Promotion::create(['branch_office_id' => 2, 'name' => 'Promo de shops', 'description' => 'Consta en 2 shops', 'price' => 4500]);
    }
}
