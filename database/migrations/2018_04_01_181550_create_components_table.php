<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('components', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image',200)->nullable();
            $table->string('title',200);
            $table->string('subtitle',200)->nullable();
            $table->mediumText('description');
            $table->unsignedInteger('section_id');
            $table->unsignedInteger('button_id')->nullable();
            $table->timestamps();
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('button_id')->references('id')->on('buttons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('components');
    }
}
