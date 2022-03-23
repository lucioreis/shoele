<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products_details', function (Blueprint $table) {
      $table->id();
      $table->string('size', 10);
      $table->string('color', 20);
      $table->string('ties', 20);
      $table->integer('amount');
      $table->decimal('price');
      $table->foreignId('product_id')->constrained()->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('products_details');
  }
};
