<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $model = ['Vetor', 'Modelo', 'Tuner', 'Dream'];
    $brand = ['Nike', 'Mizuno', 'Adidas', 'Puma', 'Olimpicus', 'Prada'];
    $target = ['male', 'female', 'unisex'];
    $material = ['leather', 'plastic', 'wood', 'metal', 'diamonds'];
    return [
      'model' => $this->faker->randomElement($model),
      'brand' => $this->faker->randomElement($brand),
      'target' => $this->faker->randomElement($target),
      'material' => $this->faker->randomElement($material)
      //


    ];
  }
}
