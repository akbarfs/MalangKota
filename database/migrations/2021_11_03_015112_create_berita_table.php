<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->bigIncrements('id_berita');
            $table->String('judul',255) ->nullable();
            $table->text('isi') ->nullable();
            $table->String('gambar',255) ->nullable();
            //membuat FK dari id_kategori
            $table->unsignedInteger('id_kategori');
            $table->unsignedInteger('id_penulis');
            $table->timestamps();
            //...
            $table->foreign('id_kategori')
            ->reference('id_kategori')
            ->on('kategori')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_penulis')->reference('id_penulis')
            ->on('penulis')
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
        Schema::dropIfExists('berita');
    }
}
