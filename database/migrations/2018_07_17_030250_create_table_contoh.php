<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContoh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contoh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_contoh', 255);
            $table->string('deskripsi', 500);
            $table->string('link', 200)->nullable();
            $table->integer('id_produk')->unsigned();
            $table->string('fotocontoh', 255);
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
        Schema::dropIfExists('contoh');
    }
}
