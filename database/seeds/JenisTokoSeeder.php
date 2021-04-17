<?php

use Illuminate\Database\Seeder;

class JenisTokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_tokos')->insert([
            [
                "id"=>1,
                "nama"=>"Cabang"
            ],
            [
                "id"=>2,
                "nama"=>"Toko"
            ],
        ]);

        DB::table('spk_jenis')->insert([
            [
                "id"=>1,
                "nama"=>"Maintenance",
                "keterangan"=>"maintenance"
            ],
            [
                "id"=>2,
                "nama"=>"Instalasi",
                "keterangan"=>"instalsi"
            ]

        ]);
        }
}
