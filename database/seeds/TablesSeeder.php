<?php

use Illuminate\Database\Seeder;
use App\Table;

class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Table::create(['branch_office_id' => 1, 'identifier' => 'Mesa 1']);
        Table::create(['branch_office_id' => 1, 'identifier' => 'Mesa 2']);
        Table::create(['branch_office_id' => 1, 'identifier' => 'Mesa 3']);
        Table::create(['branch_office_id' => 1, 'identifier' => 'Terraza 1']);

        Table::create(['branch_office_id' => 2, 'identifier' => 'Mesa 1']);
        Table::create(['branch_office_id' => 2, 'identifier' => 'Mesa 2']);
        Table::create(['branch_office_id' => 2, 'identifier' => 'Mesa 3']);
        Table::create(['branch_office_id' => 2, 'identifier' => 'Mesa 4']);
        Table::create(['branch_office_id' => 2, 'identifier' => 'Vip 1']);
        Table::create(['branch_office_id' => 2, 'identifier' => 'Vip 2']);
    }
}
