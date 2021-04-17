<?php

use Illuminate\Database\Seeder;

class DesaTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
       * Change max_allowed_packet at my.cnf to 100M
       * */
        DB::table('desas')->delete();
        $file = database_path() . "/seeds/desa.sql";
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
