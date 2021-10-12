<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHddChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hdd_changes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('deviceID')->unsigned();
            $table->bigInteger('userID')->unsigned()->nullable();
            $table->string('initialHDD');
            $table->string('newHDD');
            $table->string('initialSerialNo');
            $table->string('newSerialNo');
            $table->string('initialCapacity');
            $table->string('newCapacity');
            $table->string('placeStored');
            $table->string('dateChanged');
            $table->timestamps();
            $table->foreign('deviceID')->references('id')->on('memories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('hdd_changes');
    }
}
