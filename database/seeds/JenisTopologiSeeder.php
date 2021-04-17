<?php

use Illuminate\Database\Seeder;

class JenisTopologiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jenis_topologis')->insert([
            [
                "id"=>1,
                "nama"=>"Hub"
            ],
            [
                "id"=>2,
                "nama"=>"Extend"
            ],
            [
                "id"=>3,
                "nama"=>"Client"
            ]
        ]);

    }
}
