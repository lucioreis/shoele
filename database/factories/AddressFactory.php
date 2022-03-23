<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      //
      'city' => $this->faker->city(),
      'street' => $this->faker->name(),
      'number' => $this->faker->countryCode(),
      'state' => 'Undefined',
      'complement' => 'Undefined',
      'observation' => $this->faker->text(),
      'zipcode' => $this->faker->postcode(),
      'main' => false,
      // 'customer_id' => rand(1, 50),

    ];
  }
}
