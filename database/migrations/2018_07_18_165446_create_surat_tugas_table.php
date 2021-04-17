<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('pegawai_id')->nullble();
            $table->foreign('pegawai_id')
                ->references('id')
                ->on('pegawais');
            $table->integer('spk_id')->nullable()->unsigned();
            $table->foreign('spk_id')
                ->references('id')
                ->on('spks');
            $table->string('no_st')->nullble();
            $table->string('kegiatan')->nullble();
            $table->date('tanggal_1')->nullble();
            $table->date('tanggal_2')->nullble();
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
        Schema::dropIfExists('surat_tugas');
    }
}
