<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 11-Jul-18
 * Time: 7:13 AM
 */
$awal='WI || ';
return[
    'T'=>[
    'alfa' => $awal.'Toko',
        'dc' => $awal.'Cabang',
        'st' => $awal.'Surat tugas'
        ],
    'ERROR_MESSAGE' => [
        'INTERNAL_SERVER_ERROR' => 'Internal Server Error'
    ],
    'ITEMS_PER_PAGE'=>'10',
    'PATH_GAMBAR' => [
        'PEGAWAI' => [
            'PERSONAL' => 'useruploads/image/pegawai/person/',
            'KTP' => 'useruploads/image/pegawai/ktp/',
            'KK' => 'useruploads/image/pegawai/kk/',
            'CV' => 'useruploads/image/pegawai/cv/'
        ],
    ],
    'PATH_LAPORAN' => [
        'MASTER'=>[
            'MTC' => 'LAPORAN/MTC/',
            'SURVEI' => 'LAPORAN/SURVEI/'
        ],
        'SURVEI' => [
            'SEBELUM' => '/SURVEI/',
            'SESUDAH' => '/SURVEI/'
        ]
    ],
    'TITLE' => [
        'ALFAMART' => [
            'INDEX' => $awal.'Daftar Toko',
            'EDIT' => $awal.'Edit Toko',
            'SHOW' => $awal.'Detail Toko',
            'CREATE' => $awal.'Tambah Toko'
        ],
        'BRANCH' => [
            'INDEX' => $awal.'Daftar Cabang ',
            'EDIT' => $awal.'Edit Petani',
            'SHOW' => $awal.'Detail Petani',
            'CREATE' => $awal.'Tambah Petani Baru'
        ],
        'PEGAWAI' => [
            'INDEX' => $awal.'Data Pegawai',
            'EDIT' => $awal.'Edit Pegawai',
            'SHOW' => $awal.'Detail Pegawai',
            'CREATE' => $awal.'Tambah Pegawai Baru'
        ],
        'PENDAMPING' => [
            'INDEX' => $awal.'Data Pendamping',
            'EDIT' => $awal.'Edit Pendamping',
            'SHOW' => $awal.'Detail Pendamping',
            'CREATE' => $awal.'Tambah Pendamping baru'
        ],
        'PERSETUJUAN' => [
            'PETANI'  =>[
                'INDEX' => $awal.'Permohonan Petani',
                'EDIT' => $awal.'Edit Pegawai',
                'SHOW' => $awal.'Detail Permohonan Petani',
                'CREATE' => $awal.'Tambah Pegawai Baru'
            ],
            'PEGAWAI' => [
                'INDEX' => $awal.'Data Permohonan Pegawai',
                'EDIT' => $awal.'Edit Pegawai',
                'SHOW' => $awal.'Detail Permohonan Pegawai',
                'CREATE' => $awal.'Tambah Pegawai Baru'
            ],
            'PEMBIAYAAN' => [
                'INDEX' => $awal.'Data Permohonan Pegawai',
                'EDIT' => $awal.'Edit Pegawai',
                'SHOW' => $awal.'Detail Permohonan Pegawai',
                'CREATE' => $awal.'Tambah Pegawai Baru'
            ]
        ],
        'TEMPLATE' => [
            'INDEX' => $awal.'Template Pembiayaan',
            'EDIT' => $awal.'Edit Template Pembiayaan',
            'SHOW' => $awal.'Detail Template Pembiayaan',
            'CREATE' => $awal.'Buat Template Pembiayaan'
        ],
        'PEMBIAYAAN' => [
            'INDEX' => $awal.'Pembiayaan',
            'EDIT' => $awal.'Edit Pembiayaan',
            'EDIT2' => $awal.'Edit Detail Pembiayaan'
        ],
        'KOMODITAS' => [
            'INDEX' => $awal.'Komoditas & Varietas',
            'EDIT' => $awal.'Edit Komoditas',
            'EDIT2' => $awal.'Edit Varietas'
        ],
        'JABATAN' => [
            'INDEX' => $awal.'Jabatan',
        ],

    ]
];
