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
    Schema::create('transaction_items', function (Blueprint $table) {
      $table->id();
      $table->foreignId('transaction_id');
      $table->foreignId('product_id');
      $table->double('price');
      $table->integer('quantity');
      $table->double('subtotal_price');
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
    Schema::dropIfExists('transaction_items');
  }
};
