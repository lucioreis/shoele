<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductsDetails>
 */
class ProductDetailsFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $size_female = ['35', '36', '37', '38', '39', '40', '41'];
    $size_male = ['38', '39', '40', '41', '42', '43', '44', '45'];
    $color = $this->faker->colorName();
    $ties = ['lace', 'velcro', 'button'];
    $amount = rand(0, 100);
    return [
      //
      'size' => $this->faker->randomElement($size_female),
      'color' => $color,
      'amount' => $amount,
      'price' => $this->faker->numberBetween(2, 10),
      'ties' => $this->faker->randomElement($ties),
      // 'product_id' => rand(1, 50)
    ];
  }
}
