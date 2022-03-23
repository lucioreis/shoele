<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  public function productDetails()
  {
    return $this->hasMany(ProductDetail::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
