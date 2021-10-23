<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeviimChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neviim_chapters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number_pt');
            $table->string('number_he');
            $table->unsignedInteger('book_id');
            $table->timestamps();

            $table->foreign('book_id')->references('id')
            ->on('neviim')
            ->onDelete('cascade')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neviim_chapters');
    }
}
