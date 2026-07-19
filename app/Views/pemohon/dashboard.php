<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Pemohon — SIPEMA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root { --navy:#1B2A4A; --gold:#C9A84C; --cream:#F7F5F0; }
body { background:var(--cream); font-family:'Segoe UI',sans-serif; }
.sidebar { width:220px; background:var(--navy); min-height:100vh; position:fixed; top:0; left:0; }
.sidebar-brand { padding:20px; border-bottom:1px solid rgba(255,255,255,0.08); }
.sidebar-brand .brand { color:var(--gold); font-size:18px; font-weight:700; }
.sidebar-brand .sub { color:rgba(255,255,255,0.4); font-size:11px; }
.sidebar-user { padding:14px 20px; border-bottom:1px solid rgba(255,255,255,0.08); display:flex; align-items:center; gap:10px; }
.avatar { width:36px; height:36px; background:var(--gold); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:700; color:var(--navy); font-size:14px; }
.user-name { color:#fff; font-size:13px; font-weight:600; }
.user-role { color:rgba(255,255,255,0.4); font-size:11px; }
.nav-label { color:rgba(255,255,255,0.3); font-size:10px; font-weight:700; letter-spacing:1px; text-transform:uppercase; padding:12px 20px 4px; }
.nav-link-item { display:flex; align-items:center; gap:10px; padding:9px 20px; color:rgba(255,255,255,0.65); font-size:13px; text-decoration:none; border-left:3px solid transparent; transition:all .15s; }
.nav-link-item:hover { background:rgba(255,255,255,0.06); color:#fff; }
.nav-link-item.active { background:rgba(201,168,76,0.12); color:var(--gold); border-left-color:var(--gold); font-weight:600; }
.nav-link-item i { font-size:15px; width:18px; }
.nav-parent { display:flex; align-items:center; gap:10px; padding:9px 20px; color:rgba(255,255,255,0.65); font-size:13px; cursor:pointer; border:none; background:none; width:100%; }
.nav-parent:hover { background:rgba(255,255,255,0.06); color:#fff; }
.nav-parent i.main { font-size:15px; width:18px; }
.nav-parent .chev { margin-left:auto; font-size:12px; transition:transform .2s; }
.nav-parent.open .chev { transform:rotate(180deg); }
.submenu { display:none; background:rgba(0,0,0,0.15); }
.submenu.open { display:block; }
.submenu a { display:flex; align-items:center; gap:8px; padding:8px 20px 8px 36px; color:rgba(255,255,255,0.55); font-size:12.5px; text-decoration:none; border-left:3px solid transparent; }
.submenu a:hover { color:#fff; background:rgba(255,255,255,0.05); }
.submenu a.active { color:var(--gold); border-left-color:var(--gold); font-weight:600; }
.main-content { margin-left:220px; padding:24px; }
.topbar { background:#fff; border-bottom:1px solid #e5e0d8; padding:12px 24px; display:flex; align-items:center; justify-content:space-between; margin-left:220px; position:sticky; top:0; z-index:50; }
.topbar-title { font-size:15px; font-weight:700; color:var(--navy); }
.stat-card { background:#fff; border:1px solid #e5e0d8; border-top:3px solid var(--navy); border-radius:4px; padding:16px; }
.stat-card.gold { border-top-color:var(--gold); }
.stat-card.green { border-top-color:#2D7A4F; }
.stat-num { font-size:28px; font-weight:800; color:var(--navy); }
.stat-label { font-size:11px; color:#666; text-transform:uppercase; letter-spacing:.5px; margin-top:4px; }
.section-card { background:#fff; border:1px solid #e5e0d8; border-radius:4px; overflow:visible; margin-bottom:16px; }
.section-header { background:var(--navy); color:#fff; padding:10px 16px; display:flex; align-items:center; justify-content:space-between; }
.section-header h6 { margin:0; font-size:13px; font-weight:700; }
table.main-table { width:100%; border-collapse:collapse; font-size:12.5px; }
table.main-table thead th { background:#3D5080; color:#fff; padding:8px 12px; text-align:left; font-size:11.5px; font-weight:700; }
table.main-table tbody td { padding:10px 12px; border-bottom:1px solid #eee; vertical-align:middle; }
table.main-table tbody tr:hover { background:#f5f8ff; }
.kode-chip { font-family:monospace; font-weight:800; font-size:12px; color:var(--navy); background:#EEF3FF; padding:3px 8px; border:1px solid #c7d7f5; border-radius:2px; letter-spacing:1.5px; }
.badge-pengajuan { background:#dbeafe; color:#1d4ed8; padding:3px 9px; border-radius:2px; font-size:11px; font-weight:700; }
.badge-validasi { background:#fef3c7; color:#92400e; padding:3px 9px; border-radius:2px; font-size:11px; font-weight:700; }
.badge-proses { background:#dcfce7; color:#166534; padding:3px 9px; border-radius:2px; font-size:11px; font-weight:700; }
.badge-revisi { background:#fee2e2; color:#991b1b; padding:3px 9px; border-radius:2px; font-size:11px; font-weight:700; }
.badge-selesai { background:#d1fae5; color:#065f46; padding:3px 9px; border-radius:2px; font-size:11px; font-weight:700; }
.btn-navy { background:var(--navy); color:#fff; border:none; padding:7px 16px; font-size:12px; font-weight:600; border-radius:3px; cursor:pointer; display:inline-flex; align-items:center; gap:6px; }
.btn-gold { background:var(--gold); color:var(--navy); border:none; padding:7px 16px; font-size:12px; font-weight:700; border-radius:3px; cursor:pointer; display:inline-flex; align-items:center; gap:6px; }
.tracking-bar { background:#fff; border:1px solid #e5e0d8; border-radius:4px; padding:12px 16px; margin-bottom:14px; display:flex; align-items:center; gap:12px; }
.tracking-bar label { font-size:12.5px; font-weight:700; color:var(--navy); white-space:nowrap; }
.tracking-input { border:1px solid #ccc; padding:7px 12px; font-size:13px; font-family:monospace; font-weight:700; letter-spacing:2px; border-radius:2px; width:160px; }
.action-wrap { position:relative; display:inline-block; }
.btn-dots { background:#fff; border:1px solid #ccc; border-radius:2px; width:30px; height:28px; display:flex; align-items:center; justify-content:center; cursor:pointer; font-size:16px; color:#666; font-weight:700; }
.btn-dots:hover { border-color:var(--navy); color:var(--navy); }
.dropdown-box { display:none; position:fixed; background:#fff; border:1px solid #ddd; box-shadow:0 4px 12px rgba(0,0,0,0.12); z-index:9000; min-width:170px; border-radius:2px; }
.dropdown-box.open { display:block; }
.dropdown-box a { display:flex; align-items:center; gap:8px; padding:9px 14px; font-size:12.5px; color:#333; text-decoration:none; border-bottom:1px solid #eee; }
.dropdown-box a:last-child { border-bottom:none; }
.dropdown-box a:hover { background:#f0f4ff; color:var(--navy); }
.dropdown-box a i { color:#666; }
.modal-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center; }
.modal-overlay.open { display:flex; }
.modal-box { background:#fff; width:440px; border-radius:4px; overflow:hidden; box-shadow:0 8px 32px rgba(0,0,0,0.2); }
.modal-header { background:var(--navy); color:#fff; padding:12px 16px; display:flex; align-items:center; justify-content:space-between; }
.modal-header h6 { margin:0; font-size:14px; font-weight:700; }
.modal-close { background:none; border:none; color:rgba(255,255,255,0.6); font-size:20px; cursor:pointer; line-height:1; }
.modal-body { padding:18px 16px; }
.modal-footer { padding:10px 16px; border-top:1px solid #eee; background:#fafafa; display:flex; gap:8px; justify-content:flex-end; }
.kode-big { font-family:monospace; font-size:30px; font-weight:900; color:var(--navy); letter-spacing:6px; display:block; text-align:center; padding:10px 0; }
.kode-info-box { background:#fffbf0; border:1px solid #f0d68a; border-radius:3px; padding:14px; margin-bottom:12px; }
.btn-success { background:#2D7A4F; color:#fff; border:none; padding:7px 16px; font-size:12px; font-weight:600; border-radius:3px; cursor:pointer; display:inline-flex; align-items:center; gap:6px; }
.btn-outline { background:#fff; color:var(--navy); border:1px solid #ccc; padding:7px 16px; font-size:12px; font-weight:600; border-radius:3px; cursor:pointer; display:inline-flex; align-items:center; gap:6px; }
.alert-success-custom { background:#d1fae5; border:1px solid #6ee7b7; color:#065f46; padding:10px 16px; border-radius:3px; margin-bottom:14px; font-size:13px; }
.alert-sidebar-footer { padding:16px 20px; border-top:1px solid rgba(255,255,255,0.08); margin-top:auto; position:absolute; bottom:0; left:0; right:0; }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-brand">
    <div class="brand">🏛️ SIPEMA</div>
    <div class="sub">Kantor PPAT Eliana, S.H., M.Kn</div>
  </div>
  <div class="sidebar-user">
    <div class="avatar"><?= strtoupper(substr(session()->get('nama'), 0, 2)) ?></div>
    <div>
      <div class="user-name"><?= esc(session()->get('nama')) ?></div>
      <div class="user-role">Pemohon</div>
    </div>
  </div>
  <nav>
    <div class="nav-label">Menu Utama</div>
    <a href="/pemohon/dashboard" class="nav-link-item active"><i class="bi bi-house-door"></i> Beranda</a>

    <!-- AJUKAN PERMOHONAN SUBMENU -->
    <button class="nav-parent" id="parent-ajukan" onclick="toggleSubmenu()">
      <i class="bi bi-file-earmark-plus main"></i>
      Ajukan Permohonan
      <i class="bi bi-chevron-down chev"></i>
    </button>
    <div class="submenu" id="submenu-ajukan">
      <?php foreach ($jenisAkta as $ja): ?>
      <a href="#" onclick="pilihJenis(<?= $ja['id'] ?>, '<?= esc($ja['nama_akta']) ?>', this); return false;">
        <i class="bi bi-dot"></i><?= esc($ja['nama_akta']) ?>
      </a>
      <?php endforeach; ?>
    </div>

    <a href="/pemohon/riwayat" class="nav-link-item"><i class="bi bi-clock-history"></i> Riwayat Permohonan</a>
    <div class="nav-label">Informasi</div>
    <a href="/pemohon/notifikasi" class="nav-link-item"><i class="bi bi-bell"></i> Notifikasi</a>
    <a href="/pemohon/profil" class="nav-link-item"><i class="bi bi-person-circle"></i> Profil Saya</a>
    <a href="/pemohon/panduan" class="nav-link-item"><i class="bi bi-question-circle"></i> Panduan</a>
    <a href="/logout" class="nav-link-item" style="position:absolute; bottom:0; left:0; right:0; border-top:1px solid rgba(255,255,255,0.08);">
      <i class="bi bi-box-arrow-left"></i> Keluar
    </a>
  </nav>
</aside>

<!-- TOPBAR -->
<div class="topbar">
  <div class="topbar-title" id="page-title">Beranda</div>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">

  <?php if (session()->getFlashdata('success')): ?>
  <div class="alert-success-custom">
    <i class="bi bi-check-circle-fill"></i> <?= session()->getFlashdata('success') ?>
  </div>
  <?php endif; ?>

  <!-- STAT CARDS -->
  <div class="row g-3 mb-3">
    <div class="col-md-4">
      <div class="stat-card">
        <div class="stat-num"><?= $totalPengajuan ?></div>
        <div class="stat-label">Total Permohonan</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card gold">
        <div class="stat-num"><?= $totalProses ?></div>
        <div class="stat-label">Sedang Diproses</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card green">
        <div class="stat-num"><?= $totalSelesai ?></div>
        <div class="stat-label">Selesai</div>
      </div>
    </div>
  </div>

  <!-- TRACKING BAR -->
  <div class="tracking-bar">
    <i class="bi bi-search" style="color:var(--navy); font-size:16px;"></i>
    <label>Lacak Status Berkas :</label>
    <input type="text" class="tracking-input" id="kode-lacak" placeholder="Contoh: ABG56UZ" maxlength="7" style="text-transform:uppercase;">
    <button class="btn-navy" onclick="lacakBerkas()"><i class="bi bi-search"></i> Cari</button>
  </div>

  <!-- TABEL PERMOHONAN TERBARU -->
  <div class="section-card">
    <div class="section-header">
      <h6><i class="bi bi-file-earmark-text" style="color:var(--gold); margin-right:6px;"></i>Permohonan Terbaru</h6>
        <button class="btn-gold btn-sm" onclick="openModal1()">
            <i class="bi bi-plus"></i> Ajukan Baru
        </button>
    </div>
    <table class="main-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Unik</th>
          <th>Jenis Akta</th>
          <th>Tgl Pengajuan</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($permohonan)): ?>
        <tr>
          <td colspan="6" style="text-align:center; padding:28px; color:#999;">
            <i class="bi bi-inbox" style="font-size:28px; display:block; margin-bottom:8px;"></i>
            Belum ada permohonan. Klik <strong>Ajukan Baru</strong> untuk memulai.
          </td>
        </tr>
        <?php else: ?>
        <?php foreach ($permohonan as $i => $p): ?>
        <tr>
          <td style="text-align:center;"><?= $i + 1 ?></td>
          <td><span class="kode-chip"><?= esc($p['kode_unik']) ?></span></td>
          <td><?= esc($p['nama_akta']) ?></td>
          <td><?= date('d/m/Y', strtotime($p['tanggal_pengajuan'])) ?></td>
          <td>
            <?php
            $status = $p['status'];
            $badgeClass = match($status) {
              'Pengajuan'        => 'badge-pengajuan',
              'Validasi Dokumen' => 'badge-validasi',
              'Revisi'           => 'badge-revisi',
              'Selesai'          => 'badge-selesai',
              default            => 'badge-proses',
            };
            ?>
            <span class="<?= $badgeClass ?>">● <?= esc($status) ?></span>
          </td>
          <td>
            <div class="action-wrap">
              <button class="btn-dots" onclick="toggleDrop(this)">···</button>
              <div class="dropdown-box">
                <a href="/pemohon/tracking/<?= esc($p['kode_unik']) ?>"><i class="bi bi-search"></i> Tracking Berkas</a>
                <a href="/pemohon/detail/<?= esc($p['kode_unik']) ?>">
                    <i class="bi bi-eye"></i> Lihat Detail
                </a>
                <a href="#"><i class="bi bi-download"></i> Download Tanda Terima</a>
              </div>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div><!-- end main-content -->

<!-- MODAL 1: Konfirmasi -->
<div class="modal-overlay" id="modal1">
  <div class="modal-box">
    <div class="modal-header">
      <h6>Info Permohonan</h6>
      <button class="modal-close" onclick="closeModal1()">×</button>
    </div>
    <div class="modal-body">
    <p style="font-size:13px; margin:0;">Apakah Anda akan melakukan pengajuan permohonan <strong id="modal1-jenis-text">akta baru</strong> ke <strong>Kantor PPAT Eliana, S.H., M.Kn</strong>?</p>
    </div>
    <div class="modal-footer">
      <button class="btn-success" onclick="lanjutkan()"><i class="bi bi-check2"></i> Lanjutkan</button>
      <button class="btn-outline" onclick="closeModal1()"><i class="bi bi-x"></i> Batal</button>
    </div>
  </div>
</div>

<!-- MODAL 2: Kode Unik -->
<div class="modal-overlay" id="modal2">
  <div class="modal-box">
    <div class="modal-header" style="background:#2D7A4F;">
      <h6>Informasi</h6>
      <button class="modal-close" onclick="closeModal2()">×</button>
    </div>
    <div class="modal-body">
      <p style="font-size:13px; margin-bottom:14px;">Anda berhasil memulai pengajuan permohonan baru. Catat kode unik berikut:</p>
      <div class="kode-info-box">
        <div style="font-size:11px; font-weight:700; color:#92400e; text-transform:uppercase; letter-spacing:.5px; margin-bottom:8px;">Kode Unik Permohonan</div>
        <span class="kode-big" id="kode-display">—</span>
        <div style="text-align:center; font-size:12px; color:#666; margin-top:4px;">Tanggal: <strong id="tgl-display">—</strong></div>
        <div style="text-align:center; font-size:11px; color:#999; margin-top:6px;">Kode ini akan dikirim ke WhatsApp Anda</div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn-navy" onclick="lengkapi()"><i class="bi bi-pencil-square"></i> Lengkapi Permohonan</button>
    </div>
  </div>
</div>

<!-- MODAL 3: FORM PENGAJUAN -->
<div class="modal-overlay" id="modal3" style="align-items:flex-start; padding-top:40px; overflow-y:auto;">
  <div class="modal-box" style="width:680px; max-width:95vw;">
    <div class="modal-header">
      <h6 id="form-title">Form Pengajuan — <span id="form-jenis-label">Akta Jual Beli</span></h6>
      <button class="modal-close" onclick="closeModal3()">×</button>
    </div>
    <form action="/pemohon/store" method="POST" enctype="multipart/form-data">
      <?= csrf_field() ?>
      <input type="hidden" name="kode_unik" id="form-kode">
      <input type="hidden" name="jenis_akta_id" id="form-jenis-id">

      <div class="modal-body" style="max-height:70vh; overflow-y:auto;">

        <!-- DATA DIRI -->
        <div style="font-weight:700; color:var(--navy); font-size:13px; margin-bottom:12px; padding-bottom:8px; border-bottom:2px solid var(--gold);">1. Data Diri Pemohon</div>
        <div class="row g-2 mb-3">
          <div class="col-md-6">
            <label style="font-size:12px; font-weight:600;">Nama Lengkap *</label>
            <input type="text" name="nama" class="form-control form-control-sm" value="<?= esc(session()->get('nama')) ?>" required>
          </div>
          <div class="col-md-6">
            <label style="font-size:12px; font-weight:600;">NIK *</label>
            <input type="text" name="nik" class="form-control form-control-sm" maxlength="16" required>
          </div>
          <div class="col-md-6">
            <label style="font-size:12px; font-weight:600;">No. HP / WhatsApp *</label>
            <input type="text" name="no_hp" class="form-control form-control-sm" value="<?= esc(session()->get('no_hp')) ?>">
            <small class="text-muted">Notifikasi status dikirim ke nomor ini</small>
          </div>
          <div class="col-md-6">
            <label style="font-size:12px; font-weight:600;">Nilai Transaksi (Rp)</label>
            <input type="text" name="nilai_transaksi" class="form-control form-control-sm" placeholder="Contoh: 800000000">
            <small class="text-muted">Untuk hitung BPHTB & PPH otomatis</small>
          </div>
          <div class="col-12">
            <label style="font-size:12px; font-weight:600;">Alamat Lengkap *</label>
            <textarea name="alamat" class="form-control form-control-sm" rows="2" required></textarea>
          </div>
          <div class="col-12">
            <label style="font-size:12px; font-weight:600;">Alamat Objek Tanah/Bangunan *</label>
            <textarea name="alamat_objek" class="form-control form-control-sm" rows="2" required></textarea>
          </div>
        </div>

        <!-- UPLOAD DOKUMEN -->
        <div style="font-weight:700; color:var(--navy); font-size:13px; margin-bottom:12px; padding-bottom:8px; border-bottom:2px solid var(--gold);">2. Upload Dokumen Persyaratan</div>
        <div style="background:#fffbf0; border:1px solid #f0d68a; border-radius:3px; padding:8px 12px; margin-bottom:12px; font-size:12px; color:#7a5c00;">
          <i class="bi bi-info-circle"></i> Upload dokumen yang tersedia. Format: PDF, JPG, PNG. Maks 5MB/file.
        </div>
        <table style="width:100%; border-collapse:collapse; font-size:12.5px;">
          <?php
          $dokumen_list = [
            'ktp_penjual'            => 'Ktp Penjual',
            'ktp_istri_penjual'      => 'Ktp istri Penjual',
            'kk_penjual'             => 'Kartu Keluarga Penjual (KK)',
            'npwp_penjual'           => 'Npwp Penjual',
            'ktp_pembeli'            => 'Ktp Pembeli',
            'kk_pembeli'             => 'Kartu Keluarga Pembeli (KK)',
            'npwp_pembeli'           => 'Npwp Pembeli',
            'buku_nikah_penjual'     => 'Buku Nikah Penjual',
            'akta_lahir'             => 'Akta Lahir',
            'sppt_pbb'               => 'SPPT/PBB',
            'bukti_bayar_sppt'       => 'Bukti Bayar SPPT/PBB',
            'akta_kematian'          => 'Akta Kematian',
            'bukti_transaksi'        => 'Bukti Transaksi',
            'bukti_kepemilikan'      => 'Sertipikat/AJB/C Desa Girik',
            'surat_kuasa_waris'      => 'Surat Kuasa Waris',
            'foto_lokasi'            => 'Foto Lokasi Tanah',
            'dokumen_lainnya_1'      => 'Dokumen Pendukung Lainnya',
            'dokumen_lainnya_2'      => 'Dokumen Pendukung Lainnya',
            'dokumen_lainnya_3'      => 'Dokumen Pendukung Lainnya',
            'dokumen_lainnya_4'      => 'Dokumen Pendukung Lainnya',
            'dokumen_lainnya_5'      => 'Dokumen Pendukung Lainnya',
          ];
          foreach ($dokumen_list as $field => $label): ?>
          <tr style="border-bottom:1px solid #eee;">
            <td style="padding:7px 8px; font-weight:600; width:280px;"><?= $label ?></td>
            <td style="padding:7px 8px;">
              <input type="file" name="<?= $field ?>" class="form-control form-control-sm" accept=".pdf,.jpg,.jpeg,.png">
            </td>
          </tr>
          <?php endforeach; ?>
        </table>

      </div>
      <div class="modal-footer">
        <button class="btn-outline" type="button" onclick="closeModal3()"><i class="bi bi-x"></i> Batal</button>
        <button class="btn-success" type="submit"><i class="bi bi-send"></i> Kirim Permohonan</button>
      </div>
    </form>
  </div>
</div>

<script>
let currentKode = '';
let selectedJenisId = '';
let selectedJenisNama = '';

function toggleSubmenu() {
  document.getElementById('parent-ajukan').classList.toggle('open');
  document.getElementById('submenu-ajukan').classList.toggle('open');
}

function pilihJenis(id, nama, el) {
  document.querySelectorAll('.submenu a').forEach(a => a.classList.remove('active'));
  el.classList.add('active');
  selectedJenisId   = id;
  selectedJenisNama = nama;
  // Hanya update judul dan jenis — tidak buka modal apapun
  document.getElementById('form-jenis-id').value           = id;
  document.getElementById('form-jenis-label').textContent  = nama;
}

function openModal1() {
  document.getElementById('modal1-jenis-text').textContent = selectedJenisNama || 'akta baru';
  document.getElementById('modal1').classList.add('open');
}
function closeModal1() {
  document.getElementById('modal1').classList.remove('open');
}

function lanjutkan() {
  closeModal1();
  // Ambil kode dari server via AJAX
  fetch('/pemohon/generate-kode')
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        currentKode = data.kode;
        document.getElementById('kode-display').textContent = data.kode;
        document.getElementById('tgl-display').textContent  = data.tanggal;
        document.getElementById('modal2').classList.add('open');
      }
    });
}
function closeModal2() {
  document.getElementById('modal2').classList.remove('open');
}

function lengkapi() {
  closeModal2();
  document.getElementById('form-kode').value       = currentKode;
  document.getElementById('form-jenis-id').value   = selectedJenisId;
  document.getElementById('form-jenis-label').textContent = selectedJenisNama || 'Permohonan';
  document.getElementById('modal3').classList.add('open');
}
function closeModal3() {
  document.getElementById('modal3').classList.remove('open');
}

function lacakBerkas() {
  const kode = document.getElementById('kode-lacak').value.toUpperCase();
  if (kode.length < 5) { alert('Masukkan kode unik yang valid'); return; }
  window.location.href = '/pemohon/tracking/' + kode;
}

function toggleDrop(btn) {
  closeAllDropdowns();
  const menu = btn.nextElementSibling;
  const rect = btn.getBoundingClientRect();
  menu.style.top  = (rect.bottom + window.scrollY + 4) + 'px';
  menu.style.left = (rect.right + window.scrollX - 170) + 'px';
  menu.classList.toggle('open');
  event.stopPropagation();
}
function closeAllDropdowns() {
  document.querySelectorAll('.dropdown-box').forEach(m => m.classList.remove('open'));
}
document.addEventListener('click', closeAllDropdowns);
</script>
</body>
</html>