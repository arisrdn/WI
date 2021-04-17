<?php


use Illuminate\Database\Seeder;

class ModuleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            [
                "id"=>1,
                "module"=>"Dashboard",
                "url"=>"/",
                "parent_id"=>null,
                "is_menu"=>1,
                "icon_url"=>"fa fa-tachometer ",

            ],
            [
                "id"=>2,
                "module"=>"Alfamart",
                "url"=>"alfamart/*",
                "parent_id"=>null,
                "is_menu"=>0,
                "icon_url"=>"fa fa-bank",

            ],
            [
                "id"=>3,
                "module"=>"SPK by Alfa",
                "url"=>"spk",
                "parent_id"=>null,
                "is_menu"=>1,
                "icon_url"=>"fa fa-file-text",

            ],
            [
                "id"=>4,
                "module"=>"pegawai",
                "url"=>"pegawai",
                "parent_id"=>null,
                "is_menu"=>1,
                "icon_url"=>"fa fa-id-badge",

            ],
            [
                "id"=>5,
                "module"=>"Laporan",
                "url"=>"Laporan",
                "parent_id"=>null,
                "is_menu"=>0,
                "icon_url"=>"fa fa-check",

            ],
            [
                "id"=>6,
                "module"=>"Pengaturan",
                "url"=>"setting/*",
                "parent_id"=>null,
                "is_menu"=>0,
                "icon_url"=>"fa fa-cogs",

            ],
//            [
//                "id"=>7,
//                "module"=>"persetujuan",
//                "url"=>"*/persetujuan",
//                "parent_id"=>null,
//                "is_menu"=>0,
//                "icon_url"=>"fa fa-check",
//
//            ],
            [
                "id"=>20,
                "module"=>"Toko",
                "url"=>"alfamart/toko",
                "parent_id"=>2,
                "is_menu"=>1,
                "icon_url"=>null,

            ],
            [
                "id"=>21,
                "module"=>"Branch",
                "url"=>"alfamart/branch",
                "parent_id"=>2,
                "is_menu"=>1,
                "icon_url"=>null,

            ],
            [
                "id"=>22,
                "module"=>"Jenis SPK",
                "url"=>"setting/spk-jenis",
                "parent_id"=>6,
                "is_menu"=>1,
                "icon_url"=>null,

            ],
            [
                "id"=>23,
                "module"=>"Jabatan",
                "url"=>"setting/jabatan",
                "parent_id"=>6,
                "is_menu"=>1,
                "icon_url"=>null,

            ],
            [
                "id"=>24,
                "module"=>"spk",
                "url"=>"persetujuan/spk",
                "parent_id"=>7,
                "is_menu"=>1,
                "icon_url"=>null,

            ],
            [
                "id"=>25,
                "module"=>"Module Akses",
                "url"=>"setting/manajemen-modul",
                "parent_id"=>6,
                "is_menu"=>1,
                "icon_url"=>null,

            ],
            [
                "id"=>26,
                "module"=>"Spk Maintenance",
                "url"=>"laporan/pemeliharaan",
                "parent_id"=>5,
                "is_menu"=>1,
                "icon_url"=>null,

            ],
            [
                "id"=>27,
                "module"=>"Invoice",
                "url"=>"laporan/invoice",
                "parent_id"=>5,
                "is_menu"=>1,
                "icon_url"=>null,

            ],
            [
                "id"=>28,
                "module"=>"Surat Tugas",
                "url"=>"laporan/surat-tugas",
                "parent_id"=>5,
                "is_menu"=>1,
                "icon_url"=>null,

            ]
//            [
//                "id"=>1,
//                "module"=>"Dashboard",
//                "url"=>"/",
//                "parent_id"=>null,
//                "is_menu"=>1,
//                "icon_url"=>"fa fa-tachometer "
//            ],
//            [
//                "id"=>2,
//                "module"=>"Branch Alfa",
//                "url"=>"",
//                "parent_id"=>null,
//                "is_menu"=>1,
//                "icon_url"=>"fa fa-users"
//            ],
//            [
//                "id"=>3,
//                "module"=>"Toko Alfa",
//                "url"=>"pembiayaan/persetujuan",
//                "parent_id"=>29,
//                "is_menu"=>1,
//                "icon_url"=>null
//            ],
//            [
//                "id"=>4,
//                "module"=>"pegawai",
//                "url"=>"pegawai/persetujuan",
//                "parent_id"=>29,
//                "is_menu"=>1,
//                "icon_url"=>null
//            ],
//            [
//                "id"=>5,
//                "module"=>"Pembiayaan",
//                "url"=>"setting/pembiayaan",
//                "parent_id"=>30,
//                "is_menu"=>1,
//                "icon_url"=>null
//            ],
//            [
//                "id"=>6,
//                "module"=>"template",
//                "url"=>"setting/template",
//                "parent_id"=>30,
//                "is_menu"=>1,
//                "icon_url"=>null
//            ],
//            [
//                "id"=>7,
//                "module"=>"Komoditas",
//                "url"=>"setting/komoditas",
//                "parent_id"=>30,
//                "is_menu"=>1,
//                "icon_url"=>null
//            ],
//            [
//                "id"=>8,
//                "module"=>"Jabatan",
//                "url"=>"setting/jabatan",
//                "parent_id"=>30,
//                "is_menu"=>1,
//                "icon_url"=>null
//            ],
//            [
//                "id"=>9,
//                "module"=>"pegawai",
//                "url"=>"pegawai",
//                "parent_id"=>null,
//                "is_menu"=>1,
//                "icon_url"=>"fa fa-user"
//            ],
//            [
//                "id"=>10,
//                "module"=>"Pendamping",
//                "url"=>"pendamping",
//                "parent_id"=>null,
//                "is_menu"=>1,
//                "icon_url"=>"fa fa-user-md"
//            ],
//            [
//                "id"=>11,
//                "module"=>"petani",
//                "url"=>"petani/persetujuan",
//                "parent_id"=>29,
//                "is_menu"=>1,
//                "icon_url"=>null
//            ],
//            [
//                "id"=>12,
//                "module"=>"pembiayaan",
//                "url"=>"pembiayaan",
//                "parent_id"=>null,
//                "is_menu"=>1,
//                "icon_url"=>"fa fa-pagelines"
//            ],
//            [
//                "id"=>30,
//                "module"=>"Pengaturan",
//                "url"=>"setting/*",
//                "parent_id"=>null,
//                "is_menu"=>0,
//                "icon_url"=>"fa fa-cogs"
//            ],
//            [
//                "id"=>29,
//                "module"=>"persetujuan",
//                "url"=>"*/persetujuan",
//                "parent_id"=>null,
//                "is_menu"=>0,
//                "icon_url"=>"fa fa-check"
//            ]
        ]);
    }
}
