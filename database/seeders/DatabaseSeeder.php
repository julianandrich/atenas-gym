<?php

namespace Database\Seeders;

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
    $this->call(RoleSeeder::class);
    $this->call(UserSeeder::class);
    $this->call(DiaSeeder::class);
    $this->call(TarifaSeeder::class);
    // $this->call(Alumno_ClaseSeeder::class);
  }
}
