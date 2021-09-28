<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataProyeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_proyeks', function (Blueprint $table) {
            $table->id();
            $table->string('id_proyek', 10)->unique();
            $table->string('id_customer', 15)->references('id')->on('data_customers')->onDelete('cascade');
            $table->string('nama_proyek', 20);
            $table->integer('total_bayar');
            $table->integer('bayar');
            $table->integer('sisa_bayar');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->date('tanggal_bayar');
            $table->string('status', 10);
            $table->string('keterangan_bayar', 15);
            $table->integer('harga_total_bahan');
            $table->integer('harga_jasa');
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
        Schema::dropIfExists('data_proyeks');
    }
}
