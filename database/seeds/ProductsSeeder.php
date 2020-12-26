<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['subcategory_id' => 1, 'branch_office_id' => 1, 'name' => 'Cristal 350ml', 'description' => 'Botellin', 'price' => 1200, 'status' => 1]);
        Product::create(['subcategory_id' => 1, 'branch_office_id' => 1, 'name' => 'Heiniken 350ml', 'description' => 'Botellin', 'price' => 1400, 'status' => 1]);
        Product::create(['subcategory_id' => 2, 'branch_office_id' => 1, 'name' => 'Cristal', 'description' => 'Botellin', 'price' => 3000, 'status' => 1]);
        Product::create(['subcategory_id' => 2, 'branch_office_id' => 1, 'name' => 'Austral Calafate', 'description' => 'Botellin', 'price' => 3500, 'status' => 1]);
        Product::create(['subcategory_id' => 2, 'branch_office_id' => 1, 'name' => 'Heiniken', 'description' => 'Botellin', 'price' => 3300, 'status' => 1]);
        Product::create(['subcategory_id' => 3, 'branch_office_id' => 1, 'name' => 'Mistral 35g', 'description' => 'Vaso medida 400ml', 'price' => 3200, 'status' => 1]);
        Product::create(['subcategory_id' => 3, 'branch_office_id' => 1, 'name' => 'Alto del carmen 35g', 'description' => 'Vaso medida 400ml', 'price' => 3200, 'status' => 1]);

        Product::create(['subcategory_id' => 7, 'branch_office_id' => 1, 'name' => 'Hamburguesa Hawuai', 'description' => 'Hamburguesa con Queso/Palta', 'price' => 4300, 'status' => 1]);
        Product::create(['subcategory_id' => 7, 'branch_office_id' => 1, 'name' => 'Tabla Hell', 'description' => 'Papas fritas con queso cheddar', 'price' => 4500, 'status' => 1]);

        Product::create(['subcategory_id' => 1, 'branch_office_id' => 2, 'name' => 'Cristal 350ml', 'description' => 'Botellin', 'price' => 1000, 'status' => 1]);
        Product::create(['subcategory_id' => 1, 'branch_office_id' => 2, 'name' => 'Heiniken 350ml', 'description' => 'Botellin', 'price' => 1300, 'status' => 1]);
        Product::create(['subcategory_id' => 2, 'branch_office_id' => 2, 'name' => 'Cristal', 'description' => 'Botellin', 'price' => 3200, 'status' => 1]);
        Product::create(['subcategory_id' => 2, 'branch_office_id' => 2, 'name' => 'Austral Calafate', 'description' => 'Botellin', 'price' => 3300, 'status' => 1]);
        Product::create(['subcategory_id' => 2, 'branch_office_id' => 2, 'name' => 'Heiniken', 'description' => 'Botellin', 'price' => 3400, 'status' => 1]);
        Product::create(['subcategory_id' => 3, 'branch_office_id' => 2, 'name' => 'Mistral 35g', 'description' => 'Vaso medida 400ml', 'price' => 3200, 'status' => 1]);
        Product::create(['subcategory_id' => 3, 'branch_office_id' => 2, 'name' => 'Alto del carmen 35g', 'description' => 'Vaso medida 400ml', 'price' => 3200, 'status' => 1]);

        Product::create(['subcategory_id' => 7, 'branch_office_id' => 2, 'name' => 'Consome Bulldog', 'description' => 'Hamburguesa con Queso/Palta', 'price' => 4000, 'status' => 1]);
        Product::create(['subcategory_id' => 7, 'branch_office_id' => 2, 'name' => 'Papas fritas Bulldog Mixtas', 'description' => 'Papas fritas con queso cheddar', 'price' => 4300, 'status' => 1]);
    }
}
