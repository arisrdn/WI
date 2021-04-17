<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_invoice');
            $table->integer('spk_id')->nullable()->unsigned();
            $table->foreign('spk_id')
                ->references('id')
                ->on('spks');
//                ->onDelete('cascade');
            $table->text('keterangan')->nullable();
            $table->text('tujuan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('ppn')->nullable();
            $table->string('persen')->nullable();
            $table->string('nominal')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
