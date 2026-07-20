<?php

namespace App\Controllers\Staff;

use App\Controllers\BaseController;
use App\Models\PermohonanModel;
use App\Models\DokumenModel;
use App\Models\JenisAktaModel;

class StaffController extends BaseController
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
            'totalTugas'   => $this->permohonanModel
                                   ->whereIn('status', ['Perhitungan Pajak','Draft Akta'])
                                   ->countAllResults(),
            'totalDraft'   => $this->permohonanModel
                                   ->where('status', 'Draft Akta')
                                   ->countAllResults(),
            'totalReview'  => $this->permohonanModel
                                   ->where('status', 'Review Notaris')
                                   ->countAllResults(),
            'totalSelesai' => $this->permohonanModel
                                   ->where('status', 'Selesai')
                                   ->countAllResults(),
            'permohonan'   => $this->permohonanModel
                                   ->select('permohonan.*, jenis_akta.nama_akta, users.nama as nama_pemohon, users.no_hp')
                                   ->join('jenis_akta', 'jenis_akta.id = permohonan.jenis_akta_id')
                                   ->join('users', 'users.id = permohonan.pemohon_id')
                                   ->whereIn('permohonan.status', ['Perhitungan Pajak','Draft Akta','Review Notaris'])
                                   ->orderBy('permohonan.tanggal_pengajuan', 'DESC')
                                   ->findAll(),
        ];

        return view('staff/dashboard', $data);
    }

    public function detail($kode)
    {
        $permohonan = $this->permohonanModel->getByKodeUnik(strtoupper($kode));

        if (!$permohonan) {
            return redirect()->to('/staff/dashboard')
                             ->with('error', 'Permohonan tidak ditemukan.');
        }

        $dokumen    = $this->dokumenModel->getByPermohonan($permohonan['id']);
        $auditTrail = $this->db->table('audit_trail')
                               ->where('permohonan_id', $permohonan['id'])
                               ->orderBy('waktu', 'DESC')
                               ->get()->getResultArray();
        $pembayaran = $this->db->table('pembayaran')
                               ->where('permohonan_id', $permohonan['id'])
                               ->get()->getRowArray();

        return view('staff/detail', [
            'permohonan' => $permohonan,
            'dokumen'    => $dokumen,
            'auditTrail' => $auditTrail,
            'pembayaran' => $pembayaran,
        ]);
    }

public function submitDraft($id)
    {
        $kode    = $this->request->getPost('kode_unik');
        $catatan = $this->request->getPost('catatan');

        // Upload file draft akta
        $file = $this->request->getFile('file_draft');
        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'File draft akta wajib diupload.');
        }
        $namaFile = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads/draft/', $namaFile);

        // Simpan ke tabel draft_akta
        $this->db->table('draft_akta')->insert([
            'permohonan_id' => $id,
            'staff_id'      => session()->get('user_id'),
            'nama_file'     => $namaFile,
            'catatan'       => $catatan,
            'status_review' => 'Menunggu Notaris',
            'created_at'    => date('Y-m-d H:i:s'),
        ]);

        // Update status ke Review Notaris
        $this->permohonanModel->update($id, ['status' => 'Review Notaris']);

        // Audit trail
        $this->db->table('audit_trail')->insert([
            'user_id'       => session()->get('user_id'),
            'permohonan_id' => $id,
            'aktivitas'     => 'Staff mengajukan draft akta ke Notaris untuk direview' . ($catatan ? ' — ' . $catatan : ''),
            'waktu'         => date('Y-m-d H:i:s'),
        ]);

        // Notifikasi pemohon
        $permohonan = $this->permohonanModel->find($id);
        $this->db->table('notifikasi')->insert([
            'permohonan_id' => $id,
            'pemohon_id'    => $permohonan['pemohon_id'],
            'pesan'         => 'Draft akta permohonan ' . $kode . ' sedang direview oleh Notaris.',
            'dibaca'        => 0,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/staff/detail/' . $kode)
                         ->with('success', 'Draft akta berhasil dikirim ke Notaris untuk direview.');
    }
}