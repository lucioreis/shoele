<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\CreditCard;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //

    $customer =
      Customer::factory()
      ->times(10)
      ->has(Address::factory()->count(rand(1, 4)))
      ->has(CreditCard::factory()->count(rand(1, 4)))
      ->create();

    dd($customer);
  }
}
