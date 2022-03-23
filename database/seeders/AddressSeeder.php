<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\Customer;

class AddressSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    $customer = Customer::factory()->create();
    $add = Address::factory()
      ->count(4)
      ->for($customer, 'customer')
      ->create();
    dd($add);
  }
}
