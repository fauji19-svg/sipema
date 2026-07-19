<?php

namespace App\Controllers\Pemohon;

use App\Controllers\BaseController;
use App\Models\PermohonanModel;
use App\Models\JenisAktaModel;
use App\Models\DokumenModel;

class PermohonanController extends BaseController
{
    protected $permohonanModel;
    protected $jenisAktaModel;
    protected $dokumenModel;

    public function __construct()
    {
        $this->permohonanModel = new PermohonanModel();
        $this->jenisAktaModel  = new JenisAktaModel();
        $this->dokumenModel    = new DokumenModel();
        $this->db              = \Config\Database::connect();
    }

    // =====================
    // DASHBOARD PEMOHON
    // =====================
    public function index()
    {
        $pemohon_id = session()->get('user_id');

        $data = [
            'user'         => session()->get('nama'),
            'jenisAkta'    => $this->jenisAktaModel->getAllForDropdown(),
            'permohonan'   => $this->permohonanModel->getByPemohon($pemohon_id),
            'totalPengajuan' => $this->permohonanModel
                                ->where('pemohon_id', $pemohon_id)
                                ->countAllResults(),
            'totalProses'  => $this->permohonanModel
                                ->where('pemohon_id', $pemohon_id)
                                ->whereNotIn('status', ['Selesai'])
                                ->countAllResults(),
            'totalSelesai' => $this->permohonanModel
                                ->where('pemohon_id', $pemohon_id)
                                ->where('status', 'Selesai')
                                ->countAllResults(),
        ];

        return view('pemohon/dashboard', $data);
    }

    // =====================
    // GENERATE KODE UNIK (AJAX)
    // dipanggil saat klik "Lanjutkan" di modal
    // =====================
    public function generateKode()
    {
        $kode = $this->permohonanModel->generateKodeUnik();
        return $this->response->setJSON([
            'success' => true,
            'kode'    => $kode,
            'tanggal' => date('d F Y H:i:s'),
        ]);
    }

    // =====================
    // SIMPAN PERMOHONAN BARU
    // =====================
    public function store()
    {
        $pemohon_id = session()->get('user_id');

        $kode          = $this->request->getPost('kode_unik');
        // Kalau kode kosong (masuk dari sidebar langsung), generate di sini
        if (empty($kode)) {
        $kode = $this->permohonanModel->generateKodeUnik();
        }
        $jenis_akta_id = $this->request->getPost('jenis_akta_id');
        $nilai         = $this->request->getPost('nilai_transaksi');
        $nik           = $this->request->getPost('nik');
        $alamat        = $this->request->getPost('alamat');
        $alamat_objek  = $this->request->getPost('alamat_objek');

        // Simpan ke tabel permohonan
        $this->permohonanModel->insert([
            'kode_unik'         => $kode,
            'pemohon_id'        => $pemohon_id,
            'nik'               => $nik,
            'alamat'            => $alamat,
            'alamat_objek'      => $alamat_objek,
            'jenis_akta_id'     => $jenis_akta_id,
            'status'            => 'Pengajuan',
            'nilai_transaksi'   => str_replace(['.', ','], ['', '.'], $nilai),
            'tanggal_pengajuan' => date('Y-m-d H:i:s'),
        ]);

        $permohonan_id = $this->permohonanModel->getInsertID();

        // Handle upload dokumen
        $tipe_dokumen = [
            'ktp_penjual', 'ktp_istri_penjual', 'kk_penjual', 'npwp_penjual',
            'ktp_pembeli', 'kk_pembeli', 'npwp_pembeli',
            'buku_nikah_penjual', 'akta_lahir',
            'sppt_pbb', 'bukti_bayar_sppt', 'akta_kematian',
            'bukti_transaksi', 'bukti_kepemilikan',
            'surat_kuasa_waris', 'foto_lokasi',
            'dokumen_lainnya_1', 'dokumen_lainnya_2', 'dokumen_lainnya_3',
            'dokumen_lainnya_4', 'dokumen_lainnya_5'
        ];

        foreach ($tipe_dokumen as $tipe) {
            $file = $this->request->getFile($tipe);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/dokumen/', $newName);

                $this->dokumenModel->insert([
                    'permohonan_id'   => $permohonan_id,
                    'nama_file'       => $newName,
                    'tipe_dokumen'    => $tipe,
                    'status_validasi' => 'Menunggu',
                    'versi'           => 1,
                    'uploaded_at'     => date('Y-m-d H:i:s'),
                ]);
            }
        }

