<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuotasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cuotas', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->id();
      $table->date('fecha_de_pago');
      $table->date('fecha_de_caducidad');
      $table->float('importe');
      $table->foreignId('alumno_clase_id')->constrained('alumno_clase');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('cuotas');
  }
}
