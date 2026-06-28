<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisAkta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_akta' => ['type' => 'VARCHAR', 'constraint' => 100],
            'kode'      => ['type' => 'VARCHAR', 'constraint' => 20],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jenis_akta');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_akta');
    }
}