<?php

use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatans')->insert([
            [
                'id' => 1,
                'nama' => 'Manager'
            ],
            [
                'id' => 2,
                'nama' => 'Staff'
            ],
            [
                'id' => 3,
                'nama' => 'Admin'
            ],
//            [
//                'id' => 4,
//                'cabang_id' => 1,
//                'nama' => 'Staff Distribusi'
//            ]
        ]);
    }
}
