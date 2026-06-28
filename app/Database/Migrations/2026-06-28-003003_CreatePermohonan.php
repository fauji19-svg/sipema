<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePermohonan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kode_unik'         => ['type' => 'VARCHAR', 'constraint' => 10, 'unique' => true],
            'pemohon_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'jenis_akta_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'status'            => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'Pengajuan'],
            'nilai_transaksi'   => ['type' => 'DECIMAL', 'constraint' => '15,2', 'null' => true],
            'tanggal_pengajuan' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pemohon_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('jenis_akta_id', 'jenis_akta', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('permohonan');
    }

    public function down()
    {
        $this->forge->dropTable('permohonan');
    }
}