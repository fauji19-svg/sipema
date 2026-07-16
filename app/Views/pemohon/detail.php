<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Permohonan — SIPEMA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root{--navy:#1B2A4A;--gold:#C9A84C;--cream:#F7F5F0;--success:#2D7A4F;}
body{background:var(--cream);font-family:'Segoe UI',sans-serif;}
.sidebar{width:220px;background:var(--navy);min-height:100vh;position:fixed;top:0;left:0;}
.sidebar-brand{padding:20px;border-bottom:1px solid rgba(255,255,255,0.08);}
.sidebar-brand .brand{color:var(--gold);font-size:18px;font-weight:700;}
.sidebar-brand .sub{color:rgba(255,255,255,0.4);font-size:11px;}
.sidebar-user{padding:14px 20px;border-bottom:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;gap:10px;}
.avatar{width:36px;height:36px;background:var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;color:var(--navy);font-size:14px;}
.user-name{color:#fff;font-size:13px;font-weight:600;}
.user-role{color:rgba(255,255,255,0.4);font-size:11px;}
.nav-label{color:rgba(255,255,255,0.3);font-size:10px;font-weight:700;letter-spacing:1px;text-transform:uppercase;padding:12px 20px 4px;}
.nav-link-item{display:flex;align-items:center;gap:10px;padding:9px 20px;color:rgba(255,255,255,0.65);font-size:13px;text-decoration:none;border-left:3px solid transparent;transition:all .15s;}
.nav-link-item:hover{background:rgba(255,255,255,0.06);color:#fff;}
.nav-link-item.active{background:rgba(201,168,76,0.12);color:var(--gold);border-left-color:var(--gold);font-weight:600;}
.nav-link-item i{font-size:15px;width:18px;}
.main-content{margin-left:220px;padding:24px;}
.topbar{background:#fff;border-bottom:1px solid #e5e0d8;padding:12px 24px;margin-left:220px;position:sticky;top:0;z-index:50;display:flex;align-items:center;gap:12px;}
.topbar-title{font-size:15px;font-weight:700;color:var(--navy);}
.section-card{background:#fff;border:1px solid #e5e0d8;border-radius:4px;overflow:hidden;margin-bottom:16px;}
.section-header{background:var(--navy);color:#fff;padding:10px 16px;display:flex;align-items:center;justify-content:space-between;}
.section-header h6{margin:0;font-size:13px;font-weight:700;}
.detail-row{display:grid;grid-template-columns:180px 1fr;padding:10px 16px;border-bottom:1px solid #eee;font-size:13px;}
.detail-row:last-child{border-bottom:none;}
.detail-label{color:#666;font-weight:600;}
.detail-value{color:#222;font-weight:600;}
.kode-chip{font-family:monospace;font-weight:800;font-size:14px;color:var(--navy);background:#EEF3FF;padding:4px 10px;border:1px solid #c7d7f5;border-radius:2px;letter-spacing:2px;}
.badge-pengajuan{background:#dbeafe;color:#1d4ed8;padding:4px 10px;border-radius:2px;font-size:12px;font-weight:700;}
.badge-validasi{background:#fef3c7;color:#92400e;padding:4px 10px;border-radius:2px;font-size:12px;font-weight:700;}
.badge-proses{background:#dcfce7;color:#166534;padding:4px 10px;border-radius:2px;font-size:12px;font-weight:700;}
.badge-revisi{background:#fee2e2;color:#991b1b;padding:4px 10px;border-radius:2px;font-size:12px;font-weight:700;}
.badge-selesai{background:#d1fae5;color:#065f46;padding:4px 10px;border-radius:2px;font-size:12px;font-weight:700;}
.btn-navy{background:var(--navy);color:#fff;border:none;padding:7px 16px;font-size:12px;font-weight:600;border-radius:3px;text-decoration:none;display:inline-flex;align-items:center;gap:6px;}
.btn-outline{background:#fff;color:var(--navy);border:1px solid #ccc;padding:7px 16px;font-size:12px;font-weight:600;border-radius:3px;text-decoration:none;display:inline-flex;align-items:center;gap:6px;}
.btn-danger{background:#c0392b;color:#fff;border:none;padding:7px 16px;font-size:12px;font-weight:600;border-radius:3px;text-decoration:none;display:inline-flex;align-items:center;gap:6px;}
table.doc-table{width:100%;border-collapse:collapse;font-size:12.5px;}
table.doc-table thead th{background:#3D5080;color:#fff;padding:8px 12px;text-align:left;font-size:11.5px;font-weight:700;}
table.doc-table tbody td{padding:10px 12px;border-bottom:1px solid #eee;vertical-align:middle;}
table.doc-table tbody tr:hover{background:#f5f8ff;}
.status-menunggu{background:#fef3c7;color:#92400e;padding:3px 8px;border-radius:2px;font-size:11px;font-weight:700;}
.status-valid{background:#d1fae5;color:#065f46;padding:3px 8px;border-radius:2px;font-size:11px;font-weight:700;}
.status-revisi{background:#fee2e2;color:#991b1b;padding:3px 8px;border-radius:2px;font-size:11px;font-weight:700;}
.alert-revisi{background:#fff5f5;border:1px solid #fca5a5;border-left:4px solid #c0392b;border-radius:3px;padding:12px 16px;margin-bottom:16px;font-size:13px;color:#991b1b;}
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
    <a href="/pemohon/dashboard" class="nav-link-item"><i class="bi bi-house-door"></i> Beranda</a>
    <a href="/pemohon/dashboard" class="nav-link-item"><i class="bi bi-file-earmark-plus"></i> Ajukan Permohonan</a>
    <a href="/pemohon/riwayat" class="nav-link-item active"><i class="bi bi-clock-history"></i> Riwayat Permohonan</a>
    <div class="nav-label">Informasi</div>
    <a href="/pemohon/notifikasi" class="nav-link-item"><i class="bi bi-bell"></i> Notifikasi</a>
    <a href="/pemohon/profil" class="nav-link-item"><i class="bi bi-person-circle"></i> Profil Saya</a>
    <a href="/pemohon/panduan" class="nav-link-item"><i class="bi bi-question-circle"></i> Panduan</a>
    <a href="/logout" class="nav-link-item" style="position:absolute;bottom:0;left:0;right:0;border-top:1px solid rgba(255,255,255,0.08);">
      <i class="bi bi-box-arrow-left"></i> Keluar
    </a>
  </nav>
</aside>

<!-- TOPBAR -->
<div class="topbar">
  <a href="/pemohon/riwayat" class="btn-outline"><i class="bi bi-arrow-left"></i> Kembali</a>
  <div class="topbar-title">Detail Permohonan — <span class="kode-chip"><?= esc($permohonan['kode_unik']) ?></span></div>
</div>

<!-- MAIN -->
<div class="main-content">

  <?php if ($permohonan['status'] === 'Revisi'): ?>
  <div class="alert-revisi">
    <strong>Dokumen Perlu Dilengkapi!</strong> Admin meminta Anda untuk mengunggah ulang dokumen yang ditandai "Revisi" di bawah. Segera lengkapi agar proses dapat dilanjutkan.
  </div>
  <?php endif; ?>

  <div class="row g-3">

    <!-- DETAIL INFO -->
    <div class="col-md-5">
      <div class="section-card">
        <div class="section-header">
          <h6>Informasi Permohonan</h6>
        </div>
        <div class="detail-row">
          <span class="detail-label">Kode Unik</span>
          <span class="detail-value"><span class="kode-chip"><?= esc($permohonan['kode_unik']) ?></span></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Jenis Akta</span>
          <span class="detail-value"><?= esc($permohonan['nama_akta']) ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Tanggal Pengajuan</span>
          <span class="detail-value"><?= date('d/m/Y H:i', strtotime($permohonan['tanggal_pengajuan'])) ?> WIB</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Nilai Transaksi</span>
          <span class="detail-value">
            <?= $permohonan['nilai_transaksi']
                ? 'Rp ' . number_format($permohonan['nilai_transaksi'], 0, ',', '.')
                : '-' ?>
          </span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Status</span>
          <span class="detail-value">
            <?php
            $badgeClass = match($permohonan['status']) {
              'Pengajuan'        => 'badge-pengajuan',
              'Validasi Dokumen' => 'badge-validasi',
              'Revisi'           => 'badge-revisi',
              'Selesai'          => 'badge-selesai',
              default            => 'badge-proses',
            };
            ?>
            <span class="<?= $badgeClass ?>">● <?= esc($permohonan['status']) ?></span>
          </span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Total Dokumen</span>
          <span class="detail-value"><?= count($dokumen) ?> file terupload</span>
        </div>
        <div style="padding:14px 16px;display:flex;gap:8px;flex-wrap:wrap;">
          <a href="/pemohon/tracking/<?= esc($permohonan['kode_unik']) ?>" class="btn-navy">
            <i class="bi bi-search"></i> Tracking Status
          </a>
          <a href="#" class="btn-outline">
            <i class="bi bi-download"></i> Tanda Terima
          </a>
        </div>
      </div>
    </div>

    <!-- DOKUMEN -->
    <div class="col-md-7">
      <div class="section-card">
        <div class="section-header">
          <h6>Dokumen yang Diunggah</h6>
          <span style="font-size:11px;color:rgba(255,255,255,0.6);"><?= count($dokumen) ?> file</span>
        </div>

        <?php if (empty($dokumen)): ?>
        <div style="text-align:center;padding:32px;color:#999;">
          <i class="bi bi-folder2-open" style="font-size:32px;display:block;margin-bottom:8px;"></i>
          Belum ada dokumen yang diunggah.
        </div>
        <?php else: ?>
        <table class="doc-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Jenis Dokumen</th>
              <th>Nama File</th>
              <th>Versi</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $namaDoc = [
              'ktp'               => 'KTP',
              'kk'                => 'Kartu Keluarga (KK)',
              'npwp'              => 'NPWP',
              'buku_nikah'        => 'Buku Nikah',
              'akta_lahir'        => 'Akta Lahir',
              'ajb'               => 'AJB',
              'sppt_pbb'          => 'SPPT/PBB',
              'bukti_bayar_sppt'  => 'Bukti Bayar SPPT/PBB',
              'dasar_pengalihan'  => 'Dasar Pengalihan Hak',
              'akta_kematian'     => 'Akta Kematian',
              'bukti_transaksi'   => 'Bukti Transaksi',
              'bukti_kepemilikan' => 'Bukti Kepemilikan',
              'surat_kuasa_waris' => 'Surat Kuasa Waris',
              'foto_lokasi'       => 'Foto Lokasi',
              'dokumen_lainnya'   => 'Dokumen Pendukung Lainnya',
            ];
            foreach ($dokumen as $i => $dok):
              $statusClass = match($dok['status_validasi']) {
                'Valid'    => 'status-valid',
                'Revisi'   => 'status-revisi',
                default    => 'status-menunggu',
              };
            ?>
            <tr>
              <td style="text-align:center;"><?= $i + 1 ?></td>
              <td><?= esc($namaDoc[$dok['tipe_dokumen']] ?? $dok['tipe_dokumen']) ?></td>
              <td style="font-size:11.5px;color:#666;"><?= esc($dok['nama_file']) ?></td>
              <td style="text-align:center;">v<?= $dok['versi'] ?></td>
              <td><span class="<?= $statusClass ?>"><?= esc($dok['status_validasi']) ?></span></td>
              <td>
                <?php if ($dok['status_validasi'] === 'Revisi'): ?>
                <span style="font-size:11px;color:#991b1b;font-weight:600;">Perlu upload ulang</span>
                <?php else: ?>
                <span style="font-size:11px;color:#666;">-</span>
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php endif; ?>
      </div>
    </div>

  </div>
</div>
</body>
</html>