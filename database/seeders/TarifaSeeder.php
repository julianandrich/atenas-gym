<?php

namespace Database\Seeders;

use App\Models\Tarifa;
use Illuminate\Database\Seeder;

class TarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $uno = new Tarifa();
      $uno->cantidad_dias = 1;
      $uno->precio = 500;
      $uno->save();

      $dos = new Tarifa();
      $dos->cantidad_dias = 2;
      $dos->precio = 900;
      $dos->save();

      $tres = new Tarifa();
      $tres->cantidad_dias = 3;
      $tres->precio = 1200;
      $tres->save();

      $cuatro = new Tarifa();
      $cuatro->cantidad_dias = 4;
      $cuatro->precio = 1500;
      $cuatro->save();

      $cinco = new Tarifa();
      $cinco->cantidad_dias = 5;
      $cinco->precio = 2000;
      $cinco->save();
    }
}
