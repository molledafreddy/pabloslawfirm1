<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('buttons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('button_name',200);
            $table->string('button_link',200)->nullable();
            $table->unsignedInteger('modal_id')->nullable();
            $table->foreign('modal_id')->references('id')->on('modals')->onDelete('cascade');
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
        Schema::dropIfExists('buttons');
    }
}
