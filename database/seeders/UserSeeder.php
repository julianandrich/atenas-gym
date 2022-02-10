<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'name' => "admin",
      "email" => "admin@admin.com",
      "userName" => "admin",
      "dni" => "12345678",
      "lastName" => "admin",
      "age" => 27,
      "gender" => "Masculino",
      "phone" => "12345",
      "emergency_number" => "12345",
      "role_id" => 3,
      "eRespiratorias" => 0,
      "eCardiacas" => 0,
      "eRenal" => 0,
      "epilepsia" => 0,
      "convulsiones" => 0,
      "diabetes" => 0,
      "asma" => 0,
      "alergia" => 0,
      "medicacion" => 0,
      "email_verified_at" => null,
      "password" => Hash::make('grupo2utnconcordia'),
      "remember_token" => null,
    ]);

    DB::table('profesors')->insert([
      "user_id" => 1,
    ]);

    //   User::factory()->times(50)->create();


    //   foreach (User::all() as $usuario) {
    //     switch ($usuario->role_id) {
    //       case '1':
    //         $alumno = new Alumno();
    //         $alumno->user_id = $usuario->id;
    //         $alumno->save();
    //         break;
    //       case '2':
    //         $profesor = new Profesor();
    //         $profesor->user_id = $usuario->id;
    //         $profesor->save();
    //         break;
    //       case '3':
    //         $profesor = new Profesor();
    //         $profesor->user_id = $usuario->id;
    //         $profesor->save();
    //         break;
    //     }
    //   }
  }
}
