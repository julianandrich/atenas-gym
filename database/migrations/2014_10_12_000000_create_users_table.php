<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->id();
      $table->string('userName');
      $table->string('email')->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('name');
      $table->string('lastName');
      $table->char('dni')->unique()->length(8);
      $table->integer('age')->length(3);
      $table->boolean('active')->default(1);
      $table->enum('gender', ['Masculino', 'Femenino']);
      $table->bigInteger('phone');
      $table->bigInteger('emergency_number');
      $table->boolean('eRespiratorias');
      $table->boolean('eCardiacas');
      $table->boolean('eRenal');
      $table->boolean('convulsiones');
      $table->boolean('epilepsia');
      $table->boolean('diabetes');
      $table->boolean('alergia');
      $table->boolean('asma');
      $table->boolean('medicacion');
      $table->string('password')->default(Hash::make("grupo2utnconcordia"));
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
}
