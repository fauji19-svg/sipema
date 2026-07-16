<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisAktaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_akta' => 'Akta Jual Beli',                               'kode' => 'AJB'],
            ['nama_akta' => 'Akta Tukar Menukar',                            'kode' => 'ATM'],
            ['nama_akta' => 'Akta Hibah',                                    'kode' => 'HIBAH'],
            ['nama_akta' => 'Akta Pemasukan ke Dalam Perusahaan (Inbreng)',  'kode' => 'INBRENG'],
            ['nama_akta' => 'Pemecahan Sertipikat',                          'kode' => 'PECAH_SERT'],
            ['nama_akta' => 'Peningkatan Hak',                               'kode' => 'PENINGKATAN'],
            ['nama_akta' => 'Pengukuran Tanah Girik / Sertipikat',           'kode' => 'UKUR_GIRIK'],
            ['nama_akta' => 'Pemecahan SPPT/PBB',                            'kode' => 'PECAH_SPPT'],
            ['nama_akta' => 'Alih Media / Perbaikan Data Sertipikat',        'kode' => 'ALIH_MEDIA'],
            ['nama_akta' => 'Pengakuan Hak / Pensertipikatan',               'kode' => 'PENSERT'],
            ['nama_akta' => 'Balik Nama Waris',                              'kode' => 'BALIK_WARIS'],
            ['nama_akta' => 'Akta Pemberian Hak Tanggungan',                 'kode' => 'APHT'],
            ['nama_akta' => 'Akta Pembagian Hak Bersama',                    'kode' => 'APHB'],
            ['nama_akta' => 'Akta Pemberian HGB di atas HM',                 'kode' => 'PHGB_HM'],
            ['nama_akta' => 'Akta Pemberian Hak Pakai di atas HM',           'kode' => 'PHP_HM'],
        ];

        $this->db->table('jenis_akta')->insertBatch($data);
    }
}