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
    Schema::create('users', function (Blueprint $table) {
      $table->id()->unique();
      $table->string('name', 50);
      $table->string('email', 50)->unique();
      $table->string('password', 100);
      $table->string('gender', 10);
      $table->string('phone');
      $table->string('cellphone');
      $table->bigInteger('cpf')->unique();
      $table->boolean('admin')->nullable();
      $table->datetime('email_verified_at')->nullable();
      $table->string('remember_token', 100)->nullable();
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
    Schema::dropIfExists('users');
  }
};
