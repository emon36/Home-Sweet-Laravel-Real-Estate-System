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
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name');
            $table->text('short_description');
            $table->text('long_description')->nullable();
            $table->string('images')->nullable();
            $table->string('city')->nullable();
            $table->string('location');
            $table->integer('number_of_blocks')->nullable();
            $table->integer('number_of_floors')->nullable();
            $table->integer('number_of_flats');
            $table->string('status')->default('1');
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
        Schema::dropIfExists('projects');
    }
};
