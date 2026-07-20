<?php

namespace App\Controllers\Notaris;

use App\Controllers\BaseController;
use App\Models\PermohonanModel;
use App\Models\DokumenModel;

class NotarisController extends BaseController
{
    protected $permohonanModel;
    protected $dokumenModel;
    protected $db;

    public function __construct()
    {
        $this->permohonanModel = new PermohonanModel();
        $this->dokumenModel    = new DokumenModel();
        $this->db              = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'totalReview'  => $this->permohonanModel->where('status','Review Notaris')->countAllResults(),
            'totalSelesai' => $this->permohonanModel->where('status','Selesai')->countAllResults(),
            'permohonan'   => $this->permohonanModel
                                   ->select('permohonan.*, jenis_akta.nama_akta, users.nama as nama_pemohon, users.no_hp')
                                   ->join('jenis_akta','jenis_akta.id = permohonan.jenis_akta_id')
                                   ->join('users','users.id = permohonan.pemohon_id')
                                   ->whereIn('permohonan.status',['Review Notaris','Selesai'])
                                   ->orderBy('permohonan.tanggal_pengajuan','DESC')
                                   ->findAll(),
        ];

        return view('notaris/dashboard', $data);
    }

    public function detail($kode)
    {
        $permohonan = $this->permohonanModel->getByKodeUnik(strtoupper($kode));

        if (!$permohonan) {
            return redirect()->to('/notaris/dashboard')
                             ->with('error', 'Permohonan tidak ditemukan.');
        }

        $dokumen    = $this->dokumenModel->getByPermohonan($permohonan['id']);
        // Draft akta terbaru dari Staff
        $draft = $this->db->table('draft_akta')
                          ->where('permohonan_id', $permohonan['id'])
                          ->orderBy('id', 'DESC')
                          ->get()->getRowArray();
        $auditTrail = $this->db->table('audit_trail')
                               ->where('permohonan_id', $permohonan['id'])
                               ->orderBy('waktu','DESC')
                               ->get()->getResultArray();
        $pembayaran = $this->db->table('pembayaran')
                               ->where('permohonan_id', $permohonan['id'])
                               ->get()->getRowArray();

        return view('notaris/detail', [
            'permohonan' => $permohonan,
            'dokumen'    => $dokumen,
            'auditTrail' => $auditTrail,
            'pembayaran' => $pembayaran,
            'draft'      => $draft,
        ]);
    }

    public function setujui($id)
    {
        $kode    = $this->request->getPost('kode_unik');
        $catatan = $this->request->getPost('catatan');

        $this->permohonanModel->update($id, ['status' => 'Selesai']);

        $this->db->table('audit_trail')->insert([
            'user_id'       => session()->get('user_id'),
            'permohonan_id' => $id,
            'aktivitas'     => 'Notaris menyetujui dan mengesahkan akta' . ($catatan ? ' — '.$catatan : ''),
            'waktu'         => date('Y-m-d H:i:s'),
        ]);

        $permohonan = $this->permohonanModel->find($id);
        $this->db->table('notifikasi')->insert([
            'permohonan_id' => $id,
            'pemohon_id'    => $permohonan['pemohon_id'],
            'pesan'         => 'Akta permohonan '.$kode.' telah disetujui Notaris dan berstatus Selesai. Silakan ambil dokumen ke kantor.',
            'dibaca'        => 0,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/notaris/detail/'.$kode)
                         ->with('success', 'Akta berhasil disetujui dan status diubah menjadi Selesai.');
    }

    public function tolak($id)
    {
        $kode    = $this->request->getPost('kode_unik');
        $catatan = $this->request->getPost('catatan');

        $this->permohonanModel->update($id, ['status' => 'Draft Akta']);

        $this->db->table('audit_trail')->insert([
            'user_id'       => session()->get('user_id'),
            'permohonan_id' => $id,
            'aktivitas'     => 'Notaris mengembalikan draft akta ke Staff untuk diperbaiki' . ($catatan ? ' — '.$catatan : ''),
            'waktu'         => date('Y-m-d H:i:s'),
        ]);

        $permohonan = $this->permohonanModel->find($id);
        $this->db->table('notifikasi')->insert([
            'permohonan_id' => $id,
            'pemohon_id'    => $permohonan['pemohon_id'],
            'pesan'         => 'Draft akta permohonan '.$kode.' dikembalikan ke Staff untuk diperbaiki.',
            'dibaca'        => 0,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/notaris/detail/'.$kode)
                         ->with('success', 'Draft akta dikembalikan ke Staff untuk diperbaiki.');
    }
}