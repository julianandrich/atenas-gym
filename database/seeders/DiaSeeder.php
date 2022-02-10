<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dia;

class DiaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $lunes = new Dia();
    $lunes->dia = "Lunes";
    $lunes->save();

    $martes = new Dia();
    $martes->dia = "Martes";
    $martes->save();

    $miercoles = new Dia();
    $miercoles->dia = "Miércoles";
    $miercoles->save();

    $jueves = new Dia();
    $jueves->dia = "Jueves";
    $jueves->save();

    $viernes = new Dia();
    $viernes->dia = "Viernes";
    $viernes->save();
  }
}
