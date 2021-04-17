<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopologisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topologis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_addr');
            $table->integer('jenis_topologi_id')->unsigned();
            $table->foreign('jenis_topologi_id')
                ->references('id')->on('jenis_topologis')->onDelete('cascade');
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
        Schema::dropIfExists('topologis');
    }
}
