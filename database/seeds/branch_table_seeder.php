<?php

use Illuminate\Database\Seeder;

class branch_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tokos')->insert([
            ['id'=>2,
                'nama_toko'=>'PARUNG',
                'pic'=>'imam lukman',
                'tlp'=>'082109090',
                'kode_toko'=>'1mz1',
                'lat'=>'-6.415112',
                'lng'=>'106.728240',
                'alamat'=>'Jl.Raya Cicangkal ',
                'desa_id'=>null,
                'jenis_toko_id'=>1,
                'coverage_area'=>null,
            ],
            [
                'id'=>1,
                'nama_toko'=>'BOGOR',
                'pic'=>'Saleh Ismail',
                'tlp'=>'02129568456',
                'kode_toko'=>'xz10',
                'lat'=>'-6.515179',
                'lng'=>'106.806697',
                'alamat'=>'Jln. Pemuda Sukahati 04/10 Karadenan Cibinong-Bogor',
                'desa_id'=>null,
                'jenis_toko_id'=>1,
                'coverage_area'=>null,
            ],
            [
                'id'=>3,
                'nama_toko'=>'Cilebut Raya',
                'pic'=>'pic',
                'tlp'=>'08789999999',
                'kode_tosko'=>'x666',
                'lat'=>'-6.554968',
                'lng'=>'106.800370',
                'alamat'=>'alamat',
                'desa_id'=>null,
                'jenis_toko_id'=>2,
                'coverage_area'=>1,
            ],
            [
                'id'=>4,
                'nama_toko'=>'Cilebut Raya 2',
                'pic'=>'pic',
                'tlp'=>'0878999999',
                'kode_tosko'=>'x662',
                'lat'=>'-6.554968',
                'lng'=>'106.800370',
                'alamat'=>'alamat',
                'desa_id'=>null,
                'jenis_toko_id'=>2,
                'coverage_area'=>1,
            ],
            [
                'id'=>5,
                'nama_toko'=>'babakan madang',
                'pic'=>'pic',
                'tlp'=>'087899999',
                'kode_tosko'=>'x652',
                'lat'=>'-6.554968',
                'lng'=>'106.800370',
                'alamat'=>'alamat',
                'desa_id'=>null,
                'jenis_toko_id'=>2,
                'coverage_area'=>1,
            ],
            [
                'id'=>6,
                'nama_toko'=>'gedung putih',
                'pic'=>'pic',
                'tlp'=>'087899999',
                'kode_tosko'=>'x252',
                'lat'=>'-6.554968',
                'lng'=>'106.800370',
                'alamat'=>'alamat',
                'desa_id'=>null,
                'jenis_toko_id'=>2,
                'coverage_area'=>1,
            ],
            [
                'id'=>7,
                'nama_toko'=>'tanjung pura',
                'pic'=>'pic',
                'tlp'=>'087899999',
                'kode_tosko'=>'x192',
                'lat'=>'-6.554968',
                'lng'=>'106.800370',
                'alamat'=>'alamat',
                'desa_id'=>null,
                'jenis_toko_id'=>2,
                'coverage_area'=>1,
            ],
            [
                'id'=>8,
                'nama_toko'=>'tajung pinang',
                'pic'=>'pic',
                'tlp'=>'087899999',
                'kode_tosko'=>'z652',
                'lat'=>'-6.554968',
                'lng'=>'106.800370',
                'alamat'=>'alamat',
                'desa_id'=>null,
                'jenis_toko_id'=>2,
                'coverage_area'=>2,
            ],
            [
                'id'=>9,
                'nama_toko'=>'elok indah',
                'pic'=>'pic',
                'tlp'=>'087899999',
                'kode_tosko'=>'z152',
                'lat'=>'-6.554968',
                'lng'=>'106.800370',
                'alamat'=>'alamat',
                'desa_id'=>null,
                'jenis_toko_id'=>2,
                'coverage_area'=>2,
            ],
//            [
//                'id' => 4,
//                'cabang_id' => 1,
//                'nama' => 'Staff Distribusi'
//            ]
        ]);
    }
}
