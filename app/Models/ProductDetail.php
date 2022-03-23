<?php

namespace App\Models;

use Database\Seeders\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
  protected $table = 'products_details';
  use HasFactory;


  public function product()
  {
    return $this->belongsTo(Product::class, 'id', 'product_id');
  }

  public function descount()
  {
    return $this->hasOne(Descount::class);
  }
}
