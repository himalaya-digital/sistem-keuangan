<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran_kas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('id_proyek')->nullable();
            $table->unsignedInteger('id_kategori')->nullable();
            $table->unsignedInteger('id_akun');
            $table->integer('jumlah')->nullable();
            $table->string('keterangan_pengeluaran', 30);
            $table->date('tanggal_pengeluaran');
            $table->integer('total_pengeluaran')->nullable()->default(null);
            $table->string('jenis_pengeluaran');
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
        Schema::dropIfExists('pengeluaran_kas');
    }
}
