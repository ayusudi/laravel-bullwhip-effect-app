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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments("id_pesanan")->start_from(99);
            $table->string('nama_pemesan', 32);
            $table->integer('id_barang')->unsigned();
            $table->string('jumlah_pesanan', 16);
            $table->tinyInteger('proses')->default(0);
            $table->timestamps();
            $table->foreign('id_barang')->references('id_barang')->on('barang');
            $table->boolean('archive_status')->default(false);
            $table->engine = 'InnoDB';
            $table->charset = 'latin1';
            $table->collation = 'latin1_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
};
