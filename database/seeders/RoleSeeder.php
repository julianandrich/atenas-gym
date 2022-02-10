<?php

namespace Database\Seeders;

use App\Models\Role;


use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $role1 = new Role();
    $role1->nombre_rol = "Alumno";
    $role1->save();

    $role2 = new Role();
    $role2->nombre_rol = "Profesor";
    $role2->save();

    $role3 = new Role();
    $role3->nombre_rol = "Administrador";
    $role3->save();
  }
}
