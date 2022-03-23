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
    Schema::create('credit_cards', function (Blueprint $table) {
      $table->id();
      $table->string('number', 100)->unique();
      $table->string('code');
      $table->date('expire');
      $table->foreignId(('customer_id'))->constrained();
      $table->boolean('main');
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
    Schema::dropIfExists('credit_cards');
  }
};