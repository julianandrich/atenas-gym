<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = User::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'name' => $this->faker->firstName(),
      'email' => $this->faker->unique()->safeEmail(),
      'userName' => $this->faker->userName(),
      'dni' => $this->faker->numberBetween($int1 = 1000000, $int2 = 40000000),
      'lastName' => $this->faker->lastName(),
      'age' => $this->faker->numberBetween($int1 = 15, $int2 = 80),
      'gender' => $this->faker->randomElement(['Masculino', 'Femenino']),
      'phone' => $this->faker->faker->numberBetween($int1 = 100000000, $int2 = 999999999),
      'emergency_number' => $this->faker->faker->numberBetween($int1 = 100000000, $int2 = 999999999),
      'role_id' => Role::all()->random()->id,
      'eRespiratorias' => $this->faker->boolean(),
      'eCardiacas' => $this->faker->boolean(),
      'eRenal' => $this->faker->boolean(),
      'epilepsia' => $this->faker->boolean(),
      'convulsiones' => $this->faker->boolean(),
      'diabetes' => $this->faker->boolean(),
      'asma' => $this->faker->boolean(),
      'alergia' => $this->faker->boolean(),
      'medicacion' => $this->faker->boolean(),
      'email_verified_at' => now(),
      'password' => Hash::make('grupo2utnconcordia'), // grupo2utnconcordia
      'remember_token' => Str::random(10),
      'active' => $this->faker->boolean(),
    ];
  }

  /**
   * Indicate that the model's email address should be unverified.
   *
   * @return \Illuminate\Database\Eloquent\Factories\Factory
   */
  public function unverified()
  {
    return $this->state(function (array $attributes) {
      return [
        'email_verified_at' => null,
      ];
    });
  }
}
