<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisAktaModel extends Model
{
    protected $table      = 'jenis_akta';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = ['nama_akta', 'kode'];

    public function getAllForDropdown()
    {
        return $this->findAll();
    }
}