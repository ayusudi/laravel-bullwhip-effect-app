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
        Schema::create('produksi', function (Blueprint $table) {
            $table->increments("id_produksi")->start_from(116);
            $table->integer('id_barang')->unsigned();
            $table->integer('id_pesanan')->unsigned();
            $table->foreign('id_barang')->references('id_barang')->on('barang');
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pemesanan');
            $table->string('jumlah_produksi', 16);
            $table->string('lead_time', 4);
            $table->timestamps();
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
        Schema::dropIfExists('produksi');
    }
};
