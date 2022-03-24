<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  use HasFactory;

  protected $fillable = [
    'state',
    'city',
    'street',
    'number',
    'zipcode',
    'user_id',
    'complement',
    'observation'
  ];


  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
