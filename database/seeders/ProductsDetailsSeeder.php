<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsDetails;

class ProductsDetailsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //

    $productsdetails =
      ProductsDetails::factory()
      ->from(Product::factory()->count(rand(0, 10))->create())
      ->create();
  }
}
