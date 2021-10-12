<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartegoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartegories', function (Blueprint $table) {
            $table->id();
            $table->string('cartegory');
            $table->integer('devices')->default(0);
            $table->bigInteger('userID')->unsigned()->nullable();
            $table->string('status')->default("active");
            $table->timestamps();
            $table->foreign('userID')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartegories');
    }
}