        return redirect()->to('/pemohon/dashboard')
                         ->with('success', 'Permohonan berhasil dikirim! Kode: ' . $kode);
    }

    // =====================
    // TRACKING BERKAS
    // =====================
    public function tracking($kode = null)
    {
        if (!$kode) {
            $kode = $this->request->getGet('kode');
        }

        $permohonan = null;
        $dokumen    = [];

        if ($kode) {
            $permohonan = $this->permohonanModel->getByKodeUnik(strtoupper($kode));
            if ($permohonan) {
                $dokumen = $this->dokumenModel->getByPermohonan($permohonan['id']);
            }
        }

        return view('pemohon/tracking', [
            'permohonan' => $permohonan,
            'dokumen'    => $dokumen,
            'kode'       => $kode,
        ]);
    }

    // =====================
    // RIWAYAT PERMOHONAN
    // =====================
    public function riwayat()
    {
        $pemohon_id    = session()->get('user_id');
        $jenis_akta_id = $this->request->getGet('jenis_akta_id');
        $kode          = $this->request->getGet('kode');

        $data = [
            'jenisAkta'  => $this->jenisAktaModel->getAllForDropdown(),
            'permohonan' => $this->permohonanModel
                                 ->getByPemohonFiltered($pemohon_id, $jenis_akta_id, $kode),
            'filter_jenis' => $jenis_akta_id,
            'filter_kode'  => $kode,
        ];

        return view('pemohon/riwayat', $data);
    }

    // =====================
// DETAIL PERMOHONAN
// =====================
public function detail($kode)
{
    $pemohon_id = session()->get('user_id');
    $permohonan = $this->permohonanModel->getByKodeUnik(strtoupper($kode));

    // Pastikan permohonan milik pemohon yang login
    if (!$permohonan || $permohonan['pemohon_id'] != $pemohon_id) {
        return redirect()->to('/pemohon/dashboard')
                         ->with('error', 'Permohonan tidak ditemukan.');
    }

    $dokumen = $this->dokumenModel->getByPermohonan($permohonan['id']);
     // Ambil hasil hitungan pajak dari Admin (jika sudah dihitung)
    $pembayaran = db_connect()->table('pembayaran')
                              ->where('permohonan_id', $permohonan['id'])
                              ->get()->getRowArray();

    return view('pemohon/detail', [
        'permohonan' => $permohonan,
        'dokumen'    => $dokumen,
        'pembayaran' => $pembayaran,
    ]);
}
// =====================
// NOTIFIKASI
// =====================
public function notifikasi()
{
    $pemohon_id  = session()->get('user_id');
    $notifikasi  = $this->db->table('notifikasi')
                            ->where('pemohon_id', $pemohon_id)
                            ->orderBy('created_at', 'DESC')
                            ->get()->getResultArray();

    return view('pemohon/notifikasi', [
        'notifikasi' => $notifikasi,
    ]);
}

// =====================
// PROFIL
// =====================
public function profil()
{
    $userModel = new \App\Models\UserModel();
    $user      = $userModel->find(session()->get('user_id'));

    return view('pemohon/profil', ['user' => $user]);
}

public function updateProfil()
{
    $userModel = new \App\Models\UserModel();
    $id        = session()->get('user_id');

    $userModel->update($id, [
        'nama'  => $this->request->getPost('nama'),
        'no_hp' => $this->request->getPost('no_hp'),
    ]);

    // Update session nama
    session()->set('nama', $this->request->getPost('nama'));
    session()->set('no_hp', $this->request->getPost('no_hp'));

    return redirect()->to('/pemohon/profil')
                     ->with('success', 'Profil berhasil diperbarui.');
}

// =====================
// PANDUAN
// =====================
public function panduan()
{
    return view('pemohon/panduan');
}
}
