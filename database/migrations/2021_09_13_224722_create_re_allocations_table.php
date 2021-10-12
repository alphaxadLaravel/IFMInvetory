<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('re_allocations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userID')->unsigned()->nullable();
            $table->string('newLocation');
            $table->string('oldLocation');
            $table->bigInteger('newOwner')->unsigned()->nullable();
            $table->bigInteger('oldOwner')->unsigned()->nullable();
            $table->bigInteger('deviceID')->unsigned();
            $table->string('description');
            $table->string('dateAllocated');
            $table->string('status')->default('active');
            $table->timestamps();
            $table->foreign('userID')->references('id')->on('users')->onDelete('set null');
            $table->foreign('newOwner')->references('id')->on('users')->onDelete('set null');
            $table->foreign('oldOwner')->references('id')->on('users')->onDelete('set null');
            $table->foreign('deviceID')->references('id')->on('devices')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('re_allocations');
    }
}
