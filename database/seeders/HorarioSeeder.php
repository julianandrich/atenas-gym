<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Horario;
class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $ocho = new Horario();
      $ocho->hora = "08:00";
      $ocho->save();

      $nueve = new Horario();
      $nueve->hora = "09:00";
      $nueve->save();

      $diez = new Horario();
      $diez->hora = "10:00";
      $diez->save();

      $once = new Horario();
      $once->hora = "11:00";
      $once->save();

      $doce = new Horario();
      $doce->hora = "12:00";
      $doce->save();
    }
}
