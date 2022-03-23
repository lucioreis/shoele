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
    Schema::create('addresses', function (Blueprint $table) {
      $table->id();
      $table->string('city', 50);
      $table->string('state', 50);
      $table->string('zipcode', 10);
      $table->string('street', 50);
      $table->string('number', 50);
      $table->string('complement', 50);
      $table->text('observation');
      $table->foreignId('customer_id')->constrained()->references('id')->on('customers');
      $table->boolean('main')->default(false);

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
    Schema::dropIfExists('addresses');
  }
};
