<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PermohonanModel;
use App\Models\DokumenModel;
use App\Models\UserModel;
use App\Models\JenisAktaModel;

class AdminController extends BaseController
{
    protected $permohonanModel;
    protected $dokumenModel;
    protected $userModel;
    protected $jenisAktaModel;
    protected $db;

    public function __construct()
    {
        $this->permohonanModel = new PermohonanModel();
        $this->dokumenModel    = new DokumenModel();
        $this->userModel       = new UserModel();
        $this->jenisAktaModel  = new JenisAktaModel();
        $this->db              = \Config\Database::connect();
    }

    // =====================
    // BERANDA ADMIN
    // =====================
    public function index()
    {
        $all = $this->permohonanModel
                    ->select('permohonan.*, jenis_akta.nama_akta, users.nama as nama_pemohon, users.no_hp')
                    ->join('jenis_akta', 'jenis_akta.id = permohonan.jenis_akta_id')
                    ->join('users', 'users.id = permohonan.pemohon_id')
                    ->orderBy('permohonan.tanggal_pengajuan', 'DESC')
                    ->findAll();

        $data = [
            'totalSemua'   => count($all),
            'totalMasuk'   => $this->permohonanModel->whereNotIn('status', ['Selesai'])->countAllResults(),
            'totalPengajuan'=> $this->permohonanModel->where('status', 'Pengajuan')->countAllResults(), // ← TAMBAH INI
            'totalProses'  => $this->permohonanModel->whereIn('status', ['Validasi Dokumen','Perhitungan Pajak','Draft Akta','Review Notaris'])->countAllResults(),
            'totalRevisi'  => $this->permohonanModel->where('status', 'Revisi')->countAllResults(),
            'totalSelesai' => $this->permohonanModel->where('status', 'Selesai')->countAllResults(),
            'semua'        => $all,
        ];

        return view('admin/dashboard', $data);
    }

    // =====================
    // PERMOHONAN MASUK
    // =====================
    public function permohonanMasuk()
    {
        $status        = $this->request->getGet('status');
        $jenis_akta_id = $this->request->getGet('jenis_akta_id');
        $kode          = $this->request->getGet('kode');

        $builder = $this->permohonanModel
                        ->select('permohonan.*, jenis_akta.nama_akta, users.nama as nama_pemohon, users.no_hp')
                        ->join('jenis_akta', 'jenis_akta.id = permohonan.jenis_akta_id')
                        ->join('users', 'users.id = permohonan.pemohon_id')
                        ->whereNotIn('permohonan.status', ['Selesai']);

        if ($status)        $builder->where('permohonan.status', $status);
        if ($jenis_akta_id) $builder->where('permohonan.jenis_akta_id', $jenis_akta_id);
        if ($kode)          $builder->where('permohonan.kode_unik', strtoupper($kode));

        $data = [
            'permohonan'   => $builder->orderBy('permohonan.tanggal_pengajuan', 'DESC')->findAll(),
            'jenisAkta'    => $this->jenisAktaModel->getAllForDropdown(),
            'filter_status'=> $status,
            'filter_jenis' => $jenis_akta_id,
            'filter_kode'  => $kode,
        ];

        return view('admin/permohonan_masuk', $data);
    }

    // =====================
    // PERMOHONAN SELESAI
    // =====================
    public function permohonanSelesai()
    {
        $data = [
            'permohonan' => $this->permohonanModel
                                 ->select('permohonan.*, jenis_akta.nama_akta, users.nama as nama_pemohon, users.no_hp')
                                 ->join('jenis_akta', 'jenis_akta.id = permohonan.jenis_akta_id')
                                 ->join('users', 'users.id = permohonan.pemohon_id')
                                 ->where('permohonan.status', 'Selesai')
                                 ->orderBy('permohonan.tanggal_pengajuan', 'DESC')
                                 ->findAll(),
        ];

        return view('admin/permohonan_selesai', $data);
    }

    // =====================
    // DETAIL PERMOHONAN
    // =====================
    public function detail($kode)
    {
        $permohonan = $this->permohonanModel->getByKodeUnik(strtoupper($kode));

        if (!$permohonan) {
            return redirect()->to('/admin/dashboard')
                             ->with('error', 'Permohonan tidak ditemukan.');
        }

        $dokumen    = $this->dokumenModel->getByPermohonan($permohonan['id']);
        $pemohon    = $this->userModel->find($permohonan['pemohon_id']);
        $auditTrail = $this->db->table('audit_trail')
                               ->where('permohonan_id', $permohonan['id'])
                               ->orderBy('waktu', 'DESC')
                               ->get()->getResultArray();
        $pembayaran = $this->db->table('pembayaran')
                               ->where('permohonan_id', $permohonan['id'])
                               ->get()->getRowArray();

        return view('admin/detail_permohonan', [
            'permohonan' => $permohonan,
            'dokumen'    => $dokumen,
            'pemohon'    => $pemohon,
            'auditTrail' => $auditTrail,
            'pembayaran' => $pembayaran,
        ]);
    }

