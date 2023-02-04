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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments("id_pegawai")->start_from(12);
            $table->string('username', 32);
            $table->string('password', 16);
            $table->string('nama_pegawai', 32);
            $table->string('alamat_pegawai', 64);
            $table->string('hp_pegawai', 16);
            $table->integer('id_bagian')->unsigned();
            $table->unique('username');
            $table->foreign('id_bagian')->references('id_bagian')->on('bagian');
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
        Schema::dropIfExists('pegawai');
    }
};
