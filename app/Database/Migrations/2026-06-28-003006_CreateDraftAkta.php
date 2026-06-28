<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDraftAkta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'permohonan_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'staff_id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'notaris_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'status_review'  => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'Menunggu Notaris'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('permohonan_id', 'permohonan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('staff_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('notaris_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('draft_akta');
    }

    public function down()
    {
        $this->forge->dropTable('draft_akta');
    }
}