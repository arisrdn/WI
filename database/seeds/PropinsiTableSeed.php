<?php

use Illuminate\Database\Seeder;

class PropinsiTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinsis')->delete();
        $file = database_path() . "/seeds/propinsi.sql";
        /*
         * First method with DB::unprepared
         * */
        DB::unprepared(file_get_contents($file));

    }
}
