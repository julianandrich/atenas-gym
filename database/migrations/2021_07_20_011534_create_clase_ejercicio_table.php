<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaseEjercicioTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('clase_ejercicio', function (Blueprint $table) {
      $table->foreignId('clase_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('ejercicio_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('clase_ejercicio');
  }
}
