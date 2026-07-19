<?php

namespace App\Models;

use CodeIgniter\Model;

class PermohonanModel extends Model
{
    protected $table      = 'permohonan';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'kode_unik',
        'pemohon_id',
        'nik',
        'alamat',
        'alamat_objek',
        'jenis_akta_id',
        'status',
        'nilai_transaksi',
        'tanggal_pengajuan',
    ];
    // Generate kode unik acak 7 karakter
    public function generateKodeUnik()
    {
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        do {
            $kode = '';
            for ($i = 0; $i < 7; $i++) {
                $kode .= $chars[random_int(0, strlen($chars) - 1)];
            }
        } while ($this->where('kode_unik', $kode)->countAllResults() > 0);

        return $kode;
    }

    // Ambil semua permohonan milik pemohon tertentu
    public function getByPemohon($pemohon_id)
    {
        return $this->select('permohonan.*, jenis_akta.nama_akta, jenis_akta.kode')
                    ->join('jenis_akta', 'jenis_akta.id = permohonan.jenis_akta_id')
                    ->where('permohonan.pemohon_id', $pemohon_id)
                    ->orderBy('permohonan.tanggal_pengajuan', 'DESC')
                    ->findAll();
    }

    // Ambil 1 permohonan berdasarkan kode unik
    public function getByKodeUnik($kode)
    {
        return $this->select('permohonan.*, jenis_akta.nama_akta, jenis_akta.kode as kode_akta')
                    ->join('jenis_akta', 'jenis_akta.id = permohonan.jenis_akta_id')
                    ->where('permohonan.kode_unik', $kode)
                    ->first();
    }

    // Ambil permohonan milik pemohon + filter jenis akta
    public function getByPemohonFiltered($pemohon_id, $jenis_akta_id = null, $kode = null)
    {
        $builder = $this->select('permohonan.*, jenis_akta.nama_akta, jenis_akta.kode')
                        ->join('jenis_akta', 'jenis_akta.id = permohonan.jenis_akta_id')
                        ->where('permohonan.pemohon_id', $pemohon_id);

        if ($jenis_akta_id) {
            $builder->where('permohonan.jenis_akta_id', $jenis_akta_id);
        }
        if ($kode) {
            $builder->where('permohonan.kode_unik', strtoupper($kode));
        }

        return $builder->orderBy('permohonan.tanggal_pengajuan', 'DESC')->findAll();
    }
}