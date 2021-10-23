<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeviimVersesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neviim_verses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('verse_pt');
            $table->string('verse_he');
            $table->unsignedInteger('chapter_id');
            $table->timestamps();

            $table->foreign('chapter_id')->references('id')
            ->on('neviim_chapters')
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
        Schema::dropIfExists('neviim_verses');
    }
}
