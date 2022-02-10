<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjercicioRutinaTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ejercicio_rutina', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->id();
      $table->foreignId('ejercicio_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('rutina_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
      $table->integer('series');
      $table->integer('repeticiones');
      $table->integer('descanso');
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
    Schema::dropIfExists('ejercicio_rutina');
  }
}
