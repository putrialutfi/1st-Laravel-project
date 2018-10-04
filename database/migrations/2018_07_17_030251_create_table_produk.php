<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_produk', 50);
            $table->timestamps();
        });

        //foreignkey
        Schema::table('item', function (Blueprint $table) {
          $table->foreign('id_produk')
                ->references('id')
                ->on('produk')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('contoh', function (Blueprint $table) {
          $table->foreign('id_produk')
                ->references('id')
                ->on('produk')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::tabel('item', function(Blueprint $table) {
          $table->dropForeign('item_id_produk_foreign');
        });

        Schema::tabel('contoh', function(Blueprint $table) {
          $table->dropForeign('contoh_id_produk_foreign');
        });

        Schema::drop('produk');
    }
}
