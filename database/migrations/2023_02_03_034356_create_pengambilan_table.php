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
        Schema::create('pengambilan', function (Blueprint $table) {
            $table->increments("id_pengambilan")->start_from(6);
            $table->integer('id_barang')->unsigned();
            $table->foreign('id_barang')->references('id_barang')->on('barang');
            $table->string('nama_pengambil', 32);
            $table->string('jumlah_pengambilan', 16);
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
        Schema::dropIfExists('pengambilan');
    }
};
