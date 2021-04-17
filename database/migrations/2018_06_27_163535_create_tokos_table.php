<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_toko');
            $table->string('pic');
            $table->string('tlp')->nullable();
            $table->string('kode_toko')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('alamat')->nullable();
            $table->char('desa_id', 10)->nullable();
            $table->foreign('desa_id')
                ->references('id')
                ->on('desas')
                ->onDelete('cascade');
            $table->integer('jenis_toko_id')->unsigned();
            $table->foreign('jenis_toko_id')
                ->references('id')
                ->on('jenis_tokos')
                ->onDelete('cascade');
            $table->integer('coverage_area')->unsigned()->nullable();
            $table->foreign('coverage_area')
                ->references('id')
                ->on('tokos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokos');
    }
}
