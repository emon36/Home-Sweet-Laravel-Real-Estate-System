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
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->string('property_name');
            $table->text('short_description');
            $table->text('long_description')->nullable();
            $table->string('images')->nullable();
            $table->string('city')->nullable();
            $table->string('location');
            $table->integer('number_of_bedrooms');
            $table->integer('number_of_bathrooms');
            $table->integer('floor_number');
            $table->bigInteger('size');
            $table->string('features')->nullable();
            $table->decimal('price',10,2);
            $table->string('status')->default(1);
            $table->string('approved_status')->default(0);
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
