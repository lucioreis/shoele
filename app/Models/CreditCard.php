<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class CreditCard extends Model
{
  use HasFactory;

  public function customer()
  {
    $this->belongsTo(User::class);
  }
}
