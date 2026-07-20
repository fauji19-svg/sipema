<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDataPemohonToPermohonan extends Migration
{
    public function up()
    {
        // Cek dulu biar aman dijalankan di database yang kolomnya sudah ada
        if (! $this->db->fieldExists('nik', 'permohonan')) {
            $this->forge->addColumn('permohonan', [
                'nik' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 16,
                    'null'       => true,
                    'after'      => 'pemohon_id',
                ],
                'alamat' => [
                    'type'  => 'TEXT',
                    'null'  => true,
                    'after' => 'nik',
                ],
                'alamat_objek' => [
                    'type'  => 'TEXT',
                    'null'  => true,
                    'after' => 'alamat',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('nik', 'permohonan')) {
            $this->forge->dropColumn('permohonan', ['nik', 'alamat', 'alamat_objek']);
        }
    }
}