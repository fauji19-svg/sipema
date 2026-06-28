<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'permohonan_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'bphtb'          => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'pph'            => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'status_bayar'   => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'Belum Lunas'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('permohonan_id', 'permohonan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}