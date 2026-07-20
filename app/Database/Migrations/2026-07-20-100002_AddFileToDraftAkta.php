<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFileToDraftAkta extends Migration
{
    public function up()
    {
        if (! $this->db->fieldExists('nama_file', 'draft_akta')) {
            $this->forge->addColumn('draft_akta', [
                'nama_file' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                    'after'      => 'notaris_id',
                ],
                'catatan' => [
                    'type'  => 'TEXT',
                    'null'  => true,
                    'after' => 'nama_file',
                ],
                'created_at' => [
                    'type'  => 'DATETIME',
                    'null'  => true,
                    'after' => 'status_review',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('nama_file', 'draft_akta')) {
            $this->forge->dropColumn('draft_akta', ['nama_file', 'catatan', 'created_at']);
        }
    }
}