<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      // $user->run = "15637637";
      // $user->dv = 'K';
      $user->name = "administrador";
      $user->email = "administrador@app.cl";
      $user->password = bcrypt('administrador');
      $user->save();
      $user->givePermissionTo(Permission::all());
    }
}
