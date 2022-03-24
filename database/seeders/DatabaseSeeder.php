<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\CreditCard;
use App\Models\ProductDetails;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();
    $customer = User::factory()
      ->has(Address::factory()->count(rand(1, 3)))
      ->has(CreditCard::factory()->count(rand(1, 3)))
      ->count(100)
      ->create();

    $products = Product::factory()
      ->has(ProductDetails::factory())
      ->has(Category::factory())
      ->count(200)
      ->create();

    // $this->call(ProductSeeder::class);
  }
}
