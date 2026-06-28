<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuditTrail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'permohonan_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'aktivitas'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'waktu'          => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('permohonan_id', 'permohonan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('audit_trail');
    }

    public function down()
    {
        $this->forge->dropTable('audit_trail');
    }
}