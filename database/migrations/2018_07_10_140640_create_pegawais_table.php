<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->integer('jk_id')->nullable();
//                $table->foreign('jk_id')
//                    ->references('id')
//                    ->on('jenis_kelamins')
//                    ->onDelete('cascade');
//                $table->integer('pendidikan_id')->unsigned()->nullable();
//                $table->foreign('pendidikan_id')
//                    ->references('id')
//                    ->on('spendidikans')
//                    ->onDelete('cascade');
                $table->char('desa_id', 10)->nullable();
                $table->foreign('desa_id')
                    ->references('id')
                    ->on('desas')
                    ->onDelete('cascade');
                $table->uuid('jabatan_id');
                $table->foreign('jabatan_id')
                    ->references('id')
                    ->on('jabatans')
                    ->onDelete('cascade');
                $table->string('nama');
                $table->text('cita_cita')->nullable();
                $table->string('cv')->nullable();
                $table->string('no_hp')->nullable();
                $table->string('agama')->nullable();
//                $table->integer('divisi')->unsigned()->nullable();
                $table->text('alamat')->nullable();
                $table->string('no_ktp')->nullable();
                $table->string('nik')->nullable();
                $table->date('mulai_bekerja')->nullable();
                $table->string('tempat_lahir')->nullable();
                $table->date('tanggal_lahir')->nullable();
                $table->string('path_foto_person')->nullable();
                $table->string('path_foto_ktp')->nullable();
                $table->string('path_foto_kk')->nullable();
                $table->boolean('is_active')->default(false);
                $table->date('tanggal_keluar')->nullable();
                $table->text('alasan_keluar')->nullable();
                $table->string('email');
                $table->string('username')->nullable();
                $table->string('password');
                $table->boolean('disetujui_1')->nullable();
                $table->uuid('disetujui_1_id')->nullable();
                $table->dateTime('tanggal_disetujui_1')->nullable();
                $table->text('alasan_disetujui_1')->nullable();
                $table->rememberToken();
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
        Schema::dropIfExists('pegawais');
    }
}
