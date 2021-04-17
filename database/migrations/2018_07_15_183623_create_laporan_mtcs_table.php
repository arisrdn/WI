<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanMtcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_mtcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('priode')->nullable();
            $table->string('tgl')->nullable();
            $table->text('toko')->nullable();
            $table->text('scan_form')->nullable();
            $table->integer('spk_item_id')->unsigned();
            $table->foreign('spk_item_id')
                ->references('id')
                ->on('spk_items');
//                ->onDelete('cascade');
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
        Schema::dropIfExists('laporan_mtcs');
    }
}
