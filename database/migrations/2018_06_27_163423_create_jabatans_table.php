<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('nama');
            $table->string('created_by')->nullable()->comment('isinya ID User yg melakukan insert dari aplikasi');
            $table->string('updated_by')->nullable()->comment('isinya ID User yg melakukan update dari aplikasi');
            $table->string('deleted_by')->nullable()->comment('isinya ID User yg melakukan delete dari aplikasi');
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
        Schema::dropIfExists('jabatans');
    }
}
