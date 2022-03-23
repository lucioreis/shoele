<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'name' => $this->faker->name(),
      'email' => $this->faker->unique()->email(),
      'password' => $this->faker->password(),
      'gender' => $this->faker->randomElement(['male', 'female']),
      'phone' => $this->faker->unique()->phoneNumber(),
      'cellphone' => $this->faker->unique()->phoneNumber(),
      'cpf' => $this->faker->unique()->numberBetween(10000000000, 99999999999)
    ];
  }
}
