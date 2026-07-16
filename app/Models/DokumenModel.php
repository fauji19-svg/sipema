<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $table      = 'dokumen';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'permohonan_id',
        'nama_file',
        'tipe_dokumen',
        'status_validasi',
        'versi',
        'uploaded_at',
    ];

    public function getByPermohonan($permohonan_id)
    {
        return $this->where('permohonan_id', $permohonan_id)->findAll();
    }
}