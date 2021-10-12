<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cartegoryID')->unsigned();
            $table->string('serialNo');
            $table->string('model');
            $table->string('location');
            $table->bigInteger('ownerID')->unsigned()->nullable();
            $table->string('ifmCode')->unique();
            $table->string('dateBought');
            $table->string('hasMemory');
            $table->bigInteger('registID')->unsigned()->nullable();
            $table->string('status')->default('New');
            $table->foreign('cartegoryID')->references('id')->on('cartegories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ownerID')->references('id')->on('users')->onDelete('set null');
            $table->foreign('registID')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('devices');
    }
}
