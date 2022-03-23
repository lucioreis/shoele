<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Descounts>
 */
class DescountFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $start = $this->faker->dateTimeInInterval(now(), '+1 year');
    $end = $this->faker->dateTimeInInterval(
      $start,
      '+' . ($this->faker->randomDigitNotZero() * $this->faker->randomDigitNotZero()) . ' days'
    );
    return [
      'rate' => $this->faker->randomFloat(0, 0.9),
      'start' => $start,
      'end' => $end
    ];
  }
}
