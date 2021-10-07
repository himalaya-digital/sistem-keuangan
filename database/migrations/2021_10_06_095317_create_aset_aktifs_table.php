<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetAktifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_aktifs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aset');
            $table->unsignedInteger('id_akun');
            $table->integer('biaya_akuisisi');
            $table->integer('nilai_residu');
            $table->integer('masa_manfaat');
            $table->integer('penyusutan');
            $table->date('tanggal_akuisisi');
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
        Schema::dropIfExists('aset_aktifs');
    }
}
