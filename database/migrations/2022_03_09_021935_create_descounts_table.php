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
    Schema::create('descounts', function (Blueprint $table) {
      $table->id();
      // $table->foreignId('product')->constrained()->cascadeOnDelete();
      $table->foreignId('products_detail')->constrained()->cascadeOnDelete();
      $table->date('start');
      $table->date('end');
      $table->decimal('rate');
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
    Schema::dropIfExists('descounts');
  }
};
