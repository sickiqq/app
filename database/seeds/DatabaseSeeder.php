<?php

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
        $this->call(CompaniesSeeder::class);
        $this->call(BranchOfficesSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(SubcategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(PromotionsSeeder::class);
        $this->call(PromotionItemsSeeder::class);
        $this->call(TablesSeeder::class);
        $this->call(WaitersSeeder::class);
        $this->call(ClansSeeder::class);
        $this->call(NivelsSeeder::class);
        $this->call(ClientsSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
