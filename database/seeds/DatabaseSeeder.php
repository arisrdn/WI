<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        $this->call(JenisTopologiSeeder::class);
        $this->call(JenisTokoSeeder::class);
        $this->call(branch_table_seeder::class);
        $this->call(JabatanSeeder::class);
//        $this->call(PropinsiTableSeed::class);
//        $this->call(KotaTableSeed::class);
//        $this->call(KecamatanTableSeed::class);
//        $this->call(DesaTableSeed::class);
        $this->call(ModuleSeed::class);
        $this->call(ModuleAccessTableSeed::class);
        $this->call(tabel_pegawais_seed::class);

    }
}