    // =====================
    // UBAH STATUS
    // =====================
    public function ubahStatus($id)
    {
        $status_baru = $this->request->getPost('status');
        $catatan     = $this->request->getPost('catatan');
        $kode        = $this->request->getPost('kode_unik');

        $this->permohonanModel->update($id, ['status' => $status_baru]);

        // Audit trail
        $this->db->table('audit_trail')->insert([
            'user_id'       => session()->get('user_id'),
            'permohonan_id' => $id,
            'aktivitas'     => 'Mengubah status menjadi "' . $status_baru . '"' . ($catatan ? ' — ' . $catatan : ''),
            'waktu'         => date('Y-m-d H:i:s'),
        ]);

        // Notifikasi pemohon
        $permohonan = $this->permohonanModel->find($id);
        $this->db->table('notifikasi')->insert([
            'permohonan_id' => $id,
            'pemohon_id'    => $permohonan['pemohon_id'],
            'pesan'         => 'Status permohonan ' . $kode . ' diubah menjadi "' . $status_baru . '"',
            'dibaca'        => 0,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/admin/detail/' . $kode)
                         ->with('success', 'Status berhasil diubah menjadi "' . $status_baru . '"');
    }

    // =====================
    // VALIDASI DOKUMEN
    // =====================
    public function validasiDokumen($dokumen_id)
    {
        $status        = $this->request->getPost('status_validasi');
        $kode          = $this->request->getPost('kode_unik');
        $permohonan_id = $this->request->getPost('permohonan_id');

        $this->dokumenModel->update($dokumen_id, ['status_validasi' => $status]);

        if ($status === 'Revisi') {
            $this->permohonanModel->update($permohonan_id, ['status' => 'Revisi']);
            $permohonan = $this->permohonanModel->find($permohonan_id);
            $this->db->table('notifikasi')->insert([
                'permohonan_id' => $permohonan_id,
                'pemohon_id'    => $permohonan['pemohon_id'],
                'pesan'         => 'Dokumen pada permohonan ' . $kode . ' perlu dilengkapi.',
                'dibaca'        => 0,
                'created_at'    => date('Y-m-d H:i:s'),
            ]);
        }

        $this->db->table('audit_trail')->insert([
            'user_id'       => session()->get('user_id'),
            'permohonan_id' => $permohonan_id,
            'aktivitas'     => 'Menandai dokumen sebagai "' . $status . '" pada permohonan ' . $kode,
            'waktu'         => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/admin/detail/' . $kode)
                         ->with('success', 'Status dokumen diperbarui menjadi "' . $status . '"');
    }

    // =====================
    // HITUNG PAJAK
    // =====================
    public function hitungPajak($id)
    {
        $nilai   = $this->request->getPost('nilai_transaksi');
        $njop    = $this->request->getPost('njop');
        $kode    = $this->request->getPost('kode_unik');
        $dasar   = max((float)$nilai, (float)$njop);
        $npoptkp = 80000000;
        $bphtb   = max(0, ($dasar - $npoptkp) * 0.05);
        $pph     = $dasar * 0.025;

        // Simpan/update pembayaran
        $existing = $this->db->table('pembayaran')->where('permohonan_id', $id)->get()->getRowArray();
        if ($existing) {
            $this->db->table('pembayaran')->where('permohonan_id', $id)->update([
                'bphtb' => $bphtb, 'pph' => $pph, 'status_bayar' => 'Belum Lunas',
            ]);
        } else {
            $this->db->table('pembayaran')->insert([
                'permohonan_id' => $id, 'bphtb' => $bphtb, 'pph' => $pph, 'status_bayar' => 'Belum Lunas',
            ]);
        }

        $this->permohonanModel->update($id, [
            'nilai_transaksi' => $nilai,
            'status'          => 'Perhitungan Pajak',
        ]);

        $this->db->table('audit_trail')->insert([
            'user_id'       => session()->get('user_id'),
            'permohonan_id' => $id,
            'aktivitas'     => 'Menghitung pajak — BPHTB: Rp ' . number_format($bphtb, 0, ',', '.') . ', PPH: Rp ' . number_format($pph, 0, ',', '.'),
            'waktu'         => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/admin/detail/' . $kode)
                         ->with('success', 'Pajak dihitung — BPHTB: Rp ' . number_format($bphtb, 0, ',', '.') . ' | PPH: Rp ' . number_format($pph, 0, ',', '.'));
    }
    // =====================
// AUDIT TRAIL
// =====================
public function auditTrail()
{
    $logs = $this->db->table('audit_trail')
                     ->select('audit_trail.*, users.nama as nama_user')
                     ->join('users', 'users.id = audit_trail.user_id', 'left')
                     ->orderBy('audit_trail.waktu', 'DESC')
                     ->get()->getResultArray();

    return view('admin/audit_trail', ['logs' => $logs]);
}

// =====================
// MANAJEMEN USER
// =====================
public function users()
{
    $users = $this->userModel->findAll();
    return view('admin/users', ['users' => $users]);
}

// =====================
// PROFIL ADMIN
// =====================
public function profil()
{
    $user = $this->userModel->find(session()->get('user_id'));
    return view('admin/profil', ['user' => $user]);
}

public function updateProfil()
{
    $id = session()->get('user_id');
    $this->userModel->update($id, [
        'nama'  => $this->request->getPost('nama'),
        'no_hp' => $this->request->getPost('no_hp'),
    ]);
    session()->set('nama', $this->request->getPost('nama'));
    return redirect()->to('/admin/profil')
                     ->with('success', 'Profil berhasil diperbarui.');
}
}