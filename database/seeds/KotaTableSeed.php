<?php

use Illuminate\Database\Seeder;

class KotaTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kotas')->delete();
        $file = database_path() . "/seeds/kota.sql";
        /*
         * First method with DB::unprepared
         * */
        DB::unprepared(file_get_contents($file));
           /*
           * Second method with mysql command if first method is failed
           * */
        //exec("mysql -u ".\Config::get('database.mysql.user')." -p".\Config::get('database.mysql.password')." ".\Config::get('database.mysql.database')." <".$file);
    }
}
