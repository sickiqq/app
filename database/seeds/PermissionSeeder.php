<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $permission = Permission::create([
          'name' => 'administrador'
      ]);

      $permission = Permission::create([
          'name' => 'cliente'
      ]);
    }
}
