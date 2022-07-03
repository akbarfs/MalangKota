<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_berita', function (Blueprint $table) {
            $table->bigIncrements('id_tag_berita');
            //membuat FK
            $table->unsignedBigInteger('id_berita');
            $table->unsignedBigInteger('id_tag');
            $table->timestamps();
            //tag_berita ke berita
            $table->foreign('id_berita')->reference('id_berita')
            ->on('berita')
            ->onDelete('cascade')->onUpdate('cascade');
            //tag_berita ke tag
            $table->foreign('id_tag')->reference('id_tag')
            ->on('tag')
            ->onDelete('cascade')->onUpdate('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_berita');
    }
}
