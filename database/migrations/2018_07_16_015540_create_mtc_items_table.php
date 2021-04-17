<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtcItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtc_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('keterangan')->nullable();
            $table->text('sebelum')->nullable();
            $table->text('sesudah')->nullable();
            $table->integer('laporan_mtc_id')->unsigned();
            $table->foreign('laporan_mtc_id')
                ->references('id')
                ->on('laporan_mtcs');
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
        Schema::dropIfExists('mtc_items');
    }
}
