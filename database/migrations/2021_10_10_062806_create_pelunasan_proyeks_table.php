<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelunasanProyeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelunasan_proyeks', function (Blueprint $table) {
            $table->id();
            $table->string('id_pelunasan_proyek')->unique();
            $table->string('id_proyek')->references('id')->on('data_proyeks')->onDelete('cascade');
            $table->date('tanggal_pembayaran');
            $table->integer('jumlah_bayar');
            $table->integer('sisa_piutang');
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
        Schema::dropIfExists('pelunasan_proyeks');
    }
}
