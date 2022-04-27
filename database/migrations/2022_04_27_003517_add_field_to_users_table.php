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
    Schema::table('users', function (Blueprint $table) {
      $table->string('fullname', 50)->after('id');
      $table
        ->string('phone_number', 15)
        ->after('password')
        ->nullable();
      $table
        ->string('role', 15)
        ->after('avatar')
        ->nullable()
        ->default('CUSTOMER');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('fullname');
      $table->dropColumn('phone_number');
      $table->dropColumn('role');
    });
  }
};
