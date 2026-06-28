<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDokumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'permohonan_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'nama_file'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'tipe_dokumen'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'status_validasi'  => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'Menunggu'],
            'versi'            => ['type' => 'INT', 'constraint' => 5, 'default' => 1],
            'uploaded_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('permohonan_id', 'permohonan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('dokumen');
    }

    public function down()
    {
        $this->forge->dropTable('dokumen');
    }
}