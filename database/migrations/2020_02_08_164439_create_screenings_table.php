<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScreeningsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('screenings', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('movie_id')->unsigned();
      $table->integer('hall_id')->unsigned();
      $table->integer('price')->unsigned();
      $table->dateTime('start');
      $table->dateTime('end');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('screenings');
  }
}
