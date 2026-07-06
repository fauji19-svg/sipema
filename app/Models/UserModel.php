<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    // Kolom yang boleh diisi (whitelist)
    protected $allowedFields = [
        'nama',
        'email',
        'no_hp',
        'password',
        'role',
        'created_at'
    ];

    // Timestamps
    protected $useTimestamps = false;

    // Validasi
    protected $validationRules = [
        'nama'     => 'required|min_length[3]',
        'email'    => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
        'role'     => 'required|in_list[admin,staff,notaris,pemohon]',
    ];

    // =====================
    // FUNGSI-FUNGSI CUSTOM
    // =====================

    // Cari user berdasarkan email
    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    // Cari user berdasarkan role
    public function findByRole($role)
    {
        return $this->where('role', $role)->findAll();
    }

    // Cek apakah email sudah terdaftar
    public function emailExists($email)
    {
        return $this->where('email', $email)->countAllResults() > 0;
    }
}