<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Descount;
use App\Models\Product;
use App\Models\ProductsDetails;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    $product =
      Product::factory()
      ->has(ProductsDetails::factory())
      ->has(Category::factory())
      ->count(200)
      ->create();
  }
}
