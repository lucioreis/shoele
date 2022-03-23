<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class Customer extends Model
{
  use HasFactory;

  public function addresses()
  {
    return $this->hasMany(Address::class);
  }

  public function creditCards()
  {
    return $this->hasMany(CreditCard::class);
  }

  public function orders()
  {
    return $this->hasMany(Order::class);
  }
}
