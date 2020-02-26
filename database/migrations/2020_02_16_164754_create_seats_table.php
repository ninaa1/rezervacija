<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('seats', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('row')->unsigned();
        $table->integer('number')->unsigned();
        $table->integer('hall_id')->unsigned();
        $table->timestamps();
        $table->softDeletes();
        $table->unique(['row', 'number', 'hall_id']);
      });
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seat');
    }
}
