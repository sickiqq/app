<?php

use Illuminate\Database\Seeder;
use App\BranchOffice;

class BranchOfficesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BranchOffice::create(['company_id' => 1, 'name' => 'Hell Baquedano', 'country' => 'Chile', 'city' => 'Iquique', 'address' => 'Baquedano', 'number' => 3755]);
        BranchOffice::create(['company_id' => 2, 'name' => 'Bulldog', 'country' => 'Chile', 'city' => 'Iquique', 'address' => 'Peninsula', 'number' => 162]);
    }
}
