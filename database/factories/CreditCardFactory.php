<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CreditCard>
 */
class CreditCardFactory extends Factory
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
      'number' => $this->faker->creditCardNumber(),
      'expire' => $this->faker->creditCardExpirationDate(),
      'code' => $this->faker->creditCardType(),
      'main' => false,
      // 'customer_id' => rand(1, 50)
    ];
  }
}
